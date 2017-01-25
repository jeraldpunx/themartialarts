<?php

class Role extends \Eloquent {
	protected $table = 'roles';
	public $timestamps = false;

	public function users()
	{
		return $this->hasMany('User');
	}

	// public function isAdmin()
	// {
	// 	if($this->role_id === 1)
	// 		return true;
	// 	else
	// 		return false;
	// }
	
	// public function isTeacher()
	// {
	// 	if($this->role_id === 3)
	// 		return true;
	// 	else
	// 		return false;
	// }

	// public function isOrganizer()
	// {
	// 	if($this->role_id ===2)
	// 		return true;
	// 	else
	// 		return false;
	// }

}


