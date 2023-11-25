<!DOCTYPE html>
   <html lang="en">


   <head>
       <meta charset="UTF-8">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <title>Sewa Ruang</title>
       <script src="https://cdn.tailwindcss.com"></script>
       <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
       <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
       <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
       <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11">
       <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
       <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
       <script src="https://cdn.tailwindcss.com"></script>
       <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
       <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
       <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
       <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@12.11.5/dist/sweetalert2.min.css">
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
           border: 3px solid #4F709C;
           border-radius: 1rem;
           width: 8rem;
           height: 2.5rem;
           padding: 3px 2rem;
           margin: 40px auto 10px auto;
           cursor: pointer;
           transition: all .3s;
       }

      
   </style>

   <body class="bg-gray-100 relative min-h-screen overflow-hidden font-base">
       <?php $this->load->view('sidebar'); ?>
       <main class="contain-all max-h-screen overflow-y-auto">

           <div class="p-8 w-full md:w-2/3 flex justify-center items-center m-auto ">
               <div class="max-w-screen-xl w-full mx-auto"> <!-- Menggunakan max-w-screen-xl -->
                   <!-- Konten halaman Anda di sini -->
                   <main>
                       <div class="container mx-auto p-auto ml-auto">
                           <header class="bg-white p-7 rounded-lg shadow-lg mb-8 relative">
                               <div class="green-bar"></div>
                               <h1 id="title" class="text-4xl">Tambah Data Pelanggan</h1>
                           </header>
                           <form action="<?php echo base_url('operator/data_master_pelanggan') ?>" method="post" id="survey-form" class="bg-white p-7 rounded-lg shadow-lg mb-8 text-lg" enctype="multipart/form-data">
                               <div class="w-full">
                                   <label for="nama" class="block">Nama</label>
                                   <input type="text" name="nama" id="no_lantai" class="w-full min-h-8 p-4 border-b-2 border-gray-300" required>



                                   <label for="phone" class="block">No Telepon</label>
                                   <input type="text" name="phone" id="no_ruang" class="w-full min-h-8 p-4 border-b-2 border-gray-300" required>


                                   <label for="payment_method" class="block">Metode Pembayaran</label>
                                   <input type="text" name="payment_method" id="deskripsi" class="w-full min-h-8 p-4 border-b-2 border-gray-300" required>

                                   <div class="text-center mt-1">
                                <input type="submit" id="submit" class="submit font-size-14px ont-weight-600 text-transform-uppercase letter-spacing-1px color-#f4f4f4 background-color-#4F709C border-3px-solid-#4F709C border-radius-1rem        width-8rem height-2.5rem padding-3px-2rem margin-40px-auto-10px-auto cursor-pointer transition-all .3s" value="Submit">
                            </div>
                           </form>
                       </div>
                   </main>
               </div>
           </div>
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
                                url: "<?php echo base_url('operator/aksi_tambah_pelanggan') ?>",
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

<script>
function displaySweetAlert() {
    const message = "<?php echo $this->session->flashdata('sukses'); ?>";
    const error = "<?php echo $this->session->flashdata('error'); ?>";

    if (message) {
        Swal.fire({
            title: 'Success!',
            text: message,
            timer: 1500,
            icon: 'success',
            showConfirmButton: false,
            timerProgressBar: true
        });
    } else if (error) {
        Swal.fire({
            title: 'Error!',
            text: error,
            timer: 1500,
            icon: 'error',
            showConfirmButton: false,
            timerProgressBar: true
        });
    }
}
   </script>
   </html>
