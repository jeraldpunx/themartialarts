<?php

class UsersController extends BaseController
{
	public function searchStudent()
	{
		$name 			= Input::get('name');
		$isActive 		= Input::get('isActive');
		$organization 	= Input::get('organization');
		
		if($isActive != 2) {
			if($organization) {
				$students = User::where('student', '=', 1)
							->where(DB::raw('CONCAT(first_name, " ", last_name)'), 'LIKE', '%'.$name.'%')
							->where('isActive', '=', $isActive)
							->where('organization_id', '=', $organization)
							->where('administrator', '!=', 1)
							->where('isDeleted', '=', 0)
							->orderBy('first_name', 'ASC')->orderBy('last_name', 'ASC')->get()->toArray();
			} else {
				$students = User::where('student', '=', 1)
							->where(DB::raw('CONCAT(first_name, " ", last_name)'), 'LIKE', '%'.$name.'%')
							->where('isActive', '=', $isActive)
							->where('administrator', '!=', 1)
							->where('isDeleted', '=', 0)
							->orderBy('first_name', 'ASC')->orderBy('last_name', 'ASC')->get()->toArray();
			}
		} else {
			if($organization) {
				$students = User::where('student', '=', 1)
						->where(DB::raw('CONCAT(first_name, " ", last_name)'), 'LIKE', '%'.$name.'%')
						->where('organization_id', '=', $organization)
						->where('administrator', '!=', 1)
						->where('isDeleted', '=', 0)
						->orderBy('first_name', 'ASC')->orderBy('last_name', 'ASC')->get()->toArray();
			} else {
				$students = User::where('student', '=', 1)
						->where(DB::raw('CONCAT(first_name, " ", last_name)'), 'LIKE', '%'.$name.'%')
						->where('administrator', '!=', 1)
						->where('isDeleted', '=', 0)
						->orderBy('first_name', 'ASC')->orderBy('last_name', 'ASC')->get()->toArray();
			}
		}

		return Response::json($students);
	}

	public function getClassByOrganization()
	{
		$organization = Input::get('organization');

		$classes = Subject::where('organization_id', '=', $organization)
								->orderBy('name', 'ASC')->get()->toArray();

		return Response::json($classes);						
	}

	public function getStudentInfo()
	{
		$user_id = Input::get('user_id');

		$user = User::where('id', '=', $user_id)->get()->first();
		// dd($user);
		return Response::json($user);
	}

	public function postStudentInfo()
	{
		$input = Input::all();
		// return Response::json($input);
		$rules = array(
				// 'birthdate' 		=> 'required|date|date_format:m/d/Y',
				'image'             => 'mimes:jpeg,bmp,png|max:3000|image',
				// 'user_id' 			=> 'required|max:255',
				'first-name' 		=> 'required|max:255',
				'last-name' 		=> 'required|max:255',
				// 'email' 			=> 'required|max:255',
				// 'state' 			=> 'required|max:255',
				// 'country' 			=> 'required|max:255',
			);

		$validation = Validator::make($input, $rules);

		if($validation->passes()) {
			$user = ($input['user_id']) ? User::find($input['user_id']) : new User;

			if($input['image']) {
				$file = $input['image'];
				$name = str_random(60) . time() . '.jpg';
				$image = Image::make($file)->encode('jpg')->orientate()->fit(200)->save(public_path() . '/uploads/' . $name);
				$user->picture 			= URL::to('/uploads') . '/' . $name;
			}

			$user->first_name 		= $input['first-name'];
			$user->last_name 		= $input['last-name'];
			// $user->nick_name 		= $input['nickname'];
			$user->email 			= empty($input['email'])		? null : $input['email'];
			$user->birthdate 		= empty($input['birthdate'])	? null : date("Y-m-d", strtotime($input['birthdate']));
			$user->phonenumber 		= empty($input['phonenumber'])	? null : $input['phonenumber'];
			$user->street_1 		= empty($input['address']) 		? null : $input['address'];
			$user->city 			= empty($input['city']) 		? null : $input['city'];
			$user->state 			= empty($input['state']) 		? null : $input['state'];
			$user->country 			= empty($input['country']) 		? null : $input['country'];
			$user->zip 				= empty($input['zip']) 			? null : $input['zip'];
			$user->student 			= 1;
			$user->save();

			$return['user_id'] 	= $user->id;
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

	public function postDeleteStudent()
	{
		$user_id = Input::get('user_id');

		$user = User::find($user_id);
		$user->isDeleted = 1;
		$user->save();

		$return['flash']['type'] =	true;
		$return['flash']['message'] = "Successfully declined!";
		return Response::json($return);
	}

	// public function get_all_users() 
	// {
	// 	return $this->get('get_all_users');
	// }

	// public function get_users_with_ids($user_ids) 
	// {  
	// 	return $this->get('get_users_with_ids', array('user_ids' => $this->to_array($user_ids)));
	// }

	// public function get_users_that_match($constraints) 
	// {   
	// 	return $this->get('get_users_that_match', $constraints);
	// }

	// public function add_user($attributes)
	// {
	// return $this->get('add_user', $attributes);
	// }

	// public function archive_students($user_ids) 
	// {
	//   return $this->get('archive_students', array('user_ids' => $this->to_array($user_ids)));
	// }

	// public function reactivate_students($user_ids) 
	// {
	// 	return $this->get('reactivate_students', array('user_ids' => $this->to_array($user_ids)));
	// }
}