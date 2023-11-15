<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sewa Ruang</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />


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
            /* font-size: 17px; */
            background-color: #f1f1f1;
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

        /*------------------------------------------------
    ## Back Top
------------------------------------------------*/
        #back-to-top {
            display: inline-block;
            background-color: var(--main-color);
            width: 40px;
            height: 40px;
            text-align: center;
            border-radius: 4px;
            position: fixed;
            bottom: 30px;
            right: 30px;
            transition: background-color 0.3s, opacity 0.5s, visibility 0.5s;
            opacity: 0;
            animation: backto-top-bounce 4s infinite ease-in-out;
            visibility: hidden;
            z-index: 1000;
        }

        #back-to-top::after {
            content: "";
            position: absolute;
            background: #fff;
            top: 50%;
            margin-top: -2.5px;
            height: 3px;
            width: 14px;
            line-height: 50px;
            transform: rotate(-43deg);
            left: 8.5px;
        }

        #back-to-top::before {
            content: "";
            position: absolute;
            background: #fff;
            top: 50%;
            margin-top: -2.5px;
            height: 3px;
            width: 14px;
            line-height: 50px;
            transform: rotate(43deg);
            right: 8.5px;
        }

        #back-to-top:hover {
            cursor: pointer;
            background-color: #333;
        }

        #back-to-top:active {
            background-color: #555;
        }

        #back-to-top.show {
            opacity: 1;
            visibility: visible;
        }

        /* .back-to-top {
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
  font-size: 20px;
  cursor: pointer;
  box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
  display: none;
  animation: backto-top-bounce 4s infinite ease-in-out;
  border-radius: 4px;
} */
        @keyframes backto-top-bounce {
            0% {
                transform: translateY(-5px);
            }

            50% {
                transform: translateY(10px);
            }

            100% {
                transform: translateY(-5px);
            }
        }

        /***navbar-area***/
        .navbar-area {
            background: transparent;
            padding: 0;
            top: 0;
            position: fixed;
            z-index: 98;
            width: 100% !important;
            transition: all 0.4s;
            background: transparent;
        }

        .navbar {
            background: #0C356A;
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1;
            transition: all 0.3s linear;
        }

        .top-nav-collapse {
            box-shadow: 0px 4px 6px 0px rgb(12 0 46 / 5%);
            top: 0;
            padding: 0;
            -webkit-backdrop-filter: blur(8px);
            backdrop-filter: blur(8px);
            background: rgba(0, 33, 71, 1);
        }

        .navbar-area .nav-container {
            transition: all 0.4s;
            padding: 16px 12px;
        }

        .top-nav-collapse .nav-container {
            background-color: transparent;
            padding: 16px 12px;
            transition: all 0.4s;
        }

        .navbar-area .nav-container .navbar-collapse .navbar-nav li {
            margin-top: 0;
            display: inline-block;
            font-weight: 400;
            line-height: 50px;
            text-transform: capitalize;
        }

        .navbar-area .nav-container .navbar-collapse .navbar-nav li a {
            color: #fff;
            font-size: 16px;
            text-decoration: none;
        }

        .navbar-area .nav-container .navbar-collapse .navbar-nav li+li {
            margin-left: 20px;
        }

        .nav-right-part-desktop {
            margin-left: 30px;
        }

        .nav-right-part ul {
            padding: 0;
            margin: 0;
            display: inline-flex;
        }

        .nav-right-part ul li {
            list-style: none;
            align-self: center;
        }

        .nav-right-part-mobile {
            display: none;
        }

        .nav-right-part-mobile ul li a {
            text-decoration: none;
            color: #fff;
            padding: 0 10px;
        }

        .nav-right-part-mobile ul li .cart {
            display: none;
        }

        .nav-right-part-mobile ul li .cart img {
            height: 20px;
            width: 20px;
            filter: invert(1);
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



        /********* single-counter-inner *********/
        .counter-area-inner {
            padding: 20px 0 0 0;
            position: relative;
            z-index: 4;
        }

        .single-counter-inner {
            margin-bottom: 40px;
        }

        .single-counter-inner h2 {
            font-size: 42px;
            font-weight: 700;
            color: #fff;
        }

        .single-counter-inner p {
            font-size: 18px;
            font-weight: 700;
            margin-bottom: 0;
            color: #fff;
        }




        /***inner-item***/
        .inner-item {
            text-align: center;
            margin-bottom: 50px;
            position: relative;
        }

        .inner-item:hover img {
            transform: translateY(-8px);
        }

        .inner-item a {
            display: block;
            font-size: 22px;
            font-weight: 500;
            color: #1d1d1d;
            text-decoration: none;
            position: relative;
        }

        .inner-item a .thumb {
            overflow: hidden;
            display: block;
            position: relative;
            border-radius: 5px;
            margin-bottom: 10px;
            box-shadow: 0px 5px 50px 0px rgb(0 0 0 / 20%);
            min-height: 350px;
        }

        .inner-item a .thumb:after {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.8);
            visibility: hidden;
            opacity: 0;
            transition: 0.4s;
        }

        .inner-item a img {
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            transform: scale(1) translateY(1);
            transition: transform 12s;
            display: block;
            width: 100%;
            height: initial;
        }

        .inner-item:hover a .thumb:after {
            visibility: visible;
            opacity: 1;
        }

        .inner-item a:hover .thumb img {
            transform: scale(1) translateY(-50px);
            transition: transform 12s;
        }

        .widget-section .inner-item {
            margin-bottom: 20px;
        }

        .inner-item.style-large a .thumb {
            min-height: 550px;
        }

        .inner-item.style-large a:hover .thumb img {
            transform: scale(1) translateY(-1280px);
        }

        .inner-item.coming-soon a .thumb img {
            filter: blur(12px);
        }

        .inner-item.inner-page-item a img {
            transition: transform 2s;
            transform: scale(1.02) translateY(1.02);
        }

        .inner-item.inner-page-item a:hover .thumb img {
            transform: scale(1.02) translateY(-160px);
            transition: transform 2s;
        }

        .inner-item.style-none a:hover .thumb img {
            transform: scale(1) translateY(0);
        }

        .header-item {
            display: block;
        }

        .header-item .thumb {
            position: relative;
            display: block;
        }

        .header-item .thumb:after {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.7);
            visibility: hidden;
            opacity: 0;
            transition: 0.4s;
            border-radius: 5px;
        }

        .header-item .thumb img {
            transition: 0.4s;
            border-radius: 5px;
        }

        .header-item:hover .thumb img {
            transform: scale(1.05);
        }

        .header-item:hover .thumb:after {
            visibility: visible;
            opacity: 1;
            transform: scale(1.05);
        }


        .cm-soon-title {
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
        }

        .inner-item:hover .cm-soon-title {
            color: #fff;
        }

        .inner-item .btn {
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            font-size: 16px;
            color: #fff;
            margin-top: -22px;
            visibility: hidden;
            opacity: 0;
            transition: 0.4s;
            color: var(--heading-color);
        }

        .inner-item:hover .btn {
            visibility: visible;
            opacity: 1;
        }

        /* 
        .footer-area {
            background: rgba(0, 33, 71, 0.9);
        } */


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

        /***default-padding***/
        .pd-top-100 {
            padding-top: 100px;
        }

        .pd-top-47 {
            padding-top: 47px;
        }

        .pd-top-70 {
            padding-top: 70px;
        }

        .pd-top-87 {
            padding-top: 87px;
        }

        .pd-top-110 {
            padding-top: 110px;
        }

        .pd-top-120 {
            padding-top: 120px;
        }

        .pd-top-135 {
            padding-top: 135px;
        }

        .pd-top-130 {
            padding-top: 130px;
        }

        .pd-top-140 {
            padding-top: 140px;
        }

        .pd-top-150 {
            padding-top: 150px;
        }

        .pd-bottom-100 {
            padding-bottom: 100px;
        }

        .pd-bottom-97 {
            padding-bottom: 97px;
        }

        .pd-bottom-65 {
            padding-bottom: 65px;
        }

        .pd-bottom-105 {
            padding-bottom: 105px;
        }

        .pd-bottom-110 {
            padding-bottom: 110px;
        }

        .pd-bottom-120 {
            padding-bottom: 120px;
        }

        .pd-bottom-130 {
            padding-bottom: 130px;
        }

        .pd-bottom-140 {
            padding-bottom: 140px;
        }

        .pd-bottom-150 {
            padding-bottom: 150px;
        }

        .typed::after {
            content: "|";
            display: inline;
            -webkit-animation: blink 0.7s infinite;
            -moz-animation: blink 0.7s infinite;
            animation: blink 0.7s infinite;
        }

        /*Removes cursor that comes with typed.js*/
        .typed-cursor {
            opacity: 0;
            display: none !important;
        }

        /*Custom cursor animation*/
        @keyframes blink {
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

        @media all and (max-width: 991px) {
            .nav-right-part-mobile {
                display: block;
            }

            .banner-inner h1 {
                font-size: 70px;
            }
        }

        @media all and (max-width: 575px) {
            .nav-right-part-desktop {
                margin-left: 10px;
            }

            .section-title h5 {
                font-size: 18px;
            }

            .counter-area {
                transform: translateY(0);
                margin-top: 140px;
            }

            .single-counter-inner h2 {
                font-size: 30px;
            }
        }

        @media all and (max-width: 767px) {
            .nav-right-part ul li .btn {
                display: none;
            }

            .nav-right-part-mobile ul li .cart {
                display: block;
            }

            .nav-right-part-desktop {
                margin-left: 0px;
            }

            .banner-inner h1 {
                line-height: 46px;
                font-size: 33px;
                margin-bottom: 15px;
            }

            .banner-inner p {
                font-size: 18px;
                line-height: inherit;
                letter-spacing: 0;
            }

            .banner-inner p span {
                font-size: 20px;
            }

            .banner-area {
                padding: 180px 0px 100px;
            }

            .section-title h2 {
                font-size: 30px;
            }

            .btn-area {
                margin-top: 45px;
            }

            .btn {
                padding: 0 21px;
            }

            /* .footer-widget.pd-bottom-100 {
                padding-bottom: 70px;
            }

            .footer-widget h5 {
                font-size: 16px;
            } */

            .main-logo img {
                width: 160px;
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

        /* .footer-bottom {
            border-top: 1px solid rgba(0, 33, 71, 0.15);
            padding: 25px 0;
            position: relative;
            z-index: 2;
        }

        .footer-bottom p {
            margin-bottom: 0;
            color: #fff;
        } */

        /*--------------------------------------------------
    ##Footer
---------------------------------------------------*/
        .footer-area {
            position: relative;
            padding-top: 90px;
            background-color: #CFD2CF;
        }

        .footer-area .widget {
            position: relative;
            z-index: 2;
            margin-bottom: 70px;
        }

        .footer-area .widget-title {
            margin-bottom: 27px;
            position: relative;
            padding-left: 18px;
        }

        .footer-area .widget-title:after {
            content: "";
            position: absolute;
            height: 19px;
            width: 6px;
            left: 0;
            top: 6px;
            border-radius: 6px;
            background: var(--main-color);
        }

        .footer-area .widget_about {
            background: #fff;
            padding: 40px 20px;
            border-top: 6px solid var(--main-color);
            margin-top: -150px;
        }

        .footer-area .widget_about a {
            margin-bottom: 20px;
            display: block;
        }

        .footer-area .widget_about p {
            font-size: 15px;
            margin-bottom: 21px;
        }

        .footer-area .widget_contact ul {
            padding: 0;
        }

        .footer-area .widget_contact ul li {
            margin-bottom: 15px;
            position: relative;
            padding-left: 25px;
            list-style: none;
        }

        .footer-area .widget_contact ul li i {
            margin-right: 14px;
            color: var(--main-color);
            position: absolute;
            left: 0;
            top: 6px;
        }

        .footer-area .widget_contact ul li:last-child {
            margin-bottom: 0;
        }

        .footer-area .widget_contact ul li .time {
            font-size: 12px;
            margin-top: 3px;
        }

        .footer-area .widget_blog_list ul {
            padding: 0;
        }

        .footer-area .widget_blog_list ul li {
            list-style: none;
            margin-bottom: 15px;
            position: relative;
            padding-left: 15px;
        }

        .footer-area .widget_blog_list ul li:after {
            content: "";
            position: absolute;
            left: 0;
            top: 7px;
            height: 6px;
            width: 6px;
            background: var(--main-color);
        }

        .footer-area .widget_blog_list ul li h6 {
            font-weight: 500;
            font-size: 17px;
            margin-bottom: 0;
        }

        .footer-area .widget_blog_list ul li span {
            font-size: 12px;
        }

        .footer-area .widget_blog_list ul li span i {
            font-size: 13px;
            margin-right: 6px;
        }

        .footer-area .widget_nav_menu ul {
            margin: 0;
            padding: 0;
        }

        .footer-area .widget_nav_menu ul li {
            list-style: none;
            margin-bottom: 8px;
            position: relative;
            padding-left: 15px;
        }

        .footer-area .widget_nav_menu ul li:after {
            content: "";
            position: absolute;
            left: 0;
            top: 12px;
            height: 6px;
            width: 6px;
            background: var(--main-color);
        }

        .footer-subscribe {
            padding-bottom: 75px;
        }

        .footer-subscribe .footer-subscribe-inner {
            background: #fff;
            padding: 30px 50px 10px 50px;
            border-radius: 7px;
        }

        .footer-bottom {
            border-top: 1px solid rgba(0, 33, 71, 0.15);
            padding: 25px 0;
            position: relative;
            z-index: 2;
        }

        .footer-bottom p {
            margin-bottom: 0;
        }

        .footer-bottom .widget_nav_menu ul li {
            display: inline-block;
            padding-left: 0;
            padding-right: 20px;
            margin-bottom: 0;
        }

        .footer-bottom .widget_nav_menu ul li:last-child {
            margin-right: 0;
        }

        .footer-bottom .widget_nav_menu ul li:after {
            display: none;
        }

        .footer-area-2 {
            margin-top: 60px;
        }

        .footer-area-2 .footer-bottom {
            background: var(--main-color);
            border-top: 0;
        }

        .footer-area-2 .footer-bottom p {
            color: var(--heading-color);
        }

        .footer-area-2 .footer-bottom .widget_nav_menu ul li a {
            color: var(--heading-color);
        }

        .footer-area-2 .footer-bottom .widget_nav_menu ul li a:hover {
            color: #fff;
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

        .h-100vh {
            height: 100vh;
        }

        code {
            color: #faa603;
        }

        .check-list {
            margin: 0;
            padding: 0;
            list-style: none;
        }

        .check-list li {
            display: block;
            padding-left: 20px;
            position: relative;
            z-index: 0;
        }

        .check-list li:after {
            position: absolute;
            left: 0;
            top: 0;
            font-family: "fontawesome";
            content: "";
            color: var(--main-color);
        }

        .site-main .comment-navigation,
        .site-main .posts-navigation,
        .site-main .post-navigation {
            clear: both;
        }

        .comment-navigation .nav-previous,
        .posts-navigation .nav-previous,
        .post-navigation .nav-previous {
            float: left;
            width: 50%;
        }

        .comment-navigation .nav-next,
        .posts-navigation .nav-next,
        .post-navigation .nav-next {
            float: right;
            text-align: right;
            width: 50%;
        }

        .comment-navigation .nav-previous>a,
        .posts-navigation .nav-previous>a,
        .post-navigation .nav-previous>a,
        .comment-navigation .nav-next>a,
        .posts-navigation .nav-next>a,
        .post-navigation .nav-next>a {
            transition: 0.3s ease-in;
        }

        .comment-navigation .nav-previous:hover>a,
        .posts-navigation .nav-previous:hover>a,
        .post-navigation .nav-previous:hover>a,
        .comment-navigation .nav-next:hover>a,
        .posts-navigation .nav-next:hover>a,
        .post-navigation .nav-next:hover>a {
            color: var(--main-color);
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

        /*--------------------------------------------------------------
# Accessibility
--------------------------------------------------------------*/
        /* Text meant only for screen readers. */
        .screen-reader-text {
            border: 0;
            clip: rect(1px, 1px, 1px, 1px);
            -webkit-clip-path: inset(50%);
            clip-path: inset(50%);
            height: 1px;
            margin: -1px;
            overflow: hidden;
            padding: 0;
            position: absolute !important;
            width: 1px;
            word-wrap: normal !important;
            /* Many screen reader and browser combinations announce broken words as they would appear visually. */
        }

        .screen-reader-text:focus {
            background-color: #f1f1f1;
            border-radius: 3px;
            box-shadow: 0 0 2px 2px rgba(0, 0, 0, 0.6);
            clip: auto !important;
            -webkit-clip-path: none;
            clip-path: none;
            color: #21759b;
            display: block;
            font-size: 15px;
            font-size: 0.875rem;
            font-weight: bold;
            height: auto;
            left: 5px;
            line-height: normal;
            padding: 15px 23px 14px;
            text-decoration: none;
            top: 5px;
            width: auto;
            z-index: 100000;
            /* Above WP toolbar. */
        }

        /* Do not show the outline on the skip link target. */
        #content[tabindex="-1"]:focus {
            outline: 0;
        }

        /*--------------------------------------------------------------
# Alignments
--------------------------------------------------------------*/
        .alignleft {
            float: left;
            clear: both;
            margin-right: 20px;
        }

        .alignright {
            float: right;
            clear: both;
            margin-left: 20px;
        }

        .aligncenter {
            clear: both;
            display: block;
            margin: 0 auto 1.75em;
        }

        .alignfull {
            margin: 1.5em 0;
            max-width: 100%;
        }

        .alignwide {
            max-width: 1100px;
        }

        /*--------------------------------------------------------------
# Clearings
--------------------------------------------------------------*/
        .clear:before,
        .clear:after,
        .entry-content:before,
        .entry-content:after,
        .comment-content:before,
        .comment-content:after,
        .site-header:before,
        .site-header:after,
        .site-content:before,
        .site-content:after,
        .site-footer:before,
        .site-footer:after {
            content: "";
            display: table;
            table-layout: fixed;
        }

        .clear:after,
        .entry-content:after,
        .comment-content:after,
        .site-header:after,
        .site-content:after,
        .site-footer:after {
            clear: both;
        }

        /*--------------------------------------------------------------
## Posts and pages
--------------------------------------------------------------*/
        .sticky {
            display: block;
        }

        .updated:not(.published) {
            display: none;
        }

        /*--------------------------------------------------------------
# Media
--------------------------------------------------------------*/
        .page-content .wp-smiley,
        .entry-content .wp-smiley,
        .comment-content .wp-smiley {
            border: none;
            margin-bottom: 0;
            margin-top: 0;
            padding: 0;
        }

        /* Make sure embeds and iframes fit their containers. */
        embed,
        iframe,
        object {
            max-width: 100%;
        }

        /* Make sure logo link wraps around logo image. */
        .custom-logo-link {
            display: inline-block;
        }

        /*--------------------------------------------------------------
## Captions
--------------------------------------------------------------*/
        .wp-caption {
            margin-bottom: 1.5em;
            max-width: 100%;
            clear: both;
        }

        .wp-caption img[class*=wp-image-] {
            display: block;
            margin-left: auto;
            margin-right: auto;
        }

        .wp-caption .wp-caption-text {
            margin: 0.8075em 0;
        }

        .wp-caption-text {
            text-align: center;
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

        @keyframes backto-top-bounce {
            0% {
                transform: translateY(-5px);
            }

            50% {
                transform: translateY(10px);
            }

            100% {
                transform: translateY(-5px);
            }
        }

        /*-----------------------------------------
    ## Preloader Css
-------------------------------------------*/
        .pre-wrap {
            position: fixed;
            content: "";
            transform: translate(-100%, -240%);
            font-size: 62px;
        }

        .preloader-inner {
            position: fixed;
            left: 0;
            top: 0;
            z-index: 999999999999;
            background-color: #030724;
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .preloader-inner .cancel-preloader {
            position: absolute;
            bottom: 30px;
            right: 30px;
        }

        .preloader-inner .cancel-preloader a {
            background-color: #fff;
            font-weight: 600;
            text-transform: capitalize;
            color: var(--main-color);
            width: 200px;
            height: 50px;
            text-align: center;
            line-height: 50px;
            border-radius: 30px;
            display: block;
            transition: all 0.4s ease;
        }

        .preloader-inner .cancel-preloader a:hover {
            background-color: var(--heading-color);
            color: #fff;
        }

        .spinner {
            margin: 120px auto;
            width: 60px;
            height: 60px;
            position: relative;
            text-align: center;
            animation: sk-rotate 2s infinite linear;
        }

        .dot1,
        .dot2 {
            width: 60%;
            height: 60%;
            display: inline-block;
            position: absolute;
            top: 0;
            background-color: var(--main-color);
            border-radius: 100%;
            animation: sk-bounce 2s infinite ease-in-out;
        }

        .dot2 {
            top: auto;
            bottom: 0;
            animation-delay: -1s;
        }

        @keyframes sk-rotate {
            100% {
                transform: rotate(360deg);
                -webkit-transform: rotate(360deg);
            }
        }

        @keyframes sk-bounce {

            0%,
            100% {
                transform: scale(0);
                -webkit-transform: scale(0);
            }

            50% {
                transform: scale(1);
                -webkit-transform: scale(1);
            }
        }

        /*-----------------------------------------
    ## Breadcumb 
------------------------------------------*/
        .video-play-btn {
            border-radius: 50%;
            background: #f7f7f7;
            width: 90px;
            height: 90px;
            display: inline-block;
            line-height: 100px;
            position: relative;
            z-index: 0;
            text-align: center;
            animation: ripple-white3 2.5s linear infinite;
        }

        .video-play-btn:after {
            z-index: -1;
            content: "";
            position: absolute;
            width: 110px;
            height: 110px;
            border-radius: 50%;
            background: rgba(247, 247, 247, 0.4);
            top: -10px;
            left: -10px;
        }

        .video-play-btn i {
            color: #585858;
            margin-left: 6px;
            font-size: 28px;
        }

        .video-play-btn.video-play-border {
            background: transparent;
            border: 2px solid #fff;
            height: 60px;
            width: 60px;
            line-height: 60px;
        }

        .video-play-btn.video-play-border:hover {
            background: #fff;
        }

        .video-play-btn.video-play-border:hover i {
            color: var(--main-color);
        }

        .video-play-btn.video-play-border i {
            color: #fff;
            font-size: 20px;
            margin-left: 3px;
        }

        .video-play-btn.video-play-border:after {
            display: none;
        }

        /*-----------------------------------------
    ## Breadcumb 
------------------------------------------*/
        .breadcrumb-area {
            padding: 282px 0 125px;
            background-size: cover;
            position: relative;
            background-repeat: no-repeat;
            background-position: center;
        }

        .breadcrumb-area .breadcrumb-inner {
            position: relative;
            z-index: 2;
        }

        .breadcrumb-area .page-title {
            font-size: 45px;
            font-weight: 700;
            margin-bottom: 15px;
            color: #fff;
        }

        .breadcrumb-area .page-list {
            margin: 0;
            padding: 0;
            color: #fff;
        }

        .breadcrumb-area .page-list li {
            font-size: 18px;
            font-weight: 200;
            list-style: none;
            display: inline-block;
            position: relative;
            padding-left: 8px;
        }

        .breadcrumb-area .page-list li:after {
            position: absolute;
            left: 0;
            top: 1px;
            content: "/";
            font-family: "fontawesome";
        }

        .breadcrumb-area .page-list li:first-child {
            padding-left: 0;
        }

        .breadcrumb-area .page-list li:first-child:after {
            display: none;
        }

        /********* social-media *********/
        .social-media {
            padding: 0;
            margin: 0;
            position: relative;
            z-index: 2;
        }

        .social-media li {
            display: inline-block;
            margin: 0 3px;
        }

        .social-media li a {
            height: 38px;
            width: 38px;
            line-height: 40px;
            text-align: center;
            border-radius: 50%;
            font-size: 14px;
            display: inline-block;
            border: 1px solid #CFCFCF;
        }

        .social-media li a:hover {
            background: var(--main-color);
            border: 1px solid var(--main-color);
            color: var(--heading-color);
        }

        .social-media li:first-child {
            margin-left: 0;
        }

        .social-media li:last-child {
            margin-right: 0;
        }

        /********* slider-control *********/
        .slider-control-round .owl-nav button {
            height: 40px;
            width: 40px;
            line-height: 40px;
            margin: 0 8px;
            border-radius: 50%;
            border: 1px solid var(--main-color);
            transition: 0.4s;
            box-shadow: none;
            color: var(--main-color);
            background: transparent;
            padding: 0;
            cursor: pointer;
        }

        .slider-control-round .owl-nav button:hover {
            background: var(--main-color);
            color: #fff;
        }

        .slider-control-round .owl-nav .owl-prev {
            margin-left: 0;
        }

        .slider-control-round .owl-nav .owl-next {
            margin-left: 0;
        }

        .slider-control-square .owl-nav button {
            height: 45px;
            width: 60px;
            line-height: 46px;
            margin: 0 8px;
            border-radius: 0;
            border: 1px solid var(--main-color);
            transition: 0.4s;
            box-shadow: none;
            color: var(--main-color);
            background: transparent;
            font-size: 20px;
            padding: 0;
            cursor: pointer;
        }

        .slider-control-square .owl-nav button:hover {
            background: var(--main-color);
            color: #fff;
        }

        .slider-control-square .owl-nav .owl-prev {
            margin-left: 0;
        }

        .slider-control-square .owl-nav .owl-next {
            margin-left: 0;
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

        .bg-yellow {
            background: #fdc800;
        }

        .bg-green {
            background: #1DC295;
        }

        .bg-deep-green {
            background: #238e1c;
        }

        .bg-blue {
            background: #2878EB;
        }

        .bg-white {
            background: #fff;
        }

        .bg-red {
            background: #F14D5D;
        }

        .bg-gray {
            background: #F0F4F9;
        }

        .bg-black {
            background: var(--heading-color);
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

        .bg-light-green {
            background: rgba(29, 194, 149, 0.1);
        }

        .pd-top-60 {
            padding-top: 60px;
        }

        .pd-top-80 {
            padding-top: 80px;
        }

        .pd-top-90 {
            padding-top: 90px;
        }

        .pd-top-100 {
            padding-top: 100px;
        }

        .pd-top-110 {
            padding-top: 110px;
        }

        .pd-top-120 {
            padding-top: 120px;
        }

        .pd-top-135 {
            padding-top: 135px;
        }

        .pd-top-140 {
            padding-top: 140px;
        }

        .pd-top-150 {
            padding-top: 150px;
        }

        .pd-top-280 {
            padding-top: 280px;
        }

        .mg-top-120 {
            margin-top: 120px;
        }

        .mg-top-160 {
            margin-top: 160px;
        }

        .mt-200 {
            margin-top: 200px;
        }

        .mt-mn-200 {
            margin-top: -200px;
        }

        .pd-bottom-70 {
            padding-bottom: 70px;
        }

        .pd-bottom-90 {
            padding-bottom: 90px;
        }

        .pd-bottom-100 {
            padding-bottom: 100px;
        }

        .pd-bottom-110 {
            padding-bottom: 110px;
        }

        .pd-bottom-120 {
            padding-bottom: 120px;
        }

        .pd-bottom-150 {
            padding-bottom: 150px;
        }

        .mg-top--170 {
            margin-top: -170px;
        }

        .mg-top--50 {
            margin-top: -50px;
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

        /*---------------------------------------------------
    widget styles
----------------------------------------------------*/
        .td-sidebar .widget {
            margin-bottom: 34px;
        }

        .td-sidebar .widget .widget-title {
            margin-bottom: 23px;
            font-size: 22px;
            position: relative;
        }

        .widget_search {
            padding: 0 !important;
        }

        .widget_search .search-form {
            position: relative;
            background: #fff;
            border-radius: 0px;
            overflow: hidden;
        }

        .widget_search .search-form .form-group {
            margin-bottom: 0;
        }

        .widget_search .search-form input {
            width: 100%;
            border: 0;
            height: 70px;
            background: transparent;
            padding: 0 82px 0 22px;
            border: 2px solid #EAEAEA !important;
        }

        .widget_search .search-form input:focus {
            border: 0;
            outline: 0;
        }

        .widget_search .search-form button {
            position: absolute;
            right: 0;
            border: 0;
            background: var(--main-color);
            cursor: pointer;
            width: 75px;
            top: 0;
            height: 70px;
        }

        .widget_search .search-form button i {
            color: var(--heading-color);
        }

        .widget_search .search-form button:active,
        .widget_search .search-form button:focus {
            box-shadow: none;
            outline: 0;
        }

        .widget-recent-post ul {
            list-style: none;
            padding-left: 0;
            margin-bottom: 10px;
            padding-bottom: 0;
        }

        .widget-recent-post ul li .media {
            margin-bottom: 15px;
            align-items: center;
            border: 1px solid #E3E3E3;
            border-radius: 5px;
            padding: 15px;
        }

        .widget-recent-post ul li .media .media-left {
            margin-right: 15px;
        }

        .widget-recent-post ul li .media .media-left img {
            border-radius: 5px;
        }

        .widget-recent-post ul li .media .media-body .title {
            margin-bottom: 10px;
            font-size: 15px;
        }

        .widget-recent-post ul li .media .media-body .post-info {
            font-weight: 400;
            font-size: 12px;
            color: var(--heading-color);
        }

        .widget-recent-post ul li .media .media-body .post-info i,
        .widget-recent-post ul li .media .media-body .post-info svg {
            margin-right: 5px;
        }

        .widget-recent-post ul li .media .media-body .post-info a {
            color: var(--main-color);
            font-weight: 500;
        }

        .widget-recent-post ul li:last-child {
            border-bottom: 0 !important;
        }

        .widget_catagory ul {
            padding-left: 0;
            padding-bottom: 0;
            margin-bottom: 0;
        }

        .widget_catagory ul li {
            list-style: none;
            transition: all 0.4s ease;
            margin-bottom: 15px;
            border: 1px solid #E3E3E3;
            border-radius: 5px;
            padding: 11px 12px 11px 0;
            position: relative;
        }

        .widget_catagory ul li a {
            position: relative;
            display: block;
            font-size: 16px;
            font-weight: 500;
            color: var(--heading-color);
            padding-left: 20px;
        }

        .widget_catagory ul li a:hover {
            color: var(--heading-color);
        }

        .widget_catagory ul li a i {
            padding-right: 10px;
            font-size: 16px;
            color: var(--heading-color);
            position: absolute;
            right: 0;
            top: 6px;
        }

        .widget_catagory ul li:hover {
            border: 1px solid var(--main-color);
        }

        .widget_catagory ul li:last-child {
            margin-bottom: 0;
        }

        .widget_twitter ul {
            padding-left: 0;
        }

        .widget_twitter ul li {
            list-style: none;
            transition: all 0.4s ease;
            margin-bottom: 6px;
            display: flex;
            border-bottom: 1px solid #d2d0d0;
            padding-bottom: 25px;
            margin-bottom: 25px;
        }

        .widget_twitter ul li a {
            position: relative;
            padding-left: 25px;
        }

        .widget_twitter ul li a i {
            padding-right: 10px;
            position: absolute;
            left: 0;
            top: 7px;
        }

        .widget_twitter ul li:last-child {
            margin-bottom: 0;
            padding-bottom: 0;
            border-bottom: 0;
        }

        .widget_tags .tagcloud a {
            border: 1px solid #E3E3E3;
            height: 40px;
            line-height: 40px;
            padding: 0 20px;
            border-radius: 4px;
            display: inline-block;
            margin: 0 10px 15px 0;
            font-family: "Lato", sans-serif;
            font-weight: 400;
            font-size: 14px;
            color: #808080;
        }

        .widget_tags .tagcloud a:hover {
            background: var(--main-color);
            color: #ffffff;
            border-color: var(--main-color);
        }

        /*********** widget_checkbox_list ************/
        .widget_checkbox_list .single-checkbox:last-child {
            margin-bottom: 0;
            border-bottom: 0;
            padding-bottom: 0;
        }

        .single-checkbox {
            display: block;
            position: relative;
            padding-left: 25px;
            margin-bottom: 7px;
            padding-bottom: 7px;
            cursor: pointer;
            font-size: 16px;
            color: var(--heading-color);
            -webkit-user-select: none;
            user-select: none;
            border-bottom: 1px solid #E3E3E3;
        }

        .single-checkbox:hover input~.checkmark {
            background-color: #ccc;
        }

        .single-checkbox input {
            position: absolute;
            opacity: 0;
            cursor: pointer;
            height: 0;
            width: 0;
        }

        .single-checkbox input:checked~.checkmark {
            background-color: var(--main-color);
        }

        .single-checkbox input:checked~.checkmark:after {
            display: block;
        }

        .single-checkbox .checkmark {
            position: absolute;
            top: 6px;
            left: 0;
            height: 15px;
            width: 15px;
            background-color: #eee;
        }

        .single-checkbox .checkmark:after {
            content: "";
            position: absolute;
            display: none;
            left: 5px;
            top: 2px;
            width: 5px;
            height: 10px;
            border: solid var(--heading-color);
            border-width: 0 1px 1px 0;
            transform: rotate(45deg);
        }

        .widget-g-map iframe {
            height: 350px;
            width: 100%;
            border: 0;
            line-height: 1 !important;
        }

        .widget_event {
            border-radius: 5px;
            padding: 30px 25px;
            background: var(--heading-color);
        }

        .widget_event ul {
            padding: 0;
            margin: 0;
        }

        .widget_event li {
            color: #fff;
            margin-bottom: 9px;
            font-size: 16px;
            list-style: none;
        }

        .widget_event li:last-child {
            margin-bottom: 0;
        }

        .widget_event li i {
            color: var(--main-color);
            margin-right: 8px;
        }

        .widget_feature {
            border: 1px solid #CBD6E2;
        }

        .widget_feature .widget-title {
            padding: 18px 25px;
            border-bottom: 1px solid #F0F4F9;
            margin-bottom: 18px !important;
        }

        .widget_feature ul {
            padding: 0 25px 20px;
        }

        .widget_feature ul li {
            color: var(--heading-color);
            font-size: 16px;
            margin-bottom: 9px;
            list-style: none;
        }

        .widget_feature ul li span {
            font-weight: 500;
            margin-right: 5px;
        }

        .widget_feature ul li i {
            margin-right: 8px;
        }

        .widget_feature .price-wrap {
            background-color: #F0F4F9;
            padding: 34px 23px 40px;
        }

        .widget_feature .price-wrap h5 {
            font-size: 22px;
            margin-bottom: 28px;
        }

        .widget_feature .price-wrap h5 span {
            font-weight: 400;
            margin-left: 5px;
        }

        .widget_feature .price-wrap .btn {
            width: 100%;
        }

        /*----------------------------------------------
    # Nav bar 
----------------------------------------------*/
        .navbar-top {
            padding: 13px 0 4px 0;
            background: var(--main-color);
        }

        .navbar-top ul {
            margin: 0;
            padding: 0;
            line-height: initial;
        }

        .navbar-top ul li {
            display: inline-block;
            list-style: none;
            margin-right: 20px;
            padding-bottom: 10px;
        }

        .navbar-top ul li:last-child {
            margin-right: 0;
        }

        .navbar-top ul li p,
        .navbar-top ul li a {
            margin: 0;
            font-size: 14px;
            color: var(--heading-color);
            font-weight: 500;
        }

        .navbar-top ul li p img,
        .navbar-top ul li a img {
            margin-right: 5px;
        }

        .navbar-top ul li p i,
        .navbar-top ul li a i {
            margin-right: 5px;
        }

        .navbar-top ul li a:hover {
            color: #1DC295;
        }

        .navbar-top .topbar-right a {
            margin: 0 7px;
        }

        .navbar-top .topbar-right li a i {
            margin-right: 0;
        }

        .navbar-top .topbar-right li a:last-child {
            margin-right: 0;
        }

        .navbar-top .topbar-right li:first-child {
            margin: 0;
            padding-right: 17px;
        }

        .navbar-top .topbar-right li:last-child {
            border-right: 0;
            padding-right: 0;
        }

        .navbar-area {
            position: absolute;
            width: 100%;
            z-index: 99;
        }

        .navbar-area .nav-container {
            background-color: transparent;
            padding: 12px 15px;
            transition: all 0.4s;
        }

        .navbar-area .nav-container .logo a {
            font-weight: 700;
            font-size: 24px;
            color: #fff;
        }

        .navbar-area .nav-container .logo a img {
            height: auto;
        }

        .navbar-area .nav-container .btn-transparent {
            font-size: 13px;
            font-weight: 700;
        }

        .navbar-area .nav-container .navbar-collapse .navbar-nav {
            display: block;
            width: 100%;
            padding-left: 80px;
            text-align: left;
        }

        .navbar-area .nav-container .navbar-collapse .navbar-nav li {
            display: inline-block;
            font-weight: 500;
            line-height: 50px;
            text-transform: capitalize;
        }

        .navbar-area .nav-container .navbar-collapse .navbar-nav li a {
            color: var(--heading-color);
            font-weight: 500;
            font-size: 17px;
        }

        .navbar-area .nav-container .navbar-collapse .navbar-nav li:hover a {
            color: var(--main-color);
        }

        .navbar-area .nav-container .navbar-collapse .navbar-nav li+li {
            margin-left: 15px;
        }

        .navbar-area .nav-container .navbar-collapse .navbar-nav li.menu-item-has-children {
            position: relative;
            z-index: 0;
            padding-right: 14px;
        }

        .navbar-area .nav-container .navbar-collapse .navbar-nav li.menu-item-has-children:before {
            content: "";
            position: absolute;
            right: 3px;
            top: 50%;
            height: 10px;
            width: 2px;
            background: var(--heading-color);
            transform: translateY(-50%);
            transition: all 0.3s ease-in;
            margin-top: 0px;
        }

        .navbar-area .nav-container .navbar-collapse .navbar-nav li.menu-item-has-children:after {
            content: "";
            position: absolute;
            right: -1px;
            top: 25px;
            height: 2px;
            width: 10px;
            background: var(--heading-color);
            transform: translateY(-50%);
            transition: all 0.3s ease-in;
        }

        .navbar-area .nav-container .navbar-collapse .navbar-nav li.menu-item-has-children:hover {
            transition: all 0.4s ease;
        }

        .navbar-area .nav-container .navbar-collapse .navbar-nav li.menu-item-has-children:hover:before {
            opacity: 0;
        }

        .navbar-area .nav-container .navbar-collapse .navbar-nav li.menu-item-has-children:hover:after {
            background: var(--main-color);
        }

        .navbar-area .nav-container .navbar-collapse .navbar-nav li.menu-item-has-children:hover>.sub-menu {
            visibility: visible;
            opacity: 1;
        }

        .navbar-area .nav-container .navbar-collapse .navbar-nav li.menu-item-has-children .sub-menu {
            position: absolute;
            text-align: left;
            min-width: 210px;
            margin: 0;
            padding: 0;
            list-style: none;
            left: 0;
            top: 100%;
            box-shadow: 0 0 15px 0 rgba(0, 0, 0, 0.05);
            background-color: #fff;
            z-index: 9;
            overflow: hidden;
            visibility: hidden;
            opacity: 0;
            transition: all 0.4s ease;
            border-radius: 0;
        }

        .navbar-area .nav-container .navbar-collapse .navbar-nav li.menu-item-has-children .sub-menu.border-bt0 {
            border-bottom: 0px !important;
        }

        .navbar-area .nav-container .navbar-collapse .navbar-nav li.menu-item-has-children .sub-menu li {
            display: block;
            margin-left: 0;
            line-height: 22px;
            font-size: 15px;
            transition: all 0.4s ease;
            border-bottom: 1px solid #f5f5f5;
        }

        .navbar-area .nav-container .navbar-collapse .navbar-nav li.menu-item-has-children .sub-menu li a {
            display: block;
            padding: 10px 20px;
            white-space: nowrap;
            transition: all 0.3s;
            color: #050a30;
            font-size: 14px;
            font-weight: 500;
            transition: all 0.4s ease;
            position: relative;
        }

        .navbar-area .nav-container .navbar-collapse .navbar-nav li.menu-item-has-children .sub-menu li a:before {
            position: absolute;
            left: 17px;
            top: 50%;
            content: "";
            font-family: "fontawesome";
            /* IE 9 */
            /* Chrome, Safari, Opera */
            transform: translateY(-50%);
            visibility: hidden;
            opacity: 0;
            transition: 0.4s;
            color: #fff;
        }

        .navbar-area .nav-container .navbar-collapse .navbar-nav li.menu-item-has-children .sub-menu li:hover {
            background: #061539;
        }

        .navbar-area .nav-container .navbar-collapse .navbar-nav li.menu-item-has-children .sub-menu li:hover a {
            color: #fff;
            padding: 10px 20px 10px 30px;
        }

        .navbar-area .nav-container .navbar-collapse .navbar-nav li.menu-item-has-children .sub-menu li:hover a:before {
            visibility: visible;
            opacity: 1;
        }

        .navbar-area .nav-container .navbar-collapse .navbar-nav li.menu-item-has-children .sub-menu li:last-child {
            border-bottom: 0;
        }

        .navbar-area .nav-container .navbar-collapse .navbar-nav li.menu-item-has-children .sub-menu .menu-item-has-children {
            position: relative;
            z-index: 0;
            padding-right: 0px;
        }

        .navbar-area .nav-container .navbar-collapse .navbar-nav li.menu-item-has-children .sub-menu .menu-item-has-children:before {
            position: absolute;
            right: 15px;
            top: 50%;
            content: "";
            font-family: "fontawesome";
            /* IE 9 */
            /* Chrome, Safari, Opera */
            transform: translateY(-50%);
        }

        .navbar-area .nav-container .navbar-collapse .navbar-nav li.menu-item-has-children .sub-menu .menu-item-has-children>.sub-menu {
            left: 100%;
            top: 20px;
        }

        .navbar-area .nav-container .navbar-collapse .navbar-nav li.menu-item-has-children .sub-menu .menu-item-has-children>.sub-menu .sub-menu .sub-menu {
            left: auto;
            right: 100%;
        }

        .navbar-area .nav-container .navbar-collapse .navbar-nav li.menu-item-has-children .sub-menu .menu-item-has-children:hover>.sub-menu {
            visibility: visible;
            opacity: 1;
        }

        .navbar-area .nav-container .navbar-collapse .navbar-nav li.menu-item-has-children .sub-menu .menu-item-has-children:hover>.sub-menu li:hover:before {
            color: #fff;
        }

        .navbar-area .nav-container .navbar-collapse .navbar-nav>li {
            margin-right: 12px;
        }

        .sticky-active {
            animation: 300ms ease-in-out 0s normal none 1 running fadeInDown;
            left: 0;
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 999;
            box-shadow: 0 10px 20px 0 rgba(46, 56, 220, 0.05);
        }

        .navbar-area-1.sticky-active {
            background: #fff;
        }

        .navbar-area-2 {
            background: rgba(0, 33, 71, 0.4);
        }

        .navbar-area-2 .nav-container .navbar-collapse .navbar-nav>li>a {
            color: #fff;
        }

        .navbar-area-2 .nav-container .navbar-collapse .navbar-nav>li.menu-item-has-children:before {
            background: #fff;
        }

        .navbar-area-2 .nav-container .navbar-collapse .navbar-nav>li.menu-item-has-children:after {
            background: #fff;
        }

        .navbar-area-2.sticky-active {
            background: var(--heading-color);
        }

        .navbar-area-3 {
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .navbar-area-3 .nav-container .navbar-collapse .navbar-nav>li>a {
            color: #fff;
        }

        .navbar-area-3 .nav-container .navbar-collapse .navbar-nav>li.menu-item-has-children:before {
            background: #fff;
        }

        .navbar-area-3 .nav-container .navbar-collapse .navbar-nav>li.menu-item-has-children:after {
            background: #fff;
        }

        .navbar-area-3.sticky-active {
            background: var(--heading-color);
            border-bottom: 0;
        }

        .navbar-nav {
            opacity: 0;
            margin-right: -30px;
            visibility: hidden;
            transition: all 0.3s ease 0s;
        }

        .menu-open {
            opacity: 1;
            margin-right: 0;
            visibility: visible;
        }

        .bar1 {
            width: 32px;
            height: 2px;
            margin-bottom: 5px;
            position: absolute;
            background: #fff;
            z-index: 9999;
            top: 10px;
            right: -5px;
        }

        .bar2 {
            width: 24px;
            height: 2px;
            margin-bottom: 5px;
            position: absolute;
            background: #fff;
            z-index: 9999;
            top: 17px;
            right: -5px;
        }

        .bar3 {
            width: 18px;
            height: 2px;
            margin-bottom: 5px;
            position: absolute;
            background: #fff;
            z-index: 9999;
            top: 24px;
            right: -5px;
        }

        .responsive-mobile-menu button:focus {
            outline: none;
            border: none;
        }

        /**************** nav-right-part *************/
        .nav-right-part .btn {
            height: 45px;
            line-height: 45px;
            padding: 0 25px;
        }

        .nav-right-part a {
            margin-left: 20px;
            color: var(--heading-color);
        }

        .nav-right-part .search-bar {
            border: 1px solid rgba(0, 33, 71, 0.2);
            display: inline-block;
            height: 45px;
            width: 45px;
            line-height: 43px;
            text-align: center;
        }

        .nav-right-part .search-bar:hover {
            background: var(--main-color);
            border: 1px solid var(--main-color);
        }

        .nav-right-part .emt-phone-wrap {
            display: inline-block;
        }

        .nav-right-part .emt-phone-wrap .emt-phone {
            display: flex;
        }

        .nav-right-part .emt-phone-wrap .emt-phone i {
            font-size: 22px;
            display: inline-block;
            border: 1px solid var(--main-color);
            height: 45px;
            width: 45px;
            line-height: 45px;
            border-radius: 50%;
            text-align: center;
            color: #fff;
            margin-right: 10px;
        }

        .nav-right-part .emt-phone-wrap .emt-phone .phone-number {
            line-height: 1.4;
            font-size: 15px;
            color: #fff;
        }

        .nav-right-part .emt-phone-wrap .emt-phone .phone-number span {
            font-weight: 500;
        }

        .nav-right-part.style-black a {
            color: #fff;
        }

        .nav-right-part.style-black .btn {
            color: var(--heading-color);
        }

        .nav-right-part.style-black .search-bar {
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .nav-right-part.style-black .search-bar:hover {
            border: 1px solid var(--main-color);
        }

        .nav-right-part-desktop {
            margin-left: 20px;
        }

        .nav-right-part-mobile {
            display: none;
        }



        @media only screen and (max-width: 991px) {
            .navbar-area-2 .nav-container .navbar-collapse .navbar-nav>li.menu-item-has-children:before {
                background: var(--heading-color);
            }

            .navbar-area-2 .nav-container .navbar-collapse .navbar-nav>li.menu-item-has-children:after {
                background: var(--heading-color);
            }

            .navbar-area-3 .nav-container .navbar-collapse .navbar-nav>li.menu-item-has-children:before {
                background: var(--heading-color);
            }

            .navbar-area-3 .nav-container .navbar-collapse .navbar-nav>li.menu-item-has-children:after {
                background: var(--heading-color);
            }

            .navbar-area .nav-container {
                padding: 10px 15px;
            }

            .nav-right-part {
                margin-right: 50px;
            }

            .nav-right-part .btn .right {
                padding-left: 5px;
                font-size: 13px;
            }

            .navbar-area .nav-container {
                position: relative;
                z-index: 0;
            }

            .navbar-area .nav-container .navbar-toggler {
                padding: 0px;
            }

            .navbar-area .nav-container .navbar-collapse {
                margin-top: 13px;
                padding-right: 0;
            }

            .navbar-area .nav-container .navbar-collapse .navbar-nav {
                display: block;
                margin-top: 20px;
            }

            .navbar-area .nav-container .navbar-collapse .navbar-nav li {
                display: block;
                text-align: left;
                line-height: 30px;
                padding: 10px 0;
                border-bottom: 1px solid rgba(0, 0, 0, 0.1);
            }

            .navbar-area .nav-container .navbar-collapse .navbar-nav li a {
                display: block;
            }

            .navbar-area .nav-container .navbar-collapse .navbar-nav li:last-child {
                border-bottom: none;
            }

            .navbar-area .nav-container .navbar-collapse .navbar-nav li+li {
                margin-left: 0;
            }

            .navbar-area .nav-container .navbar-collapse .navbar-nav li.menu-item-has-children:before {
                top: 25px;
                right: 3px !important;
            }

            .navbar-area .nav-container .navbar-collapse .navbar-nav li.menu-item-has-children .sub-menu {
                position: initial;
                display: block;
                width: 100%;
                border-top: none;
                box-shadow: none;
                margin-left: 0;
                padding-bottom: 0;
                height: auto;
                overflow: hidden;
                max-height: 250px;
                overflow-y: scroll;
                background-color: transparent;
                border-radius: 10px;
                padding: 0px;
                border-bottom: none;
                display: none;
                transition: none;
                visibility: visible;
                opacity: 1;
            }

            .navbar-area .nav-container .navbar-collapse .navbar-nav li.menu-item-has-children .sub-menu .sub-menu .menu-item-has-children:before {
                content: "";
            }

            .navbar-area .nav-container .navbar-collapse .navbar-nav li.menu-item-has-children .sub-menu li {
                padding: 0;
            }

            .navbar-area .nav-container .navbar-collapse .navbar-nav li.menu-item-has-children .sub-menu li.menu-item-has-children:hover:before {
                top: 30px;
                color: #fff;
            }

            .navbar-area .nav-container .navbar-collapse .navbar-nav li.menu-item-has-children .sub-menu li+li {
                border-top: none;
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

        @media only screen and (max-width: 991px) {
            .navbar-area .nav-container .navbar-collapse .navbar-nav {
                padding-left: 0;
                padding: 0 20px;
            }

            .navbar-area .logo {
                padding-top: 0px !important;
            }

            .navbar-collapse {
                background: #fff;
                margin-top: 0px;
                width: 100%;
            }

            .navbar-area .nav-container .navbar-collapse .navbar-nav li.menu-item-has-children:before {
                right: 20px;
            }

            .navbar-area .nav-container .navbar-collapse .navbar-nav {
                margin-bottom: 20px;
            }

            .navbar-area {
                padding-bottom: 0px;
            }

            .navbar-expand-lg .navbar-collapse {
                margin-top: 0px;
            }

            .contact-widget .contact_info_list li.single-info-item .details {
                padding-left: 25px;
            }

            .navbar-area .nav-container .navbar-collapse .navbar-nav li.menu-item-has-children .sub-menu {
                padding: 0 0 0 20px;
            }

            .navbar-area .nav-container .navbar-collapse .navbar-nav li.menu-item-has-children .sub-menu li a {
                padding: 12px 0;
            }

            .navbar-area .nav-container .navbar-collapse .navbar-nav li.menu-item-has-children .sub-menu li:last-child a {
                padding-bottom: 3px;
            }

            .navbar-area .nav-container .navbar-collapse .navbar-nav li.menu-item-has-children .sub-menu li a:hover i {
                opacity: 0;
                margin-right: -18px;
            }

            .nav-right-part-mobile {
                display: block;
            }

            .nav-right-part-desktop {
                display: none;
            }

            .navbar-area .nav-container .navbar-collapse .navbar-nav li.menu-item-has-children .sub-menu li:hover {
                background: none;
            }

            .navbar-area .nav-container .navbar-collapse .navbar-nav li a {
                color: var(--heading-color);
            }
        }

      

    </style>

</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">

    <!-- Navigation -->
    <header class="navbar-area">
        <nav class="navbar navbar-expand-lg navbar-default navbar-fixed-top">
            <div class="container nav-container">

                <!-- Logo -->
                <div class="logo">
                    <a class="main-logo" href="index.html"><img
                            src="https://solverwp.com/demo/html/edumint/demo-landing/img/logo-1.png" alt="img"></a>
                </div>
                <div class="nav-right-part nav-right-part-mobile ms-auto">
                    <ul class="text-end">
                        <li>
                            <a class="page-scroll" href="#about">About</a>
                        </li>
                      
                        <li>
                            <a class="page-scroll" href="#inner">Inners Page</a>
                        </li>
                        <li>
                            <a class="page-scroll" href="#cara_pesan">Cara Pesan</a>
                        </li>
                        <li>
                            <a class="page-scroll" href="#ruang">Ruang</a>
                        </li>
                        <li>
                            <a class="page-scroll" href="#testimoni">Testimoni</a>
                        </li>
                        <li>
                            <a class="cart" href="log-in.html">
                                <img src="demo-landing/img/add-to-cart.svg" alt="img">
                            </a>
                        </li>
                    </ul>
                </div>
                <div  class="collapse navbar-collapse" id="alamgir_main_menu">
                    <ul  class="navbar-nav menu-open text-center m-auto">
                        <li>
                            <a style="color: white;" class="page-scroll" href="index-1.html">Home</a>
                        </li>
                        <li>
                            <a style="color: white;" class="page-scroll" href="#about">About</a>
                        </li>
                      
                        <li>
                            <a style="color: white;" class="page-scroll" href="#inner">Inner Pages</a>
                        </li>
                        <li>
                            <a style="color: white;" class="page-scroll" href="#cara_pesan">Cara Pesan</a>
                        </li>
                        <li>
                            <a style="color: white;" class="page-scroll" href="#ruang">Ruang</a>
                        </li>
                        <li>
                            <a style="color: white;" class="page-scroll" href="#testimoni">Testimoni</a>
                        </li>
                    </ul>
                </div>
                <div class="nav-right-part nav-right-part-desktop">
                    <ul>
                        <!-- <li>
                            <a target="_blank" href="https://1.envato.market/DVbQmd" class="btn btn-white">
                                $9 Purchase Now
                            </a>
                        </li> -->
                    </ul>
                </div>
            </div>
        </nav>
    </header>
</body>

</html>