<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .header h2{
            text-align: center;
            background: #f2f2f2;
        }

        .invoice {
            float: right;
            font-weight: bold;
            color: #705D56; 
        }

        .invoice-container {
            margin-top: 30px;
            padding: 20px;
            background: #FFFFFF;
            border: 1px solid #D1CDC6;
            border-radius: 8px;
        }

        .invoice h2 {
            color: #705D56;
            font-size: 24px;
            font-weight: bold;
            text-align: left;
        }

        .invoice-details {
            margin-top: 20px;
            font-size: 14px;
            font-weight: bold;
        }

        .invoice-details table {
            width: 100%;
        }

        .invoice-details table tr td {
            padding: 8px;
            border-left: px             
        }

        .item-table th,
        .item-table td {
            padding: 10px;
            text-align: center;
            border-right: 1px solid #D1CDC6; /* Menambah garis vertikal pada td */
        }

        .item-table td:last-child {
            border-right: none; /* Menghapus garis vertikal pada td terakhir */
        }

        .item-table th {
            border-top: 2px solid #705D56;
            border-bottom: 2px solid #705D56;
            margin: 0;
            padding: 10px;
            color: #0C356A;
            border-left: 0px ;              
        }

        .item-table td::before {
            content: "";
            display: block;
            text-align: center;
            margin-bottom: 5px;
        }

        .item-table tbody tr:last-child td {
            border-bottom: none;
        }

        .total {
            margin-top: 20px;
            text-align: right;
            font-size: 18px;
            font-weight: bold;
            color: #3876BF;
        }

        .payment-info {
            margin-top: 20px;
            font-size: 14px;
            font-weight: bold;
            background: linear-gradient(to right, #f2f2f2, transparent);
            padding: 20px;
            color: ; /* Tambahkan warna yang diinginkan */
            border-left: 20px solid #0C356A ; /* Lebar dan warna garis vertikal */
            margin-left: 0; /* Hapus margin kiri */
        }

        .payment-info h4 {
            margin-bottom: 10px;
        }

        .payment-info p {
            margin: 5px 0;
        }
    </style>

    <title>Invoice</title>
</head>
<body>

    <div class="header">
        <h2>RuangSewa.com</h2>
    </div>

        <div class="invoice-yu">
            <h2>Bukti Pembayaran <span class="invoice">INVOICE</span></h2>
        </div>

        <div class="invoice-details">
            <table>
                <tr>
                    <td>Email <span style="margin-left: 17px;">:</span></td>
                    <td><?php echo $this->session->userdata('') ?></td>
                </tr>
                <tr>
                    <td>Alamat <span style="margin-left: 8px;">:</span></td>
                    <td><?php echo $this->session->userdata('') ?></td>
                </tr>
            </table>
        </div>
<br><br>
        <table rules="cols" class="item-table hover:table-fixed" id="itemTable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Ruangan/Lantai</th>
                    <th>Kode Booking</th>
                    <th>Status</th>
                    <th>total</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; foreach ($bukti as $key): { ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td></td>
                        <td><?php echo $key->no_lantai; ?></td>
                        <td><?php echo $key->no_ruang; ?></td>
                        <td>free</td>
                        <td></td>
                    </tr>
                <?php } ?>
                <?php endforeach; ?>
            </tbody>
        </table>
<br>
        <div class="total">
            Total: <span id="displayTotal">RP 1.000.000</span>
        </div>
<br><br>
        <div class="payment-info">
            <h4>PAYMENT INFO</h4>
            <p>Bank         <span style="margin-left: 74px;">:</span></p>
            <p>Account Name <span style="margin-left: 17px;">:</span></p>
            <p>Account No   <span style="margin-left: 35px;">:</span></p>
            <p>Payment by   <span style="margin-left: 35px;">:</span></p>
        </div>
    </div>

</body>
</html>
