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
    <a href="ruang/tambah_ruang" class="ml-auto inline-block px-4 py-2 bg-blue-500 hover:bg-blue-700 text-white font-semibold text-base rounded shadow-md transition duration-300 ease-in-out transform hover:scale-105">
          Tambah
        </a>
</h1>

<div class="flex items-center justify-between w-full mb-4">
    <input type="text" id="searchInput" class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring focus:border-blue-300" placeholder="Cari..." onkeyup="performSearch()" />
</div>
</div>

<div class="container">
 <div class="row justify-content-center">
            <?php if ($ruangan) : ?>
  <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-10 pl-10 pr-10 pt-5 hover:text-gray-900 transition duration-100" id="roomList">
    <?php foreach ($ruangan as $row) : ?>
      <div class="col-lg-4 col-md-6 max-w-md container bg-white rounded-xl shadow-lg transform transition duration-500 hover:scale-105">
        <div class="bg-white pt-10 pb-10 pl-5 pr-5 mb-1 rounded-lg shadow-xl text-center my-5">
          <img src="<?php echo base_url('./image/ruangan/tambah_ruangan/' . $row->image); ?>" alt="Room Image" class="block mx-auto mb-5 w-96 h-48 shadow-md rounded transition duration-100 cursor-pointer">
          <h2 class="text-2xl text-gray-800 font-semibold mb-3">Ruangan <?php echo $row->no_ruang; ?></h2>
          <a href="<?php echo base_url('ruang/detail/' . $row->id); ?>" class="inline-block px-3 py-1 font-semibold text-white bg-blue-500 rounded hover:bg-blue-600">Detail</a>
          <a href="<?php echo base_url('ruang/edit_ruangan/' . $row->id); ?>" class="inline-block px-3 py-1 font-semibold text-white bg-green-500 rounded hover:bg-green-600 ml-3">Edit</a>
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