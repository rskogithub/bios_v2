<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Rasio_roa_model extends CI_Model
{

    public $table = 'rasio_roa';
    public $id = 'no_id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() {
        $this->datatables->select('no_id,kode,tanggal,roa_surplus_defisit,roa_tot_aset,total_roa');
        $this->datatables->from('rasio_roa');
        //add this line for join
        //$this->datatables->join('table2', 'rasio_roa.field = table2.field');
        $this->datatables->add_column('action', anchor(site_url('rasio_roa/read/$1'),'<i class="fal fa-eye" aria-hidden="true"></i>', array('class' => 'btn btn-info btn-xs'))." 
            ".anchor(site_url('rasio_roa/update/$1'),'<i class="fal fa-pencil" aria-hidden="true"></i>', array('class' => 'btn btn-warning btn-xs'))." 
                ".anchor(site_url('rasio_roa/delete/$1'),'<i class="fal fa-trash" aria-hidden="true"></i>','class="btn btn-danger btn-xs" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'no_id');
        return $this->datatables->generate();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('no_id', $q);
	$this->db->or_like('kode', $q);
	$this->db->or_like('tanggal', $q);
	$this->db->or_like('roa_surplus_defisit', $q);
	$this->db->or_like('roa_tot_aset', $q);
	$this->db->or_like('total_roa', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('no_id', $q);
	$this->db->or_like('kode', $q);
	$this->db->or_like('tanggal', $q);
	$this->db->or_like('roa_surplus_defisit', $q);
	$this->db->or_like('roa_tot_aset', $q);
	$this->db->or_like('total_roa', $q);
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

}

/* End of file Rasio_roa_model.php */
/* Location: ./application/models/Rasio_roa_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2023-10-20 03:28:48 */
/* http://harviacode.com */