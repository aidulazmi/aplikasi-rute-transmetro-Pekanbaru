<?php 

class m_halte extends CI_Model{
	function tampil_data(){
		return $this->db->get('halte');
	}
	function input_data($data,$table){
		$this->db->insert($table,$data);
	}

	public function insert($data){
			  $this->db->insert('halte',$data);
      return TRUE;
		}

	function hapus_data($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}

	function edit_data($where,$table){		
		return $this->db->get_where($table,$where);
	}

	function update_data($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}	

	function koridor(){
       $query = $this->db->query('SELECT * FROM tb_rute');
        return $query->result();
    }
	function driver1(){
       $query = $this->db->query('SELECT * FROM driver');
        return $query->result();
    }
    
}