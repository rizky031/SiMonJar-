<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class LogActivity extends CI_Controller {

    public function logdata(){
	    require('Koneksi.php');
		$log = $API->comm("/log/print");
		$user = $API->comm("/user/print");

		$log = json_encode($log);
		$log = json_decode($log, true);

		$data = [
			'totallog' => count($log),
			'log' => $log,
			'user' => $user
		];
		$this->load->view('template/main');
		$this->load->view('LogActivity/log_interface', $data);
    }
} 
