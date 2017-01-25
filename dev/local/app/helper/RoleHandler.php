<?php
	
	class RoleHandler
	{
		protected $user;
		protected $roles;
		protected $permissions;
		protected $action;
		protected $school;



	}

	class TeacherRoleHander{

		protected $action;
		protected $user;
		protected $permissions;

		public function _construct()
		{
			$this->user = Auth::user();
			// $this->permissions = Auth::user()->
		}
		
		


	}
	
?>