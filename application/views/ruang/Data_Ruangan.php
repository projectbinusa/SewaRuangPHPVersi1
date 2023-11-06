<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data Master Ruangan</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</head>
<body>
<?php $this->load->view('sidebar'); ?>
      <!-- Área de contenido principal -->
      <div class="flex-1 p-4 w-full md:w-1/2">
  <!-- Campo de búsqueda -->
  <div class="relative max-w-screen w-full">
    <!-- Search input field -->
    <div class="flex items-center justify-between w-full mb-4">
      <input type="text" id="searchInput" class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring focus:border-blue-300" placeholder="Search..." onkeyup="performSearch()" />
    </div>
    <?php if ($ruangan) : ?>
      <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-10 pl-10 pr-10 pb-10 pt-5" id="roomList">
        <!-- Room cards will be displayed here -->
        <?php foreach ($ruangan as $row) : ?>
          <div class="bg-white rounded-lg shadow-md max-w-3xl">
            <img src="<?php echo base_url('./image/ruangan/tambah_ruangan/' . $row->image); ?>" alt="Ruangan <?php echo $row->no_ruang; ?>" class="w-full h-48 object-cover rounded-t-lg">
            <div class="p-4">
              <h1 class="text-xl font-semibold text-gray-800 cursor-pointer hover:text-blue-500 transition duration-100 text-center">
                Ruang <?php echo $row->no_ruang; ?>
              </h1>
            </div>
            <div class="p-4 bg-gray-100 rounded-b-lg">
              <a href="<?php echo base_url('ruang/detail/' . $row->id); ?>" class="text-sm font-semibold text-blue-500 hover:underline cursor-pointer">Detail</a>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    <?php else : ?>
      <p class="text-center text-gray-600">No data available.</p>
    <?php endif; ?>
  </div>
</div>

  <script>
    function performSearch() {
      const searchInput = document.getElementById('searchInput');
      const roomList = document.getElementById('roomList');
      const searchTerm = searchInput.value.toLowerCase();

      // Mengambil semua elemen card ruangan
      const roomCards = roomList.querySelectorAll('.col-lg-4');

      roomCards.forEach(card => {
        const roomNumber = card.querySelector('h2').textContent.toLowerCase();

        if (roomNumber.includes(searchTerm)) {
          card.style.display = 'block';
        } else {
          card.style.display = 'none';
        }
      });
    }
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
  function performSearch() {
    var searchInput = document.getElementById("searchInput").value.toLowerCase();
    var roomList = document.getElementById("roomList");
    var roomCards = roomList.getElementsByClassName("bg-white");

    for (var i = 0; i < roomCards.length; i++) {
      var roomTitle = roomCards[i].querySelector("h1").textContent.toLowerCase();

      if (roomTitle.includes(searchInput)) {
        roomCards[i].style.display = "block";
      } else {
        roomCards[i].style.display = "none";
      }
    }
  }
</script>

</body>

</html>