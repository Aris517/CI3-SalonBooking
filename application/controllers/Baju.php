<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Baju extends CI_Controller
{
    public function index()
    {
        $data = [
            'baju' => $this->baju->get_baju(),
        ];

        $this->load->view('admin/layout/header', $data);
        $this->load->view('admin/baju/index');
        $this->load->view('admin/layout/footer');
    }

    public function tambah()
    {
        $data = [
            'kategori' => $this->baju->get_kategori()
        ];

        $this->load->view('admin/layout/header', $data);
        $this->load->view('admin/baju/tambah');
        $this->load->view('admin/layout/footer');
    }

    public function proses_tambah()
    {
        $config['upload_path']      = './upload/baju/';
        $config['allowed_types']    = 'gif|jpeg|jpg|png';
        $config['max_size']         = 2048;
        $config['encrypt_name']     = true;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('foto')) {
            $foto = $this->upload->data('file_name');
        } else {
            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-success alert-dismissible fade show" role="alert">'
                    . $this->upload->display_errors() .
                    '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>'
            );
            return redirect('baju');
        }

        $data = [
            'id_kategori_baju'  => $this->input->post('kategori'),
            'nama_baju'         => $this->input->post('nama'),
            'stok'              => $this->input->post('stok'),
            'harga_sewa'        => $this->input->post('harga'),
            'foto'              => $foto,
        ];

        $cek = $this->baju->create_baju($data);

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

        return redirect('baju');
    }

    public function edit($id)
    {
        $data = [
            'kategori' => $this->baju->get_kategori(),
            'baju' => $this->baju->get_baju_by_id($id)
        ];

        $this->load->view('admin/layout/header', $data);
        $this->load->view('admin/baju/edit');
        $this->load->view('admin/layout/footer');
    }

    public function proses_edit($id)
    {
        $baju = $this->baju->get_baju_by_id($id);
        $foto = $baju->foto;

        if (!empty($_FILES['foto']['name'])) {

            $config['upload_path']      = './upload/baju/';
            $config['allowed_types']    = 'gif|jpeg|jpg|png';
            $config['max_size']         = 2048;
            $config['encrypt_name']     = true;

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('foto')) {
                unlink(FCPATH . 'upload/baju/' . $baju->foto);

                $foto = $this->upload->data('file_name');
            } else {
                $this->session->set_flashdata(
                    'pesan',
                    '<div class="alert alert-danger alert-dismissible fade show" role="alert">'
                        . $this->upload->display_errors() .
                        '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>'
                );
                return redirect('baju');
            }
        }

        $data = [
            'id_kategori_baju'  => $this->input->post('kategori'),
            'nama_baju'         => $this->input->post('nama'),
            'stok'              => $this->input->post('stok'),
            'harga_sewa'        => $this->input->post('harga'),
            'foto'              => $foto,
        ];

        $cek = $this->baju->update_baju($id, $data);

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

        return redirect('baju');
    }

    public function proses_hapus($id)
    {
        $baju = $this->baju->get_baju_by_id($id);
        unlink(FCPATH . 'upload/baju/' . $baju->foto);

        $cek = $this->baju->delete_baju($id);

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

        return redirect('baju');
    }

    //kategori baju

    public function kategori()
    {
        $data = [
            'kategori' => $this->baju->get_kategori()
        ];

        $this->load->view('admin/layout/header', $data);
        $this->load->view('admin/baju/kategori/index');
        $this->load->view('admin/layout/footer');
    }

    public function tambah_kategori()
    {
        $this->load->view('admin/layout/header');
        $this->load->view('admin/baju/kategori/tambah');
        $this->load->view('admin/layout/footer');
    }

    public function proses_tambah_kategori()
    {
        $data = [
            'kategori_baju' => $this->input->post('kategori'),
        ];

        $cek = $this->baju->create_kategori($data);

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

        return redirect('baju/kategori');
    }

    public function edit_kategori($id)
    {
        $data = [
            'kategori' => $this->baju->get_kategori_by_id($id)
        ];

        $this->load->view('admin/layout/header', $data);
        $this->load->view('admin/baju/kategori/edit');
        $this->load->view('admin/layout/footer');
    }

    public function proses_edit_kategori($id)
    {
        $data = [
            'kategori_baju' => $this->input->post('kategori'),
        ];

        $cek = $this->baju->update_kategori($id, $data);

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

        return redirect('baju/kategori');
    }

    public function proses_hapus_kategori($id)
    {
        $cek = $this->baju->delete_kategori($id);

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

        return redirect('baju/kategori');
    }

    // sewa
    public function proses_sewa()
    {
        $jml = $this->input->post('jml_baju');
        $harga = $this->input->post('harga');
        $layanan_id = $this->input->post('layanan');
        $id = $this->input->post('id');
        $tgl = $this->input->post('untuk_tgl');
        $hl = $this->pelayanan->get_pelayanan_by_id($layanan_id);
        $isi = $this->baju->cek_sewa_tanggal($id, $tgl);

        if ($isi > 0) {
            $stok = $isi - $jml;
            if ($stok < 0) {
                // Display warning if stock is insufficient
                $pesan = '
                <div class="alert alert-warning alert-dismissible fade show mb-5" role="alert">
                    Mohon maaf stok baju yang anda masukan melebihi batas stok!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            ';
            } else {
                // Prepare rental data
                $data = [
                    'id_baju' => $id,
                    'id_pelayanan' => $layanan_id,
                    'id_akun' => $this->session->userdata('akun'),
                    'nama' => $this->input->post('nama'),
                    'no_hp' => $this->input->post('no_hp'),
                    'alamat' => $this->input->post('alamat'),
                    'untuk_tgl' => $tgl,
                    'jml_baju' => $jml,
                    'total' => $harga * $jml + $hl->harga_layanan
                ];

                // Save the rental
                $cek = $this->baju->sewa($data);

                if ($cek) {
                    // Display success message
                    $pesan = '
                    <div class="alert alert-success alert-dismissible fade show mb-5" role="alert">
                        Berhasil sewa, silahkan hubungi admin untuk informasi lanjutan
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                ';
                } else {
                    // Display failure message
                    $pesan = '
                    <div class="alert alert-warning alert-dismissible fade show mb-5" role="alert">
                        Gagal sewa, silahkan coba lagi
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                ';
                }
            }
        } else {
            // Display message if the quota for the date is exceeded
            $pesan = '
            <div class="alert alert-warning alert-dismissible fade show mb-5" role="alert">
                Sewa untuk tanggal tersebut sudah melewati kouta
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        ';
        }

        // Set flash message and redirect
        $this->session->set_flashdata('pesan', $pesan);
        return redirect('visitor/baju');
    }


    public function sewa()
    {
        $data = [
            'sewa' => $this->baju->get_sewa(),
        ];

        $this->load->view('admin/layout/header', $data);
        $this->load->view('admin/baju/sewa/index');
        $this->load->view('admin/layout/footer');
    }

    public function sewa_edit($id)
    {
        $data = [
            'baju' => $this->baju->get_baju(),
            'pelayanan' => $this->pelayanan->get_pelayanan(),
            'sewa' => $this->baju->get_sewa_by_id($id),
        ];

        $this->load->view('admin/layout/header', $data);
        $this->load->view('admin/baju/sewa/edit');
        $this->load->view('admin/layout/footer');
    }

    public function proses_sewa_edit($id)
    {
        $jml = $this->input->post('jml_baju');
        $jb = $this->input->post('jb');

        $hl = $this->pelayanan->get_pelayanan_by_id($this->input->post('layanan'));
        $id_baju = $this->input->post('bj');

        $baju = $this->baju->get_baju_by_id($id_baju);

        $tstok = $baju->stok + $jb;
        if ($id_baju == $this->input->post('baju')) {

            if ($tstok < 0) {
                $pesan = '
                <div class="alert alert-warning alert-dismissible fade show mb-5" role="alert">
                    Mohon maaf stok baju tidak ada, silahkan tunggu
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            ';
            } else {
                $stok = $tstok - $jml;
                if ($stok < 0) {
                    $pesan = '
                    <div class="alert alert-warning alert-dismissible fade show mb-5" role="alert">
                        Mohon maaf stok baju yang anda masukan melebihi batas stok!
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                ';
                } else {
                    $data = [
                        'id_baju' => $id_baju,
                        'id_pelayanan' => $this->input->post('layanan'),
                        'nama' => $this->input->post('nama'),
                        'no_hp' => $this->input->post('no_hp'),
                        'alamat' => $this->input->post('alamat'),
                        'untuk_tgl' => $this->input->post('untuk_tgl'),
                        'jml_baju' => $jml,
                        'total' => $baju->harga_sewa * $jml + $hl->harga_layanan,
                    ];

                    $cek = $this->baju->sewa_edit($id, $data);

                    if ($cek) {
                        $this->baju->update_baju($baju->id, ['stok' => $stok]);

                        $pesan = '
                        <div class="alert alert-success alert-dismissible fade show mb-5" role="alert">
                            Data berhasil di ubah
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
                }
            }
        } else {
            $this->baju->update_baju($baju->id, ['stok' => $tstok]);

            $baju = $this->baju->get_baju_by_id($this->input->post('baju'));

            $stok = $baju->stok - $jml;
            if ($stok < 0) {
                $pesan = '
                    <div class="alert alert-warning alert-dismissible fade show mb-5" role="alert">
                        Mohon maaf stok baju yang anda masukan melebihi batas stok!
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                ';
            } else {
                $data = [
                    'id_baju' => $baju->id,
                    'id_pelayanan' => $this->input->post('layanan'),
                    'nama' => $this->input->post('nama'),
                    'no_hp' => $this->input->post('no_hp'),
                    'alamat' => $this->input->post('alamat'),
                    'untuk_tgl' => $this->input->post('untuk_tgl'),
                    'jml_baju' => $jml,
                    'total' => $baju->harga_sewa * $jml + $hl->harga_layanan,
                ];

                $cek = $this->baju->sewa_edit($id, $data);

                if ($cek) {
                    $this->baju->update_baju($baju->id, ['stok' => $stok]);

                    $pesan = '
                        <div class="alert alert-success alert-dismissible fade show mb-5" role="alert">
                            Data berhasil di ubah
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
            }
        }

        $this->session->set_flashdata('pesan', $pesan);

        return redirect('baju/sewa');
    }

    public function proses_sewa_batal($id)
    {
        $sewa = $this->baju->get_sewa_by_id($id);

        $baju = $this->baju->get_baju_by_id($sewa->id_baju);

        $cek = $this->baju->sewa_batal($id);

        if ($cek) {
            $stok = $sewa->jml_baju + $baju->stok;
            $this->baju->update_baju($baju->id, ['stok' => $stok]);
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

        return redirect('baju/sewa');
    }
}
