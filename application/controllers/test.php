<?php

    class Test extends CI_Controller
    {
        
        public function index()
        {
            
           $test = $this->input->post('product-count-2');
           $submit = $this->input->post('save-order');
           
           if($submit)
           {
               echo $test;
           }
            
        }
  
     }
