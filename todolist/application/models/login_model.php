<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
	class login_model extends CI_Model{
		public function index(){
			echo "ccmodel";
		}

		public function login($email,$pass){
			$this->db->where('nv_email',$email);
			$this->db->where('nv_password',$pass);
			return $this->db->get('todo_nhanvien')->num_rows();
		}

		public function getId($email){
			$query = $this->db->query("select * from todo_nhanvien where nv_email= '".$email."'");
		$data = $query->result_array();
		$list = "";
		foreach ($data as $key) 
		{
			$list = $key['nv_id'];
		}
		return $list;			
		}
	}	
?>