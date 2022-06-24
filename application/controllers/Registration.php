<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registration extends CI_Controller {

    public function registdata(){
	    require('Koneksi.php');
		$regist = $API->comm("/interface/wireless/registration-table/print");
		$wifi = $API->comm("/interface/wireless/print");
		$security = $API->comm("/interface/wireless/security-profile/print");

		$regist = json_encode($regist);
		$regist = json_decode($regist, true);
		$wifi = json_encode($wifi);
		$wifi = json_decode($wifi, true);


		$data = [
			'totalregist' => count($regist),
			'regist' => $regist,
			'wifi' => $wifi,
			'security' => $security
		];
		$this->load->view('template/main');
		$this->load->view('wifi/registration_interface', $data);
    }

	public function update($id){
		require('Koneksi.php');
		$wireless = $API->comm("/interface/wireless/print", array(
			"?.id" => '*'.$id
		)); 
		$security = $API->comm("/interface/wireless/security-profile/print");

		$data = [
			"title" => 'Update Wireless',
			"wireless" => $wireless[0],
			"security-profile" => $security
		];
		$this->load->view('template/main', $data);
		$this->load->view('wifi/update_wireless', $data);
	}

    public function saveUpdateWireless(){
		$post = $this->input->post(null, true);
		require('Koneksi.php');
		$API->comm("/interface/wireless/set", array(
			".id" => $post['id'],
			"name" => $post['name'],
			"mac-address" => $post['mac-address'],
			"mode" => $post['mode'],
			"ssid" => $post['ssid'],
			"band" => $post['band'],
			"frequency" => $post['frequency'],
			"security-profile" => $post['security-profile']
		));

		redirect('address/ipaddress');
	}

	public function remove($id){
		require('Koneksi.php');
		$API->comm("/interface/wireless/remove", array(
			".id" => '*'.$id
		));

		redirect('address/ipaddress');
	}
}
