<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eksport PDF</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <style>
        @page {
            size: A5;
        }

        body,
        html {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            font-size: 12px;
            line-height: 1.2;
        }

        .header {
            /* text-align: center; */
            background: #0C356A;
            color: whitesmoke;
            padding-top: 40px;
            padding-bottom: 40px;
            padding-left: 30px;
            font-size: medium;
        }

        .invoice-yu {
            margin-left: 5%;
            margin-top: 20px;
        }

        .invoice {
            display: flex;
            flex-direction: column;
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
            font-size: 90%;
            margin-top: 5px;
            margin-left: 50%;
        }

        git  {
            margin: 0;
            margin-left: 5%;
            font-size: 100%;
        }

        .invoice-details table {
            margin-top: 0;
            margin-left: 5%;
            font-size: 90%;
        }

        .invoice-details table th {
            background: #f2f2f2;
        }

        .item-table {
            width: 100%;
            padding: 20px;
            border-collapse: collapse;
        }

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
        }

        .merah {
            text-align: center;
        }

        .supervisor-section {
            margin-left: 15%;
        }

        .payment-info {
            font-weight: bold;
            color: #0C356A;
            border-left: 20px solid #0C356A;
            display: flex;
            /* Use flexbox to arrange items horizontally */
            align-items: flex-start;
            /* Align items to the top */
            /* margin-top: 5%; */
            padding-left: 10px;
            /* Add padding for better spacing */
        }

        .payment-info::after {
            content: "";
            display: table;
            clear: both;
        }

        .booking-info {
            float: left;
        }

        .signature-section {
            float: left;
            margin-left: 200px;
            /* Atur margin kiri sesuai kebutuhan */
        }

        .signature-image {
            /* margin-top: 5px; */
            width: 100px;
            max-width: 100%;
        }
    </style>
</head>

<body>
    <?php if ($peminjaman) : ?>
        <?php foreach ($peminjaman as $row) : ?>
            <div class="header">
                <?php
                $image_path = FCPATH . 'image/logo.png'; // Sesuaikan dengan lokasi gambar
                $image_data = file_get_contents($image_path);
                $image_base64 = base64_encode($image_data);
                ?>

                <!-- Tambahkan baris untuk tanda tangan menggunakan base64 -->
                <img src="data:image/png;base64,<?= $image_base64 ?>" alt="Signature Image" class="signature-image" style="width: 150px;">
                <!-- <h2>RuangSewa.com</h2> -->
            </div>
            <div class="invoice-yu">
                <h1 class="invoice">
                    CUSTOMER
                    <span class="name-customer">INVOICE</span>
                </h1>
                <h5 style="margin-left: 76%;"><?php echo date('F j, Y'); ?></h5>
            </div>
            <div class="invoice-details">
                <table>
                    <tr>
                        <td>Name Customer : <span style="margin-left: 9px;"><?php echo tampil_nama_penyewa_byid($row->id_pelanggan) ?></span></td>
                    </tr>
                    <tr>
                        <td>Email Customer : <span style="margin-left: 9px;"><?php echo tampil_email_penyewa_byid($row->id_pelanggan) ?></span></td>
                    </tr>
                    <tr>
                        <td>Nomor Telephone :<span style="margin-left: 8px;"><?php echo tampil_nomer_penyewa_byid($row->id_pelanggan) ?></span></td>
                    </tr>
                    <tr>
                        <td>Kode pemesanan :<span style="margin-left: 8px;"><?php echo $row->kode_booking ?></span></td>
                    </tr>
                    <tr>
                        <td>Keperluan :<span style="margin-left: 8px;"><?php echo $row->keperluan ?></span></td>
                    </tr>
                </table>
            </div>
            <table rules="rows" class="item-table hover:table-fixed" id="itemTable">
                <thead>
                    <tr>
                        <th>Item</th>
                        <th>Jumlah Item</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($row->id_ruangan)) : ?>
                        <tr>
                            <td class="merah"><?php echo tampil_ruang_byid($row->id_ruangan) ?></td>
                            <td class="merah">
                                <?php $tanggalBooking = new DateTime($row->tanggal_booking);
                                $tanggalBerakhir = new DateTime($row->tanggal_berakhir);
                                $durasi = $tanggalBooking->diff($tanggalBerakhir);
                                $hari = $durasi->days;
                                echo $durasi->days . ' Hari';
                                ?>
                            </td>
                        </tr>
                    <?php endif; ?>
                    <?php if (!empty($row->id_tambahan)) : ?>
                        <?php foreach (explode(',', $row->id_tambahan) as $id_tambahan) : ?>
                            <tr>
                                <td class="merah">
                                    <?php echo tampil_nama_tambahan_byid($id_tambahan) ?>
                                </td>
                                <td class="merah">
                                    <?php if (tampil_info_tambahan_byid($id_tambahan) == 'Alat') {
                                        echo '1';
                                    } else if (tampil_info_tambahan_byid($id_tambahan) == 'Makanan' || tampil_info_tambahan_byid($id_tambahan) == 'Minuman') {
                                        echo tampil_nama_satuan_tambahan_byid($id_tambahan);
                                    } ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>

            <div class="payment-info">
                <div class="booking-info">
                    <h4>BOOKING INFO </h4>
                    <?php
                    date_default_timezone_set('Asia/Jakarta');
                    $namaBulan = [
                        'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
                        'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
                    ];
                    $bulan = date('n') - 1;
                    echo '<p class="baru">Tanggal :<span>' . date('j ') . $namaBulan[$bulan] . date(' Y') . '</span></p>';
                    ?>
                    <p>Jam Pemesanan : <?php echo date('H:i'); ?></p>
                </div>

                <div class="signature-section">
                    <!-- Tambahkan baris untuk tanda tangan menggunakan base64 -->
                    <?php
                    $image_path = FCPATH . 'image/icon.png'; // Sesuaikan dengan lokasi gambar
                    $image_data = file_get_contents($image_path);
                    $image_base64 = base64_encode($image_data);
                    ?>
                    <p>Tanda tangan :</p>
                    <img src="data:image/png;base64,<?= $image_base64 ?>" alt="Signature Image" class="signature-image">
                    <p><?php echo tampil_nama_user_byid($row->id_user); ?></p>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else : ?>
        <p>Data peminjaman tidak ditemukan.</p>
    <?php endif; ?>
</body>

</html>