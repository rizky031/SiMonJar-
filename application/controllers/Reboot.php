<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reboot extends CI_Controller {

    public function restart(){
        require('Koneksi.php');
		$reboot = $API->comm("/system/reboot");
        $reboot = $this->input->post(null, true);

		redirect('auth');
    }
}
