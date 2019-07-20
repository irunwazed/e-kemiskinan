<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HomeController extends CI_Controller {

	public function beranda()
	{

        $foot['script'] = $this->load->view('components/beranda/script', null, true);

        $this->load->view('include/head');
        $this->load->view('components/beranda/data');
        $this->load->view('include/foot', $foot);
    }
}