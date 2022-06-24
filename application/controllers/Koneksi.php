<?php
        $ip = $this->session->userdata('ip');
        $user = $this->session->userdata('user');
        $password = $this->session->userdata('password');
		$API = new MonitoringWeb();
		$API->connect($ip, $user, $password);
?>