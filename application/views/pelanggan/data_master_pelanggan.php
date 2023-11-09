<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.15/dist/tailwind.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>
  <script src="https://cdn.jsdelivr.net/npm/heroicons@2.3.0/dist/heroicons.min.js" defer></script>
  
	<!--Replace with your tailwind.css once created-->
<link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css">
<!--Regular Datatables CSS-->
<link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
	<!--Responsive Extension Datatables CSS-->
	<link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet">
  <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

</head>
<body class="bg-gray-200 min-h-screen font-base">
  <div id="app" class="flex flex-col md:flex-row w-full">
    <aside style="background-color: #0C356A;" class="w-full md:w-64 md:min-h-screen" x-data="{ isOpen: true }">
    <div style="background-color: #0C356A;" class="flex items-center justify-between bg-gray-900 p-4 h-16">
      <div class="flex items-center">
       
        <img src="<?php echo base_url('image/logo.png') ?>" alt=""?>
        <!-- <span class="text-gray-300 text-xl font-semibold mx-2"></span> -->
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
  <li class="px-2 py-3 rounded transition duration-200 hover:bg-gradient-to-r hover:from-gray-300 hover:to-blue-500">
    <a href="#" class="flex items-center">
      <i class="fas fa-home mr-2 text-white"></i>
      <span class="mx-2 text-white font-semibold">Dashboard</span>
    </a>
  </li>
  <li class="px-2 py-3 rounded mt-2 transition duration-200 hover:bg-gradient-to-r hover:from-gray-300 hover:to-blue-500">
    <a href="<?php echo base_url('ruang') ?>" class="flex items-center">
      <i class="fa-solid fa-restroom text-white"></i>
      <span class="mx-2 text-white font-semibold">data master ruang</span>
    </a>
  </li>
  <li class="px-2 py-3 rounded mt-2 transition duration-200 hover:bg-gradient-to-r hover:from-gray-300 hover:to-blue-500">
    <a href="<?php echo base_url('pelanggan/data_master_pelanggan') ?>" class="flex items-center">
      <i class="fas fa-users text-white"></i>
      <span class="mx-2 text-white font-semibold">data master pelanggan</span>
    </a>
  </li>
  <li class="px-2 py-3 rounded mt-2 transition duration-200 hover:bg-gradient-to-r hover:from-gray-300 hover:to-blue-500">
    <a href="#" class="flex items-center">
      <i class="fa-solid fa-map-location-dot text-white"></i>
      <span class="mx-2 text-white font-semibold">Peminjaman Tempat</span>
    </a>
  </li>
  <li class="px-2 py-3 rounded mt-2 transition duration-200 hover:bg-gradient-to-r hover:from-gray-300 hover:to-blue-500">
    <a href="<?php echo base_url('pelanggan/tabel_report_sewa') ?>" class="flex items-center">
      <i class="fa-regular fa-folder-open text-white"></i>
      <span class="mx-2 text-white font-semibold">Report Sewa</span>
    </a>
  </li>
  <li class="px-2 py-3 rounded mt-2 baru">
    <!-- <a href="#" class="flex items-center">
    <i class="fa-solid fa-right-from-bracket text-white transition duration-200 hover:bg-gradient-to-r hover:from-cyan-500 hover:to-cyan-500"></i>
      <span class="mx-2 text-gray-300">Keluar</span>
    </a> -->
  </li>
</ul>

    </div>
    </aside>

    <!-- Main Content -->
    <div class="w-full md:flex-1">
      <nav style="background-color: #0C356A;" class="md:flex justify-between items-center bg-white p-4 shadow-md h-16">
        <!-- Konten Navbar di sini -->
        <a href="#" class="flex items-center ml-auto ">
          <i class="fa-solid fa-right-from-bracket text-white"></i>
          <span class="mx-2 text-gray-300 ">Keluar</span>
        </a>
      </nav>
      




    
 
<!-- Data Pelanggan -->
  <!--Container-->
   <!-- Ícono de Notificación y Perfil -->
   
   <div class="container w-full md:w-4/4 xl:w-4/7  mx-auto px-6">
   <div class="flex-2 p-3 w-full">
        <!-- Tambah Pelanggan Button -->
        <a href="tambah_pelanggan" class="bg-blue-500 hover:bg-blue-600 text-white rounded-lg py-2 px-full w-48 ml-auto mb-4 flex items-center justify-center">
            <i class="fas fa-plus-square text-xl mr-3"></i> Tambah 
        </a>
       
       
       <!-- <div class="w-full md:flex-1">
          <div  class="md:flex justify-between items-cente p-4 shadow-md h-16">
            
            <a href="#" class="flex items-center ml-auto ">
              <i class="fa-s"></i>
              <span class="mx-2 text-gray-300 ">Keluar</span>
            </a>
          </div> -->
<!--Card-->
    

    <tbody>
   
  <table id="example" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
            <thead>
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th data-priority="5">No</th>
                    <th data-priority="1">Name</th>
                    <th data-priority="3">Phone</th>
                    <th data-priority="4">Payment Method</th>
                    <th data-priority="2">Action</th>
                </tr>
            </thead>
                        <tbody>
                  <?php
             $no= 0;foreach ($pelanggan as $row  ) :$no++                          
             ?>
                               <tr>
                                <td class="whitespace-nowrap px-4 py-2 text-gray-700"><?php echo $no ?></td>
                                <td class="whitespace-nowrap px-4 py-2 text-gray-700"><?php echo $row->nama ?></td>
                                <td class="whitespace-nowrap px-4 py-2 text-gray-700"><?php echo $row->phone ?></td>
                                <td class="whitespace-nowrap px-4 py-2 text-gray-700"><?php echo $row->payment_method ?>                                 </td>
                                <td class="whitespace-nowrap px-4 py-2 text-gray-700">
                                  <!-- Update Data -->
                                  <button  class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-3 rounded" onclick="update(<?php echo $row->id ?>)"><span class="pe-2">
                                  <i class="fa-solid fa-pen-to-square"></i>
                                                </span>
                                                Ubah</button>
                                  
                                  <!-- Hapus Data -->
                                 <button onclick="hapus(<?php echo $row->id ?>)"  class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-3 rounded ml-3">
                                                <span class="pe-2">
                                                    <i class="fas fa-trash-alt"></i>
                                                </span>
                                                Hapus</button>
                                    

                                </td>

                             </td>
                          </tr><?php endforeach ?>
                            
                            </table>
                        </form>
                          </tbody>
                          </table>
            </div>
        </div>           
        </tr>
<!-- jQuery -->
<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

<!--Datatables -->
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
<script>
$(document).ready(function() {

var table = $('#example').DataTable({
    responsive: true
  })
  .columns.adjust()
  .responsive.recalc();
});
</script>

<!-- Script para las gráficas -->
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

<script src="path-to-sweetalert2.js"></script>

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


<!-- Script para las gráficas -->
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


<!-- SweetAlert -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
<script>
    function update(id) {
swal.fire({
    title: 'Ingin Mengubah Data Pelanggan',
    text: " ",
    icon: 'question',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    cancelButtonText: 'Batal',
    confirmButtonText: 'Ya Ubah'
}).then((result) => {
    if (result.isConfirmed) {
        Swal.fire({
            icon: 'Waitt',
            title: 'Loading ... ',
            showConfirmButton: false,
            timer: 1500,

        }).then(function() {
            window.location.href = "<?php echo base_url('pelanggan/update_data/')?>" + id;
        });
    }
});
}

    function hapus(id) {
swal.fire({
    title: ' Yakin Ingin Menghapus Data Pelanggan',
    text: "",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    cancelButtonText: 'Batal',
    confirmButtonText: 'Hapus Data Pelanggan'
}).then((result) => {
    if (result.isConfirmed) {
        Swal.fire({
            icon: 'success',
            title: 'Berhasil Menghapus',
            showConfirmButton: false,
            timer: 1500,

        }).then(function() {
            window.location.href = "<?php echo base_url('pelanggan/hapus_data_pelanggan/')?>" + id;
        });
    }
});
}
function displaySweetAlert() {
const message = "<?php echo $this->session->flashdata('sukses'); ?>";
const error = "<?php echo $this->session->flashdata('error'); ?>";

if (message) {
    Swal.fire({
        title: 'Success!',
        text: message,
        icon: 'success',
        confirmButtonText: 'OK'
    });
} else if (error) {
    Swal.fire({
        title: 'Error!',
        text: error,
        icon: 'error',
        confirmButtonText: 'OK'
    });
}
}

// Call the function when the page loads
window.onload = displaySweetAlert;
</script> 
</body>
</html>