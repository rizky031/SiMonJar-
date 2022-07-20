<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function index(){
		require('Koneksi.php');

		$users = $API->comm("/users/active/print");
		$registration = $API->comm("/interface/wireless/registration-table/print");
		$resource = $API->comm("/system/resource/print");
		$history = $API->comm("/system/history/print");
		$log = $API->comm("/log/print");

		$cpu = $resource[0]['cpu-load'];
		$uptime = $resource[0]['uptime'];
 
		$data = [
			'users' => count($users),
			'registration' => count($registration),
			'cpu' => $cpu,
			'uptime' => $uptime,
			'log' => $log,
			'history' => $history
		];

		//var_dump($resource);
		//die;
		$this->load->view('template/main');
		$this->load->view('dashboard', $data);
	}

	public function resource(){
		require('Koneksi.php');

		$resource = $API->comm("/system/resource/print");
		$users = $API->comm("/users/active/print");
		$registration = $API->comm("/interface/wireless/registration-table/print");
		$history = $API->comm("/system/history/print");

		$cpu = $resource[0]['cpu-load'];
		$uptime = $resource[0]['uptime'];

		$data = [
			'users' => count($users),
			'registration' => count($registration),
			'cpu' => $cpu,
			'uptime' => $uptime,
			'history' => $history
		];
		$this->load->view('resource', $data);
	}
	
}
