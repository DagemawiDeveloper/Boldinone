@section('header')
    <!DOCTYPE html>
    <html class="no-js" lang="zxx">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title> @yield('title')</title>
        <meta name="title" content="SayatCart">
        <meta name="description" content="Popular and brand items available here">
        <meta name="keywords" content="SayatCart, Sayat, SayatShop">
        <meta name="robots" content="noindex">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="_token" content="{{ csrf_token() }}">
        <meta name="language" content="English">
        <meta name="revisit-after" content=" days">
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        {{-- <meta name="author" content="Dagemawi Alemayheu"> --}}
        <link rel="manifest" href="#">
        <link rel="shortcut icon" type="image/x-icon" href="img/shop/favicon.ico">
        <!-- Place favicon.ico in the root directory -->
        <style>
            .search_view {
                z-index: 5000 !important;
                position: absolute;
                width: -webkit-fill-available;
            }

            .search_back {
                position: absolute;
                background-color: #f8f9fc;
                width: 100%;
                border-radius: 8px;


            }

            .search_text {
                padding: 1rem;
                font-family: sans-serif;
                font-size: small;
                color: #cd3301;
            }

            .search_catagory {
                font-family: sans-serif;
                font-size: smaller;
                color: #847f7d;
                float: right;
                font-weight: bold;
                margin-right: 10px;
            }

            .card {

                border: none;
                box-shadow: 5px 6px 6px 2px #e9ecef;
                border-radius: 4px;
            }


            .dots {

                height: 4px;
                width: 4px;
                margin-bottom: 2px;
                background-color: #bbb;
                border-radius: 50%;
                display: inline-block;
            }

            .badge {

                padding: 7px;
                padding-right: 9px;
                padding-left: 16px;
                box-shadow: 5px 6px 6px 2px #e9ecef;
            }

            .user-img {

                margin-top: 4px;
            }

            .check-icon {

                font-size: 17px;
                color: #c3bfbf;
                top: 1px;
                position: relative;
                margin-left: 3px;
            }

            .form-check-input {
                margin-top: 6px;
                margin-left: -24px !important;
                cursor: pointer;
            }


            .form-check-input:focus {
                box-shadow: none;
            }


            .icons i {

                margin-left: 8px;
            }

            .reply {

                margin-left: 12px;
            }

            .reply small {

                color: #b7b4b4;

            }


            .reply small:hover {

                color: green;
                cursor: pointer;

            }
        </style>
        <!-- CSS here -->
        <link rel="stylesheet" href="css/shop/meanmenu.css">
        <link rel="stylesheet" href="css/shop/style.css">
        <link rel="stylesheet" href="css/shop/responsive.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    </head>
@show
