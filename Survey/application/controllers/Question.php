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
					$str=explode("-",$this->uri->segment(3));
					$sid=$str[0]."-".$str[1];
					$data['surveyid']=$this->Survey_model->getDataSurveyByID($sid);
					$data['questions']=$this->Questions_model->getDataQuestion($id_question);
					$data['answerquestion']=$this->Questions_model->getJawabanQuestion($id_question);
					$data['menu2'] = $this->Datamenu->getMenu2($akses);
					$data['menus'] = $this->Datamenu->getMenu($akses);
					$this->load->view('questions/detailquestion', $data, FALSE);
			}
		}

		public function edit($id_question)
		{
			$this->load->helper('url','form');
			$this->load->library('form_validation');
			
			$str=explode("-",$this->uri->segment(3));
			$sid=$str[0]."-".$str[1];
			$this->form_validation->set_rules('question', 'Question', 'trim|required');
			$this->form_validation->set_rules('type', 'Type', 'trim|required');
			if ($this->form_validation->run()==false) {
				redirect('Question/createQuestion/'.$sid.'','refresh');
			}else{
					$this->Questions_model->editQuestion($id_question);
					echo "<script>alert('Edit Pertanyaan Berhasil');
							window.location.href='".site_url()."/survey/detail/".$sid."';</script>";
			}
		}

		public function editQuestion($id_question)
		{
			if ($this->session->userdata('logged_in')) {
					$session_data=$this->session->userdata('logged_in');
					$id_user=$session_data['id_user'];
					$data['akses']=$session_data['akses'];
			
					$akses=$session_data['akses'];
					$data['usr']="user";
					$data['questions']=$this->Questions_model->getDataQuestion($id_question);
					$data['menu2'] = $this->Datamenu->getMenu2($akses);
					$data['menus'] = $this->Datamenu->getMenu($akses);
					$this->load->view('questions/editquestion', $data, FALSE);
			}
		}

		function deleteQuestion($id_question)
		{
			$str=explode("-",$this->uri->segment(3));
			$sid=$str[0]."-".$str[1];

			$this->Questions_model->deleteQuestion($id_question);
			echo "<script>alert('Pertanyaan Telah Dihapus');
				window.location.href='".site_url()."/survey/detail/".$sid."';</script>";
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

		public function deleteAnswer($id_answer)
		{
			$this->db->select('id_question');
			$this->db->where('id_answer', $id_answer);
			$query=$this->db->get('answer_question');
			$sid=$query->result_array();
			$this->Questions_model->deleteJawaban($id_answer);
			echo "<script>alert('Pilihan Jawaban Telah Dihapus');
				window.location.href='".site_url()."/Question/detail/".$sid[0]['id_question']."';</script>";
		}

		public function answerQuestion($id_survey)
		{
			// die();
			$this->load->helper('url','form');
			$this->Questions_model->jawabanUser($id_survey);
			echo "<script>alert('Survey Telah Selesai');
				window.location.href='".site_url()."/survey/userSurvey';</script>";
			
		}	
	}
	
	/* End of file Question.php */
	/* Location: ./application/controllers/Question.php */
 ?>