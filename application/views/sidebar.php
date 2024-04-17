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
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">
</head>

<body class="bg-white min-h-screen font-base items-center">
  <div id="app" class="flex flex-col md:flex-row w-full">
    <aside style="background-color: #0C356A;" class="w-full md:w-64 md:min-h-screen bg-blue-900 text-white" x-data="{ isOpen: window.innerWidth >= 768 }" @resize.window="isOpen = window.innerWidth >= 768">
      <div style="background-color: #0C356A;" class="flex items-center justify-between bg-gray-900 p-4 h-16">
        <div class="flex items-center">
          <img src="<?php echo base_url('image/logo.png') ?>" class="mt-2 w-32 md:w-40">
        </div>
        <div class="flex md:hidden">
          <button type="button" @click="isOpen = !isOpen" class="text-gray-300 hover:text-gray-500 focus:outline-none focus:text-gray-500">
            <svg class="fill-current w-8" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
              <path d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
          </button>
        </div>
      </div>
      <div class="px-2 py-6 items-center" :class="{ 'hidden': !isOpen, 'block': isOpen }" x-show="isOpen">
        <ul>
          <!-- Your existing sidebar content here -->
          <li class="px-2 py-3 rounded mt-2 transition duration-200 hover:bg-gradient-to-r hover:from-gray-300 hover:to-blue-500">
            <a href="<?php echo base_url('operator') ?>" class="flex items-center">
              <i class="fas fa-home text-white "></i>
              <span class="mx-2 text-white font-semibold m-0">Dashboard</span>
            </a>
          </li>
          <li class="px-2 py-3 rounded mt-2 transition duration-200 hover:bg-gradient-to-r hover:from-gray-300 hover:to-blue-500">
            <a href="<?php echo base_url('operator/data_ruangan') ?>" class="flex items-center">
              <i class="fa-solid fa-building-circle-check text-white"></i>
              <span class="mx-2 text-white font-semibold">Data Ruang</span>
            </a>
          </li>
          <li class="px-2 py-3 rounded mt-2 transition duration-200 hover:bg-gradient-to-r hover:from-gray-300 hover:to-blue-500">
            <a href="<?php echo base_url('operator/data_master_pelanggan') ?>" class="flex items-center">
              <i class="fas fa-users text-white"></i>
              <span class="mx-2 text-white font-semibold">Data Pelanggan</span>
            </a>
          </li>
          <li class="px-2 py-3 rounded mt-2 transition duration-200 hover:bg-gradient-to-r hover:from-gray-300 hover:to-blue-500">
            <a href="<?php echo base_url('operator/tambahan') ?>" class="flex items-center">
              <i class="fas fa-qrcode text-white"></i>
              <span class="mx-2.5 text-white font-semibold">Menu Tambahan</span>
            </a>
          </li>
          <li class="px-2 py-3 rounded mt-2 transition duration-200 hover:bg-gradient-to-r hover:from-gray-300 hover:to-blue-500">
            <a href="<?php echo base_url('operator/peminjaman_tempat') ?>" class="flex items-center">
              <i class="fa-solid fa-map-location-dot text-white"></i>
              <span class="mx-2 text-white font-semibold">Peminjaman Tempat</span>
            </a>
          </li>
          <li class="px-2 py-3 rounded mt-2 transition duration-200 hover:bg-gradient-to-r hover:from-gray-300 hover:to-blue-500">
            <a href="<?php echo base_url('operator/report_sewa') ?>" class="flex items-center">
              <i class="fa-regular fa-folder-open text-white"></i>
              <span class="mx-2 text-white font-semibold">Report Sewa</span>
            </a>
          </li>

          <li class="px-1 py-1 rounded mt-2 transition duration-200 hover:bg-gradient-to-r hover:from-gray-300 hover:to-blue-500 md:hidden">
            <hr>
            <a onclick="KeluarOPT()" class="flex items-center pt-4">
              <i class="fa-solid fa-right-from-bracket text-white mt-0"></i>
              <span class="text-white font-semibold mx-2 mb-0">Keluar</span>
            </a>
          </li>
        </ul>
      </div>
    </aside>
    <!-- Main Content -->
    <div class="w-full md:flex-1">
      <nav style="background-color: #0C356A;" class="hidden md:flex justify-between items-center p-0 shadow-md h-16">
        <ul class="px-1 py-1 rounded mt-0 transition duration-200 hover:bg-gradient-to-r hover:from-gray-300 hover:to-blue-500 text-center ml-auto">
          <a onclick="KeluarOPT()" class="flex items-center">
            <i class="fa-solid fa-right-from-bracket text-white mt-0"></i>
            <span class="text-white font-semibold mx-2 mb-0">Keluar</span>
          </a>
        </ul>
      </nav>

      <script>
        function displaySweetAlert() {
          const login_supervisor = "<?php echo $this->session->flashdata('login_supervisor'); ?>";

          if (login_supervisor) {
            Swal.fire({
              title: 'Login Berhasil',
              text: login_supervisor,
              icon: 'success',
              showConfirmButton: false, // Untuk menghilangkan tombol OK
              timer: 2500 // Tambahkan timer di sini (dalam milidetik)
            });
          }
        }

        function KeluarOPT(id) {
          const success_keluar = "<?php echo $this->session->flashdata('success_keluar'); ?>";
          Swal.fire({
            title: 'Yakin Ingin Keluar',
            text: "",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Batal',
            confirmButtonText: 'Keluar'
          }).then((result) => {
            if (result.isConfirmed) {
              // Redirect to logout controller/action
              window.location.href = 'http://localhost/SewaRuangPHPVersi1/'; // Change this to your logout URL
            }
          });
        }

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
        // Menutup sidebar ketika lebar layar kurang dari 768px
        window.addEventListener('resize', () => {
          const windowWidth = window.innerWidth;
          const isMobile = windowWidth < 768;

          if (isMobile) {
            document.querySelector('[x-data="{ isOpen: true }"]').__x.$data.isOpen = false;
          } else {
            document.querySelector('[x-data="{ isOpen: true }"]').__x.$data.isOpen = true;
          }
        });
      </script>
</body>

</html>