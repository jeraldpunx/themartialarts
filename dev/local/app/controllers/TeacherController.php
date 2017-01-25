<?php

use Carbon\Carbon;

class TeacherController extends BaseController
{	
	public function home()
	{	
		// $organizations = Auth::user()->organizations()->get();
		$courses = Auth::user()->classesManaged()->get();
		// $course = Input::get('course_id')	
		$page_title = "courses";
		$user = Auth::user();
		// $organizations = $user->organizations;
		// $courses = $user->classesManaged()->get();

		return View::make('instructor.dashboard', compact('page_title', 'courses'));
	}

	public function organizations()
	{	

		return View::make('admin.schools');
	}

	public function schools()
	{
		$page_title = "Schools";

		$countries = Country::orderBy('country_name', 'ASC')->get();
		$schools = School::orderBy('name', 'ASC')->get();

		return View::make('admin.schools', compact('page_title', 'countries', 'schools'));
	}

	public function showCoursesHandled()
	{	
		$page_title = "courses";
		$user = Auth::user();
		$organizations = $user->organizations;
		$courses = $user->classesManaged()->get();

		return View::make('instructor.dashboard', compact('page_title', 'courses','organizations'));	
	}

	public function showCourse($course_id)
	{	
		$page_title = "courses";
		$user = Auth::user();
		$organizations = $user->organizations;
		$course = Course::find($course_id);
		$students = $course->students()->get();

		return View::make('instructor.viewStudents', compact('page_title', 'students','organizations','course'));
	}

	public function showStudent()
	{
		//TODO
		$student = Student::find(Input::get('student_id'));

		$ranks = $student->ranks()->with('style')->get();

		$response = [
			'student' => $student,
			'ranks' => $ranks
		];

		return Response::json($response);
	}

	// 'teacher/course/{id}/add'
	public function addStudentTest()
	{
		$faker = Faker\Factory::create();
		$error_response = [
			'code' => '400',
			'message' => 'an error has occured when adding student'
		];

		$success_response = [
			'code' => '200',
			'message' => 'success'
		];

		$student = new Student;
		$student->first_name = $faker->firstName;
		$student->last_name = 'test';
		$student->birthdate = Carbon::now()->subYears(5);
		$student->gender = $faker->randomElement(['male', 'female']);
		$student->contact_number = $faker->tollFreePhoneNumber;
		$student->picture = 'www.casdasd/asdasd/default.jpg';
		$student->country = $faker->country;
		$student->state = $faker->state;
		$student->city = $faker->city;
		$student->street = $faker->streetAddress;
		$student->zip = $faker->postcode;

		$teacher = Auth::user()->teacher;
		
		

		if($student->save())
		{
			$teacher->students()->attach($student);
			return Response::json($success_response);
		}
		else
		{
			return Response::json($error_response);	
		}

	}

	public function addStudents()
	{		
		// $student = new Student;r
		// $course = Course::find($id);
		$rules = [
			'first_name' => 'required',
			'last_name' => 'required',
			'contact_number' => 'required',
			'picture' => 'mimes:jpeg,bmp,png',
			'country' => 'require',
		];

		$validator = Validator::make(Input::all(), $rules);
		$student_id = Input::get('student_id');

		$error_response = [
			'code' => '400',
			'message' => 'an error has occured when adding student'
		];

		$success_response = [
			'code' => '200',
			'message' => 'success'
		];

		if($validator->fails()) return $validator->messages();

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
		if(Input::get('picture')) {
			$file = Input::get('picture');
			$name = str_random(60) . time() . '.jpg';
			$image = Image::make($file)->encode('jpg')->orientate()->fit(200)->save(public_path() . '/uploads/' . $name);
			$student->picture 			= URL::to('/uploads') . '/' . $name;
		}
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

	public function deleteStudents($id)
	{
		$student = Student::find($id);
		$error_response = [
			'code' => '400',
			'message' => 'an error has occurred when deleting student'
		];

		$success_response = [
			'code' => '200',
			'message' => 'success'
		];

		if($student){
			$student->isDeleted = 1;
			return Response::json($success_response);
		}
		else{
			return Response::json($error_response);
		}

	}

	public function editStudents()
	{
		$user_id = Input::get('user_id');
		$student = User::find($user_id);
		// $course = Course::find($course_id);
		$teacher = Auth::user()->teacher;
		$styles = $teacher->styles()->with('ranks')->get()->toArray();
		dd($styles);

		$error_response = [
			'code' => '400',
			'message' => 'an error has occured when editing student'
		];

		$success_response = [
			'code' => '200',
			'message' => 'success'
		];
		// $current_course = Course::find($course_id);
		// $new_course = Course::find(Input::find('course_id'));
		$student->first_name = Input::get('first_name');
		$student->last_name = Input::get('last_name');
		$student->birthdate = Input::get('birthdate');
		$student->gender = Input::get('gender');		
		$student->contact_number = Input::get('contact_number');
		if(Input::get('picture')) {
			$file = Input::get('picture');
			$name = str_random(60) . time() . '.jpg';
			$image = Image::make($file)->encode('jpg')->orientate()->fit(200)->save(public_path() . '/uploads/' . $name);
			$student->picture 			= URL::to('/uploads') . '/' . $name;
		}
		$student->country = Input::get('country');
		$student->state = Input::get('state');
		$student->city = Input::get('city');
		$student->street = Input::get('street');
		$student->zip = Input::get('zip');	
		$student->isActive = 0;

		$student->updated_at = Carbon::now();

		if($student->save())
			return Response::json($success_response);
		else
			return Response::json($error_response);

	}


	public function gradeStudent()
	{
		//@todo
		//soon
	}

	public function addStudentPlan($student_id)
	{	
		$teacher = Teacher::where('user_id','=',Auth::user()->id);
		$plan = Input::get('plan_id');
		$student = 	Student::find($student_id);
	}

	// public function makePaymentPlan()
	// {
	// 	$teacher = Teacher::where('user_id','=',Auth::user()->id);
	// 	$amount
	// }


	public function getOrganizations()
	{
		$organizations = Auth::user()->organizations()->get();
		return Response::json($organizations,200);
	}

	public function getCourses()
	{
		$courses = Auth::user()->classesManaged()->get();
		return Response::json($courses,200);
	}

	public function editStudentRank($id)
	{
		$teacher = Auth::user()->teacher;
		$student = $teacher()->students()->find($id);
		$rank = Rank::find(Input::get('rank_id'));

		if(!$rank)
			return Response::json(['message' => 'error rank id is null'],400);
		else
		{
			$student()->pivot->rank_id = $rank;
			$student->pivot->save();
			return Response::json(['message' => 'success'],200);
		}

	}

	public function addRelationships()
	{

	}

	public function showSearch()
	{	

		$teacher = Auth::user()->teacher;
		// $style = $teacher->load('school')->with('style')->get();
		$school = $teacher->school;
		$styles = $school->styles()->with('ranks')->get();
		$students = Students::all();
		$organization = $school->organization;
		// dd($style[0]->ranks);
		
		$ranks = $styles[0]->ranks;

		// dd($styles,$organization,$ranks);

		return View::make('instructor.searchfilters', compact('ranks','styles'));
	}

	public function SearchStudents()
	{
		// $organizations = Auth::user()->organizations()->get();

		$age_start = Input::get('age_start');
		$age_end = Input::get('age_end');
		$first_name = Input::get('first_name');
		$last_name = Input::get('last_name');
		$gender = Input::get('gender');
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
			$students->where('gender','=',$gender);
		}


		$result = $students->get();
		// $style = $teacher->load('school')->with('style')->get();
		// $students = $teacher->students;
		// dd($students[0]->Younger(10)->get());	
		// dd($students[0]->isYounger(10), $students[0]->age);
		// dd($result);
		return View::make('instructor.dashboard', compact('page_title', 'courses','result'));
	}	

	// -----------------------------------//
	// 			add ranks 				  //

	public function addStyle()
	{
		$school = Auth::user()->teacher()->first()->school;
		//TODO add to school or org styles
		// dd($school->students()->first()->pivot->plan_id);
		$style = new Style;
		$style->name = Input::get('name');
		$style->description = Input::get('description');
		$school->styles()->save($style);

	}



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
		$styles =  Style::find($id);
		$ranks =  $styles->ranks;
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

	// 			end rank functions 			//

	//		     //
	//  courses  //
	//			 //

	public function addCourse()
	{
		// $school_id
		$school = Auth::user()->teacher()->school()->get();
		dd($school);
	}
	
	public function editCourse()
	{

	}

	public function deleteCourse($id)
	{
		//soft delete

	}

	//
	//		end courses
	//

}	
