<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Perusahaan_model extends CI_Model
{
    public function list()
    {
        $this->db->select('*');
        $this->db->from('perusahaan');
        $this->db->order_by('id_perusahaan', 'desc');
        return $this->db->get()->result();
    }
    public function addperusahaan($dataku)
    {
        $this->db->insert('perusahaan', $dataku);
    }
    public function editperusahaan($dataku)
    {
        $this->db->update('perusahaan', $dataku);
    }
    public function hapusperusahaan($dataku)
    {
        $this->db->update('perusahaan', $dataku);
    }
}
