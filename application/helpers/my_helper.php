<?php
if (!function_exists('convRupiah')) {
    function convRupiah($value) {
        return 'Rp. ' . number_format((float)$value, 3, ',', '.');
    }
}
?>