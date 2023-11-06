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
            <input type="text" id="searchInput" class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring focus:border-blue-300" placeholder="Search..." />
            <button class="p-2 bg-blue-500 text-white rounded hover:bg-blue-600" onclick="performSearch()">
              Search
            </button>
          </div>

          <!-- Card -->
          <?php if ($ruangan) : ?>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-10 pl-10 pr-10 pb-10 pt-5" id="roomList">
              <!-- Room cards will be displayed here -->
              <?php foreach ($ruangan as $row) : ?>
                <div class="bg-white rounded-lg shadow-md max-w-3xl">
                  <img src="<?php echo base_url('./image/ruangan/tambah_ruangan/' . $row->image); ?>" alt="img" class="w-full h-48 object-cover rounded-t-lg">
                  <div class="p-4">
                    <h1 class="text-xl font-semibold text-gray-800 cursor-pointer hover:text-blue-500 transition duration-100 text-center">
                      R. <?php echo $row->no_ruang; ?>
                    </h1>
                    <!-- <p class="text-sm text-gray-600">Lantai <?php echo $row->no_lantai; ?></p> -->
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

    </div>
  </div>

  <script>
    function performSearch() {
      var searchInput = document.getElementById("searchInput").value.toLowerCase();
      var roomList = document.getElementById("roomList");
      var roomCards = roomList.getElementsByClassName("bg-white");

      for (var i = 0; i < roomCards.length; i++) {
        var roomTitle = roomCards[i].querySelector(".text-gray-800").textContent.toLowerCase();
        var roomFloor = roomCards[i].querySelector(".text-gray-600").textContent.toLowerCase();

        if (roomTitle.includes(searchInput) || roomFloor.includes(searchInput)) {
          roomCards[i].style.display = "block";
        } else {
          roomCards[i].style.display = "none";
        }
      }
    }
  </script>
</body>

</html>