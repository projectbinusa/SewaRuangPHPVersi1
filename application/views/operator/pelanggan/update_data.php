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
</style>

<body class="bg-gray-100 relative min-h-screen overflow-hidden font-base">
    <?php $this->load->view('sidebar'); ?>
    <main class="contain-all max-h-screen overflow-y-auto">
        <div class="p-8 w-full md:w-2/3 flex justify-center items-center m-auto ">
            <div class="max-w-screen-xl w-full mx-auto"> <!-- Menggunakan max-w-screen-xl -->
                <!-- Konten halaman Anda di sini -->
                <!-- <main> -->
                <div class="container mx-auto p-auto ml-auto">
                    <header class="bg-white p-7 rounded-lg shadow-lg mb-8 relative">
                        <div class="green-bar"></div>
                        <h1 id="title" class="text-4xl font-bold text-black-900">Update Data Pelanggan</h1>
                    </header>
                    <?php foreach ($pelanggan as $row) : ?>
                        <form action="<?php echo base_url('operator/aksi_update_data') ?>" method="post" id="survey-form" class="bg-white p-7 rounded-lg shadow-lg mb-8 text-lg" enctype="multipart/form-data">
                            <input name="id" type="hidden" value="<?php echo $row->id ?>">

                            <label for="nama" class="block">Nama</label>
                            <input type="text" name="nama" id="no_lantai" class="w-full min-h-8 p-4 border-b-2 border-gray-300" value="<?php echo $row->nama ?>">

                            <label for="phone" class="block">Phone</label>
                            <input type="text" name="phone" id="no_ruang" class="w-full min-h-8 p-4 border-b-2 border-gray-300" value="<?php echo $row->phone ?>">

                            <label for="payment_method" class="block">Payment Method</label>
                            <input type="text" name="payment_method" id="deskripsi" class="w-full min-h-8 p-4 border-b-2 border-gray-300" value="<?php echo $row->payment_method ?>">


                            <div class="text-center mt-10">
                                <input type="submit" id="submit" class="submit" value="Submit">
                            </div>
                        </form>
                    <?php endforeach ?>
                </div>
                <!-- </main> -->
            </div>
        </div>
        </div>
        </div>
    </main>
</body>

</html>