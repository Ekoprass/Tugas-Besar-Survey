<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Question extends CI_Controller {

		public function __construct()
		{
			parent::__construct();
			$this->load->model('Survey_model');
			$this->load->model('Questions_model');
			$this->load->model('Datamenu');
			if (!$this->session->userdata('logged_in')) {
				redirect('login','refresh');
			}
		}
	
		public function index()
		{
			
		}

		public function createQuestion()
		{
			if ($this->session->userdata('logged_in')) {
					$session_data=$this->session->userdata('logged_in');
					$id_user=$session_data['id_user'];
					$data['akses']=$session_data['akses'];
			
					$akses=$session_data['akses'];
					$data['usr']="user";
					$data['survey']=$this->Survey_model->getDataSurvey();
					$data['menu2'] = $this->Datamenu->getMenu2($akses);
					$data['menus'] = $this->Datamenu->getMenu($akses);
					$this->load->view('questions/question', $data, FALSE);
			}

		}

		public function addQuestions($id_survey)
		{
			$this->load->helper('url','form');
			$this->load->library('form_validation');
			
			$this->form_validation->set_rules('question', 'Question', 'trim|required');
			$this->form_validation->set_rules('type', 'Type', 'trim|required');
			if ($this->form_validation->run()==false) {
				redirect('Question/createQuestion/'.$id_survey.'','refresh');
			}else{
					$this->Questions_model->tambahQuestion($id_survey);
					echo "<script>alert('Verifikasi Berhasil');
							window.location.href='".site_url()."/survey/detail/".$id_survey."';</script>";
			}
		}

		public function detail($id_question)
		{
			if ($this->session->userdata('logged_in')) {
					$session_data=$this->session->userdata('logged_in');
					$id_user=$session_data['id_user'];
					$data['akses']=$session_data['akses'];
			
					$akses=$session_data['akses'];
					$data['usr']="user";
					$data['questions']=$this->Questions_model->getDataQuestion($id_question);
					$data['answerquestion']=$this->Questions_model->getJawabanQuestion($id_question);
					$data['menu2'] = $this->Datamenu->getMenu2($akses);
					$data['menus'] = $this->Datamenu->getMenu($akses);
					$this->load->view('questions/detailquestion', $data, FALSE);
			}
		}

		public function editQuestion()
		{
			# code...
		}

		function deleteQuestion()
		{
			# code...
		}

		public function addAnswer($id_question)
		{
			$this->load->helper('url','form');
			$this->load->library('form_validation');
			
			$this->form_validation->set_rules('jawaban', 'Jawaban', 'trim|required');
			if ($this->form_validation->run()==false) {
				redirect('Question/detail/'.$id_question.'','refresh');
			}else{
					$this->Questions_model->tambahJawaban($id_question);
					echo "<script>alert('Verifikasi Berhasil');
							window.location.href='".site_url()."/question/detail/".$id_question."';</script>";
			}
		}

		public function editAnswer()
		{
			# code...
		}

		public function answerQuestion()
		{
			# code...
		}
	
	}
	
	/* End of file Question.php */
	/* Location: ./application/controllers/Question.php */
 ?>