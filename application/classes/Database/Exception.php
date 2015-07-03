<?php defined('SYSPATH') OR die('No direct script access.');

class Database_Exception extends Kohana_Database_Exception {

	public function get_code(){
		return $this->code;
	}

}