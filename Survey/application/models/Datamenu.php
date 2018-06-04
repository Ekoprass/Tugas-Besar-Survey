<?php 
	
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Datamenu extends CI_Model {
	
		public function getMenu($akses)
			{
				$this->db->select('menu,level,akses,icon,link');
				$this->db->from('menu');
				$this->db->where('akses', $akses);
				$query=$this->db->get();
				return $query->result_array();
			}	
	
	}
	
	/* End of file Datamenu.php */
	/* Location: ./application/models/Datamenu.php */
 ?>