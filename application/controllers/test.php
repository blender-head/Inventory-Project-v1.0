<?php

    class Test extends CI_Controller
    {
        public function index()
        {
           $po_number= 123456;
           $get_data = $this->order_data_model->get_data($po_number);
           echo sizeof($get_data);
        }
    }
