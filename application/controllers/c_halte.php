<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class c_halte extends CI_Controller {


function __construct(){
		parent::__construct();		
		$this->load->model('m_halte');
		 $this->load->model('model_login');
}

public function index(){

    if($this->model_login->logged_id())
    {
        $data['user'] = $this->m_halte->tampil_data()->result();
        $this->load->view('include\nav');
        $this->load->view('admin/vd_halte',$data);

    }else
    {
        redirect("c_login");

    }
                    
}

function tes_maps(){
        $this->load->view('include\nav');
		$this->load->view('admin/halte');
}

public function tambah_halte(){
        $data['dd_bidang'] = $this->m_halte->koridor(); 
	    $this->load->view('include\nav');
		$this->load->view('in/ihalte',$data);
}
  
public function simpan(){
            $nama_halte = $this->input->post('nama_halte');
            $alamat_halte = $this->input->post('alamat_halte');
            $latitute = $this->input->post('latitute');
            $longtitude = $this->input->post('longtitude');
            $nama_koridor = $this->input->post('nama_koridor');
            $keterangan = $this->input->post('keterangan');


            $config['upload_path']          = './uploads';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 2048;
            $config['max_width']            = 2000;
            $config['max_height']           = 2000;

            $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('userfile'))
        {
            $error = array('error' => $this->upload->display_errors());

            $this->load->view('halte', $error);
        }
        else
        {
            $file = $this->upload->data();
            $data = array(
            'nama_halte' => $nama_halte,
            'alamat_halte' => $alamat_halte,
            'latitute' => $latitute,
            'longtitude' => $longtitude,
            'nama_koridor' => $nama_koridor,
            'foto' => $file['file_name'],
            'keterangan' => $keterangan
                                        );
            $this->m_halte->input_data($data,'halte');
            redirect('c_halte');
            }
}

public function hapus($kd_halte){
            $_kd_halte = $this->db->get_where('halte',['kd_halte' => $kd_halte])->row();
            $query = $this->db->delete('halte',['kd_halte'=>$kd_halte]);

        if($query){
            unlink("uploads/".$_kd_halte->foto);
        }
            redirect('c_halte');
}

function edit ($kd_halte){
            $data['dd_bidang'] = $this->m_halte->koridor(); 
            $data['dd_bidang1'] = $this->m_halte->driver1();
            $where = array('kd_halte' => $kd_halte);
            $data['user'] = $this->m_halte->edit_data($where,'halte')->result();
            $this->load->view('include\nav');
          $this->load->view('ed/vehalte',$data);
}
function update(){

        $kd_halte = $this->input->post('kd_halte');
        $nama_halte = $this->input->post('nama_halte');
        $alamat_halte = $this->input->post('alamat_halte');
        $latitute = $this->input->post('latitute');
        $longtitude = $this->input->post('longtitude');
        $nama_koridor = $this->input->post('nama_koridor');
        $keterangan = $this->input->post('keterangan');


    $_image = $this->db->get_where('halte',['kd_halte' => $kd_halte])->row();
           
            $config['upload_path']          = './uploads';
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
            'nama_halte' => $nama_halte,
            'alamat_halte' => $alamat_halte,
            'latitute' => $latitute,
            'longtitude' => $longtitude,
            'nama_koridor' => $nama_koridor,
             'foto' => $_data['upload_data']['file_name'],
            'keterangan' => $keterangan
    );
    $query = $this->db->update('halte', $data, array('kd_halte' => $kd_halte));;
    
    if($query){
        unlink("uploads/".$_image->foto);
    }
    
    redirect('c_halte');
    }
}

}

?>
