<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

        public function __construct()
        {
                parent::__construct();
        }

		public function password($data){
			$this->db->where('email', $data);
			$pass = $this->db->get('users');
                        $row = $pass->row();
			if($this->db->affected_rows() > 0){
				$this->db->where('email', $data);
				$this->db->update('users', array('password' => sha1($row->timestamp)));
                return  $row->timestamp;
			}
		}

		public function register($data)
        {
            if($this->db->insert('users', $data)){
				$result = $this->db->affected_rows();
					return $result;	
				}
		}
	
	public function verify($data){
			$user = $this->db->get_where('users', array('verify' => $data));
			$row = $user->row();
			if($row->id){
				$this->db->where('id', $row->id);
				$this->db->update('users', array('status' => 1));
				$info1 = array(
					'user' => $row->id,
					'start' => time()
				);
				$this->db->insert('ffd_online', $info1);
				
				$info = array(
					'user_id' => $row->id,
					'email' => $row->email
				);
				$this->session->set_userdata($info);
				return 1;
			}
		}

	public function login($data, $email)
        {
            $query = $this->db->get_where('data_capture', $data);
			
			if ($this->db->affected_rows() > 0)
			{
				$row = $query->row();
				$info = array(
					'user' => $row->dc_id,
					'start' => time()
				);
				$online = $this->db->get_where('ffd_online', array('user' => $row->dc_id, 'end' => NULL));
				$onl = $online->row_array();
				if($onl['id'] != null){
					$this->db->delete('ffd_online', array('id' => $onl['dc_id']));
					$this->db->insert('ffd_online', $info);
				}else{
					$this->db->insert('ffd_online', $info);
				}
				
				$details = array(
					'user_id' => $row->dc_id,
					'email' => $email
				);
				$this->session->set_userdata($details);
				exit(header('location:'.base_url().'index.php/user'));
				
			}else{
				return FALSE;
			}
			
		}
		public function logout(){
				$query = $this->db->get_where('ffd_online', array('user'=>$this->session->user_id,'end' => null));
				$onl = $query->row();
				if($onl->id != null){
					$data = array(
						'end' => time()
					);

					$this->db->where('id', $onl->id);
					$this->db->update('ffd_online', $data);
					return 1;
			}
		}
		public function updateuser($data){
			$this->db->where('id', $this->session->user_id);
			$this->db->update('users', $data);
			return 1;
		}
		public function adminlogin($data)
        {
            $query = $this->db->get_where('adm', $data);
			$row = $query->row();
			if (isset($row))
			{
				return $row->adm_id;
			}else{
				return 0;
			}
			
		}
		public function adminupdatesec($data){
			$this->db->where('adm_id', $this->session->admin_id);
			$passUp = $this->db->update('adm', $data);
			if($this->db->affected_rows()){
				return $this->db->affected_rows();
			}
		}
		public function updatesec($data){
			$this->db->where('id', $this->session->user_id);
			$passUp = $this->db->update('users',$data);
			if($this->db->affected_rows()){
				return $this->db->affected_rows();
			}
		}
		
		/***********************************************************************************************************************/
		/************************************************Users Section****************************************************/
		/***********************************************************************************************************************/
		
		public function deluser($id, $usid)
		{
			$this->db->delete('users', $id);
			$this->db->delete('taken', array('user_id' => $usid));
			return 1;			
		}
		
		/***********************************************************************************************************************/
		/************************************************Examination Section (Admin) *******************************************/
		/***********************************************************************************************************************/
		
			public function addlive($data,$id)
        		{
			$this->db->where('id', $id);
			$this->db->update('ffd_examination', $data);
			if($this->db->affected_rows() >= 0)
			{
				return 1;
			}
		}	
	
	public function addexam($data)
        {
            $query = $this->db->insert('ffd_examination', $data);
			return $this->db->insert_id();
		}
		public function addquest($data)
        {
            $query = $this->db->insert('ffd_questions', $data);
			return $this->db->insert_id();
		}
		public function addanswers($data)
        {
            $query = $this->db->insert('ffd_answers', $data);
			return null;
		}
		public function updateAns($data,$id,$qid)
        {
			$this->db->where('quest_id', $qid);
			$this->db->update('ffd_answers', array('correct'=>0));
			if($this->db->affected_rows() >= 0)
			{
				$this->db->where('id', $id);
				$this->db->update('ffd_answers', $data);
				return 1;
			}
		}	
		public function get_adminexam($data)
		{
			$query = $this->db->get_where('ffd_examination', array( 'id' => $data));
			return $query->row_array();
		}
		public function get_taken($data)
		{
			$query = $this->db->get_where('ffd_taken', array('exam_id' => $data));
			return $query->result_array();
		}


/***********************************users***************************************************************************/
		
		public function get_exam($data)
		{
			$query = $this->db->get_where('ffd_taken', array('exam_id' => $data, 'user_id' => $this->session->user_id,'end' => NULL));
			if($this->db->affected_rows() > 0){
				$query = $this->db->get_where('ffd_examination', array( 'id' => $data));
				return $query->row_array();
				//
			}else{
				return FALSE;
			}
			
						
		}
		public function answer($data)
		{
			$query = $this->db->get_where('ffd_answers', array('id' => $data));
			$row = $query->row_array();
			if($row['correct'] ==  1){
				return 1;
				//
			}else{
				return 0;
			}
			
						
		}
		public function sub($data, $id)
		{
			$query = $this->db->get_where('ffd_answers', array('quest_id' => $id));
			$row = $query->row_array();
			if($row['answer'] ==  $data){
				return 1;
			}else{
				return 0;
			}			
		}		
		public function checkstatus($data)
		{
			$query = $this->db->get_where('ffd_taken', $data);
			return $this->db->affected_rows();			
		}
		public function newexam($data)
		{
			$query = $query = $this->db->get_where('ffd_taken', $data);
			if($this->db->affected_rows() > 0){
				return $this->db->affected_rows();
			}else{
				$query = $this->db->insert('ffd_taken', $data);
				return $this->db->affected_rows();
			}
		}
		public function startexam($data)
        {
			$this->db->update('ffd_taken', array('start' => time()), $data);
			if($this->db->affected_rows() > 0)
			{
				return 1;
			}
		}
		public function endexam($data)
        {
			$this->db->update('ffd_taken', array('end' => time(),'score' => 0), $data);
			if($this->db->affected_rows() > 0)
			{
				return 1;
			}
		}
		public function answerexam($data,$result)
        {
			$this->db->update('ffd_taken', array('end' => time(),'score' => $result), $data);
			if($this->db->affected_rows() > 0)
			{
				return 1;
			}
		}

}