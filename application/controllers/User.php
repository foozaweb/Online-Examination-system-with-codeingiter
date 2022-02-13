<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(0);
class User extends CI_Controller {

	function __construct()
    {
        parent::__construct();
		if(!$this->session->userdata('user_id')){
			redirect('/index.php/home');
		}
    }
	public function index()
	{
		$this->load->view('inc/user/header');
		$this->load->view('user/dashboard');
		$this->load->view('inc/user/footer');
	}
	public function history()
	{
		$this->load->view('inc/user/header');
		$this->load->view('user/history');
		$this->load->view('inc/user/footer');
	}
	
	/************************************************************************************************************************/
	/****************************************************** Exam ************************************************************/
	/************************************************************************************************************************/
	
	public function examination($id=null)
	{
		$data['exam'] = $this->user_model->get_exam($id);
		
		$this->load->view('inc/user/header', $data);
		$this->load->view('user/examination');
		$this->load->view('inc/user/footer');
	}
	public function examstart()
	{
		$this->output->set_content_type("application_json");
		$info = array(
			'exam_id' => $this->input->post('eid'),
			'user_id' => $this->session->user_id
		);
		$data = $this->user_model->startexam($info);
		if($data){
			$this->output->set_output(json_encode(['start' => 1]));
			return FALSE;
		}	
	}
	public function answer()
	{
		$this->output->set_content_type("application_json");
		$ans=array();
		for($i=1; $i<=$this->input->post('qestions'); $i++){
			if($this->input->post('ans'.$i.'')){
				$answer = $this->user_model->answer($this->input->post('ans'.$i.''));
				if($answer){
					array_push($ans,$answer);
				}
			}
		}
		$num = array_sum($ans);
		$den = $this->input->post('qestions');
		$result = ceil(($num/$den)*100); //score
		$info = array(
			'exam_id' => $this->input->post('exam_id'),
			'user_id' => $this->session->user_id,
			'start !=' => NULL
		);
		$data = $this->user_model->answerexam($info,$result);
		if($data){
			$config = array();
        		$config['useragent'] = "CodeIgniter";
        		//$config['mailpath'] = "/usr/bin/sendmail";
			$config['protocol'] = "smtp";
			$config['charset'] = "iso-8859-1";
			$config['wordwrap'] = TRUE;
			$config['mailtype'] = "html";
			$config['crlf'] = "\r\n";
			$config['newline'] = "\r\n";
			//$config['smtp_host'] = "smtp.mailgun.org";
			$config['smtp_host'] = "smtp.mailgun.org";
			$config['smtp_user'] = "postmaster@blwcampusministry.net";
			$config['smtp_pass'] = "1c6531f5250d3051b3078a5ec1f2f4e9";
			$config['smtp_port'] = 587;
			//$config['smtp_crypto'] = "tls";
			//$config['send_multipart'] = FALSE;

			$this->email->initialize($config);
			$u = $this->db->get_where('data_capture', array('dc_id' => $this->session->user_id));
			$user = $u->row();
			$e = $this->db->get_where('ffd_examination', array('id' => $this->input->post('exam_id')));
			$exam = $e->row();
			
			$message="<!DOCTYPE html>
					<html>
					<head>
					</head>
					<body>
					<div class='' style='margin-left:auto;margin-right:auto; text-align:left;height:500px;'>
					<h4>
					Dear ".$user->userTitle." ".$user->name.",</h4>
					<h4>Thank you for your participation in the ".$exam->title." Examination.<br/><br/>
					</h4>
					<h1>You scored ".$result."%</h1>
					<h4>Thanks,<br/>BLW Campus Ministry</h4>
					</div>
					</body>
					</html>";
			$this->email->from('notifications@blwcampusministry.net', 'BLW Exams Result');
			$this->email->to($this->session->email);
			
			$this->email->subject('Exam Results');
			$this->email->message($message); 
			if($this->email->send()){
				$this->output->set_output(json_encode(['answer' => 1, 'result' => $result]));
				return FALSE;
			}else{
				show_error($this->email->print_debugger());
			}
		}				
	}
	public function sub()
	{
		$this->output->set_content_type("application_json");
		$ans=array();
		for($i=1; $i<=$this->input->post('qestions'); $i++){
			if($this->input->post('ans'.$i.'')){
				$full = strtolower($this->input->post('ans'.$i.''));
				$quest = $this->input->post('quest'.$i.'');
				$answer = $this->user_model->sub($full, $quest);
				if($answer){
					array_push($ans, $answer);
				}
			}
		}
		$num = array_sum($ans);
		$den = $this->input->post('qestions');
		$result = ceil(($num/$den)*100); //score
		$info = array(
			'exam_id' => $this->input->post('exam_id'),
			'user_id' => $this->session->user_id,
			'start !=' => NULL
		);
		$data = $this->user_model->answerexam($info,$result);
		if($data){
			$config = array();
        		$config['useragent'] = "CodeIgniter";
        		//$config['mailpath'] = "/usr/bin/sendmail";
			$config['protocol'] = "smtp";
			$config['charset'] = "iso-8859-1";
			$config['wordwrap'] = TRUE;
			$config['mailtype'] = "html";
			$config['crlf'] = "\r\n";
			$config['newline'] = "\r\n";
			//$config['smtp_host'] = "smtp.mailgun.org";
			$config['smtp_host'] = "smtp.mailgun.org";
			$config['smtp_user'] = "postmaster@blwcampusministry.net";
			$config['smtp_pass'] = "1c6531f5250d3051b3078a5ec1f2f4e9";
			$config['smtp_port'] = 587;
			//$config['smtp_crypto'] = "tls";
			//$config['send_multipart'] = FALSE;

			$this->email->initialize($config);
			$u = $this->db->get_where('data_capture', array('dc_id' => $this->session->user_id));
			$user = $u->row();
			$e = $this->db->get_where('ffd_examination', array('id' => $this->input->post('exam_id')));
			$exam = $e->row();
			
			$message="<!DOCTYPE html>
					<html>
					<head>
					</head>
					<body>
					<div class='' style='margin-left:auto;margin-right:auto; text-align:left;height:500px;'>
					<h4>
					Dear ".$user->userTitle." ".$user->name.",</h4>
					<h4>Thank you for your participation in the ".$exam->title." Examination.<br/><br/>
					</h4>
					<h1>You scored ".$result."%</h1>
					<h4>Thanks,<br/>BLW Campus Ministry</h4>
					</div>
					</body>
					</html>";
			$this->email->from('notifications@blwcampusministry.net', 'BLW Exams Result');
			$this->email->to($this->session->email);
			
			$this->email->subject('Exam Results');
			$this->email->message($message);
			
			if($this->email->send()){
				$this->output->set_output(json_encode(['answer' => 1, 'result' => $result]));
				return FALSE;
			}else{
				show_error($this->email->print_debugger());
			}
			
		}			
	}
	public function examend()
	{
		$this->output->set_content_type("application_json");
		$info = array(
			'exam_id' => $this->input->post('eid'),
			'user_id' => $this->session->user_id,
			'start !=' => NULL
		);
		$data = $this->user_model->endexam($info);
		if($data){
			$this->output->set_output(json_encode(['end' => 1]));
			return FALSE;
		}	
	}
	public function checkstatus()
	{
		$this->output->set_content_type("application_json");
		$info = array(
			'user_id' => $this->input->post('user'),
			'exam_id' => $this->input->post('id'),
			'start !=' => null
		);
		
		$data = $this->user_model->checkstatus($info);
		if($data > 0){
			$this->output->set_output(json_encode(['taken' => 1]));
			return FALSE;
		}
		$info2 = array(
			'user_id' => $this->input->post('user'),
			'exam_id' => $this->input->post('id')
		);
		$newExam = $this->user_model->newexam($info2);
		if($newExam > 0){
			$this->output->set_output(json_encode(['taken' => 0]));
			return FALSE;
		}
	}
	public function sec()
	{
		
		$this->output->set_content_type("application_json");
		
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]');
		//echo $this->form_validation->run();
		
		if($this->form_validation->run() == FALSE){
			$this->output->set_output(json_encode(['error' => 1, 'data' => $this->form_validation->error_array()]));
			return FALSE;
		}		
		$info = array(
			'email' => $this->input->post('email'),
			'password' => sha1($this->input->post('password'))
		);
		
		$updatesec = $this->user_model->updatesec($info);
		if($updatesec){
			$this->output->set_output(json_encode(['error' => 0]));
			return FALSE;
		}
	}
	public function prof()
	{
		$this->output->set_content_type("application_json");
		//$this->output->enable_profiler(false); 
		//$this->output->set_status_header('500');
		
		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('designation', 'Designation', 'required');
		$this->form_validation->set_rules('zone', 'Zone', 'required');
		$this->form_validation->set_rules('chapter', 'Chapter', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('phone', 'Phone', 'required');
		//echo $this->form_validation->run();
		
		if($this->form_validation->run() == FALSE){
			$this->output->set_output(json_encode(['error' => 1, 'details' => $this->form_validation->error_array()]));
			return FALSE;
		}
		
		$title = $this->input->post("title");
		$name = $this->input->post("name");
		$designation = $this->input->post("designation");
		$zone = $this->input->post("zone");
		$chapter = $this->input->post("chapter");
		$email = $this->input->post("email");
		$phone = $this->input->post("phone");	
		
		$info = array(
			'title' => $title,
			'name' => $name,
			'designation' => $designation,
			'zone' => $zone,
			'chapter' => $chapter,
			'email' => $email,
			'phone' => $phone
		);
		$updateuser = $this->user_model->updateuser($info);
		if($updateuser){
			$this->output->set_output(json_encode(['error' => 0]));
			return FALSE;
		}
		//$this->output->set_output(json_encode(['error' => 0, 'data' => 'User not created!']));
	}	
	public function profile()
	{
		$this->load->view('inc/user/header');
		$this->load->view('user/profile');
		$this->load->view('inc/user/footer');
	}
	public function security()
	{
		$this->load->view('inc/user/header');
		$this->load->view('user/security');
		$this->load->view('inc/user/footer');
	}
	public function signout()
	{
		$data = $this->user_model->logout();
		if($data){
			$this->session->sess_destroy();
			redirect('/index.php/home');
		}
	}
}
