<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Page extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('role') != 'Admin') {
            return redirect('auth/login');
        }
    }

    public function index()
    {
        $data = [
            'profil' => $this->profil->get_data(),
            'banner_sewa' => $this->page->get_banner_sewa(),
            'banner_mua' => $this->page->get_banner_mua(),
        ];

        $this->load->view('admin/layout/header', $data);
        $this->load->view('admin/page/index');
        $this->load->view('admin/layout/footer');
    }

    public function edit_profil()
    {
        $data = [
            'profil' => $this->profil->get_data(),
        ];

        $this->load->view('admin/layout/header', $data);
        $this->load->view('admin/page/profil/edit');
        $this->load->view('admin/layout/footer');
    }

    public function proses_edit_profil()
    {
        $profil = $this->profil->get_data();

        if (!empty($_FILES['foto']['name'])) {
            $config['upload_path']      = './upload/profil/';
            $config['allowed_types']    = 'gif|jpeg|jpg|png';
            $config['max_size']         = 2048;
            $config['encrypt_name']     = true;

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('foto')) {
                unlink(FCPATH . 'upload/profil/' . $profil->foto);

                $foto = $this->upload->data('file_name');
            } else {
                $this->session->set_flashdata(
                    'pesan',
                    '<div class="alert alert-danger alert-dismissible fade show" role="alert">'
                        . $this->upload->display_errors() .
                        '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>'
                );
                return redirect('page');
            }
        } else {
            $foto = $profil->foto;
        }

        $data = [
            'header' => $this->input->post('header'),
            'deskripsi' => $this->input->post('deskripsi'),
            'foto' => $foto,
        ];

        $cek = $this->profil->update($data);

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

        return redirect('page');
    }

    public function proses_edit_banner($id)
    {
        if (!empty($_FILES['foto']['name'])) {
            $config['upload_path']      = './upload/banner/';
            $config['allowed_types']    = 'gif|jpeg|jpg|png';
            $config['max_size']         = 2048;
            $config['encrypt_name']     = true;

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('foto')) {
                unlink(FCPATH . 'upload/banner/' . $this->input->post('f'));

                $foto = $this->upload->data('file_name');
            } else {
                $this->session->set_flashdata(
                    'pesan',
                    '<div class="alert alert-danger alert-dismissible fade show" role="alert">'
                        . $this->upload->display_errors() .
                        '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>'
                );
                return redirect('page');
            }
        } else {
            $foto = $this->input->post('f');
        }

        $data = [
            'tipe' => $this->input->post('opsi'),
            'take_line' => $this->input->post('tl'),
            'header' => $this->input->post('header'),
            'deskripsi' => $this->input->post('deskripsi'),
            'banner' => $foto,
        ];

        $cek = $this->page->update_banner($id, $data);

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

        return redirect('page');
    }

    public function edit_banner($opsi)
    {
        if ($opsi == 'sewa') {
            $data = $this->page->get_banner_sewa();
        } else if ($opsi == 'mua') {
            $data = $this->page->get_banner_mua();
        }

        $data = [
            'opsi' => $opsi,
            'data' => $data,
        ];

        $this->load->view('admin/layout/header', $data);
        $this->load->view('admin/page/banner/edit');
        $this->load->view('admin/layout/footer');
    }
}
