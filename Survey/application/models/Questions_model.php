<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Questions_model extends CI_Model {
		public function __construct()
		{
			parent::__construct();
			//Do your magic here
		}
		
		public function getDataQuestion($id_question)
		{
			$this->db->where('id_question', $id_question);
			$query=$this->db->get('question');
				return $query->result_array();
		}

		public function getDataQuestionSurvey($idSurvey)
		{
			$this->db->where('id_survey', $idSurvey);
			$query=$this->db->get('question');
				return $query->result_array();
		}

		public function tambahQuestion($idSurvey)
		{
			$query=$this->db->query('select count(id_question) as id from question where id_survey="$idSurvey"');
			$id= $query->num_rows();
			$str=$id+1;

			$idquestion=$idSurvey.'-Q0'.$str;
			if ($this->input->post('required')=="Required") {
				$req="Required";
			}else{
				$req=" ";
			}
			$object =  array(
				'id_question' => $idquestion,
				'question' => $this->input->post('question'),
				'type' => $this->input->post('type'),
				'required' => $req,		
				'id_survey' => $idSurvey,		
			);
			$this->db->insert('question', $object);
		}

		public function editQuestion()
		{
			# code...
		}

		public function deleteQuestion($idQuestion)
		{
			# code...
		}

		public function getJawabanQuestion($idQuestion)
		{
			$this->db->where('id_question', $idQuestion);
			$query=$this->db->get('answer_question');
				return $query->result_array();
		}

		public function tambahJawaban($idQuestion)
		{
			$object =  array(
				'jawaban' => $this->input->post('jawaban'),		
				'id_question' => $idQuestion,		
			);
			$this->db->insert('answer_question', $object);
		}

		public function editJawaban($idJawaban)
		{
			# code...
		}

		public function deleteJawaban($idJawaban)
		{
			# code...
		}
	
	}
	
	/* End of file QuestionsModel.php */
	/* Location: ./application/models/QuestionsModel.php */
 ?>