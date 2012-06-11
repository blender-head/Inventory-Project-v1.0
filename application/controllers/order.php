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
            $orders = array();
            $po_number = $this->input->post('po_number');
            $po_date = $this->input->post('po_date');
            $product_count_first = $this->input->post('product_count_first');
            $product_count = $this->input->post('qty');
            $nam_count = $this->input->post('nam_count');
            $class_name = $this->input->post('class_name');
            $save_status = $this->input->post('save_status');
            $add_order = $this->input->post('add_order');
            $arr = $this->input->post('arr');
            
            //$data = array('arr'=>$arr);
            //echo json_encode($data);    
            
            //$this->form_validation->set_rules('product_count_first', 'Quantity', 'required');
            $this->form_validation->set_rules('arr', 'Quantity', 'required|numeric');
            
            if($this->form_validation->run('arr') == FALSE)
            {
                $product_count_error = form_error('arr');
                //$product_count_error = form_error('qty');
                $data = array('product_count_error'=>$product_count_error);
                echo json_encode($data);
            }
            
            /*
            if($this->form_validation->run('product_count_first') == FALSE)
            {
                $product_count_first_error = form_error('product_count_first');
                //$product_count_error = form_error('qty');
                $data = array('product_count_first_error'=>$product_count_first_error);
                echo json_encode($data);
            }
            */
            
            /*
            $this->form_validation->set_rules('po_number', 'PO Number', 'required|numeric|is_unique[order_meta_data.po_number]');
            $this->form_validation->set_rules('po_date', 'PO Date', 'required');
            */
            
            /*
            if($this->form_validation->run() == FALSE)
            {
                //$product_count_error = form_error('product-');
                //$data = array('error_product_count'=>$po_count_error);
                //$po_number_error = form_error('po_number');
                //$data = array('error_po_number'=>$po_number_error);
                //$po_date_error = form_error('po_date');
                //$data = array('error_po_date'=>$po_date_error);
                echo json_encode($data);
                
            }
            else
            {
                //array_push($orders,$po_number);
                //$data = array('order_element'=>$orders);
                //array_push($orders,$po_date);
                //$data = array('order_element'=>$orders);
                //echo json_encode($data);
            }
            */
                       
        }
        // end order_form_validation() method
     
    }
