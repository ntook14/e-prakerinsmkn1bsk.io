<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Siswa_model extends CI_Model
{
    public function list()
    {
        $this->db->select('*');
        $this->db->select('siswa.*');
        $this->db->from('siswa');
        $this->db->join('pembimbing', 'siswa.id_pembimbing=pembimbing.id_pembimbing');
        $this->db->order_by('siswa.id_siswa', 'desc');
        return $this->db->get()->result_array();
    }
    public function Listhome()
    {
        $this->db->select('*');
        $this->db->from('siswa');
        $this->db->order_by('id_siswa', 'desc');
        return $this->db->get()->result();
    }

    public function dataPembimbing()
    {
        $this->db->select('*');
        $this->db->select('pembimbing.*');
        $this->db->from('pembimbing');
        return $this->db->get()->result_array();
    }
    public function addsiswa($dataku)
    {
        $this->db->insert('siswa', $dataku);
    }
    public function editsiswa($dataku)
    {
        $this->db->update('siswa', $dataku);
    }
    public function hapussiswa($dataku)
    {
        $this->db->update('siswa', $dataku);
    }
}
