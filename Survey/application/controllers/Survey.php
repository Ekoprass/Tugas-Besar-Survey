<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Survey extends CI_Controller {

		public function __construct()
		{
			parent::__construct();
			$this->load->model('Survey_model');
			$this->load->model('Questions_model');
			$this->load->model('User_model');
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
					//$data['user']=$this->user_model->getDataUserByID($id_user);
					$data['survey']=$this->Survey_model->getDataSurvey();
					$data['menu2'] = $this->Datamenu->getMenu2($akses);
					$data['menus'] = $this->Datamenu->getMenu($akses);
					$this->load->view('survey/tblsurvey',$data);
			}
		}

		public function detail($id_survey)
		{
			$session_data=$this->session->userdata('logged_in');
			$data['akses']=$session_data['akses'];

			$akses=$session_data['akses'];
			$data['usr']="user";
			$data['surveyid']=$this->Survey_model->getDataSurveyByID($id_survey);
			$data['questions']=$this->Questions_model->getDataQuestionSurvey($id_survey);
			$data['menu2'] = $this->Datamenu->getMenu2($akses);
			$data['menus'] = $this->Datamenu->getMenu($akses);
			$this->load->view('survey/detailsurvey',$data);
		}
		
		public function createSurvey()
		{
			$session_data=$this->session->userdata('logged_in');
			$data['akses']=$session_data['akses'];

			$akses=$session_data['akses'];
			$data['usr']="user";
			$data['menu2'] = $this->Datamenu->getMenu2($akses);
			$data['menus'] = $this->Datamenu->getMenu($akses);
			$this->load->view('survey/tambahsurvy',$data);
		}

		public function editSurvey($id_survey)
		{
			$session_data=$this->session->userdata('logged_in');
			$data['akses']=$session_data['akses'];

			$akses=$session_data['akses'];
			$data['usr']="user";
			$data['surveyid']=$this->Survey_model->getDataSurveyByID($id_survey);

			$data['menu2'] = $this->Datamenu->getMenu2($akses);
			$data['menus'] = $this->Datamenu->getMenu($akses);
			$this->load->view('survey/editsurvy',$data);
		}


		public function addSurvey()
		{

			$this->load->model('Survey_model');
			$this->load->helper('url','form');
			$this->load->library('form_validation');

			$this->form_validation->set_rules('nama_survey', 'Nama Survey', 'trim|required');
			$this->form_validation->set_rules('deskripsi', 'Deskripsi', 'trim|required');
			$this->form_validation->set_rules('waktu_survey', 'Waktu Survey', 'trim|required');

			if ($this->form_validation->run()==false) {
				redirect('survey/createSurvey','refresh');
			}else{

					$this->Survey_model->tambahSurvey();
					echo "<script>alert('Verifikasi Berhasil');
							window.location.href='".site_url()."/survey';</script>";
			}
		}

		public function userSurvey()
		{
			$session_data=$this->session->userdata('logged_in');
			$id_user=$session_data['id_user'];
			$data['akses']=$session_data['akses'];
			
			$akses=$session_data['akses'];
			$data['usr']="user";
			$data['survey']=$this->Survey_model->getDataSurvey();
			$data['menu2'] = $this->Datamenu->getMenu2($akses);
			$data['menus'] = $this->Datamenu->getMenu($akses);
			$this->load->view('user/tblsurvey',$data);
		}

		public function detailUserSurvey($id_survey)
		{
			$session_data=$this->session->userdata('logged_in');
			$id_user=$session_data['id_user'];
			$data['akses']=$session_data['akses'];

			$akses=$session_data['akses'];
			$data['usr']="user";
			$data['user']=$this->User_model->getDataUserByID($id_user);
			$data['surveyid']=$this->Survey_model->getDataSurveyByID($id_survey);
			$data['questions']=$this->Questions_model->getDataQuestionSurvey($id_survey);
			$data['menu2'] = $this->Datamenu->getMenu2($akses);
			$data['menus'] = $this->Datamenu->getMenu($akses);
			$this->load->view('user/detailsurvey',$data);
		}

		public function tampilkanSurvey($id_survey)
		{
			$session_data=$this->session->userdata('logged_in');
			$id_user=$session_data['id_user'];
			$data['akses']=$session_data['akses'];
			$akses=$session_data['akses'];
			$data['usr']="user";
			$data['user']=$this->User_model->getDataUserByID($id_user);
			$data['surveyid']=$this->Survey_model->getDataSurveyByID($id_survey);
			$data['questions']=$this->Questions_model->getDataQuestionSurvey($id_survey);
			$data['menu2'] = $this->Datamenu->getMenu2($akses);
			$data['menus'] = $this->Datamenu->getMenu($akses);
			$this->load->view('user/survey',$data);
		}

		public function deleteSurvey()
		{
			# code...
		}

		public function resultSurvey()
		{
			# code...
		}
	}
	
	/* End of file Survey.php */
	/* Location: ./application/controllers/Survey.php */
 ?>