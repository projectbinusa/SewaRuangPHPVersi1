<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
    body {
        margin: 40px;
        font-family: Arial, sans-serif;
    }

    .invoice {
        float: right;
        font-weight: bold;
        color: #705D56; 
    }

    .header {
        display: flex;
        align-items: center;
        background: #0C356A;
        padding: 10px;
        border-radius: 8px;
        color: white;
    }

    .header h2 {
        margin-left: 10px;
        color: white;
    }

    .invoice-container {
        margin-top: 30px;
        padding: 20px;
        background: #FFFFFF;
        border: 1px solid #D1CDC6;
        border-radius: 8px;
        /* color: #1F4172; */
    }

    .invoice h2 {
        color: #705D56;
        font-size: 24px;
        font-weight: bold;
        text-align: left; /* Align to the left */
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
    }

    .item-table th, .item-table td {
        padding: 10px;
        text-align: center; /* Center-align text */
    }

    .item-table tr th {
        border-top: 2px solid #705D56;
        border-bottom: 2px solid #705D56;
        margin: 0;
        padding: 10px;
        color: #1F4172;
    }

    .item-table td::before {
        content: "";
        display: block;
        text-align: center;
        margin-bottom: 5px; /* Adjust as needed */
    }

    .item-table tbody tr:last-child td {
        border-bottom: none; /* Remove bottom border for the last row in tbody */
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
    color: ; /* Tambahkan warna yang diinginkan */
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

<div class="invoice-container">
    <div class="invoice-yu">
        <h2>Bukti Pembayaran <span class="invoice">INVOICE</span></h2>
    </div>

    <div class="invoice-details">
        <table>
            <tr>
                <td>Email:</td>
                <td><?php echo $this->session->userdata('') ?></td>
            </tr>
            <tr>
                <td>Alamat:</td>
                <td><?php echo $this->session->userdata('') ?></td>
            </tr>
        </table>
    </div>

    <table class="item-table hover:table-fixed" id="itemTable">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Lantai</th>
                <th>Ruangan</th>
                <th>Kode Booking</th>
                <th>Hari Booking</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; foreach ($bukti as $key): { ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td></td>
                    <td><?php echo $key->no_lantai; ?></td>
                    <td><?php echo $key->no_ruang; ?></td>
                    <td></td>
                    <td></td>
                </tr>
            <?php } ?>
            <?php endforeach; ?>
        </tbody>
    </table>

    <div class="total">
        Total: <span id="displayTotal">RP 1.000.000</span>
    </div>

    <div class="payment-info">
        <h4>PAYMENT INFO</h4>
        <p>Bank: BNI</p>
        <p>Account Name:</p>
        <p>Account No:</p>
        <p>Payment by: Agustus 31 November 2022</p>
    </div>
</div>

</body>
