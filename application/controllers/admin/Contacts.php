<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Contacts extends Admin_Controller {

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
        $this->lang->load('contacts');

        // load the contacts model
        $this->load->model('contacts_model');

        // set constants
        define('REFERRER', "referrer");
        define('THIS_URL', base_url('admin/contacts'));
        define('DEFAULT_LIMIT', $this->settings->per_page_limit);
        define('DEFAULT_OFFSET', 0);
        define('DEFAULT_SORT', "contact_id");
        define('DEFAULT_DIR', "desc");

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
		if($this->checkAuth(4,'u_view') == 0)
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
		if($this->checkAuth(4,'u_view') == 0)
		    redirect(base_url()."admin/accessdenied"); 
		
		
        // get parameters
        $limit  = $this->input->get('limit')  ? $this->input->get('limit', TRUE)  : DEFAULT_LIMIT;
        $offset = $this->input->get('offset') ? $this->input->get('offset', TRUE) : DEFAULT_OFFSET;
        $sort   = $this->input->get('sort')   ? $this->input->get('sort', TRUE)   : DEFAULT_SORT;
        $dir    = $this->input->get('dir')    ? $this->input->get('dir', TRUE)    : DEFAULT_DIR;

        // get filters
        $filters = array();

        if ($this->input->get('client_id'))
        {
            $filters['client_id'] = $this->input->get('client_id', TRUE);
        }

        if ($this->input->get('first_name'))
        {
            $filters['first_name'] = $this->input->get('first_name', TRUE);
        }

        if ($this->input->get('last_name'))
        {
            $filters['last_name'] = $this->input->get('last_name', TRUE);
        }
		
		if ($this->input->get('email_work'))
        {
            $filters['email_work'] = $this->input->get('email_work', TRUE);
        }
		
		if ($this->input->get('phone_work'))
        {
            $filters['phone_work'] = $this->input->get('phone_work', TRUE);
        }
		
		if ($this->input->get('is_active'))
        {
			$statusId = '';
			if($this->input->get('is_active', TRUE) == "1"){
				$statusId = 1;
			} else if($this->input->get('is_active', TRUE) == "inactive") {
				$statusId = 0;
			}
            $filters['is_active'] = $statusId;
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

                if ($this->input->post('client_id'))
                {
                    $filter .= "&client_id=" . $this->input->post('client_id', TRUE);
                }

                if ($this->input->post('first_name'))
                {
                    $filter .= "&first_name=" . $this->input->post('first_name', TRUE);
                }

                if ($this->input->post('last_name'))
                {
                    $filter .= "&last_name=" . $this->input->post('last_name', TRUE);
                }
				
			    if ($this->input->post('email_work'))
                {
                    $filter .= "&email_work=" . $this->input->post('email_work', TRUE);
                }
				
				if ($this->input->post('phone_work'))
                {
                    $filter .= "&phone_work=" . $this->input->post('phone_work', TRUE);
                }
				
				if ($this->input->post('is_active'))
                {
                    $filter .= "&is_active=" . $this->input->post('is_active', TRUE);
                }

                // redirect using new filter(s)
                redirect(THIS_URL . "?sort={$sort}&dir={$dir}&limit={$limit}&offset={$offset}{$filter}");
            }
        }

        // get list
        $contacts = $this->contacts_model->get_all($limit, $offset, $filters, $sort, $dir);

        // build pagination
        $this->pagination->initialize(array(
            'base_url'   => THIS_URL . "?sort={$sort}&dir={$dir}&limit={$limit}{$filter}",
            'total_rows' => $contacts['total'],
            'per_page'   => $limit
        ));

        // setup page header data
		$this 
			->add_css_theme( 'bootstrap-datepicker.css' )
			->add_js_theme( 'bootstrap-datepicker.js' )
			->add_js_theme( 'contacts_i18n.js', TRUE )
			->set_title( lang('contacts title client_list') );

        $data = $this->includes;
		
		/* Status Array */
		$statuslist = array(''=>'-Select-','1'=>'Active','inactive'=>'Inactive');
		
		//dropdonw list
		 $this->load->model('users_model');
		 $userList = $this->users_model->usersDropDownList();
		 
		 $this->load->model('clients_model');
		 $leftCompany = $this->clients_model->clientDropDownList();
		 
		
        // set content data
        $content_data = array(
            'this_url'   => THIS_URL,
            'contacts'      => $contacts['results'],
            'total'      => $contacts['total'],
            'filters'    => $filters,
            'filter'     => $filter,
            'pagination' => $this->pagination->create_links(),
            'limit'      => $limit,
            'offset'     => $offset,
            'sort'       => $sort,
            'dir'        => $dir,
			'statuslist' => $statuslist,
			'userList'	=> $userList,
			'leftCompany' => $leftCompany	
			
        );

        // load views
        $data['content'] = $this->load->view('admin/contacts/list', $content_data, TRUE);
        $this->load->view($this->template, $data);
    }

	
	
	/* Validation Check */
	
	protected function validation(){
		
		 // validators
        $this->form_validation->set_error_delimiters($this->config->item('error_delimeter_left'), $this->config->item('error_delimeter_right'));
		
		$this->form_validation->set_rules('client_id', lang('contacts col client_id'), 'required|trim');
		
		$this->form_validation->set_rules('report_to', lang('contacts input report_to'), 'required|trim');
		
		$this->form_validation->set_rules('owner', lang('contacts col owner'), 'required|trim');
		 
		 $this->form_validation->set_rules('first_name', lang('contacts col first_name'), 'required|trim|min_length[2]|max_length[50]');
	
		 $this->form_validation->set_rules('last_name', lang('contacts col last_name'), 'required|trim|min_length[2]|max_length[50]');
		 
		 $this->form_validation->set_rules('title', lang('contacts col title'), 'required|trim|min_length[2]|max_length[50]');
		
		 $this->form_validation->set_rules('email_work', lang('contacts input email_work'), 'required|trim|valid_email|min_length[2]|max_length[100]');
		
		 $this->form_validation->set_rules('email', lang('contacts input email'), 'trim|valid_email|min_length[2]|max_length[100]');
		
		$this->form_validation->set_rules('phone_work', lang('contacts input phone_work'), 'required|trim|numeric|min_length[10]|max_length[10]');
		
		$this->form_validation->set_rules('phone', lang('contacts input phone'), 'trim|numeric|min_length[10]|max_length[10]');
		
		return $this->form_validation->run();
		
	}
	/* End Validation Check */
	
    /**
     * Add new client
     */
    function add()
    {   
		/* Check user permission */ 
		if($this->checkAuth(4,'u_add') == 0)
		    redirect(base_url()."admin/accessdenied"); 
		 
        if ($this->validation())
        {
            // save the new client 
            $saved = $this->contacts_model->add_contact($this->input->post());

            if ($saved)
            {
                $this->session->set_flashdata('message', sprintf(lang('contacts msg add_client_success'), $this->input->post('first_name').' '.$this->input->post('last_name')));
            }
            else
            {
                $this->session->set_flashdata('error', sprintf(lang('contacts error add_client_failed'), $this->input->post('first_name').' '.$this->input->post('last_name')));
            }

            // return to list and display message
            redirect($this->_redirect_url);
        }

        // setup page header data
        $this->set_title( lang('contacts title client_add') );
        $data = $this->includes;
		
		//dropdonw list
		 $this->load->model('users_model');
		 $userList = $this->users_model->usersDropDownList();
		 
		 $this->load->model('clients_model');
		 $leftCompany = $this->clients_model->clientDropDownList();

        // set content data
        $content_data = array(
            'cancel_url'        => $this->_redirect_url,
            'client'            => NULL,
            'contact_id' 		=> NULL,
			'userList'			=> $userList,
			'leftCompany'		=> $leftCompany
        );

        // load views
        $data['content'] = $this->load->view('admin/contacts/form', $content_data, TRUE);
        $this->load->view($this->template, $data);
    }


    /**
     * Edit existing client
     *
     * @param  int $id
     */
    function edit($id = NULL)
    {
		/* Check user permission */ 
		if($this->checkAuth(4,'u_edit') == 0)
		    redirect(base_url()."admin/accessdenied");  
		
        // make sure we have a numeric id
        if (is_null($id) OR ! is_numeric($id))
        {
            redirect($this->_redirect_url);
        }

        // get the data
        $client = $this->contacts_model->get_company($id);

        // if empty results, return to list
        if ( ! $client)
        {
            redirect($this->_redirect_url);
        }
  
        if ($this->validation())
        {
            // save the changes
            $saved = $this->contacts_model->edit_contact($this->input->post());

            if ($saved)
            {
                $this->session->set_flashdata('message', sprintf(lang('contacts msg edit_client_success'), $this->input->post('first_name').' '.$this->input->post('last_name')));
            }
            else
            {
                $this->session->set_flashdata('error', sprintf(lang('contacts error edit_client_failed'), $this->input->post('first_name').' '.$this->input->post('last_name')));
            }

            // return to list and display message
            redirect($this->_redirect_url);
        }

        // setup page header data
        $this->set_title( lang('contacts title client_edit') );

        $data = $this->includes;
		
		//dropdonw list
		 $this->load->model('users_model');
		 $userList = $this->users_model->usersDropDownList();
		 
		 $this->load->model('clients_model');
		 $leftCompany = $this->clients_model->clientDropDownList();
		

        // set content data
        $content_data = array(
            'cancel_url'        => $this->_redirect_url,
            'client'              => $client,
            'contact_id'           => $id,
            'userList' 				=> $userList,
			'leftCompany'			=> $leftCompany
			
			
			
        );

        // load views
        $data['content'] = $this->load->view('admin/contacts/form', $content_data, TRUE);
        $this->load->view($this->template, $data);
    }


    /**
     * Delete a client
     *
     * @param  int $id
     */
    function delete($id = NULL)
    {
		/* Check user permission */ 
		if($this->checkAuth(4,'u_delete') == 0)
		    redirect(base_url()."admin/accessdenied");
		
        // make sure we have a numeric id
        if ( ! is_null($id) OR ! is_numeric($id))
        {
            // get client details
            $client = $this->contacts_model->get_company($id);

            if ($client)
            {
                // soft-delete the client
                $delete = $this->contacts_model->delete_company($id);

                if ($delete)
                {
                    $this->session->set_flashdata('message', sprintf(lang('contacts msg delete_client'), $client['name']));
                }
                else
                {
                    $this->session->set_flashdata('error', sprintf(lang('contacts error delete_client'), $client['name']));
                }
            }
            else
            {
                $this->session->set_flashdata('error', lang('contacts error client_not_exist'));
            }
        }
        else
        {
            $this->session->set_flashdata('error', lang('contacts error company_id_required'));
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
		if($this->checkAuth(4,'u_view') == 0)
		    redirect(base_url()."admin/accessdenied");
		
        // get parameters
        $sort = $this->input->get('sort') ? $this->input->get('sort', TRUE) : DEFAULT_SORT;
        $dir  = $this->input->get('dir')  ? $this->input->get('dir', TRUE)  : DEFAULT_DIR;

        // get filters
        $filters = array();

        if ($this->input->get('name'))
        {
            $filters['name'] = $this->input->get('name', TRUE);
        }

        if ($this->input->get('city'))
        {
            $filters['city'] = $this->input->get('city', TRUE);
        }

        if ($this->input->get('state'))
        {
            $filters['state'] = $this->input->get('state', TRUE);
        }
		
		if ($this->input->get('phone1'))
        {
            $filters['phone1'] = $this->input->get('phone1', TRUE);
        }

        // get all contacts
        $contacts = $this->contacts_model->get_all(0, 0, $filters, $sort, $dir);

        if ($contacts['total'] > 0)
        { 
            // export the file
            array_to_csv($contacts['results'], "contacts");
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
     * Make sure name is available
     *
     * @param  string $name
     * @param  string|null $current
     * @return int|boolean
     */
    function _check_name($name, $current)
    {
        if (trim($name) != trim($current) && $this->contacts_model->name_exists($name))
        {
            $this->form_validation->set_message('_check_name', sprintf(lang('contacts error name_exists'), $name));
            return FALSE;
        }
        else
        {
            return $name;
        }
    }


    /**
     * Make sure email is available
     *
     * @param  string $email
     * @param  string|null $current
     * @return int|boolean
     */
    function _check_email($email, $current)
    {
        if (trim($email) != trim($current) && $this->contacts_model->email_exists($email))
        {
            $this->form_validation->set_message('_check_email', sprintf(lang('contacts error email_exists'), $email));
            return FALSE;
        }
        else
        {
            return $email;
        }
    }

}
