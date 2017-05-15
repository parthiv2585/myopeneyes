<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * All  > PUBLIC <  AJAX functions should go in here
 *
 * CSRF protection has been disabled for this controller in the config file
 *
 * IMPORTANT: DO NOT DO ANY WRITEBACKS FROM HERE!!! For retrieving data only.
 */
class Ajax extends Public_Controller {

    /**
     * Constructor
     */
    function __construct()
    {
        parent::__construct();
    }


    /**
	 * Change session language - user selected
     */
	function set_session_language()
	{
        $language = $this->input->post('language');
        $this->session->language = $language;
        $results['success'] = TRUE;
        echo json_encode($results);
        die();
	}
	
	/* 
		Delete Attachment.
		Develop By : PARTHIV SHAH
		Date : 10-0-2017 
	*/
	public function delete_image(){ 
	    $this->load->model('candidates_model');
		
		$attachmentData = $this->candidates_model->delete_attachment($this->input->post('deleteId')); 
  
		if($attachmentData){
			$path_l = "uploads/".$attachmentData['original_filename']; 
			if(file_exists($path_l))
				unlink($path_l);

			header('Content-Type: application/json');
			echo json_encode(array('response' => 'true'));		
		}else {
			header('Content-Type: application/json');
			echo json_encode(array('response' => 'flase'));			
		}
		
	}
	
	
	/* 
		Delete client logo.
		Develop By : PARTHIV SHAH
		Date : 01-05-2017 
	*/
	public function client_logo_delete(){ 
	    $this->load->model('clients_model');
		
		$clientLogoData = $this->clients_model->delete_logo($this->input->post('deleteId')); 
  
		if($clientLogoData){
			$path_l = "uploads/client_logo/".$clientLogoData['client_logo']; 
			if(file_exists($path_l))
				unlink($path_l);

			header('Content-Type: application/json');
			echo json_encode(array('response' => 'true'));		
		}else {
			header('Content-Type: application/json');
			echo json_encode(array('response' => 'flase'));			
		}
		
	}
	
	
	
	/*  Check unique username and email  */
	
		
		 /**
     * Make sure username is available
     *
     * @param  string $username
     * @param  string|null $current
     * @return int|boolean
     */
    function check_username()
    {
		$this->load->model('users_model');
		$username = $this->input->post("username");
		$current = $this->input->post("current");
		
        if (trim($username) != trim($current) && $this->users_model->username_exists($username,$current))
        { 
            echo "1";
        }
        else
        {
            echo "0";
        }
    }
	
	/**
     * Make sure email is available
     *
     * @param  string $email
     * @param  string|null $current
     * @return int|boolean
     */
    function check_email()
    {
		$this->load->model('users_model');
		$email = $this->input->post("email_id");
		$current = $this->input->post("current");
		
        if (trim($email) != trim($current) && $this->users_model->email_exists($email,$current))
        {
            echo "1";
        }
        else
        {
            echo "0";
        }
    } 
	/*  End Check unique username and email  */
	
	
	/*
		Get list of menu with view, add, delete, edit checkbox
	*/
	function menu_list(){
		
		$this->load->model('menus_model');
		$meenuList = $this->menus_model->menuDropDownList();
		
		$level_id = $this->input->post("level_id");
		$permissionList = $this->menus_model->getPermissionData($level_id);
		
	
		
		// set content data
        $content_data = array( 
			'meenuList'			=> $meenuList,
			'permissionList'	=> $permissionList			
        );

        // load views
         echo $this->load->view('admin/menus/ajax_menu', $content_data, TRUE);
         
	}	 
	/*
		End Get list of menu with view, add, delete, edit checkbox
	*/
	
	
	/**
		Assign Candidate
     */
    function assign_candidate()
    {
		$this->load->model('candidateassigns_model');
		
		$popup_joborder_id = $this->input->post("popup_joborder_id");
		$popup_client_id = $this->input->post("popup_client_id");
		$candidate_id = $this->input->post("candidate_id");
		echo $this->candidateassigns_model->add_candidateassign($popup_joborder_id,$popup_client_id,$candidate_id);
        
    } 
	/*  End Assign Candidate  */
	
	/**
		Assign Candidate
     */
    function candidate_notes()
    {
		$this->load->model('candidatenotes_model');
		
		$candidate_status_id = $this->input->post("candidate_status_id");
		$notes = $this->input->post("notes");
		$cadidateId = $this->input->post("cadidateId");
		$jobId = $this->input->post("jobId");
		
		echo $this->candidatenotes_model->add_candidatenote($candidate_status_id,$notes,$cadidateId,$jobId);
        
    } 
	/*  End Assign Candidate  */
	
	
	/* Get List client wise job list */

	 function getClietWiseJobList(){
		 $this->load->model('joborders_model');
		 $clientId = $this->input->post("popup_client_id");
		 $results = $this->joborders_model->getJobList($clientId);
		 $output = null; 
		 foreach ($results as $row){   
			 $output .= "<option value='".$row->joborder_id."'>".$row->title."</option>";  
		  } 
		 echo $output;  
	 }
	
	/* END Get List client wise job list */
	

}
