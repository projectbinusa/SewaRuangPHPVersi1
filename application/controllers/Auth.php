<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
    //function constructor unutk memanggil model library dan helper
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_model');
		$this->load->helper('my_helper');
		$this->load->helper('form');
        $this->load->library('session');
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
                $this->m_model->add('user', $data);
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
    public function sendMail()
{
    $config = Array(
  'protocol' => 'smtp',
  'smtp_host' => 'ssl://smtp.googlemail.com',
  'smtp_port' => 465,
  'smtp_user' => 'nizarrestuaji18@gmail.com', // change it to yours
  'smtp_pass' => 'nizar040419', // change it to yours
  'mailtype' => 'html',
  'charset' => 'iso-8859-1',
  'wordwrap' => TRUE
);

        $message = 'Anjay Berhasil';
        $this->load->library('email', $config);
      $this->email->set_newline("\r\n");
      $this->email->from('nizarrestuaji18@gmail.com'); // change it to yours
      $this->email->to('nizarrestuaji18@gmail.com');// change it to yours
      $this->email->subject('Percobaan');
      $this->email->message($message);
      if($this->email->send())
     {
      echo 'Email sent.';
     }
     else
    {
     show_error($this->email->print_debugger());
    }

}
}