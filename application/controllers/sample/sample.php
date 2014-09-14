<?php

class Form extends CI_Controller {	
	public function input() {
		$this->input->post();
		$this->input->cookie();
		$this->input->server();
		
		
        $this->input->post('some_data', TRUE);
		$this->input->post(NULL, TRUE); // returns all POST items with XSS filter 
		$this->input->post(); // returns all POST items without XSS filter
		
		$cookie = array(
			'name'   => 'The Cookie Name',
			'value'  => 'The Value',
			'expire' => '86500',
			'domain' => '.some-domain.com',
			'path'   => '/',
			'prefix' => 'myprefix_',
			'secure' => TRUE
		);

		$this->input->set_cookie($cookie);
		
		$this->input->cookie('some_data', TRUE);
		
		$this->input->server('some_data');
		
		echo $this->input->ip_address();
		
		if ( ! $this->input->valid_ip($ip))
		{
			 echo 'Not Valid';
		}
		else
		{
			 echo 'Valid';
		}
		
		echo $this->input->user_agent();
		
		$headers = $this->input->request_headers();
    }	
	
	
	
}
?>