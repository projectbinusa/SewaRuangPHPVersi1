<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Alignment;

class operator extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_model');
        $this->load->helper('my_helper');
        $this->load->library('form_validation');
        if ($this->session->userdata('logged_in') != true || $this->session->userdata('role') != 'operator') {
            redirect(base_url());
        }
    }

    public function index()
    {
        $data['report_sewa'] = $this->m_model->get_report_sewa_by_status();
        $data['ruang'] = $this->m_model->get_data('ruangan')->result();
        $data['pelanggans'] = $this->m_model->get_data('pelanggan')->result();
        $data['jumlah_ruang'] = $this->m_model->get_data('ruangan')->num_rows();
        $data['jumlah_pelanggan'] = $this->m_model->get_data('pelanggan')->num_rows();
        $data['jumlah_tambahan'] = $this->m_model->get_data('tambahan')->num_rows();
        $data['jumlah_sewa'] = $this->m_model->get_data('tambahan')->num_rows();
        $data['ruang'] = $this->m_model->get_data('ruangan')->result();
        $this->load->view('operator/dashboard', $data);
    }

    public function edit_tambahan($id)
    {
        $data['tambahan'] = $this->m_model->get_by_id('tambahan', 'id', $id)->result();
        $this->load->view('operator/tambahan/edit_tambahan', $data);
    }
    public function tambahan()
    {
        $data['tambahan'] = $this->m_model->get_data('tambahan')->result();
        $this->load->view('operator/tambahan/tambahan', $data);
    }
    public function tambah_item_tambahan()
    {
        $this->load->view('operator/tambahan/tambah_item_tambahan');
    }
    public function aksi_edit_tambahan()
    {
        $nama = $this->input->post('nama');
        $harga = $this->input->post('harga');
        $jenis = $this->input->post('jenis');
        $deskripsi = $this->input->post('deskripsi');

        $data = [
            'nama' => $nama,
            'harga' => $harga,
            'jenis' => $jenis,
            'deskripsi' => $deskripsi
        ];
        $this->m_model->update('user', $data, array('id' => $this->input->post('id')));
        redirect(base_url('operator/tambahan'));
    }
    public function aksi_tambahan()
    {
        $nama = $this->input->post('nama');
        $harga = $this->input->post('harga');
        $jenis = $this->input->post('jenis');
        $deskripsi = $this->input->post('deskripsi');

        $data = [
            'nama' => $nama,
            'harga' => $harga,
            'jenis' => $jenis,
            'deskripsi' => $deskripsi
        ];
        $this->m_model->tambah_data('tambahan', $data);
        redirect(base_url('operator/tambahan'));
    }
    public function detail($id)
    {
        $data['ruang'] = $this->m_model->get_data_ruangan_by_id('ruangan', $id)->result();
        $this->load->view('operator/ruang/detail', $data);
    }

    public function data_ruangan()
    {
        $data['ruang'] = $this->m_model->get_data('ruangan')->result();
        $this->load->view('operator/ruang/Data_Ruangan', $data);
    }

    public function search()
    {
        $keyword = $this->input->post('keyword');
        $data['ruang'] = $this->m_model->search($keyword);
        $this->load->view('operator/ruang/Data_Ruangan', $data);
    }

    public function tambah_ruang()
    {
        $this->load->view('operator/ruang/tambah_ruang');
    }

    public function aksi_tambah_ruangan()
    {

        $no_lantai = $this->input->post('no_lantai');
        $no_ruang = $this->input->post('no_ruang');
        $deskripsi = $this->input->post('deskripsi');
        $image = $_FILES['foto']['name'];
        $harga = $this->input->post('harga');

        $errors = [];

        // Validasi no_lantai
        if (empty($no_lantai) || !is_numeric($no_lantai)) {
            $errors[] = 'Nomor Lantai harus diisi dengan angka dan tidak boleh kosong.';
        }

        // Validasi no_ruang
        if (empty($no_ruang) || !preg_match('/^[a-zA-Z0-9\s]+$/', $no_ruang)) {
            $errors[] = 'Ruang hanya boleh berisi angka atau huruf';
        }

        // Validasi harga
        if (empty($harga) || !filter_var($harga, FILTER_VALIDATE_INT)) {
            $errors[] = 'Harga harus diisi dengan angka (tanpa ".") dan tidak boleh kosong.';
        } elseif ($harga < 0) {
            $errors[] = 'Harga tidak boleh negatif.';
        }

        // Validasi deskripsi
        if (strpos($deskripsi, '-') !== false) {
            $errors[] = 'Deskripsi tidak boleh mengandung tanda "-".';
        }

        // Validasi foto
        $allowed_extensions = ['jpg', 'jpeg', 'png', 'gif'];
        $file_info = pathinfo($image);
        $extension = isset($file_info['extension']) ? strtolower($file_info['extension']) : null;

        if (empty($image) || !in_array($extension, $allowed_extensions)) {
            $errors[] = 'Foto harus diunggah dengan format JPG, JPEG, PNG, atau GIF.';
        }

        if (count($errors) > 0) {
            $response = [
                'status' => 'error',
                'message' => implode(' ', $errors),
            ];
        } else {
            $image_temp = $_FILES['foto']['tmp_name'];
            $kode = round(microtime(true) * 100);
            $file_name = $kode . '_' . $image;
            $upload_path = './image/ruangan/' . $file_name;

            if (move_uploaded_file($image_temp, $upload_path)) {
                $data = [
                    'image' => $file_name,
                    'no_lantai' => $no_lantai,
                    'no_ruang' => $no_ruang,
                    'deskripsi' => $deskripsi,
                    'harga' => $harga,
                ];

                $inserted = $this->m_model->tambah_data('ruangan', $data);

                if ($inserted) {
                    $response = [
                        'status' => 'success',
                        'message' => 'Data berhasil ditambahkan.',
                        'redirect' => base_url('operator/data_ruangan'),
                    ];
                } else {
                    $response = [
                        'status' => 'error',
                        'message' => 'Gagal menambahkan data. Silakan coba lagi.',
                    ];
                    unlink($upload_path);
                }
            } else {
                $response = [
                    'status' => 'error',
                    'message' => 'Gagal mengunggah gambar. Silakan coba lagi.',
                ];
            }
        }

        // Menggunakan echo json_encode untuk response AJAX
        echo json_encode($response);
    }

    public function pdf()
    {
        $data['bukti_booking'] = $this->m_model->get_data('peminjaman')->result();
        $this->load->view('operator/pdf', $data);
    }

    public function export_pdf($id)
    {
        $data['peminjaman'] = $this->m_model->get_peminjaman_pdf_by_id($this->uri->segment(4))->result();

        if ($this->uri->segment(3) == "pdf") {
            $this->load->library('pdf');
            $this->pdf->load_view('operator/export_pdf', $data);
            $this->pdf->render();
            $this->pdf->stream("bukti_booking.pdf", array("Attachment" => false));
        } else {
            $this->load->view('operator/export_pdf', $data);
        }
    }
    public function edit_ruangan($id)
    {
        // Ambil data ruangan dari database berdasarkan $id
        $data['ruangan'] = $this->m_model->get_ruangan_by_id($id);
        $this->load->view('operator/ruang/edit_ruangan', $data);
    }

    public function aksi_edit_ruangan($id)
    {
        $id = $id; // ID ruangan yang diberikan melalui parameter

        // Ambil data yang di-post dari form
        $no_lantai = $this->input->post('no_lantai');
        $no_ruang = $this->input->post('no_ruang');
        $deskripsi = $this->input->post('deskripsi');
        $harga = $this->input->post('harga');
        $image = $_FILES['foto']['name'];
        $foto_temp = $_FILES['foto']['tmp_name'];

        $response = [
            'status' => 'error', // Default status error
            'message' => 'Terjadi kesalahan saat mengubah ruangan.', // Default pesan error
            'redirect' => '' // Redirect URL setelah berhasil atau gagal
        ];

        // Load the form validation library
        $this->load->library('form_validation');

        $this->load->library('form_validation');

        // Set custom error messages for form validation
        $this->form_validation->set_message('required', 'Kolom {field} wajib diisi.');
        $this->form_validation->set_message('numeric', 'Kolom {field} harus berisi angka.');
        $this->form_validation->set_message('alpha_numeric', 'Kolom {field} hanya boleh berisi huruf dan angka.');
        $this->form_validation->set_message('check_deskripsi', 'Kolom {field} tidak boleh mengandung tanda "-"');
        $this->form_validation->set_message('numeric', 'Kolom {field} harus berisi angka untuk harga.');

        // Additional validation for 'harga' to ensure it's an integer
        $this->form_validation->set_rules('harga', 'Harga', 'required|numeric|callback_check_integer');
        $this->form_validation->set_rules('no_lantai', 'Nomor Lantai', 'required|numeric');
        $this->form_validation->set_rules('no_ruang', 'Nomor Ruang', 'required|regex_match[/^[a-zA-Z0-9 ]+$/]');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required|callback_check_deskripsi');
        $this->form_validation->set_rules('harga', 'Harga', 'required|numeric');

        // Run validation
        if ($this->form_validation->run() == false) {
            // Validation failed
            $response = [
                'status' => 'error',
                'message' => strip_tags(validation_errors()), // Strip HTML tags from error messages
                'redirect' => base_url('operator/ruang/ruang/edit_ruangan/' . $id), // Redirect to the edit page
            ];

            // Send JSON response and exit
            header('Content-Type: application/json');
            echo json_encode($response);
            return;
        }

        // Cek apakah ID ruangan valid (contoh: Anda dapat menambahkan pengecekan di sini)
        if ($id) {
            // Dapatkan data ruangan dari database berdasarkan ID
            $current_data = $this->m_model->get_ruangan_by_id($id);

            if ($current_data) {
                // Cek apakah ada perubahan data
                $data = [];

                // Set data ke dalam array tanpa memeriksa perubahan
                $data['harga'] = $harga;
                $data['no_lantai'] = $no_lantai;
                $data['no_ruang'] = $no_ruang;
                $data['deskripsi'] = $deskripsi;

                // Periksa apakah setidaknya satu bidang data berbeda dengan data yang ada di database
                if ($no_lantai !== $current_data->no_lantai || $no_ruang !== $current_data->no_ruang || $deskripsi !== $current_data->deskripsi || $harga !== $current_data->harga || !empty($image)) {
                    // Ada perubahan data, lanjutkan proses penyimpanan
                    if (!empty($image)) {
                        // Validasi ekstensi file gambar
                        $allowed_extensions = ['jpg', 'jpeg', 'png', 'gif'];
                        $file_extension = pathinfo($image, PATHINFO_EXTENSION);

                        if (!in_array(strtolower($file_extension), $allowed_extensions)) {
                            // Ekstensi file tidak diizinkan
                            $response = [
                                'status' => 'error',
                                'message' => 'Ekstensi file tidak diizinkan. Pilih file gambar dengan ekstensi: ' . implode(', ', $allowed_extensions),
                                'redirect' => base_url('operator/ruang/ruang/edit_ruangan/' . $id), // Redirect ke halaman edit jika gagal
                            ];
                            // Kirim respons JSON
                            header('Content-Type: application/json');
                            echo json_encode($response);
                            return; // Stop execution
                        }

                        // Lakukan pengelolaan gambar seperti yang telah dijelaskan dalam pertanyaan sebelumnya
                        $kode = round(microtime(true) * 100);
                        $file_name = $kode . '_' . $image;
                        $upload_path = './image/ruangan/' . $file_name;

                        if (move_uploaded_file($foto_temp, $upload_path)) {
                            // Hapus image lama jika ada
                            $old_file = $this->m_model->get_image_by_id('ruangan', $id);
                            if ($old_file && file_exists('./image/ruangan/' . $old_file)) {
                                unlink('./image/ruangan/' . $old_file);
                            }

                            $data['image'] = $file_name;
                        } else {
                            // Gagal mengunggah gambar baru
                            $response = [
                                'status' => 'error',
                                'message' => 'Gagal mengunggah gambar. Silakan coba lagi.',
                                'redirect' => base_url('operator/ruang/ruang/edit_ruangan/' . $id), // Redirect ke halaman edit jika gagal
                            ];
                        }
                    }

                    // Eksekusi dengan model edit_ruangan tanpa memeriksa perubahan
                    $update_result = $this->m_model->edit_ruangan($id, $data);

                    if ($update_result) {
                        $response = [
                            'status' => 'success',
                            'message' => 'Berhasil Mengubah Ruangan',
                            'redirect' => base_url('operator/data_ruangan'), // Redirect ke halaman daftar ruangan jika berhasil
                        ];
                    }
                } else {
                    // Tidak ada perubahan data
                    $response = [
                        'status' => 'error',
                        'message' => 'Anda harus mengubah setidaknya satu data ruangan.',
                        'redirect' => base_url('operator/ruang/ruang/edit_ruangan/' . $id), // Redirect ke halaman edit jika tidak ada perubahan
                    ];
                }
            }
        }

        // Kirim respons JSON
        header('Content-Type: application/json');
        echo json_encode($response);
    }

    // Callback function for checking deskripsi
    public function check_deskripsi($str)
    {
        if (strpos($str, '-') !== false) {
            $this->form_validation->set_message('check_deskripsi', 'Kolom {field} tidak boleh mengandung tanda "-"');
            return false;
        } else {
            return true;
        }
    }

    public function check_integer($str)
    {
        if (filter_var($str, FILTER_VALIDATE_INT) === false) {
            $this->form_validation->set_message('check_integer', 'Kolom {field} harus berisi angka tanpa desimal.');
            return false;
        }
        return true;
    }

    public function hapus_data_ruangan($id)
    {
        // Ambil data ruangan
        $ruangan = $this->m_model->get_ruangan_by_id($id);

        // Pastikan data ruangan ditemukan
        if (!$ruangan) {
            $this->session->set_flashdata('error', 'Data ruangan tidak ditemukan.');
            redirect('operator/data_ruangan');
        }

        // Hapus gambar dari folder image/ruangan jika ada
        $image_file = $ruangan->image;
        if ($image_file) {
            $image_path = 'image/ruangan/' . $image_file;
            if (file_exists($image_path)) {
                unlink($image_path);
            }
        }

        // Hapus data dari tabel ruangan
        $this->m_model->delete('ruangan', 'id', $id);

        // Tampilkan pesan sukses dan alihkan ke halaman data ruangan
        $this->session->set_flashdata('success', 'Data ruangan berhasil dihapus.');
        redirect('operator/data_ruangan');
    }

    public function hapus_image($id)
    {
        // Ambil data ruangan dari database berdasarkan ID
        $ruangan = $this->m_model->get_ruangan_by_id($id);

        if ($ruangan) {
            // Dapatkan nama file gambar
            $image_file = $ruangan->image;

            if ($image_file) {
                // Hapus file gambar dari direktori
                $image_path = './image/ruangan/' . $image_file;

                if (file_exists($image_path) && unlink($image_path)) {
                    // Update data ruangan di database untuk menghapus referensi gambar
                    $data = ['image' => '']; // Atur kolom gambar menjadi kosong
                    $this->m_model->edit_ruangan($id, $data);

                    // Kirim respons JSON untuk memberi tahu hasil penghapusan gambar
                    $response = [
                        'status' => 'success',
                        'message' => 'Gambar telah dihapus.',
                        'redirect' => base_url('operator/data_ruangan') // Tambahkan URL tujuan
                    ];
                } else {
                    // Jika gagal menghapus gambar
                    $response = [
                        'status' => 'error',
                        'message' => 'Gambar tidak dapat dihapus. Silakan coba lagi.'
                    ];
                }
            } else {
                // Jika tidak ada gambar
                $response = [
                    'status' => 'error',
                    'message' => 'Gambar sudah dihapus.'
                ];
            }
        } else {
            // Jika data ruangan tidak ditemukan
            $response = [
                'status' => 'error',
                'message' => 'Data ruangan tidak ditemukan.'
            ];
        }

        // Kirim respons JSON ke browser
        header('Content-Type: application/json');
        echo json_encode($response);
    }

    public function data_master_pelanggan()
    {
        $data['pelanggan'] = $this->m_model->get_data('pelanggan')->result();
        $this->load->view('operator/pelanggan/data_master_pelanggan', $data);
    }

    public function tambah_pelanggan()
    {
        // $data['pelanggan'] = $this->m_model->get_data('pelanggan')->result();
        $this->load->view('operator/pelanggan/tambah_pelanggan');
    }
    // public function aksi_tambah_pelanggan()
    // {
    //     $nama = $this->input->post('nama');
    //     $phone = $this->input->post('phone');
    //     $payment_method = $this->input->post('payment_method');

    //     $data = array(
    //         'nama' => $nama,
    //         'phone' => $phone,
    //         'payment_method' => $payment_method
    //     );

    //     $this->m_model->tambah_data('pelanggan', $data);
    //     redirect(base_url('operator/data_master_pelanggan'));
    // }

    // // update data pelanggan
    // public function update_data($id)
    // {
    //     $data['pelanggan'] = $this->m_model->get_by_id('pelanggan', 'id', $id)->result();
    //     $this->load->view('operator/pelanggan/update_data', $data);
    // }
   

    public function aksi_tambah_pelanggan()
{
    $nama = $this->input->post('nama');
    $phone = $this->input->post('phone');
    $payment_method = $this->input->post('payment_method');

    $errors = [];

    // Validasi nama
    if (empty($nama) || !preg_match('/^[a-zA-Z0-9\s]+$/', $nama)) {
        $errors[] = 'Isi nama lengkap dengan huruf, angka, dan spasi saja.';
    }

    // Validasi phone
    if (empty($phone) || !preg_match('/^[0-9\s]+$/', $phone)) {
        $errors[] = 'Isi nomor telepon hanya dengan angka';
    }

    // Validasi payment_method
    if (empty($payment_method) || !preg_match('/^[a-zA-Z0-9\s]+$/', $payment_method)) {
        $errors[] = 'Isi metode pembayaran dengan benar';
    }

    if (count($errors) > 0) {
        $response = [
            'status' => 'error',
            'message' => implode(' ', $errors),
        ];
    } else {
        $data = [
            'nama' => $nama,
            'phone' => $phone,
            'payment_method' => $payment_method,
        ];

        $inserted = $this->m_model->tambah_data('pelanggan', $data);

        if ($inserted) {
            $response = [
                'status' => 'success',
                'message' => 'Data berhasil ditambahkan.',
                'redirect' => base_url('operator/data_master_pelanggan'),
            ];
        } else {
            $response = [
                'status' => 'error',
                'message' => 'Gagal menambahkan data. Silakan coba lagi.',
            ];
        }
    }

    // Menggunakan echo json_encode untuk response AJAX
    echo json_encode($response);
}


    // aksi update data pelanggan
    public function aksi_update_data()
    {
        $data = array(
            'nama' => $this->input->post('nama'),
            'phone' => $this->input->post('phone'),
            'payment_method' => $this->input->post('payment_method'),
        );
        $eksekusi = $this->m_model->ubah_data('pelanggan', $data, array('id' => $this->input->post('id')));
        if ($eksekusi) {
            $this->session->set_flashdata('sukses', 'berhasil');
            redirect(base_url('operator/data_master_pelanggan'));
        } else {
            $this->session->set_flashdata('error', 'gagal..');
            redirect(base_url('operator/update_data/' . $this->input->post('id')));
        }
    }

    // Hapus Pelanggan
    public function hapus_data_pelanggan($id)
    {
        $this->m_model->delete('pelanggan', 'id', $id);
        redirect(base_url('operator/data_master_pelanggan'));
    }

    public function peminjaman_tempat()
    {
        $data['peminjaman'] = $this->m_model->get_peminjaman_by_status();
        $this->load->view('operator/peminjaman/table_peminjaman_tempat', $data);
    }

    public function tambah_peminjaman_tempat()
    {
        $data['tambahan'] = $this->m_model->get_data('tambahan')->result();
        $data['ruangan'] = $this->m_model->get_data('ruangan')->result();
        $data['pelanggan'] = $this->m_model->get_data('pelanggan')->result();
        $this->load->view('operator/peminjaman/tambah_peminjaman_tempat', $data);
    }
    public function edit_peminjaman_tempat($id)
    {
        $data['tambahan'] = $this->m_model->get_data('tambahan')->result();
        $data['ruangan'] = $this->m_model->get_data('ruangan')->result();
        $data['peminjaman'] = $this->m_model->get_by_id('peminjaman', 'id', $id)->result();
        $this->load->view('operator/peminjaman/edit_peminjaman_tempat', $data);
    }

    public function check_expired_bookings()
    {
        // Implementasi logika untuk memeriksa pemesanan yang berakhir dan mengubah statusnya

        $bookings = $this->m_model->get_expired_bookings();

        foreach ($bookings as $booking) {
            $this->m_model->update_status($booking->id, 'selesai');
        }
    }

    function generate_booking_code($length = 8)
    {
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $code = '';

        for ($i = 0; $i < $length; $i++) {
            $code .= $characters[rand(0, strlen($characters) - 1)];
        }

        return $code;
    }

    public function aksi_peminjaman()
    {
        // Memperoleh data dari formulir
        $nama = $this->input->post('nama');
        $id_ruangan = $this->input->post('ruang');
        $jumlah_orang = $this->input->post('kapasitas');
        $start_time = $this->input->post('booking');
        $end_time = $this->input->post('akhir_booking');
        $id_tambahan = $this->input->post('tambahan');

        // Mendapatkan ID pelanggan berdasarkan nama
        $id_pelanggan = tampil_pelanggan_bynama($nama);

        // Menghasilkan kode booking
        $generate = $this->generate_booking_code();

        // Memeriksa konflik waktu
        if ($this->m_model->is_time_conflict($id_ruangan, $start_time, $end_time)) {
            echo "<script>alert('Waktu pemesanan bertabrakan. Silakan pilih waktu yang lain.');  window.location.href = '" . base_url('operator/tambah_peminjaman_tempat') . "';</script>";
            return;
        }

        // Menghitung durasi dan harga ruangan
        $tanggalBooking = new DateTime($start_time);
        $tanggalBerakhir = new DateTime($end_time);
        $durasi = $tanggalBooking->diff($tanggalBerakhir);
        $harga_ruangan_default = tampil_harga_ruangan_byid($id_ruangan);
        $harga_ruangan = $harga_ruangan_default * $durasi->days;

        // Menghitung harga snack
        $harga = 0;
        if (!empty($id_tambahan)) {
            foreach ($id_tambahan as $id) {
                $harga += tampil_harga_tambahan_byid($id);
                // Jika jenis snack adalah makanan, kali dengan jumlah orang
                $tambahan_info = tampil_info_tambahan_byid($id);
                if ($tambahan_info === 'Makanan' || $tambahan_info === 'Minuman') {
                    $harga *= $jumlah_orang;
                }
            }
        }
        // Menghitung total harga
        $harga_keseluruhan = $harga + $harga_ruangan;

        // Menyiapkan data untuk dimasukkan ke tabel peminjaman
        $data_peminjaman = [
            'id_pelanggan' => $id_pelanggan,
            'id_ruangan' => $id_ruangan,
            'tanggal_booking' => $start_time,
            'tanggal_berakhir' => $end_time,
            'jumlah_orang' => $jumlah_orang,
            'kode_booking' => $generate,
            'total_harga' => $harga_keseluruhan,
            'status' => 'proses',
        ];

        // Memasukkan data ke tabel peminjaman
        $id_peminjaman = $this->m_model->tambah_data('peminjaman', $data_peminjaman);

        // Menyiapkan data untuk dimasukkan ke tabel peminjaman_tambahan
        if (!empty($id_tambahan)) {
            foreach ($id_tambahan as $id) {
                $data_tambahan = [
                    'id_pelanggan' => $id_pelanggan,
                    'id_peminjaman' => $id_peminjaman,
                    'id_tambahan' => $id,
                ];

                // Memasukkan data ke tabel peminjaman_tambahan
                $tambahan_success = $this->m_model->tambah_data('peminjaman_tambahan', $data_tambahan);

                if (!$tambahan_success) {
                    // Handle error jika tambahan tidak berhasil dimasukkan
                    // Misalnya: Tampilkan pesan error atau lakukan rollback
                    echo "<script>alert('Gagal menambahkan data tambahan.'); window.location.href = '" . base_url('operator/tambah_peminjaman_tempat') . "';</script>";
                    return;
                }
            }

            $this->check_expired_bookings();
            // Operasi berhasil
            // Redirect atau tampilkan pesan sukses
            redirect(base_url('operator/peminjaman_tempat'));
        }
    }

    public function hapus_peminjaman($id)
    {
        $this->m_model->delete('peminjaman', 'id', $id);
        redirect(base_url('operator/peminjaman_tempat'));
    }
    public function aksi_edit_peminjaman()
    {
        $nama = $this->input->post('nama');
        $id_ruangan = $this->input->post('ruang');
        $jumlah_orang = $this->input->post('kapasitas');
        $start_time = $this->input->post('booking');
        $end_time = $this->input->post('akhir_booking');
        $id_tambahan = $this->input->post('tambahan');

        // Mendapatkan ID pelanggan berdasarkan nama
        $id_pelanggan = tampil_pelanggan_bynama($nama);


        // Menghitung durasi dan harga ruangan
        $tanggalBooking = new DateTime($start_time);
        $tanggalBerakhir = new DateTime($end_time);
        $durasi = $tanggalBooking->diff($tanggalBerakhir);
        $harga_ruangan_default = tampil_harga_ruangan_byid($id_ruangan);
        $harga_ruangan = $harga_ruangan_default * $durasi->days;

        // Menghitung harga tambahan (snack)
        $harga_tambahan = 0;
        if (!empty($id_tambahan)) {
            foreach ($id_tambahan as $id) {
                $harga_tambahan += tampil_harga_tambahan_byid($id);

                // Jika jenis tambahan adalah makanan, kali dengan jumlah orang
                $tambahan_info = tampil_info_tambahan_byid($id);
                if ($tambahan_info && $tambahan_info === 'Makanan' || $tambahan_info === 'Minuman') {
                    $harga_tambahan *= $jumlah_orang;
                }
            }
        }

        // Menghitung total harga
        $harga_keseluruhan = $harga_tambahan + $harga_ruangan;

        // Menyiapkan data untuk dimasukkan ke tabel peminjaman
        $data_peminjaman = [
            'id_pelanggan' => $id_pelanggan,
            'id_ruangan' => $id_ruangan,
            'jumlah_orang' => $jumlah_orang,
            'total_harga' => $harga_keseluruhan,
        ];

        // Memperbarui data di tabel peminjaman
        $this->m_model->update('peminjaman', $data_peminjaman, array('id' => $this->input->post('id')));

        // Menghapus data tambahan sebelum menambah yang baru
        $this->m_model->delete(array('peminjaman_tamnbahan', 'id_peminjaman' => $this->input->post('id')));

        // Menyiapkan data untuk dimasukkan ke tabel peminjaman_tambahan
        if (!empty($id_tambahan)) {
            foreach ($id_tambahan as $id) {
                $data_tambahan = [
                    'id_peminjaman' => $this->input->post('id'),
                    'id_tambahan' => $id,
                ];

                // Memasukkan data ke tabel peminjaman_tambahan
                $this->m_model->tambah_data('peminjaman_tambahan', $data_tambahan);
            }
        }

        $this->check_expired_bookings();
        // Redirect atau tampilkan pesan sukses
        redirect(base_url('operator/peminjaman_tempat'));
    }


    public function report_sewa()
    {
        $data['peminjaman'] = $this->m_model->get_report_sewa_by_status();
        $this->load->view('operator/report_sewa/tabel_report_sewa', $data); // Mengirimkan data ke tampilan
    }

    public function update_report_sewa($id)
    {
        $data['peminjaman'] = $this->m_model->get_status_peminjaman('peminjaman', 'id')->result();
        $this->load->view('operator/pelanggan/update_report_sewa', $data);
    }
    public function aksi_update_report_sewa($id)
    {
        $id_ruangan = $this->input->post('ruang');
        $jumlah_orang = $this->input->post('kapasitas');
        $start_time = $this->input->post('booking');
        $end_time = $this->input->post('akhir_booking');
        $id_tambahan = $this->input->post('tambahan');

        // Mendapatkan ID pelanggan berdasarkan nama
        $id_pelanggan = tampil_pelanggan_bynama($nama);

        // Memeriksa konflik waktu
        if ($this->m_model->is_time_conflict($id_ruangan, $start_time, $end_time)) {
            echo "<script>alert('Waktu pemesanan bertabrakan. Silakan pilih waktu yang lain.');  window.location.href = '" . base_url('operator/tambah_peminjaman_tempat') . "';</script>";
            return;
        }

        $harga_snack = $jumlah * $jumlah;
        $harga_keseluruhan = $harga_snack + $harga_ruangan;
        $data = [
            'id_pelanggan' => $id_pelanggan,
            'id_ruangan' => $id_ruangan,

            'tanggal_booking' => $start_time,
            'tanggal_berakhir' => $end_time,
            'jumlah_orang' => $jumlah,
            'kode_booking' => $generate,
            'total_harga' => $harga_keseluruhan,
            'status' => 'proses',
        ];
        $this->m_model->update('peminjaman', $data, array('id' => $this->input->post('id')));
        $this->check_expired_bookings();
        redirect(base_url('operator/tabel_report_sewa'));
    }

    //EXPORT PELANGGAN
    public function export_pelanggan()
    {

        // Load autoloader Composer
        require 'vendor/autoload.php';

        $spreadsheet = new Spreadsheet();

        // Buat lembar kerja aktif
        $sheet = $spreadsheet->getActiveSheet();
        // Data yang akan diekspor (contoh data)
        $data = $this->m_model->get_data('pelanggan')->result();

        // Buat objek Spreadsheet
        $headers = ['NO', 'NAMA', 'NO TELEPON', 'METODE PEMBAYARAN'];
        $rowIndex = 1;
        foreach ($headers as $header) {
            $sheet->setCellValueByColumnAndRow($rowIndex, 1, $header);
            $rowIndex++;
        }

        // Isi data dari database
        $rowIndex = 2;
        $no = 1;
        foreach ($data as $rowData) {
            $columnIndex = 1;
            $id = '';
            $nama = '';
            $phone = '';
            $payment_method = '';
            foreach ($rowData as $cellName => $cellData) {
                if ($cellName == 'id') {
                    $id = $cellData;
                } elseif ($cellName == 'nama') {
                    $nama = $cellData;
                } elseif ($cellName == 'phone') {
                    $phone = $cellData;
                } elseif ($cellName == 'payment_method') {
                    $payment_method = $cellData;
                }

                // Anda juga dapat menambahkan logika lain jika perlu

                // Contoh: $sheet->setCellValueByColumnAndRow($columnIndex, $rowIndex, $cellData);
                $columnIndex++;
            }

            // Setelah loop, Anda memiliki data yang diperlukan dari setiap kolom
            // Anda dapat mengisinya ke dalam lembar kerja Excel di sini
            $sheet->setCellValueByColumnAndRow(1, $rowIndex, $no);
            $sheet->setCellValueByColumnAndRow(2, $rowIndex, $nama);
            $sheet->setCellValueByColumnAndRow(3, $rowIndex, $phone);
            $sheet->setCellValueByColumnAndRow(4, $rowIndex, $payment_method);
            $no++;
            $rowIndex++;
        }
        // Auto size kolom berdasarkan konten
        foreach (range('A', $sheet->getHighestDataColumn()) as $col) {
            $sheet->getColumnDimension($col)->setAutoSize(true);
        }

        // Set style header
        $headerStyle = [
            'font' => ['bold' => true],
            'alignment' => ['horizontal' => Alignment::HORIZONTAL_CENTER],
        ];
        $sheet->getStyle('A1:' . $sheet->getHighestDataColumn() . '1')->applyFromArray($headerStyle);

        // Konfigurasi output Excel
        $writer = new Xlsx($spreadsheet);
        $filename = 'DATA_PELANGGAN.xlsx'; // Nama file Excel yang akan dihasilkan

        // Set header HTTP untuk mengunduh file Excel
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        // Outputkan file Excel ke browser
        $writer->save('php://output');
    }

    public function export_report_sewa()
    {

        // Load autoloader Composer
        require 'vendor/autoload.php';

        $spreadsheet = new Spreadsheet();

        // Buat lembar kerja aktif
        $sheet = $spreadsheet->getActiveSheet();
        // Data yang akan diekspor (contoh data)
        $data = $this->m_model->get_status_peminjaman('peminjaman')->result();

        // Buat objek Spreadsheet
        $headers = ['NO', 'NAMA', 'RUANGAN', 'KAPASITAS', 'KODE','TAMBAHAN','SNACK', 'TOTAL BOOKING', 'STATUS'];
        $rowIndex = 1;
        foreach ($headers as $header) {
            $sheet->setCellValueByColumnAndRow($rowIndex, 1, $header);
            $rowIndex++;
        }

        // Isi data dari database
        $rowIndex = 2;
        $no = 1;
        foreach ($data as $rowData) {
            $columnIndex = 1;
            $nama = '';
            $id_ruangan = '';
            $jumlah_orang = '';
            $kode_booking = '';
            $id_tambahan = '';
            $tanggal_booking = '';
            $status = '';
            foreach ($rowData as $cellName => $cellData) {
                if ($cellName == 'id_pelanggan') {
                    $nama = tampil_nama_penyewa_byid($cellData);
                } elseif ($cellName == 'id_ruangan') {
                    $id_ruangan = tampil_nama_ruangan_byid($cellData);
                } elseif ($cellName == 'jumlah_orang') {
                    $jumlah_orang = $cellData;
                } elseif ($cellName == 'kode_booking') {
                    $kode_booking = $cellData;
                } elseif ($cellName == 'id_tambahan') {
                    $id_tambahan = $cellData;
                } elseif ($cellName == 'tanggal_booking') {
                    $tanggal_booking = $cellData;
                } elseif ($cellName == 'status') {
                    $status = $cellData;
                } elseif ($cellName == 'tanggal_berakhir') {
                    $tanggal_berakhir = $cellData;
                }

                if (!empty($tanggal_booking) && !empty($tanggal_berakhir)) {
                    $tanggalBooking = new DateTime($tanggal_booking);
                    $tanggalBerakhir = new DateTime($tanggal_berakhir);
                    $durasi = $tanggalBooking->diff($tanggalBerakhir);
                    $total_booking = $durasi->days . 'Hari';
                }
                // Contoh: $sheet->setCellValueByColumnAndRow($columnIndex, $rowIndex, $cellData);
                $columnIndex++;
            }

            // Setelah loop, Anda memiliki data yang diperlukan dari setiap kolom
            // Anda dapat mengisinya ke dalam lembar kerja Excel di sini
            $sheet->setCellValueByColumnAndRow(1, $rowIndex, $no);
            $sheet->setCellValueByColumnAndRow(2, $rowIndex, $nama);
            $sheet->setCellValueByColumnAndRow(3, $rowIndex, $id_ruangan);
            $sheet->setCellValueByColumnAndRow(4, $rowIndex, $jumlah_orang);
            $sheet->setCellValueByColumnAndRow(5, $rowIndex, $kode_booking);
            $sheet->setCellValueByColumnAndRow(6, $rowIndex, $id_tambahan);
            $sheet->setCellValueByColumnAndRow(8, $rowIndex, $total_booking);
            $sheet->setCellValueByColumnAndRow(9, $rowIndex, $status);

            $no++;
            $rowIndex++;
        }
        // Auto size kolom berdasarkan konten
        foreach (range('A', $sheet->getHighestDataColumn()) as $col) {
            $sheet->getColumnDimension($col)->setAutoSize(true);
        }

        // Set style header
        $headerStyle = [
            'font' => ['bold' => true],
            'alignment' => ['horizontal' => Alignment::HORIZONTAL_CENTER],
        ];
        $sheet->getStyle('A1:' . $sheet->getHighestDataColumn() . '1')->applyFromArray($headerStyle);

        // Konfigurasi output Excel
        $writer = new Xlsx($spreadsheet);
        $filename = 'DATA_REPORT_SEWA.xlsx'; // Nama file Excel yang akan dihasilkan

        // Set header HTTP untuk mengunduh file Excel
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        // Outputkan file Excel ke browser
        $writer->save('php://output');
    }

    public function expor_ruangan()
    {

        // Load autoloader Composer
        require 'vendor/autoload.php';

        $spreadsheet = new Spreadsheet();

        // Buat lembar kerja aktif
        $sheet = $spreadsheet->getActiveSheet();
        // Data yang akan diekspor (contoh data)
        $data = $this->m_model->get_data('ruangan')->result();

        // Buat objek Spreadsheet
        $headers = ['NO', 'RUANGAN', 'LANTAI', 'KETERANGAN', 'HARGA'];
        $rowIndex = 1;
        foreach ($headers as $header) {
            $sheet->setCellValueByColumnAndRow($rowIndex, 1, $header);
            $rowIndex++;
        }

        // Isi data dari database
        $rowIndex = 2;
        $no = 1;
        foreach ($data as $rowData) {
            $columnIndex = 1;
            $id = '';
            $no_ruang = '';
            $no_lantai = '';
            $deskripsi = '';
            $harga = '';
            foreach ($rowData as $cellName => $cellData) {
                if ($cellName == 'id') {
                    $id = $cellData;
                } elseif ($cellName == 'no_ruang') {
                    $no_ruang = $cellData;
                } elseif ($cellName == 'no_lantai') {
                    $no_lantai = $cellData;
                } elseif ($cellName == 'deskripsi') {
                    $deskripsi = $cellData;
                } elseif ($cellName == 'harga') {
                    $harga = $cellData;
                }

                // Anda juga dapat menambahkan logika lain jika perlu

                // Contoh: $sheet->setCellValueByColumnAndRow($columnIndex, $rowIndex, $cellData);
                $columnIndex++;
            }

            // Setelah loop, Anda memiliki data yang diperlukan dari setiap kolom
            // Anda dapat mengisinya ke dalam lembar kerja Excel di sini
            $sheet->setCellValueByColumnAndRow(1, $rowIndex, $no);
            $sheet->setCellValueByColumnAndRow(2, $rowIndex, $no_ruang);
            $sheet->setCellValueByColumnAndRow(3, $rowIndex, $no_lantai);
            $sheet->setCellValueByColumnAndRow(4, $rowIndex, $deskripsi);
            $sheet->setCellValueByColumnAndRow(5, $rowIndex, $harga);
            $no++;
            $rowIndex++;
        }
        // Auto size kolom berdasarkan konten
        foreach (range('A', $sheet->getHighestDataColumn()) as $col) {
            $sheet->getColumnDimension($col)->setAutoSize(true);
        }

        // Set style header
        $headerStyle = [
            'font' => ['bold' => true],
            'alignment' => ['horizontal' => Alignment::HORIZONTAL_CENTER],
        ];
        $sheet->getStyle('A1:' . $sheet->getHighestDataColumn() . '1')->applyFromArray($headerStyle);

        // Konfigurasi output Excel
        $writer = new Xlsx($spreadsheet);
        $filename = 'DATA RUANGAN.xlsx'; // Nama file Excel yang akan dihasilkan

        // Set header HTTP untuk mengunduh file Excel
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        // Outputkan file Excel ke browser
        $writer->save('php://output');
    }

    public function expor_tambahan()
    {

        // Load autoloader Composer
        require 'vendor/autoload.php';

        $spreadsheet = new Spreadsheet();

        // Buat lembar kerja aktif
        $sheet = $spreadsheet->getActiveSheet();
        // Data yang akan diekspor (contoh data)
        $data = $this->m_model->get_data('tambahan')->result();

        // Buat objek Spreadsheet
        $headers = ['NO', 'NAMA ITEM', 'HARGA', 'DESKRIPSI', 'JENIS'];
        $rowIndex = 1;
        foreach ($headers as $header) {
            $sheet->setCellValueByColumnAndRow($rowIndex, 1, $header);
            $rowIndex++;
        }

        // Isi data dari database
        $rowIndex = 2;
        $no = 1;
        foreach ($data as $rowData) {
            $columnIndex = 1;
            $id = '';
            $nama = '';
            $harga = '';
            $deskripsi = '';
            $jenis = '';
            foreach ($rowData as $cellName => $cellData) {
                if ($cellName == 'id') {
                    $id = $cellData;
                } elseif ($cellName == 'nama') {
                    $nama = $cellData;
                } elseif ($cellName == 'harga') {
                    $harga = $cellData;
                } elseif ($cellName == 'deskripsi') {
                    $deskripsi = $cellData;
                } elseif ($cellName == 'jenis') {
                    $jenis = $cellData;
                }

                // Anda juga dapat menambahkan logika lain jika perlu

                // Contoh: $sheet->setCellValueByColumnAndRow($columnIndex, $rowIndex, $cellData);
                $columnIndex++;
            }

            // Setelah loop, Anda memiliki data yang diperlukan dari setiap kolom
            // Anda dapat mengisinya ke dalam lembar kerja Excel di sini
            $sheet->setCellValueByColumnAndRow(1, $rowIndex, $no);
            $sheet->setCellValueByColumnAndRow(2, $rowIndex, $nama);
            $sheet->setCellValueByColumnAndRow(3, $rowIndex, $harga);
            $sheet->setCellValueByColumnAndRow(4, $rowIndex, $deskripsi);
            $sheet->setCellValueByColumnAndRow(5, $rowIndex, $jenis);
            $no++;
            $rowIndex++;
        }
        // Auto size kolom berdasarkan konten
        foreach (range('A', $sheet->getHighestDataColumn()) as $col) {
            $sheet->getColumnDimension($col)->setAutoSize(true);
        }

        // Set style header
        $headerStyle = [
            'font' => ['bold' => true],
            'alignment' => ['horizontal' => Alignment::HORIZONTAL_CENTER],
        ];
        $sheet->getStyle('A1:' . $sheet->getHighestDataColumn() . '1')->applyFromArray($headerStyle);

        // Konfigurasi output Excel
        $writer = new Xlsx($spreadsheet);
        $filename = 'PEMINJAMAN TAMBAHAN.xlsx'; // Nama file Excel yang akan dihasilkan

        // Set header HTTP untuk mengunduh file Excel
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        // Outputkan file Excel ke browser
        $writer->save('php://output');
    }

    public function import_ruang()
    {
        if (isset($_FILES["file"]["name"])) {
            $path = $_FILES["file"]["tmp_name"];
            $object = PhpOffice\PhpSpreadsheet\IOFactory::load($path);
            foreach ($object->getWorksheetIterator() as $worksheet) {
                // untuk mencari tahu seberapa banyak data yg ada
                $highestRow = $worksheet->getHighestRow();
                $highestColumn = $worksheet->getHighestColumn();

                // $row = 2; artine data dimulai dari baris ke2
                for ($row = 2; $row <= $highestRow; $row++) {
                    $no_ruang = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
                    $no_lantai = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
                    $deskripsi = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
                    $harga = $worksheet->getCellByColumnAndRow(5, $row)->getValue();

                    // Validate that none of the imported values are empty
                    if (empty($no_ruang) || empty($no_lantai) || empty($deskripsi) || empty($harga)) {
                        // Handle the case where any of the required fields is empty
                        // You may want to log an error, skip the row, or take other appropriate actions
                        continue;
                    }

                    // Optionally, you may want to perform additional validation or processing on the data

                    $data = array(
                        'no_ruang' => $no_ruang,
                        'no_lantai' => $no_lantai,
                        'deskripsi' => $deskripsi,
                        'harga' => $harga
                    );

                    // untuk menambahkan ke database
                    $this->m_model->tambah_data('ruangan', $data);
                }
            }
            redirect(base_url('operator/data_ruangan'));
        } else {
            echo 'Invalid file';
        }
    }
    public function import_pelanggan()
    {
        if (isset($_FILES["file"]["name"])) {
            $path = $_FILES["file"]["tmp_name"];
            $object = PhpOffice\PhpSpreadsheet\IOFactory::load($path);
            foreach ($object->getWorksheetIterator() as $worksheet) {
                // untuk mencari tahu seberapa banyak data yg ada
                $highestRow = $worksheet->getHighestRow();
                $highestColumn = $worksheet->getHighestColumn();

                // $row = 2; artine data dimulai dari baris ke2
                for ($row = 2; $row <= $highestRow; $row++) {
                    $nama = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
                    $phone = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
                    $payment_method = $worksheet->getCellByColumnAndRow(4, $row)->getValue();


                    // Validate that none of the imported values are empty
                    if (empty($nama) || empty($phone) || empty($payment_method)) {
                        // Handle the case where any of the required fields is empty
                        // You may want to log an error, skip the row, or take other appropriate actions
                        continue;
                    }

                    // Optionally, you may want to perform additional validation or processing on the data

                    $data = array(
                        'nama' => $nama,
                        'phone' => $phone,
                        'payment_method' => $payment_method,
                    );

                    // untuk menambahkan ke database
                    $this->m_model->tambah_data('pelanggan', $data);
                }
            }
            redirect(base_url('operator/data_master_pelanggan'));
        } else {
            echo 'Invalid file';
        }
    }
    public function export_tambahan()
    {

        // Load autoloader Composer
        require 'vendor/autoload.php';

        $spreadsheet = new PhpOffice\PhpSpreadsheet\Spreadsheet();

        // Buat lembar kerja aktif
        $sheet = $spreadsheet->getActiveSheet();
        // Data yang akan diekspor (contoh data)
        $data = $this->m_model->get_data('tambahan')->result();

        // Buat objek Spreadsheet
        $headers = ['NO', 'NAMA ITEM', 'HARGA', 'JENIS', 'DESKRIPSI'];
        $rowIndex = 1;
        foreach ($headers as $header) {
            $sheet->setCellValueByColumnAndRow($rowIndex, 1, $header);
            $rowIndex++;
        }

        // Isi data dari database
        $rowIndex = 2;
        $no = 1;
        foreach ($data as $rowData) {
            $columnIndex = 1;
            $nama = '';
            $harga = '';
            $jenis = '';
            $deskripsi = '';
            foreach ($rowData as $cellName => $cellData) {
                if ($cellName == 'nama') {
                    $nama = $cellData;
                } elseif ($cellName == 'harga') {
                    $harga = $cellData;
                } elseif ($cellName == 'jenis') {
                    $jenis = $cellData;
                } elseif ($cellName == 'deskripsi') {
                    $deskripsi = $cellData;
                }

                // Anda juga dapat menambahkan logika lain jika perlu

                // Contoh: $sheet->setCellValueByColumnAndRow($columnIndex, $rowIndex, $cellData);
                $columnIndex++;
            }

            // Setelah loop, Anda memiliki data yang diperlukan dari setiap kolom
            // Anda dapat mengisinya ke dalam lembar kerja Excel di sini
            $sheet->setCellValueByColumnAndRow(1, $rowIndex, $no);
            $sheet->setCellValueByColumnAndRow(2, $rowIndex, $nama);
            $sheet->setCellValueByColumnAndRow(3, $rowIndex, $harga);
            $sheet->setCellValueByColumnAndRow(4, $rowIndex, $jenis);
            $sheet->setCellValueByColumnAndRow(5, $rowIndex, $deskripsi);
            $no++;

            $rowIndex++;
        }
        // Auto size kolom berdasarkan konten
        foreach (range('A', $sheet->getHighestDataColumn()) as $col) {
            $sheet->getColumnDimension($col)->setAutoSize(true);
        }

        // Set style header
        $headerStyle = [
            'font' => ['bold' => true],
            'alignment' => ['horizontal' => Alignment::HORIZONTAL_CENTER],
        ];
        $sheet->getStyle('A1:' . $sheet->getHighestDataColumn() . '1')->applyFromArray($headerStyle);

        // Konfigurasi output Excel
        $writer = new Xlsx($spreadsheet);
        $filename = 'DATA_TAMBAHAN.xlsx'; // Nama file Excel yang akan dihasilkan

        // Set header HTTP untuk mengunduh file Excel
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        // Outputkan file Excel ke browser
        $writer->save('php://output');
    }
    public function template_tambahan()
    {

        // Load autoloader Composer
        require 'vendor/autoload.php';

        $spreadsheet = new PhpOffice\PhpSpreadsheet\Spreadsheet();

        // Buat lembar kerja aktif
        $sheet = $spreadsheet->getActiveSheet();
        // Data yang akan diekspor (contoh data)

        // Buat objek Spreadsheet
        $headers = ['NO', 'NAMA ITEM', 'HARGA', 'JENIS', 'DESKRIPSI'];
        $rowIndex = 1;
        foreach ($headers as $header) {
            $sheet->setCellValueByColumnAndRow($rowIndex, 1, $header);
            $rowIndex++;
        }

        // Auto size kolom berdasarkan konten
        foreach (range('A', $sheet->getHighestDataColumn()) as $col) {
            $sheet->getColumnDimension($col)->setAutoSize(true);
        }

        // Set style header
        $headerStyle = [
            'font' => ['bold' => true],
            'alignment' => ['horizontal' => Alignment::HORIZONTAL_CENTER],
        ];
        $sheet->getStyle('A1:' . $sheet->getHighestDataColumn() . '1')->applyFromArray($headerStyle);

        // Konfigurasi output Excel
        $writer = new Xlsx($spreadsheet);
        $filename = 'TEMPLATE_DATA_TAMBAHAN.xlsx'; // Nama file Excel yang akan dihasilkan

        // Set header HTTP untuk mengunduh file Excel
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        // Outputkan file Excel ke browser
        $writer->save('php://output');
    }
    public function template_pelanggan()
    {

        // Load autoloader Composer
        require 'vendor/autoload.php';

        $spreadsheet = new PhpOffice\PhpSpreadsheet\Spreadsheet();

        // Buat lembar kerja aktif
        $sheet = $spreadsheet->getActiveSheet();
        // Data yang akan diekspor (contoh data)

        // Buat objek Spreadsheet
        $headers = ['NO', 'NAMA ', 'NO TELEPON', 'PEMBAYARAN',];
        $rowIndex = 1;
        foreach ($headers as $header) {
            $sheet->setCellValueByColumnAndRow($rowIndex, 1, $header);
            $rowIndex++;
        }

        // Auto size kolom berdasarkan konten
        foreach (range('A', $sheet->getHighestDataColumn()) as $col) {
            $sheet->getColumnDimension($col)->setAutoSize(true);
        }

        // Set style header
        $headerStyle = [
            'font' => ['bold' => true],
            'alignment' => ['horizontal' => Alignment::HORIZONTAL_CENTER],
        ];
        $sheet->getStyle('A1:' . $sheet->getHighestDataColumn() . '1')->applyFromArray($headerStyle);

        // Konfigurasi output Excel
        $writer = new Xlsx($spreadsheet);
        $filename = 'TEMPLATE_DATA_PELANGGAN.xlsx'; // Nama file Excel yang akan dihasilkan

        // Set header HTTP untuk mengunduh file Excel
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        // Outputkan file Excel ke browser
        $writer->save('php://output');
    }
    public function import_tambahan()
    {
        require 'vendor/autoload.php';
        if (isset($_FILES["file"]["name"])) {
            $path = $_FILES["file"]["tmp_name"];
            $object = PhpOffice\PhpSpreadsheet\IOFactory::load($path);
            foreach ($object->getWorksheetIterator() as $worksheet) {
                $highestRow = $worksheet->getHighestRow();
                $highestColumn = $worksheet->getHighestColumn();
                for ($row = 2; $row <= $highestRow; $row++) {
                    $nama = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
                    $harga = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
                    $jenis = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
                    $deskripsi = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
                    $data = [
                        'nama' => $nama,
                        'harga' => $harga,
                        'jenis' => $jenis,
                        'deskripsi' => $deskripsi
                    ];
                    $this->m_model->tambah_data('tambahan', $data);
                }
            }
            redirect(base_url('operator/tambahan'));
        } else {
            echo 'Invalid File';
        }
    }
}
