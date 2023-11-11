<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sewa Ruang</title>

    <!-- cdn fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Lato:wght@100;400;700&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
/* 
        html {
            font-size: 62.5%;
        } */

        body {
            font-family: "DM Sans", sans-serif;
            /* font-size: 1.6rem; */
            background-color: #E4F1FF;
            color: #222;
            padding: 0 0px;
        }

        .container-tambah-user {
            /* px-36 pt-10  */
            padding: 40px 7.5rem 20px 7.5rem;
            /* min-width: 20rem;
            max-width: 65rem;
            margin: 4rem auto; */
        }

        .heading,
        .survey-form {
            background-color: #fff;
            padding: 1.3em 3rem 1.8rem 3rem;
            border-radius: 1rem;
            margin-bottom: 2.5rem;
            box-shadow: 0 0 20px 5px rgba(0, 0, 0, 0.15);
        }

        .heading {
            position: relative;
        }

        .survey-form {
            font-size: 15px;
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
            font-size: 2rem;
            margin-bottom: 1rem;
            height: 1.5rem;
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
            font-size: 1.1rem;
            margin: 30px 0;
            line-height: 1px;
        }

        input {
            display: block;
            width: 100%;
            height: 29px;
            margin: 5px 0;
            font-size: 1.6rem;
            line-height: 1px;
        }

        .username,
        .email,
        .password {
            min-height: 2rem;
            padding: 1rem 0;
            border: none;
            border-bottom: 1px solid #bcb9b9;
        }

        .submit {
            font-size: 14px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: #f4f4f4;
            background-color: #4F709C;
            border: 3px solid #4F709C;
            border-radius: 1rem;
            width: 8rem;
            height: 2.5rem;
            padding: 8px 2rem;
            margin: 40px auto 10px auto;
            cursor: pointer;
            transition: all .3s;
        }

        .submit:hover {
            background-color: transparent;
            color: #222;
        }

     

        .form-group {
            position: relative;
        }

        .password-toggle {
            position: absolute;
            top: 80%;
            transform: translateY(-50%);
            right: 12.9rem;
            cursor: pointer;
        }

        @media only screen and (max-width: 800px) {
            .password-toggle {
                top: 59rem;
                right: 4.9rem;
            }

            .container-tambah-user {
            /* px-36 pt-10  */
            padding: 40px 15px 20px 15px;
        }

        .main-heading {
            font-size: 20px;
            margin-bottom: 1rem;
            height: 1.5rem;
            width: 10rem;
        }
        }
    </style>
</head>

<body>
<?php $this->load->view('sidebar'); ?>

    <main>
        <div class="container-tambah-user">
            <header class="heading">
                <div class="green-bar"></div>
                <h1 id="title" class="main-heading">Form Tambah Operator</h1>
            </header>

            <form action="<?php echo base_url('supervisor/aksi_tambah_user_operator') ?>" method="post" id="survey-form"
                class="survey-form">
                <label for="username" id="name-label">Name<span class="required">*</span></label>
                <input type="text" name="username" id="username" class="username" placeholder="Masukkan nama anda"
                    required>

                <label for="email" id="email-label">Email<span class="required">*</span></label>
                <input type="email" name="email" id="email" class="email" placeholder="Masukkan email anda" required>

                <label for="password" id="password-label">Password<span class="required">*</span></label>
                <i class="password-toggle fa fa-eye-slash" onclick="togglePassword()"></i>
                <input type="password" name="password" id="password" class="password" placeholder="Masukkan password anda"
                    required>

                <input type="submit" id="submit" class="submit" value="Submit">
            </form>


        </div>
    </main>
</body>
<script type="text/javascript">
    function togglePassword() {
        var passwordField = document.getElementById('password');
        var passwordToggle = document.querySelector('.password-toggle');

        if (passwordField.type === "password") {
            passwordField.type = "text";
            passwordToggle.classList.remove('fa-eye-slash');
            passwordToggle.classList.add('fa-eye');


        } else {
            passwordField.type = "password";
            passwordToggle.classList.add('fa-eye-slash');
            passwordToggle.classList.remove('fa-eye');

        }
    }
</script>

</html>