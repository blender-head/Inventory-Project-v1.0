<?php

    class Products extends CI_Controller 
    {
        
        public function index() 
        {
            $query = $this->products_model->list_product();
            $count = $this->products_model->count_product();
			
            if(($query > 0) && ($count > 0))
            {
                $data['records'] = $query;	
		$data['count'] = $count;
            }
            else
            {
                $data['records'] = 0;	
                $data['count'] = 0;
            }
			
            $this->load->view('product_index', $data);
			
        }
        
        /*
         * Function to add a product 
         */
        public function add() 
        {
            //query the product_type, qty_type and manufacturer tables
            //we need the data to populate the forms
            $query_product_type = $this->product_type_model->list_product_type();
            $query_qty_type = $this->qty_type_model->list_qty_type;
            $query_manufacturer = $this->manufacturer_model->list_manufacturer();
            
            if(($query_product_type > 0) && ($query_qty_type > 0) && ($query_manufacturer > 0))
            {
                $data['product_type'] = $query_product_type;
                $data['qty_type'] = $$query_qty_type;
                $data['manufacturer'] = $query_manufacturer;
            }
                      
            $number = $this->input->post('product-number');
            $name = $this->input->post('product-name');
            $count = $this->input->post('product-count');
            $cat = $this->input->post('product-category');
            $vendor = $this->input->post('product-vendor');
            $desc = $this->input->post('product-description');
            
            $this->load->library('form_validation');
            $this->form_validation->set_rules('product-name', 'Product Name', 'required');
            $this->form_validation->set_rules('product-number', 'Product Number', 'required|numeric|is_unique[products.product_number]');
            $this->form_validation->set_rules('product-count', 'Product Count', 'required|numeric');
            
            
            if ($this->form_validation->run() == FALSE)
            {
                $data['errors'] = validation_errors();
                $this->load->view('product_add', $data);
            }
            else
            {

                $query = $this->products_model->add_product($name,$number, $count, $vendor,$cat,$desc);
                header('Location: http://localhost/alkes') ;

            }
                        
        }
        //end add function
        
        
        public function edit($id)
        {
            
            $query = $this->products_model->edit_product($id);
            
            if($query > 0)
            {
                foreach($query as $row)
                {
                    $data['product_id'] = $row->product_id;
                    $data['product_name'] = $row->product_name;
                    $data['product_number'] = $row->product_number;
                    $data['product_count'] = $row->product_count;
                    $data['product_category'] = $row->product_category;
                    $data['product_vendor'] = $row->product_vendor;
                    $data['product_description'] = $row->product_description;
                }
                
                $this->load->view('product_edit', $data);
            }
        }
        
        public function update() 
        {
                        
            $name = $this->input->post('product-name');
            $number = $this->input->post('product-number');
            $count = $this->input->post('product-count');
            $cat = $this->input->post('product-category');
            $vendor = $this->input->post('product-vendor');
            $desc = $this->input->post('product-description');
            
            $this->load->library('form_validation');
            $this->form_validation->set_rules('product-name', 'Product Name', 'required');
            $this->form_validation->set_rules('product-number', 'Product Number', 'required|numeric|is_unique[products.product_number]');
            $this->form_validation->set_rules('product-count', 'Product Count', 'required|numeric');
            
            if ($this->form_validation->run() == FALSE)
            {
                $data['errors'] = validation_errors();
                $this->load->view('product_add', $data);
            }
            else
            {

                $this->load->model('products_model');
                $query = $this->products_model->add_product($name,$number, $count, $vendor,$cat,$desc);
                header( 'Location: http://localhost/alkes' ) ;

            }
        }
        
        public function delete()
        {
            
        }
        
    }