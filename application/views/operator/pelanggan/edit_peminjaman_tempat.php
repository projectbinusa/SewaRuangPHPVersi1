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
            background-color: #E4F1FF;
            color: #222;
            padding: 0 0px;
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
    </style>
</head>

<body class="relative min-h-screen overflow-hidden">
    <?php $this->load->view('sidebar'); ?>

    <main class="contain-all max-h-screen overflow-y-auto">
        <div class="px-36 pt-10 container">
            <header class="heading">
                <div class="green-bar"></div>
                <h1 id="title" class="main-heading">Form Edit Peminjaman</h1>
            </header>

            <form action="" method="post" id="survey-form" class="survey-form">
                <label for="hari" id="name-label">Hari<span class="required">*</span></label>
                <input type="text" name="hari" id="hari" class="hari" placeholder="Ketik hari pemesanan" required>
                <label for="tanggal" id="name-label">Tanggal<span class="required">*</span></label>
                <input type="date" name="tanggal" id="tanggal" class="tanggal" placeholder="Ketik tanggal" required>
                <label for="no_ruang" id="name-label">No Ruang<span class="required">*</span></label>
                <input type="text" name="no_ruang" id="no_ruang" class="no_ruang" placeholder="Ketik no ruang" required>

                <label for="kapasitas" id="kapasitas-label">Kapasitas<span class="required">*</span></label>
                <input type="kapasitas" name="kapasitas" id="kapasitas" class="kapasitas"
                    placeholder="Ketik kapasitas ruangan" required>

                <label for="snack" id="snack-label">Snack<span class="required">*</span></label>
                <input type="snack" name="snack" id="snack" class="snack" placeholder="Ketik snack jika ada" required>

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

</html>