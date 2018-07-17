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
					$data['menu2'] = $this->Datamenu->getMenu2($akses);

					if ($this->uri->segment(2)=="edit") {
						$this->load->view('user/beranda',$data, true);
					}if ($this->uri->segment(2)=="detail") {
						$this->load->view('user/beranda',$data, true);
					}if ($this->uri->segment(2)=="") {
						$this->load->view('user/beranda',$data);
					}
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
			$this->load->view('user/formusr',$data);


		}

		public function editDataUser($id)
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
			
			if ($this->form_validation->run()==false) {
				redirect('formuser','refresh');
			}else{
				$config['upload_path'] = './assets/upload/';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size']  = '10000000';
				$config['max_width']  = '10240';
				$config['max_height']  = '7680';
				
				$this->load->library('upload', $config);
				
				if ( ! $this->upload->do_upload('foto')){
					$error = array('error' => $this->upload->display_errors());
					echo $error['error'];
					die();
					redirect('formuser','refresh');
				}
				else{
					$this->user_model->editUser($id);
					echo "<script>alert('Verifikasi Berhasil');
							window.location.href='".site_url()."/formuser';</script>";
				}
			}
		}

		

		public function detail($id_user)
		{
			$session_data=$this->session->userdata('logged_in');
			$data['akses']=$session_data['akses'];

			$akses=$session_data['akses'];
			$data['usr']="user";
			$data['user']=$this->user_model->getDataUserByID($id_user);
			$data['menus'] = $this->Datamenu->getMenu($akses);
			$this->load->view('user/detailusr',$data);
		}

		public function addUser()
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
			
			if ($this->form_validation->run()==false) {
				redirect('NewUser','refresh');
			}else{
				$config['upload_path'] = './assets/upload/';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size']  = '10000000';
				$config['max_width']  = '10240';
				$config['max_height']  = '7680';
				
				$this->load->library('upload', $config);
				
				if ( ! $this->upload->do_upload('foto')){
					$error = array('error' => $this->upload->display_errors());
					echo $error['error'];
					die();
					redirect('newuser','refresh');
				}
				else{
					$this->data_pegawai->register();
					echo "<script>alert('Verifikasi Berhasil');
							window.location.href='".site_url()."/NewUser';</script>";
				}
				
			}
		}

		public function setSurvey($id_survey)
		{
			$this->load->helper('url','form');
			$this->user_model->setSurvey();
			echo "<script>alert('Verifikasi Berhasil');
							window.location.href='".site_url()."/survey/tampilkanSurvey/".$id_survey."';</script>";
		}
		
	
	}
	
	/* End of file User.php */
	/* Location: ./application/controllers/User.php */
 ?>