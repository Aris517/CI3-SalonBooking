<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MUA_model extends CI_Model
{
    //data mua

    public function get_mua()
    {
        $result = $this->db->select('*')
            ->from('mua')
            ->get()
            ->result();

        return $result;
    }

    public function get_mua_by_id($id)
    {
        $result = $this->db->select('*')
            ->from('mua')
            ->where('id', $id)
            ->get()
            ->row();

        return $result;
    }

    public function get_booking()
    {
        $result = $this->db->select('booking_mua.*, akun.username, akun.email, pelayanan.pelayanan, pelayanan.harga_layanan, mua.kategori_mua, mua.harga')
            ->from('booking_mua')
            ->join('akun', 'booking_mua.id_akun = akun.id')
            ->join('pelayanan', 'booking_mua.id_pelayanan = pelayanan.id')
            ->join('mua', 'booking_mua.id_mua = mua.id')
            ->order_by('booking_mua.id', 'desc')
            ->get()
            ->result();

        return $result;
    }

    public function get_booking_filter($a, $b)
    {
        $result = $this->db->select('booking_mua.*, akun.username, akun.email, pelayanan.pelayanan, pelayanan.harga_layanan, mua.kategori_mua, mua.harga')
            ->from('booking_mua')
            ->join('akun', 'booking_mua.id_akun = akun.id')
            ->join('pelayanan', 'booking_mua.id_pelayanan = pelayanan.id')
            ->join('mua', 'booking_mua.id_mua = mua.id')
            ->order_by('booking_mua.id', 'desc')
            ->where('booking_mua.tgl_booking >=', $a)
            ->where('booking_mua.tgl_booking <=', $b)
            ->where('booking_mua.status !=', 'Menunggu')
            ->get()
            ->result();

        return $result;
    }

    public function get_booking_by_id($id)
    {
        $result = $this->db->select('booking_mua.*, akun.username, akun.email, pelayanan.pelayanan, pelayanan.harga_layanan, mua.kategori_mua, mua.harga')
            ->from('booking_mua')
            ->join('akun', 'booking_mua.id_akun = akun.id')
            ->join('pelayanan', 'booking_mua.id_pelayanan = pelayanan.id')
            ->join('mua', 'booking_mua.id_mua = mua.id')
            ->where('booking_mua.id', $id)
            ->order_by('booking_mua.id', 'desc')
            ->get()
            ->row();

        return $result;
    }

    public function cek_booking_tanggal($tgl)
    {
        $result = $this->db->from('booking_mua')
            ->where('untuk_tgl', $tgl)
            ->get()
            ->num_rows();

        if ($result > 0) {
            $cek = true;
        } else {
            $cek = false;
        }

        return $cek;
    }

    public function create_mua($data)
    {
        $result = $this->db->insert('mua', $data);

        return $result;
    }

    public function update_mua($id, $data)
    {
        $result = $this->db->where('id', $id)
            ->update('mua', $data);

        return $result;
    }

    public function delete_mua($id)
    {
        $result = $this->db->where('id', $id)
            ->delete('mua');

        return $result;
    }

    public function booking($data)
    {
        $result = $this->db->insert('booking_mua', $data);

        return $result;
    }

    public function booking_edit($id, $data)
    {
        $result = $this->db->where('id', $id)
            ->update('booking_mua', $data);

        return $result;
    }

    public function booking_batal($id)
    {
        $result = $this->db->where('id', $id)
            ->update('booking_mua', ['status' => 'Batal']);

        return $result;
    }
}
