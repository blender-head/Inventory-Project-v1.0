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
         *  display form to input order data
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
            
            $this->load->view('order-form', $data);
            
        }
        // end index() method
        
        
        // start order_form_validation()
        // function to perform validation against order form
        public function order_form_validation()
        {
            $po_number = $this->input->post('po_number');
            $po_date = $this->input->post('po_date');
            
            $this->form_validation->set_rules('po_number', 'PO Number', 'required|numeric|is_unique[order_meta_data.po_number]');
            
            
            if($this->form_validation->run('po_number') == FALSE)
            {
                $po_number_error = form_error('po_number');
                $data = array('success'=> true,'error'=>$po_number_error);
                echo json_encode($data);
            }
           
        }
        // end order_form_validation() method
     
    }
