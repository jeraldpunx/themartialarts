<?php


class Rank extends \Eloquent {
	protected $table = 'ranks';
	protected $timeStamps = false;

	public function organization()
	{
		return $this->belongsTo('Organization');
	}

	public function style()
	{
		return $this->belongsTo('Style');
	}

	public function owner()
	{
		return $this->belongsTo('User');
	}

		

}


?>