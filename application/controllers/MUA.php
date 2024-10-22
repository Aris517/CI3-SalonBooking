<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MUA extends CI_Controller
{
    public function index()
    {
        $data = [
            'mua' => $this->mua->get_mua()
        ];

        $this->load->view('admin/layout/header', $data);
        $this->load->view('admin/mua/index');
        $this->load->view('admin/layout/footer');
    }

    public function tambah()
    {
        $this->load->view('admin/layout/header');
        $this->load->view('admin/mua/tambah');
        $this->load->view('admin/layout/footer');
    }

    public function proses_tambah()
    {
        $data = [
            'kategori_mua'  => $this->input->post('mua'),
            'harga'         => $this->input->post('harga'),
            'deskripsi'     => $this->input->post('deskripsi'),
        ];

        $cek = $this->mua->create_mua($data);

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

        return redirect('mua');
    }

    public function edit($id)
    {
        $data = [
            'mua' => $this->mua->get_mua_by_id($id),
        ];

        $this->load->view('admin/layout/header', $data);
        $this->load->view('admin/mua/edit');
        $this->load->view('admin/layout/footer');
    }

    public function proses_edit($id)
    {
        $data = [
            'kategori_mua'  => $this->input->post('mua'),
            'harga'         => $this->input->post('harga'),
            'deskripsi'     => $this->input->post('deskripsi'),
        ];

        $cek = $this->mua->update_mua($id, $data);

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

        return redirect('mua');
    }

    public function proses_hapus($id)
    {
        $cek = $this->mua->delete_mua($id);

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

        return redirect('mua');
    }

    //booking mua

    public function booking()
    {
        $data = [
            'booking' => $this->mua->get_booking()
        ];

        $this->load->view('admin/layout/header', $data);
        $this->load->view('admin/mua/booking/index');
        $this->load->view('admin/layout/footer');
    }

    public function booking_edit($id)
    {
        $data = [
            'mua' => $this->mua->get_mua(),
            'pelayanan' => $this->pelayanan->get_pelayanan(),
            'booking' => $this->mua->get_booking_by_id($id)
        ];

        $this->load->view('admin/layout/header', $data);
        $this->load->view('admin/mua/booking/edit');
        $this->load->view('admin/layout/footer');
    }

    public function proses_booking()
    {
        $jml = $this->input->post('jml_orang');
        $harga = $this->input->post('harga');
        $tgl = $this->input->post('untuk_tgl');

        $hl = $this->pelayanan->get_pelayanan_by_id($this->input->post('layanan'));

        $ada = $this->mua->cek_booking_tanggal($tgl);

        if ($ada) {
            $pesan = '
                <div class="alert alert-warning alert-dismissible fade show mb-5" role="alert">
                    Mohon maaf untuk tanggal ini sudah ada yang booking
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            ';
        } else {
            $data = [
                'id_mua' => $this->input->post('id'),
                'id_pelayanan' => $this->input->post('layanan'),
                'id_akun' => $this->session->userdata('akun'),
                'nama' => $this->input->post('nama'),
                'no_hp' => $this->input->post('no_hp'),
                'alamat' => $this->input->post('alamat'),
                'untuk_tgl' => $tgl,
                'jml_orang' => $jml,
                'total' => $harga * $jml + $hl->harga_layanan
            ];

            $cek = $this->mua->booking($data);

            if ($cek) {
                $pesan = '
                    <div class="alert alert-success alert-dismissible fade show mb-5" role="alert">
                        Berhasil booking, silahkan hubungi admin untuk informasi lanjutan
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                ';
            } else {
                $pesan = '
                    <div class="alert alert-warning alert-dismissible fade show mb-5" role="alert">
                        Gagal booking, silahkan coba lagi
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                ';
            }
        }


        $this->session->set_flashdata('pesan', $pesan);

        return redirect('visitor/mua');
    }

    public function proses_booking_edit($id)
    {
        $mua = $this->mua->get_mua_by_id($this->input->post('mua'));

        $jml = $this->input->post('jml_orang');

        $hl = $this->pelayanan->get_pelayanan_by_id($this->input->post('layanan'));

        $data = [
            'id_mua' => $this->input->post('mua'),
            'id_pelayanan' => $this->input->post('layanan'),
            'nama' => $this->input->post('nama'),
            'no_hp' => $this->input->post('no_hp'),
            'alamat' => $this->input->post('alamat'),
            'untuk_tgl' => $this->input->post('untuk_tgl'),
            'jml_orang' => $jml,
            'total' => $mua->harga * $jml + $hl->harga_layanan
        ];

        $cek = $this->mua->booking_edit($id, $data);

        if ($cek) {
            $pesan = '
                <div class="alert alert-success alert-dismissible fade show mb-5" role="alert">
                    Data berhasil diubah
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            ';
        } else {
            $pesan = '
                <div class="alert alert-warning alert-dismissible fade show mb-5" role="alert">
                    Data gagal diubah
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            ';
        }

        $this->session->set_flashdata('pesan', $pesan);

        return redirect('mua/booking');
    }

    public function proses_booking_batal($id)
    {
        $cek = $this->mua->booking_batal($id);

        if ($cek) {
            $pesan = '
                <div class="alert alert-success alert-dismissible fade show mb-5" role="alert">
                    Status berhasil diubah
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            ';
        } else {
            $pesan = '
                <div class="alert alert-warning alert-dismissible fade show mb-5" role="alert">
                    Status gagal diubah
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            ';
        }

        $this->session->set_flashdata('pesan', $pesan);

        return redirect('mua/booking');
    }
}
