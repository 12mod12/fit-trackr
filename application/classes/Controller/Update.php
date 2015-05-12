<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Update extends Controller {

	public function action_index()
	{
		echo shell_exec("git --version")."<p>";
		echo shell_exec("pwd")."<p>";
		echo shell_exec("git pull 2>&1");
		
	}

}
