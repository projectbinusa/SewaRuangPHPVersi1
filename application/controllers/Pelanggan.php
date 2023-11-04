<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan extends CI_Controller {

	function __construct(){

		parent::__construct();
		$this->load->model('m_model');
		$this->load->helper('my_helper');
}

public function data_master_pelanggan()
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
     $nama = $this->input->post('nama');
     $phone = $this->input->post('phone');
     $payment_method = $this->input->post('payment_method');

     $data =  array(
        'nama' => $nama,
        'phone' => $phone,
        'payment_method' => $payment_method
     );

     $inserted = $this->m_model->tambah_data('pelanggan', $data);
     
     if ($inserted) {
        echo '<script type="text/javascript">
        Swal.fire("Sukses!", "Data Berhasil Di Tambah.", "success").then(function()  {
            window.location = "' . base_url('Data_Ruangan') . '";
        });
        </script>';
     } else {
        echo '<script type="text/javascript">
        Swal.fire("Gagal!", "Gagal Menambah Data.", "error").then(function() {
            window.location = "' . base_url('tambah_pelanggan') . '";
        });
    </script>';
     }
    // $this->m_model->tambah_data('pelanggan', $data);
    // redirect(base_url('pelanggan/pelanggan'));
}

public function data_master_pelanggan()
{
    $data['pelanggan'] = $this->m_model->get_data('pelanggan')->result();
    $this->load->view('pelanggan/data_master_pelanggan');
}

}

?>