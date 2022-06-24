<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

    public function userdata(){
		require('Koneksi.php');
		$user = $API->comm("/user/print");
		$group = $API->comm("/user/group/print");

		$data = [
			'user' => $user,
			'group' => $group
		];
		$this->load->view('template/main', $data);
		$this->load->view('users/users_registration', $data);
    }

	public function adduser(){
		$post = $this->input->post(null, true);
		require('Koneksi.php');
		$API->comm("/user/add", array(
			"name" => $post['name'],
			"group" => $post['group'],
			"password" => $post['password'],
			"password" => $post['confirm-password'],
			"comment" => $post['comment']
		));

		redirect('users/userdata');
	}

	public function remove($id){
		require('Koneksi.php');
		$remove = $API->comm("/user/remove", array(
			".id" => '*'.$id
		)); 

		redirect('users/userdata');
	}

	public function update($id){
		require('Koneksi.php');
		$getuser = $API->comm("/user/print", array(
			"?.id" => '*'.$id
		)); 
		$group = $API->comm("/user/group/print");
		$data = [
			"title" => 'Update Users',
			"user" => $getuser[0],
			"group" => $group
		];
		$this->load->view('template/main', $data);
		$this->load->view('users/update_user', $data);
	}

	public function saveUpdateUser(){
		$post = $this->input->post(null, true);
		require('Koneksi.php');
		$API->comm("/user/set", array(
			".id" => $post['id'],
			"name" => $post['name'],
			"group" => $post['group'],
			"password" => $post['password'],
			"password" => $post['confirm-password'],
			"comment" => $post['comment']
		));

		redirect('users/userdata');
	}
}

ini_set('display_errors', 'off');