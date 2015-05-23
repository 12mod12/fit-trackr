<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Welcome extends Controller_Template {

	public $template = 'welcome';

	public function action_index()
	{
		$this->template->message = 'Welcome to fit-trackr!';
		
	}

} // End Welcome
