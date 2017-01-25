<?php
use Carbon\Carbon;
class InstructorController extends BaseController
{
	public function home()
	{
		$page_title = "Home";

		// return Auth::user()->role_id;
		$first_name = Input::get('first_name');
		$last_name 	= Input::get('last_name');
		$gender 	= Input::get('gender');
		$age_start 	= Input::get('age_start');
		$age_end 	= Input::get('age_end');

		$rank_id 	= Input::get('rank_id');
		$teacher 	= Auth::user()->teacher;

		$school = $teacher->school;

		$students 	= $teacher->students();

		if($first_name!=null) 		$students->where('first_name','LIKE','%'.$first_name.'%');
		if($last_name!=null) 		$students->where('last_name','LIKE','%'.$last_name.'%');
		if($gender!=null) 			$students->where('gender','=',$gender);
		if($age_start != null) 		$students->Older($age_start);
		if($age_end != null) 		$students->Younger($age_end);
		if($rank_id != null) 		$students->wherePivot('rank_id','=',$rank_id);

		$students = $students->orderBy('first_name','ASC')->get()->load('ranks.style');

		// $styles = DB::SELECT("SELECT * FROM (
		// 				SELECT * 
		// 				FROM styles s
		// 				WHERE s.organization_id = (
		// 				    SELECT s.organization_id
		// 				    FROM schools s 
		// 				    WHERE s.id = (
		// 				    	SELECT t.school_id
		// 						FROM teachers t 
		// 						WHERE t.user_id = ".Auth::user()->id."
		// 				    )
		// 				)
		// 				UNION ALL
		// 				SELECT * 
		// 				FROM styles s
		// 				WHERE s.school_id = (
		// 				   	SELECT t.school_id
		// 					FROM teachers t 
		// 					WHERE t.user_id = ".Auth::user()->id."
		// 				)
		// 			) as styles ORDER BY organization_id DESC");

		$org_styles = Auth::user()->teacher->school->organization->styles;
		$sch_styles = Auth::user()->teacher->school->styles;
		$styles = $org_styles->merge($sch_styles);

		return View::make('instructor.index', compact('page_title', 'school', 'students', 'styles'));
	}

	public function test()
	{
		 $teacher = Auth::user()->teacher;
		$student = $teacher->students()->where('student_id', '=', 404)->first();
		return $student;
		$teacher->students()->attach($student);

		return "";
		// $teacher = Auth::user()->teacher;

		// $student = $teacher->students()->where('student_id', '=', 186)->get();

		// // $student->pivot->rank_id = 22;

		// echo "<pre>";
		// print_r($student->toArray());
		// echo "</pre>";
		// return "";

		// // $rank_ids = [
		// // 	21 => ['teacher_id' => $teacher->id, 'created_at' => Carbon::now()],
		// // 	16 => ['teacher_id' => $teacher->id, 'created_at' => Carbon::now()],
		// // 	23 => ['teacher_id' => $teacher->id, 'created_at' => Carbon::now()],
		// // 	24 => ['teacher_id' => $teacher->id, 'created_at' => Carbon::now()]
		// // ];

		// $rank_ids = 
		// [
		// 	"10" 	=> ["teacher_id"=>2, "created_at"=>Carbon::now()],
		// 	"8" 	=> ["teacher_id"=>2, "created_at"=>Carbon::now()],
		// 	"22" 	=> ["teacher_id"=>2, "created_at"=>Carbon::now()],
		// 	"3" 	=> ["teacher_id"=>2, "created_at"=>Carbon::now()]
		// ];
		// $student->ranks()->sync($rank_ids);
		// echo $stylewithrank->toSql();
		// echo "<br><br>";

		

		// echo $stylewithrank;
		// // return $stylewithrank;

		// // echo "<pre>";
		// // print_r($stylewithrank->toArray());
		// // echo "</pre>";
		// return "";
		// $page_title = "test";

		// return View::make('instructor.test', compact('page_title'));
		// $ranks = DB::SELECT("
		// 	SELECT id FROM RANKS WHERE style_id IN (
		// 			SELECT id FROM (

		// 				SELECT * 
		// 				FROM styles s
		// 				WHERE s.organization_id = (
		// 				    SELECT s.organization_id
		// 				    FROM schools s 
		// 				    WHERE s.id = (
		// 				    	SELECT t.school_id
		// 						FROM teachers t 
		// 						WHERE t.user_id = 5
		// 				    )
		// 				)
		// 				UNION ALL
		// 				SELECT * 
		// 				FROM styles s
		// 				WHERE s.school_id = (
		// 				   	SELECT t.school_id
		// 					FROM teachers t 
		// 					WHERE t.user_id = 5
		// 				)
		// 			) as styles
		// 		)
		// 	");

		// $new_ranks = [];
		// foreach ($ranks as $rank) {
		// 	array_push($new_ranks, $rank->id);
		// }

		// $faker = Faker\Factory::create();
		

		// $students = TeacherStudent::where('teacher_id', '=', 2)->get();

		// foreach ($students as $student) {
		// 	$student->rank_id = $faker->randomElement($new_ranks);
		// 	$student->save();
		// }

		// return $students;
	}

	public function postStudent()
	{
		$input = Input::all();
		// return Response::json($input);
		$teacher = Auth::user()->teacher;

		$rank_ids = [];

		$rules = array(
			'picture_file' 		=> 'mimes:jpeg,bmp,png|max:3000',
			'first_name'		=> 'required|max:255',
			'last_name'			=> 'required|max:255',
			'birthdate'			=> 'required|date|date_format:m/d/Y',
			'gender'			=> 'required',
			'contact_number'	=> 'required',
			'email' 			=> 'required|max:255',
			'country'			=> 'required',
			'state'				=> 'required',
			'street'			=> 'required',
			'zip'				=> 'required',
		);

		$validation = Validator::make($input, $rules);

		if($validation->passes()) {
			$student = ($input['id']) ? Student::find($input['id']) : new Student;

			if($input['picture_file']) {
				$file = $input['picture_file'];
				$name = str_random(20) . time() . '.jpg';
				$image = Image::make($file)->encode('jpg')->orientate()->fit(200)->save(public_path() . '/uploads/' . $name);

				$student->picture 			= '/uploads/' . $name;
			} else {
				if(!$input['id']) 		$student->picture = 'assets/images/default-user.png';
			}
			$student->first_name 		= $input['first_name'];
			$student->last_name 		= $input['last_name'];
			$student->birthdate 		= date("Y-m-d", strtotime($input['birthdate']));
			$student->gender 			= $input['gender'];
			$student->contact_number 	= $input['contact_number'];
			$student->email 			= $input['email'];
			$student->country 			= $input['country'];
			$student->state 			= $input['state'];
			$student->city 				= $input['city'];
			$student->street 			= $input['street'];
			$student->zip 				= $input['zip'];
			$student->isActive 			= (Input::has('isActive')) ? 1 : 0;
			$student->save();

			$teacher_student = $teacher->students()->where('student_id', '=', $student->id)->first();
			// if((array_key_exists('ranks', $input)) || ) {
			if(!$teacher_student) {
				$teacher->students()->attach($student);

				$teacher_student = $teacher->students()->where('student_id', '=', $student->id)->first();
				if(array_key_exists('ranks', $input)) {
					foreach ($input['ranks'] as $ranks) {
						$rank_ids[$ranks]['teacher_id'] = $teacher->id;
						$rank_ids[$ranks]['created_at'] = Carbon::now();
					}
				}
				$teacher_student->ranks()->sync($rank_ids);
			} else {
				if(array_key_exists('ranks', $input)) {
					foreach ($input['ranks'] as $ranks) {
						$rank_ids[$ranks]['teacher_id'] = $teacher->id;
						$rank_ids[$ranks]['created_at'] = Carbon::now();
					}
				}
				$teacher_student->ranks()->sync($rank_ids);
			}

			$return['data'] 	= $student->load('ranks.style');
			$return['flash']['type'] 	= true;
			$return['flash']['message'] = "Successfully saved!";
		} else {
			$errors = $validation->messages();
			$returnMessage = "";

			foreach ($errors->all('<li>:message</li>') as $error) {
				$returnMessage .= $error;
            }

			$return['flash']['type'] 	= false;
			$return['flash']['message'] = $returnMessage;
		}

		return Response::json($return);
	}

	public function showStyleWithRanks()
	{
		$ranks = Style::where('id', '=', Input::get('id'))->with('ranks')->get()->first();

		return Response::json($ranks);
	}

	public function getStyleWithRankByRankID()
	{
		$stylewithrank = Rank::where('id', '=', Input::get('id'))->with('style')->get()->first();

		return Response::json($stylewithrank);
	}

	public function addRank()
	{
		// Input::get('id');

		// $student_id;

		// $student = Student::find($student_id)->;
	}





	public function addStyle()
	{




// 		$teacher = Auth::user()->teacher;
// 		$student_ids = [
// 		239,
// 		241,
// 		244,
// 		245,
// 		250,
// 		267,
// 		268,
// 		269,
// 		276
// 		];

// 		$teacher->students()->sync($student_ids);
// 		$student = $teacher->students()->find(276);
// 		$rank_ids = [
// 		1 => ['teacher_id' => $teacher->id],
// 		2 => ['teacher_id' => $teacher->id],
// 		3 => ['teacher_id' => $teacher->id],
// 		4 => ['teacher_id' => $teacher->id]
// // 3,
// // 4,
// // 5,
// // 6,
// // 7
// 		];
// 		$student->ranks()->sync($rank_ids);
// 		dd($student);

// 		$return['flash']['type'] = true;
// 		$return['flash']['message'] = "Successfully updated $organization->name!";
// 		$return['data'] = $organization;

	} 

	public function SearchStudents()
	{
		// $organizations = Auth::user()->organizations()->get();

		$age_start = Input::get('age_start');
		$age_end = Input::get('age_end');

		$rank_id = Input::get('rank_id');
		$teacher = Auth::user()->teacher;
		$students = $teacher->students();

		if($first_name!=null)
		{
		$students->where('first_name','LIKE','%'.$first_name.'%');
		}
		if($last_name!=null)
		{
		$students->where('last_name','LIKE','%'.$last_name.'%');
		}
		if($age_start!=null)
		{
		$students->Older($age_start);
		}
		if($age_end!=null)
		{
		$students->Younger($age_end);
		}	
		if($gender!=null)
		{
		$student->where('gender','=',$gender);
		}


		$result = $students->get();
		// $style = $teacher->load('school')->with('style')->get();
		// $students = $teacher->students;
		// dd($students[0]->Younger(10)->get());	
		// dd($students[0]->isYounger(10), $students[0]->age);
		// dd($result);
		return View::make('instructor.dashboard', compact('page_title', 'courses','result'));
	}

	// public function addStyle()
	// {
	// 	$school = Auth::user()->teacher()->first()->school;

	// 	// dd($school->students()->first()->pivot->plan_id);
	// 	$style = new Style;
	// 	$style->name = Input::get('name');
	// 	$style->description = Input::get('description');
	// 	$school->styles()->save($style);

	// }

	public function addRankToStudent($student_id)
	{
		$teacher = Auth::user()->teacher;
		// $style = Style::find(Input::get('style_id'));
		// $student = Student::find($student_id);
		// $rank = Rank::find(Input::get('rank_id'));
		$enrollment = $teacher->students()->where('student_id','=',$student_id)->first();
		$enrollment->pivot->rank_id = Input::get('rank_id');
		$enrollment->pivot->save();
		dd($enrollment->pivot->rank_id);
		// $rank = new Rank;
		// $rank->level = Input::get('level');
		// $rank->name = Input::get('name');
		// $rank->type = Input::get('type');
		// $rank->primary_color = Input::get('primary_color');
		// $rank->secondary_color = Input::get('secondary_color');
		// $rank->save();
	}

	public function showRanks($id)
	{	
		$teacher = Auth::user()->teacher;	
		$styles = Style::find($id);
		$ranks = $styles->ranks;
		$page_title = 'styles';

		return View::make('instructor.showstyles',compact('teacher','styles','ranks','page_title'));
	}

	public function addRanks($id)
	{
		$teacher = Auth::user()->teacher;
		$style = Style::find($id);
		$last_rank = $style->last_rank;
		$rank = new Rank;
		$rank->level = $last_rank->level+1;
		$rank->name = Input::get('name');
		$rank->type = Input::get('type');
		$rank->style_id = $id;
		// $rank->primary_color = Input::get('primary_color');
		// $rank->secondary_color = Input::get('secondary_color');
		// $rank->created_at = Carbon::now();
		// $rank->updated_at = Carbon::now();
		$rank->save();	

		return Redirect::to('style/'.$id.'/ranks');
	}

	public function addStudents()
	{	
		// $student = new Student;
		// $course = Course::find($id);
		$student_id = Input::get('student_id');
		$error_response = [
		'code' => '400',
		'message' => 'an error has occured when adding student'
		];

		$success_response = [
		'code' => '200',	
		'message' => 'success'
		];

		if($student_id){
			$student = Student::find($student_id);
		}
		else
		{
			$student = new Student;	
		}
		$student->first_name = Input::get('first_name');
		$student->last_name = Input::get('last_name');
		$student->birthdate = Input::get('birthdate');
		$student->gender = Input::get('gender');
		$student->contact_number = Input::get('contact_number');
		$student->picture = (Input::get('picture')) ? Input::get('picture') : 'http://somewebsite.com/picture.jpg';
		$student->country = Input::get('country');
		$student->state = Input::get('state');
		$student->city = Input::get('city');
		$student->street = Input::get('street');
		$student->zip = Input::get('zip');

		$teacher = Auth::user()->teacher;


		if($student_id)
		{	
			$student->save();
			$teacher->students()->attach($student);
			return Response::json($success_response);
		}
		if(!$student_id)
		{
			$student->save();
		}
		else
		{
			return Response::json($error_response);	
		}
	}


	public function showStudent()
	{
		$student = Student::find(Input::get('id'));
		
		$ranks = $student->ranks()->with('style')->get();

		$relationships = $student->relationship()->with('guardian')->get();

		$response = [
			'student' => $student,
			'ranks' => $ranks,
			'relationships' => $relationships
		];

		return Response::json($response);
	}

	public function deleteStudent()
	{
		$student = Student::find(Input::get('id'));
		$student->delete();

		$return['flash']['type'] =	true;
		$return['flash']['message'] = "Successfully deleted!";
		return Response::json($return);
	}

	public function promoteStudentStyle()
	{
		$return = [];
	    $nextRank = Rank::where('level', '>', function($query){
				    	$query->select('level')->from('ranks')->where('id', '=', Input::get('rankid')); })
	    		->where('style_id', '=', function($query){
				    	$query->select('style_id')->from('ranks')->where('id', '=', Input::get('rankid')); })
	    		->orderBy('level', 'asc')
	    		->get()->first();

	    if($nextRank) {
	    	$teacher = Auth::user()->teacher;
			// $pivot = $teacher->students()->wherePivot('rank_id','=',Input::get('rankid'))->wherePivot('student_id','=',Input::get('studentid'))->get();

			$pivot = TeacherStudent::where('rank_id', '=', Input::get('rankid'))
									->where('student_id', '=', Input::get('studentid'))
									->get()->first();

			$pivot->rank_id 	  = $nextRank->id;
			$pivot->updated_at = Carbon::now();
			$pivot->save(); 

			$return['flash']['type'] = true;
			$return['flash']['message'] = "Successfully promoted to a new rank!";
			$return['data'] = $nextRank;
	    } else {
	    	$return['flash']['type'] = false;
			$return['flash']['message'] = "This student is already on the max rank!";
	    }

	    return Response::json($return);
	}

	public function searchGuardianAndStudents()
	{
		$user = User::where(DB::raw('CONCAT(first_name, " ", last_name)'), 'LIKE', '%'.Input::get('name').'%')
				->where(function ($query){
					$query->where('role_id', '=', 6)
						  ->orWhere('role_id', '=', 4);
				})
				->orderBy('first_name', 'asc')
				->take(15)
				->get();

		return Response::json($user);
	}



	public function addRelationship()
	{
		$input = Input::all();

		$rank_ids = [];

		$rules = array(
			'first_name' 		=> 'required|max:255',
			'last_name' 		=> 'required|max:255',
			'contact_number' 	=> 'required|max:255',
			'email' 			=> 'required|max:255',
			'type' 				=> 'required'
		);

		$validation = Validator::make($input, $rules);

		if($validation->passes()) {
			$student = Student::find($input['student_id']);

			$guardian = ($input['guardian_id']) ? User::find($input['guardian_id']) : new User;
			$guardian->first_name 		= $input['first_name'];
			$guardian->last_name 		= $input['last_name'];
			$guardian->contact_number 	= $input['contact_number'];
			$guardian->email 			= $input['email'];
			$guardian->role_id 			= 6;
			$guardian->save();

			$relationship = new Relationship;
			if($input['type'] == "Payer") {
				Relationship::where('student_id', '=', $input['student_id'])
							->update(['relationship_type' => 'Emergency Contact', 'updated_at' => Carbon::now()]);
			}
			$relationship->relationship_type = $input['type'];
			$relationship->created_at = Carbon::now();
			$relationship->save();

			$relationship->guardian()->associate($guardian);
			$relationship->student()->associate($student);
			$relationship->save(); 

			$return['flash']['type'] 	= true;
			$return['flash']['message'] = "Successfully saved!";
		} else {
			$errors = $validation->messages();
			$returnMessage = "";

			foreach ($errors->all('<li>:message</li>') as $error) {
				$returnMessage .= $error;
            }

			$return['flash']['type'] 	= false;
			$return['flash']['message'] = $returnMessage;
		}
	}

	public function getRelationInfo()
	{
		$relation = Relationship::select('user_relationships.id', 'users.first_name', 'users.last_name', 'user_relationships.relationship_type', 'users.contact_number', 'users.email')
								->join('users', 'user_relationships.guardian_id', '=', 'users.id')
								->where('user_relationships.id', '=', Input::get('relationship_id'))
								->get()->first();

		return Response::json($relation);
	}

	public function studentRelationships()
	{
		$relations = Relationship::select('user_relationships.id', 'users.first_name', 'users.last_name', 'user_relationships.relationship_type')
								->join('users', 'user_relationships.guardian_id', '=', 'users.id')
								->where('student_id', '=', Input::get('student_id'))
								->orderBy('user_relationships.created_at', 'ASC')
								->get();
		return Response::json($relations);
	}

	public function editRelationship()
	{
		$input = Input::all();

		$rank_ids = [];

		$rules = array(
			'type' 				=> 'required'
		);

		$validation = Validator::make($input, $rules);

		if($validation->passes()) {
			$relationship = Relationship::find($input['relationship_id']);
			if($input['type'] == "Payer") {
				Relationship::where('student_id', '=', $relationship->student_id)
							->update(['relationship_type' => 'Emergency Contact', 'updated_at' => Carbon::now()]);
			}

			$relationship->relationship_type = $input['type'];
			$relationship->updated_at = Carbon::now();
			$relationship->save();


			$return['data'] 			= $relationship;
			$return['flash']['type'] 	= true;
			$return['flash']['message'] = "Successfully saved!";
		} else {
			$errors = $validation->messages();
			$returnMessage = "";

			foreach ($errors->all('<li>:message</li>') as $error) {
				$returnMessage .= $error;
            }

			$return['flash']['type'] 	= false;
			$return['flash']['message'] = $returnMessage;
		}

		return Response::json($return);
	}

	public function deleteRelationship()
	{
		$relationship = Relationship::find(Input::get('id'));
		$relationship->delete();

		$return['flash']['type'] =	true;
		$return['flash']['message'] = "Successfully deleted!";
		return Response::json($return);
	}

// 	public function addRelationship()
// 	{
// 		$student = Student::find($id);
// 		$guardian = new User;
// 		$inputs = Input::all();
// // dd($inputs);
// 		$rules = [
// 			'first_name' 		=> 'required',
// 			'last_name' 		=> 'required',
// 			'contact_number' 	=> 'required|numeric',
// 			'country' 			=> 'required',
// 			'relation' 			=> 'required'
// 		];

// 		$validator = Validator::make($inputs,$rules);

// 		if($validator->fails()) {
// 			return Response::json(['code' => '400', 'message' => $validator->messages()]);
// 		}

// 		$guardian->first_name = $inputs['first_name'];
// 		$guardian->last_name = $inputs['last_name'];
// 		$guardian->contact_number = $inputs['contact_number'];
// 		$guardian->country = $inputs['country'];
// 		$guardian->role_id = 6;
// 		$guardian->save();
// // $guardian->relationship_type

// 		$relationship = new Relationship;
// 		$relationship->relationship_type = $inputs['relation'];
// 		$relationship->created_at = Carbon::now();
// // dd($relationship);
// 		$relationship->save();

// 		$relationship->guardian()->associate($guardian);
// 		$relationship->student()->associate($student);
// 		$relationship->save(); 

// 	}
}