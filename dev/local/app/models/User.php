<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	protected $table = 'users';
	protected $hidden = array('password', 'remember_token');
	protected $appends = array('name','address');

	public function classes()
	{
		return $this->belongsToMany('Course','enrollments','user_id','class_id');
	}	

	public function classesManaged()
	{	
		// return $this->hasMany('Course','teacher_id','id');
		return $this->hasMany('Course','teacher_id','id')->orderBy('time_in');
	}

	public function classmates()
	{

	}

	public function organizations()
	{
		return $this->belongsToMany('Organization','organization_users');
	}

	public function role()
	{
		return $this->belongsTo('Role');
	}


	// public function isAdmin()
	// {
	// 	if($this->administrator == 1)
	// 		return true;
	//	 	else
	// 		return false;
	// }

	// public function isTeacher()
	// {
	// 	if($this->teacher == 1)
	// 		return true;
	// 	else
	// 		return false;
	// }

	// public function isOrganizer()
	// {
	// 	if($this->organizer == 1)
	// 		return true;
	// 	else
	// 		return false;
	// }
	public function getNameAttribute()
	{
		return "$this->first_name $this->last_name";
	}

	public function getAddressAttribute()
	{
		return "$this->country $this->city $this->state $this->street";
	}
	
	public function scopeAdmin($query)
	{
		return $query->where('adminstrator','=',1);
	}

	public function scopeTeacher($query)
	{
		return $query->where('teacher','=',1);
	}

	public function scopeOrganizer($query)
	{
		return $query->where('organizer','=',1);
	}


	public function isStudent()
	{
		$role = $this->where('role_id','=',4);
		if($role)
			return true;
		else
			return false;
	}

	public function isAdmin()
	{
		$role = $this->where('role_id','=',1);
		if($role)
			return true;
		else
			return false;
	}	
	

	public function isOrganizer()
	{
		$role = $this->where('role_id','=',2);
		if($role)
			return true;
		else
			return false;
	}

	public function isTeacher()
	{	
		$role = $this->where('role_id','=',3);
		if($role)
			return true;
		else
			return false;
	}


	public function canGrade()
	{
		
	}

	public function attendance()
	{
		return $this->hasMany('Attendance');
	}

	public function teacher()
	{	
		return $this->hasOne('Teacher');
	}

	public function organization()
	{
		return $this->hasOne('Organization');
	}

	public function school()
	{
		return $this->hasOne('School');
	}

	public function relationship()
	{
		return $this->hasMany('Relationship','student_id');
	}
}
	