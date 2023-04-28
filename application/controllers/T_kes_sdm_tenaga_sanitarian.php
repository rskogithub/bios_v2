<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class T_kes_sdm_tenaga_sanitarian extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('T_kes_sdm_tenaga_sanitarian_model');
        $this->load->library('form_validation');
        $this->load->library('datatables');
    }

    public function index()
    {
        $data = array(
            'data' => $this->T_kes_sdm_tenaga_sanitarian_model->get_all(),
        );
        $this->template->load('template', 't_kes_sdm_tenaga_sanitarian/t_kes_sdm_tenaga_sanitarian_list', $data);
    }

    public function json()
    {
        header('Content-Type: application/json');
        echo $this->T_kes_sdm_tenaga_sanitarian_model->json();
    }

    public function read($id)
    {
        $row = $this->T_kes_sdm_tenaga_sanitarian_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id' => $row->id,
                'tgl_transaksi' => $row->tgl_transaksi,
                'pns' => $row->pns,
                'pppk' => $row->pppk,
                'anggota' => $row->anggota,
                'non_pns_tetap' => $row->non_pns_tetap,
                'kontrak' => $row->kontrak,
                'message' => $row->message,
                'user' => $row->user,
                'create_date' => $row->create_date,
            );
            $this->template->load('template', 't_kes_sdm_tenaga_sanitarian/t_kes_sdm_tenaga_sanitarian_read', $data);
        } else {
            $this->session->set_flashdata('warning', 'Record Not Found');
            redirect(site_url('t_kes_sdm_tenaga_sanitarian'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Kirim',
            'action' => site_url('t_kes_sdm_tenaga_sanitarian/create_action'),
            'id' => set_value('id'),
            'tgl_transaksi' => set_value('tgl_transaksi'),
            'pns' => set_value('pns'),
            'pppk' => set_value('pppk'),
            'anggota' => set_value('anggota'),
            'non_pns_tetap' => set_value('non_pns_tetap'),
            'kontrak' => set_value('kontrak'),
            'message' => set_value('message'),
            'user' => set_value('user'),
            'create_date' => set_value('create_date'),
        );
        $this->template->load('template', 't_kes_sdm_tenaga_sanitarian/t_kes_sdm_tenaga_sanitarian_form', $data);
    }

    public function create_action()
    {
        $tanggal = date('Y-m-d', strtotime($this->input->post('tgl_transaksi', TRUE)));
        $data = array(
            'tgl_transaksi' => $tanggal,
            'pns' => $this->input->post('pns', TRUE),
            'pppk' => $this->input->post('pppk', TRUE),
            'anggota' => $this->input->post('anggota', TRUE),
            'non_pns_tetap' => $this->input->post('non_pns_tetap', TRUE),
            'kontrak' => $this->input->post('kontrak', TRUE),
        );

        $row = $this->T_kes_sdm_tenaga_sanitarian_model->get_by_param($tanggal);
        if (($tanggal == $row->tgl_transaksi)) {
            $this->T_kes_sdm_tenaga_sanitarian_model->update_kes_sdm_tenaga_sanitarian($data);
        } else {
            $this->T_kes_sdm_tenaga_sanitarian_model->insert_kes_sdm_tenaga_sanitarian($data);
        }
    }

    public function update($id)
    {
        $row = $this->T_kes_sdm_tenaga_sanitarian_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('t_kes_sdm_tenaga_sanitarian/update_action'),
                'id' => set_value('id', $row->id),
                'tgl_transaksi' => set_value('tgl_transaksi', $row->tgl_transaksi),
                'pns' => set_value('pns', $row->pns),
                'pppk' => set_value('pppk', $row->pppk),
                'anggota' => set_value('anggota', $row->anggota),
                'non_pns_tetap' => set_value('non_pns_tetap', $row->non_pns_tetap),
                'kontrak' => set_value('kontrak', $row->kontrak),
                'message' => set_value('message', $row->message),
                'user' => set_value('user', $row->user),
                'create_date' => set_value('create_date', $row->create_date),
            );
            $this->template->load('template', 't_kes_sdm_tenaga_sanitarian/t_kes_sdm_tenaga_sanitarian_form', $data);
        } else {
            $this->session->set_flashdata('warning', 'Record Not Found');
            redirect(site_url('t_kes_sdm_tenaga_sanitarian'));
        }
    }

    public function update_action()
    {
        // $this->_rules();

        // if ($this->form_validation->run() == FALSE) {
        //     $this->update($this->input->post('id', TRUE));
        // } else {
        $data = array(
            'tgl_transaksi' => $this->input->post('tgl_transaksi', TRUE),
            'pns' => $this->input->post('pns', TRUE),
            'pppk' => $this->input->post('pppk', TRUE),
            'anggota' => $this->input->post('anggota', TRUE),
            'non_pns_tetap' => $this->input->post('non_pns_tetap', TRUE),
            'kontrak' => $this->input->post('kontrak', TRUE),
            'message' => $this->input->post('message', TRUE),
            'user' => $this->input->post('user', TRUE),
            'create_date' => $this->input->post('create_date', TRUE),
        );

        $this->T_kes_sdm_tenaga_sanitarian_model->update($this->input->post('id', TRUE), $data);
        $this->session->set_flashdata('success', ' Update Record Success');
        redirect(site_url('t_kes_sdm_tenaga_sanitarian'));
        // }
    }

    public function delete($id)
    {
        $row = $this->T_kes_sdm_tenaga_sanitarian_model->get_by_id($id);

        if ($row) {
            $this->T_kes_sdm_tenaga_sanitarian_model->delete($id);
            $this->session->set_flashdata('success', ' Delete Record Success');
            redirect(site_url('t_kes_sdm_tenaga_sanitarian'));
        } else {
            $this->session->set_flashdata('warning', 'Record Not Found');
            redirect(site_url('t_kes_sdm_tenaga_sanitarian'));
        }
    }

    //     public function _rules()
    //     {

}

/* End of file T_kes_sdm_tenaga_sanitarian.php */