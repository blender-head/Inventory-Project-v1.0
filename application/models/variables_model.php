<?php

    class Variables_model extends CI_Model
    {
        
        public function save_row_variable($row)
        {
           $query = $this->db->query("INSERT INTO variables (variables) VALUE ('$row')");
           return $query;           
        }
        
        public function load_row_variable()
        {
           $query = $this->db->query('SELECT variables FROM variables');
           return $query->result();           
        }
        
    }
