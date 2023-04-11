<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Zx_t_indikator_pelayanan_rs_v1 extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        //is_login();
        $this->load->model('Zx_t_indikator_pelayanan_rs_v1_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $method = $_SERVER['REQUEST_METHOD'];
        if ($method != 'GET') {
            $this->output->set_content_type('application/json');
            $this->output->set_status_header(400);
            $this->output->set_output(json_encode(array('status' => 400, 'message' => 'Bad request.')));
        } else {
            $cekAuthClient = $this->M_auth->checkAuthClient();
            if ($cekAuthClient == true) {
                $auth = $this->M_auth->auth();
                if ($auth['status'] == 200) {
                    $row = $this->Zx_t_indikator_pelayanan_rs_v1_model->getAll();
                    $this->output->set_content_type('application/json');
                    $this->output->set_status_header($auth['status']);
                    $this->output->set_output(json_encode(array('status' => $auth['status'], 'message' => $row)));
                }
            }
        }
    }

    public function by_param($field, $value)
    {
        $method = $_SERVER['REQUEST_METHOD'];
        if ($method != "GET") {
            $this->output->set_content_type('application/json');
            $this->output->set_status_header(400);
            $this->output->set_output(json_encode(array('status' => 400, 'message' => 'Bad request.')));
        } else {
            $cekAuthClient = $this->M_auth->checkAuthClient();
            if ($cekAuthClient == true) {
                $auth = $this->M_auth->auth();
                if ($auth["status"] == 200) {
                    $row = $this->Zx_t_indikator_pelayanan_rs_v1_model->getDetail($field, $value);
                    $this->output->set_content_type('application/json');
                    $this->output->set_status_header($auth["status"]);
                    $this->output->set_output(json_encode(array('status' => $auth["status"], 'message' => $row)));
                }
            }
        }
    }

    // public function by_param($id)
    // {
    //     $method = $_SERVER['REQUEST_METHOD'];
    //     if ($method != "GET") {
    //         $this->output->set_content_type('application/json');
    //         $this->output->set_status_header(400);
    //         $this->output->set_output(json_encode(array('status' => 400, 'message' => 'Bad request.')));
    //     } else {
    //         $cekAuthClient = $this->M_auth->checkAuthClient();
    //         if ($cekAuthClient == true) {
    //             $auth = $this->M_auth->auth();
    //             if ($auth["status"] == 200) {
    //                 $row = $this->Zx_t_indikator_pelayanan_rs_v1_model->getDetail($id);
    //                 $this->output->set_content_type('application/json');
    //                 $this->output->set_status_header($auth["status"]);
    //                 $this->output->set_output(json_encode(array('status' => $auth["status"], 'message' => $row)));
    //             }
    //         }
    //     }
    // }

    public function create()
    {
        $method = $_SERVER['REQUEST_METHOD'];
        if ($method != 'POST') {
            $this->output->set_content_type('application/json');
            $this->output->set_status_header(400);
            $this->output->set_output(json_encode(array('status' => 400, 'message' => 'Bad request.')));
        } else {
            $cekAuthClient = $this->M_auth->checkAuthClient();
            if ($cekAuthClient == true) {
                $auth = $this->M_auth->auth();

                if ($auth['status'] == 200) {
                    $_POST = json_decode(file_get_contents('php://input'), TRUE);

                    $this->_rules();
                    if ($this->form_validation->run() == FALSE) {
                        $this->output
                            ->set_content_type('application/json')
                            ->set_status_header(401)
                            ->set_output(json_encode(array('status' => 401, 'message' => $this->form_validation->error_array())));
                    } else {
                        $row = $this->Zx_t_indikator_pelayanan_rs_v1_model->create($_POST);
                        $this->output
                            ->set_content_type('application/json')
                            ->set_status_header($row['status'])
                            ->set_output(json_encode($row));
                    }
                }
            }
        }
    }

    public function update($id)
    {
        $method = $_SERVER['REQUEST_METHOD'];
        if ($method != 'POST') {
            $this->output->set_content_type('application/json');
            $this->output->set_status_header(400);
            $this->output->set_output(json_encode(array('status' => 400, 'message' => 'Bad request.')));
        } else {
            $cekAuthClient = $this->M_auth->checkAuthClient();
            if ($cekAuthClient == true) {
                $auth = $this->M_auth->auth();

                if ($auth['status'] == 200) {
                    $_POST = json_decode(file_get_contents('php://input'), TRUE);

                    $this->_rules();
                    if ($this->form_validation->run() == FALSE) {
                        $this->output
                            ->set_content_type('application/json')
                            ->set_status_header(401)
                            ->set_output(json_encode(array('status' => 401, 'message' => $this->form_validation->error_array())));
                    } else {
                        $row = $this->Zx_t_indikator_pelayanan_rs_v1_model->update($_POST, $id);
                        $this->output
                            ->set_content_type('application/json')
                            ->set_status_header($row['status'])
                            ->set_output(json_encode($row));
                    }
                }
            }
        }
    }

    public function delete($id)
    {
        $method = $_SERVER['REQUEST_METHOD'];
        if ($method != 'DELETE') {
            $this->output->set_content_type('application/json');
            $this->output->set_status_header(400);
            $this->output->set_output(json_encode(array('status' => 400, 'message' => 'Bad request.')));
        } else {
            $cekAuthClient = $this->M_auth->checkAuthClient();
            if ($cekAuthClient == true) {
                $auth = $this->M_auth->auth();

                if ($auth['status'] == 200) {
                    if ($id == '') {
                        $this->output
                            ->set_content_type('application/json')
                            ->set_status_header(401)
                            ->set_output(json_encode(array('status' => 401, 'message' => 'parameter tidak boleh kosong')));
                    } else {
                        $row = $this->Zx_t_indikator_pelayanan_rs_v1_model->delete($id);
                        $this->output
                            ->set_content_type('application/json')
                            ->set_status_header($row['status'])
                            ->set_output(json_encode($row));
                    }
                }
            }
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('nama_ruangan', 'nama ruangan', 'trim|required');
        $this->form_validation->set_rules('pengunjung_ranap', 'pengunjung ranap', 'trim|required');
        $this->form_validation->set_rules('jumlah_bed', 'jumlah bed', 'trim|required');
        $this->form_validation->set_rules('pasien_keluar', 'pasien keluar', 'trim|required');
        $this->form_validation->set_rules('jmlh_hari_perawatan', 'jmlh hari perawatan', 'trim|required');
        $this->form_validation->set_rules('jmlh_lama_dirawat', 'jmlh lama dirawat', 'trim|required');
        $this->form_validation->set_rules('bor', 'bor', 'trim|required');
        $this->form_validation->set_rules('alos', 'alos', 'trim|required');
        $this->form_validation->set_rules('toi', 'toi', 'trim|required');
        $this->form_validation->set_rules('bto', 'bto', 'trim|required');
        $this->form_validation->set_rules('ndr', 'ndr', 'trim|required');
        $this->form_validation->set_rules('gdr', 'gdr', 'trim|required');
        $this->form_validation->set_rules('tahun', 'tahun', 'trim|required');
        $this->form_validation->set_rules('bulan', 'bulan', 'trim|required');
        $this->form_validation->set_rules('create_date', 'create date', 'trim|required');
        $this->form_validation->set_rules('update_date', 'update date', 'trim|required');

        $this->form_validation->set_rules('id', 'id', 'trim');
        $this->form_validation->set_error_delimiters('', '');
    }
}

/* End of file Zx_t_indikator_pelayanan_rs_v1.php */
/* Location: ./application/controllers/Zx_t_indikator_pelayanan_rs_v1.php */
/* Please DO NOT modify this information : */
/* Generated by Rifai | Codeigniter API Generator 2021-10-19 05:11:45 */
/* rifai.kre@gmail.com */