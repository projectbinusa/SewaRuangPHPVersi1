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

<body>
<?php $this->load->view('sidebar'); ?>
      <!-- Área de contenido principal -->
      <div class="p-8 w-full md:w-5/6 lg:w-3/4 xl:w-1/2 flex justify-center items-center">
        <div class="w-full mx-auto">

          <!-- Konten halaman Anda di sini -->
          <!-- <div class="container mx-auto px-4 py-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
              <?php foreach ($ruang as $row) : ?>
                <div class="bg-gray-200 p-8">
                  <img src="<?php echo base_url('./image/ruangan/tambah_ruangan/' . $row->image); ?>" alt="">
                  <div class="p-4">
                    <h2 class="text-3xl font-bold">R. <?php echo $row->no_ruang; ?></h2>
                    <p class="text-gray-700 text-lg">Lantai <?php echo $row->no_lantai; ?></p>
                  </div>
                </div>
              <?php endforeach; ?>
            </div>
          </div> -->  
          <?php foreach ($ruang as $row) : ?>
  <div class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow-lg md:flex-row md:max-w-4xl hover:bg-blue-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
    <img class="object-cover w-full h-80 md:w-96 md:rounded-none md:rounded-l-lg" src="<?php echo base_url('./image/ruangan/tambah_ruangan/' . $row->image); ?>" alt="">
    <div class="flex flex-col justify-between p-4 leading-normal">
      <h5 class="mb-2 text-3xl text-center font-bold tracking-tight text-gray-900 dark:text-white">R. <?php echo $row->no_ruang; ?></h5>
      <p class="mb-3 font-normal text-3xl dark:text-gray-700">Lantai <?php echo $row->no_lantai; ?></p>
      <p class="mb-3 font-normal text-gray-700 dark:text-gray-400"><?php echo $row->deskripsi; ?></p>
    </div>
  </div>
<?php endforeach; ?>
    </div>
  </div>
  <script>
    // Gráfica de Usuarios
    var usersChart = new Chart(document.getElementById('usersChart'), {
      type: 'doughnut',
      data: {
        labels: ['Nuevos', 'Registrados'],
        datasets: [{
          data: [30, 65],
          backgroundColor: ['#00F0FF', '#8B8B8D'],
        }]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        legend: {
          position: 'bottom' // Ubicar la leyenda debajo del círculo
        }
      }
    });

    // Gráfica de Comercios
    var commercesChart = new Chart(document.getElementById('commercesChart'), {
      type: 'doughnut',
      data: {
        labels: ['Nuevos', 'Registrados'],
        datasets: [{
          data: [60, 40],
          backgroundColor: ['#FEC500', '#8B8B8D'],
        }]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        legend: {
          position: 'bottom' // Ubicar la leyenda debajo del círculo
        }
      }
    });
  </script>

  <script>
    const menuBtn = document.getElementById('menuBtn');
    const closeBtn = document.getElementById('closeBtn');
    const sideNav = document.getElementById('sideNav');

    menuBtn.addEventListener('click', () => {
      sideNav.classList.remove('hidden');
    });

    closeBtn.addEventListener('click', () => {
      sideNav.classList.add('hidden');
    });
  </script>
</body>

</html>