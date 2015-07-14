<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Restful_LiftType extends Controller_Restful {
	public function action_index()
	{
			$data = Database::execute(DB::select()->from('lift_type'));
			$result = array();  
			
			if ($data->success){
				foreach ($data->result as $lift){
					$result[] = $lift;
				}
			} 
			
			$data->result = $result;
			$this->response->body(json_encode($data));
		
	}
	
	public function action_test()
	{
		$liftname = Arr::get($_POST,'liftname');
		
		$data = Database::execute(DB::insert('lift_type', array('lift_name'))->values(array($liftname)));
		
		if ($data->success){
			//if commit is success, return the liftname and id of successful commite
		} else {
			//otherwise add the error string and the exeception code
		}

		$this->response->body(json_encode($data));		
		
	}
}