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
		$this->template->result = '';
		$db = Database::instance();
		$success = TRUE;
		$db->begin();
		try {
			DB::insert('lift_type', array('lift_name'))->values(array($liftname))->execute();
			$db->commit();
		}
		catch (Database_Exception $e)
		{
			$this->template->result = $e;
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