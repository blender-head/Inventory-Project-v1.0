<?php

    class Products_model extends CI_Model
    {
        
        public function __construct() 
        {
            parent::__construct();
        }
		
	public function count_product()
	{
            $query = $this->db->query('SELECT COUNT(*) as count FROM products');
            return $query->result();
	}
		
	public function list_product()
	{
            $query = $this->db->query('SELECT * FROM products');
            return $query->result();
        }
        
        public function add_product($name, $number, $count, $vendor, $category, $description)
        {
            $query = $this->db->query("INSERT INTO products(product_name, product_number, product_count, product_vendor, product_category, product_description) VALUES ('$name', '$number', '$count', '$vendor', '$category', '$description')");
            return $query;
        }
        
        public function edit_product($id)
        {
            $query = $this->db->query("SELECT * FROM products WHERE product_id IN ('$id')");
            return $query->result();
        }
        
        public function update_product($id, $product_name, $product_number, $product_count, $product_vendor, $product_category, $product_description)
        {
            $query = $this->db->query("UPDATE products set 'product_name' = '$product_name', 'product_number' = '$product_number', 'product_count' = '$product_count', 
                                      'product_vendor' = '$product_vendor', 'product_category' = '$product_category', 'product_description' = '$product_description'
                                      WHERE id = '$id'");
            return $query->result();
        }
        
        public function delete_product()
        {
            
        }
        
    }