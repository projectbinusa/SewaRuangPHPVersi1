<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <title>Profile</title>
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
        margin-left: 250px;
        transition: 0.3s;
        padding: 20px;
    }
  
   
   
   
  
  
    
    .card {
        border: 1px solid #66f5ff;
        border-radius: 10px;
        max-width: 1200px;
        text-align: center;
    }
    /* CSS untuk gambar profil */
    .card img {
        width: 100px;
        /* Sesuaikan ukuran gambar profil sesuai kebutuhan Anda */
        height: 100px;
        object-fit: cover;
        border: 2px solid #66fffa;
        border-radius: 50%;
        margin-bottom: 10px;
    }
   
    .tambah_pelanggan {
        text-align: center;
    }
  
      
       
    </style>
</head>
<body>
  <div id="content">
                <div class="card mb-4 shadow">
                    <div class="card-body d-flex text-white justify-content-between align-items-center"
                        style="background-color:#4F709C">
                        <h1 class="tambah_pelanggan">TAMBAH PELANGGAN</h1>
                     
                  
                    
                   
              
                    </div>
                    
                    
                        </div>
                        <div class="center">
                            <h3 class="text-center"><b>TAMBAH PELANGGAN</b></h3><br>
                            <hr>
                            <center>
                            <form action="<?php echo base_url('tampilan/aksi_tambah_pembayaran') ?>" method="post" class="row">
                                <div class="mb- col-5">
                <label for="nama" class="form-label"><b>NAMA</b></label>
                
                <input type="text" class="form-control" id="nama" name="nama"
                placeholder="Masukan nama anda">
                
            </div>
            <div class="mb-4 col-5">
                <label for="phone" class="form-label"><b>PHONE</b></label>
                
                <input type="text" class="form-control" id="phone" name="phone"
                placeholder="Phone">
               
            </div>          
                            <div class="mb-4 col-10">
                                <label for="payment_method" class="form-label"><b>PAYMENT METHOD</b></label>
                                <input type="text" class="form-control" id="payment_method" name="payment_method"
                                placeholder="Peyment Method">
                                <br>
                                <button type="submit" class="btn btn-sm btn-primary">Confirmasi</button> 
                                
                                <a href="<?php echo base_url('tampilan/data_master_pelanggan') ?>" class="btn btn-sm btn-danger">Kembali</a>        
                            </form>
                        </div>
                    </center>                   

    

    
    
</body>
</html>