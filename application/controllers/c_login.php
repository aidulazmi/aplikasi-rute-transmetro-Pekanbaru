<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class c_login extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //load library form validasi
        $this->load->library('form_validation');
        //load model admin
        $this->load->model('model_login');
    }

	public function index()
	{
		
			if($this->model_login->logged_id())
			{
				redirect("c_koridor");

			}else{

	            $this->form_validation->set_rules('username', 'Username', 'required');
	            $this->form_validation->set_rules('password', 'Password', 'required');

	            $this->form_validation->set_message('required', '<div class="alert alert-danger" style="margin-top: 3px">
	                <div class="header"><b><i class="fa fa-exclamation-circle"></i> {field}</b> harus diisi</div></div>');

				if ($this->form_validation->run() == TRUE) {

	            $username = $this->input->post("username", TRUE);
	            $password = $this->input->post('password', TRUE);
	            
	            $checking = $this->model_login->check_login('admin', array('Username' => $username), array('password' => $password));
	            
	            //jika ditemukan, maka create session
	            if ($checking != FALSE) {
	                foreach ($checking as $apps) {

	                    $session_data = array(
	                        'id_admin'   => $apps->id_admin,
	                        'Username' => $apps->Username,
	                        'Email' => $apps->Email,
	                        'password' => $apps->password,
	                        'Nm_lengkap' => $apps->Nm_lengkap
	                    );
	                    //set session userdata
	                    $this->session->set_userdata($session_data);

	                    redirect('home');

	                }
	            }else{

	            	$data['error'] = '<div class="alert alert-danger" style="margin-top: 3px">
	                	<div class="header"><b><i class="fa fa-exclamation-circle"></i> ERROR</b> username atau password salah!</div></div>';
	            	$this->load->view('login/login', $data);
	            }

	        }else{

	            $this->load->view('login/login');
	        }

		}

	}


		public function logout()
	{
		$this->session->sess_destroy();
		redirect('c_login');
	}
}
