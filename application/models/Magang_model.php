<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Magang_model extends CI_Model
{
    public function magang()
    {
        $query = ("SELECT * FROM (magang) JOIN siswa ON siswa.id_siswa=magang.id_siswa JOIN pembimbing ON pembimbing.id_pembimbing=magang.id_pembimbing JOIN perusahaan ON perusahaan.id_perusahaan=pembimbing.id_pembimbing
        ");
        return $this->db->query($query)->result_array();
        // return $this->db->select('magang.*')
        //     ->join('siswa', 'magang.id_siswa=siswa.id_siswa')
        //     ->join('pembimbing', 'magang.id_pembimbing=pembimbing.id_pembimbing')
        //     ->join('perusahaan', 'magang.id_perusahaan=perusahaan.id_perusahaan')
        //     ->get()->result_array();
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
    public function dataPerusahaan()
    {
        $this->db->select('*');
        $this->db->select('perusahaan.*');
        $this->db->from('perusahaan');
        return $this->db->get()->result_array();
    }
}
