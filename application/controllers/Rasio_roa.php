<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Rasio_roa extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Rasio_roa_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template','rasio_roa/rasio_roa_list');
    }

    public function json() {
        header('Content-Type: application/json');
        echo $this->Rasio_roa_model->json();
    }

    public function read($id)
    {
        $row = $this->Rasio_roa_model->get_by_id($id);
        if ($row) {
            $data = array(
		'no_id' => $row->no_id,
		'kode' => $row->kode,
		'tanggal' => $row->tanggal,
		'roa_surplus_defisit' => $row->roa_surplus_defisit,
		'roa_tot_aset' => $row->roa_tot_aset,
		'total_roa' => $row->total_roa,
	    );
            $this->template->load('template','rasio_roa/rasio_roa_read', $data);
        } else {
            $this->session->set_flashdata('warning', 'Record Not Found');
            redirect(site_url('rasio_roa'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('rasio_roa/create_action'),
	    'no_id' => set_value('no_id'),
	    'kode' => set_value('kode'),
	    'tanggal' => set_value('tanggal'),
	    'roa_surplus_defisit' => set_value('roa_surplus_defisit'),
	    'roa_tot_aset' => set_value('roa_tot_aset'),
	    'total_roa' => set_value('total_roa'),
	);
        $this->template->load('template','rasio_roa/rasio_roa_form', $data);
    }

    public function create_action()
    {
		$data = array(
		'kode' => $this->input->post('kode',TRUE),
		'tanggal' => $this->input->post('tanggal',TRUE),
		'roa_surplus_defisit' => $this->input->post('roa_surplus_defisit',TRUE),
		'roa_tot_aset' => $this->input->post('roa_tot_aset',TRUE),
		'total_roa' => $this->input->post('total_roa',TRUE),
	    );

            $this->Rasio_roa_model->insert($data);
            $this->session->set_flashdata('success', 'Create Record Success');
            redirect(site_url('rasio_roa'));
        //}
    }

    public function update($id)
    {
        $row = $this->Rasio_roa_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('rasio_roa/update_action'),
		'no_id' => set_value('no_id', $row->no_id),
		'kode' => set_value('kode', $row->kode),
		'tanggal' => set_value('tanggal', $row->tanggal),
		'roa_surplus_defisit' => set_value('roa_surplus_defisit', $row->roa_surplus_defisit),
		'roa_tot_aset' => set_value('roa_tot_aset', $row->roa_tot_aset),
		'total_roa' => set_value('total_roa', $row->total_roa),
	    );
            $this->template->load('template','rasio_roa/rasio_roa_form', $data);
        } else {
            $this->session->set_flashdata('warning', 'Record Not Found');
            redirect(site_url('rasio_roa'));
        }
    }

    public function update_action()
    {
        // $this->_rules();

        // if ($this->form_validation->run() == FALSE) {
        //     $this->update($this->input->post('no_id', TRUE));
        // } else {
            $data = array(
		'kode' => $this->input->post('kode',TRUE),
		'tanggal' => $this->input->post('tanggal',TRUE),
		'roa_surplus_defisit' => $this->input->post('roa_surplus_defisit',TRUE),
		'roa_tot_aset' => $this->input->post('roa_tot_aset',TRUE),
		'total_roa' => $this->input->post('total_roa',TRUE),
	    );

            $this->Rasio_roa_model->update($this->input->post('no_id', TRUE), $data);
            $this->session->set_flashdata('success', ' Update Record Success');
            redirect(site_url('rasio_roa'));
        // }
    }

    public function delete($id)
    {
        $row = $this->Rasio_roa_model->get_by_id($id);

        if ($row) {
            $this->Rasio_roa_model->delete($id);
            $this->session->set_flashdata('success', ' Delete Record Success');
            redirect(site_url('rasio_roa'));
        } else {
            $this->session->set_flashdata('warning', 'Record Not Found');
            redirect(site_url('rasio_roa'));
        }
    }

//     public function _rules()
//     {

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "rasio_roa.xls";
        $judul = "rasio_roa";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
	xlsWriteLabel($tablehead, $kolomhead++, "Kode");
	xlsWriteLabel($tablehead, $kolomhead++, "Tanggal");
	xlsWriteLabel($tablehead, $kolomhead++, "Roa Surplus Defisit");
	xlsWriteLabel($tablehead, $kolomhead++, "Roa Tot Aset");
	xlsWriteLabel($tablehead, $kolomhead++, "Total Roa");

	foreach ($this->Rasio_roa_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kode);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tanggal);
	    xlsWriteLabel($tablebody, $kolombody++, $data->roa_surplus_defisit);
	    xlsWriteLabel($tablebody, $kolombody++, $data->roa_tot_aset);
	    xlsWriteLabel($tablebody, $kolombody++, $data->total_roa);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Rasio_roa.php */