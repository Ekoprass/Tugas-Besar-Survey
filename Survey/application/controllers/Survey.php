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

		public function nonaktif()
		{
			if ($this->session->userdata('logged_in')) {
					$session_data=$this->session->userdata('logged_in');
					$id_user=$session_data['id_user'];
					$data['akses']=$session_data['akses'];
			
					$akses=$session_data['akses'];
					$data['usr']="user";
					$data['survey']=$this->Survey_model->getDataSurveyNon();
					$data['menu2'] = $this->Datamenu->getMenu2($akses);
					$data['menus'] = $this->Datamenu->getMenu($akses);
					$this->load->view('survey/tblsurvey',$data);
			}
		}

		 public function getAllSurvey()
    	{
	        $result = $this->Survey_model->getDataSurvey();
	        header("Content-Type: application/json");
	        echo json_encode($result);
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

		public function edit($id_survey)
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
					$this->Survey_model->editSurvey($id_survey);
					echo "<script>alert('Edit Survey Berhasil');
							window.location.href='".site_url()."/survey';</script>";
			}
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

		public function deleteSurvey($id_survey)
		{
			$this->Survey_model->deleteSurvey($id_survey);
			echo "<script>alert('Survey Telah Dihapus');
				window.location.href='".site_url()."/survey/';</script>";
		}

		public function delete($id_survey)
		{
			$this->Survey_model->delete($id_survey);
			echo "<script>alert('Survey Telah Dihapus');
				window.location.href='".site_url()."/survey/';</script>";
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


		public function userSurvey()
		{
			$session_data=$this->session->userdata('logged_in');
			$id_user=$session_data['id_user'];
			$data['akses']=$session_data['akses'];
			
			$akses=$session_data['akses'];
			$data['usr']="user";
			$data['user']=$this->User_model->getDataUserByID($id_user);
			$this->db->where('id_user', $id_user);
			$query1=$this->db->get('partisipan');
			$query=$this->db->get("survey");
			
			if ($query1->num_rows()>0) {
				if ($query1->num_rows()==$query->num_rows()) {
					$data['survey']=$this->Survey_model->getDataSurveyByStatus($id_user);
				}else{
					$data['survey']=$this->Survey_model->getSurveyByPartisipan($id_user);
				}
			}
				$data['survey']=$this->Survey_model->getDataSurveyStat();
			
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

		

		public function publish($id_survey)
		{
			$this->Survey_model->publishSurvey($id_survey);
			echo "<script>alert('Survey Telah Diterbitkan');
				window.location.href='".site_url()."/survey/';</script>";
		}

		public function aktif($id_survey)
		{
			$this->Survey_model->aktifSurvey($id_survey);
			echo "<script>alert('Survey Telah Diaktifkan');
				window.location.href='".site_url()."/survey/nonaktif';</script>";
		}

		public function report()
		{
			$session_data=$this->session->userdata('logged_in');
			$id_user=$session_data['id_user'];
			$data['akses']=$session_data['akses'];
			
			$akses=$session_data['akses'];
			$data['usr']="user";

			$data['survey']=$this->Survey_model->getDataSurvey();
			
			$data['menu2'] = $this->Datamenu->getMenu2($akses);
			$data['menus'] = $this->Datamenu->getMenu($akses);
			$this->load->view('survey/report',$data);
		}

		public function resultSurvey($id_survey)
		{
			$session_data=$this->session->userdata('logged_in');
			$data['akses']=$session_data['akses'];

			$akses=$session_data['akses'];
			$data['usr']="user";
			$data['surveyid']=$this->Survey_model->getDataSurveyByID($id_survey);
			$data['menu2'] = $this->Datamenu->getMenu2($akses);
			$data['menus'] = $this->Datamenu->getMenu($akses);

			$data['jawaban']=$this->Survey_model->surveyResultAnswer($id_survey);
			$data['pertanyaan']=$this->Survey_model->surveyResultQuestion($id_survey);
			$data['user']=$this->Survey_model->surveyResultUser($id_survey);
			// print_r($data);
			// echo "<br>".$data[]."<br>";
			// die();
			$this->load->view('report', $data);

		}

		public function historySurvey()
		{
			$session_data=$this->session->userdata('logged_in');
			$id_user=$session_data['id_user'];
			$data['akses']=$session_data['akses'];
			
			$akses=$session_data['akses'];
			$data['usr']="user";
			$data['user']=$this->User_model->getDataUserByID($id_user);
			
			$data['survey']=$this->Survey_model->getSurveyHistory($id_user);
			$data['menu2'] = $this->Datamenu->getMenu2($akses);
			$data['menus'] = $this->Datamenu->getMenu($akses);
			$this->load->view('user/history',$data);
		}
	

	public function print($id_survey)
	{
		$session_data=$this->session->userdata('logged_in');
			$data['akses']=$session_data['akses'];

			$akses=$session_data['akses'];
			$data['usr']="user";
			$data['surveyid']=$this->Survey_model->getDataSurveyByID($id_survey);
			$data['menu2'] = $this->Datamenu->getMenu2($akses);
			$data['menus'] = $this->Datamenu->getMenu($akses);

			$data['jawaban']=$this->Survey_model->surveyResultAnswer($id_survey);
			$data['pertanyaan']=$this->Survey_model->surveyResultQuestion($id_survey);
			$data['user']=$this->Survey_model->surveyResultUser($id_survey);
			// print_r($data);
			// echo "<br>".$data[]."<br>";
			// die();
			$this->load->view('printreport', $data);

	}

	public function excel($id_survey)
	{
		$session_data=$this->session->userdata('logged_in');
			$data['akses']=$session_data['akses'];

			$akses=$session_data['akses'];
			$data['usr']="user";
			$data['surveyid']=$this->Survey_model->getDataSurveyByID($id_survey);
			$data['menu2'] = $this->Datamenu->getMenu2($akses);
			$data['menus'] = $this->Datamenu->getMenu($akses);

			$data['jawaban']=$this->Survey_model->surveyResultAnswer($id_survey);
			$data['pertanyaan']=$this->Survey_model->surveyResultQuestion($id_survey);
			$data['user']=$this->Survey_model->surveyResultUser($id_survey);
			// print_r($data);
			// echo "<br>".$data[]."<br>";
			// die();
			$this->load->view('printreport', $data);

			header("Content-type: application/vnd-ms-excel");
			header("Content-Disposition: attachment; filename=report-survey.xls");

	}


}
	/* End of file Survey.php */
	/* Location: ./application/controllers/Survey.php */
 ?>