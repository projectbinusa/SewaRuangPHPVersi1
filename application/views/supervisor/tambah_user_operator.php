<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sewa Ruang</title>

    <!-- cdn fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!-- <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script> -->

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Lato:wght@100;400;700&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: "DM Sans", sans-serif;
            background-color: #E4F1FF;
            color: #222;
            padding: 0 0px;
        }

        .container {
            min-width: 20rem;
            max-width: 65rem;
            margin: 1rem auto;
            padding: 30px 7.5rem 5px 7.5rem;
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

        /* Spesifikasi ditingkatkan untuk tombol "submit" */
        .survey-form .submit {
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

        .survey-form .submit:hover {
            background-color: transparent;
            color: #222;
        }

        /* style comboboxs */
        input {
            padding: 5px;
            height: 35px;
            border-bottom: 1px solid;
            outline: none;
        }

        .contain-all {
            overflow-y: scroll;
            height: 38rem;
        }

        .form-group {
            position: relative;
        }

        .password-toggle {
            margin-left: 45.5rem;
            transform: translateY(-1.7rem);
            cursor: pointer;
            color: #555;
        }

        .subArteris {
            color: #555;
            font-size: 14px;
            margin-top: 15px;
            margin-bottom: 10px;
        }

        .header-text {
            font-weight: bold;
            font-size: 15px;
        }

        @media only screen and (max-width: 800px) {

            .password-toggle {
                margin-left: 14.4rem;
                transform: translateY(-1.7rem);
            }

            .container {
                padding: 1rem 1rem 0px 1rem;
            }


            .heading {
                padding: 1.3em 9px 1.8rem 9px;
            }

            .survey-form {
                padding: 1.3em 15px 1.8rem 15px;

            }

            .main-heading {
                font-size: 22px;
                margin-bottom: 0;
                text-align: center;
            }

            label {
                font-size: 16px;
            }
        }
    </style>
</head>

<body class="relative h-screen overflow-hidden">
    <?php $this->load->view('sidebars'); ?>

    <main class="contain-all h-screen overflow-y-auto">
        <div class="container">
            <header class="heading">
                <div class="green-bar"></div>
                <h1 id="title" class="main-heading">Form Tambah Operator</h1>
            </header>

            <form action="<?php echo base_url('supervisor/aksi_tambah_user_operator') ?>" method="post" id="survey-form" class="survey-form">
                <label for="username" class="header-text" id="name-label">Name</span></label>
                <input type="text" name="username" id="username" class="username" placeholder="Masukkan nama anda" required>

                <label for="email" class="header-text" id="email-label">Email</span></label>
                <input type="email" name="email" id="email" class="email" placeholder="Masukkan email anda" required>

                <div class="inputContainer">
                    <label class="label header-text" for="password">
                        <span>Password</span>
                    </label>
                    <div class="password-input-container">
                        <input type="password" name="password" class="input" id="password" placeholder="Enter your Password">
                        <i class="password-toggle fa fa-eye-slash" onclick="togglePassword()"></i>
                    </div>
                    <hr class="custom-hr">
                </div>

                <p class="subArteris">*Gunakan kombinasi minimal 8 karakter dengan huruf, angka, dan simbol</p>

                <input type="submit" id="submit" class="submit" value="Submit">
            </form>
        </div>
    </main>

    <script>
    function togglePassword() {
        var passwordInput = document.getElementById("password");
        var passwordToggle = document.querySelector(".password-toggle-login");

        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            passwordToggle.classList.remove("fa-eye-slash");
            passwordToggle.classList.add("fa-eye");
        } else {
            passwordInput.type = "password";
            passwordToggle.classList.remove("fa-eye");
            passwordToggle.classList.add("fa-eye-slash");
        }
    }
</script>
</body>

</html>