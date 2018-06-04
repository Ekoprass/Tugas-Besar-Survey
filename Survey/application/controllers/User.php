<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class User extends CI_Controller {
		
		public function __construct()
		{
			parent::__construct();
				$this->load->model('user_model');
				$this->load->model('Datamenu');

			if ($this->session->userdata('logged_in')) {
					$session_data=$this->session->userdata('logged_in');
					$id_user=$session_data['id_user'];
					$data['akses']=$session_data['akses'];
			
					$akses=$session_data['akses'];
					$data['usr']="user";
					$data['user']=$this->user_model->getDataUserByID($id_user);
					$data['menus'] = $this->Datamenu->getMenu($akses);
					$this->load->view('user/beranda',$data);
			}else{
				redirect('login','refresh');
			}
		}

		public function index()
		{

		}

		public function getAllUser()
   		{
	       
    	}

		public function createID()
		{
			# code...
		}

		public function addUser()
		{
			# code...
		}

		public function editUser()
		{
			# code...
		}

		public function deleteUser()
		{
			# code...
		}

		public function setSurvey()
		{
			# code...
		}

		public function SubmitSurvey()
		{
			# code...
		}

		public function dataUsers()
		{
			//$this->load->view('user/tabel_user');
		}
	
	}
	
	/* End of file User.php */
	/* Location: ./application/controllers/User.php */
 ?>