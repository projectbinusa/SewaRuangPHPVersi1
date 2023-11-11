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

        body {
            font-family: "DM Sans", sans-serif;
            /* font-size: 1.6rem; */
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

        .responsive-3{
            width: 100%;
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

        .tanggal,
        .hari,
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

<body>
    <?php $this->load->view('sidebar'); ?>

    <main>
        <div class="container">
            <header class="heading">
                <div class="green-bar"></div>
                <h1 id="title" class="main-heading">Form Tambah Report Sewa</h1>
            </header>

            <form action="" method="post" id="survey-form" class="survey-form">
                <label for="hari" id="name-label">Hari<span class="required">*</span></label>
                <input type="text" name="hari" id="hari" class="hari" placeholder="Ketik hari pemesanan" required>

                <label for="tanggal" id="name-label">Tanggal<span class="required">*</span></label>
                <input type="date" name="tanggal" id="tanggal" class="tanggal" placeholder="Ketik tanggal" required>

                <div class="mb-3 col-6">
                <label for="no_ruang" class="form-label">No Ruang<span class="required">*</span></label>
                <select name="no_ruang" class="form-select">
                    <option selected>Pilih Ruang</option>
            
            </option>
                    <option value="Ruang ke 1.">Ruang ke 1.</option>
                    <option value="Ruang ke 2.">Ruang ke 2.</option>
                    <option value="Ruang ke 3.">Ruang ke 3.</option>
                    <option value="Ruang ke 4.">Ruang ke 4.</option>
                    <option value="Ruang ke 5.">Ruang ke 5.</option>
                </select>
    </div>
                <b><hr></b>

                <label for="kapasitas" id="kapasitas-label">Kapasitas<span class="required">*</span></label>
                <input type="kapasitas" name="kapasitas" id="kapasitas" class="kapasitas"
                    placeholder="Ketik kapasitas ruangan" required>

                <label for="snack" id="snack-label">Snack<span class="required">*</span></label>
                <input type="snack" name="snack" id="snack" class="snack" placeholder="Ketik snack jika ada" required>

                <label for="jam_penggunaan" id="jam_penggunaan-label">Jam Penggunaan<span
                class="required">*</span></label>
                <input type="jam_penggunaan" name="jam_penggunaan" id="jam_penggunaan" class="jam_penggunaan"
                placeholder="Ketik jam penggunaan" required>

                <label for="extra_time" id="extra_time-label">Extra Time<span class="required">*</span></label>
                <input type="extra_time" name="extra_time" id="extra_time" class="extra_time"
                    placeholder="Ketik extra time jika ada" required>

                <label for="total_booking" id="total_booking-label">Total Hari Booking<span
                        class="required">*</span></label>
                <input type="total_booking" name="total_booking" id="total_booking" class="total_booking"
                    placeholder="Ketik total hari booking" required>

                <input type="submit" id="submit" class="submit" value="Submit">
            </form>
        </div>
    </main>
</body>
<script type="text/javascript">
    function togglePassword() {
        var passwordField = document.getElementById('password');
        var passwordToggle = document.querySelector('.password-toggle');

        if (passwordField.type === "password") {
            passwordField.type = "text";
            passwordToggle.classList.remove('fa-eye-slash');
            passwordToggle.classList.add('fa-eye');


        } else {
            passwordField.type = "password";
            passwordToggle.classList.add('fa-eye-slash');
            passwordToggle.classList.remove('fa-eye');

        }
    }
</script>

</html>