<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Clients_model extends CI_Model {

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
        $this->_db = 'clients';
    }


    /**
     * Get list of non-deleted clients
     *
     * @param  int $limit
     * @param  int $offset
     * @param  array $filters
     * @param  string $sort
     * @param  string $dir
     * @return array|boolean
     */
    function get_all($limit = 0, $offset = 0, $filters = array(), $sort = 'client_id', $dir = 'ASC')
    {
        $sql = "
            SELECT SQL_CALC_FOUND_ROWS * , I.title as title
            FROM {$this->_db} as C LEFT JOIN industries as I ON
			I.industrie_id = C.industrie_id 
            WHERE deleted = '0'
        ";

        if ( ! empty($filters))
        {
            foreach ($filters as $key=>$value)
            {
                $value = $this->db->escape('%' . $value . '%');
                $sql .= " AND C.{$key} LIKE {$value}";
            }
        }

        $sql .= " ORDER BY C.{$sort} {$dir}";
		
	 

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
    function get_company($id = NULL)
    {
		 
        if ($id)
        {
            $sql = "
                SELECT *
                FROM {$this->_db}
                WHERE client_id = " . $this->db->escape($id) . "
                    AND deleted = '0'
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
     * @return mixed|boolean
     */
    function add_company($data = array(),$clientLogoName=NULL)
    {
        if ($data)
        {
            $data = array( 
				'name' => $data['name'],
				'url' => $data['url'],				
				'is_hot' => $data['is_hot'],
				'notes' => $data['notes'],
				'no_of_employee' => $data['no_of_employee'],
				'industrie_id' => $data['industrie_id'],
				'client_logo' => $clientLogoName,
				'about_company' => $data['about_company'],			 		
				'facebook' => $data['facebook'],
				'linkedin' => $data['linkedin'],
				'google_plus' => $data['google_plus'],
				'default_company' => $data['default_company'], 
				'created_by' => $this->session->userdata['logged_in']['user_id'],
				'created_on' => date('Y-m-d H:i:s',now()),
				'is_active' => $data['is_active'],
				'skills'	=> $data['skills']
			);  
			
			$this->db->insert('clients',$data);			
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
    function edit_client($data = array(),$clientLogoName=NULL)
    {
        if ($data)
        { 
		     $up_data = array( 
				'name' => $data['name'],
				'url' => $data['url'],				
				'is_hot' => $data['is_hot'],
				'notes' => $data['notes'],
				'no_of_employee' => $data['no_of_employee'],
				'industrie_id' => $data['industrie_id'],
				'client_logo' => $clientLogoName,
				'about_company' => $data['about_company'],			 		
				'facebook' => $data['facebook'],
				'linkedin' => $data['linkedin'],
				'google_plus' => $data['google_plus'],
				'default_company' => $data['default_company'], 
				'updated_by' => $this->session->userdata['logged_in']['user_id'],
				'updated_on' => date('Y-m-d H:i:s',now()),
				'is_active' => $data['is_active'],
				'skills'	=> $data['skills']
			);  

            $this->db->where("client_id",$data['id']);
			$this->db->update('clients', $up_data);
			if ($this->db->affected_rows())
            {
                return TRUE;
            } 
        }

        return FALSE;
    }
 

    /**
     * Soft delete an existing client
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
                    updated_on = '" . date('Y-m-d H:i:s') . "'
                WHERE client_id = " . $this->db->escape($id) . "  ";
			 
            $this->db->query($sql);

            if ($this->db->affected_rows())
            {
                return TRUE;
            }
        }

        return FALSE;
    }
 

   
    /**
     * Check to see if a name already exists
     *
     * @param  string $name
     * @return boolean
     */
    function name_exists($name)
    {
        $sql = "
            SELECT client_id
            FROM {$this->_db}
            WHERE name = " . $this->db->escape($name) . "
            LIMIT 1
        ";

        $query = $this->db->query($sql);

        if ($query->num_rows())
        {
            return TRUE;
        }

        return FALSE;
    } 
	 
	
	function clientDropDownList()
	{
		$this->db->from('clients');
		$this->db->where('deleted',0);
		$this->db->order_by('name');
		$result = $this->db->get();
		$return = array();
		$return[''] = '--Select--';
		
		if($result->num_rows() > 0) {
		
		foreach($result->result_array() as $row) {
			$return[$row['client_id']] = $row['name'];
			}
		}
			return $return;
	}
	 
	
	function delete_logo($id){
		$sql = "SELECT * FROM clients WHERE client_id = '".$id."'  LIMIT 1";
		$query = $this->db->query($sql);
		if ($query->num_rows()){
			
			 $sqlUpdate = "
                UPDATE clients
                SET
                    client_logo = '' 
                WHERE client_id = '".$id."'  LIMIT 1
            ";
			
            $this->db->query($sqlUpdate); 

			return $query->row_array();
		}
	}
	
	
	
}
