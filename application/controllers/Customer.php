<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Customer extends CI_Controller
{
    public function index()
    {
        $data = [
            'customer' => $this->akun->customer(),
        ];

        $this->load->view('admin/layout/header');
        $this->load->view('admin/customer/index', $data);
        $this->load->view('admin/layout/footer');
    }

    public function status($id)
    {
        $customer = $this->akun->findCustomer($id);

        if (empty($customer)) {
            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                    Data tidak ditemukan
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>'
            );
            return redirect('customer');
        } else {
            $data = [
                'status' => $customer->status ? 0 : 1,
            ];

            $this->akun->update($id, $data);

            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Status berhasil diubah
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>'
            );
            return redirect('customer');
        }
    }
}
