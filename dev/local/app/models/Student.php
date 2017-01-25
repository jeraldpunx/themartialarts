<?php
use Carbon\Carbon;

class Student extends \Eloquent {
	protected $table = 'students';
	protected $appends = array('age');

	public function teacher()
	{
		return $this->belongsToMany('Teacher','teacher_students')->withPivot('plan_id')->withPivot('rank_id')->withTimestamps();;
	}

    public function relationship()
    {
        return $this->hasMany('Relationship');
    }

	public function payments()
	{
		return $this->hasMany('');
	}

	// public function ranks()
	// {	
	// 	dd($this->teacher()->first()->pivot->rank_id);
	// 	return $this->teacher->pivot->rank_id;
	// }

	public function setAgeAttribute($value)
    {	

    	$now = Carbon::now();
    	// dd($this->attribute['birthdate']);
    	$birthdate = Carbon::parse($this->attributes['birthdate']);
        $this->attributes['age'] = $birthdate->diffInYears($now);
        // $this->attributes['age'] = $now->diffInHours($this->attributes['birthdate']);
        // return $this->attributes['age'];
    }

    public function getBirthDateAttribute($value)
    {	
    	return Carbon::parse($value);
    	// return $value;
    }

    public function getAgeAttribute($value)
    {
    	$now = Carbon::now();
    	$date = Carbon::parse($this->attributes['birthdate']);
    	$age = $date->diffInYears($now);
	
        return $age;
    	// return 
    }

    public function scopeYounger($query,$age)
    {	
    	$date = Carbon::now()->subYears($age);
    	return $query->where('birthdate', '>', $date);
    }

    public function scopeOlder($query,$age)
    {
    	$date = Carbon::now()->subYears($age);
    	return $query->where('birthdate', '<', $date);	
    }

    public function isYounger($age)
    {
    	if($this->age < $age)
    		return true;
    	else 
    		return false;	
    }

    public function isOlder($age)
    {
    	if($this->age > $age)
    		return true;
    	else
    		return false;
    }

    public function ranks()
    {
    	// //dd($this->teacher()->
    	// dd($this);
    	// // return $this->hasManyThrough('Rank','Teacher');
    	// return $this->teacher()->hasMany('Rank');
    	return $this->belongsToMany('Rank','teacher_students');

     //        ->join('ranks', 'r.user_id', '=', 'users.id')

     //        ->select('users.*');
    }

    


}	

