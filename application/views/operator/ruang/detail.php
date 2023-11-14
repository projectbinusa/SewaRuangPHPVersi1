<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data Master Ruangan</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="h-screen overflow-hidden flex flex-col bg-gray-100">
  <?php $this->load->view('sidebar'); ?>
  <!-- Área de contenido principal -->
  <div class="min-h-screen overflow-hidden flex mt-32 justify-center items-start md:mx-96">
    <div class="grid grid-cols-1 md:grid-cols-10 lg:grid-cols-3 gap-x-1">
      <?php foreach ($ruang as $row) : ?>
        <div class="mx-auto flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow-lg dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-blue-700 w-full md:w-80 lg:w-96">
          <div class="w-full">
            <?php if (!empty($row->image) && file_exists('./image/ruangan/' . $row->image)) : ?>
              <img class="object-cover w-full h-48 md:h-full lg:h-full" src="<?php echo base_url('./image/ruangan/' . $row->image); ?>" alt="Room Image">
            <?php else : ?>
              <img class="object-cover w-full h-48 md:h-full lg:h-full" src="<?php echo base_url('./image/foto.png'); ?>" alt="User Image">
            <?php endif; ?>
          </div>  
          <div class="flex flex-col justify-between p-4 lg:p-6 flex-grow">
            <h5 class="mb-2 text-xl lg:text-2xl font-bold text-gray-900 text-center dark:text-white">
              <?php echo format_ruangan($row->no_ruang); ?>
            </h5>
            <p class="mb-3 font-normal text-lg text-center dark:text-gray-700"><?php echo convRupiah($row->harga); ?></p>
            <p class="mb-3 font-normal text-lg text-center dark:text-gray-700">
              <?php echo format_lantai($row->no_lantai); ?>
            </p>
            <p class="mb-3 font-normal text-gray-700 text-center dark:text-gray-400"><?php echo $row->deskripsi; ?></p>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</body>

</html>
