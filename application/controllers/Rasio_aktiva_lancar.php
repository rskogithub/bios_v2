<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Rasio_aktiva_lancar extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Rasio_aktiva_lancar_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template','rasio_aktiva_lancar/rasio_aktiva_lancar_list');
    }

    public function json() {
        header('Content-Type: application/json');
        echo $this->Rasio_aktiva_lancar_model->json();
    }

    public function read($id)
    {
        $row = $this->Rasio_aktiva_lancar_model->get_by_id($id);
        if ($row) {
            $data = array(
		'no_id' => $row->no_id,
		'kode' => $row->kode,
		'tanggal' => $row->tanggal,
		'aktiva_lancar' => $row->aktiva_lancar,
		'plan_pgunaan_saldo_blu' => $row->plan_pgunaan_saldo_blu,
		'kewajiban_lancar' => $row->kewajiban_lancar,
		'rasio_lancar' => $row->rasio_lancar,
	    );
            $this->template->load('template','rasio_aktiva_lancar/rasio_aktiva_lancar_read', $data);
        } else {
            $this->session->set_flashdata('warning', 'Record Not Found');
            redirect(site_url('rasio_aktiva_lancar'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('rasio_aktiva_lancar/create_action'),
	    'no_id' => set_value('no_id'),
	    'kode' => set_value('kode'),
	    'tanggal' => set_value('tanggal'),
	    'aktiva_lancar' => set_value('aktiva_lancar'),
	    'plan_pgunaan_saldo_blu' => set_value('plan_pgunaan_saldo_blu'),
	    'kewajiban_lancar' => set_value('kewajiban_lancar'),
	    'rasio_lancar' => set_value('rasio_lancar'),
	);
        $this->template->load('template','rasio_aktiva_lancar/rasio_aktiva_lancar_form', $data);
    }

    public function create_action()
    {
		$data = array(
		'kode' => $this->input->post('kode',TRUE),
		'tanggal' => $this->input->post('tanggal',TRUE),
		'aktiva_lancar' => $this->input->post('aktiva_lancar',TRUE),
		'plan_pgunaan_saldo_blu' => $this->input->post('plan_pgunaan_saldo_blu',TRUE),
		'kewajiban_lancar' => $this->input->post('kewajiban_lancar',TRUE),
		'rasio_lancar' => $this->input->post('rasio_lancar',TRUE),
	    );

            $this->Rasio_aktiva_lancar_model->insert($data);
            $this->session->set_flashdata('success', 'Create Record Success');
            redirect(site_url('rasio_aktiva_lancar'));
        //}
    }

    public function update($id)
    {
        $row = $this->Rasio_aktiva_lancar_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('rasio_aktiva_lancar/update_action'),
		'no_id' => set_value('no_id', $row->no_id),
		'kode' => set_value('kode', $row->kode),
		'tanggal' => set_value('tanggal', $row->tanggal),
		'aktiva_lancar' => set_value('aktiva_lancar', $row->aktiva_lancar),
		'plan_pgunaan_saldo_blu' => set_value('plan_pgunaan_saldo_blu', $row->plan_pgunaan_saldo_blu),
		'kewajiban_lancar' => set_value('kewajiban_lancar', $row->kewajiban_lancar),
		'rasio_lancar' => set_value('rasio_lancar', $row->rasio_lancar),
	    );
            $this->template->load('template','rasio_aktiva_lancar/rasio_aktiva_lancar_form', $data);
        } else {
            $this->session->set_flashdata('warning', 'Record Not Found');
            redirect(site_url('rasio_aktiva_lancar'));
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
		'aktiva_lancar' => $this->input->post('aktiva_lancar',TRUE),
		'plan_pgunaan_saldo_blu' => $this->input->post('plan_pgunaan_saldo_blu',TRUE),
		'kewajiban_lancar' => $this->input->post('kewajiban_lancar',TRUE),
		'rasio_lancar' => $this->input->post('rasio_lancar',TRUE),
	    );

            $this->Rasio_aktiva_lancar_model->update($this->input->post('no_id', TRUE), $data);
            $this->session->set_flashdata('success', ' Update Record Success');
            redirect(site_url('rasio_aktiva_lancar'));
        // }
    }

    public function delete($id)
    {
        $row = $this->Rasio_aktiva_lancar_model->get_by_id($id);

        if ($row) {
            $this->Rasio_aktiva_lancar_model->delete($id);
            $this->session->set_flashdata('success', ' Delete Record Success');
            redirect(site_url('rasio_aktiva_lancar'));
        } else {
            $this->session->set_flashdata('warning', 'Record Not Found');
            redirect(site_url('rasio_aktiva_lancar'));
        }
    }

//     public function _rules()
//     {

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "rasio_aktiva_lancar.xls";
        $judul = "rasio_aktiva_lancar";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Aktiva Lancar");
	xlsWriteLabel($tablehead, $kolomhead++, "Plan Pgunaan Saldo Blu");
	xlsWriteLabel($tablehead, $kolomhead++, "Kewajiban Lancar");
	xlsWriteLabel($tablehead, $kolomhead++, "Rasio Lancar");

	foreach ($this->Rasio_aktiva_lancar_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kode);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tanggal);
	    xlsWriteLabel($tablebody, $kolombody++, $data->aktiva_lancar);
	    xlsWriteLabel($tablebody, $kolombody++, $data->plan_pgunaan_saldo_blu);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kewajiban_lancar);
	    xlsWriteLabel($tablebody, $kolombody++, $data->rasio_lancar);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=rasio_aktiva_lancar.doc");

        $data = array(
            'rasio_aktiva_lancar_data' => $this->Rasio_aktiva_lancar_model->get_all(),
            'start' => 0
        );

        $this->load->view('rasio_aktiva_lancar/rasio_aktiva_lancar_doc',$data);
    }

}

/* End of file Rasio_aktiva_lancar.php */