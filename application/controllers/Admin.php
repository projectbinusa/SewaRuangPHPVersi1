<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct(){

		parent::__construct();
		$this->load->model('m_model');
		$this->load->helper('my_helper');;

}

public function admin()
{
    $data['pelanggan'] = $this->m_model->get_data('pelanggan')->result();
    $this->load->view('Admin/data_master_pelanggan', $data);
}
public function tambah_pelanggan()
{
    $data['pelanggan'] = $this->m_model->get_data('pelanggan')->result();
    $this->load->view('admin/tambah_pelanggan');
}
public function aksi_tambah_pelanggan()
{
    $this->m_model->tambah_data('pelanggan', $data);
    redirect(base_url('admin/pelanggan'));
}

}

?>