<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Ruangan</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Pastikan jQuery dimuat sebelum kode JavaScript Anda -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <?php $this->load->view('sidebar'); ?>
    <div class="p-8 w-full md:w-cover flex justify-center items-center m-auto">
    <div class="max-w-screen-xl w-full mx-auto">
        <!-- Konten halaman Anda di sini -->
        <main>
            <div class="container mx-auto p-auto ml-auto w-10/12">
                <header class="bg-white p-7 rounded-lg shadow-lg mb-8 relative">
                    <div class="h-3 w-full absolute top-0 left-0 rounded-t-lg" style="background: #0C356A;"></div>
                    <h1 id="title" class="text-4xl px-7 text-medium text-black-900">Edit Data Ruangan</h1>
                </header>

                    <form action="<?php echo base_url('operator/aksi_edit_ruangan/' . $ruangan->id) ?>" method="post" id="edit-form" class="bg-white p-7 rounded-lg shadow-lg mb-8 text-lg" enctype="multipart/form-data">
                        <div class="flex flex-wrap">
                            <div class="w-full px-7">
                                <label for="no_lantai" class="block">Nomor Lantai</label>
                                <input type="number" name="no_lantai" id="no_lantai" class="w-full min-h-8 p-4 border-b-2 border-gray-300" value="<?php echo $ruangan->no_lantai; ?>">
                            </div>

                            <div class="w-full px-7">
                                <label for="no_ruang" class="block">Ruang</label>
                                <input type="text" name="no_ruang" id="no_ruang" class="w-full min-h-8 p-4 border-b-2 border-gray-300" value="<?php echo $ruangan->no_ruang; ?>">
                            </div>

                            <div class="w-full px-7">
                                <label for="harga" class="block">Harga</label>
                                <input type="text" name="harga" id="harga" class="w-full min-h-8 p-4 border-b-2 border-gray-300" value="<?php echo $ruangan->harga; ?>">
                            </div>

                            <div class="w-full px-7">
                                <label for="foto" class="block">Foto Ruangan</label>
                                <input type="file" name="foto" id="foto" class="w-full min-h-8 p-4 border-b-2 border-gray-300">
                            </div>

                            <div class="w-full px-7">
                                <label for="deskripsi" class="block">Keterangan</label>
                                <input type="text" name="deskripsi" id="deskripsi" class="w-full min-h-8 p-4 border-b-2 border-gray-300" value="<?php echo $ruangan->deskripsi; ?>">
                            </div>
                        </div>

                        <!-- Tambahkan input hidden untuk ID ruangan dan berikan nilai id="room_id" -->
                        <input type="hidden" name="id" id="room_id" value="<?php echo $ruangan->id; ?>">

                        <div class="text-center mt-10">
                            <input type="submit" id="submit" style="border-radius: 10px;" class="inline-block font-semibold text-white text-lg py-2 px-8 bg-blue-500 hover:bg-blue-600" value="Ubah">
                            <form action="<?php echo base_url('operator/hapus_image/' . $ruangan->id) ?>" method="post" id="edit-form" class="bg-white p-7 rounded-lg shadow-lg mb-8 text-lg" enctype="multipart/form-data">
                                <input type="button" id="submitt" style="border-radius: 10px;" class="inline-block font-semibold text-white text-lg py-2 px-8 bg-black hover:bg-black" value="Hapus Gambar" onclick="deleteImage('<?= $ruangan->id ?>')">
                            </form>
                        </div>
                    </form>
                </div>
            </main>
        </div>
    </div>

    <script>
        function deleteImage(imageId) {
            // Konfirmasi terlebih dahulu menggunakan SweetAlert2
            Swal.fire({
                title: 'Konfirmasi',
                text: 'Apakah Anda yakin ingin menghapus gambar ini?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, Hapus',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "POST",
                        url: "<?php echo base_url('operator/hapus_image/') ?>" + imageId,
                        contentType: false,
                        processData: false,
                        dataType: "json",
                        success: function(response) {
                            if (response.status === 'success') {
                                Swal.fire({
                                    title: 'Sukses',
                                    text: response.message,
                                    icon: 'success',
                                }).then(function() {
                                    // Redirect ke URL tujuan setelah berhasil
                                    window.location.href = response.redirect;
                                });
                            } else if (response.status === 'error') {
                                Swal.fire({
                                    title: 'Gagal',
                                    text: response.message,
                                    icon: 'error',
                                });
                            }
                        },
                        error: function() {
                            Swal.fire({
                                title: 'Error',
                                text: 'Terjadi kesalahan saat melakukan permintaan.',
                                icon: 'error',
                            });
                        }
                    });
                }
            });
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {
            const form = document.getElementById("edit-form");

            form.addEventListener("submit", function(e) {
                e.preventDefault();

                if (e.submitter.id === "submit") {
                    document.getElementById("submit").disabled = true;

                    const id = $("#room_id").val();
                    const formData = new FormData(this);

                    $.ajax({
                        type: "POST",
                        url: "<?php echo base_url('operator/aksi_edit_ruangan/' . $ruangan->id) ?>",
                        data: formData,
                        contentType: false,
                        processData: false,
                        dataType: "json",
                        success: function(response) {
                            if (response.status === 'success') {
                                Swal.fire({
                                    title: 'Sukses',
                                    text: response.message,
                                    icon: 'success',
                                }).then(function() {
                                    // Redirect ke URL tujuan setelah berhasil
                                    window.location.href = response.redirect;
                                });
                            } else if (response.status === 'error') {
                                Swal.fire({
                                    title: 'Gagal',
                                    text: response.message,
                                    icon: 'error',
                                });
                            }

                            document.getElementById("submit").disabled = false;
                        }
                    });
                }
            });
        });
    </script>

</body>

</html>