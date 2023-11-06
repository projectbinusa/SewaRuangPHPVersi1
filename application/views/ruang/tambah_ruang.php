<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sewa Ruang</title>

    <!-- cdn fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Lato:wght@100;400;700&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            font-size: 62.5%;
        }

        body {
            font-family: 'Lato', sans-serif;
            font-size: 1.6rem;
            background-color: #E4F1FF;
            color: #222;
            padding: 0 5px;
        }

        .container {
            min-width: 20rem;
            max-width: 65rem;
            margin: 10rem auto;
        }

        .heading,
        .survey-form {
            background-color: #fff;
            padding: 1.3em 3rem 1.8rem 3rem;
            border-radius: 1rem;
            margin-bottom: 3rem;
            box-shadow: 0 0 20px 5px rgba(0, 0, 0, 0.15);
        }

        .heading {
            position: relative;
        }

        .survey-form {
            font-size: 1.8rem;
        }

        .green-bar {
            background-color: #4F709C;
            height: 1rem;
            width: 100%;
            position: absolute;
            top: 0;
            left: 0;
            border-top-left-radius: 1rem;
            border-top-right-radius: 1rem;
        }

        .main-heading {
            font-size: 3.5rem;
            margin-bottom: 1rem;
        }

        .main-description {
            margin-bottom: 2rem;
        }

        .instructions {
            font-size: 1.5rem;
            margin-top: 1rem;
        }

        .required {
            font-size: 1.6rem;
            color: #d61212;
        }

        label {
            display: block;
            font-size: 1.8rem;
            margin: 2rem 0;
        }

        input {
            display: block;
            width: 100%;
            margin: 2rem 0;
            font-size: 1.6rem;
        }

        .no_lantai,
        .no_ruang {
            min-height: 2rem;
            padding: 1rem 0;
            border: none;
            border-bottom: 1px solid #bcb9b9;
        }

        /* 
        input::placeholder {
            padding: 5rem;
        } */

        .submit {
            font-size: 1.7rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: #f4f4f4;
            background-color: #4F709C;
            border: 3px solid #4F709C;
            border-radius: 1rem;
            width: 15rem;
            padding: 1rem 2rem;
            margin: 4rem auto 2rem auto;
            cursor: pointer;
            transition: all .3s;
        }

        .submit:hover {
            background-color: transparent;
            color: #222;
        }

        a:link,
        a:visited {
            color: #008080;
        }

        .form-group {
            position: relative;
        }
    </style>
</head>

<body>
    <main>
        <div class="container">
            <header class="heading">
                <div class="green-bar"></div>
                <h1 id="title" class="main-heading">Tambah Data Master</h1>
            </header>

            <form action="<?php echo base_url('ruang/akis_tambah_ruangan')?>" method="post" id="survey-form" class="survey-form">
                <label for="no_lantai">Nomor Lantai</label>
                <input type="number" name="no_lantai" id="no_lantai" class="no_lantai" >

                <label for="no_ruang">Nomor Ruangan</label>
                <input type="number" name="no_ruang" id="no_ruang" class="no_ruang" >

                <input type="submit" id="submit" class="submit" value="Tambah">
            </form>


        </div>
    </main>
</body>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
</head>
<body> 
<div style="margin-left: 40%; margin-top: 10%" class="w-full max-w-sm p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700">
<form class="space-y-6" action="<?php echo base_url('ruang/akis_tambah_ruangan') ?>" method="post">
<h5 class="text-xl font-medium text-gray-900 dark:text-white"><b>Tambah Data Ruang</b></h5>
      <div>
        <label for="no_ruang" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pilih no Ruang</label>
        <input type="text" name="no_ruang" id="no_ruang" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
      </div>
      <div>
        <label for="no_lantai" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Plih no lantai anda</label>
        <input type="text" name="no_lantai" id="no_lantai" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
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
                window.location.href = "<?php echo base_url('ruang/Data_ruangan'); ?>";
              });
            } else if (response.status === "error") {
              Swal.fire({
                title: "Gagal!",
                text: response.message,
                icon: "error",
              }).then(function() {
                // Arahkan kembali ke "ruangan/tambah_ruangan" jika gagal
                window.location.href = "<?php echo base_url('ruangan/tambah_ruangan'); ?>";
              });
            }
          },
        });
      });
    });
  </script>
</body>
</html>