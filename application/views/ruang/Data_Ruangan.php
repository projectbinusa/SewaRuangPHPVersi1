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
<div class="flex-1 p-4 w-full">
 <div class="relative w-full p-2 border border-blue-300 rounded shadow-lg">
 <h1 class="text-2xl font-bold mb-2 text-gray-900 dark:text-white flex items-center">
    Cari <i class="fas fa-search text-lg ml-2"></i>
    <a href="ruang/tambah_ruang" class="ml-auto">
        <i class="fas fa-plus-square text-3xl text-blue-500 hover:text-blue-700"></i>
    </a>
    <a href="#" class="ml-4">
        <i class="fas fa-bell text-3xl text-black-700 hover:text-gray-700"></i>
    </a>
</h1>

<div class="flex items-center justify-between w-full mb-4">
    <input type="text" id="searchInput" class="w-1/2 p-2 border border-gray-300 rounded focus:outline-none focus:ring focus:border-blue-300" placeholder="Cari..." onkeyup="performSearch()" />
</div>
</div>

    <div class="container">
            <div class="row justify-content-center">
              <?php if ($ruangan) : ?>
                <div class="grid grid-cols-1 sm:grid-cols-3 md:grid-cols-3 lg:grid-cols-3 gap-10 pl-10 pr-10 pt-5 hover:text-gray-900 transition duration-100" id="roomList">
                  <!-- Room cards will be displayed here -->
                  <?php foreach ($ruangan as $row) : ?>
                    <div class="col-lg-4 col-md-6 max-w-xs container bg-white rounded-xl shadow-lg transform transition duration-500 hover:scale-105 hover:shadow-2xl">
                      <div class="bg-white pt-10 pb-10 pl-5 pr-5 mb-1 rounded-lg shadow-xl text-center my-5">
                      <img src="<?php echo base_url('./image/ruangan/tambah_ruangan/' . $row->image); ?>" alt="Room Image" class="block mx-auto mb-5 w-76 h-48 shadow-md rounded transition duration-100 cursor-pointer">
                        <h2 class="text-2xl text-gray-800 font-semibold">Ruangan <?php echo $row->no_ruang; ?></h2>
                        <a href="<?php echo base_url('ruang/detail/' . $row->id); ?>" class="inline-block px-3 py-1 font-semibold text-white bg-blue-500 rounded hover:bg-blue-600 transition duration-200">Detail</a>
                      </div>
                    </div>
                  <?php endforeach; ?>
                </div>
              <?php else : ?>
                <div class="col-lg-4 col-md-6">
                  <p class="text-center text-gray-600">No data available.</p>
                </div>
              <?php endif; ?>
            </div>
  </div>
</div>
<script>
function performSearch() {
    var searchInput = document.getElementById("searchInput").value.toLowerCase();
    var roomList = document.getElementById("roomList");
    var roomCards = roomList.getElementsByClassName("bg-white");

    for (var i = 0; i < roomCards.length; i++) {
        var roomTitle = roomCards[i].querySelector("h2").textContent.toLowerCase();

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