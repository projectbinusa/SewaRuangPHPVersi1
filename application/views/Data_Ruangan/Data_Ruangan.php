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
</div>
</body>
</html>