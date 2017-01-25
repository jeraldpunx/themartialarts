<?php

class Course extends \Eloquent {
	protected $table = 'courses';

	// public function

	// $students = User::all()->roles()->find()

	public function teacher()
	{
		return $this->hasOne('User','id','teacher_id');
	}

	public function students()
	{
		return $this->belongsToMany('User','enrollments','class_id','user_id');
	}

	

	public function style()
	{
		return $this->hasOne('Style');
	}

	public function attendance()
	{
		return $this->hasMany('Attendance');
	}

	public function enrolledIn()
	{
		
	}

}
