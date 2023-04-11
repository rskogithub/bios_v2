<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_poly_model extends CI_Model
{

    public $table = 'm_poly';
    public $id = 'kode';
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

        public function create($data)
        {
            $this->db->insert($this->table, $data);
            return array('status' => 201, 'message' => 'Data berhasil dibuat');
        }

        public function update($data, $id)
        {
            $this->db->where($this->id, $id)->update($this->table, $data);
            return array('status' => 201, 'message' => 'Data berhasil diupdate');
        }

        public function delete($id)
        {
            $this->db->where($this->id, $id)->delete($this->table);
            //return array('status' => 201, 'message' => 'Data has been deleted');
            if ($this->db->affected_rows() > 0) {
                return array('status' => 201, 'message' => 'Data berhasil dihapus');
            } else {
                return array('status' => 201, 'message' => 'Data tidak tersedia');
            }
        }

}


/* End of file M_poly_model.php */
/* Location: ./application/models/M_poly_model.php */
/* Please DO NOT modify this information : */
/* Generated by Rifai | Codeigniter API Generator 2021-07-16 14:38:53 */
/* rifai.kre@gmail.com */