<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Categorys extends Admin_Controller {

    /**
     * @var string
     */
    private $_redirect_url;


    /**
     * Constructor
     */
    function __construct()
    {
        parent::__construct(); 
		   
		// load the language files
		$this->lang->load('categorys');

		// load the categorys model
		$this->load->model('categorys_model');

		// set constants
		define('REFERRER', "referrer");
		define('THIS_URL', base_url('admin/categorys'));
		define('DEFAULT_LIMIT', $this->settings->per_page_limit);
		define('DEFAULT_OFFSET', 0);
		define('DEFAULT_SORT', "category_id");
		define('DEFAULT_DIR', "asc");
		
		
		$this->load->helper(array('form', 'url'));
		
		$this->load->library('upload');
		
		// use the url in session (if available) to return to the previous filter/sorted/paginated list
		if ($this->session->userdata(REFERRER))
		{
			$this->_redirect_url = $this->session->userdata(REFERRER);
		}
		else
		{
			$this->_redirect_url = THIS_URL;
		}  
		
		/* Check user permission */
		if($this->checkAuth(10,'u_view') == 0) 		  
		    redirect(base_url()."admin/accessdenied"); 
    } 

    /**************************************************************************************
     * PUBLIC FUNCTIONS
     **************************************************************************************/


    /**
     * Client list page
     */
    function index()
    {
		/* Check user permission */
		if($this->checkAuth(10,'u_view') == 0)  
		    redirect(base_url()."admin/accessdenied");
		  
        // get parameters
        $limit  = $this->input->get('limit')  ? $this->input->get('limit', TRUE)  : DEFAULT_LIMIT;
        $offset = $this->input->get('offset') ? $this->input->get('offset', TRUE) : DEFAULT_OFFSET;
        $sort   = $this->input->get('sort')   ? $this->input->get('sort', TRUE)   : DEFAULT_SORT;
        $dir    = $this->input->get('dir')    ? $this->input->get('dir', TRUE)    : DEFAULT_DIR;

        // get filters
        $filters = array();

        if ($this->input->get('name'))
        {
            $filters['name'] = $this->input->get('name', TRUE);
        }

        if ($this->input->get('status'))
        {
			$statusId = '';
			if($this->input->get('status', TRUE) == "1"){
				$statusId = 1;
			} else if($this->input->get('status', TRUE) == "inactive") {
				$statusId = 0;
			}
            $filters['status'] = $statusId;
        }
		 

        // build filter string
        $filter = "";
        foreach ($filters as $key => $value)
        {
            $filter .= "&{$key}={$value}";
        }

        // save the current url to session for returning
        $this->session->set_userdata(REFERRER, THIS_URL . "?sort={$sort}&dir={$dir}&limit={$limit}&offset={$offset}{$filter}");

        // are filters being submitted?
        if ($this->input->post())
        {
            if ($this->input->post('clear'))
            {
                // reset button clicked
                redirect(THIS_URL);
            }
            else
            {
                // apply the filter(s)
                $filter = "";

                if ($this->input->post('category_name'))
                {
                    $filter .= "&category_name=" . $this->input->post('category_name', TRUE);
                }
				
				if ($this->input->post('status'))
                {
                    $filter .= "&status=" . $this->input->post('status', TRUE);
                } 

                // redirect using new filter(s)
                redirect(THIS_URL . "?sort={$sort}&dir={$dir}&limit={$limit}&offset={$offset}{$filter}");
            }
        }

        // get list
        $categorys = $this->categorys_model->get_all($limit, $offset, $filters, $sort, $dir);

        // build pagination
        $this->pagination->initialize(array(
            'base_url'   => THIS_URL . "?sort={$sort}&dir={$dir}&limit={$limit}{$filter}",
            'total_rows' => $categorys['total'],
            'per_page'   => $limit
        ));

        // setup page header data
		$this 
			->add_css_theme( 'bootstrap-datepicker.css' )
			->add_js_theme( 'bootstrap-datepicker.js' ) 
			->add_js_theme( 'categorys_i18n.js', TRUE )
			->set_title( lang('categorys title') );

        $data = $this->includes;
		
		/* Status Array */
		$statuslist = array(''=>'-Select-','1'=>'Active','inactive'=>'Inactive');
		
		
        // set content data
        $content_data = array(
            'this_url'   => THIS_URL,
            'categorys'      => $categorys['results'],
            'total'      => $categorys['total'],
            'filters'    => $filters,
            'filter'     => $filter,
            'pagination' => $this->pagination->create_links(),
            'limit'      => $limit,
            'offset'     => $offset,
            'sort'       => $sort,
            'dir'        => $dir,
			'statuslist' => $statuslist
        );

        // load views
        $data['content'] = $this->load->view('admin/categorys/list', $content_data, TRUE);
        $this->load->view($this->template, $data);
    } 
	 
	
	
	/* Validation Check */
	
	protected function validation($category_name){
		
		// validators
        $this->form_validation->set_error_delimiters($this->config->item('error_delimeter_left'), $this->config->item('error_delimeter_right'));
        
		if(!empty($category_name)) {
			
			$this->form_validation->set_rules('category_name', lang('categorys input name'), 'required|trim|min_length[2]|max_length[50]|callback__check_name[' . $category_name . ']');
			
		} else {
			
		 $this->form_validation->set_rules('category_name', lang('categorys input name'), 'required|trim|min_length[2]|max_length[50]');
		 
		}  
		return $this->form_validation->run(); 
	} 
	
	/* End Validation Check */
	
	
	
    /**
     * Add new category
     */
    function add()
    {
		
		/* Check user permission */
		if($this->checkAuth(10,'u_add') == 0)  
		    redirect(base_url()."admin/accessdenied");
		
		 // setup page header data
		$this 
			->add_css_theme( 'bootstrap-datepicker.css' )
			->add_js_theme( 'bootstrap-datepicker.js' )
			->add_js_theme( 'categorys_i18n.js', TRUE )
			->set_title( lang('categorys title') );

        $data = $this->includes;
		$namet=''; 
        if ($this->validation($namet))
        { 
			// save the new category 
            $saved = $this->categorys_model->add_category($this->input->post());

            if ($saved)
            {
                $this->session->set_flashdata('message', sprintf(lang('categorys msg add_client_success'), $this->input->post('category_name')));
            }
            else
            {
                $this->session->set_flashdata('error', sprintf(lang('categorys error add_client_failed'), $this->input->post('category_name')));
            }

            // return to list and display message
            redirect($this->_redirect_url);
        }

        // setup page header data
        $this->set_title( lang('categorys title client_add') );

        $data = $this->includes;

        // set content data
        $content_data = array(
            'cancel_url'        => $this->_redirect_url,
            'category'              => NULL,
            'category_id' => TRUE
        );

        // load views
        $data['content'] = $this->load->view('admin/categorys/form', $content_data, TRUE);
        $this->load->view($this->template, $data);
    }


    /**
     * Edit existing category
     *
     * @param  int $id
     */
    function edit($id = NULL)
    {
		/* Check user permission */
		if($this->checkAuth(10,'u_edit') == 0)   
		    redirect(base_url()."admin/accessdenied");
		
		 // setup page header data
		$this 
			->add_css_theme( 'bootstrap-datepicker.css' )
			->add_js_theme( 'bootstrap-datepicker.js' )
			->add_js_theme( 'categorys_i18n.js', TRUE )
			->set_title( lang('categorys title') );

        $data = $this->includes;
		
		
        // make sure we have a numeric id
        if (is_null($id) OR ! is_numeric($id))
        {
            redirect($this->_redirect_url);
        }

        // get the data
        $category = $this->categorys_model->get_category($id);

        // if empty results, return to list
        if ( ! $category)
        {
            redirect($this->_redirect_url);
        }
 
        if ($this->validation($category['name']))
        { 
			 
            // save the changes
            $saved = $this->categorys_model->edit_category($this->input->post());

            if ($saved)
            {
                $this->session->set_flashdata('message', sprintf(lang('categorys msg edit_client_success'), $this->input->post('category_name')));
            }
            else
            {
                $this->session->set_flashdata('error', sprintf(lang('categorys error edit_client_failed'), $this->input->post('category_name')));
            }

            // return to list and display message
            redirect($this->_redirect_url);
        }

        // setup page header data
        $this->set_title( lang('categorys title client_edit') );

        $data = $this->includes;

        // set content data
        $content_data = array(
            'cancel_url'        => $this->_redirect_url,
            'category'              => $category,
            'category_id'           => $id,
            'password_required' => FALSE
        );

        // load views
        $data['content'] = $this->load->view('admin/categorys/form', $content_data, TRUE);
        $this->load->view($this->template, $data);
    }
	 

    /**
     * Delete a category
     *
     * @param  int $id
     */
    function delete($id = NULL)
    {
		/* Check user permission */
		if($this->checkAuth(10,'u_delete') == 0)  
		    redirect(base_url()."admin/accessdenied");
		
        // make sure we have a numeric id
        if ( ! is_null($id) OR ! is_numeric($id))
        {
            // get category details
            $category = $this->categorys_model->get_category($id);

            if ($category)
            {
                // soft-delete the category
                $delete = $this->categorys_model->delete_category($id);

                if ($delete)
                {
                    $this->session->set_flashdata('message', sprintf(lang('categorys msg delete_client'), $category['category_name']));
                }
                else
                {
                    $this->session->set_flashdata('error', sprintf(lang('categorys error delete_client'), $category['category_name']));
                }
            }
            else
            {
                $this->session->set_flashdata('error', lang('categorys error client_not_exist'));
            }
        }
        else
        {
            $this->session->set_flashdata('error', lang('categorys error company_id_required'));
        }

        // return to list and display message
        redirect($this->_redirect_url);
    }

	
	
	
	 

    /**
     * Export list to CSV
     */
    function export()
    {
		/* Check user permission */
		if($this->checkAuth(10,'u_view') == 0)  
		    redirect(base_url()."admin/accessdenied");
		
        // get parameters
        $sort = $this->input->get('sort') ? $this->input->get('sort', TRUE) : DEFAULT_SORT;
        $dir  = $this->input->get('dir')  ? $this->input->get('dir', TRUE)  : DEFAULT_DIR;

        // get filters
        $filters = array();

        if ($this->input->get('category_name'))
        {
            $filters['category_name'] = $this->input->get('category_name', TRUE);
        }
		
		if ($this->input->get('status'))
        {
            $filters['status'] = $this->input->get('status', TRUE);
        }

        if ($this->input->get('city'))
        {
            $filters['city'] = $this->input->get('city', TRUE);
        }

        if ($this->input->get('state'))
        {
            $filters['state'] = $this->input->get('state', TRUE);
        }
		
		if ($this->input->get('key_skills'))
        {
            $filters['key_skills'] = $this->input->get('key_skills', TRUE);
        }

        // get all categorys
        $categorys = $this->categorys_model->get_all(0, 0, $filters, $sort, $dir);

        if ($categorys['total'] > 0)
        { 
            // export the file
            array_to_csv($categorys['results'], "categorys");
        }
        else
        {
            // nothing to export
            $this->session->set_flashdata('error', lang('core error no_results'));
            redirect($this->_redirect_url);
        } 
        exit;
    }


    /**************************************************************************************
     * PRIVATE VALIDATION CALLBACK FUNCTIONS
     **************************************************************************************/
  
    /**
     * Make sure email is available
     *
     * @param  string $email
     * @param  string|null $current
     * @return int|boolean
     */
    function _check_name($category_name, $current)
    {
	
        if (trim($category_name) != trim($current) && $this->categorys_model->name_exists($category_name))
        {
            $this->form_validation->set_message('_check_name', sprintf(lang('categorys error name_exists'), $email));
            return FALSE;
        }
        else
        {
            return $category_name;
        }
    } 
	

}
