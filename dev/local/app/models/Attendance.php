<?php

class Attendance extends \Eloquent {
	protected $table = 'attendances';
	public $timestamps = false;

	public function classes()
	{
		return $this->belongsTo('Course','class_id');
	}

	public function student()
	{
		return $this->belongsTo('User','user_id');
	}



	
}
