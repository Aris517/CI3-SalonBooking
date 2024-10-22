<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
{
    public function index()
    {
        $data = [
            'sewa' => $this->transaksi->sewa(),
            'booking' => $this->transaksi->booking(),
        ];

        $this->load->view('admin/layout/header', $data);
        $this->load->view('admin/transaksi/index');
        $this->load->view('admin/layout/footer');
    }

    public function bayar($tipe, $id_type)
    {
        if ($tipe == 'booking') {
            $t = $this->mua->get_booking_by_id($id_type);
        } else if ($tipe == 'sewa') {
            $t = $this->baju->get_sewa_by_id($id_type);
        } else {
            return redirect('transaksi');
        }

        $data = [
            'tipe' => $tipe,
            'data' => $t
        ];

        $this->load->view('admin/layout/header', $data);
        $this->load->view('admin/transaksi/bayar');
        $this->load->view('admin/layout/footer');
    }

    public function proses()
    {
        $data = [
            'tipe' => $this->input->post('tipe'),
            'id_tipe' => $this->input->post('id_tipe'),
            'bayar' => $this->input->post('bayar'),
            'kembalian' => $this->input->post('kembalian'),
            'tgl_transaksi' => $this->input->post('tgl_trans'),
        ];

        $trans = $this->transaksi->bayar($data);

        if ($trans) {
            if ($this->input->post('tipe') == 'sewa') {
                $sewa = $this->baju->get_sewa_by_id($this->input->post('id_tipe'));
                $baju = $this->baju->get_baju_by_id($sewa->id_baju);

                $t = [
                    'stok' => $baju->stok + $sewa->jml_baju,
                ];

                $cek = $this->baju->update_baju($sewa->id_baju, $t);

                $ceke = $this->baju->sewa_edit($sewa->id, ['status' => 'Selesai']);

                if ($cek && $ceke) {
                    $pesan = '
                        <div class="alert alert-success alert-dismissible fade show mb-5" role="alert">
                            Data berhasil disimpan
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    ';
                } else {
                    $pesan = '
                        <div class="alert alert-warning alert-dismissible fade show mb-5" role="alert">
                            Data gagal disimpan
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    ';
                }
            } else if ($this->input->post('tipe') == 'booking') {
                $booking = $this->mua->get_booking_by_id($this->input->post('id_tipe'));

                $ceke = $this->mua->booking_edit($booking->id, ['status' => 'Selesai']);

                if ($ceke) {
                    $pesan = '
                        <div class="alert alert-success alert-dismissible fade show mb-5" role="alert">
                            Data berhasil disimpan
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    ';
                } else {
                    $pesan = '
                        <div class="alert alert-warning alert-dismissible fade show mb-5" role="alert">
                            Data gagal disimpan
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    ';
                }
            }
        } else {
            $pesan = '
                <div class="alert alert-warning alert-dismissible fade show mb-5" role="alert">
                    Data gagal disimpan
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            ';
        }

        $this->session->set_flashdata('pesan', $pesan);

        return redirect('transaksi');
    }

    public function cetak($tipe, $id)
    {
        if ($tipe == 'sewa') {
            $isi  = $this->transaksi->get_trans_sewa($id);
        } else {
            $isi  = $this->transaksi->get_trans_booking($id);
        }

        $data = [
            'tipe' => $tipe,
            'trans' => $isi,
        ];

        $this->load->view('admin/laporan/cetak/detail', $data);
    }
}
