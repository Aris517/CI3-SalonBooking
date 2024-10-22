<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Akun_model extends CI_Model
{
    public function tambah($data)
    {
        $data = $this->db->insert('akun', $data);

        return $data;
    }

    public function update($id, $data)
    {
        $data = $this->db->where('id', $id)->update('akun', $data);

        return $data;
    }

    public function get_data_by_email($email)
    {
        $data = $this->db->select('*')
            ->from('akun')
            ->where('email', $email)
            ->get()
            ->row();

        return $data;
    }

    public function customer()
    {
        $data = $this->db->select('*')
            ->from('akun')
            ->where('role', 'Customer')
            ->get()
            ->result();

        return $data;
    }
    public function findCustomer($id)
    {
        $data = $this->db->select('*')
            ->from('akun')
            ->where('role', 'Customer')
            ->where('id', $id)
            ->get()
            ->row();

        return $data;
    }
}
