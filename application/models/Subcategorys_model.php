<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Subcategorys_model extends CI_Model {

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
        $this->_db = 'subcategorys';
    }


    /**
     * Get list of non-deleted subcategorys
     *
     * @param  int $limit
     * @param  int $offset
     * @param  array $filters
     * @param  string $sort
     * @param  string $dir
     * @return array|boolean
     */
    function get_all($limit = 0, $offset = 0, $filters = array(), $sort = 'subcategory_id', $dir = 'ASC')
    {
        $sql = "
            SELECT SQL_CALC_FOUND_ROWS sc.* , c.name as catname
            FROM {$this->_db} as sc LEFT JOIN categorys as c ON
			sc.category_id = c.category_id 
            WHERE sc.deleted = '0'
        ";

        if ( ! empty($filters))
        {
            foreach ($filters as $key=>$value)
            {
                $value = $this->db->escape('%' . $value . '%');
                $sql .= " AND sc.{$key} LIKE {$value}";
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
    function get_category($id = NULL)
    {
		 
        if ($id)
        {
            $sql = "
                SELECT *
                FROM {$this->_db} 
                WHERE subcategory_id = " . $this->db->escape($id) . "
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
	 * @param  string ResumeFileName
     * @return mixed|boolean
     */
    function add_category($data = array())
    {  
		 
		$this->db->trans_begin();	
        if ($data)
        {             
            $sql = "
                INSERT INTO {$this->_db} (
					category_id,
                    name,
					status,
					created 
                ) VALUES ( 
					 " . $this->db->escape($data['category_id']) . ",
                    " . $this->db->escape($data['category_name']) . ",
					" . $this->db->escape($data['status']) .",                    
                    '" . date('Y-m-d H:i:s') . "' 
			   )
            "; 
						
            $this->db->query($sql);
			$id = $this->db->insert_id();
			    
			if ($this->db->trans_status() === FALSE){
					$this->db->trans_rollback();
					return FALSE;
			} else {
					$this->db->trans_commit();
					return $id;
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
    function edit_category($data = array())
    {
		$this->db->trans_begin();
      
		if ($data)
		 { 
	 
		   $sql = "
                UPDATE {$this->_db}
                SET
				name = " . $this->db->escape($data['category_name']) . ",
				category_id = " . $this->db->escape($data['category_id']) . ",
			 	status = " . $this->db->escape($data['status']) . ",
				updated = '" . date('Y-m-d H:i:s') . "' 			
				WHERE subcategory_id = " . $this->db->escape($data['id']) . "
				AND deleted = '0'
            ";

            $this->db->query($sql);
			 
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
     * Soft delete an existing category
     *
     * @param  int $id
     * @return boolean
     */
    function delete_category($id = NULL)
    {
        if ($id)
        {
            $sql = "
                UPDATE {$this->_db}
                SET
                    deleted = '1',
                    updated = '" . date('Y-m-d H:i:s') . "'
                WHERE subcategory_id = " . $this->db->escape($id) . "
                    AND subcategory_id > 1
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
     * Check to see if an name already exists
     *
     * @param  string $name
     * @return boolean
     */
    function name_exists($name,$current=NULL)
    {
        $sql = "
            SELECT subcategory_id
            FROM {$this->_db}
            WHERE name = " . $this->db->escape($name) . "  ";
			
		if(isset($current) && !empty($current)){
			$sql .= " AND subcategory_id != '".$current."'";
		}			
				        
		$sql .= " LIMIT 1";
		  
        $query = $this->db->query($sql);

        if ($query->num_rows())
        {
            return TRUE;
        }

        return FALSE;
    } 
	
	function categoryDropDownList()
	{
		$this->db->from('subcategorys');
		$this->db->where('deleted',0);
		$this->db->order_by('name');
		$result = $this->db->get();
		$return = array();
		$return[''] = '-Select-';
		if($result->num_rows() > 0) {
		
		foreach($result->result_array() as $row) {
			$return[$row['subcategory_id']] = $row['name'];
			}
		}
			return $return;
	}
	
}
