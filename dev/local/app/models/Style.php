<?php

class Style extends \Eloquent {
	protected $table = 'styles';

	public function course()
	{
		return $this->hasMany('Course');
	}

	public function ranks()
	{
		return $this->hasMany('Rank')->orderBy('level', 'ASC');
	}

	public function organization()
	{
		return $this->belongsTo('Organization');
	}

	public function school()
	{
		return $this->belongsTo('School');
	}

	public function getLastRankAttribute()
	{
		return $this->ranks()->orderBy('level','DESC')->first();
	}

}
