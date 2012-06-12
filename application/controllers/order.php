<?php

    /*
     *  Order Controller :
     *  1. order_form() :  display form to input order datas
     *     view : order-form.php
     * 
     *  2. order_form_validation() : performs order form validation
     *     view : no view
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
            }
            
            $this->load->view('order-form', $data);
            
        }
        // end index() method
        
        
        // start order_form_validation()
        // function to perform validation against order form
        public function order_form_validation()
        {
            
            // get data from ajax post data :
            
            // order meta data :
            $po_number = $this->input->post('po_number');
            $po_date = $this->input->post('po_date');
            $supplier = $this->input->post('supplier');
            $key_person = $this->input->post('key_person');
            $address = $this->input->post('address');
            $instruction = $this->input->post('instruction');
            $total_order = $this->input->post('total_order');
            
            // order data :
            $product_code = $this->input->post('product_code');
            $product_name = $this->input->post('product_name');
            $product_qty = $this->input->post('product_qty');
            $product_unit = $this->input->post('product_unit');
            $product_type = $this->input->post('product_type');
            $product_price = $this->input->post('product_price');
            $product_total = $this->input->post('product_total');
                        
            //$data = array('arr'=>$arr);
            //echo json_encode($data);    
            
            // set rules for form validation :
            
            // order meta data validation :
            $this->form_validation->set_rules('po_number', 'PO Number', 'required|numeric|is_unique[order_meta_data.po_number]');
            $this->form_validation->set_rules('po_date', 'PO Date', 'required');
            $this->form_validation->set_rules('supplier', 'Supplier', 'required');
            $this->form_validation->set_rules('key_person', 'Key Person', 'required');
            $this->form_validation->set_rules('total_order', 'Total Order', 'required|numeric');
            
            // order data validation :
            $this->form_validation->set_rules('product_code', 'Product Code', 'required|numeric');
            $this->form_validation->set_rules('product_name', 'Product Name', 'required');
            $this->form_validation->set_rules('product_qty', 'Product Quantity', 'required|numeric');
            $this->form_validation->set_rules('product_price', 'Product Price', 'required|numeric');
            $this->form_validation->set_rules('product_total', 'Product Total', 'required|numeric');
            
            // if the validation fails
            if($this->form_validation->run() == FALSE)
            {
                // set messeges for each error
                $po_number_error = form_error('po_number');
                $po_date_error = form_error('po_date');
                $supplier_error = form_error('supplier');
                $key_person_error = form_error('key_person');
                $total_order_error = form_error('total_order');
                $product_code_error = form_error('product_code');
                $product_name_error = form_error('product_name');
                $product_qty_error = form_error('product_qty');
                $product_price_error = form_error('product_price');
                $product_total_error = form_error('product_total');
                
                // set ajax data to order_form.php view, for debugging purposes
                $data = array('po_number_error'=>$po_number_error,
                              'po_date_error'=>$po_date_error,
                              'supplier_error'=>$supplier_error,
                              'key_person_error'=>$key_person_error,
                              'total_order_error'=>$total_order_error,
                              'product_code_error'=>$product_code_error, 
                              'product_name_error'=>$product_name_error,
                              'product_qty_error'=>$product_qty_error,
                              'product_price_error'=>$product_price_error,
                              'product_total_error'=>$product_total_error
                             );
                
                // send ajax data to order_form.php view as jason data
                echo json_encode($data);
            }
            // if all the validation went thru...
            else
            {
                // input order meta data to order_meta_data table
                // call order_save_meta_data() method to perform the operation
                $status = 'Order Sent';
                $input_meta_data = $this->order_save_meta_data($po_number, $po_date, $supplier, $key_person, $address, $instruction, $total_order, $status);
                
                // input order data to order_data table
                // call order_save_data() method to perform the operation
                for($i=0;$i<count($product_code);$i++)
                {
                    $insert_data = $this->order_save_data($po_number, $po_date, $product_code, $product_name, $product_qty, $product_unit, $product_type, $product_price, $product_total);
                }
                
                // if both operation above are succeeded
                // send the redirect location as ajax json data to order_form.php view
                if($insert_data && $input_meta_data)
                {
                    $base = base_url();
                    $location = $base . 'index.php/order/order_list';
                    $data = array('location' => $location);
                    echo json_encode($data);
                }
                
            }
                 
        }
        // end order_form_validation() method
        
        
               
        // start order_save_meta_data() method
        // method to save order meta data to order_meta_data table
        private function order_save_meta_data($po_number, $po_date, $supplier, $key_person, $address, $instruction, $total_order, $status)
        {
           $order_save_meta_data = $this->order_meta_data_model->save_meta_data($po_number, $po_date, $supplier, $key_person, $address, $instruction, $total_order, $status);
           return $order_save_meta_data;
        }
        // end order_save_meta_data() method
        
        
        
        // start order_save_data() method
        // method to save order data to order_data table
        private function order_save_data($po_number, $po_date, $product_code, $product_name, $product_qty, $product_unit, $product_type, $product_price, $product_total)
        {
           $order_save_data = $this->order_data_model->save_data($po_number, $po_date, $product_code, $product_name, $product_qty, $product_unit, $product_type, $product_price, $product_total); 
           return $order_save_data;
        }
        // end order_save_data() method
        
        
        
        
        // start order_list() method
        public function order_list()
        {
            $this->load->view('order-list');
        }
        //end order_list() method
     
    }
