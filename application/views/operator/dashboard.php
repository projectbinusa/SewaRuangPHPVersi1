<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sewa Ruang</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />


    <!--Regular Datatables CSS-->
    <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
    <!--Responsive Extension Datatables CSS-->
    <link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet">


    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.15/dist/tailwind.min.css" rel="stylesheet">

    <style>
        @import url("https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&display=swap");

        :root {
            --main-color: #4F709C;
            --main-color-opacity: 126, 86, 255;
            --main-gradient: linear-gradient(to right, #2878EB, #F129C9);
            --heading-color: #002147;
        }

        body {
            font-family: "DM Sans", sans-serif;
            background-color: #f1f1f1;
        }

        .content-text {
            font-family: "DM Sans", sans-serif;
            font-size: 17px;
        }

        @media (min-width: 1200px) {

            .container,
            .container-lg,
            .container-md,
            .container-sm,
            .container-xl,
            .container-xxl {
                max-width: 1170px;
            }
        }

        /***default-btn-area***/
        .btn {
            height: 50px;
            line-height: 50px;
            padding: 0 32px;
            overflow: hidden;
            position: relative;
            border: 0;
            transition: all 0.5s ease 0s;
            font-weight: 700;
            display: inline-block;
            transform: perspective(1px) translateZ(0);
            border-radius: 5px;
        }

        .btn:focus,
        .btn:active {
            outline: 0;
            box-shadow: none;
        }

        .btn:after {
            content: "";
            background: var(--main-color);
            position: absolute;
            transition: all 0.9s ease 0s;
            z-index: -1;
            height: 100%;
            left: -35%;
            top: 0;
            transform: skew(30deg);
            transform-origin: top left;
            width: 0;
        }

        .btn:hover {
            color: #fff;
        }

        .btn:hover:after {
            height: 100%;
            width: 135%;
        }

        .btn-base {
            color: var(--heading-color);
            border: 0;
            background: var(--main-color);
        }

        .btn-base:after {
            background: #fff;
        }

        .btn-base:hover::after {
            background: var(--main-color);
        }

        .btn-border {
            color: var(--main-color);
            border: 1px solid var(--main-color);
            background: transparent;
        }

        .btn-border:hover {
            color: #fff;
        }

        .btn-border-white {
            color: #fff;
            border: 1px solid #fff;
            background: transparent;
        }

        .btn-border-white:hover {
            background: #fff;
            opacity: 1;
            color: var(--heading-color);
        }

        .btn-border-white:hover::after {
            background: #fff;
        }

        .btn-white {
            color: var(--heading-color);
            border: 0;
            background: #fff;
            font-size: 14px;
            transition: all 0.3s ease 0s;
        }

        .btn-white:hover {
            color: var(--heading-color);
        }

        .btn-white:hover:after {
            background: #fff;
        }

        .btn-area {
            margin-top: 25px;
        }

        .btn-area .btn {
            margin-right: 7px;
        }


        /***banner-area***/
        .banner-area {
            background: var(--main-gradient);
            padding: 320px 0px 220px;
            background-size: cover !important;
            position: relative;
            z-index: 1;
            background-position: center !important;
        }

        .banner-area:after {
            content: "";
            position: absolute;
            left: 0;
            top: 0;
            height: 100%;
            width: 100%;
            background: rgba(0, 33, 71, 0.9);
        }

        .banner-area .banner-inner {
            z-index: 4;
            position: relative;
        }

        .banner-inner h1 {
            color: #fff;
            line-height: 66px;
            font-weight: 700;
            font-size: 75px;
            margin-bottom: 25px;
        }

        .banner-inner h1 span {
            color: #ffd934;
            display: block;
        }

        .banner-inner p {
            color: #fff;
            margin-bottom: 25px;
            font-size: 40px;
            line-height: 58px;
            letter-spacing: -1px;
        }

        .banner-inner p span {
            font-weight: 700;
            font-size: 46px;
        }

        .banner-area .btn-area {
            position: relative;
            z-index: 4;
        }


        /***section-title***/
        .section-title {
            margin-bottom: 60px;
        }

        .section-title h5 {
            font-weight: 600;
            color: var(--main-color);
            margin-bottom: 6px;
        }

        .section-title h2 {
            font-size: 42px;
            font-weight: 700;
            color: var(--heading-color);
        }

        .section-title p {
            font-size: 22px;
            font-weight: 500;
            color: rgba(0, 0, 0, 0.4);
        }

        .typed::after {
            content: "|";
            display: inline;
            -webkit-animation: blink 0.7s infinite;
            -moz-animation: blink 0.7s infinite;
            animation: blink 0.7s infinite;
        }

        @-webkit-keyframes blink {
            0% {
                opacity: 1;
            }

            50% {
                opacity: 0;
            }

            100% {
                opacity: 1;
            }
        }

        @-moz-keyframes blink {
            0% {
                opacity: 1;
            }

            50% {
                opacity: 0;
            }

            100% {
                opacity: 1;
            }
        }

        @media all and (max-width: 1199px) {
            .banner-area .bg-image {
                opacity: 0.2;
                z-index: 0;
            }

            .banner-inner p {
                margin: 0 20px !important;
            }

            .btn {
                height: 50px;
                line-height: 50px;
            }

            .pd-top-140 {
                padding-top: 100px;
            }

            .pd-bottom-97 {
                padding-bottom: 57px;
            }

            .pd-top-87 {
                padding-top: 47px;
            }

            .banner-area {
                padding: 228px 0px 218px;
            }
        }

        @media all and (max-width: 320px) {
            .main-logo img {
                width: 110px;
            }

            .nav-right-part ul li {
                font-size: 15px;
            }

            .nav-right-part ul li a {
                padding: 0 7px;
            }
        }

        .featured-item {
            box-shadow: 0 0 40px rgb(82 85 90 / 10%);
            text-align: center;
            margin-bottom: 30px;
            padding: 40px 20px 35px 20px;
            background: #fff;
            border-radius: 5px;
            color: #1d1d1d;
            font-size: 22px;
        }

        .featured-item img {
            display: block;
            margin: 0 auto 20px;
            box-shadow: 0 0 40px rgb(82 85 90 / 20%);
            border-radius: 5px;
        }



        h1 {
            font-size: 62px;
            line-height: 1.2333333333;
        }

        h2 {
            font-size: 46px;
            line-height: 1.3380952381;
        }

        h3 {
            font-size: 30px;
            line-height: 1.3833333333;
        }

        h4 {
            font-size: 24px;
            line-height: 1.3380952381;
        }

        h5 {
            font-size: 20px;
            line-height: 1.3380952381;
        }

        h6 {
            font-size: 16px;
            line-height: 1.3830952381;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            color: var(--heading-color);
            font-weight: 700;
        }

        p {
            color: var(--paragraph-color);
            -webkit-hyphens: auto;
            hyphens: auto;
            margin-bottom: 10px;
        }

        a {
            color: inherit;
            text-decoration: none;
            transition: 0.4s;
        }

        a,
        a:hover,
        a:focus,
        a:active {
            text-decoration: none;
            outline: none;
            color: inherit;
        }

        a:hover {
            color: var(--main-color);
        }

        pre {
            word-break: break-word;
        }

        a i {
            padding: 0 2px;
        }

        img {
            max-width: 100%;
        }

        ol {
            counter-reset: counter;
            padding-left: 0;
        }

        ol li {
            list-style: none;
            margin-bottom: 1rem;
        }

        ol li:before {
            counter-increment: counter;
            content: counter(counter);
            font-weight: 500;
            margin-right: 10px;
        }

        button:hover,
        button:active,
        button:focus {
            outline: 0;
        }

        /*input and button type focus outline disable*/
        input[type=text]:focus,
        input[type=email]:focus,
        input[type=url]:focus,
        input[type=password]:focus,
        input[type=search]:focus,
        input[type=tel]:focus,
        input[type=number]:focus,
        textarea:focus,
        input[type=button]:focus,
        input[type=reset]:focus,
        input[type=submit]:focus,
        select:focus {
            outline: none;
            box-shadow: none;
            border: 1px solid #ddd;
        }

        .no-gutter.row,
        .no-gutter.container,
        .no-gutter.container-fluid {
            margin-left: 0;
            margin-right: 0;
            padding-left: 0;
            padding-right: 0;
        }

        .no-gutter>[class^=col-] {
            padding-left: 0;
            padding-right: 0;
        }

        .no-gutter[class^=col-] {
            padding-left: 0;
            padding-right: 0;
        }

        code {
            color: #faa603;
        }

        .comment-list li {
            list-style: none;
        }

        .h-100vh {
            height: 100vh;
        }

        .position-relative {
            position: relative;
        }


        /*----------------------------------------
    # Unit test
------------------------------------------*/
        .wp-link-pages a {
            margin: 0 5px;
            transition: 0.3s ease-in;
        }

        .wp-link-pages {
            margin-bottom: 30px;
            margin-top: 25px;
        }

        .wp-link-pages span,
        .wp-link-pages a {
            border: 1px solid #e2e2e2;
            padding: 5px 15px;
            display: inline-block;
        }

        .wp-link-pages .current,
        .wp-link-pages a:hover {
            background-color: var(--main-color);
            color: #fff;
            border-color: var(--main-color);
        }

        .wp-link-pages span:first-child {
            margin-right: 5px;
        }

        dl,
        ol,
        ul {
            padding-left: 15px;
        }

        .post-password-form input {
            display: block;
            border: 1px solid #e2e2e2;
            height: 50px;
            border-radius: 3px;
            padding: 0 20px;
        }

        .post-password-form label {
            font-weight: 600;
            color: #333;
        }

        .post-password-form input[type=submit] {
            width: 100px;
            height: 50px;
            background-color: var(--main-color);
            color: #fff;
            font-size: 15px;
            font-weight: 600;
            letter-spacing: 1px;
            border: none;
            cursor: pointer;
            transition: 0.3s ease-in;
        }

        .post-password-form input[type=submit]:hover {
            background-color: #121A2F;
        }

        .footer-widget .table td,
        .footer-widget .table th {
            padding: 0.5rem !important;
        }

        /*---------------------------------------
    ## Button
---------------------------------------*/
        .btn {
            height: 55px;
            line-height: 55px;
            padding: 0 36px;
            border-radius: 0;
            overflow: hidden;
            position: relative;
            border: 0;
            font-size: 15px;
            transition: all 0.5s ease;
            font-weight: 500;
            border-radius: 4px;
            z-index: 0;
        }

        .btn:focus,
        .btn:active {
            outline: 0;
            box-shadow: none;
        }

        .btn:after {
            content: "";
            background: #EEBD05;
            position: absolute;
            transition: all 0.3s ease-in;
            z-index: -1;
            height: 100%;
            left: -35%;
            top: 0;
            transform: skew(30deg);
            transition-duration: 0.6s;
            transform-origin: top left;
            width: 0;
        }

        .btn:hover:after {
            height: 100%;
            width: 135%;
        }

        .btn-radius {
            border-radius: 30px;
        }

        .btn-base {
            color: var(--heading-color);
            background: var(--main-color);
        }

        .btn-base:hover {
            color: var(--heading-color);
        }

        .btn-border-white {
            color: #fff;
            border: 2px solid rgba(255, 255, 255, 0.2);
            line-height: 52px;
        }

        .btn-border-white:hover,
        .btn-border-white:focus {
            color: #fff;
            background: var(--main-color);
            border: 2px solid var(--main-color);
        }

        .btn-border-black {
            color: var(--heading-color);
            border: 2px solid rgba(0, 33, 71, 0.2);
            line-height: 52px;
        }

        .btn-border-black:hover,
        .btn-border-black:focus {
            color: var(--heading-color);
            background: var(--main-color);
            border: 2px solid var(--main-color);
        }

        .btn-black {
            color: #fff;
            background: var(--heading-color);
        }

        .btn-black:hover {
            color: #fff;
        }

        .btn-counter {
            display: inline-flex;
            padding: 15px 30px;
            border-radius: 4px;
        }

        .btn-counter .left-val {
            margin-bottom: 0;
        }

        .btn-counter .right-val {
            line-height: 1.2;
            font-size: 15px;
            font-weight: 500;
            color: var(--heading-color);
            margin-left: 12px;
        }

        /*------------------------------------------------
    ## Section title
------------------------------------------------*/
        .section-title {
            margin-bottom: 45px;
            position: relative;
        }

        .section-title .sub-title {
            font-weight: 500;
            position: relative;
            display: inline-block;
            margin-bottom: 0;
        }

        .section-title .sub-title.left-line:before {
            content: "";
            position: absolute;
            left: -50px;
            top: 9px;
            height: 1px;
            width: 40px;
            background: var(--heading-color);
        }

        .section-title .sub-title.right-line:after {
            content: "";
            position: absolute;
            right: -50px;
            top: 9px;
            height: 1px;
            width: 40px;
            background: var(--heading-color);
        }

        .section-title .sub-title.double-line:before {
            content: "";
            position: absolute;
            left: -50px;
            top: 10px;
            height: 1px;
            width: 40px;
            background: var(--heading-color);
        }

        .section-title .sub-title.double-line:after {
            content: "";
            position: absolute;
            right: -50px;
            top: 10px;
            height: 1px;
            width: 40px;
            background: var(--heading-color);
        }

        .section-title .sub-title.style-btn {
            height: 36px;
            line-height: 36px;
            background: rgba(29, 194, 149, 0.1);
            border-radius: 30px;
            padding: 0 25px;
            color: var(--main-color);
            margin-bottom: 6px;
        }

        .section-title .title {
            margin-bottom: 0;
            margin-top: 3px;
        }

        .section-title .content {
            margin-top: 17px;
            margin-bottom: 0;
        }

        .section-title .single-list-wrap {
            margin-top: 35px;
        }

        .section-title .btn {
            margin-top: 40px;
        }

        /*------------------------------------------------
    ## Back Top
------------------------------------------------*/
        .back-to-top {
            position: fixed;
            right: 30px;
            bottom: 30px;
            width: 44px;
            height: 44px;
            color: #fff;
            background-color: var(--main-color);
            text-align: center;
            line-height: 44px;
            z-index: 99;
            font-size: 25px;
            cursor: pointer;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
            display: none;
            animation: backto-top-bounce 4s infinite ease-in-out;
        }


        /*--------------------------------------------------------------
# Globals
--------------------------------------------------------------*/
        .b-radius-5 {
            border-radius: 5px;
        }

        .ratting-inner {
            color: #FFC107;
        }

        .bg-base {
            background: var(--main-color);
        }



        .bg-relative {
            position: relative;
        }

        .bg-cover {
            background-size: cover !important;
            background-repeat: no-repeat !important;
        }

        .bg-overlay {
            position: relative;
            background-size: cover !important;
        }

        .bg-overlay:after {
            content: "";
            position: absolute;
            height: 100%;
            width: 100%;
            left: 0;
            top: 0;
            background: rgba(0, 33, 71, 0.9);
        }

        .bg-overlay .container {
            position: relative;
            z-index: 2;
        }

        /************ animate style ************/
        .top_image_bounce {
            animation: top-image-bounce 3s infinite ease-in-out;
        }

        .left_image_bounce {
            animation: left-image-bounce 3s infinite ease-in-out;
        }

        .right_image_bounce {
            animation: right-image-bounce 3s infinite ease-in-out;
        }

        .spin_image {
            animation: spin 3s infinite ease-in-out;
        }

        @keyframes top-image-bounce {
            0% {
                transform: translateY(-8px);
            }

            50% {
                transform: translateY(12px);
            }

            100% {
                transform: translateY(-8px);
            }
        }

        @keyframes left-image-bounce {
            0% {
                transform: translateX(-5px);
            }

            50% {
                transform: translateX(10px);
            }

            100% {
                transform: translateX(-5px);
            }
        }

        @keyframes spin {
            100% {
                transform: rotate(360deg);
                transform-origin: 50%;
            }
        }

        @keyframes ripple-white3 {
            0% {
                box-shadow: 0 0 0 0 rgba(255, 255, 255, 0.1), 0 0 0 10px rgba(255, 255, 255, 0.1), 0 0 0 20px rgba(255, 255, 255, 0.1);
            }

            100% {
                box-shadow: 0 0 0 10px rgba(255, 255, 255, 0.1), 0 0 0 20px rgba(255, 255, 255, 0.1), 0 0 0 100px rgba(255, 255, 255, 0);
            }
        }

        .sopen {
            display: block;
        }

        .toggle-btn {
            left: auto;
            right: -10px;
            position: absolute;
            top: 12px;
            width: 40px;
            height: 40px;
            transition-duration: 0.5s;
            border: 0;
            background: transparent;
        }

        .toggle-btn .icon-left {
            transition-duration: 0.5s;
            position: absolute;
            height: 2px;
            width: 11px;
            top: 18px;
            background-color: #fff;
            left: 7px;
        }

        .toggle-btn .icon-left:before {
            transition-duration: 0.5s;
            position: absolute;
            width: 11px;
            height: 2px;
            background-color: #fff;
            content: "";
            top: -7px;
            left: 0;
        }

        .toggle-btn .icon-left:after {
            transition-duration: 0.5s;
            position: absolute;
            width: 11px;
            height: 2px;
            background-color: #fff;
            content: "";
            top: 7px;
            left: 0;
        }

        .toggle-btn .icon-left:hover {
            cursor: pointer;
        }

        .toggle-btn .icon-right {
            transition-duration: 0.5s;
            position: absolute;
            height: 2px;
            width: 11px;
            top: 18px;
            background-color: #fff;
            left: 18px;
        }

        .toggle-btn .icon-right:before {
            transition-duration: 0.5s;
            position: absolute;
            width: 11px;
            height: 2px;
            background-color: #fff;
            content: "";
            top: -7px;
            left: 0;
        }

        .toggle-btn .icon-right:after {
            transition-duration: 0.5s;
            position: absolute;
            width: 11px;
            height: 2px;
            background-color: #fff;
            content: "";
            top: 7px;
            left: 0;
        }

        .toggle-btn .icon-right:hover {
            cursor: pointer;
        }

        .toggle-btn.open .icon-left {
            transition-duration: 0.5s;
            background: transparent;
        }

        .toggle-btn.open .icon-left:before {
            transform: rotateZ(45deg) scaleX(1.4) translate(2px, 1px);
        }

        .toggle-btn.open .icon-left:after {
            transform: rotateZ(-45deg) scaleX(1.4) translate(2px, -1px);
        }

        .toggle-btn.open .icon-right {
            transition-duration: 0.5s;
            background: transparent;
        }

        .toggle-btn.open .icon-right:before {
            transform: rotateZ(-45deg) scaleX(1.4) translate(-2px, 1px);
        }

        .toggle-btn.open .icon-right:after {
            transform: rotateZ(45deg) scaleX(1.4) translate(-2px, -1px);
        }

        .toggle-btn:hover {
            cursor: pointer;
        }

        .navbar-area-1 .toggle-btn .icon-left {
            background-color: var(--main-color);
        }

        .navbar-area-1 .toggle-btn .icon-left:before {
            background-color: var(--main-color);
        }

        .navbar-area-1 .toggle-btn .icon-left:after {
            background-color: var(--main-color);
        }

        .navbar-area-1 .toggle-btn .icon-right {
            background-color: var(--main-color);
        }

        .navbar-area-1 .toggle-btn .icon-right:before {
            background-color: var(--main-color);
        }

        .navbar-area-1 .toggle-btn .icon-right:after {
            background-color: var(--main-color);
        }

        .navbar-area-1 .toggle-btn.open .icon-left {
            background-color: transparent;
        }

        .navbar-area-1 .toggle-btn.open .icon-right {
            background-color: transparent;
        }

        @media only screen and (min-width: 992px) and (max-width: 1199px) {
            .navbar-area .nav-container .navbar-collapse .navbar-nav li {
                font-size: 16px;
            }

            .navbar-area .nav-container .navbar-collapse .navbar-nav li+li {
                margin-left: 5px;
            }
        }

        @media only screen and (min-width: 768px) and (max-width: 991px) {
            .responsive-mobile-menu {
                display: block;
                width: 100%;
                position: relative;
            }

            .navbar-area .nav-container .navbar-collapse .navbar-nav li {
                font-size: 14px;
            }
        }

        @media only screen and (max-width: 1199px) {
            .margin-xlt-80 {
                margin-top: 0px;
            }

            .contact-widget .contact_info_list li.single-info-item .details {
                padding-left: 25px;
            }
        }


        /* medium tablet layout 599px */
        @media only screen and (max-width: 575px) {
            .navbar-area .nav-container {
                margin: 0px 0px;
            }

            .navbar-area .logo {
                padding-top: 10px;
            }

            .widget.footer-widget .subscribe-form.subscribe-form-style2 .form-control {
                padding: 15px 20px;
            }

            .widget.footer-widget .subscribe-form.subscribe-form-style2 .btn {
                padding: 15px 20px;
            }

            .search-popup .search-form {
                min-width: 350px;
            }
        }

        @media only screen and (max-width: 375px) {

            .btn-custom-default,
            .btn-custom-white {
                padding: 5px 18px;
            }

            .search-popup .search-form .form-group .form-control,
            .search-popup .search-form .submit-btn {
                height: 45px;
            }

            .search-popup .search-form {
                min-width: 300px;
            }
        }

        /************** single-testimonial-inner **************/
        .single-testimonial-inner {
            padding: 50px;
            box-shadow: 0px 0px 30px rgba(0, 0, 0, 0.07);
            margin: 9px;
        }

        .single-testimonial-inner .testimonial-quote {
            font-size: 50px;
            position: absolute;
            top: 25px;
            left: 50px;
            z-index: -1;
            color: rgba(255, 255, 255, 0.15);
        }

        .single-testimonial-inner p {
            color: var(--heading-color);
        }

        .single-testimonial-inner .testimonial-author .media-left {
            margin-right: 15px;
            height: 70px;
            width: 70px;
            position: relative;
        }

        .single-testimonial-inner .testimonial-author .media-left img {
            border-radius: 50%;
        }

        .single-testimonial-inner .testimonial-author .media-left i {
            height: 30px;
            width: 30px;
            line-height: 30px;
            text-align: center;
            border-radius: 50%;
            background: #2878EB;
            font-size: 14px;
            color: #fff;
            position: absolute;
            right: -2px;
            bottom: -2px;
        }

        .single-testimonial-inner .testimonial-author .media-body h6 {
            margin-bottom: 10px;
        }

        .single-testimonial-inner .testimonial-author .media-body p {
            margin-bottom: 0;
            font-size: 15px;
            line-height: 1;
        }

        .single-testimonial-inner.style-white {
            box-shadow: none;
        }

        .single-testimonial-inner.style-white p {
            color: #fff;
        }

        .single-testimonial-inner.style-white .testimonial-author .media-left i {
            display: none;
        }

        .single-testimonial-inner.style-white .testimonial-author .media-body h6 {
            color: #fff;
        }

        .single-testimonial-inner.style-white .testimonial-author .media-body p {
            color: #fff;
        }

        .testimonial-area-inner {
            border-radius: 7px;
            position: relative;
            margin-top: 40px;

        }

        .testimonial-area-inner .testimonial-right-img {
            position: absolute;
            right: 20px;
            bottom: 0;
            height: 350px;
        }

        .testimonial-slider {
            padding-right: 40%;
        }

        .testimonial-slider .owl-nav {
            display: inline-block;
            background: var(--main-color);
            position: absolute;
            right: 0;
            bottom: 0;
            border-radius: 7px 0 7px 0;
        }

        .testimonial-slider .owl-nav button {
            background: transparent;
            border: 0;
            padding: 4px 16px;
            color: var(--heading-color);
            font-size: 22px;
            cursor: pointer;
        }

        .testimonial-slider-2 .owl-nav {
            display: none;
        }

        .testimonial-slider-2 .single-testimonial-inner {
            margin: 0;
            padding: 13px 0 0 0;
            box-shadow: none;
        }

        .testimonial-slider-2 .single-testimonial-inner .testimonial-quote {
            color: var(--main-color);
            top: -20px;
            left: auto;
            right: 30px;
            z-index: 1;
        }

        .testimonial-slider-2 .single-testimonial-inner>p {
            background-color: #fff;
            font-size: 16px;
            padding: 38px 30px;
            position: relative;
            border-radius: 5px;
            margin-bottom: 32px;
        }

        .testimonial-slider-2 .single-testimonial-inner>p:after {
            content: "";
            position: absolute;
            width: 30px;
            height: 18px;
            bottom: -18px;
            left: 50px;
            border-top: solid 18px #fff;
            border-left: solid 18px transparent;
            border-right: solid 18px transparent;
        }

        .testimonial-slider-2 .single-testimonial-inner .testimonial-author {
            margin-left: 30px;
        }

        .testimonial-slider-2 .single-testimonial-inner .testimonial-author img {
            box-shadow: 0 3px 6px rgba(0, 0, 0, 0.07);
        }

        .testimonial-slider-2 .single-testimonial-inner .testimonial-author .media-left {
            border-radius: 50%;
            width: 80px;
            height: 80px;
        }

        .testimonial-slider-3 .owl-nav {
            display: none;
        }

        /************** single-team-inner **************/
        .single-team-inner {
            margin-bottom: 30px;
        }

        .single-team-inner .thumb {
            border-radius: 7px;
            overflow: hidden;
        }

        .single-team-inner .thumb img {
            transition: 0.7s;
            width: auto !important;
            overflow: hidden;
        }

        .single-team-inner .thumb .social-wrap {
            position: absolute;
            right: 30px;
            top: 28px;
        }

        .single-team-inner .thumb .social-wrap .social-share {
            height: 48px;
            width: 48px;
            line-height: 48px;
            background: var(--main-color);
            border-radius: 4px;
            text-align: center;
            color: var(--heading-color);
            display: inline-block;
            position: relative;
            z-index: 3;
        }

        .single-team-inner .details {
            box-shadow: 0px 0px 30px rgba(0, 0, 0, 0.07);
            padding: 20px 30px;
            margin: 0 35px;
            margin-top: -55px;
            position: relative;
            z-index: 2;
            background: #fff;
            border-radius: 7px;
        }

        .single-team-inner .details h4 {
            margin-bottom: 5px;
        }

        .single-team-inner:hover .thumb img {
            transform: scale(1.1);
        }

        .team-slider .owl-nav {
            display: none;
        }

        .social-wrap-inner ul {
            margin: 0;
            padding: 0;
            height: 0;
            overflow: hidden;
            transition: 0.6s;
        }

        .social-wrap-inner ul li {
            list-style: none;
        }

        .social-wrap-inner ul li a {
            height: 48px;
            width: 48px;
            line-height: 48px;
            background: var(--main-color);
            border-radius: 4px;
            text-align: center;
            color: var(--heading-color);
            display: inline-block;
            position: relative;
            z-index: 3;
            margin-top: 5px;
        }

        .social-wrap-inner:hover ul {
            height: 300px;
        }

        /***spaciality-area***/
        .spaciality-area {
            transform: translateY(50%);
        }

        .spaciality-area .testimonial-area-inner {
            background-position: center;
            margin-top: 0;
        }

        .spaciality-area .single-testimonial-inner {
            width: 62%;
            margin: 0;
            padding: 43px 0 36px 35px;
            overflow: hidden;
        }

        .spaciality-area .single-testimonial-inner h4 {
            font-size: 25px;
            font-weight: 500;
            margin-bottom: 5px;
        }

        .spaciality-area .single-testimonial-inner p {
            font-size: 16px;
        }

        .spaciality-area .single-testimonial-inner .single-list-wrap .single-list-inner {
            color: #fff;
            font-size: 16px;
            margin-bottom: 9px;
        }

        .spaciality-area .single-testimonial-inner .single-list-wrap .single-list-inner i {
            background: transparent;
            color: #fff;
            width: auto;
        }
    </style>

    <!-- style table -->
    <style>
        /*Form fields*/
        .dataTables_wrapper select,
        .dataTables_wrapper .dataTables_filter input {
            color: #4F709C;
            padding-left: 1rem;
            padding-right: 1rem;
            padding-top: .5rem;
            padding-bottom: .5rem;
            line-height: 1.25;
            border-width: 2px;
            border-radius: .25rem;
            border-color: #fff;
            background-color: #fff;
            margin: 10px 0;
        }

        .dataTables_wrapper .dataTables_filter input {
            margin-left: 9px;
        }

        /*Row Hover*/
        table.dataTable.hover tbody tr:hover,
        table.dataTable.display tbody tr:hover {
            background-color: #ebf4ff;
        }

        /*Pagination Buttons*/
        .dataTables_wrapper .dataTables_paginate .paginate_button {
            font-weight: 700;
            border-radius: .25rem;
            border: 1px solid transparent;
            height: 37px;
            padding-top: 5px;
        }

        /*Pagination Buttons - Current selected */
        .dataTables_wrapper .dataTables_paginate .paginate_button.current {
            color: white !important;
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06);
            font-weight: 700;
            border-radius: .25rem;
            background: #4F709C !important;
            border: 1px solid transparent;
        }

        /*Pagination Buttons - Hover */
        .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
            color: white !important;
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06);
            font-weight: 700;
            border-radius: .25rem;
            background: #4F709C !important;
            border: 1px solid transparent;
        }

        /*Add padding to bottom border */
        table.dataTable.no-footer {
            border-bottom: 1px solid #e2e8f0;
            margin-top: 0.75em;
            margin-bottom: 0.75em;
        }

        /*Change colour of responsive icon*/
        table.dataTable.dtr-inline.collapsed>tbody>tr>td:first-child:before,
        table.dataTable.dtr-inline.collapsed>tbody>tr>th:first-child:before {
            background-color: #4F709C !important;
        }


        .container-table {
            box-shadow: 0 25px 50px -12px rgb(0 0 0 / 0.25);
            padding: 20px 10px 10px 10px;
        }


        /* .scroll {
            overflow-y: auto;
            background: #f9fcff;
        } */


        /* ---------- Data Length Code ---------- */
        .container {
            max-width: 1400px;
            margin: auto;

            &.two .card::after {
                content: '';
                width: 80px;
                height: 80px;
                background: #4F709C;
                position: absolute;
                top: -30px;
                border-radius: 35%;
                left: -20px;
            }

            .grid-cards {
                display: flex;
                justify-content: center;
                flex: 1;
                max-width: 1400px;
                margin: 1rem auto;

                @media (max-width: 922px) and (min-width: 601px) {
                    display: grid;
                    grid-template-columns: repeat(2, 1fr);
                }

                @media (max-width: 600px) {
                    flex-direction: column;
                }

                .card {
                    position: relative;
                    flex: 1;
                    background: #fff;
                    padding: 1rem 1rem 1.5rem;
                    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
                    border-radius: 1rem;
                    min-height: 170px;
                    margin: 15px;
                    transition: all ease 0.3s;
                    overflow: hidden;
                    animation: fadeInLeft 1.5s backwards;

                    &:nth-child(2) {
                        animation-delay: 0.15s;
                    }

                    &:nth-child(3) {
                        animation-delay: 0.2s;
                    }

                    &:nth-child(4) {
                        animation-delay: 0.3s;
                    }

                    &:hover {
                        transform: translateY(-6px);
                        -webkit-transform: translateY(-6px);
                    }

                    img {
                        //Google SEO - CLS optimize
                        aspect-ratio: 500 / 320;

                        width: 100%;
                        border-radius: 12px;
                        margin-bottom: 15px;
                        position: relative;
                        max-height: 320px;
                        object-fit: cover;
                        box-shadow: 0 6px 16px -7px #aaa;
                    }

                    .card-body {
                        color: #676767;
                        width: 100%;
                        margin-bottom: 40px;
                        padding: 0 0.8rem;
                        position: relative;

                        .icon {
                            display: flex;
                            width: 100%;
                            text-align: left;
                            padding: 15px 0;

                            i {
                                position: relative;
                                font-size: 25px;
                                transition: 0.5s;
                                line-height: 0;
                                top: -7px;
                                left: -12px;
                                z-index: 2;

                                &::before {
                                    background: #FFD854;
                                    background-clip: border-box;
                                    -webkit-background-clip: text;
                                    -webkit-text-fill-color: transparent;
                                }
                            }

                            h3 {
                                margin: -9px 0 0 20px;
                            }
                        }

                        .title-card {
                            text-align: center;
                            padding-bottom: 10px;

                        }

                        p {
                            font-size: 14px;
                            line-height: 22px;
                            font-weight: 300;
                        }
                    }

                    .card-footer {
                        display: flex;
                        justify-content: flex-end;
                        position: absolute;
                        bottom: 0;
                        width: calc(100% - 1rem);

                        a {
                            display: flex;
                            justify-content: center;
                            align-items: center;
                            background: #FFD854;
                            color: #fff;
                            text-shadow: 0px 1px 5px rgba(0, 0, 0, 0.08);
                            font-size: 1rem;
                            font-weight: 700;
                            text-decoration: none;
                            width: 56%;
                            height: 40px;
                            border-top-left-radius: 1rem;
                            border-bottom-right-radius: 1rem;

                            &:hover {
                                filter: brightness(0.98);
                            }
                        }
                    }
                }
            }
        }

        @keyframes fadeInLeft {
            0% {
                transform: translate(-100%, 0);
            }

            100% {
                opacity: 1;
                transform: none;
            }
        }

        table {
            width: 22rem;
        }

        .inner-section {
            padding: 4%;
        }

        /* code responsive table */
        @media (max-width: 600px) {
            table {
                width: 4.5rem;
            }

            .inner-section {
                padding: 4%;
            }
        }


        /* Style Pagination */

        .pagination {
    display: flex;
    justify-content: center;
    margin: 15px;
  }

  .pagination a,
  .pagination strong {
    border: 1px solid #fff;
    background-color: #fff;
    border-radius: 5px;
    font-size: 15px;
    color: #383f47;
    padding: 8px 15px;
    margin-right: 2px;
    text-decoration: none;
  }

  .pagination a:hover,
  .pagination strong {
    border: 1px solid #4F709C;
    background-color: #4F709C;
    color: #fff;
  }

  /* Add media query for responsiveness */
  @media screen and (max-width: 600px) {
    .pagination {
      display: flex #383f47;
      justify-content: center;
      padding-top: 20px;
      padding-bottom: 70px;
    }
  }
    </style>

</head>

<body class="relative min-h-screen overflow-hidden" id="page-top" data-spy="" data-target=".navbar-fixed-top">

    <?php $this->load->view('sidebar'); ?>

    <div class="max-h-screen overflow-y-auto">
        <section class="inner-section">
            <div class="">
                <div class="container two">
                    <div class="grid-cards">
                        <div class="card">
                            <a href="<?php echo base_url("operator/data_ruangan") ?>" class="card-body text-center">
                                <div class="section-title mb-0">
                                    <h2 class="title mt-4">
                                        <?php echo $jumlah_ruang ?>
                                    </h2>
                                </div>
                                <p>Master Ruang</p>
                            </a>
                            <div class="card-footer">
                                <a href="<?php echo base_url("operator/data_ruangan") ?>">Klik disini</a>
                            </div>
                        </div>


                        <div class="card">
                            <a href="<?php echo base_url("operator/data_master_pelanggan") ?>" class="card-body text-center">
                                <div class="section-title mb-0">
                                    <h2 class="title mt-4">
                                        <?php echo $jumlah_pelanggan ?>
                                    </h2>
                                </div>
                                <p>Master Pelanggan
                                </p>
                            </a>
                            <div class="card-footer">
                                <a href="<?php echo base_url("operator/data_master_pelanggane") ?>">Klik disini</a>
                            </div>
                        </div>

                        <div class="card">
                            <a href="<?php echo base_url("operator/tambahan") ?>" class="card-body text-center">
                                <div class="section-title mb-0">
                                    <h2 class="title mt-4">
                                        <?php echo $jumlah_tambahan ?>
                                    </h2>
                                </div>
                                <p>Item Tambahan
                                </p>
                            </a>
                            <div class="card-footer">
                                <a href="<?php echo base_url("operator/tambahan") ?>">Klik disini</a>
                            </div>
                        </div>
                        <div class="card">
                            <a href="<?php echo base_url("operator/report_sewa") ?>" class="card-body text-center">
                                <div class="section-title mb-0">
                                    <h2 class="title mt-4">
                                        <?php echo $jumlah_sewa ?>
                                    </h2>
                                </div>
                                <p>Report Sewa
                                </p>
                            </a>
                            <div class="card-footer">
                                <a href="<?php echo base_url("operator/report_sewa") ?>">Klik disini</a>
                            </div>
                        </div>
                    </div>
        </section>
        <section class="inner-section">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <div class="section-title">
                        <h2 class="title">Ruangan</h2>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row justify-content-center">
                    <?php if ($ruang) : ?>
                        <div id="roomList" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-10  pt-5 hover:text-gray-900 transition duration-100 mx-auto" id="roomList">
                            <?php $count = 0; ?>
                            <?php foreach ($ruang as $row) : ?>
                                <?php if ($count < 6) : ?>
                                    <div class="col-lg-4 col-md-6 max-w-md container bg-white rounded-xl shadow-lg transform transition duration-500 hover:scale-105 mx-auto">
                                        <a href="<?php echo base_url('operator/detail/' . $row->id); ?>">
                                            <div class="bg-white pb-10 pl-5 pr-5 mb-1 rounded-lg shadow-xl text-center my-5">
                                                <img src="<?php echo (!empty($row->image) && file_exists('./image/ruangan/' . $row->image)) ? base_url('./image/ruangan/' . $row->image) : base_url('./image/foto.png'); ?>" alt="Gambar Ruangan" class="block mx-auto mb-5 w-96 h-48 shadow-md rounded transition duration-100 cursor-pointer">
                                                <h2 class="text-2xl text-gray-800 font-semibold mb-3">
                                                    <?php echo $row->no_ruang; ?>
                                                </h2>
                                            </div>
                                        </a>
                                    </div>
                                <?php endif; ?>
                                <?php $count++; ?>
                            <?php endforeach; ?>
                        </div>
                        <div class="custom-pagination">
                            <div class="pagination">
                                <?php echo $pagination_links; ?>
                            </div>
                        </div>
                    <?php else : ?>
                        <div class="col-lg-4 col-md-6 mx-auto">
                            <p class="text-center text-gray-600">data Tidak Ditemukan</p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </section>


        <!-- Data Master Ruang -->
        <section id="widget" class="inner-section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8 text-center">
                        <div class="section-title">
                            <h2 class="title">Data Master Ruangan</h2>

                        </div>
                    </div>
                </div>

                <div class="row justify-content-center">

                    <div class="col-lg-12">
                        <div class="header-item">
                            <div class="relative">

                                <table id="example_master_ruang" class=" w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                    <thead class=" text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                        <tr>
                                            <th data-priority="1" scope="col" class="text-center w-14 px-3 py-3">
                                                No
                                            </th>
                                            <th data-priority="2" scope="col" class="text-center px-3 py-3">
                                                No Ruang
                                            </th>
                                            <th data-priority="3" scope="col" class="text-center px-3 py-3">
                                                No Lantai
                                            </th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 0;
                                        foreach ($ruang as $row) :
                                            $no++ ?>
                                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                                <td data-cell="No  " scope="row" class="text-center px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                    <?php echo $no ?>
                                                </td>
                                                <td data-cell="No Ruang " class="text-center px-6 py-4">
                                                    <?php echo $row->no_ruang ?>
                                                </td>
                                                <td data-cell="No Lantai " class="text-center px-6 py-4">
                                                    <?php echo $row->no_lantai ?>
                                                </td>
                                            </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </section>

        <!-- Data Master Pelanggan -->
        <section id="widget" class="inner-section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8 text-center">
                        <div class="section-title">
                            <h2 class="title">Data Master Pelanggan</h2>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="header-item">
                            <div class="relative">
                                <table id="example_master_pelanggan" class="bak w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                    <thead class=" text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                        <tr>
                                            <th data-priority="1" scope="col" class="text-center w-14 px-3 py-3">
                                                No
                                            </th>
                                            <th data-priority="2" scope="col" class="text-center px-3 py-3">
                                                Nama
                                            </th>
                                            <th data-priority="3" scope="col" class="text-center px-3 py-3">
                                                Telepon
                                            </th>
                                            <th data-priority="4" scope="col" class="text-center px-3 py-3">
                                                Payment Method
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 0;
                                        foreach ($pelanggans as $row) :
                                            $no++ ?>
                                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                                <td data-cell="No " scope="row" class="text-center px-3 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                    <?php echo $no ?>
                                                </td>
                                                <td data-cell="Nama" class="text-center px-3 py-4">
                                                    <?php echo $row->nama ?>
                                                </td>
                                                <td data-cell="Telepon" class="text-center px-3 py-4">
                                                    <?php echo $row->phone ?>
                                                </td>
                                                <td data-cell="Payment Method " class="text-center px-3 py-4">
                                                    <?php echo $row->payment_method ?>
                                                </td>
                                            </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </section>

        <!-- Report Sewa -->
        <section id="widget" class="inner-section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8 text-center">
                        <div class="section-title">
                            <h2 class="title">Report Sewa</h2>

                        </div>
                    </div>
                </div>

                <div class="row justify-content-center">

                    <div class="col-lg-12">
                        <div class="header-item">
                            <div class="relative">

                                <table id="example_report" class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                    <thead class=" text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                        <tr>
                                            <th data-priority="1" scope="col" class="text-center w-14 px-3 py-3">
                                                No
                                            </th>
                                            <th data-priority="2" scope="col" class="text-center px-3 py-3">
                                                Nama
                                            </th>
                                            <th data-priority="3" scope="col" class="text-center px-3 py-3">
                                                Ruangan
                                            </th>
                                            <th data-priority="4" scope="col" class="text-center px-3 py-3">
                                                Kapasitas
                                            </th>
                                            <th data-priority="5" scope="col" class="text-center px-3 py-3">
                                                Kode Booking
                                            </th>
                                            <th data-priority="6" scope="col" class="text-center px-3 py-3">
                                                Tambahan
                                            </th>
                                            <th data-priority="7" scope="col" class="text-center px-3 py-3">
                                                Total Booking
                                            </th>
                                            <th data-priority="8" scope="col" class="text-center px-3 py-3">
                                                Total
                                            </th>
                                            <th data-priority="9" scope="col" class="text-center px-3 py-3">
                                                Status
                                            </th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 0;
                                        foreach ($report_sewa as $row) :
                                            $no++ ?>
                                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                                <td data-cell="Nama Penyewa " scope="row" class="text-center px-3 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                    <?php echo $no ?>
                                                </td>
                                                <td data-cell="Nama" class="text-center px-3 py-4">
                                                    <?php echo tampil_nama_penyewa_byid($row->id_pelanggan) ?>
                                                </td>
                                                <td data-cell="Ruangan " class="text-center px-3 py-4">
                                                    <?php echo tampil_nama_ruangan_byid($row->id_ruangan) ?>
                                                </td>
                                                <td data-cell="Kapasitas " class="text-center px-3 py-4">
                                                    <?php echo $row->jumlah_orang ?>
                                                </td>
                                                <td data-cell="Kode Booking" class="text-center px-3 py-4">
                                                    <?php echo $row->kode_booking ?>
                                                </td>
                                                <td data-cell="Tambahan" class="text-center px-3 py-4">
                                                    <?php
                                                    // Memisahkan data tambahan menjadi array
                                                    $tambahanArray = explode(',', $row->tambahan_nama);

                                                    // Menampilkan setiap tambahan
                                                    foreach ($tambahanArray as $tambahan) {
                                                        echo $tambahan . '<br>';
                                                    }
                                                    ?>
                                                </td>
                                                <td data-cell="Tambahan" class="text-center px-3 py-4">
                                                    <?php
                                                    $tanggalBooking = new DateTime($row->tanggal_booking);
                                                    $tanggalBerakhir = new DateTime($row->tanggal_berakhir);
                                                    $durasi = $tanggalBooking->diff($tanggalBerakhir);
                                                    echo $durasi->days . ' Hari';
                                                    ?>
                                                </td>
                                                <td data-cell="Total Booking" class="text-center px-3 py-4">
                                                    <?php echo $row->total_harga ?>


                                                </td>
                                                <td data-cell="Status" class="text-center px-3 py-4">
                                                    <!-- <?php echo $row->status ?> -->

                                                    <?php if ($row->status == "di tolak") {
                                                        echo "DI TOLAK";
                                                    } else {
                                                        echo "SELESAI";
                                                    } ?>
                                                </td>


                                            </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </section>

        <!-- footer area start -->
        <div class="footer-2 bg-gray-800 inner-section md:pt-12">
            <div class="container px-4 mx-auto">

                <div class="md:flex md:flex-wrap md:-mx-4 py-6 md:pb-12">

                    <!-- <div class="footer-info lg:w-1/3 md:px-4">
        <h4 class="text-white text-2xl mb-4">19K users are using FWR blocks and making their life easy.</h4>
        <p class="text-gray-400">We have carefully crafted the blocks to suit to everyone's need.</p>
        <div class="mt-4">
          <button class="bg-facebook py-2 px-4 text-white rounded mt-2 transition-colors duration-300">
            <span class="fab fa-facebook-f mr-2"></span> Follow
          </button>
          <button class="bg-twitter py-2 px-4 text-white rounded ml-2 mt-2 transition-colors duration-300">
            <span class="fab fa-twitter mr-2"></span> Follow @freeweb19
          </button>
        </div>
      </div> -->

                    <div class="md:w-2/3 lg:w-1/3 md:px-4 xl:pl-16 mt-12 lg:mt-0">
                        <div class="sm:flex">
                            <div class="sm:flex-1">
                                <h6 class="text-base font-medium text-white uppercase mb-2">About</h6>
                                <div>
                                    <a href="#" class="text-gray-400 py-1 block hover:underline">Company</a>
                                    <a href="#" class="text-gray-400 py-1 block hover:underline">Culture</a>
                                    <a href="#" class="text-gray-400 py-1 block hover:underline">Team</a>
                                    <a href="#" class="text-gray-400 py-1 block hover:underline">Careers</a>
                                </div>
                            </div>


                        </div>
                    </div>
                    <div class="md:w-2/3 lg:w-1/3 md:px-4 xl:pl-16 mt-12 lg:mt-0">
                        <div class="sm:flex">
                            <div class="sm:flex-1">
                                <h6 class="text-base font-medium text-white uppercase mb-2">What we offer</h6>
                                <div>
                                    <a href="#" class="text-gray-400 py-1 block hover:underline">Blocks</a>
                                    <a href="#" class="text-gray-400 py-1 block hover:underline">Resources</a>
                                    <a href="#" class="text-gray-400 py-1 block hover:underline">Tools</a>
                                    <a href="#" class="text-gray-400 py-1 block hover:underline">Tutorials</a>
                                </div>
                            </div>


                        </div>
                    </div>

                    <div class="md:w-1/3 md:px-4 md:text-center mt-12 lg:mt-0">
                        <h5 class="text-lg text-white font-medium mb-4">Explore our site</h5>
                        <button class="bg-indigo-600 text-white hover:bg-indigo-700 rounded py-2 px-6 md:px-12 transition-colors duration-300">Explore</button>
                    </div>
                </div>
            </div>

            <div class="">
                <div class="container px-4 mx-auto">

                    <div class="md:flex md:-mx-4 md:items-center">
                        <div class="md:flex-1 md:px-4 text-center md:text-left">
                            <!-- <p class="text-white">&copy; <strong>FWR</strong></p> -->
                        </div>
                        <div class="md:flex-1 md:px-4 text-center md:text-right">
                            <a href="#" class="py-2 px-4 text-white inline-block hover:underline">© 2023 Sewaruang. All
                                rights reserved.</a>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>


    <!-- footer area end -->

    <!-- back-to-top end -->
    <a id="back-to-top"></a>


    <!-- jQuery -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

    <!--Datatables -->
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <script>
        $(document).ready(function() {

            var table = $('#example_master_ruang').DataTable({
                    // responsive: true
                })
                .columns.adjust()
                .responsive.recalc();
        });

        $(document).ready(function() {

            var table = $('#example_master_pelanggan').DataTable({
                    responsive: true
                })
                .columns.adjust()
                .responsive.recalc();
        });
        $(document).ready(function() {

            var table = $('#example_report').DataTable({
                    responsive: true
                })
                .columns.adjust()
                .responsive.recalc();
        });

        // Sweetalert Login
        function displaySweetAlert() {
            const login_operator = "<?php echo $this->session->flashdata('login_operator'); ?>";

            if (login_operator) {
                Swal.fire({
                    title: 'Login Berhasil',
                    text: login_operator,
                    icon: 'success',
                    showConfirmButton: false, // Untuk menghilangkan tombol OK
                    timer: 2500 // Tambahkan timer di sini (dalam milidetik)
                });
            }
        }
        window.onload = displaySweetAlert;
    </script>
</body>

</html>