<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profil_model extends CI_Model
{
    public function get_data()
    {
        $data = $this->db->select('*')
            ->from('profil')
            ->where('id', 1)
            ->get()
            ->row();

        return $data;
    }

    public function update($data)
    {
        $result = $this->db->where('id', 1)
            ->update('profil', $data);

        return $result;
    }
}
