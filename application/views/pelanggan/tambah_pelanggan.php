<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <title>Tambah Pelanggan</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <style>
    body {
        display: flex;
        margin: 0;
        min-height: 100vh;
        background-color: #ffff;
    }
  
   
   
    #content {
        flex: 1;
        margin-left: 70px;
        transition: 0.3s;
        padding: 10px;
    }
  
   
   
   
  
  
    
    .card {
        border: 1px solid #1b9383;
        border-radius: 10px;
        max-width: 1200px;
        text-align: center;
        text-center: 120;

    }
    /* CSS untuk gambar profil */
    .card img {
        width: 100px;
        /* Sesuaikan ukuran gambar profil sesuai kebutuhan Anda */
        height: 100px;
        object-fit: cover;
        border: 2px solid #1a685d;
        border-radius: 50%;
        margin-bottom: 10px;
    }
   
    .tambah_pelanggan {
        text-align: center;
        
    }
  
      
       
    </style>
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
      
                            </form>
                        </div>
                        
                    </div>
                        
                        
                        
                        
                        
                    </body>
                    </html>