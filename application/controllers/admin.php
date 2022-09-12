<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        helper_di_controller();
    }
    public function index()
    {
        $dataku['judul'] = 'Dashboard';
        $dataku['user'] = $this->db->get_where(
            'user',
            [
                'email' => $this->session->userdata('email')
            ]
        )->row_array();

        $this->load->view('templates/header', $dataku);
        $this->load->view('templates/sidebar', $dataku);
        $this->load->view('templates/topbar', $dataku);
        $this->load->view('admin/index', $dataku);
        $this->load->view('templates/footer');
    }

    public function role()
    {
        $dataku['judul'] = 'Role';
        $dataku['user'] = $this->db->get_where(
            'user',
            [
                'email' => $this->session->userdata('email')
            ]
        )->row_array();

        $dataku['role'] = $this->db->get('user_role')->result_array();

        $this->load->view('templates/header', $dataku);
        $this->load->view('templates/sidebar', $dataku);
        $this->load->view('templates/topbar', $dataku);
        $this->load->view('admin/role', $dataku);
        $this->load->view('templates/footer');
    }

    public function karyawan()
    {
        $dataku['judul'] = 'Data Karyawan';
        $dataku['user'] = $this->db->get_where(
            'user',
            [
                'email' => $this->session->userdata('email')
            ]
        )->row_array();

        $dataku['users'] = $this->db->get('user')->result_array();

        $this->load->view('templates/header', $dataku);
        $this->load->view('templates/sidebar', $dataku);
        $this->load->view('templates/topbar', $dataku);
        $this->load->view('admin/karyawan', $dataku);
        $this->load->view('templates/footer');
    }

    public function t_karyawan()
    {
        $dataku['user'] = $this->db->get_where(
            'user',
            [
                'email' => $this->session->userdata('email')
            ]
        )->row_array();
        /*
        if ($this->session->userdata('email')){
            redirect('user');
        }
*/
        $this->form_validation->set_rules(
            'namo', //diambiek dari name=""
            'Namo', //buek suko2 ati
            'required|trim' //harus diisi maksud ee
        );
        $this->form_validation->set_rules(
            'email',
            'Email',
            'required|trim|valid_email|is_unique[user.email]',
            [
                'is_unique' => 'Email Sudah Digunakan'
            ]
        );

        $this->form_validation->set_rules(
            'alamat', //diambiek dari name=""
            'Alamat', //buek suko2 ati
            'required|trim' //harus diisi maksud ee
        );

        $this->form_validation->set_rules(
            'devisi', //diambiek dari name=""
            'Devisi', //buek suko2 ati
            'required|trim' //harus diisi maksud ee
        );

        $this->form_validation->set_rules(
            'jabatan', //diambiek dari name=""
            'Jabatan', //buek suko2 ati
            'required|trim' //harus diisi maksud ee
        );

        $this->form_validation->set_rules(
            'password1',
            'Password',
            'required|trim|min_length[3]|matches[password2]',
            [
                'matches' => 'Password Tidak Cocok!!',
                'min_length' => 'Password Terlalu Pendek'
            ]
        );
        $this->form_validation->set_rules(
            'password2',
            'Password',
            'required|trim|matches[password1]'
        );

        if ($this->form_validation->run() == false) {
            $cilok['kapaloe'] = 'User Registration';
            $this->load->view('templates/auth_header', $cilok);
            $this->load->view('Admin/register');
            $this->load->view('templates/auth_footer');
        } else {
            $sonok = [
                'name' => htmlspecialchars($this->input->post('namo', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'alamat' => htmlspecialchars($this->input->post('alamat', true)),
                'devisi' => htmlspecialchars($this->input->post('devisi', true)),
                'jabatan' => htmlspecialchars($this->input->post('jabatan', true)),
                'image' => 'default.jpg',
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role_id' => 2,
                'is_active' => 1,
                'date_created' => time()
            ];
            $this->db->insert('user', $sonok);
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success" role="alert"> Selamat akun Telah dibuat.</div>'
            );
            redirect('admin/karyawan');
        }
    }
    public function siswa()
    {
        $dataku['judul'] = 'Data Siswa';
        $dataku['user'] = $this->db->get_where(
            'user',
            [
                'email' => $this->session->userdata('email')
            ]
        )->row_array();
        $this->load->model('Siswa_model');
        $dataku['siswa'] = $this->Siswa_model->list();
        $dataku['dataPembimbing'] = $this->Siswa_model->dataPembimbing();

        $this->load->view('templates/header', $dataku);
        $this->load->view('templates/sidebar', $dataku);
        $this->load->view('templates/topbar', $dataku);
        $this->load->view('admin/siswa', $dataku);
        $this->load->view('templates/footer');
    }
    public function addsiswa()
    {
        $dataku['judul'] = 'Add Siswa';
        $dataku['user'] = $this->db->get_where(
            'user',
            [
                'email' => $this->session->userdata('email')
            ]
        )->row_array();
        $this->load->model('Siswa_model');
        $dataku['siswa'] = $this->db->get('siswa')->result_array();

        $this->load->view('templates/header', $dataku);
        $this->load->view('templates/sidebar', $dataku);
        $this->load->view('templates/topbar', $dataku);
        $this->load->view('admin/siswa', $dataku);
        $this->load->view('templates/footer');

        $sonok = [
            'nis' => htmlspecialchars($this->input->post('nis', true)),
            'nama_siswa' => htmlspecialchars($this->input->post('nama_siswa', true)),
            'jenkel' => htmlspecialchars($this->input->post('jenkel', true)),
            'alamat' => htmlspecialchars($this->input->post('alamat', true)),
            'jurusan' => htmlspecialchars($this->input->post('jurusan', true)),
            'id_pembimbing' => 1,
        ];
        $this->db->insert('siswa', $sonok);
        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success" role="alert"> Siswa Berhasil Ditambahkan</div>'
        );
        redirect('admin/siswa');
    }
    public function editsiswa()
    {
        $this->load->model('Siswa_model');
        $id_siswa = htmlspecialchars($this->input->post('id_siswa', true));
        $dataku = [
            'nis' => htmlspecialchars($this->input->post('nis', true)),
            'nama_siswa' => htmlspecialchars($this->input->post('nama_siswa', true)),
            'jenkel' => htmlspecialchars($this->input->post('jenkel', true)),
            'alamat' => htmlspecialchars($this->input->post('alamat', true)),
            'jurusan' => htmlspecialchars($this->input->post('jurusan', true)),
            'id_pembimbing' => htmlspecialchars($this->input->post('id_pembimbing', true)),
        ];
        $this->db->where('id_siswa', $id_siswa);
        $this->db->update('siswa', $dataku);
        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success" role="alert"> Data Berhasi Diubah </div>'
        );
        redirect('admin/siswa');
    }
    public function hapussiswa()
    {
        $this->load->model('Siswa_model');
        $id_siswa = htmlspecialchars($this->input->post('id_siswa', true));
        $this->db->where('id_siswa', $id_siswa)->delete('siswa');
        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success" role="alert"> Data Berhasi Dihapus </div>'
        );
        redirect('admin/siswa');
    }
    public function pembimbing()
    {
        $dataku['judul'] = 'Data Pembimbing';
        $dataku['user'] = $this->db->get_where(
            'user',
            [
                'email' => $this->session->userdata('email')
            ]
        )->row_array();
        $dataku['pembimbing'] = $this->db->get('pembimbing')->result_array();

        $this->load->view('templates/header', $dataku);
        $this->load->view('templates/sidebar', $dataku);
        $this->load->view('templates/topbar', $dataku);
        $this->load->view('admin/pembimbing', $dataku);
        $this->load->view('templates/footer');
    }
    public function addpembimbing()
    {
        $dataku['judul'] = 'Add Pembimbing';
        $dataku['user'] = $this->db->get_where(
            'user',
            [
                'email' => $this->session->userdata('email')
            ]
        )->row_array();
        $this->load->model('Pembimbing_model');
        $dataku = [
            'nip' => htmlspecialchars($this->input->post('nip', true)),
            'nama_pembimbing' => htmlspecialchars($this->input->post('nama_pembimbing', true)),
            'jenkel' => htmlspecialchars($this->input->post('jenkel', true)),
            'alamat' => htmlspecialchars($this->input->post('alamat', true)),
        ];
        $this->db->insert('pembimbing', $dataku);
        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success" role="alert"> Pembimbing Berhasil Ditambahkan</div>'
        );
        redirect('admin/pembimbing');
    }
    public function editpembimbing()
    {
        $this->load->model('Pembimbing_model');
        $id_pembimbing = htmlspecialchars($this->input->post('id_pembimbing', true));
        $dataku = [
            'nip' => htmlspecialchars($this->input->post('nip', true)),
            'nama_pembimbing' => htmlspecialchars($this->input->post('nama_pembimbing', true)),
            'jenkel' => htmlspecialchars($this->input->post('jenkel', true)),
            'alamat' => htmlspecialchars($this->input->post('alamat', true)),
        ];
        $this->db->where('id_pembimbing', $id_pembimbing);
        $this->db->update('pembimbing', $dataku);
        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success" role="alert"> Data Berhasi Diubah </div>'
        );
        redirect('admin/pembimbing');
    }
    public function hapuspembimbing()
    {
        $this->load->model('Pembimbing_model');
        $id_pembimbing = htmlspecialchars($this->input->post('id_pembimbing', true));
        $this->db->where('id_pembimbing', $id_pembimbing)->delete('pembimbing');
        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success" role="alert"> Data Berhasi Dihapus </div>'
        );
        redirect('admin/pembimbing');
    }
    public function perusahaan()
    {
        $dataku['judul'] = 'Data perusahaan';
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
        $this->load->view('admin/perusahaan', $dataku);
        $this->load->view('templates/footer');
    }
    public function addperusahaan()
    {
        $dataku['judul'] = 'Add Perusahaan';
        $dataku['user'] = $this->db->get_where(
            'user',
            [
                'email' => $this->session->userdata('email')
            ]
        )->row_array();
        $this->load->model('Perusahaan_model');
        $dataku = [
            'nama_perusahaan' => htmlspecialchars($this->input->post('nama_perusahaan', true)),
            'alamat' => htmlspecialchars($this->input->post('alamat', true)),
            'jurusan_diterima' => htmlspecialchars($this->input->post('jurusan_diterima', true)),
            'kuota' => htmlspecialchars($this->input->post('kuota', true)),
        ];
        $this->db->insert('perusahaan', $dataku);
        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success" role="alert"> Perusahaan Berhasil Ditambahkan</div>'
        );
        redirect('admin/perusahaan');
    }
    public function editperusahaan()
    {
        $this->load->model('Perusahaan_model');
        $id_perusahaan = htmlspecialchars($this->input->post('id_perusahaan', true));
        $dataku = [
            'nama_perusahaan' => htmlspecialchars($this->input->post('nama_perusahaan', true)),
            'alamat' => htmlspecialchars($this->input->post('alamat', true)),
            'jurusan_diterima' => htmlspecialchars($this->input->post('jurusan_diterima', true)),
            'kuota' => htmlspecialchars($this->input->post('kuota', true)),
        ];
        $this->db->where('id_perusahaan', $id_perusahaan);
        $this->db->update('perusahaan', $dataku);
        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success" role="alert"> Data Berhasi Diubah </div>'
        );
        redirect('admin/perusahaan');
    }
    public function hapusperusahaan()
    {
        $this->load->model('Perusahaan_model');
        $id_perusahaan = htmlspecialchars($this->input->post('id_perusahaan', true));
        $this->db->where('id_perusahaan', $id_perusahaan)->delete('perusahaan');
        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success" role="alert"> Data Berhasi Dihapus </div>'
        );
        redirect('admin/perusahaan');
    }

    public function nilai()
    {
        $dataku['judul'] = 'Data Nilai Siswa';
        $dataku['user'] = $this->db->get_where(
            'user',
            [
                'email' => $this->session->userdata('email')
            ]
        )->row_array();
        $this->load->model('Nilai_model');
        $dataku['nilai'] = $this->Nilai_model->nilai();
        $dataku['nama_siswa'] = $this->Nilai_model->dataSiswa();
        $dataku['nama_pembimbing'] = $this->Nilai_model->dataPembimbing();
        $this->load->view('templates/header', $dataku);
        $this->load->view('templates/sidebar', $dataku);
        $this->load->view('templates/topbar', $dataku);
        $this->load->view('admin/nilai', $dataku);
        $this->load->view('templates/footer');
    }
    public function addnilai()
    {
        $dataku['judul'] = 'Add Nilai';
        $dataku['user'] = $this->db->get_where(
            'user',
            [
                'email' => $this->session->userdata('email')
            ]
        )->row_array();
        $this->load->model('Nilai_model');
        // $id_siswa = htmlspecialchars($this->input->post('$id_siswa', true));
        // $id_pembimbing = htmlspecialchars($this->input->post('id_pembimbing', true));
        $sonok = [
            'id_siswa' => htmlspecialchars($this->input->post('id_siswa', true)),
            'nilai_dudi' => htmlspecialchars($this->input->post('nilai_dudi', true)),
            'nilai_laporan' => htmlspecialchars($this->input->post('nilai_laporan', true)),
            'nilai_akhir' => htmlspecialchars ($this->input->post('nilai_akhir', true)),
            'id_pembimbing' => htmlspecialchars($this->input->post('id_pembimbing', true)),
        ];
        $this->db->insert('nilai', $sonok);
        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success" role="alert"> Nilai Berhasil Ditambahkan</div>'
        );
        redirect('admin/nilai');   
    }
    public function editnilai()
    {
        $this->load->model('Nilai_model');
        $id_nilai = htmlspecialchars($this->input->post('id_nilai', true));
        $dataku = [
            'id_siswa' => htmlspecialchars($this->input->post('id_siswa', true)),
            'nilai_dudi' => htmlspecialchars($this->input->post('nilai_dudi', true)),
            'nilai_laporan' => htmlspecialchars($this->input->post('nilai_laporan', true)),
            'nilai_akhir' => htmlspecialchars ($this->input->post('nilai_akhir', true)),
            'id_pembimbing' => htmlspecialchars($this->input->post('id_pembimbing', true)),
        ];
        $this->db->where('id_nilai', $id_nilai);
        $this->db->update('nilai', $dataku);
        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success" role="alert"> Data Berhasi Diubah </div>'
        );
        redirect('admin/nilai');
    }
    public function hapusnilai()
    {
        $this->load->model('Nilai_model');
        $id_nilai = htmlspecialchars($this->input->post('id_nilai', true));
        $this->db->where('id_nilai', $id_nilai)->delete('nilai');
        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success" role="alert"> Data Berhasi Dihapus </div>'
        );
        redirect('admin/nilai');
    }


    // public function gaji()
    // {
    //     $dataku['judul'] = 'Data Gaji';
    //     $dataku['user'] = $this->db->get_where(
    //         'user',
    //         [
    //             'email' => $this->session->userdata('email')
    //         ]
    //     )->row_array(); //row array untuk satu data

    //     $this->load->model('Menu_Model', 'menu');
    //     $dataku['subGaji'] = $this->menu->getGaji();
    //     $dataku['name'] = $this->db->get('user')->result_array();
    //     $this->form_validation->set_rules(
    //         'gaji_pokok',
    //         'GajiPokok',
    //         'required'
    //     );
    //     $this->form_validation->set_rules(
    //         'lembur',
    //         'Lembur',
    //         'required'
    //     );
    //     $this->form_validation->set_rules(
    //         'uang_makan',
    //         'UangMakan',
    //         'required'
    //     );
    //     $this->form_validation->set_rules(
    //         'transportasi',
    //         'Transportasi',
    //         'required'
    //     );
    //     $this->form_validation->set_rules(
    //         'hutang',
    //         'Hutang',
    //         'required'
    //     );
    //     if ($this->form_validation->run() == false) {
    //         $this->load->view('templates/header', $dataku);
    //         $this->load->view('templates/sidebar', $dataku);
    //         $this->load->view('templates/topbar', $dataku);
    //         $this->load->view('admin/subGaji', $dataku);
    //         $this->load->view('templates/footer');
    //     } else {
    //         $dataku = [
    //             'gaji_pokok' => $this->input->post('gaji_pokok'),
    //             'lembur' => $this->input->post('lembur'),
    //             'uang_makan' => $this->input->post('uang_makan'),
    //             'transportasi' => $this->input->post('transportasi'),
    //             'hutang' => $this->input->post('hutang')
    //         ];
    //         $this->db->insert('gaji', $dataku);
    //         $this->session->set_flashdata(
    //             'message',
    //             '<div class="alert alert-success" role="alert">Sub Menu Baru Berhasil ditambahkan</div>'
    //         );
    //         redirect('admin/gaji');
    //     }
    // }

    public function roleAccess($role_id)
    {
        $dataku['judul'] = 'Role Access';
        $dataku['user'] = $this->db->get_where(
            'user',
            [
                'email' => $this->session->userdata('email')
            ]
        )->row_array();

        $dataku['role'] = $this->db->get_where('user_role', ['id' => $role_id])->row_array();

        $this->db->where('id !=', 1);
        $dataku['menu'] = $this->db->get('user_menu')->result_array();

        $this->load->view('templates/header', $dataku);
        $this->load->view('templates/sidebar', $dataku);
        $this->load->view('templates/topbar', $dataku);
        $this->load->view('admin/roleaccess', $dataku);
        $this->load->view('templates/footer');
    }


    public function changeAccess()
    {
        $menu_id = $this->input->post('menuId');
        $role_id = $this->input->post('roleId');

        $dataku = [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ];

        $result = $this->db->get_where('user_access_menu', $dataku);

        if ($result->num_rows() < 1) {
            $this->db->insert('user_access_menu', $dataku);
        } else {
            $this->db->delete('user_access_menu', $dataku);
        }
        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success" role="alert"> Akses dirubah </div>'
        );
    }
}
