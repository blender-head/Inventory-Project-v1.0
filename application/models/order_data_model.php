<?php
    
    /*
     *  Model that operates on order_data table 
     * 
     *  Method Lists :
     * 
     *  1. save_data() => method to save order meta data to order_data table
     *  2. get_data($po_number) => method to retrieve order data based on po_number
     */

    class Order_data_model extends CI_Model
    {
        
        //method to save order meta data to order_meta_data table
        public function save_data($po_number, $po_date, $product_code, $product_name, $product_count, $unit_type, $product_type, $buy_price, $product_total)
        {
            $query = $this->db->query("INSERT INTO order_data (po_number, po_date, product_number, product_name, product_count, unit_type, product_type, buy_price, product_total)
                                       VALUES ('$po_number', '$po_date', '$product_code', '$product_name', '$product_count', '$unit_type', '$product_type', '$buy_price', '$product_total')");
            return $query;
        }
        // end save_data() method
        
        
        
        //method to retrieve order data based on po_number
        public function get_data($po_number)
        {
            $query = $this->db->query("SELECT * FROM order_data 
                                       JOIN unit_type ON order_data.unit_type = unit_type.unit_id 
                                       JOIN product_type ON order_data.product_type = product_type.product_type_id
                                       WHERE po_number = '$po_number' ORDER BY order_data.product_type ASC");
            return $query->result();
        }
        // end get_data() method
        
    }