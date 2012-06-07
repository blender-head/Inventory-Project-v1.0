<?php

    class Dynamic_row_model extends CI_Model
    {
        
        public function get_row()
        {
            $query = $this->db->query('SELECT * FROM dynamic_row');
            return $query->result();
        }
        
    }
