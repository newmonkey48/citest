<?php

class Form extends CI_Controller {

	function index()
	{
		$this->load->helper(array('form', 'url'));

		$this->load->library('form_validation');

		$this->form_validation->set_rules('username', 'Username', 'callback_username_check');
		//$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]|max_length[12]|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|matches[passconf]|md5');
		$this->form_validation->set_rules('passconf', 'Password Confirmation', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		
		/*
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('passconf', 'Password Confirmation', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
        */
		/*
		$config = array(
               array(
                     'field'   => 'username', 
                     'label'   => 'Username', 
                     'rules'   => 'required'
                  ),
               array(
                     'field'   => 'password', 
                     'label'   => 'Password', 
                     'rules'   => 'required'
                  ),
               array(
                     'field'   => 'passconf', 
                     'label'   => 'Password Confirmation', 
                     'rules'   => 'required'
                  ),   
               array(
                     'field'   => 'email', 
                     'label'   => 'Email', 
                     'rules'   => 'required'
                  )
            );
			
		$this->form_validation->set_rules($config);
        */		
		
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('/sample/form/myform');
		}
		else
		{
			$this->load->view('/sample/form/formsuccess');
		}
	}
	
	public function username_check($str)
	{
		if ($str == 'test')
		{
			$this->form_validation->set_message('username_check', 'The %s field can not be the word "test"');
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}
	
	public function table() {
		$this->load->helper('url');
	    $this->lang->load('index', 'tw');
	    
	
		$this->load->library('table');
		
	    $data['title'] = "Hello Calendar";
		$data["table"] = array(
				 array('Name', 'Color', 'Size'),
				 array('Fred', 'Blue', 'Small'),
				 array('Mary', 'Red', 'Large'),
				 array('John', 'Green', 'Medium')	
				 );
		$this->load->view('templates/header', $data);
		$this->load->view('/sample/form/table',$data);
		$this->load->view('templates/footer');
	}

}
?>