<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ruang extends CI_Controller {
    //function constructor unutk memanggil model library dan helper
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_model');
		$this->load->helper('my_helper');
    }

    //function tampilan login
	public function index()
	{
		$this->load->view('ruang/Data_Ruangan');
	}
	public function tambah_ruang()
	{
		$this->load->view('ruang/tambah_ruang');
	}
   
}