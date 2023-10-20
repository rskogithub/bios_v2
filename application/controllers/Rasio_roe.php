<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Rasio_roe extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Rasio_roe_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template','rasio_roe/rasio_roe_list');
    }

    public function json() {
        header('Content-Type: application/json');
        echo $this->Rasio_roe_model->json();
    }

    public function read($id)
    {
        $row = $this->Rasio_roe_model->get_by_id($id);
        if ($row) {
            $data = array(
		'no_id' => $row->no_id,
		'kode' => $row->kode,
		'tanggal' => $row->tanggal,
		'roe_surplus_defisit' => $row->roe_surplus_defisit,
		'roe_tot_ekuitas' => $row->roe_tot_ekuitas,
		'total_roe' => $row->total_roe,
	    );
            $this->template->load('template','rasio_roe/rasio_roe_read', $data);
        } else {
            $this->session->set_flashdata('warning', 'Record Not Found');
            redirect(site_url('rasio_roe'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('rasio_roe/create_action'),
	    'no_id' => set_value('no_id'),
	    'kode' => set_value('kode'),
	    'tanggal' => set_value('tanggal'),
	    'roe_surplus_defisit' => set_value('roe_surplus_defisit'),
	    'roe_tot_ekuitas' => set_value('roe_tot_ekuitas'),
	    'total_roe' => set_value('total_roe'),
	);
        $this->template->load('template','rasio_roe/rasio_roe_form', $data);
    }

    public function create_action()
    {
		$data = array(
		'kode' => $this->input->post('kode',TRUE),
		'tanggal' => $this->input->post('tanggal',TRUE),
		'roe_surplus_defisit' => $this->input->post('roe_surplus_defisit',TRUE),
		'roe_tot_ekuitas' => $this->input->post('roe_tot_ekuitas',TRUE),
		'total_roe' => $this->input->post('total_roe',TRUE),
	    );

            $this->Rasio_roe_model->insert($data);
            $this->session->set_flashdata('success', 'Create Record Success');
            redirect(site_url('rasio_roe'));
        //}
    }

    public function update($id)
    {
        $row = $this->Rasio_roe_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('rasio_roe/update_action'),
		'no_id' => set_value('no_id', $row->no_id),
		'kode' => set_value('kode', $row->kode),
		'tanggal' => set_value('tanggal', $row->tanggal),
		'roe_surplus_defisit' => set_value('roe_surplus_defisit', $row->roe_surplus_defisit),
		'roe_tot_ekuitas' => set_value('roe_tot_ekuitas', $row->roe_tot_ekuitas),
		'total_roe' => set_value('total_roe', $row->total_roe),
	    );
            $this->template->load('template','rasio_roe/rasio_roe_form', $data);
        } else {
            $this->session->set_flashdata('warning', 'Record Not Found');
            redirect(site_url('rasio_roe'));
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
		'roe_surplus_defisit' => $this->input->post('roe_surplus_defisit',TRUE),
		'roe_tot_ekuitas' => $this->input->post('roe_tot_ekuitas',TRUE),
		'total_roe' => $this->input->post('total_roe',TRUE),
	    );

            $this->Rasio_roe_model->update($this->input->post('no_id', TRUE), $data);
            $this->session->set_flashdata('success', ' Update Record Success');
            redirect(site_url('rasio_roe'));
        // }
    }

    public function delete($id)
    {
        $row = $this->Rasio_roe_model->get_by_id($id);

        if ($row) {
            $this->Rasio_roe_model->delete($id);
            $this->session->set_flashdata('success', ' Delete Record Success');
            redirect(site_url('rasio_roe'));
        } else {
            $this->session->set_flashdata('warning', 'Record Not Found');
            redirect(site_url('rasio_roe'));
        }
    }

//     public function _rules()
//     {

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "rasio_roe.xls";
        $judul = "rasio_roe";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Roe Surplus Defisit");
	xlsWriteLabel($tablehead, $kolomhead++, "Roe Tot Ekuitas");
	xlsWriteLabel($tablehead, $kolomhead++, "Total Roe");

	foreach ($this->Rasio_roe_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kode);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tanggal);
	    xlsWriteLabel($tablebody, $kolombody++, $data->roe_surplus_defisit);
	    xlsWriteLabel($tablebody, $kolombody++, $data->roe_tot_ekuitas);
	    xlsWriteLabel($tablebody, $kolombody++, $data->total_roe);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Rasio_roe.php */