<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.5;
        }

        .header {
            text-align: center;
            padding: 20px;
            background: #3876BF;
            color: white;
        }

        .invoice-yu {
            text-align: center;
            margin-bottom: 20px;
        }

        .invoice-details {
            margin-bottom: 20px;
        }

        .invoice-details table {
            width: 100%;
            margin-bottom: 20px;
        }

        .invoice-details table th,
        .invoice-details table td {
            padding: 5px;
        }

        .invoice-details table th {
            background: #f2f2f2;
            text-align: left;
        }

        .item-table {
            width: 100%;
            border-collapse: collapse;
        }

        .item-table th,
        .item-table td {
            padding: 8px;
            text-align: left;
            /* border-bottom: 1px solid #ddd; */
        }

        .item-table th {
            background: #f2f2f2;
            font-weight: bold;
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
            color: #0C356A;
            border-left: 18px solid #0C356A;
            margin-left: 0;
            height: 30%; /* Set a large value for height */
        }

        .payment-info h4 {
            /* margin-bottom: 10%; */
            margin-left: 18px; /* Set margin-left to match the border-left width */
        }

        .payment-info p {
            margin-bottom: 10%;
            margin: 5px 0;
            margin-left: 18px; /* Set margin-left to match the border-left width */
        }
    </style>

    <title>Invoice</title>
</head>
<body>

    <div class="header">
        <img src="<?php echo base_url('image/logo.png') ?>" alt="Logo" style="width: 2px;">
        <h2>RuangSewa.com</h2>
    </div>

        <div class="invoice-yu">
            <h2>Bukti Pembayaran <span class="invoice">INVOICE</span></h2>
        </div>
<hr>
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
        <table rules="cols" class="item-table hover:table-fixed">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Ruangan/Lantai</th>
                    <th>Kode Booking</th>
                    <th>Snack</th>
                    <th>Status</th>
                    <th>total</th>
                </tr>
            </thead>
            <tbody >
                <?php $no = 1; foreach ($ruang as $key): { ?>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
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
            <p>Bank         <span class="info">:</span></p>
            <p>Account Name <span class="info">:</span></p>
            <p>Account No   <span class="info">:</span></p>
            <p>Payment by   <span class="info">:</span></p>
        </div>
    </div>

</body>
</html>
