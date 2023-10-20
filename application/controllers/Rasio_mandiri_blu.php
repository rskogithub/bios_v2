<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Rasio_mandiri_blu extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Rasio_mandiri_blu_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template','rasio_mandiri_blu/rasio_mandiri_blu_list');
    }

    public function json() {
        header('Content-Type: application/json');
        echo $this->Rasio_mandiri_blu_model->json();
    }

    public function read($id)
    {
        $row = $this->Rasio_mandiri_blu_model->get_by_id($id);
        if ($row) {
            $data = array(
		'no_id' => $row->no_id,
		'kode' => $row->kode,
		'tanggal' => $row->tanggal,
		'pndptn_pnbp_blu' => $row->pndptn_pnbp_blu,
		'blnj_oprsnl_rm_blu' => $row->blnj_oprsnl_rm_blu,
		'blnj_modal_rm_blu' => $row->blnj_modal_rm_blu,
		'tk_kemandirian_blu' => $row->tk_kemandirian_blu,
	    );
            $this->template->load('template','rasio_mandiri_blu/rasio_mandiri_blu_read', $data);
        } else {
            $this->session->set_flashdata('warning', 'Record Not Found');
            redirect(site_url('rasio_mandiri_blu'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('rasio_mandiri_blu/create_action'),
	    'no_id' => set_value('no_id'),
	    'kode' => set_value('kode'),
	    'tanggal' => set_value('tanggal'),
	    'pndptn_pnbp_blu' => set_value('pndptn_pnbp_blu'),
	    'blnj_oprsnl_rm_blu' => set_value('blnj_oprsnl_rm_blu'),
	    'blnj_modal_rm_blu' => set_value('blnj_modal_rm_blu'),
	    'tk_kemandirian_blu' => set_value('tk_kemandirian_blu'),
	);
        $this->template->load('template','rasio_mandiri_blu/rasio_mandiri_blu_form', $data);
    }

    public function create_action()
    {
		$data = array(
		'kode' => $this->input->post('kode',TRUE),
		'tanggal' => $this->input->post('tanggal',TRUE),
		'pndptn_pnbp_blu' => $this->input->post('pndptn_pnbp_blu',TRUE),
		'blnj_oprsnl_rm_blu' => $this->input->post('blnj_oprsnl_rm_blu',TRUE),
		'blnj_modal_rm_blu' => $this->input->post('blnj_modal_rm_blu',TRUE),
		'tk_kemandirian_blu' => $this->input->post('tk_kemandirian_blu',TRUE),
	    );

            $this->Rasio_mandiri_blu_model->insert($data);
            $this->session->set_flashdata('success', 'Create Record Success');
            redirect(site_url('rasio_mandiri_blu'));
        //}
    }

    public function update($id)
    {
        $row = $this->Rasio_mandiri_blu_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('rasio_mandiri_blu/update_action'),
		'no_id' => set_value('no_id', $row->no_id),
		'kode' => set_value('kode', $row->kode),
		'tanggal' => set_value('tanggal', $row->tanggal),
		'pndptn_pnbp_blu' => set_value('pndptn_pnbp_blu', $row->pndptn_pnbp_blu),
		'blnj_oprsnl_rm_blu' => set_value('blnj_oprsnl_rm_blu', $row->blnj_oprsnl_rm_blu),
		'blnj_modal_rm_blu' => set_value('blnj_modal_rm_blu', $row->blnj_modal_rm_blu),
		'tk_kemandirian_blu' => set_value('tk_kemandirian_blu', $row->tk_kemandirian_blu),
	    );
            $this->template->load('template','rasio_mandiri_blu/rasio_mandiri_blu_form', $data);
        } else {
            $this->session->set_flashdata('warning', 'Record Not Found');
            redirect(site_url('rasio_mandiri_blu'));
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
		'pndptn_pnbp_blu' => $this->input->post('pndptn_pnbp_blu',TRUE),
		'blnj_oprsnl_rm_blu' => $this->input->post('blnj_oprsnl_rm_blu',TRUE),
		'blnj_modal_rm_blu' => $this->input->post('blnj_modal_rm_blu',TRUE),
		'tk_kemandirian_blu' => $this->input->post('tk_kemandirian_blu',TRUE),
	    );

            $this->Rasio_mandiri_blu_model->update($this->input->post('no_id', TRUE), $data);
            $this->session->set_flashdata('success', ' Update Record Success');
            redirect(site_url('rasio_mandiri_blu'));
        // }
    }

    public function delete($id)
    {
        $row = $this->Rasio_mandiri_blu_model->get_by_id($id);

        if ($row) {
            $this->Rasio_mandiri_blu_model->delete($id);
            $this->session->set_flashdata('success', ' Delete Record Success');
            redirect(site_url('rasio_mandiri_blu'));
        } else {
            $this->session->set_flashdata('warning', 'Record Not Found');
            redirect(site_url('rasio_mandiri_blu'));
        }
    }

//     public function _rules()
//     {

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "rasio_mandiri_blu.xls";
        $judul = "rasio_mandiri_blu";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Pndptn Pnbp Blu");
	xlsWriteLabel($tablehead, $kolomhead++, "Blnj Oprsnl Rm Blu");
	xlsWriteLabel($tablehead, $kolomhead++, "Blnj Modal Rm Blu");
	xlsWriteLabel($tablehead, $kolomhead++, "Tk Kemandirian Blu");

	foreach ($this->Rasio_mandiri_blu_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kode);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tanggal);
	    xlsWriteLabel($tablebody, $kolombody++, $data->pndptn_pnbp_blu);
	    xlsWriteLabel($tablebody, $kolombody++, $data->blnj_oprsnl_rm_blu);
	    xlsWriteLabel($tablebody, $kolombody++, $data->blnj_modal_rm_blu);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tk_kemandirian_blu);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=rasio_mandiri_blu.doc");

        $data = array(
            'rasio_mandiri_blu_data' => $this->Rasio_mandiri_blu_model->get_all(),
            'start' => 0
        );

        $this->load->view('rasio_mandiri_blu/rasio_mandiri_blu_doc',$data);
    }

}

/* End of file Rasio_mandiri_blu.php */