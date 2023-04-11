<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class T_kes_keu_saldo_pengelolaan_kas extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('T_kes_keu_saldo_pengelolaan_kas_model');
        $this->load->library('form_validation');
        $this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template', 't_kes_keu_saldo_pengelolaan_kas/t_kes_keu_saldo_pengelolaan_kas_list');
    }

    public function json()
    {
        header('Content-Type: application/json');
        echo $this->T_kes_keu_saldo_pengelolaan_kas_model->json();
    }

    public function read($id)
    {
        $row = $this->T_kes_keu_saldo_pengelolaan_kas_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id' => $row->id,
                'tgl_transaksi' => $row->tgl_transaksi,
                'kdbank' => $row->kdbank,
                'no_bilyet' => $row->no_bilyet,
                'nilai_deposito' => $row->nilai_deposito,
                'nilai_bunga' => $row->nilai_bunga,
                'message' => $row->message,
                'user' => $row->user,
                'create_date' => $row->create_date,
            );
            $this->template->load('template', 't_kes_keu_saldo_pengelolaan_kas/t_kes_keu_saldo_pengelolaan_kas_read', $data);
        } else {
            $this->session->set_flashdata('warning', 'Record Not Found');
            redirect(site_url('t_kes_keu_saldo_pengelolaan_kas'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Kirim',
            'action' => site_url('t_kes_keu_saldo_pengelolaan_kas/create_action'),
            'id' => set_value('id'),
            'tgl_transaksi' => set_value('tgl_transaksi'),
            'kdbank' => set_value('kdbank'),
            'no_bilyet' => set_value('no_bilyet'),
            'nilai_deposito' => set_value('nilai_deposito'),
            'nilai_bunga' => set_value('nilai_bunga'),
            'message' => set_value('message'),
            'user' => set_value('user'),
            'create_date' => set_value('create_date'),
            'get_bank' => $this->T_kes_keu_saldo_pengelolaan_kas_model->get_bank(),
        );
        $this->template->load('template', 't_kes_keu_saldo_pengelolaan_kas/t_kes_keu_saldo_pengelolaan_kas_form', $data);
    }

    public function create_action()
    {
        $tanggal = date('Y-m-d', strtotime($this->input->post('tgl_transaksi', TRUE)));
        $data = array(
            'tgl_transaksi' => $tanggal,
            'kdbank' => $this->input->post('kdbank', TRUE),
            'no_bilyet' => $this->input->post('no_bilyet', TRUE),
            'nilai_deposito' => $this->input->post('nilai_deposito', TRUE),
            'nilai_bunga' => $this->input->post('nilai_bunga', TRUE),
        );

        $row = $this->T_kes_keu_saldo_pengelolaan_kas_model->get_by_param($tanggal, $this->input->post('kdbank'), $this->input->post('no_bilyet'));
        if (($tanggal == $row->tgl_transaksi) && ($this->input->post('kdbank') == $row->kdbank) && ($this->input->post('no_bilyet') == $row->no_bilyet)) {
            $this->T_kes_keu_saldo_pengelolaan_kas_model->update_kes_keu_pengelolaan_kas($data);
        } else {
            $this->T_kes_keu_saldo_pengelolaan_kas_model->insert_kes_keu_pengelolaan_kas($data);
        }
    }

    public function update($id)
    {
        $row = $this->T_kes_keu_saldo_pengelolaan_kas_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('t_kes_keu_saldo_pengelolaan_kas/update_action'),
                'id' => set_value('id', $row->id),
                'tgl_transaksi' => set_value('tgl_transaksi', $row->tgl_transaksi),
                'kdbank' => set_value('kdbank', $row->kdbank),
                'no_bilyet' => set_value('no_bilyet', $row->no_bilyet),
                'nilai_deposito' => set_value('nilai_deposito', $row->nilai_deposito),
                'nilai_bunga' => set_value('nilai_bunga', $row->nilai_bunga),
                'message' => set_value('message', $row->message),
                'user' => set_value('user', $row->user),
                'create_date' => set_value('create_date', $row->create_date),
            );
            $this->template->load('template', 't_kes_keu_saldo_pengelolaan_kas/t_kes_keu_saldo_pengelolaan_kas_form', $data);
        } else {
            $this->session->set_flashdata('warning', 'Record Not Found');
            redirect(site_url('t_kes_keu_saldo_pengelolaan_kas'));
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
            'no_bilyet' => $this->input->post('no_bilyet', TRUE),
            'nilai_deposito' => $this->input->post('nilai_deposito', TRUE),
            'nilai_bunga' => $this->input->post('nilai_bunga', TRUE),
            'message' => $this->input->post('message', TRUE),
            'user' => $this->input->post('user', TRUE),
            'create_date' => $this->input->post('create_date', TRUE),
        );

        $this->T_kes_keu_saldo_pengelolaan_kas_model->update($this->input->post('id', TRUE), $data);
        $this->session->set_flashdata('success', ' Update Record Success');
        redirect(site_url('t_kes_keu_saldo_pengelolaan_kas'));
        // }
    }

    public function delete($id)
    {
        $row = $this->T_kes_keu_saldo_pengelolaan_kas_model->get_by_id($id);

        if ($row) {
            $this->T_kes_keu_saldo_pengelolaan_kas_model->delete($id);
            $this->session->set_flashdata('success', ' Delete Record Success');
            redirect(site_url('t_kes_keu_saldo_pengelolaan_kas'));
        } else {
            $this->session->set_flashdata('warning', 'Record Not Found');
            redirect(site_url('t_kes_keu_saldo_pengelolaan_kas'));
        }
    }

    //     public function _rules()
    //     {

}

/* End of file T_kes_keu_saldo_pengelolaan_kas.php */