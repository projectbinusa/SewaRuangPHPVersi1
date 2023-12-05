<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Alignment;

require 'vendor/autoload.php';
class Supervisor extends CI_Controller
{
    //function constructor unutk memanggil model library dan helper
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_model');
        $this->load->helper('my_helper');
        $this->load->library('form_validation');
        if ($this->session->userdata('logged_in') != true || $this->session->userdata('role') != 'supervisor') {
            redirect(base_url());
        }
    }

    //function tampilan login
    public function index()
    {

        $data['approves'] = $this->m_model->get_status_proses()->result();
        $data['operators'] = $this->m_model->get_data_operator()->result();
        $data['jumlah_operator'] = $this->m_model->get_data_operator()->num_rows();
        $data['jumlah_approve'] = $this->m_model->get_status_proses()->num_rows();
        $data['ruang'] = $this->m_model->get_data('ruangan')->result();
        $this->load->view('supervisor/dashboard', $data);
    }

    public function history()
    {

        $this->load->view('supervisor/history');
    }

    public function tambah_user_operator()
    {
        $this->load->view('supervisor/tambah_user_operator');
    }
    public function aksi_tambah_user_operator()
    {
        $email = $this->input->post('email', true);
        $password = $this->input->post('password');
        $username = $this->input->post('username');

        $this->form_validation->set_rules('email', 'Email', 'trim|required|regex_match[/^\S+@\S+\.\S+$/]');
        $this->form_validation->set_rules('password', 'Password', 'required|regex_match[/^(?=.*\d)(?=.*[a-zA-Z])[0-9a-zA-Z]{8,}$/]');

        if ($this->form_validation->run() === FALSE) {
            $response = array('success' => false, 'message' => 'Silakan periksa kembali data yang Anda inputkan.');
            header('Content-Type: application/json');
            echo json_encode($response);
        } else {
            $data = [
                'email' => $this->input->post('email'),
                'username' => $this->input->post('username'),
                'role' => 'operator',
                'password' => md5($this->input->post('password')),
            ];

            // Assuming m_model->tambah_data() returns a boolean indicating success
            if ($this->m_model->tambah_data('user', $data)) {
                $response = array('success' => true, 'message' => 'User berhasil ditambahkan.');
                header('Content-Type: application/json');
                echo json_encode($response);
            } else {
                $response = array('success' => false, 'message' => 'Gagal menambahkan pengguna. Silakan coba lagi.');
                header('Content-Type: application/json');
                echo json_encode($response);
            }
        }
    }

    public function approve()
    {
        $data['approve'] = $this->m_model->get_status_proses()->result();
        $this->load->view('supervisor/approve', $data);
    }
    public function history_approve()
    {
        $data['history'] = $this->m_model->get_data('history_approve')->result();
        $this->load->view('supervisor/history', $data);
    }
    public function aksi_approve_di_terima_semua()
    {
        $data = [
            'status' => 'booking',
        ];
        $approve = $this->m_model->get_status_proses()->result();
        foreach ($approve as $row) {
            $data_approve = [
                'status' => 'di setujui',
                'id_peminjaman' => $row->id
            ];
            $this->m_model->tambah_data('history_approve', $data);
            $this->m_model->update('peminjaman', $data, array('id' => $row->id));
        }
        redirect(base_url('supervisor/approve'));
    }
    public function aksi_approve_di_tolak_semua()
    {
        $data = [
            'status' => 'di tolak',
        ];
        $approve = $this->m_model->get_status_proses()->result();
        foreach ($approve as $row) {
            $data_approve = [
                'status' => 'di tolak',
                'id_peminjaman' => $row->id
            ];
            $this->m_model->tambah_data('history_approve', $data);
            $this->m_model->update('peminjaman', $data, array('id' => $row->id));
        }
        redirect(base_url('supervisor/approve'));
    }
    public function aksi_approve_di_terima($id)
    {
        $data = [
            'status' => 'booking',
        ];
        $data_approve = [
            'status' => 'di setujui',
            'id_peminjaman' => $id
        ];
        $this->m_model->tambah_data('history_approve', $data);
        $this->m_model->update('peminjaman', $data, array('id' => $id));
        redirect(base_url('supervisor/approve'));
    }
    public function aksi_approve_di_tolak($id)
    {
        $data = [
            'status' => 'di tolak',
        ];
        $data_approve = [
            'status' => 'di tolak',
            'id_peminjaman' => $id
        ];
        $this->m_model->tambah_data('history_approve', $data);
        $this->m_model->update('peminjaman', $data, array('id' => $id));
        redirect(base_url('supervisor/approve'));
    }
    public function data_operator()
    {
        $data['operator'] = $this->m_model->get_data_operator()->result();
        $this->load->view('supervisor/data_operator', $data);
    }


    public function edit_user_operator($id)
    {
        $data['operator'] = $this->m_model->get_by_id('user', 'id', $id)->result();
        $this->load->view('supervisor/edit_user_operator', $data);
    }
    public function aksi_update_user_operator()
    {
        $password_baru = $this->input->post('password');
        $email = $this->input->post('email', true);
        $username = $this->input->post('username');
        $data = [
            'email' => $email,
            'username' => $username,
        ];

        $this->form_validation->set_rules('email', 'Email', 'trim|required|regex_match[/^\S+@\S+\.\S+$/]');

        // Check for a new password and form validation
        if (!empty($password_baru)) {
            $this->form_validation->set_rules('password', 'Password', 'required|regex_match[/^(?=.*\d)(?=.*[a-zA-Z])[0-9a-zA-Z]{8,}$/]');

            if ($this->form_validation->run() === TRUE) {
                // Change password only if the new password is not empty and validation succeeds
                $data['password'] = md5($password_baru);
            } else {
                // Form validation failed
                // Display an error message using SweetAlert2
                $response = array('success' => false, 'message' => 'Validasi form gagal. Silakan periksa input Anda.');
                header('Content-Type: application/json');
                echo json_encode($response);
                return;
            }
        }

        // Update data in the user table
        $result = $this->m_model->update('user', $data, array('id' => $this->input->post('id')));

        if ($result) {
            // Display a success message using SweetAlert2
            $response = array('success' => true, 'message' => 'Data pengguna berhasil diperbarui.');
            header('Content-Type: application/json');
            echo json_encode($response);
        } else {
            // Display an error message using SweetAlert2
            $response = array('success' => false, 'message' => 'Gagal memperbarui data pengguna. Silakan coba lagi.');
            header('Content-Type: application/json');
            echo json_encode($response);
        }
    }

    public function edit_laporan_penyewa()
    {
        $this->load->view('supervisor/edit_laporan_penyewa');
    }
    public function laporan_penyewa()
    {
        $this->load->view('supervisor/laporan_penyewa');
    }
    public function hapus_data_operator($id)
    {
        $this->m_model->delete('user', 'id', $id);
        redirect(base_url('supervisor/data_operator'));
    }

    public function export_data_operator()
    {

        // Load autoloader Composer
        require 'vendor/autoload.php';

        $spreadsheet = new PhpOffice\PhpSpreadsheet\Spreadsheet();

        // Buat lembar kerja aktif
        $sheet = $spreadsheet->getActiveSheet();
        // Data yang akan diekspor (contoh data)
        $data = $this->m_model->get_data_operator()->result();

        // Buat objek Spreadsheet
        $headers = ['NO', 'USERNAME', 'EMAIL'];
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
            $username = '';
            $email = '';
            foreach ($rowData as $cellName => $cellData) {
                if ($cellName == 'username') {
                    $username = $cellData;
                } elseif ($cellName == 'email') {
                    $email = $cellData;
                }

                // Anda juga dapat menambahkan logika lain jika perlu

                // Contoh: $sheet->setCellValueByColumnAndRow($columnIndex, $rowIndex, $cellData);
                $columnIndex++;
            }

            // Setelah loop, Anda memiliki data yang diperlukan dari setiap kolom
            // Anda dapat mengisinya ke dalam lembar kerja Excel di sini
            $sheet->setCellValueByColumnAndRow(1, $rowIndex, $no);
            $sheet->setCellValueByColumnAndRow(2, $rowIndex, $username);
            $sheet->setCellValueByColumnAndRow(3, $rowIndex, $email);
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
        $filename = 'DATA_OPERATOR.xlsx'; // Nama file Excel yang akan dihasilkan

        // Set header HTTP untuk mengunduh file Excel
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        // Outputkan file Excel ke browser
        $writer->save('php://output');
    }
    public function template_data_operator()
    {

        // Load autoloader Composer
        require 'vendor/autoload.php';

        $spreadsheet = new PhpOffice\PhpSpreadsheet\Spreadsheet();

        // Buat lembar kerja aktif
        $sheet = $spreadsheet->getActiveSheet();
        // Data yang akan diekspor (contoh data)

        // Buat objek Spreadsheet
        $headers = ['NO', 'USERNAME', 'EMAIL', 'PASSWORD'];
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
        $filename = 'TEMPLATE_DATA_OPERATOR.xlsx'; // Nama file Excel yang akan dihasilkan

        // Set header HTTP untuk mengunduh file Excel
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        // Outputkan file Excel ke browser
        $writer->save('php://output');
    }
    public function import_data_operator()
    {
        require 'vendor/autoload.php';
        if (isset($_FILES["file"]["name"])) {
            $path = $_FILES["file"]["tmp_name"];
            $object = PhpOffice\PhpSpreadsheet\IOFactory::load($path);
            foreach ($object->getWorksheetIterator() as $worksheet) {
                $highestRow = $worksheet->getHighestRow();
                $highestColumn = $worksheet->getHighestColumn();
                for ($row = 2; $row <= $highestRow; $row++) {
                    $username = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
                    $email = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
                    $password = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
                    $this->form_validation->set_rules('email', 'Email', 'trim|required|regex_match[/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/]');
                    $this->form_validation->set_rules('password', 'Password', 'required|regex_match[/^(?=.*\d)(?=.*[a-zA-Z])[0-9a-zA-Z]{8,}$/]');
                    if ($this->form_validation->run() === FALSE) {
                        echo "<alert>Password atau email tidak valid</alert>";
                    }
                    $data = [
                        'username' => $username,
                        'email' => $email,
                        'password' => md5($password),
                        'role' => 'operator'
                    ];
                    $this->m_model->tambah_data('user', $data);
                }
            }
            redirect(base_url('supervisor/data_operator'));
        } else {
            echo 'Invalid File';
        }
    }
}
