<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu_model extends CI_Model
{
    public function getSubMenu()
    {
        $query = "SELECT `user_sub_menu`.*, `user_menu`. `menu` 
                    FROM `user_sub_menu`
                    JOIN `user_menu`
                    ON `user_sub_menu`.`menu_id` = `user_menu`.`id`
        ";

        return $this->db->query($query)->result_array();
    }

    public function getGaji()
    {
        $query = "SELECT `gaji`.*, `user`.`name` 
                    FROM `gaji`
                    JOIN `user`
                    ON `gaji`.`id_user` = `user`.`id`
        ";

        return $this->db->query($query)->result_array();
    }
    public function getPerusahaan()
    {
        $query = "SELECT 'perusahaan'.*, 'user'.'name'
                    FROM 'perusahaan'
                    JOIN 'user'
                    ON 'perusahaan'.'id_user' = 'user'.'id'
        ";
    }
    public function getJurusan()
    {
        $query = "SELECT 'siswa'.*, 'jurusan'.'nama_jurusan'
                    FROM 'siswa'
                    JOIN 'jurusan'
                    ON 'siswa'.'id_jurusan' = 'jurusan'.'id_jurusan'
        ";
    }
}
