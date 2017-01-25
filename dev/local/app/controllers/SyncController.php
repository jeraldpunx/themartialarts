<?php

class SyncController extends BaseController
{

	private $lms;

	// Every run
	public function __construct(LmsHelper $lms) 
	{
		$this->lms = $lms;
	}

	public function syncAllUsers() 
	{
		$get_all_users = LmsHelper::get('get_all_users');

		foreach ($get_all_users as $db) {
			$user = User::where('martial_artsid', '=', $db->id)->first();
			if ($user === null) {
			   $user = new User;
			}

			$user->martial_artsid 		= $db->id;
			$user->username 			= $db->userid;
			$user->password 			= null;
			$user->student 				= $db->student;
			$user->teacher 				= $db->teacher;
			$user->organizer 			= $db->manager;
			$user->administrator 		= $db->administrator;
			$user->student_id 			= $db->student_id;
			$user->teacher_id 			= $db->teacher_id;
			$user->organization_id 		= $db->organization_id;
			$user->department 			= $db->department;
			$user->division 			= $db->division;
			$user->first_name 			= $db->first_name;
			$user->last_name 			= $db->last_name;
			$user->nick_name 			= $db->nick_name;
			$user->email 				= $db->email;
			$user->birthdate 			= $db->birthdate;
			$user->street_1 			= $db->street_1;
			$user->street_2 			= $db->street_2;
			$user->city 				= $db->city;
			$user->state 				= $db->state;
			$user->country 				= $db->country;
			$user->zip 					= $db->zip;
			$user->picture 				= $db->picture;
			
			// $user->assistant 			= $db->assistant;
			// $user->monitor 				= $db->monitor;
			// $user->year_of_graduation 	= $db->year_of_graduation;
			// $user->joined_at 			= $db->joined_at;
			// $user->first_login_at 		= $db->first_login_at;
			// $user->last_login_at 		= $db->last_login_at;
			// $user->logins 				= $db->logins;
			// $user->is_deleted 			= null;
			// $user->suppress 			= $db->{'report-suppress'};
			// $user->active_this_month 	= $db->active_this_month;
			// $user->franchise 			= $db->franchise;
			// $user->sms_email 			= $db->sms_email;
			// $user->skype 				= $db->skype;
			$user->save();
		}
		
	}

	public function syncAllOrganizations() 
	{
		$get_all_organizations = LmsHelper::get('get_all_organizations');

		foreach ($get_all_organizations as $db) {
			echo "<pre>";
			print_r($db);
			echo "</pre>";

			echo "--------------------------------------------------";

			$organization = Organization::where('martial_artsid', '=', $db->id)->first();
			if ($organization === null) {
			   $organization = new Organization;
			}

			// $organization->martial_artsid 	= $db->id;
			$organization->name 			= $db->name;
			$organization->description 		= $db->description;
			$organization->internal 		= $db->internal;
			$organization->picture 			= $db->picture;
			$organization->save();
		}
	}

	public function syncAllClasses() 
	{
		$get_all_classes = LmsHelper::get('get_all_classes');

		foreach ($get_all_classes as $db) {
			// echo "<pre>";
			// print_r($db);
			// echo "</pre>";

			// echo "--------------------------------------------------";

			$class = Subject::where('id', '=', $db->id)->first();
			if ($class === null) {
			   $class = new Subject;
			}

			// $organization->martial_artsid 	= $db->id;
			// $organization->name 			= $db->name;
			// $organization->description 		= $db->description;
			// $organization->internal 		= $db->internal;
			// $organization->picture 			= $db->picture;
			// $organization->save();

			$organization = Organization::where('name', '=', $db->organization)->first();
			$organization_id = ($organization === null) ? null : $organization->id;
			// echo "--------------------------------------------------";
			// echo "--------------------------------------------------";
			// echo "<pre>";
			// print_r($organization);
			// echo "</pre>";
			// echo "--------------------------------------------------";
			// echo "--------------------------------------------------";

			$class->id							= $db->id;
			$class->organization_id				= $organization_id;
			$class->name						= $db->name;
			$class->access_code					= $db->access_code;
			$class->description					= $db->description;
			$class->syllabus					= $db->syllabus;
			$class->style						= $db->style;
			$class->course_code					= $db->course_code;
			$class->section_code				= $db->section_code;
			$class->weighting_style				= $db->weighting_style;
			$class->weight_using_categories		= $db->weight_using_categories;
			$class->display_in_catalog			= $db->display_in_catalog;
			$class->catalog_category			= $db->catalog_category;
			$class->language					= $db->language;
			$class->time_zone					= $db->time_zone;
			$class->picture						= $db->picture;
			$class->save();
		}
	}


	

	public function test() 
	{
		$users = User::where('student', '=', 1)->get();
		foreach ($users as $user) {
			$return = LmsHelper::get('get_classes_enrolled_by', ['user_id' => $user->id]);
			foreach ($return as $db) {
				echo "<pre>";
				print_r($db);
				echo "</pre>";

				echo '***************';
			}
			echo "--------------------------------------------------";
		}

		// $return = LmsHelper::get('get_classes_enrolled_by', ['user_id' => $user_id]);
// $students = $API->get_classes_enrolled_by(400322);
		// foreach ($return as $db) {
		// 	echo "<pre>";
		// 	print_r($db);
		// 	echo "</pre>";

		// 	echo "--------------------------------------------------";
		// }
	}
		
}