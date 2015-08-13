<?php defined('SYSPATH') or die('No direct script access.');

class Controller_CardioType extends Controller_Template {

	public $template = 'cardiotype';
	
	public function before(){
		parent::before();
		
		$this->template->message = '';
		$this->template->result = '';
	}
	
	public function after(){
	
			$response = json_decode(Request::factory('restful/cardioType')->execute()->body());
			
			if ($response->success){
				$this->template->excercises = $response->result;
			} else {
				$this->template->message = "Error finding cardio data.";
			}
			
			parent::after();
	}
	
	public function action_index(){}
	
	public function action_submit(){
		$cardioname = Arr::get($_POST,'cardioname');
		$pasttense = Arr::get($_POST,'pasttense');			
		
		if (empty($cardioname)){
			$this->template->message = "Please enter a cardio type for submmission."; 
		} else if (empty($pasttense)){
			$this->template->message = "Please enter the past tense for submmission.";
		} else {
			$response = json_decode(Request::factory('restful/cardioType/submit')->method(Request::POST)->post(array('cardioname' => $cardioname, 'pasttense' => $pasttense))->execute()->body());
			
			if ($response->success){
				$this->template->message = "Successfully added ".$cardioname;
			} else {
				$this->template->message = "Error inserting data.";
				if ($response->error_code == 1062){
					$this->template->result = "The cardio [".$cardioname."] already exists";
				} else {
					$this->template->result = $response->message;
				}
			}
		}
	}
	
	public function action_delete(){
		$cardio_type_id = Arr::get($_POST,'cardio_type_id');

		if (empty($cardio_type_id)){
			$this->template->result = "Please select a cardio type for deletion.";
		} else {
				
			$response = json_decode(Request::factory('restful/cardioType/delete')->method(Request::POST)->post(array('cardio_type_id' => $cardio_type_id))->execute()->body());
			
			if ($response->success){
				$this->template->message = "Successfully deleted cardio";
			} else {
				$this->template->message = "Error removing cardio";
				$this->template->result = $response->message;
				error_log($response->message);
				error_log($response->error_code);
			}
		}
	}

}