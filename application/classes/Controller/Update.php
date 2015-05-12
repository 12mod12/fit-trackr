<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Update extends Controller {

	public function action_index()
	{
		echo shell_exec("git --version")."<p>";
		echo shell_exec("pwd")."<p>";
		echo shell_exec("git pull 2>&1");
		
		echo '\"<a href=\"/programs/fit-trackr/index.php/welcome\">Back to Home</a>';
		
	}

}
