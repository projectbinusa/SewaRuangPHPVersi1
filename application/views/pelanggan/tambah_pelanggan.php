<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <title>Tambah Pelanggan</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
   
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.15/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
     
  <div  id="content" role="main" class="text-right">
    <br>
    <br>
    <br>
    <br>
                <div class="card mb-6 shadow">
                    <div class="card-body d-flex text-white justify-center-between text-center"
                    style="background-color:#4F709C">
                    <h1 class="tambah_pelanggan">TAMBAH PELANGGAN</h1>
                </div>    
                <div class="center">
                    <br>
                    <br>
                    <!-- <hr style="900" width="1200"> -->
                    
                </div>
                <div class="card-body text-center">
                                <form action="" method="post" class="row">
                                <div class="text-right mb-3 col-6">
                 <label for="nama" class="form-label"><b>NAMA</b></label>
                
                <input type="text" class="form-control" id="nama" name="nama"
                placeholder="Masukan nama anda">
                
            </div>
            <div class="mb-4 col-6">
                <label for="phone" class="form-label"><b>PHONE</b></label>
                
                <input type="text" class="form-control" id="phone" name="phone"
                placeholder="Phone">
               
            </div>          
                            <div class="mb-4 col-12 text-center">
                                <label for="payment_method" class="form-label"><b>PAYMENT METHOD</b></label>
                                <input type="text" class="form-control" id="payment_method" name="payment_method"
                                placeholder="Peyment Method">
                                <br>
                                <button type="submit" class="btn btn-sm btn-primary">Confirmasi</button> 
                                
                                <a href="<?php echo base_url('pelanggan/data_master_pelanggan') ?>" class="btn btn-sm btn-danger">Kembali</a> 
                                <div class="flex justify-content-between"></div>
     <!-- component -->
<link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/styles/tailwind.css">
<link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css">



<section class="bg-gray-50 dark:bg-gray-900">
  <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
      
      <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
          <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
              <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                  TAMBAH PELANGGAN
              </h1>
              <form action="<?php echo base_url('pelanggan/aksi_tambah_pelanggan') ?>" class="space-y-4 md:space-y-6" >
                  <div>
                      <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NAMA LENGKAP</label>
                      <input type="nama" name="nama" id="nama" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Silahkan tulis nama lengkap" required="">
                  </div>
                  <div>
                      <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">PHONE</label>
                      <input type="phone" name="phone" id="phone" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Phone" required="">
                  </div>
                  <div>
                      <label for="payment_method" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">PAYMENT METHOD</label>
                      <input type="payment_method" name="payment_method" id="payment_method" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Payment method" required="">
                  </div>
                 
                  
                     
                  
                  <a href="" class="bg-red-500 text-white active:bg-red-600 text-xs font-bold uppercase px-3 py-1 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"><span>KEMBALI</span></a>
                  
                  <button class="bg-indigo-500 text-white active:bg-indigo-600 text-xs font-bold uppercase px-3 py-1 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button">Confirmasi</button>  
                  
              </form>
          </div>
      </div>
  </div>
</section>



                    
</body>
</html>