<?php defined('SYSPATH') or die('No direct script access.');

class Controller_LiftType extends Controller_Template {

	public $template = 'lifttype';
	
	public function action_index()
	{
			
			$this->template->message = 'ur in lift country now';
			$this->template->action = 'liftType/submit';	
			$this->template->result = '';
		
	}
	
	public function action_submit(){
		$liftname = Arr::get($_POST,'liftname');
		$this->template->action = 'submit';
		$db = Database::instance();
		$success = TRUE;
		$db->begin();
		try {
			$query = DB::insert('lift_type', array('lift_name'))->values(array($liftname))->execute();
			$this->template->result = $query;
			$db->commit();
		}
		catch (Database_Exception $e)
		{
			$db->rollback();
			$success = FALSE;
		}
		if ($success){
			$this->template->message = "Successfully added ".$liftname;
		} else {
			$this->template->message = "Error inserting data.";
		}
	}

}