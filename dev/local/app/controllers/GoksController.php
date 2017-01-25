<?php



class GoksController extends BaseController {

	protected $newUserManager;

	/* Organizer functions */
	public function __construct(NewUser $newUserManager)
	{
		$this->newUserManager = $newUserManager;
	}

	public function viewRegister()
	{
		$page_title = 'register';
		return View::make('organizer.register',compact('page_title'));
	}

	public function viewStyles()
	{
		$organization = Auth::user()->organization;
		$page_title = 'organization styles';
		$styles = $organization->styles()->with('ranks')->get();

//		foreach($styles as $style)
//		{
//			echo $style->name.'<br>';
//			foreach($style->ranks as $rank)
//			{
//				echo $rank->name;
//			}
//			echo '<br>';
//		}

		return View::make('organizer.addStyles', compact('page_title','styles'));
//		dd($styles);
	}

	public function registerOrganization()
	{

		$style_data = (!Input::get('styles')) ? [] : Input::get('styles');
		$org_data = (!Input::get('org')) ? [] : Input::get('org');
		$owner_data = (!Input::get('owner')) ? [] : Input::get('owner');

//		$style_rules = array(
//
//				'style_description' => 'max:300'
//		);
//		$style_validator = Validator::make($style_data, $style_rules);
//		if ($style_validator->fails()) return Response::json($style_validator->messages());
//		return $style_data;
//		return [
//			'style' => $style_data,
//			'org_data' => $org_data,
//			'owner_data' => $owner_data
//		];

		$rank_rules = [
				'rank_name' => 'required',
				'pattern' => 'required',
				'primary_color' => 'required'
		];
		$style_rules = array(
				'style_name' => 'required',
				'style_description' => 'max:300'
		);

		$org_rules = [
				'name' => 'required',
				'description' => 'max:300'
		];

		$owner_rules = [
				'first_name' => 'required',
				'last_name' => 'required',
				'email' 	=> 'required|email|unique:users',
				'contact_number' => 'required|numeric',
				'password' => 'required'
		];

		$org_validator = Validator::make($org_data,$org_rules);

		$user_validator = Validator::make($owner_data,$owner_rules);


		if($org_validator->fails()) return Response::json($org_validator->messages());

		if($user_validator->fails()) return Response::json($user_validator->messages());


		//instantiate org
		$org = new Organization();
		$org->name = $org_data['name'];
		$org->description = $org_data['description'];

		//instantiate user
		$owner = new User();
		$owner->first_name = $owner_data['first_name'];
		$owner->last_name = $owner_data['last_name'];
		$owner->email = $owner_data['email'];
		$owner->contact_number = $owner_data['contact_number'];
		$owner->role_id = 2;
		$owner->password = Hash::make($owner_data['password']);


//		if(!$org->save())
//		{
//			return Response::json(array('status' => '400', 'message' => 'org related error'));
//		}

		if($style_data) {

			$style_validator = Validator::make($style_data[0], $style_rules);
			if ($style_validator->fails()) return Response::json($style_validator->messages());
			//instantiate style
			$style = new Style();
			$style->name = $style_data[0]['style_name'];
			$style->description = $style_data[0]['style_description'];
			$style->save();


			if(!$owner->save())
			{
				return Response::json(array('status' => '400', 'message' => 'owner related error'));
 			}


 			$org->owner()->associate($owner);
			if($org->save())
			{
				//@todo fallback safety methods to run
				//$this->newUserManager->create($owner);
			}
			if(!$org->styles()->save($style))
			{
				return Response::json(array('status' => '400', 'message' => 'style related error'));
			}

			if(isset($style_data[0]['ranks']))
			{
				foreach($style_data[0]['ranks'] as $rank)
				{
					$rank_validator = Validator::make($style_data[0]['ranks'], $rank_rules);
					if($rank_validator->fails())
					{
						$new_rank = new Rank;
						$new_rank->name = $rank['rank_name'];
						$new_rank->type = $rank['pattern'];
						$new_rank->level = $rank['priority'];
						$new_rank->primary_color = $rank['primary_color'];
						$new_rank->secondary_color = (!isset($rank['secondary_color'])) ? [] : $rank['secondary_color'];
						$style->ranks()->save($new_rank);
					}
				}
			}
		}

		Auth::login($owner);

		return Response::json(['status' => 200]);
	}



	public function setOwnerToOrg()
	{
		$inputs  = Input::all();
		$owner = new User();
		$user_rules = [
				'first_name' => 'required',
				'last_name' => 'required',
				'email' 	=> 'required',
				'contact_number' => 'required'
		];

		$validator = Validator::make($inputs,$user_rules);

		if($validator->fails())
		{
			return Response::json(array('code' => '400', 'message' => $validator->messages()));
		}

		$owner->first_name = $inputs['first_name'];
		$owner->last_name = $inputs['last_name'];
		$owner->email = $inputs['email'];
		$owner->contact_number = $inputs['contact_number'];

	}

	public function getRanks()
	{
		$style_id = Input::get('style');

		$style = Style::find($style_id);
		$ranks = $style->ranks;

		return Response::json($ranks);
	}



	public function saveStyleAndRanks()
	{
		// @TODO
		// save ranks to existing STYLE
		$inputs = Input::all();
		$org = Auth::user()->organization;
		$style = $inputs['style'];


		$style_rules = [
				'name' => 'required',
				'description' => 'required'
		];

		$rank_rules = [
				'name' => 'required',
				'level' => 'required|numeric|min:1',
				'type' => 'required',
				'primary_color' => 'required'
		];
		$style_validator = Validator::make($style,$style_rules);

		if($style_validator->fails()) return Response::json(array('status' => '400', 'message' => 'error occured when saving style'));


		$new_style = new Style;
		$new_style->name = $style['name'];
		$new_style->description = $style['description'];
		$org->styles()->save($new_style);

		if(isset($inputs['ranks'])) {

			foreach ($inputs['ranks'] as $key => $rank) {
				$validator = Validator::make($rank, $rank_rules);
				if ($validator->fails()) return Response::json(array('status' => '400', 'message' => $validator->messages()));
			}

			foreach ($inputs['ranks'] as $new_rank) {

				$rank = new Rank;
				$rank->name = $new_rank['name'];
				$rank->level = $new_rank['level'];
				$rank->primary_color = $new_rank['primary_color'];
				$rank->secondary_color = (isset($new_rank['secondary_color'])) ? $new_rank['secondary_color'] : NULL;
				$rank->type = $new_rank['type'];
//			dd($new_style->ranks()->save($rank));
				$new_style->ranks()->save($rank);
				$rank->save();
			}
		}

		return Response::json(array('status' =>200,'data' => $new_style));
	}


	/**
	 * @return mixed
     */
	public function updateStyleAndRanks()
	{
		// @TODO
		// save ranks to existing STYLE
		$inputs = Input::all();
//		return $inputs;
		$style = Style::find($inputs['style']['id']);

		if(!$style) return Response::json(array('code' => '400', 'message' => 'style doesnt exist'));

		$style_rules = [
				'name' => 'required',
				'description' => 'required'
		];

		$style_validator = Validator::make($inputs['style'],$style_rules);

		if($style_validator->fails()){
			return Response::json(array('code' => '400', 'message' => $style_validator->messages()));
		}

		$style->name = $inputs['style']['name'];
		$style->description = $inputs['style']['description'];
		$style->update();


		$style->ranks()->delete();

		$rank_rules = [
				'name' => 'required',
				'level' => 'required|numeric|min:1',
				'type' => 'required',
				'primary_color' => 'required',
				'style_id' => 'min:1'
		];

		if(isset($inputs['ranks'])) {

			foreach ($inputs['ranks'] as $key => $rank) {
				$validator = Validator::make($rank, $rank_rules);
				if ($validator->fails()) return Response::json(array('code' => '400', 'message' => $validator->messages()));
			}

			foreach ($inputs['ranks'] as $key => $new_rank) {
				$rank = new Rank;
				$rank->name = $new_rank['name'];
				$rank->level = $new_rank['level'];
				$rank->primary_color = $new_rank['primary_color'];
				$rank->secondary_color = (isset($new_rank['secondary_color'])) ? $new_rank['secondary_color'] : NULL;
				$rank->type = $new_rank['type'];
				$style->ranks()->save($rank);
			}
		}
	}

	public function deleteStyle()
 	{
 		$style_id = Input::get('style_id');
 		$style = Style::find($style_id);
 		if(!$style)
 		{
 			return Response::json(['status' => '404', 'message' => 'style not found']);
 		}

		if($style->delete())
		{
				return Response::json(['status' => '200', 'message' => 'delete successful']);
 		}

 		return Response::json(['status' => '403', 'message' => 'delete unsuccessful']);
	}

	public function viewSchools()
 	{
 		$page_title = 'schools';
 		$organization = Auth::user()->organization;
 		$schools = $organization->schools;

 		return View::make('organizer.schools',compact('page_title','schools'));
 	}

	public function addSchool()
 	{
		$organizer = Auth::user();
		$org = $organizer->organization;
		$data = Input::all();

		$owner_rules = [
					'first_name' => 'required',
					'last_name' => 'required',
					'email' => 'required',
					'contact_no' => 'required',
					'country' => 'required'
		];

		$school_rules = [
					'name' => 'required',
					'country' => 'required',
					'contact_no' => 'required'
		];

		$school = $data['school'];
		$owner = $data['owner'];

		$school_validator = Validator::make($school,$school_rules);
		$owner_validator = Validator::make($owner,$owner_rules);

		if($school_validator->fails())
		{
					return Response::json(['status' => 400, 'message' => $school_validator->messages()]);
 		}

 		if($owner_validator->fails())
		{
					return Response::json(['status' => 400, 'message' => $owner_validator->messages()]);
 		}

 		$newSchool = new School;
 		$newSchool->name = $school['name'];
 		$newSchool->country = $school['country'];
 		$newSchool->state = $school['state'];
 		$newSchool->city = $school['city'];
 		$newSchool->street = $school['street'];
 		$newSchool->contact_number = $school['contact_no'];

 		$newOwner = new User;
 		$newOwner->first_name = $owner['first_name'];
 		$newOwner->last_name = $owner['last_name'];
 		$newOwner->country = $owner['country'];
 		$newOwner->city = $owner['city'];
 		$newOwner->street = $owner['street'];
 		$newOwner->contact_number = $owner['contact_no'];
 		$newOwner->email = $owner['email'];
 		$newOwner->birthdate = $owner['birthdate'];

 		$newOwner->save();
 		$newOwner->school()->save($newSchool);
 		$newSchool->organization()->associate($org);
 		$newSchool->save();

 		return Response::json(['status' => 200, 'message' => 'success', 'payload' => $newSchool]);
 		return [$school,$owner];
 	}

	/* end Organizer functions */

	/** @integration organizer side **/

	public function dashboard()
	{
		$page_title = 'organizer dashboard';
		return View::make('organizer.dashboard',compact('page_title'));
	}
}
