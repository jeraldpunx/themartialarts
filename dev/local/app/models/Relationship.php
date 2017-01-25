<?php

class Relationship extends \Eloquent {
	protected $table = 'user_relationships';
	public $timestamps = false;

	public function student()
	{
		return $this->belongsTo('Student','student_id','id');
	}

	public function guardian()
	{
		return $this->belongsTo('User','guardian_id','id');
	}
}