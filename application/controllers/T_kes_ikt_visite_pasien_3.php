<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class T_kes_ikt_visite_pasien_3 extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('T_kes_ikt_visite_pasien_3_model');
        $this->load->library('form_validation');
        $this->load->library('datatables');
    }

    public function index()
    {
        $data = array(
            'data' => $this->T_kes_ikt_visite_pasien_3_model->get_all(),
        );

        $this->template->load('template', 't_kes_ikt_visite_pasien_3/t_kes_ikt_visite_pasien_3_list', $data);
    }

    public function json()
    {
        header('Content-Type: application/json');
        echo $this->T_kes_ikt_visite_pasien_3_model->json();
    }

    public function read($id)
    {
        $row = $this->T_kes_ikt_visite_pasien_3_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id' => $row->id,
                'tgl_transaksi' => $row->tgl_transaksi,
                'jumlah' => $row->jumlah,
                'message' => $row->message,
                'user' => $row->user,
                'create_date' => $row->create_date,
            );
            $this->template->load('template', 't_kes_ikt_visite_pasien_3/t_kes_ikt_visite_pasien_3_read', $data);
        } else {
            $this->session->set_flashdata('warning', 'Record Not Found');
            redirect(site_url('t_kes_ikt_visite_pasien_3'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Kirim',
            'action' => site_url('t_kes_ikt_visite_pasien_3/create_action'),
            'id' => set_value('id'),
            'tgl_transaksi' => set_value('tgl_transaksi'),
            'jumlah' => set_value('jumlah'),
            'message' => set_value('message'),
            'user' => set_value('user'),
            'create_date' => set_value('create_date'),
        );
        $this->template->load('template', 't_kes_ikt_visite_pasien_3/t_kes_ikt_visite_pasien_3_form', $data);
    }

    public function create_action()
    {
        $tanggal = date('Y-m-d', strtotime($this->input->post('tgl_transaksi', TRUE)));
        $data = array(
            'tgl_transaksi' => $tanggal,
            'jumlah' => $this->input->post('jumlah', TRUE),
        );
        $row = $this->T_kes_ikt_visite_pasien_3_model->get_by_param($tanggal);
        if (($tanggal == $row->tgl_transaksi)) {
            $this->T_kes_ikt_visite_pasien_3_model->update_kes_ikt_visite_pasien_3($data);
        } else {
            $this->T_kes_ikt_visite_pasien_3_model->insert_kes_ikt_visite_pasien_3($data);
        }
    }

    public function update($tgl_transaksi)
    {
        $row = $this->T_kes_ikt_visite_pasien_3_model->get_by_id($tgl_transaksi);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('t_kes_ikt_visite_pasien_3/update_action'),
                'id' => set_value('id', $row->id),
                'tgl_transaksi' => set_value('tgl_transaksi', $row->tgl_transaksi),
                'jumlah' => set_value('jumlah', $row->jumlah),
                'message' => set_value('message', $row->message),
                'user' => set_value('user', $row->user),
                'create_date' => set_value('create_date', $row->create_date),
            );
            $this->template->load('template', 't_kes_ikt_visite_pasien_3/t_kes_ikt_visite_pasien_3_form', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Data Tidak Tersedia</strong></div>');
            redirect(site_url('t_kes_ikt_visite_pasien_3'));
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
            'jumlah' => $this->input->post('jumlah', TRUE),
        );
        $this->T_kes_ikt_visite_pasien_3_model->update_kes_ikt_visite_pasien_3($data);
        // }
    }

    public function delete($id)
    {
        $row = $this->T_kes_ikt_visite_pasien_3_model->get_by_id($id);

        if ($row) {
            $this->T_kes_ikt_visite_pasien_3_model->delete($id);
            $this->session->set_flashdata('success', ' Delete Record Success');
            redirect(site_url('t_kes_ikt_visite_pasien_3'));
        } else {
            $this->session->set_flashdata('warning', 'Record Not Found');
            redirect(site_url('t_kes_ikt_visite_pasien_3'));
        }
    }

    //     public function _rules()
    //     {

}

/* End of file T_kes_ikt_visite_pasien_3.php */