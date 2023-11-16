<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kirim Email</title>
</head>
<body>
    <h1>Percobaan Kirim Email</h1>
    <hr>
    <form action="kirim_proses" method="post">
        <p>
            <label>No. Invoice</label>
            <input type="text" name="no_invoice" 
            placeholder="Isi angka saja">
        </p>
        <p>
            <label>Nama Pengirim</label>
            <input type="text" name="nama_pengirim" 
            placeholder="Isi nama">
        </p>
        <p>
            <label>Email</label>
            <input type="text" name="email" 
            placeholder="Isi email">
        </p>
        <button type="submit" name="submit">Kirim</button>
    </form>
</body>

</html>

