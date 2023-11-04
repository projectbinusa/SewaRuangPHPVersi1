<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ruang extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('m_model');
		$this->load->helper('my_helper');
	}

	public function index()
	{
		$data['ruang'] = $this->m_model->get_data('ruangan')->result();
		$id = 1; // Ganti dengan ID yang sesuai
		$data['ruang'] = $this->m_model->get_gambar_ruangan($id);
		$this->load->view('ruang/Data_Ruangan', $data);
	}

	public function tambah_ruang()
	{
		$this->load->view('ruang/tambah_ruang');
	}


	public function akis_tambah_ruangan()
	{
		$no_lantai = $this->input->post('no_lantai');
		$no_ruang = $this->input->post('no_ruang');

		$data = [
			'no_lantai' => $no_lantai,
			'no_ruang' => $no_ruang,
		];

		$inserted = $this->m_model->tambah_data('ruangan', $data);

		if ($inserted) {
			// Jika data berhasil dimasukkan, arahkan ke data_master_pelanggan
			redirect('pelanggan/data_master_pelanggan');
		} else {
			// Jika gagal, arahkan kembali ke halaman tambah ruangan (ruang)
			redirect('ruang/tambah_ruang');
		}
	}
}
