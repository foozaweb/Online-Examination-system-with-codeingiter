<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct()
    {
        parent::__construct();
		if($this->session->userdata('user_id')){
			redirect('/index.php/user');
		}else if($this->session->userdata('admin_id')){
			redirect('/index.php/dashboard');
		}
    }
	public function index()
	{
		if($this->input->post('submit')){
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
			//$this->form_validation->set_rules('password', 'Password', 'required');
		//echo $this->form_validation->run();
		
		if($this->form_validation->run() == FALSE){
			$this->session->set_flashdata('loginerror',' You cannot login with the provided credentials ');
		}else{
                    $info = array(
			'email' => $this->input->post('email'),
			//'password' => sha1($this->input->post('password')),
			//'status' => 1
		       );
		 $logged = $this->user_model->login($info,$this->input->post('email'));
                 if(!$logged){
                      $this->session->set_flashdata('loginerror',' You cannot login with the provided credentials ');
                   }
                }
            }
		
		$this->load->view('inc/header');
		$this->load->view('sign-in');
		$this->load->view('inc/footer');
	}
	
		
	public function signup()
	{
		$this->load->view('inc/header');
		$this->load->view('sign-up');
		$this->load->view('inc/footer');
	}
	public function register(){
		$this->output->set_content_type("application_json");
		//$this->output->enable_profiler(false); 
		//$this->output->set_status_header('500');
		
		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('designation', 'Designation', 'required');
		$this->form_validation->set_rules('zone', 'Zone', 'required');
		$this->form_validation->set_rules('chapter', 'Chapter', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]',array('is_unique' => 'User with this email address already exist!'));
		$this->form_validation->set_rules('phone', 'Phone', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		//echo $this->form_validation->run();
		
		if($this->form_validation->run() == FALSE){
			$this->output->set_output(json_encode(['result' => 0, 'data' => $this->form_validation->error_array()]));
			return FALSE;
		}
		
		$title = $this->input->post("title");
		$name = $this->input->post("name");
		$designation = $this->input->post("designation");
		$zone = url_title($this->input->post("zone"));
		$chapter = $this->input->post("chapter");
		$email = $this->input->post("email");
		$phone = $this->input->post("phone");
		$password = $this->input->post("password");	
		
		$verify = substr(str_shuffle("0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ"), -10);		
		$info = array(
			'title' => $title,
			'name' => $name,
			'designation' => $designation,
			'zone' => $zone,
			'chapter' => $chapter,
			'email' => $email,
			'phone' => $phone,
			'verify' => $verify,
			'password' => sha1($password),
			'status' => 1,
			'timestamp' => time()
		);
		$regUser = $this->user_model->register($info);
		if($regUser){
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
			$config['smtp_user'] = "smtp@email.com";
			$config['smtp_pass'] = "smtp_password";
			$config['smtp_port'] = 587;
			//$config['smtp_crypto'] = "tls";
			//$config['send_multipart'] = FALSE;

			$this->email->initialize($config);
			
			$link = base_url('index.php/home/verify/'.$verify.'');
			$message="<!DOCTYPE html>
					<html>
					<head>
					</head>
					<body>
					<div class='' style='margin-left:auto;margin-right:auto; text-align:left;height:500px;'>
					<h4>
					Dear ".$this->input->post('title')." ".$this->input->post('name').",</h4>
					<h4>Your registration on the Blw Campus ministry Exam Portal was successful. Here are your login details:<br/><br/>
					email: ".$this->input->post('email')."<br/>
					password: ".$this->input->post('password')."<br/><br/>
					</h4>
					<h4>Please kindly verify your email address by clicking on this <a href=".$link.">link</a></h4>
					<h4>Thanks,<br/>BLW Campus Ministry</h4>
					</div>
					</body>
					</html>";
			$this->email->from('notifications@blwcampusministry.net', 'BLW Exams Portal');
			$this->email->to($this->input->post("email"));
			
			$this->email->subject('Registration Email');
			$this->email->message($message);
			
			if($this->email->send()){
				$this->output->set_output(json_encode(['result' => 1,'details' => "Confirm your email address with the link sent to you"]));
				return FALSE;
			}else{
				show_error($this->email->print_debugger());
			}
		}else{
		$this->output->set_output(json_encode(['result' => 2, 'data' => 'User not created!']));
		//$this->email->print_debugger();	
		}
		
		
	}
	public function verify($data)
	{
		$verify = $this->user_model->verify($data);
		if($verify){
			redirect('index.php/user');			
		}
	}
	public function login(){
		$this->output->set_content_type("application_json");
		//$this->output->enable_profiler(false); 
		//$this->output->set_status_header('500');
		
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required');
		echo $this->form_validation->run();
		
		if($this->form_validation->run() == FALSE){
			$this->output->set_output(json_encode(['result' => 0, 'data' => $this->form_validation->error_array()]));
			return FALSE;
		}
		
		$email = $this->input->post("email");
		$password = sha1($this->input->post("password"));	
		
		$info = array(
			'email' => $email,
			'password' => $password,
			'status' => 1
		);
		//$this->output->enable_profiler();
		$regUser = $this->user_model->login($info);
		if($regUser != 0){
			$this->session->set_userdata(['user_id' => $regUser, 'email' => $email]);
			$this->output->set_output(json_encode(['result' => 1]));
			return FALSE;
		}else if($regUser == 0){
			$this->output->set_output(json_encode(['result' => 2, 'data' => 'Account is not verified!']));
			return FALSE;
		}
		$this->output->set_output(json_encode(['result' => 2, 'data' => 'User does not exist!']));
				
	}

public function password()
	{
		if($this->input->post('submit')){
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		
		if($this->form_validation->run() == FALSE){
			$this->session->set_flashdata('emailerror','This is not a valid email address ');
		}else{
                    
		 $logged = $this->user_model->password($this->input->post('email'));
                 if(!$logged){
                      $this->session->set_flashdata('emailerror',' This email account does not exist, create a new account.');
                   }else{
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
			$config['smtp_user'] = "smtp@email.com";
			$config['smtp_pass'] = "smtp_password";
			$config['smtp_port'] = 587;
			//$config['smtp_crypto'] = "tls";
			//$config['send_multipart'] = FALSE;

			$this->email->initialize($config);
			
			$message="<!DOCTYPE html>
					<html>
					<head>
					</head>
					<body>
					<div class='' style='margin-left:auto;margin-right:auto; text-align:left;height:500px;'>
					<h4>
					Hello,</h4>
					<h4>A password reset was initiated on your account:<br/><br/>
					New Password: ".$logged."<br/>
					</h4>
					<h4>Please kindly sign into your account and change your password to anything you want.</h4>
					<h4>Thanks,<br/>BLW Campus Ministry</h4>
					</div>
					</body>
					</html>";
			$this->email->from('notifications@blwcampusministry.net', 'BLW Exams Portal');
			$this->email->to($this->input->post("email"));
			
			$this->email->subject('Password Reset');
			$this->email->message($message);
			
			if($this->email->send()){
				$this->session->set_flashdata('resetsuccess',' A temporary access have been sent to your email');
				//return FALSE;
			}else{
				$this->session->set_flashdata('emailerror',' Email could not be sent at this time, please try again');
			}
                   }
                }
            }
		
		$this->load->view('inc/header');
		$this->load->view('password');
		$this->load->view('inc/footer');
	}
	
}
