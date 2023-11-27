<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sewa Ruang</title>

    <!-- cdn fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!-- <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script> -->

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Lato:wght@100;400;700&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }


        body {
            font-family: "DM Sans", sans-serif;
            background-color: #E4F1FF;
            color: #222;
            padding: 0 0px;
        }

        .container {
            min-width: 20rem;
            max-width: 65rem;
            margin: 1rem auto;
            padding: 30px 7.5rem 5px 7.5rem;
        }

        .heading,
        .survey-form {
            background-color: #fff;
            padding: 1.3em 3rem 1.8rem 3rem;
            border-radius: 1rem;
            margin-bottom: 2.5rem;
            box-shadow: 0 0 20px 5px rgba(0, 0, 0, 0.15);
        }

        .heading {
            position: relative;
        }

        .survey-form {
            font-size: 15px;
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
            font-size: 2rem;
            margin-bottom: 1rem;
            height: 1.5rem;
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
            font-size: 1.1rem;
            margin: 30px 0;
            line-height: 1px;
        }

        input {
            display: block;
            width: 100%;
            height: 29px;
            margin: 5px 0;
            font-size: 1.6rem;
            line-height: 1px;
        }

        .nama,
        .hari,
        .no_lantai,
        .extra_time,
        .snack,
        .jam_penggunaan,
        .no_ruang,
        .total_booking,
        .kapasitas {
            min-height: 2rem;
            padding: 1rem 0;
            border: none;
            border-bottom: 1px solid #bcb9b9;
        }

        .submit {
            font-size: 14px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: #f4f4f4;
            background-color: #4F709C;
            border: 3px solid #4F709C;
            border-radius: 1rem;
            width: 8rem;
            height: 2.5rem;
            padding: 8px 2rem;
            margin: 40px auto 10px auto;
            cursor: pointer;
            transition: all .3s;
        }

        .submit:hover {
            background-color: transparent;
            color: #222;
        }

        /* Spesifikasi ditingkatkan untuk tombol "submit" */
        .survey-form .submit {
            font-size: 14px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: #f4f4f4;
            background-color: #4F709C;
            border: 3px solid #4F709C;
            border-radius: 1rem;
            width: 8rem;
            height: 2.5rem;
            padding: 8px 2rem;
            margin: 40px auto 10px auto;
            cursor: pointer;
            transition: all .3s;
        }

        .survey-form .submit:hover {
            background-color: transparent;
            color: #222;
        }

        /* style comboboxs */
        input {
            padding: 5px;
            height: 35px;
            border-bottom: 1px solid;
            outline: none;
        }

        datalist {
            /* position: absolute; */
            background-color: white;
            border-top: none;
            width: 350px;
            padding: 5px;
            max-height: 10rem;
            overflow-y: auto
        }

        option {
            background-color: white;
            padding: 4px;
            margin-bottom: 1px;
            font-size: 14px;
            cursor: pointer;
        }

        
        .header-text {
            font-weight: bold;
            font-size: 15px;
        }

        @media only screen and (max-width: 800px) {
            .password-toggle {
                top: 56.5rem;
                right: 3rem;
            }

            .container {
                padding: 1rem 1rem 0px 1rem;
            }


            .heading {
                padding: 1.3em 9px 1.8rem 9px;
            }

            .survey-form {
                padding: 1.3em 15px 1.8rem 15px;

            }

            .main-heading {
                font-size: 22px;
                margin-bottom: 0;
                text-align: center;
            }

            label {
                font-size: 16px;
            }
        }
    </style>
</head>

<body class="relative min-h-screen overflow-hidden">
    <?php $this->load->view('sidebar'); ?>

    <main class="contain-all max-h-screen overflow-y-auto">
        <div class="container">
            <header class="heading">
                <div class="green-bar"></div>
                <h1 id="title" class="main-heading">Form Edit Peminjaman</h1>
            </header>
            <?php foreach ($peminjaman as $row) : $booking = $row->tanggal_booking;
                $berakhir = $row->tanggal_berakhir;
                $jumlah =  $row->jumlah_orang; ?>
                <form action="<?php echo base_url('operator/aksi_edit_peminjaman') ?>" method="post" id="survey-form" class="survey-form">
                    <input type="hidden" name="id" id="id" class="id" value="<?php echo $row->id ?>">
                    <input type="hidden" name="booking" id="id" class="id" value="<?php echo $booking ?>">
                    <input type="hidden" name="akhir_booking" id="id" class="id" value="<?php echo $berakhir ?>">
                    
                    <label for="nama" class="header-text" id="name-label">Nama </span></label>
                    <select id="underline_select" name="jenis" required
                        class="snack block py-2.5 px-0 w-full text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-gray-200 peer">
                        <option selected><?php echo tampil_nama_penyewa_byid($row->id_pelanggan)?></option>
                        <?php foreach($pelanggan as $row):?>
                        <option value="<?php echo $row->id?>">
                           <?php echo $row->nama?>
                        </option>
                        <?php endforeach?>
                    </select>

                    <label for="no_ruang" class="header-text" id="name-label"> Ruangan</span></label>
                    <select id="underline_select" name="jenis" required
                    class="snack block py-2.5 px-0 w-full text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-gray-200 peer">
                
                        <option selected><?php echo tampil_nama_ruangan_byid($row->id_ruangan)?></option>
                        <?php foreach ($ruangan as $row): ?>
                        <option value="<?php echo $row->id?>">L
                            <?php echo $row->no_lantai ?> R
                            <?php echo $row->no_ruang ?>
                        </option>
                    <?php endforeach ?>
                  
                </select>
                    <label for="kapasitas" class="header-text" id="kapasitas-label">Jumlah Orang</span></label>
                    <input type="number" name="kapasitas" id="kapasitas" class="kapasitas" value="<?php echo $jumlah ?>" required>

                    <label for="snack" class="header-text" id="snack-label">Tambahan</span></label>
                    <input class="snack" autocomplete="off" role="combobox" list="" id="input" name="snack" placeholder="Pilih Paket">
                    <datalist id="browsers" id="checkbox" role="listbox">
                        <div class="">
                            <?php foreach ($tambahan as $row) : ?>
                                <option style=""><?php echo $row->nama ?></option>
                                <input style="width: 15px;  margin-left: 15rem; margin-top: -30px;" type="checkbox" id="checkbox" name="tambahan[]" value="<?php echo $row->id ?>">
                            <?php endforeach ?>
                        </div>
                    </datalist>
                    <input type="submit" id="submit" class="submit" value="Submit">
                </form>
            <?php endforeach ?>
        </div>
    </main>

    <!-- script comboboxs -->
    <script>
        const checkbox = document.getElementById('checkbox');

        input.onfocus = function() {
            browsers.style.display = 'block';
            input.style.borderRadius = "5px 5px 0 0";
        };
        for (let option of browsers.options) {
            option.onclick = function() {
                input.value = option.value;
                browsers.style.display = 'none';
                input.style.borderRadius = "5px";
            }
        };

        input.oninput = function() {
            currentFocus = -1;
            var text = input.value.toUpperCase();
            for (let option of browsers.options) {
                if (option.value.toUpperCase().indexOf(text) > -1) {
                    option.style.display = "block";
                } else {
                    option.style.display = "none";
                }
            };
        }
        var currentFocus = -1;
        input.onkeydown = function(e) {
            if (e.keyCode == 40) {
                currentFocus++
                addActive(browsers.options);
            } else if (e.keyCode == 38) {
                currentFocus--
                addActive(browsers.options);
            } else if (e.keyCode == 13) {
                e.preventDefault();
                if (currentFocus > -1) {
                    /*and simulate a click on the "active" item:*/
                    if (browsers.options) browsers.options[currentFocus].click();
                }
            }
        }

        function addActive(x) {
            if (!x) return false;
            removeActive(x);
            if (currentFocus >= x.length) currentFocus = 0;
            if (currentFocus < 0) currentFocus = (x.length - 1);
            x[currentFocus].classList.add("active");
        }

        function removeActive(x) {
            for (var i = 0; i < x.length; i++) {
                x[i].classList.remove("active");
            }
        }
    </script>

    <!-- script comboboxs no ruang -->
    <script>
        input1.onfocus = function() {
            browsers1.style.display = 'block';
            input1.style.borderRadius = "5px 5px 0 0";
        };
        for (let option of browsers1.options) {
            option.onclick = function() {
                input1.value = option.value;
                browsers1.style.display = 'none';
                input1.style.borderRadius = "5px";
            }
        };

        input1.oninput = function() {
            currentFocus = -1;
            var text = input1.value.toUpperCase();
            for (let option of browsers1.options) {
                if (option.value.toUpperCase().indexOf(text) > -1) {
                    option.style.display = "block";
                } else {
                    option.style.display = "none";
                }
            };
        }
        var currentFocus = -1;
        input1.onkeydown = function(e) {
            if (e.keyCode == 40) {
                currentFocus++
                addActive(browsers1.options);
            } else if (e.keyCode == 38) {
                currentFocus--
                addActive(browsers1.options);
            } else if (e.keyCode == 13) {
                e.preventDefault();
                if (currentFocus > -1) {
                    /*and simulate a click on the "active" item:*/
                    if (browsers1.options) browsers1.options[currentFocus].click();
                }
            }
        }

        function addActive(x) {
            if (!x) return false;
            removeActive(x);
            if (currentFocus >= x.length) currentFocus = 0;
            if (currentFocus < 0) currentFocus = (x.length - 1);
            x[currentFocus].classList.add("active");
        }

        function removeActive(x) {
            for (var i = 0; i < x.length; i++) {
                x[i].classList.remove("active");
            }
        }
    </script>


    <!-- script disable -->
    <script>
        $(document).ready(function() {
            // Menangkap perubahan pada input di atasnya
            $('#input').on('input', function() {
                // Mengaktifkan atau menonaktifkan input berdasarkan kondisi
                $('#no_ruang').prop('disabled', !$(this).val());
            });
        });
    </script>

</body>

</html>