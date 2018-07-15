<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class User_model extends CI_Model {
	
		public function __construct()
			{
				parent::__construct();
				//Do your magic here
			}
		
		public function getDataUser($id_user)
		{
			$this->db->where('id_user !=', $id_user);
			$query=$this->db->get('user');
			if ($query->num_rows()>0) {
				return $query->result_array();
			}
		}	

		public function getDataUserByID($id_user)
		{
			$this->db->where('id_user', $id_user);
			$query=$this->db->get('user');
			return $query->result_array();
		}

		public function getDataUserByStatus($status)
		{
			$this->db->where('status_user', $status);
			$query=$this->db->get('user');
			return $query->result_array();
		}

		public function tambahUser()
		{
			$object =  array(
				'nama' => $this->input->post('nama'),
				'username' => $this->input->post('username'),
				'password' => md5($this->input->post('password')),
				'status_user' => 'Aktif',
				'akses' => '1',
				
			);
			$this->db->insert('user', $object);
		}

		public function register()
		{
			$id= $this->input->post('id_user');
			$object =  array(
				'nama' => $this->input->post('nama'),
				'NIK' => $this->input->post('NIK'),
				'username' => $this->input->post('username'),
				'password' => md5($this->input->post('password')),
				'status_user' => 'Aktif',
				'akses' => '1',
				'tglLahir' => $this->input->post('tglLahir'),
				'alamat' => $this->input->post('alamat'),
				'jenis_kelamin' => $this->input->post('jenis_kelamin'),
				'kota' => $this->input->post('kota'),
				'pendidikan_terakhir' => $this->input->post('pendidikan_terakhir'),
				'pekerjaan' => $this->input->post('pekerjaan'),
				'umur' => $this->input->post('umur'),
				'status' => 'Verified',

				
			);
			$this->db->insert('user', $object);
		}

		public function editUser()
		{
			$id= $this->input->post('id_user');
			$object =  array(
				'nama' => $this->input->post('nama'),
				'NIK' => $this->input->post('NIK'),
				'username' => $this->input->post('username'),
				'password' => md5($this->input->post('password')),
				'status_user' => 'Aktif',
				'akses' => '1',
				'tglLahir' => $this->input->post('tglLahir'),
				'alamat' => $this->input->post('alamat'),
				'jenis_kelamin' => $this->input->post('jenis_kelamin'),
				'kota' => $this->input->post('kota'),
				'pendidikan_terakhir' => $this->input->post('pendidikan_terakhir'),
				'pekerjaan' => $this->input->post('pekerjaan'),
				'umur' => $this->input->post('umur'),
				'status' => 'Verified',

				
			);
			$this->db->where('id_user', $id);
			$this->db->update('user', $object);
		}

	
		public function Login($username,$password)
		{
			$this->db->select('id_user,username,password,akses,status_user,nama');
			$this->db->from('user');
			$this->db->where('username', $username);
			$this->db->where('password', md5($password));
			$query=$this->db->get();
			if ($query->num_rows()==1) {
				return $query->result();
			}else{
				return false;
			}
		}

		public function setSurvey()
		{
			date_default_timezone_set('Asia/Jakarta');
			$dikerjakan = date("Y-m-d h:i:s");
			$object =  array(
				'id_user' => $this->input->post('id_user'),
				'id_survey' => $this->input->post('id_survey'),
				'status' => 'Partisipan',
				'dikerjakan' => $dikerjakan,
			);
			$this->db->insert('partisipan', $object);
		}
	}
	
	/* End of file UserModel.php */
	/* Location: ./application/models/UserModel.php */
 ?>
