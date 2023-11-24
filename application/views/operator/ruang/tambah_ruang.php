<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sewa Ruang</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet">
</head>
<style>
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
        padding: 3px 2rem;
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
        padding: 3px 2rem;
        margin: 40px auto 10px auto;
        cursor: pointer;
        transition: all .3s;
    }

    .survey-form .submit:hover {
        background-color: transparent;
        color: #222;
    }
</style>

<body class="relative min-h-screen overflow-hidden">
    <?php $this->load->view('sidebar'); ?>
    <main class="contain-all max-h-screen overflow-y-auto">
        <div class="p-8 w-full md:w-full flex justify-center items-center m-auto">
            <div class="max-w-screen-xl w-full mx-auto">
                <!-- Konten halaman Anda di sini -->
                <main>
                    <div class="container mx-auto p-auto md:w-10/12">
                        <header class="bg-white p-7 rounded-lg shadow-lg mb-8 relative">
                            <div class="green-bar"></div>
                            <h1 id="title" class="text-4xl px-7 text-medium text-black-900">Tambah Data Ruangan</h1>
                        </header>

                        <form action="<?php echo base_url('operator/aksi_tambah_ruangan') ?>" method="post" id="survey-form" class="bg-white p-7 rounded-lg shadow-lg mb-8 text-lg" enctype="multipart/form-data">
                            <div class="flex flex-wrap">
                                <div class="w-full px-7">
                                    <label for="no_lantai" class="block">Nomor Lantai</label>
                                    <input type="text" name="no_lantai" id="no_lantai" class="w-full min-h-8 p-4 border-b-2 border-gray-300">
                                </div>

                                <div class="w-full px-7">
                                    <label for="no_ruang" class="block">Ruang</label>
                                    <input type="text" name="no_ruang" id="no_ruang" class="w-full min-h-8 p-4 border-b-2 border-gray-300">
                                </div>

                                <div class="w-full px-7">
                                    <label for="harga" class="block">Harga</label>
                                    <input type="text" name="harga" id="harga" class="w-full min-h-8 p-4 border-b-2 border-gray-300">
                                </div>

                                <div class="w-full px-7">
                                    <label for="foto" class="block">Foto Ruangan</label>
                                    <input type="file" name="foto" id="foto" class="w-full min-h-8 p-4 border-b-2 border-gray-300">
                                </div>

                                <div class="w-full px-7">
                                    <label for="deskripsi" class="block">Keterangan</label>
                                    <input type="text" name="deskripsi" id="deskripsi" class="w-full min-h-8 p-4 border-b-2 border-gray-300">
                                </div>
                            </div>
                            <div class="text-center mt-1">
                                <input type="submit" id="submit" class="submit font-size-14px ont-weight-600 text-transform-uppercase letter-spacing-1px color-#f4f4f4 background-color-#4F709C border-3px-solid-#4F709C border-radius-1rem        width-8rem height-2.5rem padding-3px-2rem margin-40px-auto-10px-auto cursor-pointer transition-all .3s" value="Submit">
                            </div>
                        </form>
                    </div>
                </main>
            </div>
        </div>
    </main>
    <!-- Include jQuery before SweetAlert2 and your other scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        $(document).ready(function() {
            const form = document.getElementById("survey-form");

            form.addEventListener("submit", function(e) {
                e.preventDefault();

                if (e.submitter.id === "submit") {
                    // Display SweetAlert confirmation before submitting
                    Swal.fire({
                        title: 'Konfirmasi',
                        text: 'Apakah Anda yakin ingin menyimpan data?',
                        icon: 'question',
                        showCancelButton: true,
                        confirmButtonText: 'Ya',
                        cancelButtonText: 'Batal'
                    }).then(function(result) {
                        if (result.isConfirmed) {
                            // If user clicks "Ya", proceed with AJAX submission
                            document.getElementById("submit").disabled = true;

                            $.ajax({
                                type: "POST",
                                url: "<?php echo base_url('operator/aksi_tambah_ruangan') ?>",
                                data: new FormData(form),
                                contentType: false,
                                processData: false,
                                dataType: "json",
                                success: function(response) {
                                    if (response.status === 'success') {
                                        // Show success SweetAlert and then redirect
                                        Swal.fire({
                                            title: 'Berhasil',
                                            text: response.message,
                                            icon: 'success',
                                            showConfirmButton: false,
                                            timer: 2000
                                        }).then(function() {
                                            window.location.href = response.redirect;
                                        });
                                    } else {
                                        // Display error messages
                                        if (response.errors) {
                                            response.errors.forEach(function(error) {
                                                Swal.fire({
                                                    title: 'Gagal',
                                                    text: error,
                                                    icon: 'error',
                                                    showConfirmButton: false,
                                                    timer: 2000
                                                });
                                            });
                                        } else {
                                            Swal.fire({
                                                title: 'Gagal',
                                                text: response.message,
                                                icon: 'error',
                                                showConfirmButton: false,
                                                timer: 2000
                                            });
                                        }

                                        // Use setTimeout to wait for the error message to be visible
                                        setTimeout(function() {
                                            document.getElementById("submit").disabled = false;
                                        }, 2000); // Adjust the duration as needed
                                    }
                                }
                            });
                        }
                    });
                } else if (e.submitter.id === "cancel") {
                    // Handle the "Batal" button click event here
                    Swal.fire({
                        title: 'Aksi dibatalkan',
                        text: 'Anda membatalkan aksi penyimpanan data.',
                        icon: 'info',
                        showConfirmButton: false,
                        timer: 2000
                    });
                    // Optionally, you can redirect or perform other actions when canceling
                }
            });
        });
    </script>
</body>

</html>