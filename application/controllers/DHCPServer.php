<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class DHCPServer extends CI_Controller {

    public function server(){
	    require('Koneksi.php');
		$dhcpserver = $API->comm("/ip/dhcp-server/print");

		$dhcpserver = json_encode($dhcpserver);
		$dhcpserver = json_decode($dhcpserver, true);

		$data = [
			'dhcpserver' => $dhcpserver,
		];

		//var_dump($dhcpserver);
		//die;
		$this->load->view('template/main');
		$this->load->view('configuration/dhcp_server_interface', $data);
    }

    public function adddhcp(){
		$post = $this->input->post(null, true);
		require('Koneksi.php');
		$API->comm("/ip/dhcp-server/add", array(
			"interface" => $post['interface'],
			"lease-time" => $post['lease-time'],
			"address-pool" => $post['address-pool']
		));

		redirect('dhcpserver/server');
	}

	public function remove($id){
		require('Koneksi.php');
		$API->comm("/ip/dhcp-server/remove", array(
			".id" => '*'.$id
		));

		redirect('dhcpserver/server');
	}

	public function enable($id){
		require('Koneksi.php');
		$API->comm("/ip/dhcp-server/enable", array(
			".id" => '*'.$id
		));

		redirect('dhcpserver/server');
	}

	public function disable($id){
		require('Koneksi.php');
		$API->comm("/ip/dhcp-server/disable", array(
			".id" => '*'.$id
		));

		redirect('dhcpserver/server');
	}
}
