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
    if(empty($this->session->userdata('code'))) {
        redirect(base_url('auth/forgot_password'));
    }
    $this->load->view('auth/verifikasi_kode');
  }
  public function ganti_password()
  {
    if(empty($this->session->userdata('status')) && empty($this->session->userdata('code'))) {
        redirect(base_url('auth/forgot_password'));
    } else if(empty($this->session->userdata('status'))) {
        redirect(base_url('auth/verifikasi_kode'));
    }
    $this->load->view('auth/ganti_password');
  }
  public function check_expired_bookings()
    {
        // Implementasi logika untuk memeriksa pemesanan yang berakhir dan mengubah statusnya

        $bookings = $this->m_model->get_expired_bookings();

        foreach ($bookings as $booking) {
            $this->m_model->update_status($booking->id, 'selesai');
        }
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
            $this->session->set_userdata($data);
            $this->check_expired_bookings();
            if ($result['role'] == 'supervisor') {
                redirect(base_url() . "supervisor");
            } elseif ($result['role'] == 'operator') {
                redirect(base_url(). 'operator');
            }
        } else {
            $this->session->set_flashdata('error' , 'error ');
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
                redirect(base_url('auth/register_karyawan'));
            } else {
                $data = [
                    'email' => $this->input->post('email'),
                    'username' => $this->input->post('username'),
                    'role' => 'supervisor',
                    'password' => md5($this->input->post('password')),
                ];
                $this->session->set_flashdata('succsess' , 'berhasil...');
                $this->m_model->tambah_data('user', $data);
                redirect(base_url());
            }
        } else {
            $this->session->set_flashdata('error_email' , 'gagal...');
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
                    echo '<script>Pesan telah terkirim</script>';
                    $data = [
                        'code' => $code,
                        'email' => $email
                    ];
                    $this->session->set_userdata($data);
                    redirect(base_url('auth/verifikasi_kode'));
                } else {
                    echo '<script>Pesan tidak dapat terkirim.</script>';
                }
            } catch (Exception $e) {
                echo 'Terjadi kesalahan: ' . $e->getMessage();
            }           

        } else {
            echo "<script>
            alert('Email tidak ditemukan');
            window.location.href = '" . base_url('auth/forgot_password') . "';
          </script>";
        }
    }
    public function aksi_verifikasi(){
        if(empty($this->session->userdata('code'))) {
            redirect(base_url('auth/forgot_password'));
        }
        $code = $this->input->post('code');
        if ($code == $this->session->userdata('code')) {
            $data = [
                'status' => true,
            ];
            $this->session->set_userdata($data);
            echo "<script>alert('Berhasill!!!');
            window.location.href = '" . base_url('auth/ganti_password') . "';
            </script>";
        } else {
            echo "<script>
            alert('Code verifikasi salah!!');
            window.location.href = '" . base_url('auth/verifikasi_kode') . "';
          </script>";
        }
    }
    public function aksi_ganti_password(){
        if(empty($this->session->userdata('status')) && empty($this->session->userdata('code'))) {
            redirect(base_url('auth/forgot_password'));
        } else if(empty($this->session->userdata('status'))) {
            redirect(base_url('auth/verifikasi_kode'));
        }
        $pass = $this->input->post('password');
        $con_pass = $this->input->post('con_password');
        $this->form_validation->set_rules('password', 'Password', 'required|regex_match[/^(?=.*\d)(?=.*[a-zA-Z])[0-9a-zA-Z]{8,}$/]');    
        if ($this->form_validation->run() === FALSE) {
            echo "<script>alert('Password minimal 8 karakter dan combinasi angka dan huruf');
            window.location.href = '" . base_url('auth/ganti_password') . "';
            </script>";
        } else {
            if($pass == $con_pass){
                $data = [
                    'password' => md5($pass),
                ];
                $this->m_model->update('user', $data , array('id'=>tampil_id_byemail($this->session->userdata('email'))));
                echo "<script>alert('Berhasill!!!');
                window.location.href = '" . base_url() . "';
                </script>";
            } else {
                echo "<script>alert('Password dengan konfirmasi password harus sama');
            window.location.href = '" . base_url('auth/ganti_password') . "';
            </script>";
            }
        }
    }
   
}