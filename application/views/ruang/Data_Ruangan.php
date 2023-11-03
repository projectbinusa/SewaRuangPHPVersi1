<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Master Ruangan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<style>
  nav a:hover{
    background: #4F709C;
    border-radius: 25px;
    padding:5px
}
nav{
    width: 100%;
    background: white;
    overflow: auto;
}
.card-header {
  margin-bottom: 20px;
  text-align:center;
}
.card-title{
  text-align: center;
}
.centered-buttons {
        display: flex;
        justify-content: center;
        margin-top: 15px;
        gap: 5px;
    }
.card-text{
  margin-left: 40%;
}
</style>
<body>
<?php $this->load->view('sidebar'); ?>
<div class="row row-cols-1 row-cols-md-3 g-4" style="padding:5px">
  <div class="col">
    <div class="card">
      <div class="card-header">Ruang 01</div>
              <!-- <img src="<?php echo  base_url('./image/master_ruangan/ruang1.png') ?>" height="150" width="150" class="rounded-circle"> -->
                  <img src="https://multipowerabadi.co.id/wp-content/uploads/2021/11/rr2-ruang-rapat-dengan-nuansa-yang-santai-menggunakan-sofa.png" style="width: 60%; margin-left: 18%; border-radius:">
      <div class="card-body">
        <h5 class="card-title">Ruang 1</h5>
        <p class="card-text">Avaible</p>
        <div class="centered-buttons">
                <button class="btn btn-primary">Detail Ruang</button>
                <button class="btn btn-info">Sewa</button>
            </div>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card">
      <div class="card-header">Ruang 02</div>
      <!-- <img src="<?php echo  base_url('./image/master_ruangan/ruang1.png') ?>" height="150" width="150" class="rounded-circle"> -->
      <img src="https://multipowerabadi.co.id/wp-content/uploads/2021/11/rr2-ruang-rapat-dengan-nuansa-yang-santai-menggunakan-sofa.png" style="width: 60%; margin-left: 18%; border-radius:">
      <div class="card-body">
        <h5 class="card-title">Ruang 2</h5>
        <p class="card-text">Avaible</p>
        <div class="centered-buttons">
                <button class="btn btn-primary">Detail Ruang</button>
                <button class="btn btn-info">Sewa</button>
            </div>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card">
      <div class="card-header">Ruang 03</div>
      <!-- <img src="<?php echo  base_url('./image/master_ruangan/ruang1.png') ?>" height="150" width="150" class="rounded-circle"> -->
      <img src="https://multipowerabadi.co.id/wp-content/uploads/2021/11/rr2-ruang-rapat-dengan-nuansa-yang-santai-menggunakan-sofa.png" style="width: 60%; margin-left: 18%; border-radius:">
      <div class="card-body">
        <h5 class="card-title">Ruang 3</h5>
        <p class="card-text">Avaible</p>
        <div class="centered-buttons">
                <button class="btn btn-primary">Detail Ruang</button>
                <button class="btn btn-info">Sewa</button>
            </div>
      </div>
    </div>
  </div>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<style>
 /* Webpixels CSS */
/* Utility and component-centric Design System based on Bootstrap for fast, responsive UI development */
/* URL: https://github.com/webpixels/css */

@import url(https://unpkg.com/@webpixels/css@1.1.5/dist/index.css);

/* Bootstrap Icons */
@import url("https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.4.0/font/bootstrap-icons.min.css");

</style>
<body style="background: #4F709C;">
<!-- Banner -->
<a href="#" class="btn w-full btn-primary text-truncate rounded-0 py-2 border-0 position-relative" style="z-index: 1000;">
    <strong>Lihat lebih detail Tentang Web Kami-></strong>
</a>

<!-- Dashboard -->
<div class="d-flex flex-column flex-lg-row h-lg-full bg-surface-secondary">
    <!-- Vertical Navbar -->
    <nav class="navbar show navbar-vertical h-lg-screen navbar-expand-lg px-0 py-3 navbar-light bg-white border-bottom border-bottom-lg-0 border-end-lg" id="navbarVertical">
        <div class="container-fluid">
            <!-- Toggler -->
            <button class="navbar-toggler ms-n2" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarCollapse" aria-controls="sidebarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Brand -->
            <a class="navbar-brand py-lg-2 mb-lg-5 px-lg-6 me-0" href="#">
                <img src="https://ascom.co.id/wp-content/uploads/2023/07/ascom.jpeg" style="width: 30%; heigth: 10%;">
            </a>
            <!-- User menu (mobile) -->
            <!-- <div class="navbar-user d-lg-none">
                <div class="dropdown">
                    <a href="#" id="sidebarAvatar" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    </a>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="sidebarAvatar">
                        <a href="#" class="dropdown-item">Profile</a>
                        <a href="#" class="dropdown-item">Settings</a>
                        <a href="#" class="dropdown-item">Billing</a>
                        <hr class="dropdown-divider">
                        <a href="#" class="dropdown-item">Logout</a>
                    </div>
                </div>
            </div> -->
            <div class="collapse navbar-collapse" id="sidebarCollapse" style="bacground: #4F709C;">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="bi bi-house"></i> Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="bi bi-bar-chart"></i> Pilih Lantai
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="bi bi-bookmarks"></i> Pilih Nomor Ruang
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="bi bi-people"></i> Administras
                        </a>
                    </li>
                </ul>
                <hr class="navbar-divider my-5 opacity-20">
                <ul class="navbar-nav mb-md-4">
                    <li>
                        <div class="nav-link text-xs font-semibold text-uppercase text-muted ls-wide" href="#">
                            Pemilik
                        </div>
                    </li>
                    <li>
                        <a href="#" class="nav-link d-flex align-items-center">
                            <div class="me-4">
                            </div>
                            <div>
                                <span class="d-block text-sm font-semibold">
                                   hubungi untuk pengaduan
                                </span>
                                <span class="d-block text-xs text-muted font-regular">
                                   0877654923164
                                </span>
                            </div>
                            <div class="ms-auto">
                                <i class="bi bi-chat"></i>
                            </div>
                        </a>
                    </li>
                <div class="mt-auto"></div>
                <ul class="navbar-nav">
                    <!-- <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="bi bi-person-square"></i> Account
                        </a>
                    </li> -->
                  </ul>
                </div>
                <a class="nav-link" href="#">
                    <i class="bi bi-box-arrow-left"></i> Logout
                </a>
            
        </div>
    </nav>
    <div class="h-screen flex-grow-1 overflow-y-lg-auto">
        <header class="bg-surface-primary border-bottom pt-6">
            <div class="container-fluid">
                <div class="mb-npx">
                    <div class="row align-items-center">
                        <div class="col-sm-6 col-12 shadow-lg p-3 mb-5 rounded" style="width: 100%;">
                            <h1 class="h2 mb-0 ls-tight">Sewa Ruang.com</h1>
                        </div>
                        <div class="col-sm-6 col-12 text-sm-end" style="margin-left:50%">
                            <div class="mx-n1">
                                <a href="<?php echo base_url('ruang/tambah_ruang') ?>" class="btn d-inline-flex btn-sm btn-primary mx-1">
                                    <span class=" pe-2">
                                        <i class="bi bi-plus"></i>
                                    </span>
                                    <span>Tambah Ruang</span>
                                </a>
                            </div>
                        </div>
                        <div class="container">
                          <div class="d-lg-flex">
                            <div class="card border-0 me-lg-4 mb-lg-0 mb-4"> 
                              <div class="backgroundEffect">
                              <div class="card-header" style="background: #F5F5F5;">
                                   <b>Ruang 09</b>
                                </div>
                              </div> 
                              <div class="pic"> 
                                <img class="" src="https://ifcjakarta.co.id/blog/uploads/berita/20230816153735_bg_ruang_meeting_kantor_(1).jpg" style="width: 80%; heigth: 65%; margin-left:10%; padding: 2%;">
                                <!-- <img src="<?php echo base_url() ?>image/ruangan/ruang1.jpeg"> -->
                                 <div class="date"> 
                                   <h3 class="year">Lantai No.10</h3>
                                 </div> 
                                </div> 
                                <div class="content"> 
                                  <div class="d-flex align-items-center justify-content-between mt-3 pb-3"> 
                                    <div class="btn btn-primary">Detail Ruang</span>
                                  </div> 
                                    </div> 
                                  </div> 
                                </div> 
                                <div class="card border-0 me-lg-4 mb-lg-0 mb-4"> 
                                  <div class="backgroundEffect">
                                    <div class="card-header" style="background: #F5F5F5;"> 
                                      <b>Ruang VIP</b>
                                    </div>
                                  </div> 
                                  <div class="pic"> 
                                    <img class="" src="https://s3-ap-southeast-1.amazonaws.com/xwork-gallery/rooms/images/356/1524046431.24/356_1524046431.24.lg.JPEG" style="width: 85%; heigth: 65%; margin-left:8%; padding: 2%;"> 
                                    <!-- <img src="<?php echo base_url() ?>image/ruangan/ruang1.jpeg"> -->
                                    <div class="date"> 
                                      <h3 class="year">Lantai No.05</h3> 
                                    </div> 
                                  </div> 
                                  <div class="content"> 
                                    <div class="d-flex align-items-center justify-content-between mt-3 pb-3"> 
                                      <div class="btn btn-primary">Detail Ruang</span>
                                    </div> 
                                    </div> 
                                  </div> 
                                </div> 
                                <div class="card border-0 mb-lg-0 mb-4"> 
                                  <div class="backgroundEffect">
                                    <div class="card-header" style="background: #F5F5F5;">
                                      <b>Ruang 15</b>
                                    </div>
                                  </div> 
                                  <div class="pic"> 
                                    <img class="" src="https://s3-ap-southeast-1.amazonaws.com/xwork-gallery/rooms/images/893/1576572743.06/893_1576572743.06.lg.JPEG" style="width: 88%; heigth: 75%; margin-left:5%; padding: 2%;"> 
                                    <!-- <img src="<?php echo base_url() ?>image/ruangan/ruang1.jpeg"> -->
                                    <div class="date"> 
                                      <h3 class="year">Lantai No.06</h3> 
                                    </div> 
                                  </div> 
                                  <div class="content"> 
                                     <div class="d-flex align-items-center justify-content-between mt-3 pb-3"> 
                                      <div class="btn btn-primary">Detail Ruang</span>
                                    </div> 
                                    </div> 
                                  </div> 
                                </div> 
                              </div> 
                            </div>
                    </div>
                </div>
            </div>
        </header>
      </div>
</div>
</body>
</html>