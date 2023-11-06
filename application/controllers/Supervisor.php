<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supervisor extends CI_Controller {
    //function constructor unutk memanggil model library dan helper
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_model');
		$this->load->helper('my_helper');
		$this->load->library('form_validation');
    }

    //function tampilan login
	public function index()
	{
		$this->load->view('supervisor/dashboard');
	}
	public function coba()
	{
		$this->load->view('supervisor/test');
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

        $this->form_validation->set_rules('email', 'Email', 'trim|required|regex_match[/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/]');
        $this->form_validation->set_rules('password', 'Password', 'required|regex_match[/^(?=.*\d)(?=.*[a-zA-Z])[0-9a-zA-Z]{8,}$/]');

        if ($this->form_validation->run() === FALSE) {
           redirect(base_url().'supervisor/tambah_user_operator');
        } else {

            $data = [
                'email' => $this->input->post('email'),
                'username' => $this->input->post('username'),
                'role' => 'operator',
                'password' => md5($this->input->post('password')),
            ];
            $this->m_model->tambah_data('user', $data);
            redirect(base_url().'supervisor');

        }
	}

    public function approve()
	{
		$this->load->view('supervisor/approve');
	}
    public function data_operator()
	{
		$this->load->view('supervisor/data_operator');
	}
   
    public function edit_user_operator()
	{
		$this->load->view('supervisor/edit_user_operator');
	}
    public function laporan_penyewa()
	{
		$this->load->view('supervisor/laporan_penyewa');
	}
   
}