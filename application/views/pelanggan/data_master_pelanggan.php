<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Document</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>


            <link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/styles/tailwind.css">
<link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css">


<section class="py-1 bg-blueGray-50">
<div class="w-full xl:w-8/12 mb-12 xl:mb-0 px-4 mx-auto mt-24">
  <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded ">
    <div class="rounded-t mb-0 px-4 py-3 border-0">
      <div class="flex flex-wrap items-center">
        <div class="relative w-full px-4 max-w-full flex-grow flex-1">
          <h3 class="font-semibold text-base text-blueGray-700">DATA MASTER PELANGGAN</h3>
        </div>
        <div class="relative w-full px-4 max-w-full flex-grow flex-1 text-right">
          <button class="bg-indigo-500 text-white active:bg-indigo-600 text-xs font-bold uppercase px-3 py-1 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button"><a href="<?php echo base_url('pelanggan/tambah_pelanggan') ?>">TAMBAH</a></button>
        </div>
      </div>
    </div>

    <div class="block w-full overflow-x-auto">
      <table class="items-center bg-transparent w-full border-collapse ">
        <thead>
          <tr>
            <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                          NO
                        </th>
          <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                          NAMA
                        </th>
           <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                          PHONE
                        </th>
          <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                          PAYMENT METHOD
                        </th>
          </tr>
        </thead>

        <tbody>
        <?php $no = 1;
          foreach ($pelanggan as $waifu) { ?>
            <td class="text-center"><b><?php echo $no++ ?></b></td>
                        <td class="text-center"><b><?php echo $waifu->nama ?></b></td> 
                            <center><thead>
                                <tr>
                                <th scope="col">No </th>                               
                                <th scope="col"> Nama </th>
                                <th scope="col"> Phone </th>
                                <th scope="col"> Payment Method </th>
                                <th scope="col">Aksi</th>

                                    
                                </tr>
                            </thead></center>
                            <tbody>
                              
                            <?php
                 $no= 0;foreach ($pelanggan as $row  ) :$no++                          
                    ?>
                                   <tr>
                                    <td class="whitespace-nowrap px-4 py-2 text-gray-700"><?php echo$no ?></td>
                                    <td class="whitespace-nowrap px-4 py-2 text-gray-700"><?php echo $row->nama ?></td>
                                    <td class="whitespace-nowrap px-4 py-2 text-gray-700"><?php echo $row->phone ?></td>
                                    <td class="whitespace-nowrap px-4 py-2 text-gray-700"><?php echo $row->payment_method ?>
                                 </td>
                           
                                  
                                 </td>
                              </tr><?php endforeach ?>
                                
                                </table>
                                
                                
                                
                                <td class="whitespace-nowrap px-4 py-2 text-gray-700">
                                    <!-- Tambah -->
                                    <a href="<?php echo base_url('pelanggan/tambah_Pelanggan') ?>" class="btn btn-primary">Tambah</a> 
                            </form>
                   
                   

                </div>
            </div><


           
                        <td class="text-center"><b><?php echo $waifu->phone ?></b></td>
                        <td class="text-center"><b><?php echo $waifu->peyment_method ?></b></td>
                       
                      
                      
            </tr>
                                           
                                      

          <?php } ?>
        </tbody>

      </table>
    </div>
  </div>
</div>
<footer class="relative pt-8 pb-6 mt-16">
  <div class="container mx-auto px-4">
    <div class="flex flex-wrap items-center md:justify-between justify-center">
      <div class="w-full md:w-6/12 px-4 mx-auto text-center">
        <!-- <div class="text-sm text-blueGray-500 font-semibold py-1">
          Made with <a href="https://www.creative-tim.com/product/notus-js" class="text-blueGray-500 hover:text-gray-800" target="_blank">Notus JS</a> by <a href="https://www.creative-tim.com" class="text-blueGray-500 hover:text-blueGray-800" target="_blank"> Creative Tim</a>.
        </div> -->
      </div>
    </div>
  </div>
</footer>
</section>


   
   
</body>

</html>