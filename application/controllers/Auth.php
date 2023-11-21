<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class Auth extends CI_Controller {
    //function constructor unutk memanggil model library dan helper
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_model');
		$this->load->helper('my_helper');
        $this->load->library('email');
        $this->load->library('session');
		$this->load->library('form_validation');
    }

    //function tampilan login
	public function index()
	{
		$this->load->view('auth/login');
	}
	public function register()
	{
		$this->load->view('auth/register');
	}

    public function verifikasi_kode()
  {
    $this->load->view('auth/verifikasi_kode');
  }
  public function ganti_password()
  {
    $this->load->view('auth/ganti_password');
  }
     //function aksi login
     public function aksi_login()
     {
         $email = $this->input->post('email', true);
         $password = $this->input->post('password', true);
         $data = ['email' => $email];
         $query = $this->m_model->getwhere('user', $data);
         $result = $query->row_array();
     
         if (!empty($result) && md5($password) === $result['password']) {
             $data = [
                 'logged_in' => true,
                 'email' => $result['email'],
                 'username' => $result['username'],
                 'role' => $result['role'],
                 'id' => $result['id'],
             ];
     
             if ($result['role'] == 'supervisor') {
                 $this->session->set_userdata($data);
                 $this->session->set_flashdata('success', 'Anda berhasil login');
                 redirect(base_url() . "supervisor");
             } elseif ($result['role'] == 'operator') {
                 $this->session->set_userdata($data);
                 $this->session->set_flashdata('success', 'Anda berhasil login');
                 redirect(base_url() . 'operator');
             }
         } else {
             $this->session->set_flashdata('error', 'Email atau password salah');
             redirect(base_url());
         }
     }
     
     public function aksi_register()
     {
         $email = $this->input->post('email', true);
         $data = ['email' => $email];
         $password = $this->input->post('password');
         $username = $this->input->post('username');
         $query = $this->m_model->getwhere('user', $data);
         $result = $query->row_array();
     
         if (empty($result)) {
             $this->form_validation->set_rules('email', 'Email', 'trim|required|regex_match[/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/]');
             $this->form_validation->set_rules('password', 'Password', 'required|regex_match[/^(?=.*\d)(?=.*[a-zA-Z])[0-9a-zA-Z]{8,}$/]');
     
             if ($this->form_validation->run() === FALSE) {
                 redirect(base_url('auth/register'));
             } else {
                 $data = [
                     'email' => $this->input->post('email'),
                     'username' => $this->input->post('username'),
                     'role' => 'supervisor',
                     'password' => md5($this->input->post('password')),
                 ];
                 $this->m_model->tambah_data('user', $data);
     
                 // Tampilkan SweetAlert setelah registrasi berhasil
                 $this->session->set_flashdata('success', 'Berhasil melakukan registrasi');
                 redirect(base_url());
             }
         } else {
             $this->session->set_flashdata('error_email', 'Email sudah terdaftar');
             redirect(base_url('auth/register'));
         }
     }
     
     //function aksi logout
	public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url());
    }
    public function forgot_password()
	{
		$this->load->view('auth/forgot_password');
	}
    public function generate_code($length = 6)
{
    $characters = '1234567890';
    $code = '';

    for ($i = 0; $i < $length; $i++) {
        $code .= $characters[rand(0, strlen($characters) - 1)];
    }

    return $code;
}
public function aksi_forgot_pass()
{
    $email = $this->input->post('email', true);
    $data = ['email' => $email];
    $query = $this->m_model->getwhere('user', $data);
    $result = $query->row_array();
    if (!empty($result)) {
        $generate = $this->generate_code();
        $code = $generate;
        $mail = new PHPMailer(true);
        try {
            // Konfigurasi SMTP dan pengaturan lainnya
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'saputroandi763@gmail.com';
            $mail->Password = 'zkza scib qoob vwzo';
            $mail->Port = 465;
            $mail->SMTPSecure = 'ssl';

            // Set pengirim dan penerima
            $mail->setFrom('saputroandi763@gmail.com');
            $mail->addAddress($email, 'Sewa Ruang');

            $mail->addReplyTo("$email");
            $mail->isHTML(true);
            $mail->Subject = 'Code Verifikasi Password';
            $mail->Body = 'Berikut Code Verifikasi Untuk Reset Password '.$code.'';

            // Kirim email
            if ($mail->send()) {
                $this->session->set_userdata('code', $code);
                
                // Menggunakan SweetAlert untuk memberi tahu pesan telah terkirim
                $this->session->set_flashdata('success', 'Pesan telah terkirim');
                redirect(base_url('auth/verifikasi_kode'));
            } else {
                // SweetAlert untuk memberi tahu pesan tidak dapat terkirim
                $this->session->set_flashdata('error', 'Pesan tidak dapat terkirim.');
                redirect(base_url('auth/forgot_password'));
            }
        } catch (Exception $e) {
            // SweetAlert untuk menampilkan kesalahan
            $this->session->set_flashdata('error', 'Terjadi kesalahan: ' . $e->getMessage());
            redirect(base_url('auth/forgot_password'));
        }           
    } else {
        // SweetAlert jika email tidak ditemukan
        $this->session->set_flashdata('error', 'Email tidak ditemukan');
        redirect(base_url('auth/forgot_password'));
    }
}

public function aksi_verifikasi(){
    $code = $this->input->post('code');
    if ($code == $this->session->userdata('code')) {
        $this->session->set_flashdata('success', 'Kode verifikasi benar');
        redirect(base_url('auth/ganti_password'));
    } else {
        $this->session->set_flashdata('error', 'Kode verifikasi salah');
        redirect(base_url('auth/verifikasi_kode'));
    }
}

    public function aksi_ganti_password(){
        $pass = $this->input->post('password');
        $con_pass = $this->input->post('con_password');
        $this->form_validation->set_rules('password', 'Password', 'required|regex_match[/^(?=.*\d)(?=.*[a-zA-Z])[0-9a-zA-Z]{8,}$/]');    
    
        if ($this->form_validation->run() === FALSE) {
            $this->session->set_flashdata('error', 'Password minimal 8 karakter dan kombinasi angka dan huruf');
            redirect(base_url('auth/ganti_password'));
        } else {
            if($pass == $con_pass){
                $data = [
                    'password' => md5($pass),
                ];
                $this->m_model->update('user', $data , array('id'=>tampil_id_byemail($this->session->userdata('email'))));
                $this->session->set_flashdata('success', 'Password berhasil diubah');
                redirect(base_url());
            } else {
                $this->session->set_flashdata('error', 'Password dengan konfirmasi password harus sama');
                redirect(base_url('auth/ganti_password'));
            }
        }
    }    
}