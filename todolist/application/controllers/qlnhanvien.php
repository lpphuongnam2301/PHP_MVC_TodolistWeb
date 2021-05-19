<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class qlnhanvien extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('qlnv_model');
	}
	public function index()
	{
		$this->load->model('qlnv_model');
		$list = $this->qlnv_model->getAll();
		$data['listNV']= $list;
		$this->load->view('qlnhanvien_view',$data);

	}

	public function checkPhone(){
		$phone = $this->input->post('phone');
		$result =  $this->qlnv_model->checkPhone($phone);
		$check = preg_match('/[0-9]{10}/',$phone);
		if(($check == 1) && ($result == 0)){
			echo "true";
		}else{
			echo "false";
		}
	}
	
	public function checkEmail(){
		$email = $this->input->post('email');
		$result =  $this->qlnv_model->checkEmail($email);
		$check = preg_match('/^[\w.+\-]+@(gmail|yahoo)\.com$/',$email);
		if(($check == 1) && ($result == 0)){
			echo "true";
		}else{
			echo "false";
		}
	}

	public function themNv(){
		$this->load->model('qlnv_model');
		$ho = $this->input->post('nv_firstname');
		$ten = $this->input->post('nv_lastname');
		$dob = $this->input->post('nv_birthday');
		$phone = $this->input->post('nv_phone');
		$email = $this->input->post('nv_email');
		$pass = md5($this->input->post('nv_phone'));
		$gt = $this->input->post('nv_gender');
		$dc = $this->input->post('nv_address');
		$data = array(
			'nv_firstname' => $ho,
        	'nv_lastname' => $ten,
        	'nv_gender' => $gt,
        	'nv_phone' => $phone,
        	'nv_level' => 'NV',
        	'nv_address' => $dc,
        	'nv_birthday' => $dob,
			'nv_email' => $email,
        	'nv_password' => $pass
		);
		$this->qlnv_model->themNv($data);
		redirect("index.php/qlnhanvien/index");
		/*$nv_address = $this->input->post('nv_address');
		$data['nv_password'] = md5($data['nv_phone']);
		$data['nv_level'] = "NV";
		$data = array(
			'nv_firstname' => $ho,
        	'nv_lastname' => $ten,
        	'nv_gender' => $gt,
        	'nv_phone' => $phone,
        	'nv_level' => 'NV',
        	'nv_address' => $gt,
        	'nv_birthday' => $dob,
        	'nv_password' => $pass
		);
		$this->qlnv_model->themNv($data);
		redirect("index.php/qlnhanvien/index");*/
		//echo $data;
	}

	public function getNv(){
		$id = $this->input->post('id');
		$data =  $this->qlnv_model->getNv($id);
		echo json_encode($data[0]);
	}

	public function suaNv(){
		
		$data = $this->input->post();
		$this->qlnv_model->suaNv($data);
		redirect("index.php/qlnhanvien/index");
	}

	public function xoaNv($id){
		$this->load->model('qlnv_model');
		$this->qlnv_model->xoaNv($id);

		//xoa trong job
		
		redirect("index.php/qlnhanvien/index");
	}

	public function search(){;
		$search = $this->input->post('search');
		$list = $this->qlnv_model->search($search);
		$data['listNV'] = $list;
		$this->load->view('qlnhanvien_view',$data);
	}
}
