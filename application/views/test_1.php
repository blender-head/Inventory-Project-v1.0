<?php

$this->load->library('session');
$test = $this->session->userdata('test');

echo $test;