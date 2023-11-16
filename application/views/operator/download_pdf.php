<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your PDF</title>
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
            padding: 30px;
        }

        .invoice {
            margin-left: 70%;
            font-weight: bold;
            color: #1F4172;
            margin-bottom: 0;
        }

        .invoice-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 3%;
        }

        .invoice p {
            text-align: center;
            margin: 0px;
        }

        .invoice-yu {
            margin-left: 5%;
            margin-top: 40px;
        }

        .invoice-details table {
            margin-left: 5%;
            font-size: 80%;
        }

        .invoice-details table th {
            background: #f2f2f2;
        }

        .item-table {
            padding-left: 50px;
            padding-right: 50px;
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

        .total #displayTotal::after {
            content: ':';
            display: inline-block;
            border-bottom: 1px solid #1F4172;
            padding-bottom: 4px;
            margin-left: 5px;
            margin-right: 20px;
        }

        .total span#displayTotal::after {
            content: attr(data-amount);
            display: inline-block;
            border-bottom: 1px solid #000000;
            /* padding-bottom: 4px; */
            margin-left: 5px;
            margin-right: 20px;
        }

        .payment-info {
            font-size: 14px;
            font-weight: bold;
            color: #0C356A;
            border-left: 18px solid #0C356A;
            margin-right: 20%;
            height: 20%;
            margin-top: 10%;
        }

        .payment-info h4,
        .payment-info p {
            margin-left: 18px;
        }

        .container {
            display: flex;
            float: right;
            color: #1F4172;
            font-weight: bold;
            font-size: medium;
        }

        .name-customer {
            color: #1F4172;
            font-size: larger;
        }

        .merah {
            text-align: center;
        }
    </style>

</head>

<body style="text-align: center;">

    <div class="header">
        <img src="" alt="">
        <p style="font-size: 55px; font-weight: bold;"><span style="font-weight: italic;">Semarang</span></p>
        <p style="color: #776B5D; text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5); font-size: 50px; margin-top: 5%;">Semakin hebat!</p>
    </div>

    <div class="invoice-yu">

        <p class="invoice" style="font-weight: bold;">Trans Semarang</p>
        <p class="name-customer">Call Center 1-5000-94</p>
        <p class="name-customer">BUS SG02 (BISG02)</p>
        <p class="name-customer">NAME</p>
    </div>

    ------------------------------------------------------------------------------------
    <h1>Regular Pelajar</h1>
    ------------------------------------------------------------------------------------

    <div class="baru">
        <p>Transaksi  : 1.000</p>
        <p>Tanggal    : 11/15/2023</p>
    </div>

    <div class="fer">
        <img src="https://blog.aspose.com/id/barcode/php-barcode-generator-reader-and-scanner-api/images/generate-barcode.png" style="width:10%">
    </div>

    <div class="ort">
        <p>Transaksi berlaku</p>
        <p>Selama tidak meninggalkan</p>
        <p>halte transit yang telah ditentukan</p>

        <h1 class="invoice">INVOICE</h1>
        <p class="name-customer">Customer</p>
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
                <td class="merah"><?php echo $no ?></td>
                <td class="merah"><?php echo convRupiah(tampil_harga_ruangan_byid($peminjaman->id_ruangan)); ?></td>
                <td class="merah"><?php echo convRupiah(intval(tampil_harga_ruangan_byid($peminjaman->id_ruangan)) + intval(tampil_harga_tambahan_byid($peminjaman->id_tambahan))); ?></td>
            </tr>
            <?php $no++; ?>
        </tbody>

    </table>
    <br>
    <div class="container">                
        <div class="total">
            Total harga :
            <span id="displayTotal" data-amount="<?php echo convRupiah(tampil_harga_ruangan_byid($peminjaman->id_ruangan) + tampil_harga_tambahan_byid($peminjaman->id_tambahan)); ?>"></span>
        </div>

    </div><br><br><br>
    <div class="payment-info">
        <?php foreach ($ruangan as $key) : ?>
            <h4>PAYMENT INFO</h4>
            <p>Bank Dana</p>
            <p>Account Name :<span><?php echo base_url('') ?></span></p>
            <p>Account No :<span><?php echo base_url('') ?></span></p>
            <p>Payment by :<span><?php echo base_url('') ?></span></p>
        <?php endforeach; ?>
    </div>
</body>

</html>