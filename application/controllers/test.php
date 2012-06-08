<?php

    class Test extends CI_Controller
    {
        public function index()
        {
            $add_order = $this->input->post('add-order');
            $save = $this->input->post('save-order');
            
            if(isset($_POST))
            {
                if(count($add_order) == 1)
                {
                    $this->load->library('table');
                    $this->table->set_heading('Name', 'Color', 'Size');
                    $this->table->add_row('Fred', 'Blue', 'Small');
                    $this->table->add_row('Mary', 'Red', 'Large');
                    $this->table->add_row('John', 'Green', 'Medium');
                    echo $this->table->generate();
                }
            
                if($save)
                {
                    $this->load->library('table');
                    $this->table->add_row('Black', 'Red', 'Green');
                    echo $this->table->generate();
                }
            }
        }
    }
