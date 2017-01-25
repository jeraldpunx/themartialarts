<?php
use Carbon\Carbon;


//
//	Attendance checked by teacher.
//
class AttendanceController extends BaseController
{	

	public function __construct()
	{
	    $this->beforeFilter('teacher');
	}

	public function timeIn()
	{
		$teacher = Auth::user();
		$student = Input::get('student_id');
		$class = Input::get('class_id');

		$today = Carbon::now();

		$attendance = Attendance::where('user_id','=',$student)
										->where('class_id','=',$class)
										->whereDate('created_at','=',Carbon::today())
										->first();
		// $attendance = Attendance::where('student_id','=','1005')
		// 							->where('class_id','=','20112')
		// 							->whereDate('date','=',Carbon::today())
		// 							->first();
		if($attendance)
		{
			return Response::json(['code' => '401', 'message' => 'you are already timed in']);
		}
		else
		{	
						
			$new_attendance = new Attendance;
			$new_attendance->user_id = $student;
			$new_attendance->class_id = $class;
			$new_attendance->created_at = Carbon::now();
			$new_attendance->updated_at = Carbon::now();
			if($new_attendance->save())
			{
				return Response::json(['code' => '200','message' => 'timed in!'],200);
			}
			else
			{
				return Response::json(['code' => '400', 'message' => 'something went wrong']);	
			}
		}
		// $attendance->student_id = $student->student_id;
		// $attendance->class_id = $class->id;
		// $attendance->isPresent = 1;



	}

	public function test()
	{
		$dtToronto = Carbon::now();
		$first = Carbon::create(2012, 9, 5, 23, 26, 11);
		// $attendance = new Attendance;
		// $attendance->date = Carbon::now();
		// $attendance->student_id = '1005';
		// $attendance->class_id = '20112';
		// $attendance->isPresent = 1;
		// $attendance->save();
		$attendance = Attendance::where('student_id','=','1005')
									->where('class_id','=','20112')
									->whereDate('date','=',Carbon::today())
									->first();
		dd($attendance->date);
		// if($first->date==$second) dd('today');
		// dd($dtToronto->toFormattedDateString());
	}

	public function cancelTimeIn()
	{
		$student = Input::get('student_id');
		$class = Input::get('class_id');
		
		$attendance = Attendance::where('user_id','=',$student)
										->where('class_id','=',$class)
										->whereDate('created_at','=',Carbon::today())
										->first();
		if($attendance)
		{	
			$attendance->delete();
		}
		else
		{
			return Response::json(['code' => '400', 'message' => 'student not timed in']);
		}
		
		return Response::json(['code' => '200', 'message' => 'success'],200);						
	}


	public function viewStudents()
	{	
		$page_title = 'attendance';
		// return View::make('about', compact('page_title'));

		$classes = Auth::user()->classesManaged()->get()->toArray();	
		echo "<pre>";
		print_r($classes);
		echo "</pre>";

		return View::make('attendance.checkAttendance',compact('page_title'));
	}

	public function viewClass($number)
	{			
		$page_title = 'attendance';
		// return View::make('about', compact('page_title'));
		// dd(Auth::user());
		$class = Auth::user()->classesManaged()->find($number);
		// dd($class);
		// dd($class[1]);
		$students = $class->students()->get()->toArray();
		// dd($students);
		// echo "<pre>";
		// print_r($classes['time_in']);
		// echo "</pre>";
		// $class = $class->toArray();
		// dd($class);
		return View::make('attendance.checkAttendance',compact('page_title','students','class'));
	}

	public function checkIfLate()
	{
		$classes = Auth::user()->classesManaged()->get()->toArray();

		$time_in = Carbon::createFromFormat('H:i:s',$classes['1']['time_in']);
		$time_out = Carbon::createFromFormat('H:i:s',$classes['1']['time_out']);
		// dd($time_in->diffInHours());
		$minutes = $time_in->diffInMinutes($time_out);
		dd($minutes);
		$now = Carbon::now();
		if($now->addMinutes($minutes) > $time);
			dd('late');
		dd($time,$now);
	}
	

	


}

?>