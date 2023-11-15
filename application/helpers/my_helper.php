<?php
if (!function_exists('convRupiah')) {
    function convRupiah($value)
    {
        return 'Rp. ' . number_format((float)$value, 2, ',', '.');
    }
}

if (!function_exists('format_ruangan')) {
    function format_ruangan($nomor_ruangan)
    {
        return 'ruang ' . $nomor_ruangan;
    }
}

if (!function_exists('format_lantai')) {
    function format_lantai($nomor_lantai)
    {
        return 'lantai ' . $nomor_lantai;
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
function tampil_nama_ruangan_byid($id)
{
    $ci = &get_instance();
    $ci->load->database();
    $result = $ci->db->where('id', $id)->get('ruangan');
    foreach ($result->result() as $c) {
        $stmt = 'L.' . $c->no_lantai . ' ' . 'R.' . $c->no_ruang;
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
function tampil_harga_ruangan_byid($id)
{
    $ci = &get_instance();
    $ci->load->database();
    $result = $ci->db->where('id', $id)->get('ruangan');
    foreach ($result->result() as $c) {
        $stmt = $c->harga;
        return $stmt;
    }
}
function tampil_harga_tambahan_byid($id)
{
    $ci = &get_instance();
    $ci->load->database();
    $result = $ci->db->where('id', $id)->get('tambahan');
    foreach ($result->result() as $c) {
        $stmt = $c->harga;
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
