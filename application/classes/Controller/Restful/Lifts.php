<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Restful_Lifts extends Controller_Restful {

	public function action_index()
	{
			$data = Database::execute(DB::select()->from('lifts'));
			$result = array();  
			
			if ($data->success){
				foreach ($data->result as $lift){
					$result[] = $lift;
				}
			} 
			
			$data->result = $result;
			$this->response->body(json_encode($data));
		
	}
	
	public function action_submit(){
		
		$data = Database::execute(DB::insert('lifts', array('sets', 'reps', 'weight','lift_type_id'))->values($_POST));
		
		$this->response->body(json_encode($data));
	}
	
	public function action_delete(){
	
		$lift_id = Arr::get($_POST,'lift_id');
		
		$data = Database::execute(DB::delete('lifts')->where('lift_id', 'IN' , array($lift_id)));
		
		$this->response->body(json_encode($data));
	
	}
	
}
