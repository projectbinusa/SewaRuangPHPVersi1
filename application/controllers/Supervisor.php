<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supervisor extends CI_Controller {
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
		$this->load->view('supervisor/dashboard');
	}
   
}