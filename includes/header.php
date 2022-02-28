<!DOCTYPE html>

<?php
ob_start();
?>

<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="static files/logo.png" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>

    <title>Clinica Central Del Quindio</title>

    <style type="text/css">
        * {
            padding: 0px;
            margin: 0px;
        }

        .navbar>.container,
        .navbar>.container-fluid,
        .navbar>.container-lg,
        .navbar>.container-md,
        .navbar>.container-sm,
        .navbar>.container-xl,
        .navbar>.container-xxl {
            margin-left: 60px;
            margin-right: 60px;
            display: flex;
            flex-wrap: inherit;
            align-items: center;
            justify-content: space-between;
        }

        @media only screen and (min-width:280px) and (max-width:950px) {

            .navbar>.container,
            .navbar>.container-fluid,
            .navbar>.container-lg,
            .navbar>.container-md,
            .navbar>.container-sm,
            .navbar>.container-xl,
            .navbar>.container-xxl {
                margin-left: 20px;
                margin-right: 20px;
                display: flex;
                flex-wrap: inherit;
                align-items: center;
                justify-content: space-between;
            }
        }

        .form-label {
            display: flex;
            font-family: system-ui;
            margin-bottom: .5rem;
            justify-content: flex-start;
            margin-bottom: 4px;
        }

        .form {
            text-align: center;
            margin-left: 40%;
            margin-right: 40%;
            margin-top: 5%;
        }

        @media only screen and (min-width:280px) and (max-width:950px) {
            .form {
                text-align: center;
                margin-left: 15%;
                margin-right: 15%;
                margin-top: 5%;
            }
        }


        .form1 {
            text-align: center;
            margin-left: 18%;
            margin-right: 18%;
            margin-top: 5%;
        }

        @media only screen and (min-width:280px) and (max-width:950px) {
            .form1 {
                text-align: center;
                margin-left: 10px;
                margin-right: 10px;
                margin-top: 5%;
            }
        }


        .form-control {
            border-width: 0 0 1px;
            padding: 5px;
        }

        .form-control :hover {
            border-width: 0 0 1px;
        }

        .form-text {
            margin-top: 1.25rem;
            font-size: .875em;
            color: #6c757d;
        }

        .button1 {
            width: 100%;
            margin-top: 15px;
            background-color: #26906C;
            border-color: #26906C;
        }

        .button2 {
            background-color: #26906C;
            border-color: #26906C;
        }

        .button2 {
            background-color: #26906C;
            border-color: #26906C;
        }


        h3 {
            color: #404145a3;
            margin-bottom: 7px;
            font-family: system-ui;
        }

        @media only screen and (min-width:280px) and (max-width:950px) {
            h3 {
                color: #404145a3;
                margin-bottom: 25px;
                margin-top: 25px;
                font-family: system-ui;
            }
        }


        .mb-4 {
            margin-bottom: 8px !important;
        }

        .alert-warning {
            text-align: center;
            color: #664d03;
            background-color: #fff3cd;
            border-color: #ffecb5;
        }


        .alert {
            margin-right: 0%;
            margin-top: 2%;
        }

        .alert2 {
            margin-right: -15%;
            margin-top: 2%;
        }

        .btn {
            margin-bottom: 7%;
        }

        .navbar-light .navbar-nav .nav-link {
            font-family: -webkit-pictograph;
            font-size: 18px;
            font-weight: 600;
            color: rgba(0, 0, 0, .55);
            text-align: center;
        }

        .container-principal {
            display: flex;
            margin: 4% 5% 5% 5%;
            align-items: center;
        }

        .container-principal2 {
            display: flex;
            margin: 9% 20% 5% 5%;
            align-items: center;
        }

        @media only screen and (min-width: 280px) and (max-width: 950px) {
            .container-principal2 {
                display: flex;
                margin: 9% 20% 5% 5%;
                align-items: center;
                flex-direction: column;
            }
        }

        .container-principal3 {
            display: flex;
            margin: 4% 8% 5% 8%;
            align-items: center;
        }

        @media only screen and (min-width: 280px) and (max-width: 950px) {
            .container-principal3 {
                display: flex;
                margin: 7% 5% 5% 8%;
                align-items: center;
                flex-direction: column;
            }
        }

        @media only screen and (min-width:280px) and (max-width:950px) {
            .container-principal {
                display: flex;
                margin: 10%;
                flex-direction: column;
            }
        }

        .container-primary {
            width: 100%;
            align-items: center;
            justify-content: center;
            text-align: center;
            margin-top: -40%;
        }

        .container-primary2 {
            width: 100%;
            align-items: center;
            justify-content: center;
            text-align: center;
        }

        @media only screen and (min-width:280px) and (max-width:950px) {
            .container-primary {
                padding-left: 0px;
                margin-bottom: 45px;
                margin-top: 10px;
            }
        }

        .container {
            padding: 5%;
            width: 100%;
            align-items: center;
            justify-content: center;
            text-align: center;
        }

        .container-secondary {
            width: 100%;
            align-items: center;
            justify-content: center;
            text-align: center;
        }

        @media only screen and (min-width:280px) and (max-width:950px) {
            .container-secondary {
                padding-right: 0px;
            }
        }

        .container-secondary2 {
            width: 100%;
            align-items: center;
            justify-content: center;
            text-align: center;
            padding-left: 100px;
            padding-right: 100px;
        }


        @media only screen and (min-width:280px) and (max-width:950px) {
            .container-secondary2 {
                margin-top: 7%;
                width: 100%;
                align-items: center;
                justify-content: center;
                text-align: center;
                padding-left: 30px;
                padding-right: 30px;
            }
        }

        .divider {
            margin: 0px 1%;
        }

        .sesion {
            display: flex;
            justify-content: center;
            align-items: baseline;
        }

        .spinner-grow {
            display: inline-block;
            width: 8px;
            height: 8px;
            vertical-align: -.125em;
            background-color: currentColor;
            border-radius: 50%;
            opacity: 0;
            -webkit-animation: .75s linear infinite spinner-grow;
            animation: .75s linear infinite spinner-grow;
        }

        p {
            font-family: -webkit-pictograph;
            margin-top: 0;
            margin-bottom: 1rem;
            margin-right: 5px;
            font-weight: 600;
        }

        .salir {
            border: none;
            font-family: -webkit-pictograph;
            font-size: 18px;
            font-weight: 600;
            color: rgba(0, 0, 0, .55);
            background-color: #ffffff00;
        }

        .navbar-light .navbar-nav .nav-link {
            font-family: -webkit-pictograph;
            font-size: 18px;
            font-weight: 600;
            color: rgba(0, 0, 0, .55);
            background-color: #ffffff00;
        }

        .table {
            padding: 0% 7%;
            margin-top: 3%;
        }

        @media only screen and (min-width:280px) and (max-width:950px) {
            .table {
                padding: 0% 3%;
            }
        }

        .text {
            font-size: 18px;
            font-weight: 600;
        }

        .a {
            color: #664d03;
            text-decoration: none;
        }

        .Titulo {
            padding-left: 100px;
            padding-right: 100px;
            margin-top: 3%;
            color: #4da4a7;
            display: flex;
        }

        @media only screen and (min-width:280px) and (max-width:950px) {
            .Titulo {
                text-align: center;
            }
        }

        .card-body>a {
            color: #0d6efd;
            text-decoration: underline;
            font-size: 18px;
            font-weight: 600;
            text-decoration: none;
        }

        .Titulo2>h4 {
            color: #4da4a7;
            font-size: larger;
            margin-bottom: 3%;
        }

        .Titulo>h4 {
            padding-right: 220px;
        }

        @media only screen and (min-width:280px) and (max-width:950px) {
            .Titulo2>h4 {
                color: #4da4a7;
                font-size: larger;
                margin-bottom: 8%;
            }
        }

        .Titulo2>h6 {
            color: #818181;
        }

        .roww {
            padding-left: 100px;
            padding-right: 100px;
            padding-top: 20px;
        }

        @media only screen and (min-width:280px) and (max-width:950px) {
            .roww {
                padding-left: 0px;
                padding-right: 0px;
                margin-left: 60px;
                margin-right: 60px;
                padding-top: 20px;
            }
        }

        .card {
            margin-top: 12px;
            position: relative;
            display: flex;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 0px solid rgba(0, 0, 0, .125);
            border-radius: .25rem;
        }

        .card-body {
            flex: 1 1 auto;
            padding: 0rem 0rem;
        }

        .card2 {
            flex: 1 1 auto;
            padding: 1rem 1rem;
        }

        .nav-item {
            display: flex;
        }

        .d-flex {
            display: flex !important;
            align-items: center;
        }

        .control {
            border-width: 0 0 0px;
            padding: 0px;
            margin-bottom: .5rem;
            font-weight: 500;
            line-height: 1.2;
        }

        .ti {
            margin-bottom: 12%;
        }

        .auto {
            display: flex;
            text-align: center;
            justify-content: center;
            align-items: center;
        }

        .bi-file-earmark-zip {
            margin-right: 9px;
        }

        .formcontrol{
            border-width: 1px;
    padding: 5px;
        }

    </style>

</head>

<body class="containe">

    <script>
        $(document).ready(function() {
            $('.toast').toast('show');
        });
    </script>

    <?php
    ob_start();
    ?>