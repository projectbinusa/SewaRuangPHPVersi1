
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eksport PDF</title>
    <style>
        body,
        html {
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            line-height: 1.2;
        }

        .header {
            text-align: center;
            background: #0C356A;
            color: whitesmoke;
            padding: 60px;
            margin-top: 10px;
        }

        .invoice {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 0;
            font-weight: bold;
            color: #1F4172;
        }

        .invoice h1 {
            margin: 0;
        }

        .name-customer {
            color: #1F4172;
            font-size: larger;
            margin-left: 50%;
        }

        .invoice-yu {
            margin-left: 5%;
            margin-top: 40px;
        }

        .invoice-details table {
            margin-left: 5%;
            font-size: 90%;
        }

        .invoice-details table th {
            background: #f2f2f2;
        }

        .item-table {
            padding-left: 30px;
            padding-right: 30px;
            width: 100%;
            border-collapse: collapse;
        }

        .item-table td {
            padding: 25px;
            font-size: 80%;
        }

        .item-table th {
            background: #f2f2f2;
            font-weight: bold;
            padding-top: 10px;
            padding-bottom: 10px;
        }

        .total {
            margin-bottom: 10%;
        }

        .total #displayTotal::before {
            /* display: inline-block; */
            vertical-align: top;
            margin-right: 100%;
        }

        .total #displayTotal::after {
            content: attr(data-amount);
            display: inline-block;
            border-bottom: 1px solid #000000;
            margin-left: 5px;
            margin-bottom: auto;
            margin-right: 60px;
        }

        .payment-info {
            font-size: 16px;
            font-weight: bold;
            color: #0C356A;
            border-left: 20px solid #0C356A;
            margin-right: 20%;
            height: 20%;
            margin-top: 10%;
        }

        .payment-info h4,
        .payment-info p {
            margin-left: 18px;
        }

        .payment-info .baru{
            margin-top: 50px;
        }

        .container {
            display: flex;
            float: right;
            color: #1F4172;
            font-weight: bold;
            font-size: medium;
        }

        .merah {
            text-align: center;
        }
    </style>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eksport PDF</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
</head>

<body>
    <div class="header">
        <h2>RuangSewa.com</h2>
    </div>


    <div class="invoice-yu">

        <h1 class="invoice">
            CUSTOMER
            <span class="name-customer">INVOICE</span>
        </h1>
        <p style="margin-left: 75%;"><?php echo date('F, j-Y'); ?></p>

    </div>

    <div class="invoice-details">

        <table>
            <tr>
                <td>Name Customer: <span style="margin-left: 9px;"><?php echo tampil_nama_penyewa_byid($peminjaman->id_pelanggan) ?></span></td>
            </tr>
            <tr>
                <td>Nomor Telephone :<span style="margin-left: 8px;"><?php echo tampil_nomer_penyewa_byid($peminjaman->id_pelanggan) ?></span></td>
            </tr>
            <tr>
                <td>Kode pemesanan :<span style="margin-left: 8px;"><?php echo $peminjaman->kode_booking ?></span></td>
            </tr>
        </table>
    </div>
    <br><br>
    <table rules="rows" class="item-table hover:table-fixed" id="itemTable">
        <thead>
            <tr>
                <th>No</th>
                <th>Item</th>
                <th>Jumlah</th>
                <th>Harga sewa</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; ?>
            <tr>
                <td class="merah"><?php echo $no . '.'; ?></td>
                <td class="merah"><?php echo format_ruangan(tampil_nama_ruangan_byid($peminjaman->id_ruangan)) . " - " . tampil_nama_tambahan_byid($peminjaman->id_tambahan) ?></td>
                <td class="merah"><?php echo $peminjaman->jumlah_orang ?></td>
                <td class="merah"><?php echo $no ?></td>
                <td class="merah"><?php echo convRupiah(tampil_harga_ruangan_byid($peminjaman->id_ruangan)); ?></td>
                <td class="merah"><?php echo convRupiah(intval(tampil_harga_ruangan_byid($peminjaman->id_ruangan)) + intval(tampil_harga_tambahan_byid($peminjaman->id_tambahan))); ?></td>
            </tr>
            <?php $no++; ?>
        </tbody>
    </table>
    <br>
    <div class="container">

        <div class="total" style="margin-bottom: -50%;">
            <span style=" margin-bottom: 100%;">Total harga :</span><span id="displayTotal" data-amount="<?php echo convRupiah(tampil_harga_ruangan_byid($peminjaman->id_ruangan) + tampil_harga_tambahan_byid($peminjaman->id_tambahan)); ?>"></span>

    </div>
    <br><br><br>
    <div class="payment-info">

    <h4>PAYMENT INFO</h4>
        <?php date_default_timezone_set('Asia/Jakarta'); ?>
        <p class="baru">Tanggal :<span><?php echo date('F, j-Y'); ?></span></p>
        <p>Jam Pemesanan : <span><?php echo date('H:i'); ?></span></p>
        <p>Pembayaran melalui :<span><?php echo tampil_pyment_penyewa_byid($peminjaman->id_pelanggan) ?></span></p>

    </div>
</body>

</html>