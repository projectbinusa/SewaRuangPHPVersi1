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
                <a class="nav-link" href="#">
                    <i class="bi bi-box-arrow-left"></i> Logout
                </a>
            
        </div>
    </nav>
    <div class="h-screen flex-grow-1 overflow-y-lg-auto">
        <header class="bg-surface-primary border-bottom pt-6">
            <div class="container-fluid">
                <div class="mb-npx">
                    <div class="row align-items-center">
                        <div class="col-sm-6 col-12 shadow-lg p-3 mb-5 rounded" style="width: 100%;">
                            <h1 class="h2 mb-0 ls-tight">Sewa Ruang.com</h1>
                        </div>
                        <div class="col-sm-6 col-12 text-sm-end" style="margin-left:50%">
                            <div class="mx-n1">
                                <a href="<?php echo base_url('ruang/tambah_ruang') ?>" class="btn d-inline-flex btn-sm btn-primary mx-1">
                                    <span class=" pe-2">
                                        <i class="bi bi-plus"></i>
                                    </span>
                                    <span>Tambah Ruang</span>
                                </a>
                            </div>
                        </div>
                        <div class="container">
                          <div class="d-lg-flex">
                            <div class="card border-0 me-lg-4 mb-lg-0 mb-4"> 
                              <div class="backgroundEffect">
                              <div class="card-header" style="background: #F5F5F5;">
                                   <b>Ruang 09</b>
                                </div>
                              </div> 
                              <div class="pic"> 
                                <!-- <img class="" src="https://ifcjakarta.co.id/blog/uploads/berita/20230816153735_bg_ruang_meeting_kantor_(1).jpg" style="width: 80%; heigth: 65%; margin-left:10%; padding: 2%;"> -->
                                <img src="<?php echo base_url() ?>image/master_ruangan/ruang3.jpeg" style="width: 80%; heigth: 65%; margin-left:10%; padding: 2%;">
                                 <div class="date"> 
                                   <h3 class="year">Lantai No.10</h3>
                                 </div> 
                                </div> 
                                <div class="content"> 
                                  <div class="d-flex align-items-center justify-content-between mt-3 pb-3"> 
                                    <div class="btn btn-primary">Detail Ruang</span>
                                  </div> 
                                    </div> 
                                  </div> 
                                </div> 
                                <div class="card border-0 me-lg-4 mb-lg-0 mb-4"> 
                                  <div class="backgroundEffect">
                                    <div class="card-header" style="background: #F5F5F5;"> 
                                      <b>Ruang VIP</b>
                                    </div>
                                  </div> 
                                  <div class="pic"> 
                                    <!-- <img class="" src="https://s3-ap-southeast-1.amazonaws.com/xwork-gallery/rooms/images/356/1524046431.24/356_1524046431.24.lg.JPEG" style="width: 85%; heigth: 65%; margin-left:8%; padding: 2%;">  -->
                                    <img src="<?php echo base_url() ?>image/master_ruangan/ruang2.jpeg" style="width: 85%; heigth: 65%; margin-left:8%; padding: 2%;">
                                    <div class="date"> 
                                      <h3 class="year">Lantai No.05</h3> 
                                    </div> 
                                  </div> 
                                  <div class="content"> 
                                    <div class="d-flex align-items-center justify-content-between mt-3 pb-3"> 
                                      <div class="btn btn-primary">Detail Ruang</span>
                                    </div> 
                                    </div> 
                                  </div> 
                                </div> 
                                <div class="card border-0 mb-lg-0 mb-4"> 
                                  <div class="backgroundEffect">
                                    <div class="card-header" style="background: #F5F5F5;">
                                      <b>Ruang 15</b>
                                    </div>
                                  </div> 
                                  <div class="pic"> 
                                    <!-- <img class="" src="https://s3-ap-southeast-1.amazonaws.com/xwork-gallery/rooms/images/893/1576572743.06/893_1576572743.06.lg.JPEG" style="width: 88%; heigth: 75%; margin-left:5%; padding: 2%;">  -->
                                    <img src="<?php echo base_url() ?>image/master_ruangan/ruang1.jpeg" style="width: 88%; heigth: 75%; margin-left:5%; padding: 2%;">
                                    <div class="date"> 
                                      <h3 class="year">Lantai No.06</h3> 
                                    </div> 
                                  </div> 
                                  <div class="content"> 
                                     <div class="d-flex align-items-center justify-content-between mt-3 pb-3"> 
                                      <div class="btn btn-primary">Detail Ruang</span>
                                    </div> 
                                    </div> 
                                  </div> 
                                </div> 
                              </div> 
                            </div>
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