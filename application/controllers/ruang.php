
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ruang extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->model('m_model');
    $this->load->helper('my_helper');
    $this->load->library('form_validation');
  }

  public function index()
  {
    $data['ruangan'] = $this->m_model->get_data('ruangan')->result();

    // Limit the number of cards to 50
    $data['ruangan'] = array_slice($data['ruangan'], 0, 50);

    $this->load->view('ruang/Data_Ruangan', $data);
  }

  public function tambah_ruang()
  {
    $this->load->view('ruang/tambah_ruang');
  }

  public function detail($id)
  {
    // Assuming you have a model method to fetch room details
    $data['ruang'] = $this->m_model->get_data_by_id('ruangan', $id)->result();

    // Load the detail view and pass the data
    $this->load->view('ruang/detail', $data);
  }


  public function akis_tambah_ruangan()
  {
    $no_lantai = $this->input->post('no_lantai');
    $no_ruang = $this->input->post('no_ruang');
    $deskripsi = $this->input->post('deskripsi');
    $image = $_FILES['foto']['name'];

    $errors = []; // Membuat array untuk menyimpan pesan kesalahan

    // Validasi agar tidak ada data yang kosong
    if (empty($no_lantai) || !is_numeric($no_lantai)) {
      $errors[] = 'Nomor Lantai tidak valid. Harap periksa data yang Anda masukkan.';
    }

    if (empty($no_ruang) || !is_numeric($no_ruang)) {
      $errors[] = 'Nomor Ruangan tidak valid. Harap periksa data yang Anda masukkan.';
    }

    if (empty($deskripsi)) {
      $errors[] = 'Deskripsi tidak boleh kosong.';
    }

    if (empty($image)) {
      $errors[] = 'Harap unggah gambar terlebih dahulu.';
    }

    if (count($errors) > 0) {
      $response = [
        'status' => 'error',
        'message' => implode(' ', $errors), // Menggabungkan pesan kesalahan menjadi satu pesan
      ];
    } else {
      // Proses gambar yang diunggah
      $image_temp = $_FILES['foto']['tmp_name'];
      $kode = round(microtime(true) * 100);
      $file_name = $kode . '_' . $image;
      $upload_path = './image/ruangan/tambah_ruangan/' . $file_name;

      if (move_uploaded_file($image_temp, $upload_path)) {
        $data = [
          'image' => $file_name,
          'no_lantai' => $no_lantai,
          'no_ruang' => $no_ruang,
          'deskripsi' => $deskripsi,
        ];

        $inserted = $this->m_model->tambah_data('ruangan', $data);

        if ($inserted) {
          $response = [
            'status' => 'success',
            'message' => 'Data berhasil ditambahkan.',
            'redirect' => base_url('ruang'),
          ];
        } else {
          $response = [
            'status' => 'error',
            'message' => 'Gagal menambahkan data. Silakan coba lagi.',
          ];
          // Hapus gambar yang sudah diunggah jika terjadi kesalahan
          unlink($upload_path);
        }
      } else {
        $response = [
          'status' => 'error',
          'message' => 'Gagal mengunggah gambar. Silakan coba lagi.',
        ];
      }
    }

    echo json_encode($response);
  }
}