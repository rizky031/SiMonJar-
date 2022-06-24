<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Address extends CI_Controller {

    public function ipaddress(){
	    require('Koneksi.php');
		$ip = $API->comm("/ip/address/print");

		$ip = json_encode($ip);
		$ip = json_decode($ip, true);

		$data = [
			'ip' => $ip
		];
		$this->load->view('template/main');
		$this->load->view('configuration/address_interface', $data);
    }

	public function add(){
		$post = $this->input->post(null, true);
		require('Koneksi.php');
		$API->comm("/ip/address/add", array(
			"address" => $post['address'],
			"interface" => $post['interface'],
			"comment" => $post['comment']
		));

		redirect('address/ipaddress');
	}

	public function remove($id){
		require('Koneksi.php');
		$API->comm("/ip/address/remove", array(
			".id" => '*'.$id
		));

		redirect('Address/ipaddress');
	}

	public function update($id){
		require('Koneksi.php');
		$getaddress = $API->comm("/ip/address/print", array(
			"?.id" => '*'.$id
		)); 

		$data = [
			"title" => 'Update Address',
			"address" => $getaddress[0]
		];
		$this->load->view('template/main', $data);
		$this->load->view('configuration/address_update', $data);
	}

	public function saveUpdateAddress(){
		$post = $this->input->post(null, true);
		require('Koneksi.php');
		$API->comm("/ip/address/set", array(
			".id" => $post['id'],
			"address" => $post['address'],
			"interface" => $post['interface'],
			"comment" => $post['comment']
		));
		
		redirect('Address/ipaddress');
	}
}
