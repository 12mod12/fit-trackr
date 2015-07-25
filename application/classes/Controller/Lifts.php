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
	
			$response = json_decode(Request::factory('restful/liftType')->execute()->body(),TRUE);
			error_log(print_r($response,TRUE));
			if (Arr::get($response,'success')){
				$this->template->lift_names = Arr::get($response,'result');
			} else {
				$this->template->message = "Error finding lift type data.";
			}
			
			$response = json_decode(Request::factory('restful/lifts')->execute()->body());
			
			if ($response->success){
				$this->template->lifts = $response->result;
			} else {
				$this->template->message = "Error finding lift data.";
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
				$this->template->message = "Lift #".$response->result[0]." successfully added!";
			} else {
				$this->template->message = $response->message;
			}
		}
	}
	
	public function action_test()
	{
		$this->template->message = serialize($_POST);
	}
	
	public function action_delete()
	{
		$lift_id = Arr::get($_POST,'lift_id');
		
		if (empty($lift_id)){
			$this->template->message = "Please select a lift to remove.";
		} else {
			$response = json_decode(Request::factory('restful/lifts/delete')->method(Request::POST)->post(array('lift_id' => $lift_id))->execute()->body());
			
			if ($response->success){
				$this->template->message = "Lift #".$lift_id." successfully removed";
			} else {
				$this->template->message = $response->message;
			}
		}
	}
}