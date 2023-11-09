<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sewa Ruang</title>

    <!-- cdn fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="path-to-sweetalert2.css">
    <!-- Replace 'path-to-sweetalert2.css' with the actual path to your SweetAlert CSS file -->
    <script src="path-to-sweetalert2.js"></script>
    <!-- Replace 'path-to-sweetalert2.js' with the actual path to your SweetAlert JavaScript file -->

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Lato:wght@100;400;700&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            font-size: 62.5%;
        }

        body {
            font-family: 'Lato', sans-serif;
            font-size: 1.6rem;
            background-color: #E4F1FF;
            color: #222;
            padding: 0 5px;
        }

        .container {
            min-width: 20rem;
            max-width: 65rem;
            margin: 10rem auto;
        }

        .heading,
        .survey-form {
            background-color: #fff;
            padding: 1.3em 3rem 1.8rem 3rem;
            border-radius: 1rem;
            margin-bottom: 3rem;
            box-shadow: 0 0 20px 5px rgba(0, 0, 0, 0.15);
        }

        .heading {
            position: relative;
        }

        .survey-form {
            font-size: 1.8rem;
        }

        .green-bar {
            background-color: #4F709C;
            height: 1rem;
            width: 100%;
            position: absolute;
            top: 0;
            left: 0;
            border-top-left-radius: 1rem;
            border-top-right-radius: 1rem;
        }

        .main-heading {
            font-size: 3.5rem;
            margin-bottom: 1rem;
        }

        .main-description {
            margin-bottom: 2rem;
        }

        .instructions {
            font-size: 1.5rem;
            margin-top: 1rem;
        }

        .required {
            font-size: 1.6rem;
            color: #d61212;
        }

        label {
            display: block;
            font-size: 1.8rem;
            margin: 2rem 0;
        }

        input {
            display: block;
            width: 100%;
            margin: 2rem 0;
            font-size: 1.6rem;
        }

        .nama,
        .phone {
            min-height: 2rem;
            padding: 1em 0em;
            border: none;
            border-bottom: 1px solid #bcb9b9;
        }

        /* 
        input::placeholder {
            padding: 5rem;
        } */

        .submit {
            font-size: 1.7rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: #f4f4f4;
            background-color: #4F709C;
            border: 3px solid #4F709C;
            border-radius: 1rem;
            width: 15rem;
            padding: 1rem 2rem;
            margin: 4rem auto 2rem auto;
            cursor: pointer;
            transition: all .3s;
        }

        .submit:hover {
            background-color: transparent;
            color: #222;
        }

        a:link,
        a:visited {
            color: #008080;
        }

        .form-group {
            position: relative;
        }
    </style>
</head>

<body>
    <main>
        <?php $this->load->view('sidebar'); ?>
           
            <header class="heading">
                <div class="green-bar"></div>
                <h1 id="title" class="main-heading">UPDATE DATA</h1>
            </header>
            <?php foreach ($pelanggan as $row ) : ?>
            <form action="<?php echo base_url('pelanggan/aksi_update_data')?>" method="post" id="survey-form" class="survey-form">
            <input name="id" type="hidden" value="<?php echo $row->id?>">
                <label for="nama">Nama</label>
                <input type="text" name="nama" id="nama" class="nama" 
                value="<?php echo $row->nama ?>">

                <label for="phone">Phone</label>
                <input type="text" name="phone" id="phone" class="phone" 
                value="<?php echo $row->phone ?>">

                <label for="payment_method">Payment Method</label>
                <input type="text" name="payment_method" id="payment_method" class="payment_method" 
                value="<?php echo $row->payment_method ?>">

                <input type="submit" id="submit" class="submit" value="update">
            </form>
        
            <?php endforeach ?>
          
        
    </main>

</body>
<script>
    function displaySweetAlert() {
    const message = "<?php echo $this->session->flashdata('sukses'); ?>";
    const error = "<?php echo $this->session->flashdata('error'); ?>";

    if (message) {
        Swal.fire({
            title: 'Success!',
            text: message,
            icon: 'success',
            confirmButtonText: 'OK'
        });
    } else if (error) {
        Swal.fire({
            title: 'Error!',
            text: error,
            icon: 'error',
            confirmButtonText: 'OK'
        });
    }
}


</script>
</html>