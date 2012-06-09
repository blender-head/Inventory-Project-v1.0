<?php

    /*
     *  Order Controller :
     *  1. index() : 
     *          function => input order meta data and data to order_data and order_meta_data table 
     *          view => order-form.php
     *            
     */
    
    class Order extends CI_Controller
    {
        /*
         *  index() method
         *  input orders data to orders and order_status table
         */
        public function index()
        {
            
            // get data from unit_type table
            // we need the data to populate unit type select list
            $query_unit_type = $this->unit_type_model->get_all_data();
            
                        
            // get data from product_type table
            // we need the data to populate product type select list
            $query_prod_type = $this->product_type_model->get_all_data();
            
                       
            //if the query_unit_type returns a result
            if(sizeof($query_unit_type) > 0)
            {
                //send $unit_type variable to order_form.php view
                $data['unit_type'] = $query_unit_type;
            }
            
                       
            //if the query_prod_type returns a result
            if(sizeof($query_unit_type) > 0)
            {
                //send $product_type variable to order_form.php view
                $data['product_type'] = $query_prod_type;
            }
            
            $this->load->view('order', $data);
            
        }
        // end index() method
        
     
    }
