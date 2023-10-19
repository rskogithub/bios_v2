<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Rasio_optimal_kas extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Rasio_optimal_kas_model');
        $this->load->library('form_validation');
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template','rasio_optimal_kas/rasio_optimal_kas_list');
    }

    public function json() {
        header('Content-Type: application/json');
        echo $this->Rasio_optimal_kas_model->json();
    }

    public function read($id)
    {
        $row = $this->Rasio_optimal_kas_model->get_by_id($id);
        if ($row) {
            $data = array(
		'no_id' => $row->no_id,
		'kode' => $row->kode,
		'tanggal' => $row->tanggal,
		'pdptn_bunga_atas_pnglolan_kas' => $row->pdptn_bunga_atas_pnglolan_kas,
		'saldo_rekening_pnglolaan_kas' => $row->saldo_rekening_pnglolaan_kas,
		'saldo_rekening_oprsnl' => $row->saldo_rekening_oprsnl,
		'rasio_optimal_kas' => $row->rasio_optimal_kas,
		// 'f8' => $row->f8,
		// 'f9' => $row->f9,
	    );
            $this->template->load('template','rasio_optimal_kas/rasio_optimal_kas_read', $data);
        } else {
            $this->session->set_flashdata('warning', 'Record Not Found');
            redirect(site_url('rasio_optimal_kas'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('rasio_optimal_kas/create_action'),
	    'no_id' => set_value('no_id'),
	    'kode' => set_value('kode'),
	    'tanggal' => set_value('tanggal'),
	    'pdptn_bunga_atas_pnglolan_kas' => set_value('pdptn_bunga_atas_pnglolan_kas'),
	    'saldo_rekening_pnglolaan_kas' => set_value('saldo_rekening_pnglolaan_kas'),
	    'saldo_rekening_oprsnl' => set_value('saldo_rekening_oprsnl'),
	    'rasio_optimal_kas' => set_value('rasio_optimal_kas'),
	    // 'f8' => set_value('f8'),
	    // 'f9' => set_value('f9'),
	);
        $this->template->load('template','rasio_optimal_kas/rasio_optimal_kas_form', $data);
    }

    public function create_action()
    {
		$data = array(
		'kode' => $this->input->post('kode',TRUE),
		'tanggal' => $this->input->post('tanggal',TRUE),
		'pdptn_bunga_atas_pnglolan_kas' => $this->input->post('pdptn_bunga_atas_pnglolan_kas',TRUE),
		'saldo_rekening_pnglolaan_kas' => $this->input->post('saldo_rekening_pnglolaan_kas',TRUE),
		'saldo_rekening_oprsnl' => $this->input->post('saldo_rekening_oprsnl',TRUE),
		'rasio_optimal_kas' => $this->input->post('rasio_optimal_kas',TRUE),
		// 'f8' => $this->input->post('f8',TRUE),
		// 'f9' => $this->input->post('f9',TRUE),
	    );

            $this->Rasio_optimal_kas_model->insert($data);
            $this->session->set_flashdata('success', 'Create Record Success');
            redirect(site_url('rasio_optimal_kas'));
        //}
    }

    public function update($id)
    {
        $row = $this->Rasio_optimal_kas_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('rasio_optimal_kas/update_action'),
		'no_id' => set_value('no_id', $row->no_id),
		'kode' => set_value('kode', $row->kode),
		'tanggal' => set_value('tanggal', $row->tanggal),
		'pdptn_bunga_atas_pnglolan_kas' => set_value('pdptn_bunga_atas_pnglolan_kas', $row->pdptn_bunga_atas_pnglolan_kas),
		'saldo_rekening_pnglolaan_kas' => set_value('saldo_rekening_pnglolaan_kas', $row->saldo_rekening_pnglolaan_kas),
		'saldo_rekening_oprsnl' => set_value('saldo_rekening_oprsnl', $row->saldo_rekening_oprsnl),
		'rasio_optimal_kas' => set_value('rasio_optimal_kas', $row->rasio_optimal_kas),
		// 'f8' => set_value('f8', $row->f8),
		// 'f9' => set_value('f9', $row->f9),
	    );
            $this->template->load('template','rasio_optimal_kas/rasio_optimal_kas_form', $data);
        } else {
            $this->session->set_flashdata('warning', 'Record Not Found');
            redirect(site_url('rasio_optimal_kas'));
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
		'pdptn_bunga_atas_pnglolan_kas' => $this->input->post('pdptn_bunga_atas_pnglolan_kas',TRUE),
		'saldo_rekening_pnglolaan_kas' => $this->input->post('saldo_rekening_pnglolaan_kas',TRUE),
		'saldo_rekening_oprsnl' => $this->input->post('saldo_rekening_oprsnl',TRUE),
		'rasio_optimal_kas' => $this->input->post('rasio_optimal_kas',TRUE),
		'f8' => $this->input->post('f8',TRUE),
		'f9' => $this->input->post('f9',TRUE),
	    );

            $this->Rasio_optimal_kas_model->update($this->input->post('no_id', TRUE), $data);
            $this->session->set_flashdata('success', ' Update Record Success');
            redirect(site_url('rasio_optimal_kas'));
        // }
    }

    public function delete($id)
    {
        $row = $this->Rasio_optimal_kas_model->get_by_id($id);

        if ($row) {
            $this->Rasio_optimal_kas_model->delete($id);
            $this->session->set_flashdata('success', ' Delete Record Success');
            redirect(site_url('rasio_optimal_kas'));
        } else {
            $this->session->set_flashdata('warning', 'Record Not Found');
            redirect(site_url('rasio_optimal_kas'));
        }
    }

//     public function _rules()
//     {

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "rasio_optimal_kas.xls";
        $judul = "rasio_optimal_kas";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Pdptn Bunga Atas Pnglolan Kas");
	xlsWriteLabel($tablehead, $kolomhead++, "Saldo Rekening Pnglolaan Kas");
	xlsWriteLabel($tablehead, $kolomhead++, "Saldo Rekening Oprsnl");
	xlsWriteLabel($tablehead, $kolomhead++, "Rasio Optimal Kas");
	// xlsWriteLabel($tablehead, $kolomhead++, "F8");
	// xlsWriteLabel($tablehead, $kolomhead++, "F9");

	foreach ($this->Rasio_optimal_kas_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kode);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tanggal);
	    xlsWriteLabel($tablebody, $kolombody++, $data->pdptn_bunga_atas_pnglolan_kas);
	    xlsWriteLabel($tablebody, $kolombody++, $data->saldo_rekening_pnglolaan_kas);
	    xlsWriteLabel($tablebody, $kolombody++, $data->saldo_rekening_oprsnl);
	    xlsWriteLabel($tablebody, $kolombody++, $data->rasio_optimal_kas);
	    // xlsWriteLabel($tablebody, $kolombody++, $data->f8);
	    // xlsWriteLabel($tablebody, $kolombody++, $data->f9);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Rasio_optimal_kas.php */