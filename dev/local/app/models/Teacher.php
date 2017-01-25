<?php

class Teacher extends \Eloquent {
	protected $table = 'teachers';
	public $timestamps = false;
	protected $fillable = array('user_id', 'school_id');

	public function courses()
	{
		return $this->hasMany('Course','teacher_id');
	}

	public function students()
	{
		return $this->belongsToMany('Student','teacher_students')->withPivot('plan_id')->withPivot('rank_id')->withTimestamps();
	}

	public function school()
	{
		return $this->belongsTo('School');
	}

	public function styles()
	{
		return $this->school->styles();
	}

	public function user()
	{
		return $this->belongsTo('User');
	}

}

