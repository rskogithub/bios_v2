<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Frontend_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    function cari($nomr, $tgl_lhr)
    {
        $this->db->from('t_periode_rawat a');
        $this->db->join('v_list_ranap b', 'on a.id_reg=b.id_admission', 'left');
        $this->db->where('b.nomr', $nomr);
        $this->db->where('b.tgllahir', $tgl_lhr);
        $this->db->group_by('a.id_reg');
        return $this->db->get()->row();
    }
}
