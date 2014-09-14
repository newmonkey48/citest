<?php
class Upload extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
	}
	
	function index()
	{
		$data['title'] = "Hello Upload";
		
		$this->load->helper('form');
		$this->load->view('templates/header', $data);
		$this->load->view('sample/upload/upload_form',array('error'=>' '));
		$this->load->view('templates/footer');
	}
	
	function do_upload()
	{
		$data['title'] = "Hello Upload";
		$this->load->helper('form');
		$this->load->helper('url');
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '100';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';

		$this->load->library('upload',$config);

		$this->load->view('templates/header', $data);
		
		if ( ! $this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());

			$this->load->view('sample/upload/upload_form',$error);
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());

			$this->load->view('sample/upload/upload_success',$data);
		}
		
		$this->load->view('templates/footer');
	}
}
?>