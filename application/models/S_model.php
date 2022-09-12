
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class S_model extends CI_Model
{
    public function addsiswa()
    {
        $query = "SELECT `siswa`.*, `jurusan`. `nama_jurusan` 
                    FROM `siswa`
                    JOIN `jurusan`
                    ON `siswa`.`id_jurusan` = `jurusan`.`id_jurusan`
        ";

        return $this->db->query($query)->result_array();
    }
}
