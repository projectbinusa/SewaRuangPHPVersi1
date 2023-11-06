<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Data Pelanggan</title>
    <link href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css" rel=" stylesheet">
	<!--Replace with your tailwind.css once created-->
<link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css">
<!--Regular Datatables CSS-->
<link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
	<!--Responsive Extension Datatables CSS-->
	<link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet">
  <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
		/*Overrides for Tailwind CSS */

		/Form fields/
		.dataTables_wrapper select,
		.dataTables_wrapper .dataTables_filter input {
			color: #4F709C;
			/text-gray-700/
			padding-left: 1rem;
			/pl-4/
			padding-right: 1rem;
			/pl-4/
			padding-top: .5rem;
			/pl-2/
			padding-bottom: .5rem;
			/pl-2/
			line-height: 1.25;
			/leading-tight/
			border-width: 2px;
			/border-2/
			border-radius: .25rem;
			border-color: #edf2f7;
			/border-gray-200/
			background-color: #edf2f7;
			/bg-gray-200/
		}

		/Row Hover/
		table.dataTable.hover tbody tr:hover,
		table.dataTable.display tbody tr:hover {
			background-color: #ebf4ff;
			/bg-indigo-100/
		}

		/Pagination Buttons/
		.dataTables_wrapper .dataTables_paginate .paginate_button {
			font-weight: 700;
			/font-bold/
			border-radius: .25rem;
			/rounded/
			border: 1px solid transparent;
			/border border-transparent/
		}

		/*Pagination Buttons - Current selected */
		.dataTables_wrapper .dataTables_paginate .paginate_button.current {
			color: white !important;
			/text-white/
			box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06);
			/shadow/
			font-weight: 700;
			/font-bold/
			border-radius: .25rem;
			/rounded/
			background: #4F709C !important;
			/bg-indigo-500/
			border: 1px solid transparent;
			/border border-transparent/
		}

		/*Pagination Buttons - Hover */
		.dataTables_wrapper .dataTables_paginate .paginate_button:hover {
			color: white !important;
			/text-white/
			box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06);
			/shadow/
			font-weight: 700;
			/font-bold/
			border-radius: .25rem;
			/rounded/
			background: #4F709C !important;
			/bg-indigo-500/
			border: 1px solid transparent;
			/border border-transparent/
		}

		/*Add padding to bottom border */
		table.dataTable.no-footer {
			border-bottom: 1px solid #e2e8f0;
			/border-b-1 border-gray-300/
			margin-top: 0.75em;
			margin-bottom: 0.75em;
		}

		/Change colour of responsive icon/
		table.dataTable.dtr-inline.collapsed>tbody>tr>td:first-child:before,
		table.dataTable.dtr-inline.collapsed>tbody>tr>th:first-child:before {
			background-color: #4F709C !important;
			/bg-indigo-500/
		}
	</style>
</head>
<body class="bg-gray-100 text-gray-900 tracking-wider leading-normal">
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
            <a href="tambah_pelanggan">
            <i class="fas fa-plus-square text-gray-500 text-3xl"></i>
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

          <!-- Konten halaman Anda di sini -->
        <div class="flex flex-wrap justify-center">
            

        
<!-- Data Pelanggan -->
  <!--Container-->
	<div class="container w-full md:w-4/4 xl:w-4/7  mx-auto px-2">

    <!--Card-->
		<div id='recipients' class="p-8 mt-6 lg:mt-0 rounded shadow bg-white">

        <tbody>
        
      <table id="example" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
				<thead>
					<tr>
						<th data-priority="1">Name</th>
						<th data-priority="2">Phone</th>
						<th data-priority="3">Payment Method</th>
						<th data-priority="3">Action</th>
					</tr>
				</thead>
                            <tbody>
                      <?php
                 $no= 0;foreach ($pelanggan as $row  ) :$no++                          
                 ?>
                                   <tr>
                                    <td class="whitespace-nowrap px-4 py-2 text-gray-700"><?php echo $row->nama ?></td>
                                    <td class="whitespace-nowrap px-4 py-2 text-gray-700"><?php echo $row->phone ?></td>
                                    <td class="whitespace-nowrap px-4 py-2 text-gray-700"><?php echo $row->payment_method ?>                                 </td>
                                    <td class="whitespace-nowrap px-4 py-2 text-gray-700">
                                      <!-- Update Data -->
                                      <a  class="btn btn-primary" href="update_data"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                      </svg></a>
                                      
                                      <!-- Hapus Data -->
                                     <button onclick="hapus(<?php echo $row->id ?>)" class="btn btn-danger"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"   class="bi bi-trash" viewBox="0 0 16 16">
                                   <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"/>
                                       <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"/>
                                          </svg></button>
                                        

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

<!-- jQuery -->
<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>


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

<!-- SweetAlert -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
    <script>
        function hapus(id) {
    swal.fire({
        title: ' Yakin Ingin Menghapus Data',
        text: "",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Batal',
        confirmButtonText: 'Hapus Data'
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire({
                icon: 'success',
                title: 'Hapus',
                showConfirmButton: false,
                timer: 1500,

            }).then(function() {
                window.location.href = "<?php echo base_url('pelanggan/hapus_data_pelanggan/')?>" + id;
            });
        }
    });
}
    </script> 
</body>
</html>