<?php

    class Test extends CI_Controller
    {
        public function index()
        {
            $po_number = $this->input->post('po_number');
            
            $query = $this->order_meta_data_model->select_po_number($po_number);
            
            foreach($query as $result)
            {
                $po_number_res = $result->po_number;
            }
            
            echo $po_number_res;
        }
    }
