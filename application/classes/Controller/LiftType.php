<?php defined('SYSPATH') or die('No direct script access.');

class Controller_LiftType extends Controller_Template {

	public $template = 'lifttype';
	
	public function after(){
	
			$db = Database::instance();
			$success = TRUE;
			$db->begin();
			try {
				$result = DB::select()->from('lift_type')->execute();
			}
			catch (Database_Exception $e)
			{				
				$error_code = $e->get_code();
				$db->rollback();
				$success = FALSE;
			}
			if ($success){
				$this->template->lifts = $result;
			} else {
				$this->template->message = "Error finding lift type data.";
				error_log($error_code);
				error_log($e);
			}
			
			parent::after();
	}
	
	public function action_index()
	{
			$this->template->message = '';
			$this->template->action = 'liftType/submit';	
			$this->template->drop_action = 'liftType/delete';
			$this->template->result = '';
	}
	
	public function action_submit(){
		$liftname = Arr::get($_POST,'liftname');
		$this->template->action = 'submit';
		$this->template->drop_action = 'delete';
		$this->template->result = '';
		if (empty($liftname)){
			$this->template->message = "Please enter a lift type for submmission."; 
		} else {
			
			$db = Database::instance();
			$success = TRUE;
			$db->begin();
			try {
				DB::insert('lift_type', array('lift_name'))->values(array($liftname))->execute();
				$db->commit();
			}
			catch (Database_Exception $e)
			{				
				$error_code = $e->get_code();
				$db->rollback();
				$success = FALSE;
			}
			if ($success){
				$this->template->message = "Successfully added ".$liftname;
			} else {
				$this->template->message = "Error inserting data.";
				error_log($error_code);
				if ($error_code == 1062){
					$this->template->result = "The lift [".$liftname."] already exists";
				} else {
					$this->template->result = $e;
				}
				error_log($e);
			}
		}
	}
	
	public function action_delete(){
		$lift_type_id = Arr::get($_POST,'lift_type_id');
		$this->template->action = 'submit';
		$this->template->drop_action = 'delete';
		$this->template->result = '';
		$this->template->message = '';
		if (empty($lift_type_id)){
			$this->template->result = "Please select a lift type for deletion.";
		} else {
				
			$db = Database::instance();
			$success = TRUE;
			$db->begin();
			try {
				error_log("attempting DB delete".$lift_type_id);
				DB::delete('lift_type')->where('lift_type_id', 'IN' , array($lift_type_id))->execute();
				$db->commit();
				error_log("delete committed");
			}
			catch (Database_Exception $e)
			{
				$error_code = $e->get_code();
				$db->rollback();
				$success = FALSE;
			}
			if ($success){
				$this->template->message = "Successfully deleted lift";
			} else {
				$this->template->message = "Error removing lift";
				error_log($error_code);
				if ($error_code == 1062){
					$this->template->result = "The lift [".$lift_type_id."] was not removed";
				} else {
					$this->template->result = $e;
				}
				error_log($e);
			}
		}
	}

}