<?php

    /*
     *  Model that operates order_meta_data table
     * 
     *  Method Lists :
     * 
     *  1. save_meta_data() => method to save order meta data to order_meta_data table
     */

    class Order_meta_data_model extends CI_Model
    {
        
        //method to save order meta data to order_meta_data table
        public function save_meta_data($po_number, $po_date, $supplier, $key_person, $address, $instruction, $total_order, $status)
        {
            $query = $this->db->query("INSERT INTO order_meta_data (po_number, po_date, supplier, key_person, supplier_address, instructions, total_order, status)
                                       VALUE ('$po_number', '$po_date', '$supplier', '$key_person', '$address', '$instruction', '$total_order', '$status')");
            return $query;
        }
        // end save_meta_data method
        
        public function select_po_number($po_number)
        {
            $query = $this->db->query("SELECT po_number FROM order_meta_data WHERE po_number = $po_number");
            return $query->result();
        }
    }