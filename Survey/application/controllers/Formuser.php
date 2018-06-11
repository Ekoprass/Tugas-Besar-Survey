<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Formuser extends CI_Controller {
	
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
					$this->load->view('user/formusr',$data);
			}else{
				redirect('login','refresh');
			}
		}

		public function index()
		{
			
		}

		public function edit($id_user)
		{
			$session_data=$this->session->userdata('logged_in');
			$data['akses']=$session_data['akses'];
			
			$akses=$session_data['akses'];
			$data['usr']="user";
			$data['user']=$this->user_model->getDataUserByID($id_user);
			$data['menus'] = $this->Datamenu->getMenu($akses);
			$this->load->view('user/formusr',$data, TRUE);
		}

		

		public function editDataUser()
		{
			$this->load->model('user_model');
			$this->load->helper('url','form');
			$this->load->library('form_validation');

			$this->form_validation->set_rules('NIK', 'NIK', 'trim|required');
			$this->form_validation->set_rules('nama', 'Nama User', 'trim|required');
			$this->form_validation->set_rules('username', 'Username', 'trim|required');
			$this->form_validation->set_rules('password', 'Password', 'trim|required');
			$this->form_validation->set_rules('tglLahir', 'Tanggal Lahir', 'trim|required');
			$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
			$this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'trim|required');
			$this->form_validation->set_rules('kota', 'Kota', 'trim|required');
			$this->form_validation->set_rules('pendidikan_terakhir', 'Pendidikan Terakhir', 'trim|required');
			$this->form_validation->set_rules('pekerjaan', 'pekerjaan', 'trim|required');
			$this->form_validation->set_rules('umur', 'Umur', 'trim|required');
			$this->form_validation->set_rules('status', 'Status', 'trim|required');

			if ($this->form_validation->run()==false) {
				redirect('formuser','refresh');
			}else{
					$this->user_model->editUser();
					echo "<script>alert('Verifikasi Berhasil');
							window.location.href='".site_url()."/login';</script>";
			}
		}
	
	}
	
	/* End of file Formuser.php */
	/* Location: ./application/controllers/Formuser.php */

 ?>