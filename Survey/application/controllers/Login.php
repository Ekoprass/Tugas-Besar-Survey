<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Login extends CI_Controller {
	
		public function index()
		{
			$this->load->view('login_view');
		}

		public function CekLogin($value='')
		{
			$this->load->library('form_validation');
			$this->form_validation->set_rules('username', 'Username', 'trim|required');	
			$this->form_validation->set_rules('password', 'Password', 'trim|required|callback_CekDB');
			if ($this->form_validation->run() == FALSE) {
				$this->load->view('login_view');
			} else {
				$session_data=$this->session->userdata('logged_in');
				$akses=$session_data['akses'];
			
				if ($akses=='1') {
					redirect('user','refresh');
				}
				if ($akses=='2') {
					redirect('admin','refresh');
				}
			}
		}
		
		public function CekDB($password)
		{
			$this->load->model('user_model');
			$username=$this->input->post('username');
			
				$result =$this->user_model->login($username,$password);
				if ($result) {
					$sess_array= array();
					foreach ($result as $row) {
						$sess_array = array(
							'id_user'=>$row->id_user,
							'username'=>$row->username,
							'akses'=>$row->akses,
							'nama'=>$row->nama

						);
						
						$this->session->set_userdata('logged_in', $sess_array );
					}
					return true;
				}else{
					$this->form_validation->set_message('CekDB',"Login Gagal Username dan Password tidak valid");
					return false;
				}
			
		}

		public function Logout()
		{
			$this->session->unset_userdata('logged_in');
			$this->session->sess_destroy();
			redirect('login','refresh');
		}


	}
	
	/* End of file Login.php */
	/* Location: ./application/controllers/Login.php */
 ?>