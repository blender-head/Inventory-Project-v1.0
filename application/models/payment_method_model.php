<?php

    class Payment_method_model extends CI_Model
    {
        public function get_all_payment()
        {
            $query = $this->db->query('SELECT * FROM payment_method');
            return $query->result();
        }
    }
