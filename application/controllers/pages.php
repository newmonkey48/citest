<?php

class Pages extends CI_Controller {
	public function view($page = 'home')
	{				
		if ( ! file_exists('application/views/pages/'.$page.'.php'))
		{
			// �z��!�ڭ̨S���o�ӭ���!
			show_404();
		}
		
		$data['title'] = ucfirst($page); // �Ĥ@�Ӧr���j�g
		
		$this->load->view('templates/header', $data);
		$this->load->view('pages/'.$page, $data);
		$this->load->view('templates/footer', $data);

	}
}
?>