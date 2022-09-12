<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Nilai_model extends CI_Model
{
    public function list()
    {
        $this->db->select('*');
        $this->db->from('nilai');
        $this->db->order_by('id_nilai', 'desc');
        return $this->db->get()->result();
    }
    public function addnilai($dataku)
    {
        $this->db->insert('nilai', $dataku);
    }
    public function editnilai($dataku)
    {
        $this->db->update('nilai', $dataku);
    }
    public function hapusnilai($dataku)
    {
        $this->db->delete('nilai', $dataku);
    }
    public function nilai()
    {
        $this->db->select('*');
        $this->db->from('nilai');
        $this->db->join('siswa','nilai.id_siswa = siswa.id_siswa');
        $this->db->join('pembimbing','nilai.id_pembimbing = pembimbing.id_pembimbing');

        return $this->db->get()->result_array();
    }
    public function dataPembimbing()
    {
        $this->db->select('*');
        $this->db->select('pembimbing.*');
        $this->db->from('pembimbing');
        return $this->db->get()->result_array();
    }
    public function dataSiswa()
    {
        $this->db->select('*');
        $this->db->select('siswa.*');
        $this->db->from('siswa');
        return $this->db->get()->result_array();
    }
}
