<?php

    /*
     *  Model that operates order_meta_data table
     * 
     *  Method Lists :
     * 
     *  1. save_meta_data() => method to save order meta data to order_meta_data table
     *  2. get_all_meta_data() => method to get data from order_meta_data table
     * 
     */

    class Order_meta_data_model extends CI_Model
    {
        
        // method to save order meta data to order_meta_data table
        public function save_meta_data($po_number, $po_date, $supplier, $key_person, $address, $instruction, $total_order, $status)
        {
            $query = $this->db->query("INSERT IGNORE INTO order_meta_data (po_number, po_date, supplier, key_person, supplier_address, instructions, total_order, status)
                                       VALUE ('$po_number', '$po_date', '$supplier', '$key_person', '$address', '$instruction', '$total_order', '$status')");
            return $query;
        }
        // end save_meta_data method
        
        
        // method to retrieve data from order_meta_data_table
        public function get_all_meta_data()
        {
           $query = $this->db->query("SELECT DISTINCT * FROM order_meta_data");
           return $query->result();
        }
        // end get_meta_data method
        
        public function get_total_order($po_number)
        {
            $query = $this->db->query("SELECT total_order FROM order_meta_data WHERE po_number = '$po_number'");
            return $query->result();
        }
        
    }