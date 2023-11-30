<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sewa Ruang</title>

    <!-- Include SweetAlert CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/sweetalert2@10">

    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <!-- Include SweetAlert JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>


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
            height: auto;
        }

        .form-group {
            position: relative;
        }

        .password-toggle {
            margin-left: 51rem;
            transform: translateY(2rem);
            cursor: pointer;
            color: #555;
        }

        .header-text {
            font-weight: bold;
            font-size: 15px;
        }

        @media only screen and (max-width: 800px) {

            .password-toggle {
                margin-left: 22.4rem;
                transform: translateY(2rem);
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

<body class="relative min-h-screen overflow-hidden">
    <?php $this->load->view('sidebars'); ?>

    <main class="contain-all max-h-screen overflow-y-auto">
        <div class="container">
            <header class="heading">
                <div class="green-bar"></div>
                <h1 id="title" class="main-heading">Form Edit Operator</h1>
            </header>

            <?php foreach ($operator as $row) : ?>
                <form action="<?php echo base_url('supervisor/aksi_update_user_operator') ?>" method="post" id="survey-form" class="survey-form">
                    <input value="<?php echo $row->id ?>" type="hidden" name="id" id="user_id" class="user_id" placeholder="Masukkan nama anda">

                    <label for="username" class="header-text" id="name-label">Name</label>
                    <input value="<?php echo $row->username ?>" type="text" name="username" id="username" class="username" placeholder="Masukkan nama anda" required>

                    <label for="email" class="header-text" id="email-label">Email</label>
                    <input value="<?php echo $row->email ?>" type="email" name="email" id="email" class="email" placeholder="Masukkan email anda" required>

                    <label for="password" class="header-text" id="password-label">Password</label>
                    <i class="password-toggle fa fa-eye-slash" onclick="togglePassword()"></i>
                    <input type="password" name="password" id="password" class="password" placeholder="Masukkan password anda">

                    <input type="button" onclick="submitForm()" id="submit" class="submit" value="Submit">
                </form>
            <?php endforeach; ?>
        </div>
    </main>

    <!-- Include SweetAlert2 CSS and JS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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

        function submitForm() {
            var base_url = '<?php echo base_url(); ?>';
            var formData = $('#survey-form').serialize();

            // Show a confirmation dialog
            Swal.fire({
                icon: 'question',
                title: 'Are you sure?',
                text: 'Do you really want to update operator data?',
                showCancelButton: true,
                confirmButtonText: 'Yes',
                cancelButtonText: 'Cancel',
            }).then(function(result) {
                if (result.isConfirmed) {
                    // If the user clicks 'Yes', proceed with the AJAX request
                    $.ajax({
                        type: 'POST',
                        url: base_url + 'supervisor/aksi_update_user_operator',
                        data: formData,
                        dataType: 'json',
                        success: function(response) {
                            console.log('Response from server:', response);

                            if (response.success) {
                                // Show a success SweetAlert before redirecting
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Success!',
                                    text: response.message,
                                    timer: 1500,
                                    showConfirmButton: false,
                                }).then(function() {
                                    // Redirect the user immediately after a successful update
                                    window.location.href = base_url + 'supervisor/data_operator';
                                });
                            } else {
                                // Error case
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error!',
                                    text: response.message,
                                });
                            }
                        },
                        error: function() {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error!',
                                text: 'An error occurred while processing your request. Please try again.',
                            });
                        },
                    });
                } else {
                    console.log('User cancelled. No data will be saved.');
                }
            });
        }
    </script>

</body>

</html>