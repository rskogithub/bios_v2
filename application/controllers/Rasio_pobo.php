<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Rasio_pobo extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Rasio_pobo_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template','rasio_pobo/rasio_pobo_list');
    }

    public function json() {
        header('Content-Type: application/json');
        echo $this->Rasio_pobo_model->json();
    }

    public function read($id)
    {
        $row = $this->Rasio_pobo_model->get_by_id($id);
        if ($row) {
            $data = array(
		'no_id' => $row->no_id,
		'kode' => $row->kode,
		'tanggal' => $row->tanggal,
		'pobo_total_pendapatan' => $row->pobo_total_pendapatan,
		'pobo_pendapatan_apbn' => $row->pobo_pendapatan_apbn,
		'pobo_total_beban' => $row->pobo_total_beban,
		'pobo_beban_susut_amor' => $row->pobo_beban_susut_amor,
		'rasio_pobo' => $row->rasio_pobo,
	    );
            $this->template->load('template','rasio_pobo/rasio_pobo_read', $data);
        } else {
            $this->session->set_flashdata('warning', 'Record Not Found');
            redirect(site_url('rasio_pobo'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('rasio_pobo/create_action'),
	    'no_id' => set_value('no_id'),
	    'kode' => set_value('kode'),
	    'tanggal' => set_value('tanggal'),
	    'pobo_total_pendapatan' => set_value('pobo_total_pendapatan'),
	    'pobo_pendapatan_apbn' => set_value('pobo_pendapatan_apbn'),
	    'pobo_total_beban' => set_value('pobo_total_beban'),
	    'pobo_beban_susut_amor' => set_value('pobo_beban_susut_amor'),
	    'rasio_pobo' => set_value('rasio_pobo'),
	);
        $this->template->load('template','rasio_pobo/rasio_pobo_form', $data);
    }

    public function create_action()
    {
		$data = array(
		'kode' => $this->input->post('kode',TRUE),
		'tanggal' => $this->input->post('tanggal',TRUE),
		'pobo_total_pendapatan' => $this->input->post('pobo_total_pendapatan',TRUE),
		'pobo_pendapatan_apbn' => $this->input->post('pobo_pendapatan_apbn',TRUE),
		'pobo_total_beban' => $this->input->post('pobo_total_beban',TRUE),
		'pobo_beban_susut_amor' => $this->input->post('pobo_beban_susut_amor',TRUE),
		'rasio_pobo' => $this->input->post('rasio_pobo',TRUE),
	    );

            $this->Rasio_pobo_model->insert($data);
            $this->session->set_flashdata('success', 'Create Record Success');
            redirect(site_url('rasio_pobo'));
        //}
    }

    public function update($id)
    {
        $row = $this->Rasio_pobo_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('rasio_pobo/update_action'),
		'no_id' => set_value('no_id', $row->no_id),
		'kode' => set_value('kode', $row->kode),
		'tanggal' => set_value('tanggal', $row->tanggal),
		'pobo_total_pendapatan' => set_value('pobo_total_pendapatan', $row->pobo_total_pendapatan),
		'pobo_pendapatan_apbn' => set_value('pobo_pendapatan_apbn', $row->pobo_pendapatan_apbn),
		'pobo_total_beban' => set_value('pobo_total_beban', $row->pobo_total_beban),
		'pobo_beban_susut_amor' => set_value('pobo_beban_susut_amor', $row->pobo_beban_susut_amor),
		'rasio_pobo' => set_value('rasio_pobo', $row->rasio_pobo),
	    );
            $this->template->load('template','rasio_pobo/rasio_pobo_form', $data);
        } else {
            $this->session->set_flashdata('warning', 'Record Not Found');
            redirect(site_url('rasio_pobo'));
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
		'pobo_total_pendapatan' => $this->input->post('pobo_total_pendapatan',TRUE),
		'pobo_pendapatan_apbn' => $this->input->post('pobo_pendapatan_apbn',TRUE),
		'pobo_total_beban' => $this->input->post('pobo_total_beban',TRUE),
		'pobo_beban_susut_amor' => $this->input->post('pobo_beban_susut_amor',TRUE),
		'rasio_pobo' => $this->input->post('rasio_pobo',TRUE),
	    );

            $this->Rasio_pobo_model->update($this->input->post('no_id', TRUE), $data);
            $this->session->set_flashdata('success', ' Update Record Success');
            redirect(site_url('rasio_pobo'));
        // }
    }

    public function delete($id)
    {
        $row = $this->Rasio_pobo_model->get_by_id($id);

        if ($row) {
            $this->Rasio_pobo_model->delete($id);
            $this->session->set_flashdata('success', ' Delete Record Success');
            redirect(site_url('rasio_pobo'));
        } else {
            $this->session->set_flashdata('warning', 'Record Not Found');
            redirect(site_url('rasio_pobo'));
        }
    }

//     public function _rules()
//     {

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "rasio_pobo.xls";
        $judul = "rasio_pobo";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Pobo Total Pendapatan");
	xlsWriteLabel($tablehead, $kolomhead++, "Pobo Pendapatan Apbn");
	xlsWriteLabel($tablehead, $kolomhead++, "Pobo Total Beban");
	xlsWriteLabel($tablehead, $kolomhead++, "Pobo Beban Susut Amor");
	xlsWriteLabel($tablehead, $kolomhead++, "Rasio Pobo");

	foreach ($this->Rasio_pobo_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kode);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tanggal);
	    xlsWriteLabel($tablebody, $kolombody++, $data->pobo_total_pendapatan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->pobo_pendapatan_apbn);
	    xlsWriteLabel($tablebody, $kolombody++, $data->pobo_total_beban);
	    xlsWriteLabel($tablebody, $kolombody++, $data->pobo_beban_susut_amor);
	    xlsWriteLabel($tablebody, $kolombody++, $data->rasio_pobo);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Rasio_pobo.php */