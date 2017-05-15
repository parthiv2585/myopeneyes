<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Contacts_model extends CI_Model {

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
        $this->_db = 'contacts';
    }


    /**
     * Get list of non-deleted contacts
     *
     * @param  int $limit
     * @param  int $offset
     * @param  array $filters
     * @param  string $sort
     * @param  string $dir
     * @return array|boolean
     */
    function get_all($limit = 0, $offset = 0, $filters = array(), $sort = 'contact_id', $dir = 'ASC')
    {
        $sql = "
            SELECT SQL_CALC_FOUND_ROWS * , C.name
            FROM {$this->_db} as CO LEFT JOIN clients as C ON 
			C.client_id = CO.client_id
            WHERE CO.deleted = '0'
        ";

        if ( ! empty($filters))
        {
            foreach ($filters as $key=>$value)
            {
                $value = $this->db->escape('%' . $value . '%');
                $sql .= " AND CO.{$key} LIKE {$value}";
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
    function get_company($id = NULL)
    {
		 
        if ($id)
        {
            $sql = "
                SELECT *
                FROM {$this->_db}
                WHERE contact_id = " . $this->db->escape($id) . "
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
    function add_contact($data = array())
    {
        if ($data)
        { 
			 $data = array(
				'client_id' =>$data['client_id'],
				'first_name' => $data['first_name'],
				'last_name' => $data['last_name'],				
				'title' => $data['title'],
				'email_work' => $data['email_work'],
				'email' => $data['email'],
				'phone_work' => $data['phone_work'],
				'phone' => $data['phone'], 
				'address' => $data['address'],
				'address1' => $data['address1'],
				'city' => $data['city'],
				'state' => $data['state'], 
				'zip' => $data['zip'],
				'country' => $data['country'],
				'is_hot' => $data['is_hot'],
				'notes' => $data['notes'],
				'enter_by' => $this->session->userdata['logged_in']['user_id'], 
				'owner' => $data['owner'],
				'left_company' => $data['left_company'],
				'report_to' => $data['report_to'],  
				'ip_address' => $this->input->ip_address(), 
				'created_by' => $this->session->userdata['logged_in']['user_id'],
				'created_on' => date('Y-m-d H:i:s',now()), 
				'is_active' => $data['is_active']
			); 
			
			$this->db->insert('contacts',$data);
			
			if ($user_id = $this->db->insert_id()) {
				return $user_id;
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
    function edit_contact($data = array())
    {
        if ($data)
        {
				
		   $up_data = array(
				'client_id' =>$data['client_id'],
				'first_name' => $data['first_name'],
				'last_name' => $data['last_name'],				
				'title' => $data['title'],
				'email_work' => $data['email_work'],
				'email' => $data['email'],
				'phone_work' => $data['phone_work'],
				'phone' => $data['phone'], 
				'address' => $data['address'],
				'address1' => $data['address1'],
				'city' => $data['city'],
				'state' => $data['state'], 
				'zip' => $data['zip'],
				'country' => $data['country'],
				'is_hot' => $data['is_hot'],
				'notes' => $data['notes'],
				'enter_by' => $this->session->userdata['logged_in']['user_id'], 
				'owner' => $data['owner'],
				'left_company' => $data['left_company'],
				'report_to' => $data['report_to'],  
				'ip_address' => $this->input->ip_address(), 
				'updated_by' => $this->session->userdata['logged_in']['user_id'],
				'updated_on' => date('Y-m-d H:i:s',now()), 
				'is_active' => $data['is_active']
			);

            $this->db->where("contact_id",$data['id']);
			$this->db->update('contacts', $up_data);
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
                    date_modified = '" . date('Y-m-d H:i:s') . "'
                WHERE contact_id = " . $this->db->escape($id) . "
                    AND contact_id > 1
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
     * Check to see if a name already exists
     *
     * @param  string $name
     * @return boolean
     */
    function name_exists($name)
    {
        $sql = "
            SELECT contact_id
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
		$this->db->from('contacts');
		$this->db->where('deleted',0);
		$this->db->order_by('name');
		$result = $this->db->get();
		$return = array();
		$return[''] = '--Select--';
		
		if($result->num_rows() > 0) {
		
		foreach($result->result_array() as $row) {
			$return[$row['contact_id']] = $row['name'];
			}
		}
			return $return;
	}
	
	
	
}
