<?php
namespace app\helper;

class SearchFilter
{	
	protected $user;
	protected $filters;
	protected $searchType;
	protected $searchConstraint;

	public function _construct()
	{
		$this->user = Auth::user();
		$this->searchConstraint = $this->user;
	}

	public function addFilter($filter == [])
	{
		$this->filters = array_push($filters, $filter);
	}

	public function setSearchType()
	{
		
	}



	public function execute()
	{	
		$filters = $this->filters;
		DB::table($this->searchType)		
		->Where(function($query) use ($filters)
		{
		    // for($i=0;$i<count($heightarray);i++){
		    //    if($i==0){
		    //       $query->whereBetween('height', $heightarray[$i]);
		    //    }else{
		    //       	$query->orWhereBetween('height', $heightarray[$i]);
		    //    }
		    // }
		    foreach ($filters as $key => $value) {
		    	$query->where($key,'=',$value);
		    }
		})->get();
	}

	
}

?>