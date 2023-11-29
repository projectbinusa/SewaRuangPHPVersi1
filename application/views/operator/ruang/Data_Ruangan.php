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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<style>
  body {
    max-width: 100%;
    margin: 0 auto;
  }

  .flex-1 {
    width: 100%;
  }

  .container {
    width: 100%;
    max-width: 100%;
  }

  .max-w-md {
    max-width: 100%;
  }

  #roomList {
    max-width: 100%;
  }

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

  .contain-all {
    height: 100%;
  }

  .pagination {
    display: flex;
    justify-content: center;
    padding-top: 20px;
  }

  .pagination a,
  .pagination strong {
    border: 1px solid silver;
    background-color: #4F709C;
    border-radius: 8px;
    font-size: 15px;
    color: white;
    padding: 5px 10px;
    margin-right: 2px;
    text-decoration: none;
  }

  .pagination a:hover,
  .pagination strong {
    border: 1px solid #4F709C;
    background-color: #4F709C;
    color: black;
  }

  /* Add media query for responsiveness */
  @media screen and (max-width: 600px) {
    .pagination {
      display: flex;
      justify-content: center;
      padding-top: 20px;
      padding-bottom: 70px;
    }
  }
</style>

<body class="relative min-h-screen overflow-hidden">
  <?php $this->load->view('sidebar'); ?>
  <div class="overflow-y-scroll h-screen md:h-5/6">
    <main class="h-screen">
      <!-- Area konten utama -->
      <div class="flex-1 p-4 w-full">
        <div class="relative w-full p-2 border bg--300 rounded shadow-lg pt-5">

          <h1 class="text-4xl font-bold mb-2 text-gray-900 dark:text-white flex items-center gap-3">
            <span class="hidden md:inline">Cari</span>
            <div class="ml-auto">
              <div class="items-center justify-between w-full mb-4">
                <button class="btn-export-p inline-block px-4 py-2 bg-yellow-500 hover:bg-yellow-800 text-white font-semibold text-base rounded ml-auto" onclick="toggleModal()">
                  <span class="pe-2">
                    <i class="fas fa-file-import"></i>
                  </span>
                  Impor
                </button>

                <button onclick="Eksporruangan()" class="ml-3 inline-block px-4 py-2 bg-green-500 hover:bg-green-800 text-white font-semibold text-base rounded" onclick="showExportConfirmation()">
                  <i class="fas fa-file-export"></i> Ekspor
                </button>

                <a href="<?php echo base_url('operator/tambah_ruang') ?>" class="ml-2 inline-block px-4 py-2 bg-blue-500 hover:bg-blue-700 text-white font-semibold text-base rounded">
                  <i class="fas fa-plus"></i> Tambah
                </a>
              </div>
            </div>
          </h1>

          <div class="flex items-center justify-between w-full mb-4">
            <form id="searchForm" action="<?php echo base_url('operator/search'); ?>" method="post" class="flex items-center w-full">
              <button type="submit" class="mr-2 px-4 py-2 bg-blue-500 hover:bg-blue-700 text-white font-semibold rounded"><i class="fas fa-search text-lg mt-2"></i></button>
              <input type="text" name="keyword" placeholder="Cari Ruangan..." class="border rounded py-2 px-4 w-full" />
            </form>
          </div>
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
            <div id="roomList" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-10 pl-10 pr-10 pt-5 hover:text-gray-900 transition duration-100 mx-auto" id="roomList">
              <?php $count = 0; ?>
              <?php foreach ($ruang as $row) : ?>
                <?php if ($count < 6) : ?>
                  <div class="col-lg-4 col-md-6 max-w-md container bg-white rounded-xl shadow-lg transform transition duration-500 hover:scale-105 mx-auto">
                    <a href="<?php echo base_url('operator/detail/' . $row->id); ?>">
                      <div class="bg-white pt-10 pb-10 pl-5 pr-5 mb-1 rounded-lg shadow-xl text-center my-5">
                        <img src="<?php echo (!empty($row->image) && file_exists('./image/ruangan/' . $row->image)) ? base_url('./image/ruangan/' . $row->image) : base_url('./image/foto.png'); ?>" alt="Gambar Ruangan" class="block mx-auto mb-5 w-96 h-48 shadow-md rounded transition duration-100 cursor-pointer">
                        <h2 class="text-2xl text-gray-800 font-semibold mb-3"><?php echo $row->no_ruang; ?></h2>
                        <a class="inline-block px-3 py-1 font-semibold text-white bg-blue-500 hover:bg-blue-700 ml-3 rounded-md" href="<?php echo base_url('operator/edit_ruangan/' . $row->id); ?>"><i class="fas fa-edit"></i></a>
                        <a class="inline-block px-3 py-1 font-semibold text-white bg-red-500 hover:bg-red-700 ml-3 rounded-md" onclick="hapus('<?php echo $row->id; ?>')"><i class="fas fa-trash"></i></a>
                    </a>
                  </div>
                  </a>
            </div>
          <?php endif; ?>
          <?php $count++; ?>
        <?php endforeach; ?>
        </div>
        <div class="pagination">
          <?php echo $pagination_links; ?>
        </div>
      <?php else : ?>
        <div class="col-lg-4 col-md-6 mx-auto">
          <p class="text-center text-gray-600">data Tidak Ditemukan</p>
        </div>
      <?php endif; ?>
      </div>
  </div>

  <div class="fixed z-10 overflow-y-auto top-0 w-full left-0 hidden" id="modal">
    <div class="flex items-center justify-center min-height-100vh pt-4 px-4 pb-20 text-center sm:block sm:p-0">
      <div class="fixed inset-0 transition-opacity">
        <div class="absolute inset-0 bg-gray-900 opacity-75">
        </div>
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen">&#8203;</span>
        <div class="inline-block align-center bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
          <form action="<?php echo base_url('operator/import_ruang'); ?>" method="post" enctype="multipart/form-data">
            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
              <div class="flex items-center mb-3">
                <label class="font-medium text-gray-800">File</label>
              </div>
              <input type="file" required name="file" id="file" class="w-full outline-none rounded bg-gray-100 p-2 mt-2 mb-3" />
            </div>
            <div class="bg-gray-200 px-4 py-3 text-right">
              <button type="button" class="py-2 px-4 bg-red-500 text-white rounded hover:bg-red-700 mr-2" onclick="toggleModal()"> Batal</button>
              <button type="submit" name="import" class="py-2 px-4 bg-blue-500 text-white rounded hover:bg-blue-700 mr-2">Impor</button>
              <button type="button" class="py-2 px-4 bg-purple-500 text-white rounded hover:bg-purple-700 mr-2" onclick="template()">
                Unduh Templat</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  </main>
  </div>

  <script>
    function template() {
      Swal.fire({
        title: 'Download Template Data Operator?',
        text: "Anda akan mengdownload template data ruangan",
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Batal',
        confirmButtonText: 'Download'
      }).then((result) => {
        if (result.isConfirmed) {
          // Lakukan proses ekspor data di sini
          window.location.href = "<?php echo base_url('operator/template_data_ruangan') ?>";

          Swal.fire({
            icon: 'success',
            title: 'Data berhasil didownload',
            showConfirmButton: false,
            timer: 2500,
          });
        }
      });
    }

    function Eksporruangan() {
      Swal.fire({
        title: 'Ekspor Data Ruangan?',
        text: "Anda akan mengekspor data ruangan",
        icon: 'question',
        timer: 20000,
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Batal',
        confirmButtonText: 'Ekspor'
      }).then((result) => {
        if (result.isConfirmed) {
          // Lakukan proses ekspor data di sini
          window.location.href = "<?php echo base_url('operator/expor_ruangan') ?>";

          Swal.fire({
            icon: 'success',
            title: 'Data ruangan berhasil diekspor',
            showConfirmButton: false,
            timer: 2500,
          });
        }
      });
    }

    function hapus(id) {
      Swal.fire({
        title: ' Apa Mau Menghapus?',
        text: "data ini tidak bisa dikembalikan lagi!",
        icon: 'warning',
        timer: 20000,
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Batal',
        confirmButtonText: 'Hapus'
      }).then((result) => {
        if (result.isConfirmed) {
          Swal.fire({
            icon: 'success',
            title: 'Berhasil Menghapus',
            showConfirmButton: false,
            timer: 1500,
          }).then(function() {
            window.location.href = "<?php echo base_url('operator/hapus_data_ruangan/') ?>" + id;
          });
        }
      });
    };

    document.addEventListener("DOMContentLoaded", function() {
      // Select all elements with the class 'room-card' and attach a click event
      document.querySelectorAll('.room-card').forEach(function(card) {
        card.addEventListener('click', function() {
          // Get the room ID from the data-room-id attribute
          var roomId = card.getAttribute('data-room-id');

          // Build the URL for the detail page using the room ID
          var detailUrl = "<?php echo base_url('operator/detail/') ?>" + roomId;

          // Navigate to the detail page
          window.location.href = detailUrl;
        });
      });
    });

    document.addEventListener("DOMContentLoaded", function() {
      const scrollUpBtn = document.getElementById("scrollUpBtn");
      const scrollDownBtn = document.getElementById("scrollDownBtn");

      window.addEventListener("scroll", function() {
        // If the scroll position is at the top, hide scrollUpBtn, otherwise, show it
        scrollUpBtn.style.display = window.scrollY === 0 ? "none" : "block";

        // If the user has scrolled to the bottom of the page, hide scrollDownBtn, otherwise, show it
        scrollDownBtn.style.display =
          window.innerHeight + window.scrollY >= document.body.scrollHeight ? "none" : "block";
      });

      scrollUpBtn.addEventListener("click", function() {
        scrollSmoothly(-5500);
      });

      scrollDownBtn.addEventListener("click", function() {
        scrollSmoothly(5500);
      });

      function scrollSmoothly(offset) {
        window.scrollBy({
          top: offset,
          behavior: "smooth",
        });
      }
    });

    function toggleModal() {
      document.getElementById('modal').classList.toggle('hidden')
    }

    function navigateToDetail(detailUrl) {
      window.location.href = detailUrl;
    }
  </script>

</body>

</html>