<?php

    /*
     *  Model that operates product_type table
     * 
     *  Method lists :
     * 
     *  1. get_all_data() =>
     * 
     */

    class Product_type_model extends CI_Model
    {
        
        // method to retrieve all data from product_type table
        public function get_all_data()
        {
            $query = $this->db->query('SELECT * FROM product_type');
            return $query->result();
        }
        // end get_all_data method
        
    }    