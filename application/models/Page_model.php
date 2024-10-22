<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Page_model extends CI_Model
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

    public function get_banner_mua()
    {
        $data = $this->db->select('*')
            ->from('page')
            ->where('id', 1)
            ->get()
            ->row();

        return $data;
    }

    public function get_banner_sewa()
    {
        $data = $this->db->select('*')
            ->from('page')
            ->where('id', 2)
            ->get()
            ->row();

        return $data;
    }

    public function get_banner()
    {
        $data = $this->db->select('*')
            ->from('page')
            ->get()
            ->result();

        return $data;
    }

    public function update($data)
    {
        $result = $this->db->where('id', 1)
            ->update('profil', $data);

        return $result;
    }

    public function update_banner($id, $data)
    {
        $result = $this->db->where('id', $id)
            ->update('page', $data);

        return $result;
    }
}
