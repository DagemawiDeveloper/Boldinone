<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Dagemawi Alemayehu (Et-systems)">

    <title> @yield('title')</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
    <!-- Custom styles for this page -->
    <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">

    <!-- Alpinejs -->
    <script src="//unpkg.com/alpinejs" defer></script>
    {{-- lightbox --}}
    <link href="{{ asset('js/lib/lightbox2-2.11.4/src/css/lightbox.css') }}" rel="stylesheet" />
    {{-- tiny editor --}}
    <script src="https://cdn.tiny.cloud/1/xpkvzoze184wadly2c5av1cxeqbvledbz8zi1a55m3q0d7pj/tinymce/6/tinymce.min.js"
        referrerpolicy="origin"></script>

    <style>
        .search_view {
            z-index: 5000 !important;
            position: absolute;
            width: -webkit-fill-available;
        }

        .search_back {
            position: absolute;
            background-color: #ffffff;
            width: 100%;
            border-radius: 4px padding: 4px;
            margin-top: 10%;

        }

        .search_text {
            margin: 21px;
            font-family: sans-serif;
            font-size: small;
            color: #cd3301;
        }

        .search_type {
            font-family: sans-serif;
            font-size: smaller;
            color: #847f7d;
            float: right;
            font-weight: bold;
            margin-right: 18px;
        }

        /* table css start here */

        table {
            border: 1px solid #ccc;
            border-collapse: collapse;
            margin: 0;
            padding: 0;
            width: 100%;
            /* table-layout: fixed; */
        }

        table caption {
            font-size: 1.5em;
            margin: .5em 0 .75em;
        }

        table tr {
            /* background-color: #f8f8f8; */
            border: 1px solid #ddd;
            padding: .35em;
        }

        table th,
        table td {
            padding: .625em;
            text-align: center;
        }

        table th {
            font-size: .85em;
            letter-spacing: .1em;
            text-transform: uppercase;
        }

        @media screen and (max-width: 600px) {
            table {
                border: 0;
            }

            table caption {
                font-size: 1.3em;
            }

            table thead {
                border: none;
                clip: rect(0 0 0 0);
                height: 1px;
                margin: -1px;
                overflow: hidden;
                padding: 0;
                position: absolute;
                width: 1px;
            }

            table tr {
                border-bottom: 3px solid #ddd;
                display: block;
                margin-bottom: .625em;
            }

            table td {
                border-bottom: 1px solid #ddd;
                display: block;
                font-size: .8em;
                text-align: right;
            }

            table td::before {
                /*
            * aria-label has no advantage, it won't be read inside a table
            content: attr(aria-label);
            */
                content: attr(data-label);
                float: left;
                font-weight: bold;
                text-transform: uppercase;
            }

            table td:last-child {
                border-bottom: 0;
            }
        }
    </style>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
        @yield('sidebar')

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            @yield('content')
            @yield('maincontent')
            @yield('footer')
        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="{{ route('logout') }}">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('js/lib/lightbox2-2.11.4/src/js/lightbox.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

    <!-- Page level plugins -->
    {{-- <script src="{{asset('vendor/chart.js/Chart.min.js')}}"></script> --}}

    <!-- Page level custom scripts -->
    {{-- <script src="{{asset('js/demo/chart-area-demo.js')}}"></script>
    <script src="{{asset('js/demo/chart-pie-demo.js')}}"></script> --}}

</body>
<script>
    tinymce.init({
        selector: 'textarea',
        plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed linkchecker a11ychecker tinymcespellchecker permanentpen powerpaste advtable advcode editimage tinycomments tableofcontents footnotes mergetags autocorrect typography inlinecss',
        toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
        tinycomments_mode: 'embedded',
        tinycomments_author: 'Author name',
        mergetags_list: [{
                value: 'First.Name',
                title: 'First Name'
            },
            {
                value: 'Email',
                title: 'Email'
            },
        ]
    });
</script>
<script type="text/javascript">
    // product search
    var originalData_view_products = $('#search_view_products').html();
    $('#search_products').on('keyup', function() {
        $value = $(this).val();
        if ($value != '') {
            $.ajax({
                type: 'get',
                url: '{{ URL::to('admin/searchforproducts') }}',
                data: {
                    'search': $value
                },
                success: function(data) {
                    $('#search_view_products').html(data);
                }
            });
        } else {
            $('#search_view_products').html(originalData_view_products);
        }

    })
    $(document).ready(function() {
        $("#reset").click(function() {
            $('#search_view_products').html(originalData_view_products);
        });
    });


    // product orders
    var originalData_view_orders = $('#search_view_orders').html();
    $('#search_orders').on('keyup', function() {
        $value = $(this).val();
        if ($value != '') {
            $.ajax({
                type: 'get',
                url: '{{ URL::to('admin/searchfororders') }}',
                data: {
                    'search': $value
                },
                success: function(data) {
                    $('#search_view_orders').html(data);
                }
            });
        } else {
            $('#search_view_orders').html(originalData_view_orders);
        }
    })
    $(document).ready(function() {
        $("#reset").click(function() {
            $('#search_view_orders').html(originalData_view_orders);
        });
    });


    // product categories
    var originalData_view_categories = $('#search_view_categories').html();
    $('#search_categories').on('keyup', function() {
        $value = $(this).val();
        if ($value != '') {
            $.ajax({
                type: 'get',
                url: '{{ URL::to('admin/searchforcategories') }}',
                data: {
                    'search': $value
                },
                success: function(data) {
                    $('#search_view_categories').html(data);
                }
            });
        } else {
            $('#search_view_categories').html(originalData_view_categories);
        }
    })
    $(document).ready(function() {
        $("#reset").click(function() {
            $('#search_view_categories').html(originalData_view_categories);
        });
    });


    // product search on mobile
    var originalData_view_products_mobile = $('#search_view_products_mobile').html();
    $('#search_products_mobile').on('keyup', function() {
        $value = $(this).val();
        if ($value != '') {
            $.ajax({
                type: 'get',
                url: '{{ URL::to('admin/searchforproducts') }}',
                data: {
                    'search': $value
                },
                success: function(data) {
                    $('#search_view_products_mobile').html(data);
                }
            });
        } else {
            $('#search_view_products_mobile').html(originalData_view_products_mobile);
        }
    })
    $(document).ready(function() {
        $("#reset").click(function() {
            $('#search_view_products_mobile').html(originalData_view_products_mobile);
        });
    });


    // product orders on mobile
    var originalData_orders_mobile = $('#search_view_orders_mobile').html();
    $('#search_orders_mobile').on('keyup', function() {
        $value = $(this).val();
        if ($value != '') {
            $.ajax({
                type: 'get',
                url: '{{ URL::to('admin/searchfororders') }}',
                data: {
                    'search': $value
                },
                success: function(data) {
                    $('#search_view_orders_mobile').html(data);
                }
            });
        } else {
            $('#search_view_orders_mobile').html(originalData_orders_mobile);
        }
    })
    $(document).ready(function() {
        $("#reset").click(function() {
            $('#search_view_orders_mobile').html(originalData_orders_mobile);
        });
    });


    //search categories mobile
    var originalData_categories_mobile = $('#search_view_categories_mobile').html();
    $('#search_categories_mobile').on('keyup', function() {
        $value = $(this).val();
        if ($value != '') {
            $.ajax({
                type: 'get',
                url: '{{ URL::to('admin/searchforcategories') }}',
                data: {
                    'search': $value
                },
                success: function(data) {
                    $('#search_view_categories_mobile').html(data);
                }
            });
        } else {
            $('#search_view_categories_mobile').html(originalData_categories_mobile);
        }
    })
    $(document).ready(function() {
        $("#reset").click(function() {
            $('#search_view_categories_mobile').html(originalData_categories_mobile);
        });
    });
</script>
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'csrftoken': '{{ csrf_token() }}'
        }
    });
</script>

</html>
