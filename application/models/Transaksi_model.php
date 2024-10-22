<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi_model extends CI_Model
{
    public function sewa()
    {
        $result = $this->db->select('*')
            ->from('sewa_baju')
            ->order_by('status', 'Menunggu')
            ->get()
            ->result();

        return $result;
    }

    public function get_trans_sewa($id)
    {
        $result = $this->db->select('sewa_baju.*, baju.nama_baju, baju.harga_sewa, kategori_baju.kategori_baju, pelayanan.pelayanan, pelayanan.harga_layanan, transaksi.bayar, transaksi.kembalian, transaksi.tgl_transaksi')
            ->from('sewa_baju')
            ->join('baju', 'sewa_baju.id_baju = baju.id')
            ->join('kategori_baju', 'baju.id_kategori_baju = kategori_baju.id')
            ->join('pelayanan', 'pelayanan.id = sewa_baju.id_pelayanan')
            ->join('transaksi', 'transaksi.id_tipe = sewa_baju.id')
            ->where('sewa_baju.id', $id)
            ->get()
            ->row();

        return $result;
    }

    public function get_trans_booking($id)
    {
        $result = $this->db->select('booking_mua.*, mua.kategori_mua, mua.harga, , pelayanan.pelayanan, pelayanan.harga_layanan, transaksi.bayar, transaksi.kembalian, transaksi.tgl_transaksi')
            ->from('booking_mua')
            ->join('mua', 'mua.id = booking_mua.id_mua')
            ->join('pelayanan', 'pelayanan.id = booking_mua.id_pelayanan')
            ->join('transaksi', 'transaksi.id_tipe = booking_mua.id')
            ->where('booking_mua.id', $id)
            ->get()
            ->row();

        return $result;
    }

    public function booking()
    {
        $result = $this->db->select('*')
            ->from('booking_mua')
            ->order_by('status', 'Menunggu')
            ->get()
            ->result();

        return $result;
    }

    public function bayar($data)
    {
        $result = $this->db->insert('transaksi', $data);

        return $result;
    }
}
