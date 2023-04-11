<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_direktorat_model extends CI_Model
{

    public $table = 'm_direktorat';
    public $id = 'id_direktorat';
    public $order = 'DESC';
    

    // get all
        public function getAll()
        {
            $this->db->order_by($this->id, $this->order);
            return $this->db->get($this->table)->result();
        }

        public function getDetail($field,$value)
        {
            $this->db->where($field, $value);
            return $this->db->get($this->table)->result();
        }

}


/* End of file M_direktorat_model.php */
/* Location: ./application/models/M_direktorat_model.php */
/* Please DO NOT modify this information : */
/* Generated by Rifai | Codeigniter API Generator 2021-07-10 15:41:53 */
/* rifai.kre@gmail.com */