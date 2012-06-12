<?php

    class Test extends CI_Controller
    {
        public function index()
        {
           $length = $this->input->post('length');
           
           echo $length;
        }
    }
