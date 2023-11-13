<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Data Ruangan</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 min-h-screen font-base">
    <?php $this->load->view('sidebar'); ?>
    <div class="p-8 w-full md:w-2/3 flex justify-center items-center m-auto ">
        <div class="max-w-screen-xl w-full mx-auto"> <!-- Menggunakan max-w-screen-xl -->
            <!-- Konten halaman Anda di sini -->
            <main>
                <div class="container mx-auto p-auto ml-auto">
                    <header class="bg-white p-7 rounded-lg shadow-lg mb-8 relative">
                        <div class="bg-blue-500 h-3 w-full absolute top-0 left-0 rounded-t-lg"></div>
                        <h1 id="title" class="text-4xl font-bold text-black-900">Update Data Pelanggan</h1>
                    </header>
                    <?php foreach ($pelanggan as $row) : ?>
                        <form action="<?php echo base_url('operator/aksi_update_data') ?>" method="post" id="survey-form" class="bg-white p-7 rounded-lg shadow-lg mb-8 text-lg" enctype="multipart/form-data">
                            <input name="id" type="hidden" value="<?php echo $row->id ?>">
                            <div class="flex flex-wrap">
                                <div class="w-full">
                                    <label for="nama" class="block">Nama</label>
                                    <input type="text" name="nama" id="no_lantai" class="w-full min-h-8 p-4 border-b-2 border-gray-300" value="<?php echo $row->nama ?>">
                                    
                                    <label for="phone" class="block">Phone</label>
                                    <input type="text" name="phone" id="no_ruang" class="w-full min-h-8 p-4 border-b-2 border-gray-300" value="<?php echo $row->phone ?>">

                                    <label for="payment_method" class="block">Payment Method</label>
                                    <input type="text" name="payment_method" id="deskripsi" class="w-full min-h-8 p-4 border-b-2 border-gray-300" value="<?php echo $row->payment_method ?>">


                                    <div class="text-center mt-10">
                                        <input type="submit" id="submit" class="bg-white text-lg py-2 px-8 text-blue-500 border-2 border-blue-500 rounded-md transition-all duration-300 hover:bg-blue-500 hover:text-white" value="Update">
                                    </div>
                        </form>
                    <?php endforeach ?>
                </div>
            </main>
        </div>
    </div>
    </div>
    </div>

</body>

</html>