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

<style>
  /* Default styles */
li:hover span {
    color: black; /* Warna teks ketika dihover */
}
li:hover i {
    color: black; /* Warna ikon ketika dihover */
}
nav ul:hover span {
    color: black; /* Warna teks ketika dihover */
}
nav ul:hover i {
    color: black; /* Warna ikon ketika dihover */
}
</style>
<body class="bg-white min-h-screen font-base">

  <div id="app" class="flex flex-col md:flex-row w-full">
    <aside style="background-color: #0C356A;" class="w-full md:w-64 md:min-h-screen" x-data="{ isOpen: true }">
    <div style="background-color: #0C356A;" class="flex items-center justify-between bg-gray-900 p-4 h-16">
      <div class="flex items-center">
        <img src="<?php echo base_url('image/logo.png') ?>" class="w-28">
        <!-- <span class="text-gray-300 text-xl font-medium mx-2"></span> -->
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
  <li class="px-2 py-3 rounded transition duration-200 hover:bg-gradient-to-r hover:from-gray-300 hover:to-blue-500 hover:text-black">
    <a href="<?php echo base_url('pelanggan/dashboard') ?>" class="flex items-center">
      <i class="fas fa-home mr-2 text-white "></i>
      <span class="mx-2 text-white font-semibold">Dashboard</span>
    </a>
  </li>
  <li class="px-2 py-3 rounded mt-2 transition duration-200 hover:bg-gradient-to-r hover:from-gray-300 hover:to-blue-500">
    <a href="<?php echo base_url('operator') ?>" class="flex items-center">
      <i class="fa-solid fa-restroom text-white"></i>
      <span class="mx-2 text-white font-semibold">data master ruang</span>
    </a>
  </li>
  <li class="px-2 py-3 rounded mt-2 transition duration-200 hover:bg-gradient-to-r hover:from-gray-300 hover:to-blue-500">
    <a href="<?php echo base_url('pelanggan/data_master_pelanggan') ?>" class="flex items-center">
      <i class="fas fa-users text-white"></i>
      <span class="mx-2 text-white font-semibold">data master pelanggan</span>
    </a>
  </li>
  <li class="px-2 py-3 rounded mt-2 transition duration-200 hover:bg-gradient-to-r hover:from-gray-300 hover:to-blue-500">
    <a href="#" class="flex items-center">
      <i class="fa-solid fa-map-location-dot text-white"></i>
      <span class="mx-2 text-white font-semibold">Peminjaman Tempat</span>
    </a>
  </li>
  <li class="px-2 py-3 rounded mt-2 transition duration-200 hover:bg-gradient-to-r hover:from-gray-300 hover:to-blue-500">
    <a href="#" class="flex items-center">
      <i class="fa-regular fa-folder-open text-white"></i>
      <span class="mx-2 text-white font-semibold">Report Sewa</span>
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
      <ul class="px-2 py-3 rounded mt-2 transition duration-200 hover:bg-gradient-to-r hover:from-gray-300 hover:to-blue-500 ml-auto">
        <ul>
        <a href="http://localhost/exc_sewa_ruang/" class="flex items-center ml-auto ">
          <i class="fa-solid fa-right-from-bracket text-white hover:"></i>
          <span class="mx-2 text-white font-semibold">Keluar</span>
        </a>
        </ul>
      </ul>
      </nav>
</body>
</html>