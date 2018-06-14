<?php 	
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Admin extends CI_Controller {

		public function __construct()
		{
			parent::__construct();
			$this->load->model('user_model');
			$this->load->model('Datamenu');
			if (!$this->session->userdata('logged_in')) {
				redirect('login','refresh');
			}
			
		}
	
		public function index()
		{
			if ($this->session->userdata('logged_in')) {
					$session_data=$this->session->userdata('logged_in');
					$id_user=$session_data['id_user'];
					$data['akses']=$session_data['akses'];
			
					$akses=$session_data['akses'];
					$data['usr']="user";
					$data['user']=$this->user_model->getDataUserByID($id_user);
					$data['menus'] = $this->Datamenu->getMenu($akses);
					$data['menu2'] = $this->Datamenu->getMenu2($akses);
					
					$this->load->view('admin/dashboard',$data);
			}
		}
		
		public function createID()
		{

		}

		public function daftar()
		{
			# code...
		}

		public function edit()
		{
			# code...
		}

		public function delete()
		{
			# code...
		}

	}
	
	/* End of file Admin.php */
	/* Location: ./application/controllers/Admin.php */
 ?>