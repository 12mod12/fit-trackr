<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Restful_Lifts extends Controller_Restful {

	public function action_submit(){
		
		$data = Database::execute(DB::insert('lifts', array('sets', 'reps', 'weight','lift_type_id'))->values($_POST));
		
		$this->response->body(json_encode($data));
	}
	
}
