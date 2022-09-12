<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        helper_di_controller();
    }

    public function index()
    {
        $dataku['judul'] = 'My Profile';
        $dataku['user'] = $this->db->get_where(
            'user',
            [
                'email' => $this->session->userdata('email')
            ]
        )->row_array();

        $this->load->view('templates/header', $dataku);
        $this->load->view('templates/sidebar', $dataku);
        $this->load->view('templates/topbar', $dataku);
        $this->load->view('user/index', $dataku);
        $this->load->view('templates/footer');
    }

    public function edit()
    {
        $dataku['judul'] = 'Edit Profile';
        $dataku['user'] = $this->db->get_where(
            'user',
            [
                'email' => $this->session->userdata('email')
            ]
        )->row_array();

        $this->form_validation->set_rules('name', 'Full Name', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $dataku);
            $this->load->view('templates/sidebar', $dataku);
            $this->load->view('templates/topbar', $dataku);
            $this->load->view('user/edit', $dataku);
            $this->load->view('templates/footer');
        } else {
            $name = $this->input->post('name');
            $email = $this->input->post('email');

            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '2048';
                $config['upload_path'] = './assets/img/profile/';
                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $old_image = $dataku['user']['image'];
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/profile/' . $old_image);
                    }


                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }


            $this->db->set('name', $name);
            $this->db->where('email', $email);
            $this->db->update('user');

            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success" role="alert">Profil Berhasil di Update</div>'
            );
            redirect('user');
        }
    }

    public function gaji()
    {
        $dataku['judul'] = 'Daftar Gaji';
        $dataku['user'] = $this->db->get_where(
            'user',
            [
                'email' => $this->session->userdata('email')
            ]
        )->row_array(); //row array untuk satu data

        $this->load->model('Menu_Model', 'menu');
        $dataku['subGaji'] = $this->menu->getGaji();
        $dataku['name'] = $this->db->get('user')->result_array();
        $this->form_validation->set_rules(
            'gaji_pokok',
            'GajiPokok',
            'required'
        );
        $this->form_validation->set_rules(
            'lembur',
            'Lembur',
            'required'
        );
        $this->form_validation->set_rules(
            'uang_makan',
            'UangMakan',
            'required'
        );
        $this->form_validation->set_rules(
            'transportasi',
            'Transportasi',
            'required'
        );
        $this->form_validation->set_rules(
            'hutang',
            'Hutang',
            'required'
        );
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $dataku);
            $this->load->view('templates/sidebar', $dataku);
            $this->load->view('templates/topbar', $dataku);
            $this->load->view('user/subGaji', $dataku);
            $this->load->view('templates/footer');
        } else {
            $dataku = [
                'gaji_pokok' => $this->input->post('gaji_pokok'),
                'lembur' => $this->input->post('lembur'),
                'uang_makan' => $this->input->post('uang_makan'),
                'transportasi' => $this->input->post('transportasi'),
                'hutang' => $this->input->post('hutang')
            ];
            $this->db->insert('gaji', $dataku);
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success" role="alert">Sub Menu Baru Berhasil ditambahkan</div>'
            );
            redirect('user/gaji');
        }
    }
    public function perusahaan()
    {
        $dataku['judul'] = 'Daftar perusahaan';
        $dataku['user'] = $this->db->get_where(
            'user',
            [
                'email' => $this->session->userdata('email')
            ]
        )->row_array();
        $dataku['perusahaan'] = $this->db->get('perusahaan')->result_array();

        $this->load->view('templates/header', $dataku);
        $this->load->view('templates/sidebar', $dataku);
        $this->load->view('templates/topbar', $dataku);
        $this->load->view('user/perusahaan', $dataku);
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
        $dataku['nilai'] = $this->db->get('nilai')->result_array();
        $this->load->view('templates/header', $dataku);
        $this->load->view('templates/sidebar', $dataku);
        $this->load->view('templates/topbar', $dataku);
        $this->load->view('siswa/nilai', $dataku);
        $this->load->view('templates/footer');
    }
    public function magang()
    {
        $dataku['judul'] = 'Prakerin Siswa';
        $dataku['user'] = $this->db->get_where(
            'user',
            [
                'email' => $this->session->userdata('email')
            ]
        )->row_array();
        $this->load->model('Magang_model');
        $dataku['magang'] = $this->Magang_model->magang();
        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success" role="alert"> Selamat Anda Telah Memilih Tempat Prakerin </div>'
        );
        $this->load->view('templates/header', $dataku);
        $this->load->view('templates/sidebar', $dataku);
        $this->load->view('templates/topbar', $dataku);
        $this->load->view('user/magang', $dataku);
        $this->load->view('templates/footer');
    }
}
