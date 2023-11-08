<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.15/dist/tailwind.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>
  <script src="https://cdn.jsdelivr.net/npm/heroicons@2.3.0/dist/heroicons.min.js" defer></script>
</head>
<body class="bg-gray-200 min-h-screen font-base">
  <div id="app" class="flex flex-col md:flex-row w-full">
    <aside style="background-color: #0C356A;" class="w-full md:w-64 md:min-h-screen" x-data="{ isOpen: true }">
    <div style="background-color: #0C356A;" class="flex items-center justify-between bg-gray-900 p-4 h-16">
      <div class="flex items-center">
        <!-- <svg class="w-6 text-blue-500" viewBox="0 0 33 33" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M32.6883 0.335913C32.3407 -0.0248702 31.7929 -0.104067 31.3596 0.142322L19.2249 6.96861L20.3117 1.53926C20.4063 1.06188 20.1797 0.582302 19.7529 0.353512C19.3261 0.126923 18.7981 0.199519 18.455 0.544904L2.96986 16.03C2.94127 16.052 2.91487 16.0762 2.89067 16.1026C1.02735 17.9945 0 20.4804 0 23.1005C0 28.5584 4.4416 33 9.89955 33C12.5218 33 15.0077 31.9727 16.8974 30.1115C16.9260 30.0829 16.9502 30.0543 16.9766 30.0235L30.1232 16.8792C30.4532 16.5492 30.539 16.0454 30.3366 15.6252C30.1364 15.2050 29.6876 14.9674 29.2235 15.0092L24.4409 15.5394L32.8379 1.67125C33.0975 1.24227 33.0381 0.694497 32.6883 0.335913ZM9.89955 29.7002C6.25431 29.7002 3.29985 26.7457 3.29985 23.1005C3.29985 19.4552 6.25431 16.5008 9.89955 16.5008C13.5448 16.5008 16.4992 19.4552 16.4992 23.1005C16.4992 26.7457 13.5448 29.7002 9.89955 29.7002Z" fill="#667EEA" />
        </svg> -->
        <img src="<?php echo base_url('image/logo.png') ?>" alt="">
        <!-- <span class="text-gray-300 text-xl font-semibold mx-2"></span> -->
      </div>
      <div class="flex md:hidden">
        <button type="button" @click="isOpen = !isOpen" class="text-gray-300 hover:text-gray-500 focus:outline-none focus:text-gray-500">
          <svg class="fill-current w-8" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
            <path d="M4 6h16M4 12h16M4 18h16"></path>
          </svg>
        </button>
      </div>
    </div>
    <div class="px-2 py-6" :class="{ 'hidden': !isOpen, 'block': isOpen }">
    <ul>
  <li class="px-2 py-3 rounded transition duration-200 hover:bg-gradient-to-r hover:from-gray-300 hover:to-blue-500">
    <a href="#" class="flex items-center">
      <i class="fas fa-home mr-2 text-white"></i>
      <span class="mx-2  font-semibold">Dashboard</span>
    </a>
  </li>
  <li class="px-2 py-3 rounded mt-2 transition duration-200 hover:bg-gradient-to-r hover:from-gray-300 hover:to-blue-500">
    <a href="<?php echo base_url('ruang') ?>" class="flex items-center">
      <i class="fa-solid fa-restroom text-white"></i>
      <span class="mx-2  font-semibold">data master ruang</span>
    </a>
  </li>
  <li class="px-2 py-3 rounded mt-2 transition duration-200 hover:bg-gradient-to-r hover:from-gray-300 hover:to-blue-500">
    <a href="<?php echo base_url('pelanggan/data_master_pelanggan') ?>" class="flex items-center">
      <i class="fas fa-users text-white"></i>
      <span class="mx-2  font-semibold">data master pelanggan</span>
    </a>
  </li>
  <li class="px-2 py-3 rounded mt-2 transition duration-200 hover:bg-gradient-to-r hover:from-gray-300 hover:to-blue-500">
    <a href="#" class="flex items-center">
      <i class="fa-solid fa-map-location-dot text-white"></i>
      <span class="mx-2  font-semibold">Peminjaman Tempat</span>
    </a>
  </li>
  <li class="px-2 py-3 rounded mt-2 transition duration-200 hover:bg-gradient-to-r hover:from-gray-300 hover:to-blue-500">
    <a href="#" class="flex items-center">
      <i class="fa-regular fa-folder-open text-white"></i>
      <span class="mx-2  font-semibold">Report Sewa</span>
    </a>
  </li>
  <li class="px-2 py-3 rounded mt-2 baru">
    <!-- <a href="#" class="flex items-center">
    <i class="fa-solid fa-right-from-bracket text-white transition duration-200 hover:bg-gradient-to-r hover:from-cyan-500 hover:to-cyan-500"></i>
      <span class="mx-2 text-gray-300">Keluar</span>
    </a> -->
  </li>
</ul>

    </div>
    </aside>

    <!-- Main Content -->
    <div class="w-full md:flex-1">
      <nav style="background-color: #0C356A;" class="md:flex justify-between items-center bg-white p-4 shadow-md h-16">
        <!-- Konten Navbar di sini -->
        <a href="#" class="flex items-center ml-auto ">
          <i class="fa-solid fa-right-from-bracket text-white"></i>
          <span class="mx-2 text-gray-300 ">Keluar</span>
        </a>
      </nav>
</body>
</html>