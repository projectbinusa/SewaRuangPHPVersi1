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
            margin: 4rem auto;
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

        .username,
        .email,
        .password {
            min-height: 2rem;
            padding: 1rem 0;
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

        .password-toggle {
            position: absolute;
            top: 72%;
            transform: translateY(-50%);
            right: 40rem;
            cursor: pointer;
        }

        @media only screen and (max-width: 800px) {
            .password-toggle {
                /* position: absolute; */
                top: 76%;
                /* transform: translateY(-50%); */
                right: 4.9rem;
                /* cursor: pointer; */
            }
        }
    </style>
</head>

<body>
    <main>
        <div class="container">
            <header class="heading">
                <div class="green-bar"></div>
                <h1 id="title" class="main-heading">Form tambah operator</h1>
            </header>

            <form action="#" method="post" id="survey-form" class="survey-form">
                <label for="username" id="name-label">Name<span class="required">*</span></label>
                <input type="text" name="username" id="username" class="username" placeholder="Ketik nama anda"
                    required>

                <label for="email" id="email-label">Email<span class="required">*</span></label>
                <input type="email" name="email" id="email" class="email" placeholder="Ketik email anda" required>

                <label for="password" id="password-label">Password<span class="required">*</span></label>
                <i class="password-toggle fa fa-eye-slash" onclick="togglePassword()"></i>
                <input type="password" name="password" id="password" class="password" placeholder="Ketik password anda"
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