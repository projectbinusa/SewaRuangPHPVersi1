<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body> 
<div style="margin-left: 40%; margin-top: 10%" class="w-full max-w-sm p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700">
<form class="space-y-6" action="<?php echo base_url('pelanggan/aksi_tambah_pelanggan') ?>" method="post">
<h5 class="text-xl font-medium text-gray-900 dark:text-white"><b>Tambah Data Pelanggan</b></h5>
      <div>
        <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NAMA</label>
        <input type="text" name="nama" id="nama" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
      </div>
      <div>
        <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">PHONE</label>
        <input type="text" name="phone" id="phone" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
      </div>
      <div>
        <label for="payment_method" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">PAYMENT METHOD</label>
        <input type="text" name="payment_method" id="payment_method" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
      </div>
      <div class="flex items-start">
            <div class="flex items-start">
                <div class="flex items-center h-5">
                    <input id="remember" type="checkbox" value="" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800" required>
                </div>
                <label for="remember" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Remember me</label>
            </div>
        </div>
      <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Tambah</button>
    </form>
</div>

<script>
    $(document).ready(function() {
      // Fungsi untuk mengirim form secara asinkron
      $("#myForm").submit(function(event) {
        event.preventDefault(); // Mencegah form dari pengiriman standar

        var form = $(this);
        var url = form.attr("action") || window.location.href;
        var method = form.attr("method");
        var formData = form.serialize();

        // Kirim request AJAX
        $.ajax({
          url: url,
          type: method,
          data: formData,
          dataType: "json", // Menentukan tipe data respons JSON
          success: function(response) {
            if (response.status === "success") {
              Swal.fire({
                title: "Sukses!",
                text: response.message,
                icon: "success",
              }).then(function() {
                // Arahkan ke halaman "ruang" jika berhasil
                window.location.href = "<?php echo base_url('pelanggan/data_master_pelanggan'); ?>";
              });
            } else if (response.status === "error") {
              Swal.fire({
                title: "Gagal!",
                text: response.message,
                icon: "error",
              }).then(function() {
                // Arahkan kembali ke "ruangan/tambah_ruangan" jika gagal
                window.location.href = "<?php echo base_url('pelanggan/tambah_pelanggan'); ?>";
              });
            }
          },
        });
      });
    });
  </script>
</body>
</html>

