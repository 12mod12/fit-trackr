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
	
	public function action_submit()
	{
		$liftname = Arr::get($_POST,'liftname');
		
		$data = Database::execute(DB::insert('lift_type', array('lift_name'))->values(array($liftname)));
		
		$this->response->body(json_encode($data));		
		
	}
	
	public function action_delete()
	{
		$lift_type_id = Arr::get($_POST,'lift_type_id');
		
		$data = Database::execute(DB::delete('lift_type')->where('lift_type_id', 'IN' , array($lift_type_id)));
		
		$this->response->body(json_encode($data));
	}
}