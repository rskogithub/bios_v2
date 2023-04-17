<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class T_kes_lay_pasien_igd extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('T_kes_lay_pasien_igd_model');
        $this->load->library('form_validation');
        $this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template', 't_kes_lay_pasien_igd/t_kes_lay_pasien_igd_list');
    }

    public function json()
    {
        header('Content-Type: application/json');
        echo $this->T_kes_lay_pasien_igd_model->json();
    }

    public function read($id)
    {
        $row = $this->T_kes_lay_pasien_igd_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id' => $row->id,
                'tgl_transaksi' => $row->tgl_transaksi,
                'jumlah' => $row->jumlah,
                'message' => $row->message,
                'user' => $row->user,
                'create_date' => $row->create_date,
            );
            $this->template->load('template', 't_kes_lay_pasien_igd/t_kes_lay_pasien_igd_read', $data);
        } else {
            $this->session->set_flashdata('warning', 'Record Not Found');
            redirect(site_url('t_kes_lay_pasien_igd'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('t_kes_lay_pasien_igd/create_action'),
            'id' => set_value('id'),
            'tgl_transaksi' => set_value('tgl_transaksi'),
            'jumlah' => set_value('jumlah'),
            'message' => set_value('message'),
            'user' => set_value('user'),
            'create_date' => set_value('create_date'),
        );
        $this->template->load('template', 't_kes_lay_pasien_igd/t_kes_lay_pasien_igd_form', $data);
    }

    public function create_action()
    {

        $tanggal = date('Y-m-d', strtotime($this->input->post('tgl_transaksi', TRUE)));
        $data = array(
            'tgl_transaksi' => $tanggal,
            'jumlah' => $this->input->post('jumlah', TRUE),
        );
        $row = $this->T_kes_lay_pasien_igd_model->get_by_param($tanggal);
        if (($tanggal == $row->tgl_transaksi) && $this->db->where('nama_poli', TRUE)) {
            $this->T_kes_lay_pasien_igd_model->update_kes_lay_pasien_igd($data);
        } else {
            $this->T_kes_lay_pasien_igd_model->insert_kes_lay_pasien_igd($data);
        }
    }

    public function update($id)
    {
        $row = $this->T_kes_lay_pasien_igd_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('t_kes_lay_pasien_igd/update_action'),
                'id' => set_value('id', $row->id),
                'tgl_transaksi' => set_value('tgl_transaksi', $row->tgl_transaksi),
                'jumlah' => set_value('jumlah', $row->jumlah),
                'message' => set_value('message', $row->message),
                'user' => set_value('user', $row->user),
                'create_date' => set_value('create_date', $row->create_date),
            );
            $this->template->load('template', 't_kes_lay_pasien_igd/t_kes_lay_pasien_igd_form', $data);
        } else {
            $this->session->set_flashdata('warning', 'Record Not Found');
            redirect(site_url('t_kes_lay_pasien_igd'));
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
            'jumlah' => $this->input->post('jumlah', TRUE),
            'message' => $this->input->post('message', TRUE),
            'user' => $this->input->post('user', TRUE),
            'create_date' => $this->input->post('create_date', TRUE),
        );

        $this->T_kes_lay_pasien_igd_model->update($this->input->post('id', TRUE), $data);
        $this->session->set_flashdata('success', ' Update Record Success');
        redirect(site_url('t_kes_lay_pasien_igd'));
        // }
    }

    public function delete($id)
    {
        $row = $this->T_kes_lay_pasien_igd_model->get_by_id($id);

        if ($row) {
            $this->T_kes_lay_pasien_igd_model->delete($id);
            $this->session->set_flashdata('success', ' Delete Record Success');
            redirect(site_url('t_kes_lay_pasien_igd'));
        } else {
            $this->session->set_flashdata('warning', 'Record Not Found');
            redirect(site_url('t_kes_lay_pasien_igd'));
        }
    }

    //     public function _rules()
    //     {

}

/* End of file T_kes_lay_pasien_igd.php */