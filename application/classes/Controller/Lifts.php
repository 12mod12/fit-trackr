<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Lifts extends Controller_Template {

	public $template = 'lifts';
	
	public function action_index()
	{
			
			$this->template->message = 'hello, world';	
		
	}

} // End Welcome