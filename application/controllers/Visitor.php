<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Visitor extends CI_Controller
{
	public function index()
	{
		$data = [
			'menu' => 'home',
			'profil' => $this->profil->get_data(),
			'banner_sewa' => $this->page->get_banner_sewa(),
			'banner_mua' => $this->page->get_banner_mua(),
		];

		$this->load->view('layout/header', $data);
		$this->load->view('index');
		$this->load->view('layout/footer');
	}

	public function mua()
	{
		$data = [
			'menu' => 'mua',
			'mua' => $this->mua->get_mua(),
			'pelayanan' => $this->pelayanan->get_pelayanan()
		];

		$this->load->view('layout/header', $data);
		$this->load->view('mua');
		$this->load->view('layout/footer');
	}

	public function baju()
	{
		$data = [
			'menu' => 'baju',
			'baju' => $this->baju->get_baju(),
			'kategori' => $this->baju->get_kategori()
		];

		$this->load->view('layout/header', $data);
		$this->load->view('baju');
		$this->load->view('layout/footer');
	}

	public function about()
	{
		$data = [
			'menu' => 'about',
			'profil' => $this->profil->get_data()
		];

		$this->load->view('layout/header', $data);
		$this->load->view('about');
		$this->load->view('layout/footer');
	}

	public function contact()
	{
		$data = [
			'menu' => 'contact'
		];

		$this->load->view('layout/header', $data);
		$this->load->view('contact');
		$this->load->view('layout/footer');
	}

	public function form_sewa($id)
	{
		$data = [
			'menu' => 'baju',
			'baju' => $this->baju->get_baju_by_id($id),
			'pelayanan' => $this->pelayanan->get_pelayanan()
		];

		$this->load->view('layout/header', $data);
		$this->load->view('form_sewa');
		$this->load->view('layout/footer');
	}
}
