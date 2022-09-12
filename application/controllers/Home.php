<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Siswa_model');
        $this->load->model('Pembimbing_model');
        $this->load->model('Perusahaan_model');
    }

    public function index()
    {
        $dataku = array(
            'title' => 'Halaman Utama',
            'isi' => 'home/index'

        );
        $this->load->view('home/index', $dataku);
    }
    public function about()
    {
        $dataku = array(
            'title' => 'Apa Itu Prakerin',
            'isi' => 'home/about'

        );
        $this->load->view('home/layout/v_wrapper', $dataku);
    }
    public function alur()
    {
        $dataku = array(
            'title' => 'Alur Proses Prakerin',
            'isi' => 'home/alur'

        );
        $this->load->view('home/layout/v_wrapper', $dataku);
    }
    public function contact()
    {
        $dataku = array(
            'title' => 'Info Kontak',
            'isi' => 'home/contact'

        );
        $this->load->view('home/layout/v_wrapper', $dataku);
    }
    public function siswa()
    {
        $dataku = array(
            'title' => 'List Data Siswa',
            'siswa'    => $this->Siswa_model->Listhome(),
            'isi' => 'home/siswa'

        );
        $this->load->view('home/layout/v_wrapper', $dataku, FALSE);
    }
    public function pembimbing()
    {
        $dataku = array(
            'title' => 'List Data Pembimbing',
            'pembimbing'    => $this->Pembimbing_model->list(),
            'isi' => 'home/pembimbing'

        );
        $this->load->view('home/layout/v_wrapper', $dataku, FALSE);
    }
    public function perusahaan()
    {
        $dataku = array(
            'title' => 'List Data Tempat Prakerin',
            'perusahaan'    => $this->Perusahaan_model->list(),
            'isi' => 'home/perusahaan'

        );
        $this->load->view('home/layout/v_wrapper', $dataku, FALSE);
    }
    public function info_kuota()
    {
        $dataku = array(
            'title' => 'Info Kuota Yang Tersedia',
            'perusahaan'    => $this->Perusahaan_model->list(),
            'isi' => 'home/info_kuota'

        );
        $this->load->view('home/layout/v_wrapper', $dataku, FALSE);
    }
    public function jurusan_tersedia()
    {
        $dataku = array(
            'title' => 'Info Jurusan Yang Tersedia',
            'perusahaan'    => $this->Perusahaan_model->list(),
            'isi' => 'home/jurusan_tersedia'

        );
        $this->load->view('home/layout/v_wrapper', $dataku, FALSE);
    }
}
