<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Welcome extends Controller {

	public function action_index()
	{
		$this->response->body('welcome to fit-trackr!  It\'s like Uber, but for fitness!<p>  <a href=/programs/fit-trackr/index.php/lifts>Click Here to Start!</a>');
	}

} // End Welcome
