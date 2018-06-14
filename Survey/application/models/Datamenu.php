<?php 
	
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Datamenu extends CI_Model {
	
		public function getMenu($akses)
			{
				$this->db->where('akses', $akses);
				$this->db->where('level', "0");
				$query=$this->db->get('menu');
				return $query->result_array();
			}	

		public function getMenu2($akses)
			{
				$this->db->where('akses', $akses);
				$this->db->where('level >', "0");
				$menu = $this->db->get('menu');
				return $menu->result_array();
				
				
			}	
	
	}
	
	/* End of file Datamenu.php */
	/* Location: ./application/models/Datamenu.php */
 ?>