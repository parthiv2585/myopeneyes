<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Candidatenotes_model extends CI_Model {

    /**
     * @vars
     */
    private $_db;


    /**
     * Constructor
     */
    function __construct()
    {
        parent::__construct();

        // define primary table
        $this->_db = 'candidate_assign';
    }


    /**
     * Get list of non-deleted candidate_assign
     *
     * @param  int $limit
     * @param  int $offset
     * @param  array $filters
     * @param  string $sort
     * @param  string $dir
     * @return array|boolean
     */
    function get_all($limit = 0, $offset = 0, $filters = array(), $sort = 'candidate_id', $dir = 'ASC')
    {
        $sql = "
            SELECT SQL_CALC_FOUND_ROWS *
            FROM {$this->_db}
            WHERE deleted = '0'
        ";

        if ( ! empty($filters))
        {
            foreach ($filters as $key=>$value)
            {
                $value = $this->db->escape('%' . $value . '%');
                $sql .= " AND {$key} LIKE {$value}";
            }
        }

        $sql .= " ORDER BY {$sort} {$dir}";

        if ($limit)
        {
            $sql .= " LIMIT {$offset}, {$limit}";
        }
		
	 
         $query = $this->db->query($sql);

        if ($query->num_rows() > 0)
        {
            $results['results'] = $query->result_array();
        }
        else
        {
            $results['results'] = NULL;
        }

        $sql = "SELECT FOUND_ROWS() AS total";
        $query = $this->db->query($sql);
        $results['total'] = $query->row()->total;

        return $results;
    }


    /**
     * Get specific user
     *
     * @param  int $id
     * @return array|boolean
     */
    function get_candidate($id = NULL)
    {
		 
        if ($id)
        {
            $sql = "
                SELECT c.* , a.text as 'resume-test' , a.original_filename as 'original_filename'
                FROM {$this->_db} as c LEFT JOIN attachment as a
				ON c.candidate_id = a.data_item_id 
				
                WHERE c.candidate_id = " . $this->db->escape($id) . "
                    AND c.deleted = '0' AND a.data_item_type =100
            ";
			
					 
            $query = $this->db->query($sql);

            if ($query->num_rows())
            {
                return $query->row_array();
            }
        }

        return FALSE;
    }


    /**
     * Add a new user
     *
     * @param  array $data
	 * @param  string ResumeFileName
     * @return mixed|boolean
     */
    function add_candidatenote($candidate_status_id,$notes,$cadidateId,$jobId)
    {  
		 
		$this->db->trans_begin();	
        if ($cadidateId)
        {             
             $data = array( 
				'joborder_id' => $jobId,
				'candidate_id' => $cadidateId,
				'candidate_status_id' => $candidate_status_id,
				'notes' => $notes,
				'created_by' => $this->session->userdata['logged_in']['user_id'] 				 
			);   
			$this->db->insert('candidate_notes',$data);			
			if ($client_id = $this->db->insert_id()) {
                return $client_id;
            }	
			
        }
        return FALSE;
    }

 

    /**
     * Edit an existing user
     *
     * @param  array $data
     * @return boolean
     */
    function edit_company($data = array(),$resumeNameGetAfterUpload)
    {
		$this->db->trans_begin();
      
		if ($data)
		 { 
	 
		   $sql = "
                UPDATE {$this->_db}
                SET
				 last_name = " . $this->db->escape($data['last_name']) . ",
			 ";
			
            $sql .= "					
					first_name = " . $this->db->escape($data['first_name']) . ",
					middle_name = " . $this->db->escape($data['middle_name']) . ",
					phone_home = " . $this->db->escape($data['phone_home']) . ",
				    phone_cell = " . $this->db->escape($data['phone_cell']) . ",
					phone_work = " . $this->db->escape($data['phone_work']) . ",
					
                    address = " . $this->db->escape($data['address']) . ",
                    city = " . $this->db->escape($data['city']) . ",
                    state = " . $this->db->escape($data['state']) . ",
                    zip = " . $this->db->escape($data['zip']) . ",
                   
					source = " . $this->db->escape($data['source']) . ",
					date_available = " . $this->db->escape($data['date_available']) . ",
					can_relocate = " . $this->db->escape($data['can_relocate']) . ",
					notes = " . $this->db->escape($data['notes']) . ",					
					key_skills = " . $this->db->escape($data['key_skills']) . ",
					current_employer = " . $this->db->escape($data['current_employer']) . ",				 				
                    date_modified = '" . date('Y-m-d H:i:s') . "',					
					email1 = " . $this->db->escape($data['email1']) . ",
					email2 = " . $this->db->escape($data['email2']) . ",
					web_site = " . $this->db->escape($data['web_site']) . ",
                    
					web_site = " . $this->db->escape($data['web_site']) . ",
					desired_pay = " . $this->db->escape($data['desired_pay']) . ",
					current_pay = " . $this->db->escape($data['current_pay']) . ",
					best_time_to_call = " . $this->db->escape($data['best_time_to_call']) . ",					
					work_authorization = " . $this->db->escape($data['work_authorization']) . ",					
					date_of_birth = " . $this->db->escape($data['date_of_birth']) . ",					
					ssn = " . $this->db->escape($data['ssn']) . "					
					WHERE candidate_id = " . $this->db->escape($data['id']) . "
                    AND deleted = '0'
            ";

            $this->db->query($sql);
			
			if(!isset($resumeNameGetAfterUpload) || empty($resumeNameGetAfterUpload))
			{
					$resumeNameGetAfterUpload =  $data['h_importresume'];
			} 
			
			$sql_att = "UPDATE attachment SET 
			text =  " . $this->db->escape($data['resume-test']) . " ,
			original_filename = ".$this->db->escape($resumeNameGetAfterUpload).",
			stored_filename = ".$this->db->escape($resumeNameGetAfterUpload)." 				
			WHERE data_item_id = " . $this->db->escape($data['id']) . "  AND data_item_type = 100 "; 
			
			$this->db->query($sql_att);
			
			if ($this->db->trans_status() === FALSE){
					$this->db->trans_rollback();
					return FALSE;
			} else {
					$this->db->trans_commit();
					 return TRUE;
			}  
        } 
		
        return FALSE;
    }
 

    /**
     * Soft delete an existing candidate
     *
     * @param  int $id
     * @return boolean
     */
    function delete_company($id = NULL)
    {
        if ($id)
        {
            $sql = "
                UPDATE {$this->_db}
                SET
                    deleted = '1',
                    date_modified = '" . date('Y-m-d H:i:s') . "'
                WHERE candidate_id = " . $this->db->escape($id) . "
                    AND candidate_id > 1
            ";

            $this->db->query($sql);

            if ($this->db->affected_rows())
            {
                return TRUE;
            }
        }

        return FALSE;
    }
 

   
    /**
     * Check to see if an email already exists
     *
     * @param  string $email
     * @return boolean
     */
    function email_exists($email)
    {
        $sql = "
            SELECT candidate_id
            FROM {$this->_db}
            WHERE email1 = " . $this->db->escape($email) . "
            LIMIT 1
        ";

        $query = $this->db->query($sql);

        if ($query->num_rows())
        {
            return TRUE;
        }

        return FALSE;
    }
	
	
	function delete_attachment($id){
		$sql = "SELECT * FROM attachment WHERE data_item_id = '".$id."' AND  	data_item_type = 100 ORDER BY attachment_id DESC LIMIT 1";
		$query = $this->db->query($sql);
		if ($query->num_rows()){
			
			 $sqlUpdate = "
                UPDATE attachment
                SET
                    original_filename = '',
                    stored_filename = ''
                WHERE data_item_id = '".$id."' AND data_item_type = 100 ORDER BY attachment_id DESC LIMIT 1
            ";

            $this->db->query($sqlUpdate); 

			return $query->row_array();
		}
	}
	
}
