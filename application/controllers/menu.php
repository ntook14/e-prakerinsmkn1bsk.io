<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        helper_di_controller();
    }

    public function index()
    {
        $dataku['judul'] = 'Menu Management';
        $dataku['user'] = $this->db->get_where(
            'user',
            [
                'email' => $this->session->userdata('email')
            ]
        )->row_array(); //row array untuk satu data

        $dataku['menu'] = $this->db->get('user_menu')->result_array(); //result array untuk banyak data dikirim ke index.php yang ada di Menu yang nantinya ['menu'] akan di panggil di foreach

        $this->form_validation->set_rules(
            'menu',
            'Menu',
            'required'
        );

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $dataku);
            $this->load->view('templates/sidebar', $dataku);
            $this->load->view('templates/topbar', $dataku);
            $this->load->view('menu/index', $dataku);
            $this->load->view('templates/footer');
        } else {
            $this->db->insert('user_menu', ['menu' => $this->input->post('menu')]);
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success" role="alert">Menu Baru Berhasil ditambahkan</div>'
            );
            redirect('menu');
        }
    }

    public function submenu()
    {
        $dataku['judul'] = 'Sub Menu Management';
        $dataku['user'] = $this->db->get_where(
            'user',
            [
                'email' => $this->session->userdata('email')
            ]
        )->row_array(); //row array untuk satu data

        $this->load->model('Menu_Model', 'menu');
        $dataku['subMenu'] = $this->menu->getSubmenu();
        $dataku['menu'] = $this->db->get('user_menu')->result_array();
        $this->form_validation->set_rules(
            'title',
            'Title',
            'required'
        );
        $this->form_validation->set_rules(
            'menu_id',
            'Menu',
            'required'
        );
        $this->form_validation->set_rules(
            'url',
            'Url',
            'required'
        );
        $this->form_validation->set_rules(
            'icon',
            'Icon',
            'required'
        );
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $dataku);
            $this->load->view('templates/sidebar', $dataku);
            $this->load->view('templates/topbar', $dataku);
            $this->load->view('menu/submenu', $dataku);
            $this->load->view('templates/footer');
        } else {
            $dataku = [
                'title' => $this->input->post('title'),
                'menu_id' => $this->input->post('menu_id'),
                'url' => $this->input->post('url'),
                'icon' => $this->input->post('icon'),
                'is_active' => $this->input->post('is_active')
            ];
            $this->db->insert('user_sub_menu', $dataku);
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success" role="alert">Sub Menu Baru Berhasil ditambahkan</div>'
            );
            redirect('menu/submenu');
        }
    }
}
