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

        /* 
        html {
            font-size: 62.5%;
        } */

        body {
            font-family: "DM Sans", sans-serif;
            /* font-size: 1.6rem; */
            background-color: #E4F1FF;
            color: #222;
            padding: 0 0px;
        }

        /* .container {
            min-width: 20rem;
            max-width: 65rem;
            margin: 4rem auto;
        } */

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



        .form-group {
            position: relative;
        }

        .password-toggle {
            position: absolute;
            top: 80%;
            transform: translateY(-50%);
            right: 12.9rem;
            cursor: pointer;
        }

        @media only screen and (max-width: 800px) {
            .password-toggle {
                top: 76%;
                right: 4.9rem;
            }
        }

        /* style comboboxs */
        legend,
        label {
            /* color: blue; 
            font-size: 24px;
            font-family: sans-serif; */
        }

        input {
            /* font-size: 18px; */
            padding: 5px;
            height: 35px;
            /* width: 350px; */
            border-bottom: 1px solid;
            outline: none;
            /* border-radius: 5px; */
            /* color: blue; */
            /*   border-bottom: none; */
        }

        datalist {
            position: absolute;
            background-color: white;
            /* border: 1px solid blue; */
            /* border-radius: 0 0 5px 5px; */
            border-top: none;
            /* font-family: sans-serif; */
            width: 350px;
            padding: 5px;
            max-height: 10rem;
            overflow-y: auto
        }

        option {
            background-color: white;
            padding: 4px;
            /* color: blue; */
            margin-bottom: 1px;
            font-size: 14px;
            cursor: pointer;
        }

        option:hover,
        .active {
            /* background-color: lightblue; */
        }
    </style>
</head>

<body>
    <?php $this->load->view('sidebar'); ?>

    <main>
        <div class="px-36 pt-10 container">
            <header class="heading">
                <div class="green-bar"></div>
                <h1 id="title" class="main-heading">Form Tambah Peminjaman</h1>
            </header>

            <form action="" method="post" id="survey-form" class="survey-form">
                <label for="nama" id="name-label">Nama <span class="required">*</span></label>
                <input type="text" name="nama" id="nama" class="nama" placeholder="Masukkan nama penyewa" required>

                <label for="no_lantai" id="name-label">No Lantai<span class="required">*</span></label>
                <input class="no_lantai" autocomplete="off" role="combobox" list="" id="input" name="no_lantai"
                    placeholder="Pilih no lantai">

                <datalist id="browsers" role="listbox">
                    <option value="001">001</option>
                    <option value="002">002</option>
                    <option value="003">003</option>
                    <option value="004">004</option>
                    <option value="005">005</option>
                </datalist>

                <label for="no_ruang" id="name-label">No Ruang<span class="required">*</span></label>
                <input class="no_ruang" autocomplete="off" role="combobox" list="" id="input1" name="no_ruang"
                    placeholder="Pilih no lantai">
                <datalist id="browsers1" role="listbox">
                    <option value="001">001</option>
                    <option value="002">002</option>
                    <option value="003">003</option>
                    <option value="004">004</option>
                </datalist>

                <label for="kapasitas" id="kapasitas-label">Kapasitas<span class="required">*</span></label>
                <input type="kapasitas" name="kapasitas" id="kapasitas" class="kapasitas"
                    placeholder="Masukkan kapasitas ruangan" required>

                <label for="snack" id="snack-label">Snack<span class="required">*</span></label>
                <select id="underline_select"
                    class="snack block py-2.5 px-0 w-full text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-gray-200 peer">
                    <option selected>Pilih Paket Snack</option>
                    <option value="US">Paket 1</option>
                    <option value="CA">Paket 2</option>
                    <option value="FR">Paket 3</option>
                </select>


                <label for="extra_time" id="extra_time-label">Extra Time<span class="required">*</span></label>
                <input type="extra_time" name="extra_time" id="extra_time" class="extra_time"
                    placeholder="Masukkan extra time jika ada" required>

                <!-- <label for="jam_penggunaan" id="jam_penggunaan-label">Jam Penggunaan<span
                        class="required">*</span></label>
                <input type="jam_penggunaan" name="jam_penggunaan" id="jam_penggunaan" class="jam_penggunaan"
                    placeholder="Masukkan jam penggunaan" required> -->

                <label for="total_booking" id="total_booking-label">Booking Dari Tanggal<span
                        class="required">*</span></label>
                <input type="date" name="total_booking" id="total_booking" class="total_booking"
                    placeholder="Masukkan total hari booking" required>
                <label for="total_booking" id="total_booking-label">Booking Sampai Tanggal<span
                        class="required">*</span></label>
                <input type="date" name="total_booking" id="total_booking" class="total_booking"
                    placeholder="Masukkan total hari booking" required>

                <input type="submit" id="submit" class="submit" value="Submit">
            </form>
        </div>
    </main>

    <!-- script comboboxs no lantai -->
    <script>
        input.onfocus = function () {
            browsers.style.display = 'block';
            input.style.borderRadius = "5px 5px 0 0";
        };
        for (let option of browsers.options) {
            option.onclick = function () {
                input.value = option.value;
                browsers.style.display = 'none';
                input.style.borderRadius = "5px";
            }
        };

        input.oninput = function () {
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
        input.onkeydown = function (e) {
            if (e.keyCode == 40) {
                currentFocus++
                addActive(browsers.options);
            }
            else if (e.keyCode == 38) {
                currentFocus--
                addActive(browsers.options);
            }
            else if (e.keyCode == 13) {
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
        input1.onfocus = function () {
            browsers1.style.display = 'block';
            input1.style.borderRadius = "5px 5px 0 0";
        };
        for (let option of browsers1.options) {
            option.onclick = function () {
                input1.value = option.value;
                browsers1.style.display = 'none';
                input1.style.borderRadius = "5px";
            }
        };

        input1.oninput = function () {
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
        input1.onkeydown = function (e) {
            if (e.keyCode == 40) {
                currentFocus++
                addActive(browsers1.options);
            }
            else if (e.keyCode == 38) {
                currentFocus--
                addActive(browsers1.options);
            }
            else if (e.keyCode == 13) {
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
        $(document).ready(function () {
            // Menangkap perubahan pada input di atasnya
            $('#input').on('input', function () {
                // Mengaktifkan atau menonaktifkan input berdasarkan kondisi
                $('#no_ruang').prop('disabled', !$(this).val());
            });
        });
    </script>

</body>

</html>