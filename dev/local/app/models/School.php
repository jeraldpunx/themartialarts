<?php

class School extends \Eloquent {
	protected $table = 'schools';
	protected $appends = array('owner');
	public function organization()
	{
		return $this->belongsTo('Organization');
	}

	public function styles()
	{
		return $this->hasMany('Style');
	}

	public function owner()
	{
		return $this->belongsTo('User','user_id');
	}

	public function getOwnerAttribute()
	{
		return $this->owner();
	}

	public function teachers()
	{
		return $this->hasMany('Teacher');
	}
}
