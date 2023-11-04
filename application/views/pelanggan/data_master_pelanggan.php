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
              
            </div>
            <div class="md:hidden flex items-center"> <!-- Se muestra solo en dispositivos pequeños -->
                <button id="menuBtn">
                    <i class="fas fa-bars text-gray-500 text-lg"></i> <!-- Ícono de menú -->
                </button>
            </div>
        </div>

        <!-- Ícono de Notificación y Perfil -->
        <div class="space-x-5">
            <a href="tambah_pelanggan">
            <i class="fas fa-plus-square text-black text-3xl"></i>
        </a>
        </div>
    </div>

    <!-- Contenido principal -->
    <div class="flex-1 flex flex-wrap">
        <!-- Barra lateral de navegación (oculta en dispositivos pequeños) -->
        <div style="background-color: #0C356A;" class="p-2 w-full md:w-60 flex flex-col md:flex " id="sideNav">
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
          <section class="py-1 bg-blueGray-50">
<div class="w-full xl:w-8/15 mb-12 xl:mb-0 px-4 mx-auto mt-24">
  <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded ">
    <div class="rounded-t mb-0 px-4 py-3 border-0">
      <div class="flex flex-wrap items-center">
        <div class="relative w-full px-4 max-w-full flex-grow flex-1">
          <h3 class="font-semibold text-base text-blueGray-700">DATA MASTER PELANGGAN</h3>
        </div>

        <!-- <div class="relative w-full px-4 max-w-full flex-grow flex-1 text-right">
          <button class="bg-indigo-500 text-white active:bg-indigo-600 text-xs font-bold uppercase px-3 py-2 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button"><a href="<?php echo base_url('pelanggan/tambah_pelanggan') ?>">TAMBAH</a></button>
        </div> -->
      </div>
    </div>

  

    
    <div class="block w-full overflow-x-auto">
      <table class="items-center bg-transparent w-full border-collapse ">
        <thead>
          <tr>
            <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
              NO
                        </th>
                        <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                          NAMA
                        </th>
                        <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                          PHONE
                        </th>
                        <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                          PAYMENT METHOD
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                      
                      <?php
                 $no= 0;foreach ($pelanggan as $row  ) :$no++                          
                 ?>
                                   <tr>
                                     <td class="whitespace-nowrap px-4 py-2 text-gray-700"><?php echo$no ?></td>
                                     <td class="whitespace-nowrap px-4 py-2 text-gray-700"><?php echo $row->nama ?></td>
                                     <td class="whitespace-nowrap px-4 py-2 text-gray-700"><?php echo $row->phone ?></td>
                                     <td class="whitespace-nowrap px-4 py-2 text-gray-700"><?php echo $row->payment_method ?>
                                   </td>
                           
                                  
                                
                                </tr>
                                <?php endforeach ?>
                               

                                
                              </tbody>
                                                          </table>
                                                    

                            
                            
                            
                          </form>
                          
                   

                </div>
            </div>


           
                       
                      
                      
            </tr>
                                           
                                      

        
        </tbody>

      </table>
    </div>
  </div>
</div>
<footer class="relative pt-8 pb-6 mt-16">
  <div class="container mx-auto px-4">
    <div class="flex flex-wrap items-center md:justify-between justify-center">
      <div class="w-full md:w-6/12 px-4 mx-auto text-center">
        <!-- <div class="text-sm text-blueGray-500 font-semibold py-1">
          Made with <a href="https://www.creative-tim.com/product/notus-js" class="text-blueGray-500 hover:text-gray-800" target="_blank">Notus JS</a> by <a href="https://www.creative-tim.com" class="text-blueGray-500 hover:text-blueGray-800" target="_blank"> Creative Tim</a>.
        </div> -->
      </div>
    </div>
  </div>
</footer>
</section>



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