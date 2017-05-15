<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Candidates extends Admin_Controller {

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
		$this->lang->load('candidates');

		// load the candidates model
		$this->load->model('candidates_model');

		// set constants
		define('REFERRER', "referrer");
		define('THIS_URL', base_url('admin/candidates'));
		define('DEFAULT_LIMIT', $this->settings->per_page_limit);
		define('DEFAULT_OFFSET', 0);
		define('DEFAULT_SORT', "candidate_id");
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
		if($this->checkAuth(6,'u_view') == 0)
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
		if($this->checkAuth(6,'u_view') == 0)
		    redirect(base_url()."admin/accessdenied"); 
		
        // get parameters
        $limit  = $this->input->get('limit')  ? $this->input->get('limit', TRUE)  : DEFAULT_LIMIT;
        $offset = $this->input->get('offset') ? $this->input->get('offset', TRUE) : DEFAULT_OFFSET;
        $sort   = $this->input->get('sort')   ? $this->input->get('sort', TRUE)   : DEFAULT_SORT;
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
                redirect(THIS_URL . "?sort={$sort}&dir={$dir}&limit={$limit}&offset={$offset}{$filter}");
            }
        }

        // get list
        $candidates = $this->candidates_model->get_all($limit, $offset, $filters, $sort, $dir);

        // build pagination
        $this->pagination->initialize(array(
            'base_url'   => THIS_URL . "?sort={$sort}&dir={$dir}&limit={$limit}{$filter}",
            'total_rows' => $candidates['total'],
            'per_page'   => $limit
        ));

        // setup page header data
		$this 
			->add_css_theme( 'bootstrap-datepicker.css' )
			->add_js_theme( 'bootstrap-datepicker.js' )
			->add_js_theme( 'candidates_i18n.js', TRUE )
			->set_title( lang('candidates title') );

        $data = $this->includes;
		
		// load the candidates model
		$this->load->model('clients_model');
		$clientList = $this->clients_model->clientDropDownList();
		
		$jobOrdersList = array(''=>'-Select-');

        // set content data
        $content_data = array(
            'this_url'   => THIS_URL,
            'candidates'      => $candidates['results'],
            'total'      => $candidates['total'],
            'filters'    => $filters,
            'filter'     => $filter,
            'pagination' => $this->pagination->create_links(),
            'limit'      => $limit,
            'offset'     => $offset,
            'sort'       => $sort,
            'dir'        => $dir,
			'clientList' => $clientList,
			'jobOrdersList'	=> $jobOrdersList
        );

        // load views
        $data['content'] = $this->load->view('admin/candidates/list', $content_data, TRUE);
        $this->load->view($this->template, $data);
    }
 
     
		
	/* 
		File Upload
		Develop By : PARTHIV SHAH
		DATE : 10-04-2047
	*/
		
	protected function fileUpload($controlName){  
	
		if(!empty($_FILES[$controlName]['name'])){
			
			$config['upload_path'] = 'uploads/';
			$config['allowed_types'] = 'jpg|jpeg|png|gif|doc|docx|pdf';			
			$fullFileName = explode(".",$_FILES[$controlName]['name']);				 
			$fname = preg_replace("/[^a-zA-Z]+/", "",$fullFileName[0]);
			$config['file_name'] = time()."_".$fname.".".$fullFileName[(sizeof($fullFileName)-1)];
			
			//Load upload library and initialize configuration
			$this->load->library('upload',$config);
			$this->upload->initialize($config);
			
			if($this->upload->do_upload($controlName)){
				$uploadData = $this->upload->data();
				$importresume = $uploadData['file_name'];
			}else{
				$importresume = '';
			}
		}else{
			$importresume = '';
		} 
		return $importresume; 		
	}	
	
	/* End File Upload */
	
	
	/* Validation Check */
	
	protected function validation($emailIdValue){
		
		// validators
        $this->form_validation->set_error_delimiters($this->config->item('error_delimeter_left'), $this->config->item('error_delimeter_right'));
        
		$this->form_validation->set_rules('first_name', lang('candidates input first name'), 'required|trim|min_length[2]|max_length[50]');
		
		$this->form_validation->set_rules('last_name', lang('candidates input last name'), 'required|trim|min_length[2]|max_length[50]');
		
        $this->form_validation->set_rules('phone_home', 'Home Phone Number Only', 'trim|regex_match[/^[0-9]{10}$/]');  
		
		$this->form_validation->set_rules('phone_cell', 'Cell Phone Number Only', 'trim|regex_match[/^[0-9]{10}$/]');
		
		$this->form_validation->set_rules('phone_work', 'Work Phone Number Only', 'trim|regex_match[/^[0-9]{10}$/]');
		 
		if(!empty($emailIdValue)) {
			$this->form_validation->set_rules('email1', lang('candidates input E-Mail'), 'trim|max_length[128]|valid_email|callback__check_email[' . $emailIdValue . ']');
		}else{
			$this->form_validation->set_rules('email1', lang('candidates input E-Mail'), 'trim|max_length[128]|valid_email|callback__check_email[]');
		}
		
		$this->form_validation->set_rules('email2', lang('candidates input 2nd E-Mail'), 'trim|max_length[128]|valid_email');
		
		return $this->form_validation->run();
		
	}
		
	
	/* End Validation Check */
	
	
	
    /**
     * Add new candidate
     */
    function add()
    { 
		/* Check user permission */   
		if($this->checkAuth(6,'u_add') == 0)
		    redirect(base_url()."admin/accessdenied");
		
		 // setup page header data
		$this 
			->add_css_theme( 'bootstrap-datepicker.css' )
			->add_js_theme( 'bootstrap-datepicker.js' )
			->add_js_theme( 'candidates_i18n.js', TRUE )
			->set_title( lang('candidates title') );

        $data = $this->includes;
		$emailValue=''; 
        if ($this->validation($emailValue))
        {
		 
		    // Resume Upload 
			$resumeNameGetAfterUpload =  $this->fileUpload("importresume"); 
         
			// save the new candidate 
            $saved = $this->candidates_model->add_candidate($this->input->post(),$resumeNameGetAfterUpload);

            if ($saved)
            {
                $this->session->set_flashdata('message', sprintf(lang('candidates msg add_client_success'), $this->input->post('first_name') .' '.$this->input->post('last_name') ));
            }
            else
            {
                $this->session->set_flashdata('error', sprintf(lang('candidates error add_client_failed'), $this->input->post('first_name') .' '.$this->input->post('last_name')));
            }

            // return to list and display message
            redirect($this->_redirect_url);
        }

        // setup page header data
        $this->set_title( lang('candidates title client_add') );

        $data = $this->includes;

        // set content data
        $content_data = array(
            'cancel_url'        => $this->_redirect_url,
            'candidate'              => NULL,
            'password_required' => TRUE
        );

        // load views
        $data['content'] = $this->load->view('admin/candidates/form', $content_data, TRUE);
        $this->load->view($this->template, $data);
    }


    /**
     * Edit existing candidate
     *
     * @param  int $id
     */
    function edit($id = NULL)
    {
		/* Check user permission */   
		if($this->checkAuth(6,'u_edit') == 0)
		    redirect(base_url()."admin/accessdenied");
		
		 // setup page header data
		$this 
			->add_css_theme( 'bootstrap-datepicker.css' )
			->add_js_theme( 'bootstrap-datepicker.js' )
			->add_js_theme( 'candidates_i18n.js', TRUE )
			->set_title( lang('candidates title') );

        $data = $this->includes;
		
		
        // make sure we have a numeric id
        if (is_null($id) OR ! is_numeric($id))
        {
            redirect($this->_redirect_url);
        }

        // get the data
        $candidate = $this->candidates_model->get_candidate($id);

        // if empty results, return to list
        if ( ! $candidate)
        {
            redirect($this->_redirect_url);
        }
 
        if ($this->validation($candidate['email1']))
        {

			// Resume Upload 
			$resumeNameGetAfterUpload =  $this->fileUpload("importresume");
			 
            // save the changes
            $saved = $this->candidates_model->edit_company($this->input->post(),$resumeNameGetAfterUpload);

            if ($saved)
            {
                $this->session->set_flashdata('message', sprintf(lang('candidates msg edit_client_success'), $this->input->post('name')));
            }
            else
            {
                $this->session->set_flashdata('error', sprintf(lang('candidates error edit_client_failed'), $this->input->post('name')));
            }

            // return to list and display message
            redirect($this->_redirect_url);
        }

        // setup page header data
        $this->set_title( lang('candidates title client_edit') );

        $data = $this->includes;

        // set content data
        $content_data = array(
            'cancel_url'        => $this->_redirect_url,
            'candidate'              => $candidate,
            'candidate_id'           => $id,
            'password_required' => FALSE
        );

        // load views
        $data['content'] = $this->load->view('admin/candidates/form', $content_data, TRUE);
        $this->load->view($this->template, $data);
    }
	 

    /**
     * Delete a candidate
     *
     * @param  int $id
     */
    function delete($id = NULL)
    {
		/* Check user permission */   
		if($this->checkAuth(6,'u_delete') == 0)
		    redirect(base_url()."admin/accessdenied"); 
		
        // make sure we have a numeric id
        if ( ! is_null($id) OR ! is_numeric($id))
        {
            // get candidate details
            $candidate = $this->candidates_model->get_candidate($id);

            if ($candidate)
            {
                // soft-delete the candidate
                $delete = $this->candidates_model->delete_company($id);

                if ($delete)
                {
                    $this->session->set_flashdata('message', sprintf(lang('candidates msg delete_client'), $candidate['name']));
                }
                else
                {
                    $this->session->set_flashdata('error', sprintf(lang('candidates error delete_client'), $candidate['name']));
                }
            }
            else
            {
                $this->session->set_flashdata('error', lang('candidates error client_not_exist'));
            }
        }
        else
        {
            $this->session->set_flashdata('error', lang('candidates error company_id_required'));
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
		if($this->checkAuth(6,'u_view') == 0)
		    redirect(base_url()."admin/accessdenied"); 
		
        // get parameters
        $sort = $this->input->get('sort') ? $this->input->get('sort', TRUE) : DEFAULT_SORT;
        $dir  = $this->input->get('dir')  ? $this->input->get('dir', TRUE)  : DEFAULT_DIR;

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

        // get all candidates
        $candidates = $this->candidates_model->get_all(0, 0, $filters, $sort, $dir);

        if ($candidates['total'] > 0)
        { 
            // export the file
            array_to_csv($candidates['results'], "candidates");
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
        if (trim($email) != trim($current) && $this->candidates_model->email_exists($email))
        {
            $this->form_validation->set_message('_check_email', sprintf(lang('candidates error email_exists'), $email));
            return FALSE;
        }
        else
        {
            return $email;
        }
    } 
	

}
