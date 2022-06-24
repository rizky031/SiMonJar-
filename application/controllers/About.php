<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About extends CI_Controller {
    public function versi(){
		$this->load->view('template/main');
		$this->load->view('about/aboutme');
    }
}
