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
      <div class="min-h-screen overflow-hidden flex items-center justify-center">
  <div class="w-full sm:w-full md:w-full lg:w-2/3 xl:w-1/2">
    <!-- Konten halaman Anda di sini -->
    <?php foreach ($ruang as $row) : ?>
      <div class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow-lg md:flex-row md:max-w-2xl dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-blue-700">
        <div class="w-72 h-72 md:w-72 md:h-72 md:rounded-none md:rounded-l-lg lg:w-92 lg:h-72">
          <img class="object-cover w-full h-full lg:max-w-full" src="<?php echo base_url('./image/ruangan/tambah_ruangan/' . $row->image); ?>" alt="">
        </div>
        <div class="flex flex-col justify-between p-10 leading-normal">
          <h5 class="mb-2 text-3xl text-center font-bold tracking-tight text-gray-900 dark:text-white">R. <?php echo $row->no_ruang; ?></h5>
          <p class="mb-3 font-normal text-xl text-center dark:text-gray-700">Lantai <?php echo $row->no_lantai; ?></p>
          <p class="mb-3 font-normal text-gray-700 text-center dark:text-gray-400"><?php echo $row->deskripsi; ?></p>
          <hr class="my-3 border-t border-gray-300 text-center dark:border-gray-700">
          <p class="mb-3 font-normal text-gray-700 text-center dark:text-gray-400">*Kunjungi situs kami <a href="https://github.com/BinusaProject/ExcSewaRuang">sewaruang@gmail.com</a></p>
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