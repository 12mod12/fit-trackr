<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Update extends Controller {

	public function action_index()
	{
		echo shell_exec("git --version")."<p>";
		echo shell_exec("which git")."<p>";
		echo shell_exec("whoami 2>&1")."<p>";
		echo shell_exec("pwd")."<p>";
		echo shell_exec("git pull 2>&1")."<p>";
		echo shell_exec("echo test >> /var/www/cgi-bin/test.cgi 2>&1")."<p>";
		
		//echo shell_exec("git clone https://github.com/12mod12/website.git 2>&1")."<p>"; 
		
		echo '<a href=/programs/fit-trackr/index.php/welcome>Back to Home</a>';
		
	}

}
