<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __construct()
    {
        parent::__construct();
		if(!$this->session->userdata('admin_id')){
			redirect('/index.php/admin');
		}
    }
	public function index()
	{
		$this->load->view('inc/dashboard/header');
		$this->load->view('admin/dashboard');
		$this->load->view('inc/dashboard/footer');
	}
	public function users()
	{
		//$data['users'] = $this->user_model->get_users();
		
		$this->load->view('inc/dashboard/header');
		$this->load->view('admin/users');
		$this->load->view('inc/dashboard/footer');
	}
	public function delusers()
	{
		$this->output->set_content_type("application_json");
		$data = array(
			'id' => $this->input->post('id')
		);
		$del = $this->user_model->deluser($data,$this->input->post('id'));
		if($del){
			$this->output->set_output(json_encode(['error' => 0]));
			return FALSE;
		}
		$this->output->set_output(json_encode(['error' => 1,'details' => 'Could not delete!']));
	}
	public function history()
	{
		$this->load->view('inc/dashboard/header');
		$this->load->view('admin/history');
		$this->load->view('inc/dashboard/footer');
	}
	public function examination()
	{
		$this->load->view('inc/dashboard/header');
		$this->load->view('admin/examination');
		$this->load->view('inc/dashboard/footer');
	}
	public function exams()
	{
		$this->output->set_content_type("application_json");
		//$this->output->enable_profiler(false); 
		//$this->output->set_status_header('500');
		
		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('type', 'Examination Type', 'required');
		$this->form_validation->set_rules('duration', 'Duration', 'required');
		$this->form_validation->set_rules('eligibility', 'Eligibility', 'required');
		$this->form_validation->set_rules('questions', 'Number of Questions', 'required');
		//$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]',array('is_unique' => 'User with this email address already exist!'));
		$this->form_validation->set_rules('details', 'Description', 'required');
		if($this->form_validation->run() == FALSE){
			$this->output->set_output(json_encode(['error' => 1, 'details' => $this->form_validation->error_array()]));
			return FALSE;
		}
		
		$title = $this->input->post("title");
		$type = $this->input->post("type");
		$duration = $this->input->post("duration");
		$eligibility = $this->input->post("eligibility");
		$questions = $this->input->post("questions");
		$details = $this->input->post("details");
			
		
		$info = array(
			'title' => $title,
			'type' => $type,
			'duration' => $duration,
			'eligibility' => $eligibility,
			'questions' => $questions,
			'details' => $details,
			'timestamp' => time()
		);
		$exam = $this->user_model->addexam($info);
		if($exam){
			$this->output->set_output(json_encode(['error' => 0,'eid' => $exam ,'qnum' => $questions]));
			return FALSE;
		}
		$this->output->set_output(json_encode(['error' => 2, 'details' => 'Unable to create Exam!']));
		
	}
	public function questions($eid = null)
	{
		$data['exam'] = $this->user_model->get_adminexam($eid);
		
				
		$this->load->view('inc/dashboard/header', $data);
		$this->load->view('admin/questions');
		$this->load->view('inc/dashboard/footer');
	}
	public function qna()
	{
		$this->output->set_content_type("application_json");
		for($i = 1; $i <= $this->input->post('questions'); $i++){
			if($this->input->post('question'.$i.'') != null){
				$this->form_validation->set_rules('question'.$i.'', 'Question '.$i.'', 'required');
				$this->form_validation->set_rules('a'.$i.'', 'Answer A', 'required');
				$this->form_validation->set_rules('b'.$i.'', 'Answer B', 'required');
				$this->form_validation->set_rules('c'.$i.'', 'Answer C', 'required');
				$this->form_validation->set_rules('d'.$i.'', 'Answer D', 'required');
				if($this->form_validation->run() == FALSE){
					$this->output->set_output(json_encode(['error' => 1, 'details' => $this->form_validation->error_array()]));
					return FALSE;
				}
				$info = array(
					'quest' => $this->input->post('question'.$i.''),
					'exam_id' => $this->input->post('exam'),
					'questnumber' => $this->input->post('number'),
					'timestamp' => time()
				);
				$addQuest = $this->user_model->addquest($info);
				if($addQuest){
					$ans1 = array(
						'answer' => $this->input->post('a'.$i.''),
						'quest_id' => $addQuest,
						'timestamp' => time()
					);
					$this->user_model->addanswers($ans1);
					
					$ans2 = array(
						'answer' => $this->input->post('b'.$i.''),
						'quest_id' => $addQuest,
						'timestamp' => time()
					);
					$this->user_model->addanswers($ans2);
					
					$ans3 = array(
						'answer' => $this->input->post('c'.$i.''),
						'quest_id' => $addQuest,
						'timestamp' => time()
					);
					$this->user_model->addanswers($ans3);
					
					$ans4 = array(
						'answer' => $this->input->post('d'.$i.''),
						'quest_id' => $addQuest,
						'timestamp' => time()
					);
					$this->user_model->addanswers($ans4);
					
					$this->output->set_output(json_encode(['error' => 0]));
					return FALSE;
				}
			$this->output->set_output(json_encode(['error' => 2, 'details' => 'Unable to add question!']));
			}
		}
	}
	public function adanswers()
	{
		$this->output->set_content_type("application_json");
		for($i = 1; $i <= $this->input->post('questions'); $i++){
			if($this->input->post('ans'.$i.'') !== null){
				
				$info = array(
					'correct' => 1
				);
				$id = $this->input->post('ans'.$i.'');
				$qid = $this->input->post('quest_id');
				$updateAns = $this->user_model->updateAns($info, $id, $qid);
				if($updateAns){
					$this->output->set_output(json_encode(['error' => 0]));
					return FALSE;
				}
			$this->output->set_output(json_encode(['error' => 2, 'details' => 'Provide an answer!']));
			}else{
				$this->output->set_output(json_encode(['error' => 2, 'details' => 'Provide an answer!']));
			
			}
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
			'username' => $this->input->post('email'),
			'password' => sha1($this->input->post('password'))
		);
		
		$updatesec = $this->user_model->adminupdatesec($info);
		if($updatesec){
			$this->output->set_output(json_encode(['error' => 0]));
			return FALSE;
		}
	}	
	public function preview($eid=null)
	{
		$data['exam'] = $this->user_model->get_adminexam($eid);
		$this->load->view('inc/dashboard/header', $data);
		$this->load->view('admin/preview');
		$this->load->view('inc/dashboard/footer');
	}
	public function report($eid=null)
	{
		$data['exam'] = $this->user_model->get_taken($eid);
		$this->load->view('inc/dashboard/header', $data);
		$this->load->view('admin/report');
		$this->load->view('inc/dashboard/footer');
	}
	public function security()
	{
		$this->load->view('inc/dashboard/header');
		$this->load->view('admin/security');
		$this->load->view('inc/dashboard/footer');
	}
	public function signout()
	{
		$this->session->sess_destroy();
		redirect('/index.php/admin');
	}
}
