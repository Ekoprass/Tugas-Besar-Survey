<?php 

	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class DataUser extends CI_Controller {
	
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
					$data['users']=$this->user_model->getDataUser();
					$this->load->view('user/tableusr',$data);
			}else{
				redirect('login','refresh');
			}
		}

		public function index()
		{
			
	        
		}
		
		public function edit($id)
		{
			redirect('formuser/edit/'.$id.'','refresh');
		}
	

		public function detail($id)
		{
			redirect('formuser/detail/'.$id.'','refresh');
		}

		public function deleteUser()
		{
			
		}
	}
	
	/* End of file getAllUser.php */
	/* Location: ./application/controllers/getAllUser.php */
 ?>