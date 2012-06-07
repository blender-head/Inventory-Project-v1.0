<?php

    class Manufacturer_model extends CI_Model
    {
        
        public function __construct()
        {
            parent::__construct();
        }
        
        public function list_manufacturer()
        {
            $query = $this->db->query('SELECT * FROM manufacturer');
            return $query->result();
        }
        
        public function add_vendor()
        {
            
        }
        
        public function edit_vendor()
        {
            
        }
        
        public function delete_vendor()
        {
            
        }
        
    }
