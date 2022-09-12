<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pembimbing extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        helper_di_controller();
    }

    public function siswa()
    {
        $dataku['judul'] = 'List Data Siswa';
        $dataku['user'] = $this->db->get_where(
            'user',
            [
                'email' => $this->session->userdata('email')
            ]
        )->row_array();
        $dataku['siswa'] = $this->db->get('siswa')->result_array();

        $this->load->view('templates/header', $dataku);
        $this->load->view('templates/sidebar', $dataku);
        $this->load->view('templates/topbar', $dataku);
        $this->load->view('pembimbing/siswa', $dataku);
        $this->load->view('templates/footer');
    }
    public function nilai()
    {
        $dataku['judul'] = 'Nilai Siswa';
        $dataku['user'] = $this->db->get_where(
            'user',
            [
                'email' => $this->session->userdata('email')
            ]
        )->row_array();
        $dataku['siswa'] = $this->db->get('siswa')->result_array();

        $this->load->view('templates/header', $dataku);
        $this->load->view('templates/sidebar', $dataku);
        $this->load->view('templates/topbar', $dataku);
        $this->load->view('pembimbing/nilai', $dataku);
        $this->load->view('templates/footer');
    }
}
