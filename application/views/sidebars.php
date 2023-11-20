<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sewa Ruang</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.15/dist/tailwind.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>
  <script src="https://cdn.jsdelivr.net/npm/heroicons@2.3.0/dist/heroicons.min.js" defer></script>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@12.11.5/dist/sweetalert2.min.css">
</head>
<style>
  /* Default styles */
  li:hover span,
  li.active span {
      color: black; /* Warna teks ketika dihover atau ditekan */
  }
  li:hover i,
  li.active i {
      color: black; /* Warna ikon ketika dihover atau ditekan */
  }
</style>

<body class="bg-white min-h-screen font-base">

  <div id="app" class="flex flex-col md:flex-row w-full">
    <aside style="background-color: #0C356A;" class="w-full md:w-64 md:min-h-screen bg-blue-900 text-white" x-data="{ isOpen: true }">
      <div style="background-color: #0C356A;" class="flex items-center justify-between bg-gray-900 p-4 h-16">
        <div class="flex items-center">
          <img src="<?php echo base_url('image/logo.png') ?>" class="w-30 mt-5">
          <!-- <span class="text-gray-300 text-xl font-medium mx-2"></span> -->
        </div>
        <div class="flex md:hidden">
          <button type="button" @click="isOpen = !isOpen" class="text-gray-300 hover:text-gray-500 focus:outline-none focus:text-gray-500">
            <svg class="fill-current w-8" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
              <path d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
          </button>
        </div>
      </div>
      <div class="px-2 py-6" :class="{ 'hidden': !isOpen, 'block': isOpen }">
        <ul>
          <li class="px-2 py-3 rounded transition duration-200 hover:bg-gradient-to-r hover:from-gray-300 hover:to-blue-500" @click="isOpen = !isOpen" :class="{ 'active': isOpen }">
            <a href="<?php echo base_url('supervisor') ?>" class="flex items-center">
              <i class="fas fa-home mr-2 text-white hover:text-black "></i>
              <span class="mx-2 text-white hover:text-black font-semibold">Dashboard</span>
            </a>
          </li>
          <li class="px-2 py-3 rounded mt-2 transition duration-200 hover:bg-gradient-to-r hover:from-gray-300 hover:to-blue-500" @click="isOpen = !isOpen" :class="{ 'active': isOpen }">
            <a href="<?php echo base_url('supervisor/data_operator') ?>" class="flex items-center">
              <i class="fa-solid fa-restroom text-white hover:text-black"></i>
              <span class="mx-2 text-white hover:text-black font-semibold">Data Operator</span>
            </a>
          </li>
          <li class="px-2 py-3 rounded mt-2 transition duration-200 hover:bg-gradient-to-r hover:from-gray-300 hover:to-blue-500" @click="isOpen = !isOpen" :class="{ 'active': isOpen }">
            <a href="<?php echo base_url('supervisor/approve') ?>" class="flex items-center">
              <i class="fas fa-users text-white hover:text-black"></i>
              <span class="mx-2 text-white hover:text-black font-semibold">Approve</span>
            </a>
          </li>
        </ul>
      </div>
    </aside>

    <!-- Main Content -->
    <div class="w-full md:flex-1">
      <nav style="background-color: #0C356A;" class="md:flex justify-between items-center p-4 shadow-md h-16">
        <ul class="px-2 py-3 rounded mt-2 transition duration-200 hover:bg-gradient-to-r hover:from-gray-300 hover:to-blue-500 ml-auto">
          <ul>
            <a href="http://localhost/exc_sewa_ruang/" class="flex items-center ml-auto ">
              <i class="fa-solid fa-right-from-bracket text-white hover:"></i>
              <span class="mx-2 text-white font-semibold">Keluar</span>
            </a>
          </ul>
        </ul>
      </nav>


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

        // Agregar lógica para mostrar/ocultar la navegación lateral al hacer clic en el ícono de menú
        const menuBtn = document.getElementById('menuBtn');
        const sideNav = document.getElementById('sideNav');

        menuBtn.addEventListener('click', () => {
          sideNav.classList.toggle('hidden'); // Agrega o quita la clase 'hidden' para mostrar u ocultar la navegación lateral
        });
      </script>
</body>

</html>