<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Welcome extends Controller {

	public function action_index()
	{
		$this->response->body('<html>

	<head>
	  <title>12M0D12 - The works of Hamilton Reed</title>
	  <link rel="stylesheet" href="/css/style.css">
	  <link rel="icon" type="image/png" href="http://12mod12.com/img/icon.png">	  
	</head>

	<body>
		<header>
		<a href="http://12mod12.com">
		<img src="http://12mod12.com/img/logoextended.gif" id="logo" alt="12 M0D 12 = 0">
		</a>		
		</header>
		<div class="centerbody">
			<div class="buttons">
				<a id="leftbuffer">
				</a>

				<a id="programs" title="Programs" href="/programs/programs.html">
					<span>Programs</span>
				</a>
			
				<a id="writing" title="Writing" href="/writing/writing.html">
					<span>Writing</span>
				</a>
			
				<a id="about" title="About" href="/about/about.html">
					<span>About</span>
				</a>
			</div>
		</div>
		<!--<div id="leftcol">
		
		</div>
		
		<div id="center">
		
		</div>
		
		<div id="rightcol">
		
		</div>-->
		
		<div id="footer">
		
		</div>
	</body>
	
</html>');
	}

} // End Welcome
