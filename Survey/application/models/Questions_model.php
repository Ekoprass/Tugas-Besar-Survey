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
			$this->db->where('id_survey', $idSurvey);
			$query=$this->db->get('question');
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

		public function editQuestion($id_question)
		{
			if ($this->input->post('required')=="Required") {
				$req="Required";
			}else{
				$req=" ";
			}
			$object =  array(
				'question' => $this->input->post('question'),
				'type' => $this->input->post('type'),
				'required' => $req,
			);
			$this->db->where('id_question', $id_question);
			$this->db->update('question', $object);
		}

		public function deleteQuestion($idQuestion)
		{
			$this->db->where('id_question', $idQuestion);
			$this->db->delete('question');
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

		public function deleteJawaban($idJawaban)
		{
			$this->db->where('id_answer', $idJawaban);
			$this->db->delete('answer_question');
		}

		public function jawabanUser($id_survey)
		{
			$jawabanesai=$this->input->post('[jawabanesai][]');
			$idquestion=$this->input->post('[id_question][]');
			$iduser=$this->input->post('[id_user][]');

			$x= count($jawabanesai);
			
			for ($i=0; $i < $x; $i++) { 
				$data = array(
					'jawaban' => $jawabanesai[$i], 
					'id_question' => $idquestion[$i],
					'id_user' => $iduser[$i], 
				);
				$this->db->insert('answer_user', $data);
				// echo $data['jawaban']."<br>";
				// echo $data['id_question']."<br>";
			}
			
			$this->db->where('id_survey', $id_survey);
			$this->db->where('type', 'Pilihan Ganda');
			$query=$this->db->get('question');
			$rads= $query->result_array();
			foreach ($rads as $key ) {
				$jawabanradio=$this->input->post('jawabanradio'.$key['id_question'].'');
				

				$str=explode(",", $jawabanradio[0]);
				$jawaban=$str[0];
				$qid=$str[1];
				$usrid=$str[2];
				$data = array(
					'jawaban' => $jawaban,
					'id_question' => $qid,
					'id_user' => $usrid,
				);
			$this->db->insert('answer_user', $data);
				// echo $data['jawaban']."<br>";
				// echo $data['id_question']."<br>";
				
			}

			$jawabanmulti=$this->input->post('[jawabanmulti][]');
			foreach ($jawabanmulti as $key ) {
				$str=explode(",", $key);
				$jawaban=$str[0];
				$qid=$str[1];
				$usrid=$str[2];
				$data = array(
					'jawaban' => $jawaban,
					'id_question' => $qid,
					'id_user' => $usrid,
				);

			$this->db->insert('answer_user', $data);

				// echo $data['jawaban']."<br>";
				// echo $data['id_question']."<br>";
			}
		
		}
	
	}
	
	/* End of file QuestionsModel.php */
	/* Location: ./application/models/QuestionsModel.php */
 ?>