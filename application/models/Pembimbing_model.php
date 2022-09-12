<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pembimbing_model extends CI_Model
{
    public function list()
    {
        $this->db->select('*');
        $this->db->from('pembimbing');
        $this->db->order_by('id_pembimbing', 'desc');
        return $this->db->get()->result();
    }
    public function addpembimbing($dataku)
    {
        $this->db->insert('pembimbing', $dataku);
    }
    public function editpembimbing($dataku)
    {
        $this->db->update('pembimbing', $dataku);
    }
    public function hapuspembimbing($dataku)
    {
        $this->db->update('pembimbing', $dataku);
    }
}
