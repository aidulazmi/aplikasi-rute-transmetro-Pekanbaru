<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class home extends CI_Controller {



		function __construct(){
		parent::__construct();		
		 $this->load->model('model_login');
		 $this->load->model('m_halte');
	}
	public function index()
	{

			if($this->model_login->logged_id())
		{
			 $data['user'] = $this->m_halte->tampil_data()->result();
		$this->load->view('include/nav');
		$this->load->view('admin/home',$data);
	}
	else{

	
			redirect("c_login");

		}

	
}
function about()
{
			$this->load->view('include/nav');
	$this->load->view('admin/about_us');
}

}
