<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct()
    {
        parent::__construct(); 
	}
	public function index()
	{
		$this->load->view('inc/admin/header');
		$this->load->view('admin/sign-in');
		$this->load->view('inc/admin/footer');
	}
	public function login(){
		$this->output->set_content_type("application_json");
		//$this->output->enable_profiler(false); 
		//$this->output->set_status_header('500');
		
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required');
		//echo $this->form_validation->run();
		
		// if($this->form_validation->run() == FALSE){
		// 	$this->output->set_output(json_encode(['result' => 0, 'data' => $this->form_validation->error_array()]));
		// 	return FALSE;
		// }
		
		$email = $this->input->post("email");
		$password = md5($this->input->post("password"));	
		
		$info = array(
			'email' => $email,
			'password' => $password			
		);
		//$this->output->enable_profiler();
		$regUser = $this->user_model->adminlogin($info);
		if($regUser != 0){
			$this->session->set_userdata(['admin_id' => $regUser]);
			$this->output->set_output(json_encode(['result' => 1]));
			return FALSE;
		}
		$this->output->set_output(json_encode(['result' => 2, 'data' => 'User does not exist!']));
				
	}
}
?>