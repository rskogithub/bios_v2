<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class T_kes_lay_bto extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('T_kes_lay_bto_model');
        $this->load->library('form_validation');
        $this->load->library('datatables');
    }

    public function index()
    {
        $data = array(
            'data' => $this->T_kes_lay_bto_model->get_all(),
        );

        $this->template->load('template', 't_kes_lay_bto/t_kes_lay_bto_list', $data);
    }

    public function json()
    {
        header('Content-Type: application/json');
        echo $this->T_kes_lay_bto_model->json();
    }

    public function read($id)
    {
        $row = $this->T_kes_lay_bto_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id' => $row->id,
                'tgl_transaksi' => $row->tgl_transaksi,
                'bto' => $row->bto,
                'message' => $row->message,
                'user' => $row->user,
                'create_date' => $row->create_date,
            );
            $this->template->load('template', 't_kes_lay_bto/t_kes_lay_bto_read', $data);
        } else {
            $this->session->set_flashdata('warning', 'Record Not Found');
            redirect(site_url('t_kes_lay_bto'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Kirim',
            'action' => site_url('t_kes_lay_bto/create_action'),
            'id' => set_value('id'),
            'tgl_transaksi' => set_value('tgl_transaksi'),
            'bto' => set_value('bto'),
            'message' => set_value('message'),
            'user' => set_value('user'),
            'create_date' => set_value('create_date'),
        );
        $this->template->load('template', 't_kes_lay_bto/t_kes_lay_bto_form', $data);
    }

    public function create_action()
    {
        $tanggal = date('Y-m-d', strtotime($this->input->post('tgl_transaksi', TRUE)));
        $data = array(
            'tgl_transaksi' => $tanggal,
            'bto' => $this->input->post('bto', TRUE),
        );
        $row = $this->T_kes_lay_bto_model->get_by_param($tanggal);
        if (($tanggal == $row->tgl_transaksi)) {
            $this->T_kes_lay_bto_model->update_kes_lay_bto($data);
        } else {
            $this->T_kes_lay_bto_model->insert_kes_lay_bto($data);
        }
    }

    public function update($id)
    {
        $row = $this->T_kes_lay_bto_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('t_kes_lay_bto/update_action'),
                'id' => set_value('id', $row->id),
                'tgl_transaksi' => set_value('tgl_transaksi', $row->tgl_transaksi),
                'bto' => set_value('bto', $row->bto),
                'message' => set_value('message', $row->message),
                'user' => set_value('user', $row->user),
                'create_date' => set_value('create_date', $row->create_date),
            );
            $this->template->load('template', 't_kes_lay_bto/t_kes_lay_bto_form', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true"><i class="fal fa-times"></i></span>
                    </button><strong> Data Tidak Tersedia</strong></div>');
            redirect(site_url('t_kes_lay_bto'));
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
            'bto' => $this->input->post('bto', TRUE),
        );
        $this->T_kes_lay_bto_model->update_kes_lay_bto($data);
        // }
    }

    public function delete($id)
    {
        $row = $this->T_kes_lay_bto_model->get_by_id($id);

        if ($row) {
            $this->T_kes_lay_bto_model->delete($id);
            $this->session->set_flashdata('success', ' Delete Record Success');
            redirect(site_url('t_kes_lay_bto'));
        } else {
            $this->session->set_flashdata('warning', 'Record Not Found');
            redirect(site_url('t_kes_lay_bto'));
        }
    }

    //     public function _rules()
    //     {

}

/* End of file T_kes_lay_bto.php */