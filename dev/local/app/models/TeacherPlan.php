<?php

class TeacherPlan extends \Eloquent {
	protected $table = 'plans';

	public function teacher()
	{
		return $this->belongsTo('Teacher);
	}
}
