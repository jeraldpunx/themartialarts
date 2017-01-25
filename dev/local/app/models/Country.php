<?php

class Country extends \Eloquent {
	protected $table = 'countries';
	public $timestamps = false;

	public function states()
	{
		return $this->hasMany('State', 'country_id', 'id');
	}
}
