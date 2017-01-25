<?php

use Carbon\Carbon;

View::share('countries', Country::orderBy('country_name', 'ASC')->get());

Route::get('/', ['as'=>'home', 'uses'=>function()
{
    $page_title = "Home";
    $test = "test";
    if(Auth::check()) {

        if(Auth::user()->role_id == 1)
            return Redirect::to('admin');
        else if(Auth::user()->role_id == 3)
            return Redirect::route('instructor_home');
        else if(Auth::user()->role_id == 2)
            return Redirect::route('org/home');
        else if(Auth::user()->role_id == 5)
            return Redirect::route('owner_home');
        else {
            $organizations = Organization::orderBy('name', 'ASC')->get();
            $students = User::where('role_id', '=', 4)->orderBy('first_name', 'ASC')->get()->toArray();

            // SELECT * FROM `user_roles` LEFT JOIN users ON users.id = user_roles.user_id WHERE role_id = 4
            return View::make('instructor.index', compact('page_title', 'organizations', 'students'));
        }
    } else {
        $page_title = 'The Martial Arts Company';
        return View::make('auth.login', compact('page_title'));
    }
}]);

Route::group(array('before'=>'guest'), function(){
    Route::get('login', 							['as'=>'login', 			'uses'=>'HomeController@getLogin']);
    Route::post('login', 							['as'=>'login', 			'uses'=>'HomeController@postLogin']);
    // Route::get('register', 							['as'=>'register', 			'uses'=>'HomeController@getRegister']);
    Route::get('register/user', 					['as'=>'register_user', 	'uses'=>'HomeController@getRegisterUser']);
    Route::get('register/lawyer', 					['as'=>'register_lawyer', 	'uses'=>'HomeController@getRegisterLawyer']);
    Route::post('register/user', 					['as'=>'register_user', 	'uses'=>'HomeController@postRegisterUser']);
    Route::post('register/lawyer', 					['as'=>'register_lawyer', 	'uses'=>'HomeController@postRegisterLawyer']);
    Route::get('registration/verify/{confirmation}', ['as'=>'verify', 			'uses'=>'HomeController@verify']);
    Route::get('password/email', 					['as'=>'remind', 			'uses'=>'HomeController@getRemind']);
    Route::post('password/email', 					['as'=>'remind', 			'uses'=>'HomeController@postRemind']);
    Route::get('password/reset/{token}', 			['as'=>'reset', 			'uses'=>'HomeController@getReset']);
    Route::post('password/reset/{token}', 			['as'=>'reset', 			'uses'=>'HomeController@postReset']);
});
Route::get('logout', 							['as'=>'logout', 					'uses'=>'HomeController@postLogout']);

Route::get('sync_all_users', 			'SyncController@syncAllUsers');
Route::get('sync_all_organizations', 	'SyncController@syncAllOrganizations');
Route::get('sync_all_classes', 			'SyncController@syncAllClasses');


Route::get('json/getStateByCountry', 			['as'=>'json/getStateByCountry', 		'uses'=>'HomeController@getStateByCountry']);
Route::get('json/getCityByState', 				['as'=>'json/getCityByState', 			'uses'=>'HomeController@getCityByState']);
Route::get('json/getUserInfo',                  ['as'=>'json/getUserInfo',              'uses'=>'HomeController@getUserInfo']);
Route::get('json/searchGuardianAndStudents',    ['as'=>'json/searchGuardianAndStudents',              'uses'=>'InstructorController@searchGuardianAndStudents']);
Route::get('json/getRelationInfo',              ['as'=>'json/getRelationInfo',              'uses'=>'InstructorController@getRelationInfo']);
Route::get('json/studentRelationships',         ['as'=>'json/studentRelationships',              'uses'=>'InstructorController@studentRelationships']);
Route::post('json/deleteRelationship',           ['as'=>'json/deleteRelationship',              'uses'=>'InstructorController@deleteRelationship']);
Route::get('showStyleRanks',                    ['as'=>'json/showStyleRanks', 'uses'=>'SchoolOwnerController@showStyleRanks']);
Route::get('json/showStyleWithRanks',       ['as'=>'instructor_json_showStyleWithRanks',    'uses'=>'InstructorController@showStyleWithRanks']);
Route::get('json/getStyleWithRankByRankID', ['as'=>'instructor_json_getStyleWithRankByRankID', 'uses'=>'InstructorController@getStyleWithRankByRankID']);
Route::get('json/addRelationship',          ['as'=>'instructor_json_addRelationship',       'uses'=>'InstructorController@addRelationship']);
Route::get('json/editRelationship',         ['as'=>'instructor_json_editRelationship',       'uses'=>'InstructorController@editRelationship']);

// instructor routes
Route::group(['prefix' => 'instructor', 'before'=>'instructor'], function(){
	Route::get('/', 					['as'=>'instructor_home', 'uses'=>'InstructorController@home']);
	

	Route::get('json/showStudent', 				['as'=>'instructor_json_showStudent', 			'uses'=>'InstructorController@showStudent']);
    Route::post('json/postStudent',             ['as'=>'instructor_json_postStudent',       'uses'=>'InstructorController@postStudent']);
	
	Route::get('json/addRank', 					['as'=>'instructor_json_addRank', 				'uses'=>'InstructorController@addRank']);
	
	Route::post('json/deleteStudent', 			['as'=>'instructor_json_deleteStudent', 		'uses'=>'InstructorController@deleteStudent']);
	Route::post('json/promoteStudentStyle', 	['as'=>'instructor_json_promoteStudentStyle', 	'uses'=>'InstructorController@promoteStudentStyle']);
    
    


	Route::get('test', 					['as'=>'instructor_test', 'uses'=>'InstructorController@test']);
	Route::get('json/searchstudent', 				['as'=>'json/searchstudent', 			'uses'=>'UsersController@searchStudent']);
	Route::get('json/getClassByOrganization', 		['as'=>'json/getClassByOrganization', 	'uses'=>'UsersController@getClassByOrganization']);
	Route::get('json/getStudentInfo', 				['as'=>'json/getStudentInfo', 			'uses'=>'UsersController@getStudentInfo']);
	Route::post('json/postStudentInfo', 			['as'=>'json/postStudentInfo', 			'uses'=>'UsersController@postStudentInfo']);
	Route::post('json/postDeleteStudent', 			['as'=>'json/postDeleteStudent', 		'uses'=>'UsersController@postDeleteStudent']);
});
//end instructor routes

// owner routes
Route::group(['prefix' => 'owner', 'before'=>'owner'], function(){
    Route::get('/',                 ['as'=>'owner_home', 'uses'=>'SchoolOwnerController@home']);
    Route::get('styles',            ['as'=>'owner_styles', 'uses'=>'SchoolOwnerController@stylesAndRanks']);
    Route::get('students/{user_id?}',          ['as'=>'owner_students', 'uses'=>'SchoolOwnerController@students']);

    Route::get('json/showInstructorStudents',   ['as'=>'owner_json_showInstructorStudents', 'uses'=>'SchoolOwnerController@showInstructorStudents']);
    Route::get('json/showInstructorProfile',    ['as'=>'owner_json_showInstructorProfile', 'uses'=>'SchoolOwnerController@showInstructorProfile']);
    Route::post('json/postInstructor',          ['as'=>'owner_json_postInstructor', 'uses'=>'SchoolOwnerController@postInstructor']);
    Route::post('json/postChangePasswordInstructor', ['as'=>'owner_json_changePasswordInstructor', 'uses'=>'SchoolOwnerController@postChangePasswordInstructor']);

    Route::get('json/showStudent',              ['as'=>'owner_json_showStudent',       'uses'=>'SchoolOwnerController@showStudent']);
    Route::post('json/postStudent',             ['as'=>'owner_json_postStudent',       'uses'=>'SchoolOwnerController@postStudent']);
    Route::post('json/deleteStudent',           ['as'=>'owner_json_deleteStudent',     'uses'=>'SchoolOwnerController@deleteStudent']);
    Route::post('json/promoteStudentStyle',     ['as'=>'owner_json_promoteStudentStyle',   'uses'=>'SchoolOwnerController@promoteStudentStyle']);
    

    // Route::get('json/showStudent',              ['as'=>'instructor_json_showStudent',           'uses'=>'InstructorController@showStudent']);
    // Route::get('json/showStyleWithRanks',       ['as'=>'instructor_json_showStyleWithRanks',    'uses'=>'InstructorController@showStyleWithRanks']);
    // Route::get('json/addRank',                  ['as'=>'instructor_json_addRank',               'uses'=>'InstructorController@addRank']);
    // Route::get('json/getStyleWithRankByRankID', ['as'=>'instructor_json_getStyleWithRankByRankID', 'uses'=>'InstructorController@getStyleWithRankByRankID']);
    // Route::post('json/deleteStudent',           ['as'=>'instructor_json_deleteStudent',         'uses'=>'InstructorController@deleteStudent']);
    // Route::post('json/promoteStudentStyle',     ['as'=>'instructor_json_promoteStudentStyle',   'uses'=>'InstructorController@promoteStudentStyle']);
    // Route::get('json/addRelationship',          ['as'=>'instructor_json_addRelationship',       'uses'=>'InstructorController@addRelationship']);
    // Route::get('json/editRelationship',         ['as'=>'instructor_json_editRelationship',       'uses'=>'InstructorController@editRelationship']);


    // Route::get('test',                  ['as'=>'instructor_test', 'uses'=>'InstructorController@test']);
    // Route::get('json/searchstudent',                ['as'=>'json/searchstudent',            'uses'=>'UsersController@searchStudent']);
    // Route::get('json/getClassByOrganization',       ['as'=>'json/getClassByOrganization',   'uses'=>'UsersController@getClassByOrganization']);
    // Route::get('json/getStudentInfo',               ['as'=>'json/getStudentInfo',           'uses'=>'UsersController@getStudentInfo']);
    // Route::post('json/postStudentInfo',             ['as'=>'json/postStudentInfo',          'uses'=>'UsersController@postStudentInfo']);
    // Route::post('json/postDeleteStudent',           ['as'=>'json/postDeleteStudent',        'uses'=>'UsersController@postDeleteStudent']);
});
//end owner routes

// organizer routes
Route::group(['prefix' => 'organizer', 'before'=>'organizer'], function(){
    Route::get('/', 					['as'=>'organizer/home', 'uses'=>'OrganizerController@home']);
    Route::get('schools/{id}/show', ['as' => 'school/show', 'uses' => 'OrganizerController@showSchool']);
    Route::get('schools/{id}/addowner', ['as' => 'school/addowner', 'uses' => 'OrganizerController@ViewAddSchoolOwner']);
    Route::post('schools/{id}/addowner', ['as' => 'school/addowner', 'uses' => 'OrganizerController@setSchoolOwner']);
    Route::get('schools/add', ['as' => 'schools/add', 'uses' => 'OrganizerController@viewAddSchool']);
    Route::post('schools/add', ['as' => 'schools/post', 'uses' => 'OrganizerController@addSchool']);
    Route::get('json/autocomplete/users',['as' => 'json/users', 'uses' => 'OrganizerController@usersAutocomplete']);
});
//end organizer routes





// admin routes
Route::group(['prefix' => 'admin', 'before'=>'admin'], function() {

    Route::get('/',	 'AdminController@home');

    //organization related routes
    Route::get('organizations', 				['as'=>'admin/organizations', 				'uses'=>'AdminController@organizations']);
    Route::get('organizations/{id}/show', ['as' => 'organizations/show', 'uses' => 'AdminController@showOrganization']);
    Route::get('json/getOrganizationInfo', 		['as'=>'admin/json/getOrganizationInfo', 	'uses'=>'AdminController@getOrganizationInfo']);
    Route::post('json/postOrganizationInfo', 	['as'=>'admin/json/postOrganizationInfo', 	'uses'=>'AdminController@postOrganizationInfo']);
    Route::post('json/deleteOrganization', 		['as'=>'admin/json/deleteOrganization', 	'uses'=>'AdminController@deleteOrganization']);
    //end

    //user related routes
    Route::get('users/{id}/show',['as' => 'users/show', 'uses' => 'AdminController@showUser']);
    //end

    //school related routes
    Route::get('schools', 	['as'=>'admin/schools', 'uses'=>'AdminController@schools']);
    Route::get('json/getSchoolInfo', 	['as'=>'admin/json/getSchoolInfo', 	'uses'=>'AdminController@getSchoolInfo']);
    Route::get('schools/{id}/show', ['as' => 'students/show', 'uses' => 'AdminController@showSchool']);
    Route::post('json/postSchoolInfo', 	['as'=>'admin/json/postSchoolInfo', 'uses'=>'AdminController@postSchoolInfo']);
    Route::post('json/deleteSchool', 	['as'=>'admin/json/deleteSchool', 	'uses'=>'AdminController@deleteSchool']);
    //end
    Route::get('/testing', 'AdminController@home');
});
// end admin routes

Route::get('goks/test',function(){

});

Route::get('gokstest/addattendance','GoksTestController@addAttendanceTest');
Route::get('gokstest/viewstudents/{number}','AttendanceController@viewClass');
Route::post('api/testajax','AttendanceController@timeIn');

Route::get('test', function(){
    $users = User::all();
    $faker = Faker\Factory::create();

    foreach ($users as $user) {
        $user->role_id = $faker->randomElement([1,2,3,4]);
        $user->save();
    }
});

Route::get('testrani', function()
{
    $school = School::find(1);
    dd($school);
});

Route::get('org/schools', 'GoksController@viewSchools');

Route::get( 'org/home',['as' => 'org/home','uses' => 'GoksController@dashboard']);

Route::get('org/styles', 'GoksController@viewStyles');

Route::get('register', ['as' => 'register', 'uses' => 'GoksController@viewRegister']);
Route::post('org/addstyle', 'GoksController@saveStyleAndRanks');
Route::post('org/style/edit', 'GoksController@updateStyleAndRanks');
Route::post('try/orgtest', 'GoksController@registerOrganization');

Route::get('json/ranks', ['as' => 'json/ranks', 'uses' => 'GoksController@getRanks']);
Route::get('try/provider', 'GoksTestController@testProvider');
Route::get('javascript/test','GoksTestController@testJavascript');
Route::get('try/service', 'GoksTestController@testServiceProvider');

Route::post('addschool', ['as' => 'org/school/add', 'before' => 'organizer', 'uses' => 'GoksController@addSchool']);