<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Joborders extends Admin_Controller {

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
		$this->lang->load('joborders');

		// load the joborders model
		$this->load->model('joborders_model');
		
		// load the clients model
        $this->load->model('clients_model');

		// load the clients model
        $this->load->model('users_model');
		
		// set constants
		define('REFERRER', "referrer");
		define('THIS_URL', base_url('admin/joborders'));
		define('DEFAULT_LIMIT', $this->settings->per_page_limit);
		define('DEFAULT_OFFSET', 0);
		define('DEFAULT_SORT', "joborder_id");
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
		if($this->checkAuth(5,'u_view') == 0)
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
		if($this->checkAuth(5,'u_view') == 0)
		    redirect(base_url()."admin/accessdenied");
		
        // get parameters
        $limit  = $this->input->get('limit')  ? $this->input->get('limit', TRUE)  : DEFAULT_LIMIT;
        $offset = $this->input->get('offset') ? $this->input->get('offset', TRUE) : DEFAULT_OFFSET;
        $sort   = $this->input->get('sort')   ? $this->input->get('sort', TRUE)   : DEFAULT_SORT;
        $dir    = $this->input->get('dir')    ? $this->input->get('dir', TRUE)    : DEFAULT_DIR;

        // get filters
        $filters = array();

        if ($this->input->get('joborder_id'))
        {
            $filters['joborder_id'] = $this->input->get('joborder_id', TRUE);
        }

        if ($this->input->get('title'))
        {
            $filters['title'] = $this->input->get('title', TRUE);
        }
		
		if ($this->input->get('company_id'))
        {
            $filters['company_id'] = $this->input->get('company_id', TRUE);
        }

        if ($this->input->get('type'))
        {
            $filters['type'] = $this->input->get('type', TRUE);
        }
		
		if ($this->input->get('status'))
        {
            $filters['status'] = $this->input->get('status', TRUE);
        }
		
		if ($this->input->get('date_created'))
        {
            $filters['date_created'] = $this->input->get('date_created', TRUE);
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

                if ($this->input->post('joborder_id'))
                {
                    $filter .= "&joborder_id=" . $this->input->post('joborder_id', TRUE);
                }
				
				if ($this->input->post('title'))
                {
                    $filter .= "&title=" . $this->input->post('title', TRUE);
                }

                if ($this->input->post('company_id'))
                {
                    $filter .= "&company_id=" . $this->input->post('company_id', TRUE);
                }

                if ($this->input->post('type'))
                {
                    $filter .= "&type=" . $this->input->post('type', TRUE);
                }
				
			    if ($this->input->post('status'))
                {
                    $filter .= "&status=" . $this->input->post('status', TRUE);
                }
				
				if ($this->input->post('date_created'))
                {
                    $filter .= "&date_created=" . $this->input->post('date_created', TRUE);
                }

                // redirect using new filter(s)
                redirect(THIS_URL . "?sort={$sort}&dir={$dir}&limit={$limit}&offset={$offset}{$filter}");
            }
        }

        // get list
        $joborders = $this->joborders_model->get_all($limit, $offset, $filters, $sort, $dir);

        // build pagination
        $this->pagination->initialize(array(
            'base_url'   => THIS_URL . "?sort={$sort}&dir={$dir}&limit={$limit}{$filter}",
            'total_rows' => $joborders['total'],
            'per_page'   => $limit
        ));

        // setup page header data
		$this 
			->add_css_theme( 'bootstrap-datepicker.css' )
			->add_js_theme( 'bootstrap-datepicker.js' )
			->add_js_theme( 'candidates_i18n.js', TRUE )
			->set_title( lang('joborders title') );

        $data = $this->includes;

        // set content data
        $content_data = array(
            'this_url'   => THIS_URL,
            'joborders'      => $joborders['results'],
            'total'      => $joborders['total'],
            'filters'    => $filters,
            'filter'     => $filter,
            'pagination' => $this->pagination->create_links(),
            'limit'      => $limit,
            'offset'     => $offset,
            'sort'       => $sort,
            'dir'        => $dir
        );

        // load views
        $data['content'] = $this->load->view('admin/joborders/list', $content_data, TRUE);
        $this->load->view($this->template, $data);
    }
 
      
	
	/* Validation Check */
	
	protected function validation(){
		
		// validators
        $this->form_validation->set_error_delimiters($this->config->item('error_delimeter_left'), $this->config->item('error_delimeter_right'));
        
		$this->form_validation->set_rules('title', lang('joborders col title'), 'required|trim|min_length[2]|max_length[50]');
		
		$this->form_validation->set_rules('client_id', lang('joborders col Company Name'), 'required');
		
		$this->form_validation->set_rules('city', lang('joborders input City'), 'required|trim|min_length[2]|max_length[50]');
		
		$this->form_validation->set_rules('state', lang('joborders input State'), 'required|trim|min_length[2]|max_length[50]');
		
		$this->form_validation->set_rules('recruiter', lang('joborders input Recruiter'), 'required|trim');
		
	  
		return $this->form_validation->run();
		
	} 
	/* End Validation Check */
	
	
	
    /**
     * Add new joborder
     */
    function add()
    { 
	
		/* Check user permission */   
		if($this->checkAuth(5,'u_add') == 0)
		    redirect(base_url()."admin/accessdenied");
		
		
		 // setup page header data
		$this 
			->add_css_theme( 'bootstrap-datepicker.css' )
			->add_js_theme( 'bootstrap-datepicker.js' )
			->add_js_theme( 'candidates_i18n.js', TRUE )
			->set_title( lang('joborders title') );

        $data = $this->includes;
		$emailValue=''; 
        if ($this->validation($emailValue))
        {
		  
			// save the new joborder 
            $saved = $this->joborders_model->add_candidate($this->input->post());

            if ($saved)
            {
                $this->session->set_flashdata('message', sprintf(lang('joborders msg add_client_success'), $this->input->post('first_name') .' '.$this->input->post('last_name') ));
            }
            else
            {
                $this->session->set_flashdata('error', sprintf(lang('joborders error add_client_failed'), $this->input->post('first_name') .' '.$this->input->post('last_name')));
            }

            // return to list and display message
            redirect($this->_redirect_url);
        }

        // setup page header data
        $this->set_title( lang('joborders title client_add') );

        $data = $this->includes;
		
		$companyList = $this->clients_model->clientDropDownList();
		$usersList = $this->users_model->usersDropDownList();
		$jobTypeList = $this->joborders_model->jobTypeLevelDropDownList();
		$visaType = array('H1'=>'H1','B1'=>'B1','C1'=>'C1');
		
        // set content data
        $content_data = array(
            'cancel_url'        => $this->_redirect_url,
            'joborder'              => NULL,
			'comanylist'		=> $companyList,
			'usersList'		=> $usersList,
			'jobTypeList'	=> $jobTypeList,
			'visaType'		=> $visaType
            
        );

        // load views
        $data['content'] = $this->load->view('admin/joborders/form', $content_data, TRUE);
        $this->load->view($this->template, $data);
    }


    /**
     * Edit existing joborder
     *
     * @param  int $id
     */
    function edit($id = NULL)
    {
		/* Check user permission */   
		if($this->checkAuth(5,'u_edit') == 0)
		    redirect(base_url()."admin/accessdenied");
		
		 // setup page header data
		$this 
			->add_css_theme( 'bootstrap-datepicker.css' )
			->add_js_theme( 'bootstrap-datepicker.js' )
			->add_js_theme( 'candidates_i18n.js', TRUE )
			->set_title( lang('joborders title') );

        $data = $this->includes;
		
		
        // make sure we have a numeric id
        if (is_null($id) OR ! is_numeric($id))
        {
            redirect($this->_redirect_url);
        }

        // get the data
        $joborder = $this->joborders_model->get_joborders($id);

        // if empty results, return to list
        if ( ! $joborder)
        {
            redirect($this->_redirect_url);
        }
 
        if ($this->validation())
        {

			  
            // save the changes
            $saved = $this->joborders_model->edit_company($this->input->post());

            if ($saved)
            {
                $this->session->set_flashdata('message', sprintf(lang('joborders msg edit_client_success'), $this->input->post('name')));
            }
            else
            {
                $this->session->set_flashdata('error', sprintf(lang('joborders error edit_client_failed'), $this->input->post('name')));
            }

            // return to list and display message
            redirect($this->_redirect_url);
        }

        // setup page header data
        $this->set_title( lang('joborders title client_edit') );

        $data = $this->includes;
		
		
		$companyList = $this->clients_model->clientDropDownList();
		$usersList = $this->users_model->usersDropDownList();
		$jobTypeList = $this->joborders_model->jobTypeLevelDropDownList();
		$visaType = array('H1'=>'H1','B1'=>'B1','C1'=>'C1');
		
        // set content data
        $content_data = array(
            'cancel_url'        => $this->_redirect_url,
            'joborder'              => $joborder,
            'joborder_id'           => $id,
			'comanylist'		=> $companyList,
			'usersList'		=> $usersList,
			'jobTypeList'	=> $jobTypeList,
			'visaType'		=> $visaType
        );

        // load views
        $data['content'] = $this->load->view('admin/joborders/form', $content_data, TRUE);
        $this->load->view($this->template, $data);
    }
	 

    /**
     * Delete a joborder
     *
     * @param  int $id
     */
    function delete($id = NULL)
    {
		/* Check user permission */   
		if($this->checkAuth(5,'u_delete') == 0)
		    redirect(base_url()."admin/accessdenied");
		
        // make sure we have a numeric id
        if ( ! is_null($id) OR ! is_numeric($id))
        {
            // get joborder details
            $joborder = $this->joborders_model->get_candidate($id);

            if ($joborder)
            {
                // soft-delete the joborder
                $delete = $this->joborders_model->delete_company($id);

                if ($delete)
                {
                    $this->session->set_flashdata('message', sprintf(lang('joborders msg delete_client'), $joborder['name']));
                }
                else
                {
                    $this->session->set_flashdata('error', sprintf(lang('joborders error delete_client'), $joborder['name']));
                }
            }
            else
            {
                $this->session->set_flashdata('error', lang('joborders error client_not_exist'));
            }
        }
        else
        {
            $this->session->set_flashdata('error', lang('joborders error company_id_required'));
        }

        // return to list and display message
        redirect($this->_redirect_url);
    }

	function assign($id)
    {
		// load the clients model
        $this->load->model('candidates_model');
		
		// load the language files
		$this->lang->load('candidates');
		
		  /* Check user permission */   
		if($this->checkAuth(6,'u_view') == 0)
		    redirect(base_url()."admin/accessdenied"); 
		
        // get parameters
        $limit  = $this->input->get('limit')  ? $this->input->get('limit', TRUE)  : DEFAULT_LIMIT;
        $offset = $this->input->get('offset') ? $this->input->get('offset', TRUE) : DEFAULT_OFFSET;
        $sort   = $this->input->get('sort')   ? $this->input->get('sort', TRUE)   : 'candidate_id';
        $dir    = $this->input->get('dir')    ? $this->input->get('dir', TRUE)    : DEFAULT_DIR;

        // get filters
        $filters = array();
		 
		
        if ($this->input->get('first_name'))
        {
            $filters['first_name'] = $this->input->get('first_name', TRUE);
        }

        if ($this->input->get('last_name'))
        {
            $filters['last_name'] = $this->input->get('last_name', TRUE);
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

                if ($this->input->post('first_name'))
                {
                    $filter .= "&first_name=" . $this->input->post('first_name', TRUE);
                }
				
				if ($this->input->post('last_name'))
                {
                    $filter .= "&last_name=" . $this->input->post('last_name', TRUE);
                }

                if ($this->input->post('city'))
                {
                    $filter .= "&city=" . $this->input->post('city', TRUE);
                }

                if ($this->input->post('state'))
                {
                    $filter .= "&state=" . $this->input->post('state', TRUE);
                }
				
			    if ($this->input->post('key_skills'))
                {
                    $filter .= "&key_skills=" . $this->input->post('key_skills', TRUE);
                }

                // redirect using new filter(s)
                redirect( base_url('admin/joborders/assign/') . "$id?sort={$sort}&dir={$dir}&limit={$limit}&offset={$offset}{$filter}");
            }
        }

        // get list
        $candidates = $this->candidates_model->get_all($limit, $offset, $filters, $sort, $dir,$id);

        // build pagination
        $this->pagination->initialize(array(
            'base_url'   =>  base_url('admin/joborders/assign/') . "$id?sort={$sort}&dir={$dir}&limit={$limit}{$filter}",
            'total_rows' => $candidates['total'],
            'per_page'   => $limit
        ));

        // setup page header data
		$this 
			->add_css_theme( 'bootstrap-datepicker.css' )
			->add_js_theme( 'bootstrap-datepicker.js' )
			->add_js_theme( 'candidates_i18n.js', TRUE )
			->set_title( lang('candidates assign') );

        $data = $this->includes;
		
		// load the candidates model
	    $candidateStatusNotesList = $this->joborders_model->candidateStatusDropDownList(0);

        // set content data
        $content_data = array(
            'this_url'   => base_url('admin/joborders/assign/').$id,
            'candidates'      => $candidates['results'],
            'total'      => $candidates['total'],
            'filters'    => $filters,
            'filter'     => $filter,
            'pagination' => $this->pagination->create_links(),
            'limit'      => $limit,
            'offset'     => $offset,
            'sort'       => $sort,
            'dir'        => $dir, 
			'id'		 => $id,
			'candidateStatusNotesList' => $candidateStatusNotesList
        );

        // load views
        $data['content'] = $this->load->view('admin/joborders/assign-candidate-list', $content_data, TRUE);
        $this->load->view($this->template, $data);
	}
	
	
	
	 

    /**
     * Export list to CSV
     */
    function export()
    {
		/* Check user permission */   
		if($this->checkAuth(5,'u_view') == 0)
		    redirect(base_url()."admin/accessdenied");
		
        // get parameters
        $sort = $this->input->get('sort') ? $this->input->get('sort', TRUE) : DEFAULT_SORT;
        $dir  = $this->input->get('dir')  ? $this->input->get('dir', TRUE)  : DEFAULT_DIR;

        // get filters
        $filters = array();

        if ($this->input->get('joborder_id'))
        {
            $filters['joborder_id'] = $this->input->get('joborder_id', TRUE);
        }

        if ($this->input->get('title'))
        {
            $filters['title'] = $this->input->get('title', TRUE);
        }
		
		if ($this->input->get('company_id'))
        {
            $filters['company_id'] = $this->input->get('company_id', TRUE);
        }

        if ($this->input->get('type'))
        {
            $filters['type'] = $this->input->get('type', TRUE);
        }
		
		if ($this->input->get('status'))
        {
            $filters['status'] = $this->input->get('status', TRUE);
        }
		
		if ($this->input->get('date_created'))
        {
            $filters['date_created'] = $this->input->get('date_created', TRUE);
        }

        // get all joborders
        $joborders = $this->joborders_model->get_all(0, 0, $filters, $sort, $dir);

        if ($joborders['total'] > 0)
        { 
            // export the file
            array_to_csv($joborders['results'], "joborders");
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
    function _check_email($email, $current)
    {
        if (trim($email) != trim($current) && $this->joborders_model->email_exists($email))
        {
            $this->form_validation->set_message('_check_email', sprintf(lang('joborders error email_exists'), $email));
            return FALSE;
        }
        else
        {
            return $email;
        }
    } 
	

}
