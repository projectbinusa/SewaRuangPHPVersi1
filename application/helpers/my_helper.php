<?php
if (!function_exists('convRupiah')) {
    function convRupiah($value)
    {
        return 'Rp. ' . number_format((float)$value, 2, ',', '.');
    }
}
if (!function_exists('Rupiah')) {
    function Rupiah($value)
    {
        return ' ' . number_format((float)$value, 2, ',', '.');
    }
}

if (!function_exists('format_ruangan')) {
    function format_ruangan($nomor_ruangan)
    {
        return 'Ruang ' . $nomor_ruangan;
    }
}

if (!function_exists('format_lantai')) {
    function format_lantai($nomor_lantai)
    {
        return 'lantai ' . $nomor_lantai;
    }
}

function tampil_nama_user_byid($id)
{
    $ci = &get_instance();
    $ci->load->database();
    $result = $ci->db->where('id', $id)->get('user');
    foreach ($result->result() as $c) {
        $stmt = $c->username;
        return $stmt;
    }
}

function tampil_nama_penyewa_byid($id)
{
    $ci = &get_instance();
    $ci->load->database();
    $result = $ci->db->where('id', $id)->get('pelanggan');
    foreach ($result->result() as $c) {
        $stmt = $c->nama;
        return $stmt;
    }
}
function tampil_id_penyewa_byid($id)
{
    $ci = &get_instance();
    $ci->load->database();
    $result = $ci->db->where('id', $id)->get('peminjaman');
    foreach ($result->result() as $c) {
        $stmt = $c->id_pelanggan;
        return $stmt;
    }
}
function tampil_email_penyewa_byid($id)
{
    $ci = &get_instance();
    $ci->load->database();
    $result = $ci->db->where('id', $id)->get('pelanggan');
    foreach ($result->result() as $c) {
        $stmt = $c->email;
        return $stmt;
    }
}
function tampil_nomer_penyewa_byid($id)
{
    $ci = &get_instance();
    $ci->load->database();
    $result = $ci->db->where('id', $id)->get('pelanggan');
    foreach ($result->result() as $c) {
        $stmt = $c->phone;
        return $stmt;
    }
}
function tampil_keperluan_peminjaman_byid($id)
{
    $ci = &get_instance();
    $ci->load->database();
    $result = $ci->db->where('id', $id)->get('peminjaman');
    foreach ($result->result() as $c) {
        $stmt = $c->keperluan;
        return $stmt;
    }
}
function tampil_pyment_penyewa_byid($id)
{
    $ci = &get_instance();
    $ci->load->database();
    $result = $ci->db->where('id', $id)->get('pelanggan');
    foreach ($result->result() as $c) {
        $stmt = $c->payment_method;
        return $stmt;
    }
}
function tampil_code_penyewa_byid($id)
{
    $ci = &get_instance();
    $ci->load->database();
    $result = $ci->db->where('id', $id)->get('peminjaman');
    foreach ($result->result() as $c) {
        $stmt = $c->kode_booking;
        return $stmt;
    }
}
function tampil_tanggal_booking_byid($id)
{
    $ci = &get_instance();
    $ci->load->database();
    $result = $ci->db->where('id', $id)->get('peminjaman');
    foreach ($result->result() as $c) {
        $stmt = $c->tanggal_booking;
        return $stmt;
    }
}
function tampil_tanggal_berakhir_byid($id)
{
    $ci = &get_instance();
    $ci->load->database();
    $result = $ci->db->where('id', $id)->get('peminjaman');
    foreach ($result->result() as $c) {
        $stmt = $c->tanggal_berakhir;
        return $stmt;
    }
}
function tampil_ruang_byid($id)
{
    $ci = &get_instance();
    $ci->load->database();
    $result = $ci->db->where('id', $id)->get('ruangan');
    foreach ($result->result() as $c) {
        $stmt = $c->no_lantai . ' '  . $c->no_ruang;
        return $stmt;
    }
}
function tampil_jumlah_tambahan_byid($id)
{
    $ci = &get_instance();
    $ci->load->database();
    $result = $ci->db->where('id', $id)->get('peminjaman_tambahan');
    foreach ($result->result() as $c) {
        $stmt = $c->id_tambahan;
        return $stmt;
    }
}
function tampil_jumlah_orang_byid($id)
{
    $ci = &get_instance();
    $ci->load->database();
    $result = $ci->db->where('id', $id)->get('peminjaman');
    foreach ($result->result() as $c) {
        $stmt = $c->jumlah_orang;
        return $stmt;
    }
}
function tampil_ruangan_byid($id)
{
    $ci = &get_instance();
    $ci->load->database();
    $result = $ci->db->where('id', $id)->get('ruangan');
    foreach ($result->result() as $c) {
        $stmt = 'R. ' . $c->no_ruang;
        return $stmt;
    }
}
function tampil_no_ruangan_byid($id)
{
    $ci = &get_instance();
    $ci->load->database();
    $result = $ci->db->where('id', $id)->get('ruangan');
    foreach ($result->result() as $c) {
        $stmt = $c->no_ruang;
        return $stmt;
    }
}
function tampil_nama_tambahan_byid($id)
{
    $ci = &get_instance();
    $ci->load->database();
    $result = $ci->db->where('id', $id)->get('tambahan');
    foreach ($result->result() as $c) {
        $stmt = $c->nama;
        return $stmt;
    }
}
function tampil_info_tambahan_byid($id)
{
    $ci = &get_instance();
    $ci->load->database();
    $result = $ci->db->where('id', $id)->get('tambahan');
    foreach ($result->result() as $c) {
        $stmt = $c->jenis;
        return $stmt;
    }
}
function tampil_nama_satuan_tambahan_byid($id)
{
    $ci = &get_instance();
    $ci->load->database();
    $result = $ci->db->where('id', $id)->get('tambahan');
    foreach ($result->result() as $c) {
        $stmt = $c->satuan;
        return $stmt;
    }
}
function tampil_pelanggan_bynama($nama)
{
    $ci = &get_instance();
    $ci->load->database();
    $result = $ci->db->where('nama', $nama)->get('pelanggan');
    foreach ($result->result() as $c) {
        $stmt = $c->id;
        return $stmt;
    }
}
function tampil_username_byid($id)
{
    $ci = &get_instance();
    $ci->load->database();
    $result = $ci->db->where('id', $id)->get('user');
    
    if ($result->num_rows() > 0) {
        $row = $result->row();
        return $row->username;
    } else {
        return "User not found";
    }
}
function tampil_id_byemail($email)
{
    $ci = &get_instance();
    $ci->load->database();
    $result = $ci->db->where('email', $email)->get('user');
    foreach ($result->result() as $c) {
        $stmt = $c->id;
        return $stmt;
    }
}
function tampil_id_ruang_byid($email)
{
    $ci = &get_instance();
    $ci->load->database();
    $result = $ci->db->where('id', $email)->get('peminjaman');
    foreach ($result->result() as $c) {
        $stmt = $c->id_ruangan;
        return $stmt;
    }
}
