<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>
<h5>Contoh Form Grid</h5>
<form action="#">
	<div class="form-row">
		<div class="form-group col-md-6">
			<label for="contoh1">Nama</label>
			<input type="text" class="form-control" id="contoh1" placeholder="Nama">
		</div>
		<div class="form-group col-md-6">
			<label for="contoh2">Username</label>
			<input type="text" class="form-control" id="contoh2" placeholder="Username">
		</div>
	</div>
 
	<div class="form-row">
		<div class="form-group col-md-4">
			<label for="contoh1">Nama Ayah</label>
			<input type="text" class="form-control" id="contoh1" placeholder="Nama Ayah">
		</div>
		<div class="form-group col-md-4">
			<label for="contoh2">Pekerjaan Ayah</label>
			<input type="text" class="form-control" id="contoh2" placeholder="Pekerjaan Ayah">
		</div>
		<div class="form-group col-md-4">
			<label for="contoh2">Alamat Ayah</label>
			<input type="text" class="form-control" id="contoh2" placeholder="Alamat Ayah">
		</div>
	</div>
 
	<button type="submit" class="btn btn-primary">Tombol</button>
</form>
</body>
</html>