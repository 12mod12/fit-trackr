<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Cardio extends Controller_Template {

//TODO set up routes and move this to a "Template" folder

	public $template = 'cardio';
	
	public function before(){
		parent::before();
		
		$this->template->message = '';
		$this->template->result = '';
	}
	
	public function after(){
	
			$response = json_decode(Request::factory('restful/cardioType')->execute()->body(),TRUE);
			if (Arr::get($response,'success')){
				$this->template->cardio_names = Arr::get($response,'result');
			} else {
				$this->template->message = "Error finding cardio type data.";
			}
			
			$response = json_decode(Request::factory('restful/cardio')->execute()->body());
			
			if ($response->success){
				$this->template->cardio = $response->result;
			} else {
				$this->template->message = "Error finding excercise data.";
			}
			
			parent::after();
	}
	
	public function action_index()
	{
			$this->template->message = 'welcome to cardio-town';	
	}
	
	public function action_submit()
	{
		if (in_array("", $_POST)) {
			$this->template->message = "Please fill all forms before submitting";
		} else {
			$response = json_decode(Request::factory('restful/cardio/submit')->method(Request::POST)->post($_POST)->execute()->body());
			
			if ($response->success){
				$this->template->message = "Excercise #".$response->result[0]." successfully added!";
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
		$cardio = Arr::get($_POST,'cardio');
		
		if (empty($cardio)){
			$this->template->message = "Please select at least one excercise to remove.";
		} else {
			$response = json_decode(Request::factory('restful/cardio/delete')->method(Request::POST)->post(array('cardio' => $cardio))->execute()->body());
			
			if ($response->success){
				$this->template->message = $response->result." excercise(s) successfully removed";
			} else {
				$this->template->message = $response->message;
			}
		}
	}
}