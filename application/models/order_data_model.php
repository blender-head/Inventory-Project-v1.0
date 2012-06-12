<?php
    
    /*
     *  Model that operates on order_data table 
     * 
     *  Method Lists :
     * 
     *  1. save_data() => method to save order meta data to order_data table
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
        // end save_data method
        
    }