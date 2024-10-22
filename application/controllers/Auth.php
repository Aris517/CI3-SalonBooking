<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function registrasi()
    {
        $this->load->view('auth/registrasi');
    }

    public function login()
    {
        $this->load->view('auth/login');
    }

    public function proses_login()
    {
        $akun = $this->akun->get_data_by_email($this->input->post('email'));

        if (!empty($akun)) {
            if (password_verify($this->input->post('password'), $akun->password)) {
                $data = [
                    'akun' => $akun->id,
                    'nama' => $akun->username,
                    'email' => $akun->email,
                    'role' => $akun->role,
                    'status' => $akun->status,
                ];

                if ($akun->status == 1) {
                    $this->session->set_userdata($data);

                    if ($akun->role == 'Admin' || $akun->role == 'Pemilik') {
                        return redirect('admin');
                    } else {
                        return redirect('/');
                    }
                } else {
                    $this->session->set_flashdata(
                        'pesan',
                        '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                            Akun anda telah kami nonaktifkan!
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>'
                    );
                    return redirect('auth/login');
                }
            } else {
                $this->session->set_flashdata(
                    'pesan',
                    '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        Email atau password salah!
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>'
                );
                return redirect('auth/login');
            }
        } else {
            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Akun belum terdaftar!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>'
            );
            return redirect('auth/login');
        }
    }

    public function proses_daftar()
    {
        $this->form_validation->set_rules('email', 'Email', 'is_unique[akun.email]');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                    Email telah terdaftar!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>'
            );
            return redirect('auth/login');
        } else {
            $data = [
                'username' => $this->input->post('username'),
                'email' => $this->input->post('email'),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            ];

            $cek = $this->akun->tambah($data);

            if ($cek) {
                $this->session->set_flashdata(
                    'pesan',
                    '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        Akun anda telah terdaftar
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>'
                );
            } else {
                $this->session->set_flashdata(
                    'pesan',
                    '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                        Mohon maaf terjadi kesalahan, silahkan daftar lagi
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>'
                );
            }
            return redirect('auth/login');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('akun');
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role');
        $this->session->unset_userdata('status');

        redirect('auth/login');
    }
}
