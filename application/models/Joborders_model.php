<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Joborders_model extends CI_Model {

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
        $this->_db = 'joborder';
    }


    /**
     * Get list of non-deleted joborder
     *
     * @param  int $limit
     * @param  int $offset
     * @param  array $filters
     * @param  string $sort
     * @param  string $dir
     * @return array|boolean
     */
    function get_all($limit = 0, $offset = 0, $filters = array(), $sort = 'joborder_id', $dir = 'ASC')
    {
        $sql = "
            SELECT SQL_CALC_FOUND_ROWS j.* , c.name as 'company_name'
            FROM {$this->_db} as j LEFT JOIN clients as c ON 
			j.client_id = c.client_id 
            WHERE c.deleted = '0'
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
    function get_joborders($id = NULL)
    {
		 
        if ($id)
        {
            $sql = "
                SELECT *
                FROM {$this->_db} 				
                WHERE joborder_id = " . $this->db->escape($id) . "                    
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
    function add_candidate($data = array(),$resumeNameGetAfterUpload = NULL)
    {  
        if ($data)
        {             
           $data = array( 
				'title' =>$data['title'],
				'client_id' => $data['client_id'],
				'city' => $data['city'],				
				'state' => $data['state'],
				'recruiter' => $data['recruiter'], 
				'start_date' => $data['start_date'],
				'duration' => $data['duration'], 
				'rate_max' => $data['rate_max'],
				'pay_rate' => $data['pay_rate'],
				'openings' => $data['openings'], 
				'client_job_id' => $data['client_job_id'],
				'key_skills' => $data['key_skills'],
				'description' => $data['description'], 
				'notes' => $data['notes'], 
				'position_type' => $data['position_type'],  
				'visa_type' => $data['visa_type'],
				'is_public' => isset($data['is_public']) ? $data['is_public'] : 0,
				'is_hot' => isset($data['is_hot']) ? $data['is_hot'] : 0, 
				'is_active' => isset($data['is_active']) ? $data['is_active'] : 0,
				'is_admin_hiden' => isset($data['is_admin_hiden']) ? $data['is_admin_hiden'] : 0, 
				'created_by' => $this->session->userdata['logged_in']['user_id'],
				'created_on' => date('Y-m-d H:i:s',now())  
			); 
			  
			$this->db->insert('joborder',$data);
			//echo $this->db->last_query();
			//die;
			if ($joborder_id = $this->db->insert_id()) {
                return $joborder_id;
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
    function edit_company($data = array())
    {
		$this->db->trans_begin();
      
		if ($data)
		 { 
	 
		   $sql = "
                UPDATE {$this->_db}
                SET
				 recruiter = " . $this->db->escape($data['recruiter']) . ",
			 ";
			
            $sql .= "					
					contact_id = '-1',
					client_id = " . $this->db->escape($data['client_id']) . ",
					entered_by = '1',
				    owner = " . $this->db->escape($data['owner']) . ",
					site_id = '1',
					
                    client_job_id = " . $this->db->escape($data['client_job_id']) . ",
                    title = " . $this->db->escape($data['title']) . ",
                    description = " . $this->db->escape($data['description']) . ",
                    notes = " . $this->db->escape($data['notes']) . ",
                   
					type = " . $this->db->escape($data['type']) . ",
					duration = " . $this->db->escape($data['duration']) . ",
					rate_max = " . $this->db->escape($data['rate_max']) . ",
					salary = " . $this->db->escape($data['salary']) . ",					
					openings = " . $this->db->escape($data['openings']) . ",
					city = " . $this->db->escape($data['city']) . ",

					state = " . $this->db->escape($data['state']) . ",
					start_date = " . $this->db->escape($data['start_date']) . ",
					key_skills = " . $this->db->escape($data['key_skills']) . ",

					
                    date_modified = '" . date('Y-m-d H:i:s') . "' 					
					  			
					WHERE joborder_id = " . $this->db->escape($data['id']) . "
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
     * Soft delete an existing joborder
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
                WHERE joborder_id = " . $this->db->escape($id) . "
                    AND joborder_id > 1
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
            SELECT joborder_id
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
	
	
	/*
		
		Get Dropdown Job Type list
		Date : 12-04-2017
		Developer Name : Parthiv Shah
	
	*/
	function jobTypeLevelDropDownList()
	{
		$this->db->from('job_type'); 
		$this->db->order_by('job_type_id');
		$result = $this->db->get();
		$return = array();
		
		if($result->num_rows() > 0) {
		
		foreach($result->result_array() as $row) {
			$return[$row['code']] = $row['title'];
			}
		}
			return $return;
	}
	
	function jobOrdersDropDownList()
	{
		$this->db->from('joborder');
		$this->db->where('deleted',0);
		$this->db->order_by('title');
		$result = $this->db->get();
		$return = array();
		$return[''] = '--Select--';
		
		if($result->num_rows() > 0) {
		
		foreach($result->result_array() as $row) {
			$return[$row['joborder_id']] = $row['title'];
			}
		}
			return $return;
	}
	
	function candidateStatusDropDownList($status)
	{
		$this->db->from('candidate_status');
		$this->db->where('type',$status);
		$this->db->order_by('candidate_status_id');
		$result = $this->db->get();
		$return = array();
		$return[''] = '--Select Status--';
		
		if($result->num_rows() > 0) {
		
		foreach($result->result_array() as $row) {
			$return[$row['candidate_status_id']] = $row['name'];
			}
		}
			return $return;
	}
	
	 function getJobList($clientId)  
	 {  
		  $this->db->select('joborder_id,title');  
		  $this->db->from('joborder');  
		  $this->db->where('client_id',$clientId); 
		  $this->db->where('deleted',0); 
		  $this->db->where('is_active',1);
		  $query = $this->db->get();  
		  return $query->result();  
	 } 
	
}
