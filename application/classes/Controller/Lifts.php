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
				//$this->template->lifts = array();
			}
			
			parent::after();
	}
	
	public function action_index()
	{
			
			$this->template->message = 'welcome to lift-city';	
		
	}

}