<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Master_rasio_model extends CI_Model
{

    public $table = 'master_rasio';
    public $id = 'id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() {
        $this->datatables->select('id,tanggal,kode,indikator,rasio,data,rumus,target');
        $this->datatables->from('master_rasio');
        //add this line for join
        //$this->datatables->join('table2', 'master_rasio.field = table2.field');
        $this->datatables->add_column('action', anchor(site_url('master_rasio/read/$1'),'<i class="fal fa-eye" aria-hidden="true"></i>', array('class' => 'btn btn-info btn-xs'))." 
            ".anchor(site_url('master_rasio/update/$1'),'<i class="fal fa-pencil" aria-hidden="true"></i>', array('class' => 'btn btn-warning btn-xs'))." 
                ".anchor(site_url('master_rasio/delete/$1'),'<i class="fal fa-trash" aria-hidden="true"></i>','class="btn btn-danger btn-xs" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'id');
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
        $this->db->like('id', $q);
	$this->db->or_like('tanggal', $q);
	$this->db->or_like('kode', $q);
	$this->db->or_like('indikator', $q);
	$this->db->or_like('rasio', $q);
	$this->db->or_like('data', $q);
	$this->db->or_like('rumus', $q);
	$this->db->or_like('target', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id', $q);
	$this->db->or_like('tanggal', $q);
	$this->db->or_like('kode', $q);
	$this->db->or_like('indikator', $q);
	$this->db->or_like('rasio', $q);
	$this->db->or_like('data', $q);
	$this->db->or_like('rumus', $q);
	$this->db->or_like('target', $q);
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

/* End of file Master_rasio_model.php */
/* Location: ./application/models/Master_rasio_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2023-10-18 10:29:23 */
/* http://harviacode.com */