<?php
use Carbon\Carbon;
class SearchController extends BaseController
{
	public function search()
	{


		// $item = new SearchFilter;
		// $filters = Input::get('filters');
		// $filters = ['first_name'=>'aw', ];
		// $
		// isActive = 2
		// 0 = inactive
		// 1 = active 
		// 2 = all

		// if(2)
		//dd($item);

		$countries = Country::leftJoin('states', 'states.country_id', '=', 'countries.id')
						->leftJoin('cities', 'cities.state_id', '=', 'states.id')
						->orWhere(function($query) use ($filters){
							foreach ($filters as $key => $value) {
								$query->where($key, 'LIKE', $value);
							}
  						})
						 ->take(30);

	}

	// public function 	

}

?>