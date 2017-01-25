<?php
use Carbon\Carbon;

class GoksTestController extends BaseController
{
	public function addAttendanceTest()
	{
		$attendance = new Attendance;
		$user = User::find(71);
		$class = Course::find(18);
		$now = Carbon::now();
		if($attendance->classes()->associate($class))
			echo "cool class";
		if($attendance->student()->associate($user))
			echo "cool student";
		
		$attendance->save();
		// if($user->attendance()->save($attendance))
		// 	echo "cool";
		// dd($class);
		// if($class->associate($attendance))
		// 	echo "too cool";

		// dd($user->classes()->get()->toArray());
		// dd($class);
	}
}

?>