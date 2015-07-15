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
  		$db->commit();
  	}
  	catch (Database_Exception $e)
  	{
  		$response->success = FALSE;
  		$response->message = $e->get_message();
  		$response->error_code = $e->get_code();
  		$db->rollback();
  	}
  	
  	return $response;
  } 
}