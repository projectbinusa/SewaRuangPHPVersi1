<?php
defined('BASEPATH') or exit('No direct script access allowed');

class operator extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_model');
        $this->load->helper('my_helper');
        $this->load->library('form_validation');
    }

    public function detail($id)
    {
        $data['ruang'] = $this->m_model->get_data_by_id('ruangan', $id)->result();
        $this->load->view('operator/ruang/detail', $data);
    }

    public function index()
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
        if (empty($no_ruang) || !ctype_alnum($no_ruang)) {
            $errors[] = 'Nomor Ruang hanya boleh berisi angka atau huruf.';
        }

        // Validasi harga
        if (empty($harga) || !is_numeric($harga)) {
            $errors[] = 'Harga harus diisi dengan angka dan tidak boleh kosong.';
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
                        'redirect' => base_url('operator'),
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
        $data['bukti_booking'] = $this->m_model->get_data('ruangan')->result();
        $this->load->view('operator/pdf', $data);
    }
    public function export_pdf()
    {
        $ruangan = $this->m_model->get_ruang_by_id();
        $harga_ruangan = $ruangan->harga;

        $snack = $this->m_model->get_snack_by_id();
        $harga_snack = $snack->harga;
        $total_price = $harga_ruangan + $harga_snack;
        
        $data['ruangan'] = $this->m_model->get_data('ruangan')->result();

        if ($this->uri->segment(3) == "pdf") {
            $this->load->library('pdf');
            $this->pdf->load_view('operator/export_pdf', $data);
            $this->pdf->render();


            $this->pdf->stream("bukti_booking.pdf", array("Attachment" => false));
        } else {
            $this->load->view('operator/download_pdf', $data);
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

        // Set custom error messages for form validation
        $this->form_validation->set_message('required', 'Kolom {field} wajib diisi.');
        $this->form_validation->set_message('numeric', 'Kolom {field} harus berisi angka.');
        $this->form_validation->set_message('alpha_numeric', 'Kolom {field} hanya boleh berisi huruf dan angka.');
        $this->form_validation->set_message('check_deskripsi', 'Kolom {field} tidak boleh mengandung tanda "-"');
        $this->form_validation->set_message('numeric', 'Kolom {field} harus berisi angka untuk harga.');

        // Set validation rules
        $this->form_validation->set_rules('no_lantai', 'Nomor Lantai', 'required|numeric');
        $this->form_validation->set_rules('no_ruang', 'Nomor Ruang', 'required|alpha_numeric');
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
                            'redirect' => base_url('operator'), // Redirect ke halaman daftar ruangan jika berhasil
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
                        'redirect' => base_url('operator') // Tambahkan URL tujuan
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
        $data['pelanggan'] = $this->m_model->get_data('pelanggan')->result();
        $this->load->view('operator/pelanggan/tambah_pelanggan');
    }
    public function aksi_tambah_pelanggan()
    {
        $nama = $this->input->post('nama');
        $phone = $this->input->post('phone');
        $payment_method = $this->input->post('payment_method');

        $data = array(
            'nama' => $nama,
            'phone' => $phone,
            'payment_method' => $payment_method
        );

        $this->m_model->tambah_data('pelanggan', $data);
        redirect(base_url('operator/data_master_pelanggan'));
    }

    // update data pelanggan
    public function update_data($id)
    {
        $data['pelanggan'] = $this->m_model->get_by_id('pelanggan', 'id', $id)->result();
        $this->load->view('operator/pelanggan/update_data', $data);
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

    public function report_sewa()
    {
        $this->load->view('operator/pelanggan/report_sewa');
    }
    public function dashboard()
    {
        $this->load->view('operator/pelanggan/dashboard');
    }

    public function table_peminjaman_tempat()
    {
        $data['peminjaman'] = $this->m_model->get_status_peminjaman()->result();
        $this->load->view('operator/table_peminjaman_tempat', $data);
    }

    public function tambah_peminjaman_tempat()
    {
        $data['tambahan'] = $this->m_model->get_data('tambahan')->result();
        $data['ruangan'] = $this->m_model->get_data('ruangan')->result();
        $this->load->view('operator/tambah_peminjaman_tempat', $data);
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
        $id_ruangan = $this->input->post('ruang');
        $id_pelanggan = tampil_pelanggan_bynama($this->input->post('nama'));
        $jumlah = $this->input->post('kapasitas');
        $start_time = $this->input->post('booking');
        $generate = $this->generate_booking_code();
        $end_time = $this->input->post('akhir_booking');
        $harga_ruangan = tampil_harga_ruangan_byid($id_ruangan);
        if (!empty($this->input->post('snack'))) {
            $id_snack = $this->input->post('snack');
            $harga = tampil_harga_snack_byid($id_snack);
        }
        if ($this->m_model->is_time_conflict($id_ruangan, $start_time, $end_time)) {
            echo "<script>alert('Waktu pemesanan bertabrakan. Silakan pilih waktu yang lain.');  window.location.href = '" . base_url('operator/tambah_peminjaman_tempat') . "';</script>";
            return;
        }
        $harga_snack = $harga * $jumlah;
        $harga_keseluruhan = $harga_snack + $harga_ruangan;
        $data = [
            'id_pelanggan' => $id_pelanggan,
            'id_ruangan' => $id_ruangan,
            'id_snack' => $id_snack,
            'tanggal_booking' => $start_time,
            'tanggal_berakhir' => $end_time,
            'jumlah_orang' => $jumlah,
            'kode_booking' => $generate,
            'total_harga' => $harga_keseluruhan,
            'status' => 'proses',
        ];
        $this->m_model->tambah_data('peminjaman', $data);
        $this->check_expired_bookings();
        redirect(base_url('operator/peminjaman_tempat'));
    }

    public function hapus_peminjaman($id)
    {
        $this->m_model->delete('peminjaman', 'id', $id);
        redirect(base_url('operator/peminjaman_tempat'));
    }
    public function edit_peminjaman_tempat($id)
    {
        $data['peminjaman'] = $this->m_model->get_by_id('peminjaman', 'id', $id)->result();
        $this->load->view('operator/edit_peminjaman_tempat', $data);
    }
    public function aksi_edit_peminjaman()
    {
        $id_ruangan = $this->input->post('ruang');
        $id_pelanggan = tampil_pelanggan_bynama($this->input->post('nama'));
        $jumlah = $this->input->post('kapasitas');
        $start_time = $this->input->post('booking');
        $generate = $this->generate_booking_code();
        $end_time = $this->input->post('akhir_booking');
        $harga_ruangan = tampil_harga_ruangan_byid($id_ruangan);
        if (!empty($this->input->post('snack'))) {
            $id_snack = $this->input->post('snack');
            $harga = tampil_harga_snack_byid($id_snack);
        }
        if ($this->m_model->is_time_conflict($id_ruangan, $start_time, $end_time)) {
            echo "<script>alert('Waktu pemesanan bertabrakan. Silakan pilih waktu yang lain.');  window.location.href = '" . base_url('operator/tambah_peminjaman_tempat') . "';</script>";
            return;
        }
        $harga_snack = $harga * $jumlah;
        $harga_keseluruhan = $harga_snack + $harga_ruangan;
        $data = [
            'id_pelanggan' => $id_pelanggan,
            'id_ruangan' => $id_ruangan,
            'id_snack' => $id_snack,
            'tanggal_booking' => $start_time,
            'tanggal_berakhir' => $end_time,
            'jumlah_orang' => $jumlah,
            'kode_booking' => $generate,
            'total_harga' => $harga_keseluruhan,
            'status' => 'proses',
        ];
        $this->m_model->update('peminjaman', $data, array('id' => $this->input->post('id')));
        $this->check_expired_bookings();
        redirect(base_url('operator/peminjaman_tempat'));
    }

    public function tabel_report_sewa()
    {
        $this->load->view('operator/pelanggan/tabel_report_sewa');
    }

    public function update_report_sewa()
    {
        $data['peminjaman'] = $this->m_model-get_data('peminjaman')->result();
        $this->load->view('operator/pelanggan/update_report_sewa', $data);
    }

    public function aksi_update_report_sewa($id)
    {
        $id_ruangan = $this->input->post('ruang');
        $id_pelanggan = tampil_pelanggan_bynama($this->input->post('nama'));
        $jumlah = $this->input->post('kapasitas');
        $start_time = $this->input->post('booking');
        $generate = $this->generate_booking_code();
        $end_time = $this->input->post('akhir_booking');
        $harga_ruangan= tampil_harga_ruangan_byid($id_ruangan);
        if(!empty($this->input->post('snack'))){
        $id_snack = $this->input->post('snack');
        $harga = tampil_harga_snack_byid($id_snack);
        }
        if ($this->m_model->is_time_conflict($id_ruangan, $start_time, $end_time)) {
            echo "<script>alert('Waktu pemesanan bertabrakan. Silakan pilih waktu yang lain.');  window.location.href = '" . base_url('operator/tambah_peminjaman_tempat') . "';</script>";
            return;
        }
        $harga_snack = $harga * $jumlah;
        $harga_keseluruhan = $harga_snack + $harga_ruangan;
        $data = [
            'id_pelanggan' =>$id_pelanggan,
            'id_ruangan' =>$id_ruangan,
            'id_snack' =>$id_snack,
            'tanggal_booking' => $start_time,
            'tanggal_berakhir' => $end_time,
            'jumlah_orang' => $jumlah,
            'kode_booking' => $generate,
            'total_harga' => $harga_keseluruhan,
            'status' => 'proses',
        ];
        $this->m_model->update('peminjaman', $data , array('id'=>$this->input->post('id')));
        $this->check_expired_bookings();
        redirect(base_url('operator/tabel_report_sewa'));
    }

    public function hapus_report_sewa()
    {
        $this->m_model->delete('peminjaman', 'id', $id);
        redirect(base_url('operator/tabel_report_sewa'));
    }
}
