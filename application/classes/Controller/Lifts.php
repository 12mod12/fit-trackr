<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Lifts extends Controller_Template {

//TODO set up routes and move this to a "Template" folder

	public $template = 'lifts';
	
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
			}
			
			parent::after();
	}
	
	public function action_index()
	{
			$this->template->message = 'welcome to lift-city';	
	}
	
	public function action_submit()
	{
		if (in_array("", $_POST)) {
			$this->template->message = "Please fill all forms before submitting";
		} else {
			$response = json_decode(Request::factory('restful/lifts/submit')->method(Request::POST)->post($_POST)->execute()->body());
			
			if ($response->success){
				$this->template->message = "Lift #:".$response->result[0]." successfully added!";
			} else {
				$this->template->message = $response->message;
			}
		}
	}
}