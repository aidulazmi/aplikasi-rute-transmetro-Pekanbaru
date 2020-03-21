<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class c_supir extends CI_Controller {

function __construct(){
		parent::__construct();		
		$this->load->model('m_supir');
		$this->load->model('m_halte');
		$this->load->model('model_login');
}
public function index(){
    if($this->model_login->logged_id())
    {

	    $data['user'] = $this->m_supir->tampil_data()->result();
		$this->load->view('include/nav');
		$this->load->view('admin/v_dsupir',$data);
		
    }
    else
    {
        redirect("c_login");

	}

}

function input_supir(){
		$data['dd_bidang'] = $this->m_halte->koridor(); 
		$this->load->view('include/nav');
		$this->load->view('in/visupir',$data);
}

function simpan(){
		$Username = $this->input->post('Username');
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $nm_lengkap = $this->input->post('nm_lengkap');
        $alamat = $this->input->post('alamat');
        $no_hp = $this->input->post('no_hp');
        $nama_koridor = $this->input->post('nama_koridor');
        $platn = $this->input->post('platn');
           
            $config['upload_path']          = './uploads/supir';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 2048;
            $config['max_width']            = 2000;
            $config['max_height']           = 2000;
      
        $this->load->library('upload', $config);

    if ( ! $this->upload->do_upload('userfile'))
    {
        $error = array('error' => $this->upload->display_errors());
        $this->load->view('input_supir', $error);
    }
    else
    {
        $file = $this->upload->data();
        $data = array( 
            'Username' => $Username,
            'email' => $email,
            'password' => $password,
            'nm_lengkap' => $nm_lengkap,
            'alamat' => $alamat,
            'no_hp' => $no_hp,
            'nama_koridor' => $nama_koridor,
            'foto' => $file['file_name'],
            'platn' => $platn
            );

        $this->m_supir->input_data($data,'driver');
        redirect('c_supir');
	}
}

function hapus($id_driver){
        $_id_driver = $this->db->get_where('driver',['id_driver' => $id_driver])->row();
        $query = $this->db->delete('driver',['id_driver'=>$id_driver]);
    
    if($query){
        unlink("uploads/supir/".$_id_driver->foto);
    }
            redirect('c_supir');
}
	
function edit($id_driver){
		$data['dd_bidang'] = $this->m_halte->koridor(); 
        $data['dd_bidang1'] = $this->m_halte->driver1();
        $where = array('id_driver' => $id_driver);
        $data['user'] = $this->m_supir->edit_data($where,'driver')->result();
        $this->load->view('include\nav');
        $this->load->view('ed/vesupir',$data);
}

function update(){

        $id_driver = $this->input->post('id_driver');
		$Username = $this->input->post('Username');
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $nm_lengkap = $this->input->post('nm_lengkap');
        $alamat = $this->input->post('alamat');
        $no_hp = $this->input->post('no_hp');
        $nama_koridor = $this->input->post('nama_koridor');
        $platn = $this->input->post('platn');

        $_image = $this->db->get_where('driver',['id_driver' => $id_driver])->row();
           
            $config['upload_path']          = './uploads/supir';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 2048;
            $config['max_width']            = 2000;
            $config['max_height']           = 2000;

        $this->load->library('upload', $config);
    
    if (!$this->upload->do_upload('userfile')){
            echo 'gagal update';
    }
    else
    {

    $_data = array('upload_data' => $this->upload->data());
    $data = array(
            'Username' => $Username,
            'email' => $email,
            'password' => $password,
            'nm_lengkap' => $nm_lengkap,
            'alamat' => $alamat,
            'no_hp' => $no_hp,
            'nama_koridor' => $nama_koridor,
            'foto' => $_data['upload_data']['file_name'],
            'platn' => $platn
    );
        $query = $this->db->update('driver', $data, array('id_driver' => $id_driver));;
    
    if($query){
        unlink("uploads/supir/".$_image->foto);
    }
    
    redirect('c_supir');
    }
}
}	
 
