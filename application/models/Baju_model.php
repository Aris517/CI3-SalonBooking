<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Baju_model extends CI_Model
{
    //data baju

    public function get_baju()
    {
        $result = $this->db->select('baju.*, kategori_baju.kategori_baju')
            ->from('baju')
            ->join('kategori_baju', 'baju.id_kategori_baju = kategori_baju.id')
            ->get()
            ->result();

        return $result;
    }

    public function get_baju_by_id($id)
    {
        $result = $this->db->select('baju.*, kategori_baju.kategori_baju')
            ->from('baju')
            ->join('kategori_baju', 'kategori_baju.id = baju.id_kategori_baju')
            ->where('baju.id', $id)
            ->get()
            ->row();

        return $result;
    }

    public function create_baju($data)
    {
        $result = $this->db->insert('baju', $data);

        return $result;
    }

    public function update_baju($id, $data)
    {
        $result = $this->db->where('id', $id)
            ->update('baju', $data);

        return $result;
    }

    public function delete_baju($id)
    {
        $result = $this->db->where('id', $id)
            ->delete('baju');

        return $result;
    }

    //kategori_baju

    public function get_kategori()
    {
        $result = $this->db->select('*')
            ->from('kategori_baju')
            ->get()
            ->result();

        return $result;
    }

    public function get_kategori_by_id($id)
    {
        $result = $this->db->select('*')
            ->from('kategori_baju')
            ->where('id', $id)
            ->get()
            ->row();

        return $result;
    }

    public function create_kategori($data)
    {
        $result = $this->db->insert('kategori_baju', $data);

        return $result;
    }

    public function update_kategori($id, $data)
    {
        $result = $this->db->where('id', $id)
            ->update('kategori_baju', $data);

        return $result;
    }

    public function delete_kategori($id)
    {
        $result = $this->db->where('id', $id)
            ->delete('kategori_baju');

        return $result;
    }

    //sewa
    public function sewa($data)
    {
        $result = $this->db->insert('sewa_baju', $data);

        return $result;
    }

    public function get_sewa()
    {
        $result = $this->db->select('sewa_baju.*, akun.username, akun.email, pelayanan.pelayanan, pelayanan.harga_layanan, baju.nama_baju, baju.harga_sewa')
            ->from('sewa_baju')
            ->join('akun', 'sewa_baju.id_akun = akun.id')
            ->join('pelayanan', 'sewa_baju.id_pelayanan = pelayanan.id')
            ->join('baju', 'sewa_baju.id_baju = baju.id')
            ->order_by('sewa_baju.id', 'desc')
            ->get()
            ->result();

        return $result;
    }

    public function get_sewa_filter($a, $b)
    {
        $result = $this->db->select('sewa_baju.*, akun.username, akun.email, pelayanan.pelayanan, pelayanan.harga_layanan, baju.nama_baju, baju.harga_sewa')
            ->from('sewa_baju')
            ->join('akun', 'sewa_baju.id_akun = akun.id')
            ->join('pelayanan', 'sewa_baju.id_pelayanan = pelayanan.id')
            ->join('baju', 'sewa_baju.id_baju = baju.id')
            ->order_by('sewa_baju.id', 'desc')
            ->where('sewa_baju.tgl_sewa >=', $a)
            ->where('sewa_baju.tgl_sewa <=', $b)
            ->where('sewa_baju.status !=', 'Menunggu')
            ->get()
            ->result();

        return $result;
    }

    public function get_sewa_by_id($id)
    {
        $result = $this->db->select('sewa_baju.*, akun.username, akun.email, pelayanan.pelayanan, pelayanan.harga_layanan, baju.nama_baju, baju.harga_sewa')
            ->from('sewa_baju')
            ->join('akun', 'sewa_baju.id_akun = akun.id')
            ->join('pelayanan', 'sewa_baju.id_pelayanan = pelayanan.id')
            ->join('baju', 'sewa_baju.id_baju = baju.id')
            ->where('sewa_baju.id', $id)
            ->order_by('sewa_baju.id', 'desc')
            ->get()
            ->row();

        return $result;
    }

    public function cek_sewa_tanggal($id, $tgl)
    {
        $baju = $this->db->select('sewa_baju.*, baju.stok')
            ->from('sewa_baju')
            ->join('baju', 'sewa_baju.id_baju = baju.id')
            ->where('sewa_baju.untuk_tgl', $tgl)
            ->where('sewa_baju.id_baju', $id)
            ->get()
            ->result();

        $b = $this->db->get_where('baju', ['id' => $id])->row();

        $stok = $b->stok;

        if (!empty($baju)) {
            foreach ($baju as $row) {
                $stok -= $row->jml_baju;
            }
        } else {
            return $stok;
        }

        if ($stok <= 0) {
            return 0;
        } else {
            return $stok;
        }
    }

    public function sewa_edit($id, $data)
    {
        $result = $this->db->where('id', $id)
            ->update('sewa_baju', $data);

        return $result;
    }

    public function sewa_batal($id)
    {
        $result = $this->db->where('id', $id)
            ->update('sewa_baju', ['status' => 'Batal']);

        return $result;
    }
}
