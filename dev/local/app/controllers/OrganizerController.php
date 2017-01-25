<?php

class OrganizerController extends BaseController
{
	public function home()
	{
		// $students = ;	

		$page_title = 'Organizer home';
		$organization = Auth::user()->organization;
		$schools = $organization->schools;

		return View::make('organizer.tempindex',compact('page_title', 'schools','organization'));
	}

	public function showSchool($id)
	{
		$school = School::find($id);
		$page_title = $school->name;


		return View::make('organizer.showSchool', compact('page_title', 'school'));
	}

	public function viewAddSchool()
	{
		$page_title = 'add school';
		return View::make('organizer.addSchool', compact('page_title'));
	}

	public function addSchool()
	{

		$input = Input::all();
		$rules = array(
				'school_name' 		=> 'required|max:255',
				'contact_number' 	=> 'required|numeric'
		);

		$validation = Validator::make($input, $rules);


		if($validation->fails()){
//			dd('asdasd');
			return Redirect::to('organizer/schools/add')->with('errors',$validation->messages());
		}
		$school = new School;
		$school->name = $input['school_name'];
		$school->country = $input['country'];
		$school->state = $input['state'];
		$school->city = $input['city'];
		$school->street = $input['street'];
		$school->contact_number = $input['contact_number'];

		$organization = Auth::user()->organization;

		$organization->schools()->save($school);

		return Redirect::to('organizer/schools/add')->withInput()->with('success', 'Group Created Successfully.');
	}

	public function setSchoolOwner($id)
	{
		$page_title = 'add owner';
		$school = School::find($id);
		$user_id = Input::get('user_id');
		$rules = [
			'user_id' => 'required|numeric'
		];
		$validator = Validator::make(Input::all(),$rules);

		if($validator->fails())
		{
			return Redirect::back()->withErrors(['msg' => 'there was an error!']);
		}

		$user = User::find($user_id);

		$school->owner()->associate($user);
		$school->save();

		return Redirect::to('organizer/schools/'.$school->id.'/show');
	}

	public function ViewAddSchoolOwner($id)
	{
		$page_title = 'add owner';
		$school = School::find($id);
		return View::make('organizer.addSchoolOwner',compact('page_title','school'));
	}

	public function addOrganization()
	{
		$rules = [
			'name' => 'required|min:2|max:20|unique:organizations',
			'picture' => 'mimes:jpeg,bmp,png'
		];
		$validator = Validator::make(Input::all(),$rules);

		if($validator->fails()) return Response::json($validator->messages());
		$organization = new Organization;
		$organization->name = Input::get('name');
		$organization->description = Input::get('description');

		if($organization->save()) return Response::json($organization);
	}

	public function addStyle()
	{
		$teacher = Auth::user()->teacher;
		$student_ids = [
				239,
				241,
				244,
				245,
				250,
				267,
				268,
				269,
				276
		];

		$teacher->students()->sync($student_ids);
		$student = $teacher->students()->find(276);
		$rank_ids = [
				1 => ['teacher_id' => $teacher->id],
				2 => ['teacher_id' => $teacher->id],
				3 => ['teacher_id' => $teacher->id],
				4 => ['teacher_id' => $teacher->id]
		];
		$student->ranks()->sync($rank_ids);
		dd($student);

		$return['flash']['type'] 	= true;
		$return['flash']['message'] = "Successfully updated $organization->name!";
		$return['data'] = $organization;
	}

	// autocomplete
	public function usersAutocomplete()
	{
		$keyword = Input::get('query');
		$user = User::where('first_name','LIKE','%'.$keyword.'%')->take(10)->get();

		return Response::json($user);
	}
}