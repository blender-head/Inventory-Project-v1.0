<?php

    /*
     *  Order Controller :
     * 
     *  1. order_form() :  display form to input order datas
     *     view : order-form.php
     * 
     *  2. order_form_validation() : performs order form validation
     *     view : no view
     * 
     *  3. order_list() : retrieve and display order data
     *     view : order-list.php
     * 
     *  4. order_details($po_number) : display order data based on po_number
     *     view: order-details.php
     *            
     */
    
    class Order extends CI_Controller
    {
        /*
         *  index() method
         *  display form to input order data
         */
        public function order_form()
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
                $data['title'] = 'Order Form';
            }
            
            $this->load->view('order-form', $data);
            
        }
        // end index() method
        
        public function order_save_meta_data()
        {
           // order meta data :
            $po_number = $this->input->post('po_number');
            $po_date = $this->input->post('po_date');
            $supplier = $this->input->post('supplier');
            $key_person = $this->input->post('key_person');
            $address = $this->input->post('address');
            $instruction = $this->input->post('instruction');
            $total_order = $this->input->post('total_order'); 
            $counter = $this->input->post('counter');
            
            // order meta data validation :
            $this->form_validation->set_rules('po_number', 'PO Number', 'required|numeric');
            $this->form_validation->set_rules('po_date', 'PO Date', 'required');
            $this->form_validation->set_rules('supplier', 'Supplier', 'required');
            $this->form_validation->set_rules('key_person', 'Key Person', 'required');
            $this->form_validation->set_rules('total_order', 'Total Order', 'required|numeric');
            
            if($this->form_validation->run() == FALSE)
            {
                // set messeges for each error
                $po_number_error = form_error('po_number');
                $po_date_error = form_error('po_date');
                $supplier_error = form_error('supplier');
                $key_person_error = form_error('key_person');
                $total_order_error = form_error('total_order');
                
                $data = array(
                              'po_number'=>$po_number, 
                              'po_date'=>$po_date,
                              'po_number_error'=>$po_number_error,
                              'po_date_error'=>$po_date_error,
                              'supplier_error'=>$supplier_error,
                              'key_person_error'=>$key_person_error,
                              'total_order_error'=>$total_order_error
                             );
                
                echo json_encode($data);   
            }
            else
            {
                $get_po_number = $this->order_meta_data_model->get_meta_data($po_number);
                $get_data = $this->order_data_model->get_data($po_number);
                
                $get_po_number_val = sizeof($get_po_number);
                $get_data_val = sizeof($get_data);
                
                if($get_po_number_val and $get_data_val)
                {
                    foreach($get_po_number as $result)
                    {
                        $po_number = $result->po_number;
                    }
                    
                    $data = array('po_number_exist'=>$po_number);
                    echo json_encode($data);  
                }
                else
                {
                    $status = "Order Sent";
                    $order_save_meta_data = $this->order_meta_data_model->save_meta_data($po_number, $po_date, $supplier, $key_person, $address, $instruction, $total_order, $status);
                    $success = 'data saved';
                    $data = array('data_saved'=>$order_save_meta_data, 'po_number'=>$po_number, 'po_date'=>$po_date);
                    echo json_encode($data); 
                }
            }
        }
        
        
        public function order_save_data()
        {

            // order data :
            $po_number = $this->input->post('po_number');
            $po_date = $this->input->post('po_date');
            $product_code = $this->input->post('product_code');
            $product_name = $this->input->post('product_name');
            $product_qty = $this->input->post('product_qty');
            $product_unit = $this->input->post('product_unit');
            $product_type = $this->input->post('product_type');
            $product_price = $this->input->post('product_price');
            $product_total = $this->input->post('product_total');
            
            // order data validation :
            $this->form_validation->set_rules('po_number', 'PO Number', 'required|numeric');
            $this->form_validation->set_rules('po_date', 'PO Date', 'required');
            $this->form_validation->set_rules('product_code', 'Product Code', 'required|numeric');
            $this->form_validation->set_rules('product_name', 'Product Name', 'required');
            $this->form_validation->set_rules('product_qty', 'Product Quantity', 'required|numeric');
            $this->form_validation->set_rules('product_price', 'Product Price', 'required|numeric');
            $this->form_validation->set_rules('product_total', 'Product Total', 'required|numeric');
            
            if($this->form_validation->run() == FALSE)
            {
                $error = '<div id="dialog-overlay"></div>';
		$error .= '<div id="dialog-box">';
		$error .= '<div class="dialog-content">';
                $error .= '<div id="dialog-message"></div>';
		$error .= '<a href="#" class="button">Close</a></div></div>';
                $po_number_error = form_error('po_number');
                $po_date_error = form_error('po_date');
                $product_code_error = form_error('product_code');
                $product_name_error = form_error('product_name');
                $product_qty_error = form_error('product_qty');
                $product_price_error = form_error('product_price');
                $product_total_error = form_error('product_total');
                                
                $data = array(
                              'po_number_error'=>$po_number_error,
                              'po_date_error'=>$po_date_error,
                              'product_name_error'=>$product_name_error,
                              'product_code_error'=>$product_code_error,
                              'product_name_error'=>$product_name_error,
                              'product_qty_error'=>$product_qty_error,
                              'product_price_error'=>$product_price_error,
                              'product_total_error'=>$product_total_error
                             );
                
                echo json_encode($data);   
            }
            else
            {
                $order_save_data = $this->order_data_model->save_data($po_number, $po_date, $product_code, $product_name, $product_qty, $product_unit, $product_type, $product_price, $product_total);
                $success = 'data saved';
                $data = array('data_saved'=>$order_save_data);
                echo json_encode($data);
            }
          }
          
              
        
        
        // start order_list() method
        // method to retrieve order data
        public function order_list()
        {
            
            // get all order_meta_data data using order_meta_data_model
            $get_meta_data = $this->order_meta_data_model->get_all_meta_data();
             
            // if the query returns a result
            // send them to order-list.php view
            if(sizeof($get_meta_data) > 0)
            {
                $data['records'] = $get_meta_data;
            }
            // if the table is empty
            else
            {
                $data['records'] = 0;
            }
            
            $data['title'] = "Order Details";
            $this->load->view('order-list', $data);
        }
        //end order_list() method
        
        
        
        // start order_details() method
        // method to retrieve order details, based on po_number
        public function order_details($po_number)
        {
            $query_meta_data = $this->order_meta_data_model->get_meta_data($po_number);
            
            if($query_meta_data)
            {
                $data['records'] = $query_meta_data;
            }
            
            $data['title'] = "Order Details PO Number " . $po_number;
            $this->load->view('order-details', $data);
            
        }
        //end order_details() method
        
        
        public function order_edit($po_number)
        {
           $query_meta_data = $this->order_meta_data_model->get_meta_data($po_number);
            
            if($query_meta_data)
            {
                $data['records'] = $query_meta_data;
            }
            
            $data['title'] = "Order Edit PO Number " . $po_number;
            $this->load->view('order-edit', $data);
        }
        
        public function order_print($po_number)
        {
            
        }        
               
    }
