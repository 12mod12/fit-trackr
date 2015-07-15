<?php defined('SYSPATH') or die('No direct script access.');

class Controller_LiftType extends Controller_Template {

	public $template = 'lifttype';
	
	public function before(){
		parent::before();
		
		$this->template->message = '';
		$this->template->result = '';
	}
	
	public function after(){
	
			$response = json_decode(Request::factory('restful/liftType')->execute()->body());
			
			if ($response->success){
				$this->template->lifts = $response->result;
			} else {
				$this->template->message = "Error finding lift type data.";
				//$this->template->lifts = array();
			}
			
			parent::after();
	}
	
	public function action_index(){}
	
	public function action_submit(){
		$liftname = Arr::get($_POST,'liftname');			
		
		if (empty($liftname)){
			$this->template->message = "Please enter a lift type for submmission."; 
		} else {
			
			$response = json_decode(Request::factory('restful/liftType/submit')->method(Request::POST)->post(array('liftname' => $liftname))->execute()->body());
			
			if ($response->success){
				$this->template->message = "Successfully added ".$liftname;
			} else {
				$this->template->message = "Error inserting data.";
				if ($response->error_code == 1062){
					$this->template->result = "The lift [".$liftname."] already exists";
				} else {
					$this->template->result = $response->message;
				}
			}
		}
	}
	
	public function action_delete(){
		$lift_type_id = Arr::get($_POST,'lift_type_id');

		if (empty($lift_type_id)){
			$this->template->result = "Please select a lift type for deletion.";
		} else {
				
			$response = json_decode(Request::factory('restful/liftType/delete')->method(Request::POST)->post(array('lift_type_id' => $lift_type_id))->execute()->body());
			
			if ($response->success){
				$this->template->message = "Successfully deleted lift";
			} else {
				$this->template->message = "Error removing lift";
				$this->template->result = $response->message;
				error_log($response->message);
				error_log($response->error_code);
			}
		}
	}

}