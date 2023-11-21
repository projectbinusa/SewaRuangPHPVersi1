<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sewa Ruang</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@12.11.5/dist/sweetalert2.min.css">
  <link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet">
</head>
<style>
  .custom-swal-popup {
    background-color: #ffffff;
    color: #0074e4;
  }

  .custom-swal-title {
    color: #0074e4;
  }

  .custom-swal-text {
    color: #333;
  }

  .custom-swal-confirm-button {
    background-color: #0074e4;
    color: #fff;
  }

  .custom-swal-confirm-button:hover {
    background-color: #005abf;
  }

  .custom-swal-cancel-button {
    background-color: #ff0000;
    color: #fff;
  }

  .custom-swal-cancel-button:hover {
    background-color: #cc0000;
  }

  @media (max-width: 768px) {

    #scrollUpBtn,
    #scrollDownBtn {
      display: block;
    }
  }

  @media (min-width: 769px) {

    #scrollUpBtn,
    #scrollDownBtn {
      display: none;
    }
  }
</style>

<body>
  <?php $this->load->view('sidebar'); ?>
  <!-- Area konten utama -->
  <div class="flex-1 p-4 w-full">
    <div class="relative w-full p-2 border bg-gray-300 border-blue-300 rounded shadow-lg">
      <h1 class="text-2xl font-bold mb-2 text-gray-900 dark:text-white flex items-center gap-3">
        Cari <i class="fas fa-search text-lg ml-2"></i>
        <a href="tambah_ruang" class="ml-auto inline-block px-4 py-2 bg-blue-500 hover:bg-blue-700 text-white font-semibold text-base rounded shadow-md transition duration-300 ease-in-out transform hover:scale-105" onclick="showAddConfirmation()">
          Tambah
        </a>
        <a href="expor_ruangan" class="bg-blue-500 hover:bg-blue-800 w-30 h-10 text-white font-bold px-2 rounded relative z-50 text-center"><i class="fa-solid fa-download"></i></a>
      </h1>

      <div class="flex items-center justify-between w-full mb-4">
        <form id="searchForm" action="<?php echo base_url('operator/search'); ?>" method="post" class="flex items-center w-full">
          <button type="submit" class="mr-2 px-4 py-2 bg-blue-500 hover:bg-blue-700 text-white font-semibold rounded shadow-md transition duration-300 ease-in-out transform hover:scale-105">Cari</button>
          <input type="text" name="keyword" placeholder="Cari..." class="border rounded py-2 px-4 w-full" />
        </form>
      </div>
      <div class="flex items-center justify-between w-full mb-4">
        <button class="btn-export-p py-2 px-2 w-28 bg-yellow-500 hover:bg-yellow-700 font-bold text-white rounded" onclick="toggleModal()"><span class="pe-2">
            <i class="fas fa-file-import"></i>
          </span>Import</button>
      </div>
    </div>


    <script>
      document.getElementById('searchForm').addEventListener('submit', function() {
        // You can add any additional logic here if needed
      });

      document.getElementById('searchButton').addEventListener('click', function() {
        document.getElementById('searchForm').submit();
      });

      document.querySelector('input[name="keyword"]').addEventListener('input', function() {
        document.getElementById('searchForm').submit();
      });
    </script>


    <div class="container">
      <div class="row justify-content-center">
        <?php if ($ruang) : ?>
          <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-10 pl-10 pr-10 pt-5 hover:text-gray-900 transition duration-100 mx-auto" id="roomList">
            <?php $count = 0; ?>
            <?php foreach ($ruang as $row) : ?>
              <?php if ($count < 6) : ?>
                <div class="col-lg-4 col-md-6 max-w-md container bg-white rounded-xl shadow-lg transform transition duration-500 hover:scale-105 mx-auto" onclick="navigateToDetail('<?php echo base_url('operator/detail/' . $row->id); ?>')">
                  <div class="bg-white pt-10 pb-10 pl-5 pr-5 mb-1 rounded-lg shadow-xl text-center my-5">
                    <img src="<?php echo (!empty($row->image) && file_exists('./image/ruangan/' . $row->image)) ? base_url('./image/ruangan/' . $row->image) : base_url('./image/foto.png'); ?>" alt="Gambar Ruangan" class="block mx-auto mb-5 w-96 h-48 shadow-md rounded transition duration-100 cursor-pointer">
                    <h2 class="text-2xl text-gray-800 font-semibold mb-3"><?php echo format_ruangan($row->no_ruang); ?></h2>
                    <a class="inline-block px-3 py-1 font-semibold text-white bg-black rounded hover-bg-black ml-3" href="<?php echo base_url('operator/edit_ruangan/' . $row->id); ?>">Edit</a>
                  </div>
                </div>
              <?php endif; ?>
              <?php $count++; ?>
            <?php endforeach; ?>
          </div>

          <?php if ($count > 6) : ?>
            <p class="text-center text-gray-600 mt-4">Menampilkan 6 dari <?php echo $count; ?> card. Gunakan fitur pencarian untuk hasil lebih lanjut.</p>
          <?php endif; ?>

        <?php else : ?>
          <div class="col-lg-4 col-md-6 mx-auto">
            <p class="text-center text-gray-600">Tidak ada data yang tersedia.</p>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
  <!-- Scroll Up Button -->
  <button id="scrollUpBtn" class="fixed bottom-5 right-5 p-2 bg-blue-500 text-white rounded-full cursor-pointer">
    <i class="fas fa-chevron-up"></i>
  </button>

  <!-- Scroll Down Button -->
  <button id="scrollDownBtn" class="fixed bottom-5 right-16 p-2 bg-blue-500 text-white rounded-full cursor-pointer">
    <i class="fas fa-chevron-down"></i>
  </button>

  <div class="fixed z-10 overflow-y-auto top-0 w-full left-0 hidden" id="modal">
    <div class="flex items-center justify-center min-height-100vh pt-4 px-4 pb-20 text-center sm:block sm:p-0">
      <div class="fixed inset-0 transition-opacity">
        <div class="absolute inset-0 bg-gray-900 opacity-75">
        </div>
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen">&#8203;</span>
        <div class="inline-block align-center bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
          <form action="<?php echo base_url('operator/import_ruang'); ?>" method="post" enctype="multipart/form-data">
            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
              <label class="font-medium text-gray-800">File</label>
              <input type="file" name="file" id="file" class="w-full outline-none rounded bg-gray-100 p-2 mt-2 mb-3" />

            </div>
            <div class="bg-gray-200 px-4 py-3 text-right">
              <button type="button" class="py-2 px-4 bg-red-500 text-white rounded hover:bg-red-700 mr-2" onclick="toggleModal()"> Batal</button>
              <button type="submit" name="import" class="py-2 px-4 bg-blue-500 text-white rounded hover:bg-blue-700 mr-2">Import</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <script>
      document.addEventListener("DOMContentLoaded", function() {
        // Get scroll buttons
        const scrollUpBtn = document.getElementById("scrollUpBtn");
        const scrollDownBtn = document.getElementById("scrollDownBtn");

        // Add click event listeners
        scrollUpBtn.addEventListener("click", function() {
          scrollSmoothly(-5500); // Scroll up by 500 pixels
        });

        scrollDownBtn.addEventListener("click", function() {
          scrollSmoothly(5500); // Scroll down by 500 pixels
        });

        // Function to scroll smoothly
        function scrollSmoothly(offset) {
          window.scrollBy({
            top: offset,
            behavior: "smooth",
          });
        }
      });
    </script>
    <script>
      function toggleModal() {
        document.getElementById('modal').classList.toggle('hidden')
      }
    </script>
</body>

</html>