<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Restful_Cardio extends Controller_Restful {

	public function action_index()
	{
			$data = Database::execute(DB::select()->from('cardio'));
			$result = array();  
			
			if ($data->success){
				foreach ($data->result as $cardio){
					$result[] = $cardio;
				}
			} 
			
			$data->result = $result;
			$this->response->body(json_encode($data));
		
	}
	
	public function action_submit(){
		
		$data = Database::execute(DB::insert('cardio', array('duration_hours', 'duration_minutes', 'duration_seconds','distance','burned_calories','cardio_type_id'))->values($_POST));
		
		$this->response->body(json_encode($data));
	}
	
	public function action_delete(){
	
		$cardio = Arr::get($_POST,'cardio');
		
		$data = Database::execute(DB::delete('cardio')->where('cardio_id', 'IN' , $cardio));
		
		$this->response->body(json_encode($data));
	
	}
	
}
