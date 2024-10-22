<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{
    public function Kategori()
    {
        $this->load->view('admin/layout/header');
        $this->load->view('admin/laporan/kategori');
        $this->load->view('admin/layout/footer');
    }

    public function cetak_kategori()
    {
        if ($this->input->post('opsi') == 'sewa') {
            $isi = $this->baju->get_sewa();
        } else {
            $isi = $this->mua->get_booking();
        }

        $data = [
            'opsi' => $this->input->post('opsi'),
            'data' => $isi
        ];

        $this->load->view('admin/laporan/cetak/kategori', $data);
    }

    public function periode()
    {
        $this->load->view('admin/layout/header');
        $this->load->view('admin/laporan/periode');
        $this->load->view('admin/layout/footer');
    }

    public function cetak_periode()
    {
        $sewa = $this->baju->get_sewa_filter($this->input->post('dari'), $this->input->post('sampai'));
        $booking = $this->mua->get_booking_filter($this->input->post('dari'), $this->input->post('sampai'));

        $data = [
            'sewa' => $sewa,
            'booking' => $booking,
            'dari' => $this->input->post('dari'),
            'sampai' => $this->input->post('sampai'),
        ];

        $this->load->view('admin/laporan/cetak/periode', $data);
    }
}
