<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pelayanan_model extends CI_Model
{
    public function get_pelayanan()
    {
        $result = $this->db->select('*')
            ->from('pelayanan')
            ->get()
            ->result();

        return $result;
    }

    public function get_pelayanan_by_id($id)
    {
        $result = $this->db->select('*')
            ->from('pelayanan')
            ->where('id', $id)
            ->get()
            ->row();

        return $result;
    }

    public function create_pelayanan($data)
    {
        $result = $this->db->insert('pelayanan', $data);

        return $result;
    }

    public function update_pelayanan($id, $data)
    {
        $result = $this->db->where('id', $id)
            ->update('pelayanan', $data);

        return $result;
    }

    public function delete_pelayanan($id)
    {
        $result = $this->db->where('id', $id)
            ->delete('pelayanan');

        return $result;
    }
}
