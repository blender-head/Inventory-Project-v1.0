<?php

    class Transaction extends CI_Controller
    {
        
        public function order()
        {
            $this->load->view('transaction_order');
        }
    }
