<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Welcome extends Controller {

	public function action_index()
	{
		$this->response->body('<html>

	<head>
	  <title>12M0D12 - The works of Hamilton Reed</title>
	  <link rel=\"stylesheet\" href=\"/css/style.css\">
	  <link rel=\"icon" type=\"image/png" href=\"http://12mod12.com/img/icon.png\">	  
	</head>
	
	<body>
		welcome to fit-trackr!  It\'s like Uber, but for fitness!!
	</body>
	</html>');
	}

} // End Welcome
