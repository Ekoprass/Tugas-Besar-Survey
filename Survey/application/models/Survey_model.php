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
			$this->db->where('status !=', 'Nonaktif');
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

		public function getSurveyByPartisipan($id_user)
		{
			$query1=$this->db->query('select s.id_survey, s.nama_survey, s.deskripsi, s.waktu_survey, s.status from survey s inner join partisipan p on s.id_survey!=p.id_survey where p.id_user='.$id_user.' AND s.status="Aktif-Published"');
					return $query1->result_array();	
		}

		public function getSurveyHistory($id_user)
		{
			$query1=$this->db->query('select s.id_survey, s.nama_survey, s.deskripsi, s.waktu_survey, p.dikerjakan from survey s inner join partisipan p on s.id_survey=p.id_survey where p.id_user='.$id_user.'');
					return $query1->result_array();	
		}

		public function getDataSurveyStat()
		{
			$this->db->where('status', 'Aktif-Published');
			$query=$this->db->get('survey');
			if ($query->num_rows()>0) {
				return $query->result_array();
			}
		}

		public function getDataSurveyByStatus($id_user)
		{
			$query=$this->db->query("select p.id_survey from partisipan p inner join survey s on p.id_survey=s.id_survey where id_user!=".$id_user." and p.id_survey=s.id_survey AND s.status='Aktif-Published'");
			return $query->result_array();
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

		public function editSurvey($id_survey)
		{
			$object =  array(
				'nama_survey' => $this->input->post('nama_survey'),
				'deskripsi' => $this->input->post('deskripsi'),
				'waktu_survey' => $this->input->post('waktu_survey'),
				'status' => 'Aktif'
				
			);
			$this->db->where('id_survey', $id_survey);
			$this->db->update('survey', $object);
		}

		public function getDataSurveyNon()
		{
			$this->db->where('status', 'Nonaktif');
			$query=$this->db->get('survey');
				return $query->result_array();

		}

		public function publishSurvey($id)
		{
			$object = array('status' => 'Aktif-Published');
			$this->db->where('id_survey', $id);
			$this->db->update('survey', $object);
		}

		public function aktifSurvey($id)
		{
			$object = array('status' => 'Aktif');
			$this->db->where('id_survey', $id);
			$this->db->update('survey', $object);
		}

		public function deleteSurvey($id)
		{
			$object = array('status' => 'Nonaktif');
			$this->db->where('id_survey', $id);
			$this->db->update('survey', $object);
		}

		public function delete($id)
		{
			$this->db->where('id_survey', $id);
			$this->db->delete('survey');
		}

		public function surveyResultAnswer($id_survey)
		{
			$this->db->select('id_user');
			$this->db->where('id_survey', $id_survey);
			$query1=$this->db->get('partisipan');
			$user=$query1->result_array();
			foreach ($user as $key) {
				$query2=$this->db->query("select group_concat(a.jawaban separator', ') as jawaban from answer_user a inner join user u on u.id_user=a.id_user	inner join question q on q.id_question=a.id_question	where q.id_survey='".$id_survey."' and a.id_user='".$key['id_user']."'	group by q.question");
				return $query2->result_array();
			}
			
		}

		public function surveyResultQuestion($id_survey)
		{
			$this->db->where('id_survey', $id_survey);
			$query=$this->db->get('question');
			if ($query->num_rows()>0) {
				return $query->result_array();
			}
		}

		public function surveyResultUser($id_survey)
		{
				$query2=$this->db->query("select distinct(u.nama), u.id_user from answer_user a inner join user u on u.id_user=a.id_user inner join question q on q.id_question=a.id_question where q.id_survey='".$id_survey."'");
				if ($query2->num_rows()>0) {
					return $query2->result_array();
				}
		}
	
	}
	
	/* End of file SurveyModel.php */
	/* Location: ./application/models/SurveyModel.php */

?>