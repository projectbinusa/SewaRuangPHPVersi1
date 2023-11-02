<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <style>
    body {
        display: flex;

        margin: 0;
        min-height: 100vh;
        background-color: #61677A;

    }

    #sidebar {
        background-color: #272829;

        color: #ffffff;
        height: 100%;
        width: 250px;
        position: fixed;
        left: 0;
        top: 0;
        transition: 0.3s;
        padding-top: 20px;
    }

    #sidebar a {
        padding: 10px 15px;
        text-decoration: none;
        color: #ffffff;
        display: block;
    }

    #sidebar a:hover {
        background-color: black;

    }

    #content {
        flex: 1;
        margin-left: 250px;
        transition: 0.3s;
        padding: 20px;
    }

    @media screen and (max-width: 788px) {
        #sidebar {
            width: 100%;
            position: static;
            height: auto;
            margin-bottom: 20px;
        }

        #content {
            margin-left: 0;
        }
    }
    </style>
</head>

<body class="flex h-screen bg-gray">
    <!-- Sidebar -->
    <div id="sidebar" class="col-md-3 col-lg-2 d-md-block">
      <span class="ml-3">案内板 SISTEM INFORMASI</span>
      
        <a href="<?php echo base_url('admin/dasboard') ?>">
            <i class=" mr-2"></i> <li>案 Dasboard</li>
        </a>
        <a href="<?php echo base_url('admin/akun') ?>">
            <i class="fas mr-2"></i> <li>案 Akun</li>
        </a>
        <a href="<?php echo base_url('admin') ?>">
            <i class="fas mr-2"></i> <li>案 Lobi</li>
        </a>
        <aside id="separator-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0" aria-label="Sidebar">
   <div class="h-full px-3 py-4 overflow-y-auto bg-gray-50 dark:bg-gray-800">
      <ul class="space-y-2 font-medium">
         

          
               </svg>
               
            
        
         
         <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group"> 
        
            </a>
            <hr>
         
            <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
            
               <hr>
            </a>
            <hr>
         
        
            <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
           
               <hr>
            </a>
            <hr>
        
        
       
      </div>
</aside>
      </div>
        </div>





        
    </div>
    <div id="content" role="main">
        <header class="flex justify-between items-center p-4 bg-white border-b-2 border-gray-200">
            <h1 class="text-4xl">Data Master Pelanggan</h1>
            <div class="flex items-center space-x-2">

            </div>
        </header>
        <br>
        <div class="row ">
            <div class="col-12 card p-7">
                <div class="card-body min-vh-200  align-items-center">
                    <div class="card w-40 m-auto p-3">
                        <table class="table  table-striped"> 
                            <center><h1><b>Data Master Pelanggan</b></h1></center>
                            <hr>
                   
                        
                        
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
                                    <a href="<?php echo base_url('tampilan/tambah_Pelanggan') ?>" class="btn btn-primary">Tambah</a> 
                            </form>
                   
                   

                </div>
            </div><


           


   
   
</body>

</html>