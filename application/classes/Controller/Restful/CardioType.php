<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Restful_CardioType extends Controller_Restful {
	public function action_index()
	{
			$data = Database::execute(DB::select()->from('cardio_type'));
			$result = array();  
			
			if ($data->success){
				foreach ($data->result as $cardio){
					$result[$cardio['cardio_type_id']] = $cardio;
				}
			} 
			
			$data->result = $result;
			$this->response->body(json_encode($data));
		
	}
	
	public function action_submit()
	{
		$cardioname = Arr::get($_POST,'cardioname');
		$pasttense = Arr::get($_POST, 'pasttense');
		
		$data = Database::execute(DB::insert('cardio_type', array('cardio_name','past_tense'))->values(array($cardioname,$pasttense)));
		
		$this->response->body(json_encode($data));		
		
	}
	
	public function action_delete()
	{
		$cardio_type_id = Arr::get($_POST,'cardio_type_id');
		
		$data = Database::execute(DB::delete('cardio_type')->where('cardio_type_id', 'IN' , array($cardio_type_id)));
		
		$this->response->body(json_encode($data));
	}
}