<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Master Ruangan</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<style>
  nav a:hover{
    background: #4F709C;
    border-radius: 25px;
    padding:5px
}
nav{
    width: 100%;
    background: white;
    overflow: auto;
}
.card-header {
  margin-bottom: 20px;
  text-align:center;
}
.card-title{
  text-align: center;
}
.centered-buttons {
        display: flex;
        justify-content: center;
        margin-top: 15px;
        gap: 5px;
    }
.card-text{
  margin-left: 40%;
}
</style>
<body>
<?php $this->load->view('sidebar'); ?>
<div class="row row-cols-1 row-cols-md-3 g-4" style="padding:5px">
  <div class="col">
    <div class="card">
      <div class="card-header">Ruang 01</div>
              <!-- <img src="<?php echo  base_url('./image/master_ruangan/ruang1.png') ?>" height="150" width="150" class="rounded-circle"> -->
                  <img src="https://multipowerabadi.co.id/wp-content/uploads/2021/11/rr2-ruang-rapat-dengan-nuansa-yang-santai-menggunakan-sofa.png" style="width: 60%; margin-left: 18%; border-radius:">
      <div class="card-body">
        <h5 class="card-title">Ruang 1</h5>
        <p class="card-text">Avaible</p>
        <div class="centered-buttons">
                <button class="btn btn-primary">Detail Ruang</button>
                <button class="btn btn-info">Sewa</button>
            </div>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card">
      <div class="card-header">Ruang 02</div>
      <!-- <img src="<?php echo  base_url('./image/master_ruangan/ruang1.png') ?>" height="150" width="150" class="rounded-circle"> -->
      <img src="https://multipowerabadi.co.id/wp-content/uploads/2021/11/rr2-ruang-rapat-dengan-nuansa-yang-santai-menggunakan-sofa.png" style="width: 60%; margin-left: 18%; border-radius:">
      <div class="card-body">
        <h5 class="card-title">Ruang 2</h5>
        <p class="card-text">Avaible</p>
        <div class="centered-buttons">
                <button class="btn btn-primary">Detail Ruang</button>
                <button class="btn btn-info">Sewa</button>
            </div>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card">
      <div class="card-header">Ruang 03</div>
      <!-- <img src="<?php echo  base_url('./image/master_ruangan/ruang1.png') ?>" height="150" width="150" class="rounded-circle"> -->
      <img src="https://multipowerabadi.co.id/wp-content/uploads/2021/11/rr2-ruang-rapat-dengan-nuansa-yang-santai-menggunakan-sofa.png" style="width: 60%; margin-left: 18%; border-radius:">
      <div class="card-body">
        <h5 class="card-title">Ruang 3</h5>
        <p class="card-text">Avaible</p>
        <div class="centered-buttons">
                <button class="btn btn-primary">Detail Ruang</button>
                <button class="btn btn-info">Sewa</button>
            </div>
      </div>
    </div>
  </div>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
<div class="flex flex-col h-screen bg-gray-100">

    <!-- Barra de navegación superior -->
    <div style="background-color: #0C356A;" class="bg-white text-white shadow w-full p-2 flex items-center justify-between">
        <div class="flex items-center">
            <div class="flex items-center"> <!-- Mostrado en todos los dispositivos -->
                <img src="https://www.emprenderconactitud.com/img/POC%20WCS%20(1).png" alt="Logo" class="w-28 h-18 mr-2">
                <h2 class="font-bold text-xl"></h2>
            </div>
            <div class="md:hidden flex items-center"> <!-- Se muestra solo en dispositivos pequeños -->
                <button id="menuBtn">
                    <i class="fas fa-bars text-gray-500 text-lg"></i> <!-- Ícono de menú -->
                </button>
            </div>
        </div>

        <!-- Ícono de Notificación y Perfil -->
        <div class="space-x-5">
            <a href="ruang/tambah_ruang">
            <i class="fas fa-plus-square text-white-500 text-3xl"></i>
        </a>
        </div>
    </div>

    <!-- Contenido principal -->
    <div class="flex-1 flex flex-wrap">
        <!-- Barra lateral de navegación (oculta en dispositivos pequeños) -->
        <div style="background-color: #0C356A;" class="p-2 w-full md:w-60 flex flex-col md:flex hidden" id="sideNav">
            <nav>
                <a class="block text-white py-2.5 px-4 my-4 rounded transition duration-200 hover:bg-gradient-to-r hover:from-cyan-500 hover:to-cyan-500 hover:text-white" href="#">
                    <i class="fas fa-home mr-2"></i>Beranda
                </a>
                <a class="block text-white py-2.5 px-4 my-4 rounded transition duration-200 hover:bg-gradient-to-r hover:from-cyan-500 hover:to-cyan-500 hover:text-white" href="#">
                    <i class="fas fa-file-alt mr-2"></i>Autorisasi
                </a>
                <a class="block text-white py-2.5 px-4 my-4 rounded transition duration-200 hover:bg-gradient-to-r hover:from-cyan-500 hover:to-cyan-500 hover:text-white" href="#">
                    <i class="fas fa-users mr-2"></i>Pengguna
                </a>
                <a class="block text-white py-2.5 px-4 my-4 rounded transition duration-200 hover:bg-gradient-to-r hover:from-cyan-500 hover:to-cyan-500 hover:text-white" href="#">
                    <i class="fas fa-store mr-2"></i>Perusahaan
                </a>
                <a class="block text-white py-2.5 px-4 my-4 rounded transition duration-200 hover:bg-gradient-to-r hover:from-cyan-500 hover:to-cyan-500 hover:text-white" href="#">
                    <i class="fas fa-exchange-alt mr-2"></i>Transaksi
                </a>
            </nav>

            <!-- Item untuk menutup sidebar -->
            <a class="block text-white py-2.5 px-4 my-2 rounded transition duration-200 hover:bg-gradient-to-r hover:from-cyan-500 hover:to-cyan-500 hover:text-white" id="closeBtn">
                <i class="fas fa-times mr-2"></i>Tutup
            </a>

            <!-- Penanda lokasi -->
            <div class="bg-gradient-to-r from-cyan-300 to-cyan-500 h-px mt-2"></div>

            <!-- logout -->
            <a class="block text-white py-2.5 px-4 my-2 rounded transition duration-200 hover:bg-gradient-to-r hover:from-cyan-500 hover:to-cyan-500 hover:text-white mt-auto" href="#">
                <i class="fas fa-sign-out-alt mr-2"></i>Keluar
            </a>

            <!-- Hak cipta di bagian bawah navigasi lateral -->
        </div>
        <!-- Área de contenido principal -->
        <div class="flex-1 p-4 w-full md:w-1/2">
            <!-- Campo de búsqueda -->
            <div class="relative max-w-md w-full">
                <div class="absolute top-1 left-2 inline-flex items-center p-2">
                    <i class="fas fa-search text-gray-400"></i>
                </div>
           
            </div>

          <!-- Konten halaman Anda di sini -->
        <div class="flex flex-wrap justify-center">
            <!-- Card 1 -->
            <div
              class="max-w-xs m-4 bg-white rounded-xl shadow-lg transform transition duration-500 hover:scale-105 hover:shadow-2xl"
            >
              <div>
                <h1
                  class="text-2xl mt-2 ml-4 font-bold text-gray-800 cursor-pointer hover:text-gray-900 transition duration-100"
                >
                  Ruang 1
                </h1>
                <p
                  class="ml-4 mt-1 mb-2 text-gray-700 hover:underline cursor-pointer"
                >
                  Lantai 01
                </p>
              </div>
              <img
                class="w-full cursor-pointer"
                src="https://www.emporiointerior.com/upload/blog/inspirasi-desain-interior-ruang-rapat-meeting-room-mewah-pada-rumah-bapak-dian-di-tegal-jawa-tengah-20042102141455639.jpg"
                alt=""
              />
              <div class="flex p-4 justify-between">
                <div class="flex items-center space-x-2">
                  <img
                    class="w-10 rounded-full"
                    src="https://e7.pngegg.com/pngimages/178/595/png-clipart-user-profile-computer-icons-login-user-avatars-monochrome-black-thumbnail.png"
                    alt="sara"
                  />
                  <h2 class="text-gray-800 font-bold cursor-pointer">Nama</h2>
                </div>
                <div class="flex space-x-2">
                  <span
                    class="text-white text-xs font-bold rounded-lg bg-blue-500 inline-block mt-4 ml-4 py-1.5 px-4 cursor-pointer"
                    >Detail</span
                  >
                </div>
              </div>
            </div>
  
            <!-- Card 2 -->
            <div
              class="max-w-xs m-4 bg-white rounded-xl shadow-lg transform transition duration-500 hover:scale-105 hover:shadow-2xl"
            >
              <div>
                <h1
                  class="text-2xl mt-2 ml-4 font-bold text-gray-800 cursor-pointer hover:text-gray-900 transition duration-100"
                >
                  Ruang 2
                </h1>
                <p
                  class="ml-4 mt-1 mb-2 text-gray-700 hover:underline cursor-pointer"
                >
                  Lantai 02
                </p>
              </div>
              <img
                class="w-full cursor-pointer"
                src="https://arsindociptakarya.com/wp-content/uploads/2020/03/interior_ruangrapat.jpg"
                alt=""
              />
              <div class="flex p-4 justify-between">
                <div class="flex items-center space-x-2">
                  <img
                    class="w-10 rounded-full"
                    src="https://e7.pngegg.com/pngimages/178/595/png-clipart-user-profile-computer-icons-login-user-avatars-monochrome-black-thumbnail.png"
                    alt="sara"
                  />
                  <h2 class="text-gray-800 font-bold cursor-pointer">Nama</h2>
                </div>
                <div class="flex space-x-2">
                  <span
                    class="text-white text-xs font-bold rounded-lg bg-blue-500 inline-block mt-4 ml-4 py-1.5 px-4 cursor-pointer"
                    >Detail</span
                  >
                </div>
              </div>
            </div>
            <!-- Card 3 -->
            <div
              class="max-w-xs m-4 bg-white rounded-xl shadow-lg transform transition duration-500 hover:scale-105 hover:shadow-2xl"
            >
              <div>
                <h1
                  class="text-2xl mt-2 ml-4 font-bold text-gray-800 cursor-pointer hover:text-gray-900 transition duration-100"
                >
                  Ruang 1
                </h1>
                <p
                  class="ml-4 mt-1 mb-2 text-gray-700 hover:underline cursor-pointer"
                >
                  Lantai 01
                </p>
              </div>
              <img
                class="w-full cursor-pointer"
                src="https://i.pinimg.com/originals/9d/8b/f9/9d8bf920bc4686f0c99ae1f7f46c4b93.jpg"
                alt=""
              />
              <div class="flex p-4 justify-between">
                <div class="flex items-center space-x-2">
                  <img
                    class="w-10 rounded-full"
                    src="https://e7.pngegg.com/pngimages/178/595/png-clipart-user-profile-computer-icons-login-user-avatars-monochrome-black-thumbnail.png"
                    alt="sara"
                  />
                  <h2 class="text-gray-800 font-bold cursor-pointer">Nama</h2>
                </div>
                <div class="flex space-x-2">
                  <span
                    class="text-white text-xs font-bold rounded-lg bg-blue-500 inline-block mt-4 ml-4 py-1.5 px-4 cursor-pointer"
                    >Detail</span
                  >
                </div>
              </div>
            </div>
          </div>

           
        </div>
    </div>
</div>

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