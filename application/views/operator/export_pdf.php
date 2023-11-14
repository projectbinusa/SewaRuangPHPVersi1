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
            /* width: 70%; */
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
            padding: 10px;
            font-size: 80%;
        }

        .item-table th {
            background: #f2f2f2;
            font-weight: bold;
        }

        .total {
            margin-top: 20px;
            text-align: right;
            font-size: medium;
            font-weight: bold;
            color: #1F4172;
        }

        .total #displayTotal::after {
            content: 'RP';
            display: inline-block;
            border-bottom: 1px solid #1F4172;
            padding-bottom: 4px;
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

<body>

    <div class="header">
        <img src="" alt="">
        <h2>RuangSewa.com</h2>
    </div>

    <div class="invoice-yu">
        <h1 class="invoice">INVOICE</h1>
        <p class="name-customer">Nama Customer Booking </p>
    </div>

    <div class="invoice-details">
        <table>
            <tr>
                <td>Nama penyewa<span style="margin-left: 9px;">:</span></td>
                <td class="biru"><?php echo $this->session->userdata('') ?>rara</td>
            </tr>
            <tr>
                <td>No Telephone <span style="margin-left: 8px;">:</span></td>
                <td class="biru"><?php echo $this->session->userdata('') ?>945737264763</td>
            </tr>
            <tr>
                <td>Kode Booking <span style="margin-left: 8px;">:</span></td>
                <td class="biru"><?php echo $this->session->userdata('') ?>rara#sewaa</td>
            </tr>
        </table>
    </div>
    <br><br>
    <table rules="all" class="item-table hover:table-fixed" id="itemTable">
        <thead>
            <tr>
                <th>No</th>
                <th>Ruangan/Lantai</th>
                <th>Snack</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach ($ruang as $key) : {
            ?>
                    <tr>
                        <td class="merah"><?php echo $no . '.'; ?></td>
                        <td>R 1/ L 3</td>
                        <td>stik poteto and orenge jus</td>
                        <td>1.655.00</td>
                    </tr>
                <?php
                    $no++;
                } ?>
            <?php endforeach; ?>
        </tbody>

    </table>
    <br>
    <div class="container">
        <div class="sub">
            Total Item
            <span>: </span>
        </div><br>
        <div class="air">
            Sale :
            <span id="displayTotal">% </span>
        </div>
        <div class="total">
            Total Harga:
            <span id="displayTotal"></span>
        </div>
    </div><br><br><br>
    <div class="payment-info">
        <h4>PAYMENT INFO</h4>
        <p>Bank <span class="info">:</span></p>
        <p>Account Name <span class="info">:</span></p>
        <p>Account No <span class="info">:</span></p>
        <p>Payment by <span class="info">:</span></p>
    </div>

</body>

</html>