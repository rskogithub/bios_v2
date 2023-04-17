<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class T_kes_lay_pasien_ranap extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('T_kes_lay_pasien_ranap_model');
        $this->load->library('form_validation');
        $this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template', 't_kes_lay_pasien_ranap/t_kes_lay_pasien_ranap_list');
    }

    public function json()
    {
        header('Content-Type: application/json');
        echo $this->T_kes_lay_pasien_ranap_model->json();
    }

    public function read($id)
    {
        $row = $this->T_kes_lay_pasien_ranap_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id' => $row->id,
                'tgl_transaksi' => $row->tgl_transaksi,
                'kode_kelas' => $row->kode_kelas,
                'jumlah' => $row->jumlah,
                'message' => $row->message,
                'user' => $row->user,
                'create_date' => $row->create_date,
            );
            $this->template->load('template', 't_kes_lay_pasien_ranap/t_kes_lay_pasien_ranap_read', $data);
        } else {
            $this->session->set_flashdata('warning', 'Record Not Found');
            redirect(site_url('t_kes_lay_pasien_ranap'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Kirim',
            'action' => site_url('t_kes_lay_pasien_ranap/create_action'),
            'id' => set_value('id'),
            'tgl_transaksi' => set_value('tgl_transaksi'),
            'kode_kelas' => set_value('kode_kelas'),
            'jumlah' => set_value('jumlah'),
            'message' => set_value('message'),
            'user' => set_value('user'),
            'create_date' => set_value('create_date'),
        );
        $this->template->load('template', 't_kes_lay_pasien_ranap/t_kes_lay_pasien_ranap_form', $data);
    }

    public function create_action()
    {
        $tanggal = date('Y-m-d', strtotime($this->input->post('tgl_transaksi', TRUE)));
        $data = array(
            'tgl_transaksi' => $tanggal,
            'kode_kelas' => $this->input->post('kode_kelas', TRUE),
            'jumlah' => $this->input->post('jumlah', TRUE),
        );
        $row = $this->T_kes_lay_pasien_ranap_model->get_by_param($tanggal, $this->input->post('kode_kelas', TRUE));
        if (($tanggal == $row->tgl_transaksi) && ($this->input->post('kode_kelas', TRUE))) {
            $this->T_kes_lay_pasien_ranap_model->update_kes_lay_pasien_ranap($data);
        } else {
            $this->T_kes_lay_pasien_ranap_model->insert_kes_lay_pasien_ranap($data);
        }
    }

    public function update($id)
    {
        $row = $this->T_kes_lay_pasien_ranap_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('t_kes_lay_pasien_ranap/update_action'),
                'id' => set_value('id', $row->id),
                'tgl_transaksi' => set_value('tgl_transaksi', $row->tgl_transaksi),
                'kode_kelas' => set_value('kode_kelas', $row->kode_kelas),
                'jumlah' => set_value('jumlah', $row->jumlah),
                'message' => set_value('message', $row->message),
                'user' => set_value('user', $row->user),
                'create_date' => set_value('create_date', $row->create_date),
            );
            $this->template->load('template', 't_kes_lay_pasien_ranap/t_kes_lay_pasien_ranap_form', $data);
        } else {
            $this->session->set_flashdata('warning', 'Record Not Found');
            redirect(site_url('t_kes_lay_pasien_ranap'));
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
            'kode_kelas' => $this->input->post('kode_kelas', TRUE),
            'jumlah' => $this->input->post('jumlah', TRUE),
            'message' => $this->input->post('message', TRUE),
            'user' => $this->input->post('user', TRUE),
            'create_date' => $this->input->post('create_date', TRUE),
        );

        $this->T_kes_lay_pasien_ranap_model->update($this->input->post('id', TRUE), $data);
        $this->session->set_flashdata('success', ' Update Record Success');
        redirect(site_url('t_kes_lay_pasien_ranap'));
        // }
    }

    public function delete($id)
    {
        $row = $this->T_kes_lay_pasien_ranap_model->get_by_id($id);

        if ($row) {
            $this->T_kes_lay_pasien_ranap_model->delete($id);
            $this->session->set_flashdata('success', ' Delete Record Success');
            redirect(site_url('t_kes_lay_pasien_ranap'));
        } else {
            $this->session->set_flashdata('warning', 'Record Not Found');
            redirect(site_url('t_kes_lay_pasien_ranap'));
        }
    }

    //     public function _rules()
    //     {

}

/* End of file T_kes_lay_pasien_ranap.php */