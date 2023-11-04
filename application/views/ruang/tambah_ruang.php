<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sewa Ruang</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Lato:wght@100;400;700&display=swap');
    </style>
</head>

<body class="bg-blue-100 font-lato text-gray-700">
    <div class="flex flex-col h-screen">

        <!-- Barra de navegación superior -->
        <div style="background-color: #0C356A;" class="bg-white text-white shadow w-full p-2 flex items-center justify-between">
            <div class="flex items-center">
                <div class="flex items-center">
                    <img src="https://www.emprenderconactitud.com/img/POC%20WCS%20(1).png" alt="Logo" class="w-28 h-18 mr-2">
                    <h2 class="font-bold text-xl"></h2>
                </div>
                <div class="md:hidden flex items-center">
                    <button id="menuBtn">
                        <i class="fas fa-bars text-gray-500 text-lg"></i>
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
                        <i class="fa-solid fa-restroom"></i> Data Master Ruangan
                    </a>
                    <a class="block text-white py-2.5 px-4 my-4 rounded transition duration-200 hover:bg-gradient-to-r hover:from-cyan-500 hover:to-cyan-500 hover:text-white" href="#">
                        <i class="fas fa-users"></i> Data Master Pelanggan
                    </a>
                    <a class="block text-white py-2.5 px-4 my-4 rounded transition duration-200 hover:bg-gradient-to-r hover:from-cyan-500 hover:to-cyan-500 hover:text-white" href="#">
                        <i class="fa-solid fa-map-location-dot"></i> Peminjaman Tempat
                    </a>
                    <a class="block text-white py-2.5 px-4 my-4 rounded transition duration-200 hover:bg-gradient-to-r hover:from-cyan-500 hover:to-cyan-500 hover:text-white" href="#">
                        <i class="fa-regular fa-folder-open"></i> Report Sewa
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
            </div>
            <!-- Área de contenido principal -->
            <div class="flex-1 p-4 w-full md:w-1/2">
                <div class="relative max-w-md w-full">
                </div>

                <!-- Konten halaman Anda di sini -->
                <main>
                    <div class="container">
                        <header style="width: 60%; margin-left: 20%; margin-top: 5%" class="bg-white p-4 rounded-lg shadow-md">
                            <div class="bg-blue-500 h-4 rounded-t-lg"></div>
                            <h1 class="text-3xl mt-2 font-bold">Tambah Data Master</h1>
                        </header>

                        <form style="width: 60%; margin-left: 20%;"  action="<?php echo base_url('ruang/akis_tambah_ruangan') ?>" method="post" class="mt-4 p-4 bg-white rounded-lg shadow-md">
                            <div class="mb-4">
                                <label style="padding-top: 5%; font-size: 15px" for="no_lantai" class="block text-xl">Nomor Lantai</label>
                                <input type="number" name="no_lantai" id="no_lantai" class="w-full py-2 px-3 border-b-2 border-blue-500 text-xl focus:outline-none focus:border-blue-700">
                            </div>

                            <div class="mb-4">
                                <label style="padding-top: 5%; font-size: 15px" for="no_ruang" class="block text-xl">Nomor Ruangan</label>
                                <input type="number" name="no_ruang" id="no_ruang" class="w-full py-2 px-3 border-b-2 border-blue-500 text-xl focus:outline-none focus:border-blue-700">
                            </div>

                            <input type="submit" id="submit" class="block w-64 mx-auto py-2 px-4 text-2xl font-semibold text-white bg-blue-500 border-2 border-blue-500 rounded-full hover:bg-transparent hover:text-blue-500 hover:border-blue-500 transition duration-300 cursor-pointer mt-8" value="Tambah">
                        </form>
                    </div>
                </main>
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
            </div>
        </div>
    </div>
</body>

</html>