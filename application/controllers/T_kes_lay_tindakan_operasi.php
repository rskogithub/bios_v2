<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class T_kes_lay_tindakan_operasi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('T_kes_lay_tindakan_operasi_model');
        $this->load->library('form_validation');
        $this->load->library('datatables');
    }

    public function index()
    {
        $data = array(
            'data' => $this->T_kes_lay_tindakan_operasi_model->get_all(),
        );

        $this->template->load('template', 't_kes_lay_tindakan_operasi/t_kes_lay_tindakan_operasi_list', $data);
    }

    public function json()
    {
        header('Content-Type: application/json');
        echo $this->T_kes_lay_tindakan_operasi_model->json();
    }

    public function read($id)
    {
        $row = $this->T_kes_lay_tindakan_operasi_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id' => $row->id,
                'tgl_transaksi' => $row->tgl_transaksi,
                'klasifikasi_operasi' => $row->klasifikasi_operasi,
                'jumlah' => $row->jumlah,
                'message' => $row->message,
                'user' => $row->user,
                'create_date' => $row->create_date,
            );
            $this->template->load('template', 't_kes_lay_tindakan_operasi/t_kes_lay_tindakan_operasi_read', $data);
        } else {
            $this->session->set_flashdata('warning', 'Record Not Found');
            redirect(site_url('t_kes_lay_tindakan_operasi'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Kirim',
            'action' => site_url('t_kes_lay_tindakan_operasi/create_action'),
            'id' => set_value('id'),
            'tgl_transaksi' => set_value('tgl_transaksi'),
            'klasifikasi_operasi' => set_value('klasifikasi_operasi'),
            'jumlah' => set_value('jumlah'),
            'message' => set_value('message'),
            'user' => set_value('user'),
            'create_date' => set_value('create_date'),
        );
        $this->template->load('template', 't_kes_lay_tindakan_operasi/t_kes_lay_tindakan_operasi_form', $data);
    }

    public function create_action()
    {
        $tanggal = date('Y-m-d', strtotime($this->input->post('tgl_transaksi', TRUE)));
        $data = array(
            'tgl_transaksi' => $tanggal,
            'klasifikasi_operasi' => $this->input->post('klasifikasi_operasi', TRUE),
            'jumlah' => $this->input->post('jumlah', TRUE),
        );
        $row = $this->T_kes_lay_tindakan_operasi_model->get_by_param($tanggal, $this->input->post('klasifikasi_operasi', TRUE));
        if (($tanggal == $row->tgl_transaksi) && ($this->input->post('klasifikasi_operasi', TRUE))) {
            $this->T_kes_lay_tindakan_operasi_model->update_kes_lay_tindakan_operasi($data);
        } else {
            $this->T_kes_lay_tindakan_operasi_model->insert_kes_lay_tindakan_operasi($data);
        }
    }


    public function update($tgl_transaksi, $klasifikasi_operasi)
    {
        $row = $this->T_kes_lay_tindakan_operasi_model->get_by_id($tgl_transaksi, $klasifikasi_operasi);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('t_kes_lay_tindakan_operasi/update_action'),
                'id' => set_value('id', $row->id),
                'tgl_transaksi' => set_value('tgl_transaksi', $row->tgl_transaksi),
                'klasifikasi_operasi' => set_value('klasifikasi_operasi', $row->klasifikasi_operasi),
                'jumlah' => set_value('jumlah', $row->jumlah),
                'message' => set_value('message', $row->message),
                'user' => set_value('user', $row->user),
                'create_date' => set_value('create_date', $row->create_date),
            );
            $this->template->load('template', 't_kes_lay_tindakan_operasi/t_kes_lay_tindakan_operasi_form', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Data Tidak Tersedia</strong></div>');
            redirect(site_url('t_kes_lay_tindakan_operasi'));
        }
    }

    public function update_action()
    {
        // $this->_rules();

        // if ($this->form_validation->run() == FALSE) {
        //     $this->update($this->input->post('id', TRUE));
        // } else {
        $tanggal = date('Y-m-d', strtotime($this->input->post('tgl_transaksi', TRUE)));
        $data = array(
            'tgl_transaksi' => $tanggal,
            'klasifikasi_operasi' => $this->input->post('klasifikasi_operasi', TRUE),
            'jumlah' => $this->input->post('jumlah', TRUE),
        );
        $this->T_kes_lay_tindakan_operasi_model->update_kes_lay_tindakan_operasi($data);
        // }
    }

    public function delete($id)
    {
        $row = $this->T_kes_lay_tindakan_operasi_model->get_by_id($id);

        if ($row) {
            $this->T_kes_lay_tindakan_operasi_model->delete($id);
            $this->session->set_flashdata('success', ' Delete Record Success');
            redirect(site_url('t_kes_lay_tindakan_operasi'));
        } else {
            $this->session->set_flashdata('warning', 'Record Not Found');
            redirect(site_url('t_kes_lay_tindakan_operasi'));
        }
    }

    //     public function _rules()
    //     {

}

/* End of file T_kes_lay_tindakan_operasi.php */