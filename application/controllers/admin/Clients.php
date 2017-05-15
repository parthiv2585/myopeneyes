<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Clients extends Admin_Controller {

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
        $this->lang->load('clients');

        // load the clients model
        $this->load->model('clients_model');

        // set constants
        define('REFERRER', "referrer");
        define('THIS_URL', base_url('admin/clients'));
        define('DEFAULT_LIMIT', $this->settings->per_page_limit);
        define('DEFAULT_OFFSET', 0);
        define('DEFAULT_SORT', "client_id");
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
		if($this->checkAuth(3,'u_view') == 0)
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
		if($this->checkAuth(3,'u_view') == 0)
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

        if ($this->input->get('no_of_employee'))
        {
            $filters['no_of_employee'] = $this->input->get('no_of_employee', TRUE);
        }

        if ($this->input->get('url'))
        {
            $filters['url'] = $this->input->get('url', TRUE);
        }
		
		if ($this->input->get('industrie_id'))
        {
            $filters['industrie_id'] = $this->input->get('industrie_id', TRUE);
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

                if ($this->input->post('name'))
                {
                    $filter .= "&name=" . $this->input->post('name', TRUE);
                }

                if ($this->input->post('no_of_employee'))
                {
                    $filter .= "&no_of_employee=" . $this->input->post('no_of_employee', TRUE);
                }

                if ($this->input->post('url'))
                {
                    $filter .= "&url=" . $this->input->post('url', TRUE);
                }
				
				if ($this->input->post('industrie_id'))
                {
                    $filter .= "&industrie_id=" . $this->input->post('industrie_id', TRUE);
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
        $clients = $this->clients_model->get_all($limit, $offset, $filters, $sort, $dir);

        // build pagination
        $this->pagination->initialize(array(
            'base_url'   => THIS_URL . "?sort={$sort}&dir={$dir}&limit={$limit}{$filter}",
            'total_rows' => $clients['total'],
            'per_page'   => $limit
        ));

        // setup page header data
		$this 
			->add_css_theme( 'bootstrap-datepicker.css' )
			->add_js_theme( 'bootstrap-datepicker.js' )
			->add_js_theme( 'clients_i18n.js', TRUE )
			->set_title( lang('clients title client_list') );

        $data = $this->includes;
		
		 // load the clients model
        $this->load->model('industries_model');
		$industriesDropDown = $this->industries_model->industriesDropDownList();
		
		/* Status Array */
		$statuslist = array(''=>'-Select-','1'=>'Active','inactive'=>'Inactive');
		
        // set content data
        $content_data = array(
            'this_url'   => THIS_URL,
            'clients'      => $clients['results'],
            'total'      => $clients['total'],
            'filters'    => $filters,
            'filter'     => $filter,
            'pagination' => $this->pagination->create_links(),
            'limit'      => $limit,
            'offset'     => $offset,
            'sort'       => $sort,
            'dir'        => $dir,
			'industriesDropDown' => $industriesDropDown,
			'statuslist'	=> $statuslist
        );

        // load views
        $data['content'] = $this->load->view('admin/clients/list', $content_data, TRUE);
        $this->load->view($this->template, $data);
    }

	/* 
		File Upload
		Develop By : PARTHIV SHAH
		DATE : 10-04-2047
	*/
		
	protected function fileUpload($controlName){  
	
		if(!empty($_FILES[$controlName]['name'])){
			
			$config['upload_path'] = 'uploads/client_logo/';
			$config['allowed_types'] = 'jpg|jpeg|png|gif|doc|docx|pdf';			
			$fullFileName = explode(".",$_FILES[$controlName]['name']);				 
			$fname = preg_replace("/[^a-zA-Z]+/", "",$fullFileName[0]);
			$config['file_name'] = time()."_".$fname.".".$fullFileName[(sizeof($fullFileName)-1)];
			
			//Load upload library and initialize configuration
			$this->load->library('upload',$config);
			$this->upload->initialize($config);
			
			if($this->upload->do_upload($controlName)){
				$uploadData = $this->upload->data();
				$client_logo = $uploadData['file_name'];
			}else{
				$client_logo = '';
			}
		}else{
			$client_logo = '';
		} 
		return $client_logo; 		
	}	
	
	/* End File Upload */
	
	/* Validation Check */
	
	protected function validation($companyName=NULL){
		
		 // validators
        $this->form_validation->set_error_delimiters($this->config->item('error_delimeter_left'), $this->config->item('error_delimeter_right'));
		
		
		if(isset($companyName) && !empty($companyName)){
		
			$this->form_validation->set_rules('name', lang('clients input client name'), 'required|trim|min_length[2]|max_length[50]|callback__check_name[' . $companyName . ']');
		
		} else { 		
			$this->form_validation->set_rules('name', lang('clients input client name'), 'required|trim|min_length[2]|max_length[50]|callback__check_name[]');
		}
 
		$this->form_validation->set_rules('no_of_employee', lang('clients input client no_of_employee'), 'trim|numeric|min_length[1]|max_length[6]');
		
		$this->form_validation->set_rules('about_company', lang('clients input client about_company'), 'required|trim|min_length[20]|max_length[150]');	
		
		$this->form_validation->set_rules('industrie_id', lang('clients input client industries'), 'required|trim');
		
		return $this->form_validation->run();
		
	}
	 
	/* End Validation Check */
	
    /**
     * Add new client
     */
    function add()
    {   
	  /* Check user permission */ 
		if($this->checkAuth(3,'u_add') == 0)
		   redirect(base_url()."admin/accessdenied");
		
		
		$name = '';
        if ($this->validation($name))
        { 
			//Client logo 
			$clientLogoName =  $this->fileUpload("client_logo"); 
			
            // save the new client 
            $saved = $this->clients_model->add_company($this->input->post(),$clientLogoName);

            if ($saved)
            {
                $this->session->set_flashdata('message', sprintf(lang('clients msg add_client_success'), $this->input->post('name')));
            }
            else
            {
                $this->session->set_flashdata('error', sprintf(lang('clients error add_client_failed'), $this->input->post('name')));
            }

            // return to list and display message
            redirect($this->_redirect_url);
        }

        // setup page header data
        $this->set_title( lang('clients title client_add') );

        $data = $this->includes;
		
		 // load the clients model
        $this->load->model('industries_model');
		$industriesDropDown = $this->industries_model->industriesDropDownList();
		
		/*$this->load->model('skills_model');
		$skillsDropDown = $this->skills_model->skillsDropDownList();*/
		 
		
        // set content data
        $content_data = array(
            'cancel_url'        => $this->_redirect_url,
            'client'            => NULL,
			'client_id'			=> NULL,
            'industriesDropDown' => $industriesDropDown,
			/*'skillsDropDown'	=> $skillsDropDown*/
        );

        // load views
        $data['content'] = $this->load->view('admin/clients/form', $content_data, TRUE);
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
		if($this->checkAuth(3,'u_edit') == 0)
		   redirect(base_url()."admin/accessdenied"); 
		
        // make sure we have a numeric id
        if (is_null($id) OR ! is_numeric($id))
        {
            redirect($this->_redirect_url);
        }

        // get the data
        $client = $this->clients_model->get_company($id);

        // if empty results, return to list
        if ( ! $client)
        {
            redirect($this->_redirect_url);
        }
  
        if ($this->validation($client['name']))
        {
			// Check client logo..
			
			if(isset($_FILES['client_logo']['name']) && !empty($_FILES['client_logo']['name'])){
				//Client logo 
				$clientLogoName =  $this->fileUpload("client_logo"); 
			} else { 
				$clientLogoName =  $this->input->post('h_client_logo');
			}
			
            // save the changes
            $saved = $this->clients_model->edit_client($this->input->post(),$clientLogoName);

            if ($saved)
            {
                $this->session->set_flashdata('message', sprintf(lang('clients msg edit_client_success'), $this->input->post('name')));
            }
            else
            {
                $this->session->set_flashdata('error', sprintf(lang('clients error edit_client_failed'), $this->input->post('name')));
            }

            // return to list and display message
            redirect($this->_redirect_url);
        }

        // setup page header data
    
		$this 
			->add_css_theme( 'bootstrap-datepicker.css' )
			->add_js_theme( 'bootstrap-datepicker.js' )
			->add_js_theme( 'clients_i18n.js', TRUE )
			->set_title( lang('clients title client_edit') );

        $data = $this->includes;
	
		 // load the clients model
        $this->load->model('industries_model');
		$industriesDropDown = $this->industries_model->industriesDropDownList();
		
		/*$this->load->model('skills_model');
		$skillsDropDown = $this->skills_model->skillsDropDownList();*/
		
		
        // set content data
        $content_data = array(
            'cancel_url'        => $this->_redirect_url,
            'client'              => $client, 
			'client_id'				=> $id,            
			'industriesDropDown' => $industriesDropDown
			/*'skillsDropDown'	=> $skillsDropDown*/
        );

        // load views
        $data['content'] = $this->load->view('admin/clients/form', $content_data, TRUE);
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
		if($this->checkAuth(3,'u_delete') == 0)
		   redirect(base_url()."admin/accessdenied"); 
		
        // make sure we have a numeric id
        if ( ! is_null($id) OR ! is_numeric($id))
        {
            // get client details
            $client = $this->clients_model->get_company($id);

            if ($client)
            {
                // soft-delete the client
                $delete = $this->clients_model->delete_company($id);

                if ($delete)
                {
                    $this->session->set_flashdata('message', sprintf(lang('clients msg delete_client'), $client['name']));
                }
                else
                {
                    $this->session->set_flashdata('error', sprintf(lang('clients error delete_client'), $client['name']));
                }
            }
            else
            {
                $this->session->set_flashdata('error', lang('clients error client_not_exist'));
            }
        }
        else
        {
            $this->session->set_flashdata('error', lang('clients error company_id_required'));
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
		if($this->checkAuth(3,'u_view') == 0)
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

        // get all clients
        $clients = $this->clients_model->get_all(0, 0, $filters, $sort, $dir);

        if ($clients['total'] > 0)
        { 
            // export the file
            array_to_csv($clients['results'], "clients");
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
        if (trim($name) != trim($current) && $this->clients_model->name_exists($name))
        {
            $this->form_validation->set_message('_check_name', sprintf(lang('clients error name_exists'), $name));
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
        if (trim($email) != trim($current) && $this->clients_model->email_exists($email))
        {
            $this->form_validation->set_message('_check_email', sprintf(lang('clients error email_exists'), $email));
            return FALSE;
        }
        else
        {
            return $email;
        }
    }

}
