f<?php

class AdminController extends BaseController
{
	/*
	 *
	 * 	TODO
	 *
	 */

	public function home()
	{
		// $id = 1;
		// $school = School::with('organization')->find($id)->toArray();

		// echo "<pre>";
		// print_r($school);
		// echo "</pre>";

		// if($school['organization']) {
		// 	echo "OK";
		// } else {
		// 	echo "NOT OKAY";
		// }

		return Redirect::route('admin/organizations');
	}

	/**
	*Organizations functions
	**/
	public function organizations()
	{
		$page_title = "Organizations";

		$organizations 	= Organization::with('schoolsCount')->orderBy('name', 'ASC')->get();
		$countries 		= Country::orderBy('country_name', 'ASC')->get();
		$schools 		= School::orderBy('name', 'ASC')->get();

		return View::make('admin.organizations', compact('page_title', 'organizations', 'countries', 'schools'));
	}

	public function showSchool($id)
	{
		$school = School::find($id);
		$page_title = $school->name;


		return View::make('admin.viewSchool', compact('page_title', 'school'));
	}

	public function showOrganization($id)
	{
		$page_title = "Organizations";

		$organization 	= Organization::find($id);

		$owner = $organization->owner;
		$schools = $organization->load('schools');

		return View::make('admin.viewOrganization', compact('page_title', 'schools','owner'));
	}

	public function getOrganizationInfo()
	{
		$id = Input::get('id');
		$school = Organization::find($id)->toArray();

		return Response::json($school);
	}

	public function postOrganizationInfo()
	{
		$input = Input::all();

		$rules = array(
			'school_name' 		=> 'required|max:255',
		);

		$validation = Validator::make($input, $rules);

		if($validation->passes()) {
			if($input['id'])
				$school = Organization::where('id', '=', $input['id'])->firstOrFail();
			else
				$school = new Organization;

			$school->name 					= $input['school_name'];

			$school->save();

			if(!$school->id){
			    $return['flash']['type'] 	= false;
				$return['flash']['message'] = "Failed to save data";
			} else {
				$return['flash']['type'] 	= true;
				$return['flash']['message'] = "Successfully saved $school->name!";
				$return['data'] = $school;
			}
		} else {
			$errors = $validation->messages();
			$message = "";

			foreach ($errors->all('<li>:message</li>') as $error) {
				$message .= $error;
            }

			$return['flash']['type'] 	= false;
			$return['flash']['message'] = $message;
		}

		return Response::json($return);
	}

	public function deleteOrganization()
	{
		$school = Organization::findOrFail( Input::get('id') );
		$school->delete();

		$return['flash']['type'] =	true;
		$return['flash']['message'] = "Successfully deleted!";

		return Response::json($return);
	}


	/**
	*School functions
	**/
	public function schools()
	{
		$page_title = "Schools";

		$organizations 	= Organization::orderBy('name', 'ASC')->get();
		$countries 		= Country::orderBy('country_name', 'ASC')->get();
		$schools 		= School::orderBy('name', 'ASC')->get();

		return View::make('admin.schools', compact('page_title', 'organizations', 'countries', 'schools'));
	}

	public function getSchoolInfo()
	{
		$id = Input::get('id');
		$school = School::with('organization')->find($id)->toArray();

		return Response::json($school);
	}

	public function postSchoolInfo()
	{
		$input = Input::all();

		$rules = array(
			'school_name' 		=> 'required|max:255',
			'country' 			=> 'required',
			'state' 			=> 'required',
			'contact_number' 	=> 'required|max:255',
		);

		$validation = Validator::make($input, $rules);

		if($validation->passes()) {
			if($input['id'])
				$school = School::where('id', '=', $input['id'])->firstOrFail();
			else
				$school = new School;

			$school->organization_id 		= empty($input['organization']) ? null : $input['organization'];
			$school->name 					= $input['school_name'];
			$school->country 				= $input['country'];
			$school->state 					= $input['state'];
			$school->city 					= empty($input['city']) ? null : $input['city'];
			$school->street 				= empty($input['street']) ? null : $input['street'];
			$school->contact_number 		= $input['contact_number'];
			$school->save();

			if(!$school->id){
			    $return['flash']['type'] 	= false;
				$return['flash']['message'] = "Failed to save data";
			} else {
				$return['flash']['type'] 	= true;
				$return['flash']['message'] = "Successfully saved $school->name!";
				$return['data'] = $school;
			}
		} else {
			$errors = $validation->messages();
			$message = "";

			foreach ($errors->all('<li>:message</li>') as $error) {
				$message .= $error;
			}

			$return['flash']['type'] 	= false;
			$return['flash']['message'] = $message;
		}

		return Response::json($return);
	}

	public function deleteSchool()
	{
		$school = School::findOrFail( Input::get('id') );
		$school->delete();

		$return['flash']['type'] =	true;
		$return['flash']['message'] = "Successfully deleted!";

		return Response::json($return);
	}

	//organization
	public function addOrganization()
	{
		$input = Input::all();

		$messages = [
				'name.unique' => 'that organization name is already taken.',
				'name.required' => 'organization name is required',
				'picture.mimes' => 'image must be in jpg, bmp, or png format',
				'picture.image' => 'must be image'
		];

		$rules = array(
				'name' 		=> 'required|max:255|unique:organizations',
				'description' 			=> 'required|max:255',
				'picture' => 'mimes:jpeg,bmp,png|image'
		);

		$validation = Validator::make($input, $rules,$messages);

		if($validation->passes()) {

			$organization = new Organization;
			$organization->name 					= $input['name'];
			$organization->description 				= (!$input['description']) ? null : $input['description'];
			$organization->save();

			if(!$organization->id){
				$return['flash']['type'] 	= false;
				$return['flash']['message'] = "Failed to save data";
			} else {
				$return['flash']['type'] 	= true;
				$return['flash']['message'] = "Successfully created $organization->name!";
				$return['data'] = $organization;
			}
		} else {
			$errors = $validation->messages();
			$message = "";

			foreach ($errors->all('<li>:message</li>') as $error) {
				$message .= $error;
			}

			$return['flash']['type'] 	= false;
			$return['flash']['message'] = $message;
		}

		return Response::json($return);
	}

	public function editOrganization()
	{
		$input = Input::all();
		$messages = [
				'name.required' => 'organization name is required',
				'picture.mimes' => 'image must be in jpg, bmp, or png format',
				'picture.image' => 'picture must be an image'
		];
		$rules = array(
				'id' => 'required',
				'name' 		=> 'required|max:255',
				'description' 			=> 'required|max:255',
				'picture' => 'image|mimes:jpeg,bmp,png'
		);

		$validation = Validator::make($input, $rules,$messages);

		$inputs = Input::all();

		if($validation->passes()) {

			$organization = Organization::find($inputs['id']);
			$organization->name 					= $inputs['name'];

			if($inputs['picture']) {
				$file = $inputs['picture'];
				$name = str_random(60) . time() . '.jpg';
				$image = Image::make($file)->encode('jpg')->orientate()->fit(200)->save(public_path() . '/uploads/' . $name);
				$organization->picture 			= URL::to('/uploads') . '/' . $name;
			}
			$organization->description 				= (!$input['description']) ? null : $input['description'];
			$organization->save();

			if(!$organization->id){
				$return['flash']['type'] 	= false;
				$return['flash']['message'] = "Failed to save data";
			} else {
				$return['flash']['type'] 	= true;
				$return['flash']['message'] = "Successfully updated $organization->name!";
				$return['data'] = $organization;
			}
		} else {

			$errors = $validation->messages();
			$message = "";
			foreach ($errors->all('<li>:message</li>') as $error) {
				$message .= $error;
			}

			$return['flash']['type'] 	= false;
			$return['flash']['message'] = $message;
		}

		return Response::json($return);
	}

	public function setOwner()
	{
		$input = Input::all();

		$rules = array(
				'user_id' => 'required|exists:users',
				'organization_id' => 'required|exists:organizations'
		);

		$validation = Validator::make($input, $rules);

		if($validation->passes()) {

			$organization = Organization::find($input['organization_id']);
			$user = User::find($input['user_id']);
			$organization->associate($user);

			if($organization->user_id!=$input['user_id']){
				$return['flash']['type'] 	= false;
				$return['flash']['message'] = "Failed to save data";
			} else {
				$return['flash']['type'] 	= true;
				$return['flash']['message'] = "Successfully updated $organization->name!";
				$return['data'] = $organization;
			}

		} else {
			$errors = $validation->messages();
			$message = "";

			foreach ($errors->all('<li>:message</li>') as $error) {
				$message .= $error;
			}


			$return['flash']['type'] 	= false;
			$return['flash']['message'] = $message;
		}

		return Response::json($return);
	}

	public function addStyleToOrg()
	{
		$org = Organization::find(Input::get('org_id'));
		$school = Auth::user()->teacher()->first()->school;
		//TODO add to school or org styles
		// dd($school->students()->first()->pivot->plan_id);
		$style = new Style;
		$style->name = Input::get('name');
		$style->description = Input::get('description');
		$school->styles()->save($style);

	}
	//organizations

	public function showUser($id)
	{
		$page_title = "User";

		$user 	= User::find($id);


		return View::make('admin.viewUser', compact('page_title', 'user'));
	}
}
