<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class T_kes_keu_saldo_dana_kelolaan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('T_kes_keu_saldo_dana_kelolaan_model');
        $this->load->library('form_validation');
        $this->load->library('datatables');
    }

    public function index()
    {
        $data = array(
            'data' => $this->T_kes_keu_saldo_dana_kelolaan_model->get_all(),
        );
        $this->template->load('template', 't_kes_keu_saldo_dana_kelolaan/t_kes_keu_saldo_dana_kelolaan_list', $data);
    }

    public function json()
    {
        header('Content-Type: application/json');
        echo $this->T_kes_keu_saldo_dana_kelolaan_model->json();
    }

    public function read($id)
    {
        $row = $this->T_kes_keu_saldo_dana_kelolaan_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id' => $row->id,
                'tgl_transaksi' => $row->tgl_transaksi,
                'kdbank' => $row->kdbank,
                'no_rekening' => $row->no_rekening,
                'saldo_akhir' => $row->saldo_akhir,
                'message' => $row->message,
                'user' => $row->user,
                'create_date' => $row->create_date,
            );
            $this->template->load('template', 't_kes_keu_saldo_dana_kelolaan/t_kes_keu_saldo_dana_kelolaan_read', $data);
        } else {
            $this->session->set_flashdata('warning', 'Record Not Found');
            redirect(site_url('t_kes_keu_saldo_dana_kelolaan'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Kirim',
            'action' => site_url('t_kes_keu_saldo_dana_kelolaan/create_action'),
            'id' => set_value('id'),
            'tgl_transaksi' => set_value('tgl_transaksi'),
            'kdbank' => set_value('kdbank'),
            'no_rekening' => set_value('no_rekening'),
            'saldo_akhir' => set_value('saldo_akhir'),
            'message' => set_value('message'),
            'user' => set_value('user'),
            'create_date' => set_value('create_date'),
            'get_bank' => $this->T_kes_keu_saldo_dana_kelolaan_model->get_bank(),
        );
        $this->template->load('template', 't_kes_keu_saldo_dana_kelolaan/t_kes_keu_saldo_dana_kelolaan_form', $data);
    }

    public function create_action()
    {
        $tanggal = date('Y-m-d', strtotime($this->input->post('tgl_transaksi', TRUE)));
        $data = array(
            'tgl_transaksi' => $tanggal,
            'kdbank' => $this->input->post('kdbank', TRUE),
            'no_rekening' => $this->input->post('no_rekening', TRUE),
            'saldo_akhir' => $this->input->post('saldo_akhir', TRUE),
        );
        $row = $this->T_kes_keu_saldo_dana_kelolaan_model->get_by_param($tanggal, $this->input->post('kdbank'), $this->input->post('no_rekening'));
        if (($tanggal == $row->tgl_transaksi) && ($this->input->post('kdbank') == $row->kdbank) && ($this->input->post('no_rekening') == $row->no_rekening)) {
            $this->T_kes_keu_saldo_dana_kelolaan_model->update_kes_keu_dana_kelolaan($data);
        } else {
            $this->T_kes_keu_saldo_dana_kelolaan_model->insert_kes_keu_dana_kelolaan($data);
        }
    }

    public function update($id)
    {
        $row = $this->T_kes_keu_saldo_dana_kelolaan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('t_kes_keu_saldo_dana_kelolaan/update_action'),
                'id' => set_value('id', $row->id),
                'tgl_transaksi' => set_value('tgl_transaksi', $row->tgl_transaksi),
                'kdbank' => set_value('kdbank', $row->kdbank),
                'no_rekening' => set_value('no_rekening', $row->no_rekening),
                'saldo_akhir' => set_value('saldo_akhir', $row->saldo_akhir),
                'message' => set_value('message', $row->message),
                'user' => set_value('user', $row->user),
                'create_date' => set_value('create_date', $row->create_date),
            );
            $this->template->load('template', 't_kes_keu_saldo_dana_kelolaan/t_kes_keu_saldo_dana_kelolaan_form', $data);
        } else {
            $this->session->set_flashdata('warning', 'Record Not Found');
            redirect(site_url('t_kes_keu_saldo_dana_kelolaan'));
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
            'kdbank' => $this->input->post('kdbank', TRUE),
            'no_rekening' => $this->input->post('no_rekening', TRUE),
            'saldo_akhir' => $this->input->post('saldo_akhir', TRUE),
            'message' => $this->input->post('message', TRUE),
            'user' => $this->input->post('user', TRUE),
            'create_date' => $this->input->post('create_date', TRUE),
        );

        $this->T_kes_keu_saldo_dana_kelolaan_model->update($this->input->post('id', TRUE), $data);
        $this->session->set_flashdata('success', ' Update Record Success');
        redirect(site_url('t_kes_keu_saldo_dana_kelolaan'));
        // }
    }

    public function delete($id)
    {
        $row = $this->T_kes_keu_saldo_dana_kelolaan_model->get_by_id($id);

        if ($row) {
            $this->T_kes_keu_saldo_dana_kelolaan_model->delete($id);
            $this->session->set_flashdata('success', ' Delete Record Success');
            redirect(site_url('t_kes_keu_saldo_dana_kelolaan'));
        } else {
            $this->session->set_flashdata('warning', 'Record Not Found');
            redirect(site_url('t_kes_keu_saldo_dana_kelolaan'));
        }
    }

    //     public function _rules()
    //     {

}

/* End of file T_kes_keu_saldo_dana_kelolaan.php */