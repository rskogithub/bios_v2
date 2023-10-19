<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Master_rasio extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Master_rasio_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template','master_rasio/master_rasio_list');
    }

    public function json() {
        header('Content-Type: application/json');
        echo $this->Master_rasio_model->json();
    }

    public function read($id)
    {
        $row = $this->Master_rasio_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'tanggal' => $row->tanggal,
		'kode' => $row->kode,
		'indikator' => $row->indikator,
		'rasio' => $row->rasio,
		'data' => $row->data,
		'rumus' => $row->rumus,
		'target' => $row->target,
	    );
            $this->template->load('template','master_rasio/master_rasio_read', $data);
        } else {
            $this->session->set_flashdata('warning', 'Record Not Found');
            redirect(site_url('master_rasio'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('master_rasio/create_action'),
	    'id' => set_value('id'),
	    'tanggal' => set_value('tanggal'),
	    'kode' => set_value('kode'),
	    'indikator' => set_value('indikator'),
	    'rasio' => set_value('rasio'),
	    'data' => set_value('data'),
	    'rumus' => set_value('rumus'),
	    'target' => set_value('target'),
	);
        $this->template->load('template','master_rasio/master_rasio_form', $data);
    }

    public function create_action()
    {
		$data = array(
		'tanggal' => $this->input->post('tanggal',TRUE),
		'kode' => $this->input->post('kode',TRUE),
		'indikator' => $this->input->post('indikator',TRUE),
		'rasio' => $this->input->post('rasio',TRUE),
		'data' => $this->input->post('data',TRUE),
		'rumus' => $this->input->post('rumus',TRUE),
		'target' => $this->input->post('target',TRUE),
	    );

            $this->Master_rasio_model->insert($data);
            $this->session->set_flashdata('success', 'Create Record Success');
            redirect(site_url('master_rasio'));
        //}
    }

    public function update($id)
    {
        $row = $this->Master_rasio_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('master_rasio/update_action'),
		'id' => set_value('id', $row->id),
		'tanggal' => set_value('tanggal', $row->tanggal),
		'kode' => set_value('kode', $row->kode),
		'indikator' => set_value('indikator', $row->indikator),
		'rasio' => set_value('rasio', $row->rasio),
		'data' => set_value('data', $row->data),
		'rumus' => set_value('rumus', $row->rumus),
		'target' => set_value('target', $row->target),
	    );
            $this->template->load('template','master_rasio/master_rasio_form', $data);
        } else {
            $this->session->set_flashdata('warning', 'Record Not Found');
            redirect(site_url('master_rasio'));
        }
    }

    public function update_action()
    {
        // $this->_rules();

        // if ($this->form_validation->run() == FALSE) {
        //     $this->update($this->input->post('id', TRUE));
        // } else {
            $data = array(
		'tanggal' => $this->input->post('tanggal',TRUE),
		'kode' => $this->input->post('kode',TRUE),
		'indikator' => $this->input->post('indikator',TRUE),
		'rasio' => $this->input->post('rasio',TRUE),
		'data' => $this->input->post('data',TRUE),
		'rumus' => $this->input->post('rumus',TRUE),
		'target' => $this->input->post('target',TRUE),
	    );

            $this->Master_rasio_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('success', ' Update Record Success');
            redirect(site_url('master_rasio'));
        // }
    }

    public function delete($id)
    {
        $row = $this->Master_rasio_model->get_by_id($id);

        if ($row) {
            $this->Master_rasio_model->delete($id);
            $this->session->set_flashdata('success', ' Delete Record Success');
            redirect(site_url('master_rasio'));
        } else {
            $this->session->set_flashdata('warning', 'Record Not Found');
            redirect(site_url('master_rasio'));
        }
    }

//     public function _rules()
//     {

}

/* End of file Master_rasio.php */