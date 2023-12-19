<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sewa Ruang</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
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

        .contain-all {
            overflow-y: scroll;
            height: 50rem;
        }

        @media only screen and (max-width: 800px) {

            .container {
                padding: 1rem 1rem 0px 1rem;
            }

            .contain-all {
                height: 90rem;
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


        #checkboxCombo {
            position: relative;
            display: inline-block;
        }

        #checkboxCombo select {
            width: 200px;
            padding: 5px;
        }

        #checkboxCombo input[type="checkbox"] {
            position: absolute;
            top: 0;
            right: 0;
        }

        .fields {
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
        }

        .fields label {
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
        }

        .input-fields {
            display: flex;
            width: calc(100% /3 - 15px);
            flex-direction: column;
            margin: 4px 0;
        }

        .input-fields input {
            outline: none;
            font-size: 14px;
            font-weight: 400;
            color: #333;
            border-radius: 5px;
            border: 1px solid #aaa;
            padding: 0 15px;
            height: 42px;
            margin: 8px 0;
        }

        .header-text {
            font-weight: bold;
            font-size: 15px;
        }
    </style>
</head>

<body class="relative min-h-screen overflow-hidden">
    <?php $this->load->view('sidebar'); ?>

    <main class="contain-all h-screen overflow-y-auto">
        <div class="container">
            <header class="heading">
                <div class="green-bar"></div>
                <h1 id="title" class="main-heading">Form Update Pelanggan</h1>
            </header>
            <?php foreach ($pelanggan as $row) : ?>

                <form action="<?= base_url('operator/aksi_update_data') ?>" method="post" id="survey-form" class="survey-form">
                    <div>
                        <input name="id" type="hidden" value="<?= $row->id ?>">

                        <label for="nama" class="block font-bold">Nama</label>
                        <input autocomplete="off" type="text" name="nama" id="nama" class="w-full min-h-8 p-4 border-b-2 border-gray-300" required value="<?= $row->nama ?>">

                        <label for="phone" class="block font-bold">No Telepon</label>
                        <input autocomplete="off" type="text" name="phone" id="phone" class="w-full min-h-8 p-4 border-b-2 border-gray-300" required value="<?= $row->phone ?>">

                        <label for="email" class="block font-bold">Email</label>
                        <input autocomplete="off" type="email" name="email" id="email" class="w-full min-h-8 p-4 border-b-2 border-gray-300" required value="<?= $row->email ?>">

                        <div class="text-center mt-1">
                            <input onclick="update(event)" type="button" id="submit" class="submit" value="Submit">
                        </div>
                    </div>
                </form>

            <?php endforeach; ?>
        </div>
    </main>

    <script>
        // Store the original values of the form fields
        var originalFormValues = {
            nama: '<?= $row->nama ?>',
            phone: '<?= $row->phone ?>',
            email: '<?= $row->email ?>'
        };

        function isFormChanged() {
            // Compare current values with original values
            var currentValues = {
                nama: $('#nama').val(),
                phone: $('#phone').val(),
                email: $('#email').val()
            };

            // Check if any field has been changed
            return (
                currentValues.nama !== originalFormValues.nama ||
                currentValues.phone !== originalFormValues.phone ||
                currentValues.email !== originalFormValues.email
            );
        }

        function update(event) {
            event.preventDefault();

            // Check if at least one field is changed
            var formChanged = isFormChanged();

            if (!formChanged) {
                Swal.fire({
                    icon: 'info',
                    title: 'Tidak Ada Perubahan',
                    text: 'Tidak ada data yang diubah. Silakan ubah setidaknya satu data.',
                    showConfirmButton: false,
                    timer: 2000,
                });
                return;
            }

            Swal.fire({
                title: 'Ubah Data Pelanggan?',
                text: 'Anda akan mengubah data pelanggan',
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'Batal',
                confirmButtonText: 'Ubah'
            }).then((result) => {
                if (result.isConfirmed) {
                    var formData = new FormData($('#survey-form')[0]);
                    $.ajax({
                        type: 'POST',
                        url: "<?= base_url('operator/aksi_update_data') ?>",
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function(response) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Data berhasil diubah',
                                showConfirmButton: false,
                                timer: 2000,
                            }).then(() => {
                                window.location.href = "<?= base_url('operator/data_master_pelanggan') ?>";
                            });
                        },
                        error: function(error) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Ups...',
                                text: 'Terjadi kesalahan saat mengubah data!',
                            });
                        }
                    });
                }
            });
        }
    </script>
</body>

</html>