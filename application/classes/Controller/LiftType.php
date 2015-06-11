<?php defined('SYSPATH') or die('No direct script access.');

class Controller_LiftType extends Controller_Template {

	public $template = 'lifttype';
	
	public function action_index()
	{
			
			$this->template->message = 'ur in lift country now';
			$this->template->action = 'liftType/submit';	
		
	}
	
	public function action_submit(){
		$this->template->message = Arr::get($_POST,'liftname');
		$this->template->action = 'submit';
		$db = Database::instance();
		$columns = $db->list_columns('lift_type');
		$this->templage->message = serialize($columns);
	}

}