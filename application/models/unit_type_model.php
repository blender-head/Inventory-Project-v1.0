<?php

    /*
     *  Model Class that operates on unit_type table
     * 
     *  Method list :
     *  
     *  1. get_all_data() =>  function to retrieve all data from the table
     *
     * 
     */

    class Unit_type_model extends CI_Model
    {
        
        // method to retrieve all data from the table
        public function get_all_data()
        {
            $query = $this->db->query('SELECT * FROM unit_type');
            return $query->result();
        }
        //end get_all_data method
    }