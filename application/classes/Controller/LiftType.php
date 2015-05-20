<?php defined('SYSPATH') or die('No direct script access.');

class Controller_LiftType extends Controller_Template {

	public $template = 'lifttype';
	
	public function action_index()
	{
			
			$this->template->message = 'ur in lift country now';	
		
	}

}