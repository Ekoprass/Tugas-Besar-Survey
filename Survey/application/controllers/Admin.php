<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Admin extends CI_Controller {
		
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
					$this->load->view('admin/dashboard',$data);
			}else{
				redirect('login','refresh');
			}
		}

		public function index()
		{

		}

		
	
	}
	
	/* End of file Admin.php */
	/* Location: ./application/controllers/Admin.php */
 ?>