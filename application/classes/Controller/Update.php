<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Update extends Controller {

	public function action_index()
	{
		echo shell_exec("git --version")."<p>";
		$pwd = shell_exec("pwd");		
		echo shell_exec("cd ".$pwd."/fit-trackr 2>&1; git pull");
		
	}

}
