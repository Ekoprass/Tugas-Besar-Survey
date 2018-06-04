<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class User_model extends CI_Model {
	
		public function __construct()
			{
				parent::__construct();
				//Do your magic here
			}

		public function getDataUserByID($id_user)
		{
			$this->db->where('id_user', $id_user);
			$query=$this->db->get('user');
			return $query->result_array();
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
	}
	
	/* End of file UserModel.php */
	/* Location: ./application/models/UserModel.php */
 ?>
