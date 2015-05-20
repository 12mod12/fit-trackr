<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Lifts extends Controller_Template {

//TODO set up routes and move this to a "Template" folder

	public $template = 'lifts';
	
	public function action_index()
	{
			
			$this->template->message = 'welcome to lift-city';	
		
	}

}