<?php 	
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Survey_model extends CI_Model {
		public function __construct()
		{
			parent::__construct();
			//Do your magic here
		}
		
		public function getDataSurvey()
		{
			$query=$this->db->get('survey');
			if ($query->num_rows()>0) {
				return $query->result_array();
			}
		}

		public function getDataSurveyByID($idSurvey)
		{
			$this->db->where('id_survey', $idSurvey);
			$query=$this->db->get('survey');
			if ($query->num_rows()>0) {
				return $query->result_array();
			}
		}

		public function getDataSurveyByStatus($statusSurvey)
		{
			# code...
		}

		public function tambahSurvey()
		{
			
			$orderdate = explode('-', $this->input->post('waktu_survey'));
			$year = $orderdate[0];
			$month   = $orderdate[1];
			$day  = $orderdate[2];

			$query=$this->db->query('select id_survey from survey order by id_survey desc limit 1');
			$id= $query->result_array();
			$str= $id[0]['id_survey'];
			$ids=substr($str, 3, 1);
			echo '<br>';
			$n= $ids + 1;
			$idSurvey = 'S00'.$n.'-0'.$n.''.$day.''.$month.''.$year;	
			
			$object =  array(
				'nama_survey' => $this->input->post('nama_survey'),
				'deskripsi' => $this->input->post('deskripsi'),
				'waktu_survey' => $this->input->post('waktu_survey'),
				'status' => 'Aktif',
				'id_survey' => $idSurvey,
				
			);
			$this->db->insert('survey', $object);
		}

		public function editSurvey()
		{
			# code...
		}

		public function deleteSurvey()
		{
			# code...
		}

		public function SurveySubmit()
		{
			# code...
		}
	
	}
	
	/* End of file SurveyModel.php */
	/* Location: ./application/models/SurveyModel.php */

?>