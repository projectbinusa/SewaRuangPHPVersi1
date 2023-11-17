<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eksport PDF</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <style>
        @page {
            size: A5;
        }

        @page {
            size: A5;
        }

        body,
        html {
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            font-size: 12px;
            line-height: 1.2;
        }

        .header {
            text-align: center;
            background: #0C356A;
            color: whitesmoke;
            padding: 40px;
            padding: 40px;
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
            font-size: 85%;
            font-size: 85%;
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
            width: 100%;
            padding: 20px;
            padding: 20px;
            border-collapse: collapse;
        }

        .item-table td,
        .item-table th {
            padding: 15px;

            .item-table td,
            .item-table th {
                padding: 15px;
                font-size: 80%;
            }

            .item-table th {
                background: #f2f2f2;
                font-weight: bold;
            }

            .total {
                margin-bottom: 10%;
            }

            .total #displayTotal::after {
                content: attr(data-amount);
                display: inline-block;
                border-bottom: 1px solid #000000;
                margin-left: 5px;
                margin-right: 30px;
                margin-right: 30px;
            }

            .payment-info {
                /* font-size: 12px; */
                /* font-size: 12px; */
                font-weight: bold;
                color: #0C356A;
                border-left: 20px solid #0C356A;
                margin-right: 50%;
                height: 22%;
                margin-top: 5%;
                margin-right: 50%;
                height: 22%;
                margin-top: 5%;
            }

            .payment-info h4,
            .payment-info p {
                margin-left: 18px;
            }

            .payment-info .baru {
                margin-top: 30px;

                .payment-info .baru {
                    margin-top: 30px;
                }

                .container {
                    display: flex;
                    float: right;
                    color: #1F4172;
                    font-weight: bold;
                    font-size: 13px;
                    font-size: 13px;
                }

                .merah {
                    text-align: center;
                }
    </style>
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
        <p style="margin-left: 75%;"><?php echo date('F j, Y'); ?></p>
        <!-- <p style="margin-left: 75%;"><?php echo date('F j, Y'); ?></p> -->
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
                <th>Item</th>
                <th>Jumlah</th>
                <!-- <th></th> -->
                <!-- <th></th> -->
                <th>Harga sewa</th>
                <th>Total</th>
            </tr>
        </thead>
        <?php $no = 1; ?>
        <tbody>
            <?php
            $tanggalBooking = new DateTime($peminjaman->tanggal_booking);
            $tanggalBerakhir = new DateTime($peminjaman->tanggal_berakhir);
            $durasi = $tanggalBooking->diff($tanggalBerakhir);
            echo $durasi->days;

            $id_ruangan = $peminjaman->id_ruangan;
            $id_tambahan = $peminjaman->id_tambahan;
            // Fetch data from the database
            $nama_ruangan = tampil_ruangan_byid($id_ruangan);
            $nama_tambahan = tampil_nama_tambahan_byid($id_tambahan);
            $harga_ruangan = tampil_harga_ruangan_byid($id_ruangan);
            $harga_tambahan = tampil_harga_tambahan_byid($id_tambahan);
            $jumlah_tambahan = tampil_nama_tambahan_byid($id_tambahan);
            $total_tamnbahan = tampil_jumlah_tambahan_byid($id_tambahan);

            $total_tambahan = intval($total_tamnbahan) * intval($no);
            $jumlah_ruang = tampil_no_ruangan_byid($id_ruangan);
            ?>
            <tr>
                <td class="merah"><?php echo format_ruangan($nama_ruangan) ?></td>
                <td class="merah"><?php echo $durasi->days; ?></td>
                <td class="merah"><?php echo convRupiah($harga_ruangan); ?></td>
                <td class="merah"><?php echo convRupiah($harga_ruangan * $durasi->days); ?></td>
            </tr>

            <tr>
                <td class="merah">
                    <?php
                    // Mengasumsikan $nama_tambahan adalah variabel yang berisi data tambahan
                    if (is_array($nama_tambahan)) {
                        // Periksa apakah ada lebih dari satu elemen dalam array
                        if (count($nama_tambahan) > 1) {
                            // Jika ada lebih dari satu elemen, gabungkan dengan tanda hubung
                            echo implode(' - ', $nama_tambahan);
                        } else {
                            // Jika hanya ada satu elemen, cetak elemen tersebut
                            echo reset($nama_tambahan);
                        }
                    } else {
                        // Jika $nama_tambahan bukanlah array, langsung mencetaknya
                        echo $nama_tambahan;
                    }
                    ?>
                </td>
                <td class="merah"><?php echo $total_tambahan ?></td>
                <td class="merah"><?php echo convRupiah($harga_tambahan); ?></td>
                <td class="merah"><?php echo convRupiah($harga_tambahan); ?></td>
            </tr>
        </tbody>
        <?php $no++ ?>
    </table>
    <br>
    <div class="container">
        <div class="total" style="margin-bottom: -50%;">
            <span style=" margin-bottom: 100%;">Total harga :</span><span id="displayTotal" data-amount="<?php echo convRupiah(intval($harga_ruangan * $durasi->days) + intval($harga_tambahan)); ?>"></span>
        </div>
    </div>
    </div>
    <br><br><br>
    <div class="payment-info">
        <h4>PAYMENT INFO</h4>
        <?php date_default_timezone_set('Asia/Jakarta'); ?>
        <p class="baru">Tanggal :<span><?php echo date('F j,Y'); ?></span></p>
        <p>Jam Pemesanan : <span><?php echo date('H:i:s'); ?></span></p>
    </div>
</body>

</html>