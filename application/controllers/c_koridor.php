<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class c_koridor extends CI_Controller {
	function __construct(){
		parent::__construct();		
		$this->load->model('m_koridor');
		$this->load->model('model_login');
}
public function index(){
	if($this->model_login->logged_id())
	{
		$data['user'] = $this->m_koridor->tampil_data()->result();
		$this->load->view('include/nav');
		$this->load->view('admin/v_dkoridor',$data);
	}
	else
	{
		redirect("c_login");

	}

}

function input_koridor(){
		$this->load->view('include/nav');
		$this->load->view('admin/v_ikoridor');
}

function simpan(){
		$nama_koridor = $this->input->post('nama_koridor');
		$keterangan = $this->input->post('keterangan');
		$Tujuan = $this->input->post('Tujuan');

		$data = array(
			
			'nama_koridor' => $nama_koridor,
			'keterangan' => $keterangan,
			'Tujuan' => $Tujuan
			);
		$this->m_koridor->input_data($data,'tb_rute');
		redirect('c_koridor/index');
}

function hapus($id_rute){
		$where = array('id_rute' => $id_rute);
		$this->m_koridor->hapus_data($where,'tb_rute');
		redirect('c_koridor/index');
}

function edit($id_rute){
		$where = array('id_rute' => $id_rute);
		$data['user'] = $this->m_koridor->edit_data($where,'tb_rute')->result();
			$this->load->view('include/nav');
		$this->load->view('ed/v_ekoridor',$data);
}

function update(){
		$id_rute = $this->input->post('id_rute');
		$nama_koridor = $this->input->post('nama_koridor');
		$keterangan = $this->input->post('keterangan');
		$Tujuan = $this->input->post('Tujuan');


		$data = array(

			'nama_koridor' => $nama_koridor,
			'keterangan' => $keterangan,
			'Tujuan' => $Tujuan
			);

	$where = array(
		'id_rute' => $id_rute
	);

	$this->m_koridor->update_data($where,$data,'tb_rute');
	redirect('c_koridor/index');
}


}
