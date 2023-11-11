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
        return 'Ruang ' . $nomor_ruangan;
    }
}

if (!function_exists('format_lantai')) {
    function format_lantai($nomor_lantai)
    {
        return 'Lantai ' . $nomor_lantai;
    }
}
?>