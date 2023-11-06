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
        // Lakukan operasi yang sesuai, seperti memuat halaman "tambah ruang"
        $this->load->view('ruang/tambah_ruang');
    }


    public function akis_tambah_ruang()
    {
        // Mengambil data dari POST request
        $no_lantai = $this->input->post('no_lantai');
        $no_ruang = $this->input->post('no_ruang');

        // Menyiapkan data yang akan dimasukkan ke database
        $data = array(
            'no_lantai' => $no_lantai,
            'no_ruang' => $no_ruang
        );

        // Memasukkan data ke dalam tabel 'ruangan' di database Anda
        $inserted = $this->m_model->insert_data('ruangan', $data);

        if ($inserted) {
            // Data berhasil dimasukkan, tampilkan SweetAlert2 pesan sukses dan redirect
            echo '<script type="text/javascript">
                Swal.fire("Sukses!", "Data berhasil dimasukkan.", "success").then(function() {
                    window.location = "' . site_url('data_master_pelanggan') . '"; 
                });
            </script>';
        } else {
            // Penyisipan gagal, tampilkan SweetAlert2 pesan error dan redirect
            echo '<script type="text/javascript">
                Swal.fire("Gagal!", "Gagal memasukkan data. Silakan coba lagi.", "error").then(function() {
                    window.location = "' . site_url('Data_Ruangan') . '";
                });
            </script>';
        }
    }
}
