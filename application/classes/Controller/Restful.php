<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Restful extends Controller {

	public function action_idex(){
		$this->response->body(json_encode("Default Index"));
	}

}