<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pelayanan extends CI_Controller
{
    public function index()
    {
        $data = [
            'pelayanan' => $this->pelayanan->get_pelayanan()
        ];

        $this->load->view('admin/layout/header', $data);
        $this->load->view('admin/pelayanan/index');
        $this->load->view('admin/layout/footer');
    }

    public function tambah()
    {
        $this->load->view('admin/layout/header');
        $this->load->view('admin/pelayanan/tambah');
        $this->load->view('admin/layout/footer');
    }

    public function proses_tambah()
    {
        $data = [
            'pelayanan'     => $this->input->post('pelayanan'),
            'harga_layanan' => $this->input->post('harga'),
            'deskripsi'     => $this->input->post('deskripsi'),
        ];

        $cek = $this->pelayanan->create_pelayanan($data);

        if ($cek) {
            $pesan = '
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    Data berhasil disimpan
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            ';
        } else {
            $pesan = '
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    Data gagal disimpan
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            ';
        }

        $this->session->set_flashdata('pesan', $pesan);

        return redirect('pelayanan');
    }

    public function edit($id)
    {
        $data = [
            'pelayanan' => $this->pelayanan->get_pelayanan_by_id($id),
        ];

        $this->load->view('admin/layout/header', $data);
        $this->load->view('admin/pelayanan/edit');
        $this->load->view('admin/layout/footer');
    }

    public function proses_edit($id)
    {
        $data = [
            'pelayanan'     => $this->input->post('pelayanan'),
            'harga_layanan' => $this->input->post('harga'),
            'deskripsi'     => $this->input->post('deskripsi'),
        ];

        $cek = $this->pelayanan->update_pelayanan($id, $data);

        if ($cek) {
            $pesan = '
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    Data berhasil diubah
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            ';
        } else {
            $pesan = '
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    Data gagal diubah
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            ';
        }

        $this->session->set_flashdata('pesan', $pesan);

        return redirect('pelayanan');
    }

    public function proses_hapus($id)
    {
        $cek = $this->pelayanan->delete_pelayanan($id);

        if ($cek) {
            $pesan = '
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    Data berhasil dihapus
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            ';
        } else {
            $pesan = '
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    Data gagal dihapus
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            ';
        }

        $this->session->set_flashdata('pesan', $pesan);

        return redirect('pelayanan');
    }
}
