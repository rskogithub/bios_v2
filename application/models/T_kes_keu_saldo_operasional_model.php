<?php

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Message;

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class T_kes_keu_saldo_operasional_model extends CI_Model
{

    public $table = 't_kes_keu_saldo_operasional';
    public $id = 'id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();

        $client = new Client();
        $response = $client->request(
            'POST',
            'https://bios.kemenkeu.go.id/api/token',
            [
                'form_params' => [
                    'satker' => '415670',
                    'key' => 'RzMss9waUcqzeCJ3D4PNYbCGfmq3ojdv'
                ]
            ]
        )->getBody()->getContents();
        $token = (json_decode($response, true));
        $get_token = $token['token'];

        $this->_client = new Client([
            'base_uri' => 'https://bios.kemenkeu.go.id/api/ws/',
            'headers' => [
                'Token' => $get_token,
            ]
        ]);
    }

    function get_bank()
    {
        $response = $this->_client->request('GET', 'ref/bank');
        $result = json_decode($response->getBody()->getContents(), true);
        return $result['data'];
    }

    function insert_kes_keu_saldo_operasional($data)
    {
        $response = $this->_client->request('POST', 'keuangan/saldo/saldo_operasional', [
            'form_params' => $data
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        $return_data = array(
            'tgl_transaksi' => $data['tgl_transaksi'],
            'kdbank' =>  $data['kdbank'],
            'no_rekening' =>  $data['no_rekening'],
            'unit' =>  $data['unit'],
            'saldo_akhir' =>  $data['saldo_akhir'],
            'message' => $result['message'],
            'user' => $this->session->userdata('nama'),
            'create_date' => date('Y-m-d H:i:s'),
        );
        // print_r($return_data);
        if ($result['status'] == 'MSG20003') {
            $this->db->insert($this->table, $return_data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> ' . $result['message'] . '</strong></div>');
            redirect(site_url('t_kes_keu_saldo_operasional'));
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true"><i class="fal fa-times"></i></span>
                    </button><strong> ' . $result['message'] . '</strong></div>');
            redirect(site_url('t_kes_keu_saldo_operasional'));
        }
        // return $result;
    }

    function update_kes_keu_saldo_operasional($data)
    {
        $response = $this->_client->request('POST', 'keuangan/saldo/saldo_operasional', [
            'form_params' => $data
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        $return_data = array(
            'tgl_transaksi' => $data['tgl_transaksi'],
            'kdbank' =>  $data['kdbank'],
            'no_rekening' =>  $data['no_rekening'],
            'unit' =>  $data['unit'],
            'saldo_akhir' =>  $data['saldo_akhir'],
            'message' => $result['message'],
            'user' => $this->session->userdata('nama'),
            'create_date' => date('Y-m-d H:i:s'),
        );
        // print_r($result);
        if ($result['status'] == 'MSG20003') {
            $this->db->where('tgl_transaksi', $data['tgl_transaksi']);
            $this->db->where('kdbank', $data['kdbank']);
            $this->db->where('no_rekening', $data['no_rekening']);
            $this->db->update($this->table, $return_data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> ' . $result['message'] . '</strong></div>');
            redirect(site_url('t_kes_keu_saldo_operasional'));
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true"><i class="fal fa-times"></i></span>
                    </button><strong> ' . $result['message'] . '</strong></div>');
            redirect(site_url('t_kes_keu_saldo_operasional'));
        }
        // return $result;
    }


    function get_by_param($tgl_transaksi, $kdbank, $no_rekening)
    {
        $this->db->where('tgl_transaksi', $tgl_transaksi);
        $this->db->where('kdbank', $kdbank);
        $this->db->where('no_rekening', $no_rekening);
        $this->db->group_by('tgl_transaksi');
        return $this->db->get($this->table)->row();
    }

    // get all
    // function get_all()
    // {
    //     $data = array(
    //         'tgl_transaksi' => '',
    //     );
    //     $response = $this->_client->request('POST', 'https://bios.kemenkeu.go.id/api/get/data/keuangan/saldo/saldo_operasional', [
    //         // 'debug' => true,
    //         'form_params' => $data
    //     ]);
    //     $result = json_decode($response->getBody()->getContents(), true);

    //     $hasil = $result['data']['datas'];
    //     return $hasil;
    // }

    // datatables
    function json()
    {
        $this->datatables->select('id,tgl_transaksi,kdbank,no_rekening,unit,saldo_akhir,message,user,create_date');
        $this->datatables->from('t_kes_keu_saldo_operasional');
        //add this line for join
        //$this->datatables->join('table2', 't_kes_keu_saldo_operasional.field = table2.field');
        // $this->datatables->add_column('action', anchor(site_url('t_kes_keu_saldo_operasional/read/$1'), '<i class="fal fa-eye" aria-hidden="true"></i>', array('class' => 'btn btn-info btn-xs')) . "
        //     " . anchor(site_url('t_kes_keu_saldo_operasional/update/$1'), '<i class="fal fa-pencil" aria-hidden="true"></i>', array('class' => 'btn btn-warning btn-xs')) . "
        //         " . anchor(site_url('t_kes_keu_saldo_operasional/delete/$1'), '<i class="fal fa-trash" aria-hidden="true"></i>', 'class="btn btn-danger btn-xs" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'id');
        return $this->datatables->generate();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($tgl_transaksi, $kdbank, $no_rekening)
    {
        $this->db->where('tgl_transaksi', $tgl_transaksi);
        $this->db->where('kdbank', $kdbank);
        $this->db->where('no_rekening', $no_rekening);
        return $this->db->get($this->table)->row();
    }
    // get total rows
    function total_rows($q = NULL)
    {
        $this->db->like('id', $q);
        $this->db->or_like('tgl_transaksi', $q);
        $this->db->or_like('kdbank', $q);
        $this->db->or_like('no_rekening', $q);
        $this->db->or_like('unit', $q);
        $this->db->or_like('saldo_akhir', $q);
        $this->db->or_like('message', $q);
        $this->db->or_like('user', $q);
        $this->db->or_like('create_date', $q);
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL)
    {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id', $q);
        $this->db->or_like('tgl_transaksi', $q);
        $this->db->or_like('kdbank', $q);
        $this->db->or_like('no_rekening', $q);
        $this->db->or_like('unit', $q);
        $this->db->or_like('saldo_akhir', $q);
        $this->db->or_like('message', $q);
        $this->db->or_like('user', $q);
        $this->db->or_like('create_date', $q);
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

/* End of file T_kes_keu_saldo_operasional_model.php */
/* Location: ./application/models/T_kes_keu_saldo_operasional_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2023-04-06 08:21:07 */
/* http://harviacode.com */