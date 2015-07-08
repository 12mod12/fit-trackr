<?php defined('SYSPATH') OR die('No direct script access.');

abstract class Database extends Kohana_Database {
  
  /**
   * Get a singleton Database instance.
   * Update connection to ce1 for local Windows environments.
   * 
   * @uses  parent
   */
  public static function instance($name = NULL, array $config = NULL) {
	if (Kohana::$environment == Kohana::PRODUCTION){
		$name = 'default';
	} else {
		$name = 'remote';
	}
  	return parent::instance($name, $config);
  }
  
  public static function execute($query){
  	$response = new stdClass();
  	$db = Database::instance();
  	
  	$db->begin();
  	try {
  		$response->result = $query->execute();
  		$response->success = TRUE;
  	}
  	catch (Database_Exception $e)
  	{
  		$response->result = $e;
  		$response->success = FALSE;
  		$db->rollback();
  	}
  	
  	return $response;
  } 
}