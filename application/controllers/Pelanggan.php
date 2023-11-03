<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan extends CI_Controller {

	function __construct(){

		parent::__construct();
		$this->load->model('m_model');
		$this->load->helper('my_helper');
}

public function pelanggan()
{
    $data['pelanggan'] = $this->m_model->get_data('pelanggan')->result();
    $this->load->view('pelanggan/data_master_pelanggan', $data);
}
public function tambah_pelanggan()
{
    $data['pelanggan'] = $this->m_model->get_data('pelanggan')->result();
    $this->load->view('pelanggan/tambah_pelanggan');
}
public function aksi_tambah_pelanggan()
{
    $this->m_model->tambah_data('pelanggan', $data);
    redirect(base_url('pelanggan/pelanggan'));
}

}

?>