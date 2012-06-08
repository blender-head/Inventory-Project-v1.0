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
            
            // get data from order_form.php view
            $po_number = $this->input->post('po-number');
            $po_date = $this->input->post('po-date');
            $supplier = $this->input->post('supplier');
            $key_person = $this->input->post('key-person');
            $address = $this->input->post('address');
            $instruction = $this->input->post('instruction');
            $product_code = $this->input->post('product-code');
            $product_name = $this->input->post('product-name');
            $product_count = $this->input->post('product-count');
            $unit_type = $this->input->post('product-unit');
            $buy_price = $this->input->post('product-price');
            $product_total = $this->input->post('product-total');
            $total_order = $this->input->post('total-order');
            $save_order = $this->input->post('save-order');
            $add_order = $this->input->post('add-order');
            $calculate_order = $this->input->post('calculate-order');
            
            
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
            
            // set form validation rule
            $this->form_validation->set_rules('po-number', 'PO Number', 'required|is_unique[order_meta_data.po_number]|numeric');
            $this->form_validation->set_rules('po-date', 'PO Date', 'required');
            $this->form_validation->set_rules('supplier', 'Supplier', 'required');
            $this->form_validation->set_rules('key-person', 'Key Person', 'required');
            $this->form_validation->set_rules('product-code', 'Product Code', 'required|numeric');
            $this->form_validation->set_rules('product-name', 'Product Name', 'required');
            $this->form_validation->set_rules('product-count', 'Quantity', 'required|numeric');
            $this->form_validation->set_rules('product-price', 'Product Price', 'required|numeric');
            
            
            if($this->form_validation->run() == FALSE)
            {
                // load the order_form.php view
                $this->load->view('order/order', $data);
            }
            else
            {
   
                $status = 'Order Sent';
                if($save_order)
                {
                    $save_meta_data = $this->order_meta_data_model->save_meta_data($po_number, $po_date, $supplier, $key_person, $address, $instruction, $total_order, $status);
                    //$save_data = $this->order_data_model->save_data($po_number, $po_date, $product_code, $product_number, $product_name, $product_count, $unit_type, $buy_price, $product_total);
                }
               
            }
                       
            $this->load->view('order/order', $data);
            
            
        }
        // end index() method
        
     
    }
