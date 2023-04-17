<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class T_kes_lay_alos extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('T_kes_lay_alos_model');
        $this->load->library('form_validation');
        $this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template', 't_kes_lay_alos/t_kes_lay_alos_list');
    }

    public function json()
    {
        header('Content-Type: application/json');
        echo $this->T_kes_lay_alos_model->json();
    }

    public function read($id)
    {
        $row = $this->T_kes_lay_alos_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id' => $row->id,
                'tgl_transaksi' => $row->tgl_transaksi,
                'alos' => $row->alos,
                'message' => $row->message,
                'user' => $row->user,
                'create_date' => $row->create_date,
            );
            $this->template->load('template', 't_kes_lay_alos/t_kes_lay_alos_read', $data);
        } else {
            $this->session->set_flashdata('warning', 'Record Not Found');
            redirect(site_url('t_kes_lay_alos'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Kirim',
            'action' => site_url('t_kes_lay_alos/create_action'),
            'id' => set_value('id'),
            'tgl_transaksi' => set_value('tgl_transaksi'),
            'alos' => set_value('alos'),
            'message' => set_value('message'),
            'user' => set_value('user'),
            'create_date' => set_value('create_date'),
        );
        $this->template->load('template', 't_kes_lay_alos/t_kes_lay_alos_form', $data);
    }

    public function create_action()
    {
        $tanggal = date('Y-m-d', strtotime($this->input->post('tgl_transaksi', TRUE)));
        $data = array(
            'tgl_transaksi' => $tanggal,
            'alos' => $this->input->post('alos', TRUE),
        );
        $row = $this->T_kes_lay_alos_model->get_by_param($tanggal);
        if (($tanggal == $row->tgl_transaksi)) {
            $this->T_kes_lay_alos_model->update_kes_lay_alos($data);
        } else {
            $this->T_kes_lay_alos_model->insert_kes_lay_alos($data);
        }
    }

    public function update($id)
    {
        $row = $this->T_kes_lay_alos_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('t_kes_lay_alos/update_action'),
                'id' => set_value('id', $row->id),
                'tgl_transaksi' => set_value('tgl_transaksi', $row->tgl_transaksi),
                'alos' => set_value('alos', $row->alos),
                'message' => set_value('message', $row->message),
                'user' => set_value('user', $row->user),
                'create_date' => set_value('create_date', $row->create_date),
            );
            $this->template->load('template', 't_kes_lay_alos/t_kes_lay_alos_form', $data);
        } else {
            $this->session->set_flashdata('warning', 'Record Not Found');
            redirect(site_url('t_kes_lay_alos'));
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
            'alos' => $this->input->post('alos', TRUE),
            'message' => $this->input->post('message', TRUE),
            'user' => $this->input->post('user', TRUE),
            'create_date' => $this->input->post('create_date', TRUE),
        );

        $this->T_kes_lay_alos_model->update($this->input->post('id', TRUE), $data);
        $this->session->set_flashdata('success', ' Update Record Success');
        redirect(site_url('t_kes_lay_alos'));
        // }
    }

    public function delete($id)
    {
        $row = $this->T_kes_lay_alos_model->get_by_id($id);

        if ($row) {
            $this->T_kes_lay_alos_model->delete($id);
            $this->session->set_flashdata('success', ' Delete Record Success');
            redirect(site_url('t_kes_lay_alos'));
        } else {
            $this->session->set_flashdata('warning', 'Record Not Found');
            redirect(site_url('t_kes_lay_alos'));
        }
    }

    //     public function _rules()
    //     {

}

/* End of file T_kes_lay_alos.php */