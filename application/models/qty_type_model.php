<?php

    class Qty_type_model extends CI_Model
    {
        
        public function list_qty_type()
        {
            $query = $this->db->query('SELECT * FROM qty_type');
            return $query->result();
        }
        
    }