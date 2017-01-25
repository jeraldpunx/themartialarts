<?php

class Organization extends \Eloquent {
	protected $table = 'organizations';

	public function isManager()
	{
		if($this->pivot->position == 'owner')
			return true;
		else
			return false;
	}

	public function owner()
	{
		return $this->belongsTo('User','user_id');
	}
	
	public function schools()
	{
		return $this->hasMany('School');
	}

	public function schoolsCount()
	{
    	// return $this->hasMany('School')->count();
    	return $this->hasOne('School')
		    ->selectRaw('organization_id, count(*) as aggregate')
		    ->groupBy('organization_id');
	}

	public function getSchoolsCountAttribute()
	{
		// if relation is not loaded already, let's do it first
		if ( ! array_key_exists('schoolsCount', $this->relations)) 
			$this->load('schoolsCount');

		$related = $this->getRelation('schoolsCount');

		// then return the count directly
		return ($related) ? (int) $related->aggregate : 0;
	}

	public function members()
	{
		return $this->belongsToMany('User','organization_users');
	}

	public function isMember($user)
	{
		if($this->members()->find($user->id))
			return true;
		else
			return false;
	}

	public function styles()
	{
		return $this->hasMany('Style');
	}


}
