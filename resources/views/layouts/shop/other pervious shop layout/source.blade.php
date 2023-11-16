    @section('source')
        <script type="text/javascript">
            var originalData = $('#search_view').html();
            $('#search').on('keyup', function() {
                $value = $(this).val();
                if ($value != '') {
                    $.ajax({
                        type: 'get',
                        url: '{{ URL::to('search') }}',
                        data: {
                            'search': $value
                        },
                        success: function(data) {
                            $('#search_view').html(data);
                        }
                    });
                } else {
                    $('#search_view').html(originalData);
                }
            })
            $(document).ready(function() {
                $("#reset").click(function() {
                    $('#search_view').html(originalData);
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
        <script type="text/javascript">
            $(document).ready(function() {
                $("#sortBy").on("change", function() {
                    var sort = $("#sortBy").val();
                    // alert(sort);
                    window.location = "{{ route('product_trending') }}?sort=" + sort;
                });
            });
        </script>
        <script>
            function loadmoreData(page) {
                $.ajax({
                        url: '?page=' + page,
                        type: 'get',
                        beforeSend: function() {
                            $(".ajax-load").show();
                        },
                    })
                    .done(function(data) {
                        if (data.html == '') {
                            $('.ajax-load').html('No more product available');
                            return;
                        }
                        $('.ajax-load').hide();
                        $('#product-data').append(data.html);

                    })
                    .fail(function() {
                        //  alert('Something went wrong! please try again');
                        location.reload();

                    });
            }
            var page = 1;
            $(window).scroll(function() {
                if ($(window).scrollTop() + $(window).height() + 120 >= $(document).height()) {
                    page++;
                    loadmoreData(page);
                }

            })
        </script>
        <!-- JS here -->
        <script src="js/shop/vendor/modernizr-3.5.0.min.js"></script>
        <script src="js/shop/vendor/jquery-1.12.4.min.js"></script>
        {{-- <script src="js/shop/countdown.js"></script> --}}
        <script src="js/shop/popper.min.js"></script>
        <script src="js/shop/bootstrap.min.js"></script>
        <script src="js/shop/owl.carousel.min.js"></script>
        <script src="js/shop/isotope.pkgd.min.js"></script>
        <script src="js/shop/one-page-nav-min.js"></script>
        <script src="js/shop/slick.min.js"></script>
        <script src="js/shop/ajax-form.js"></script>
        <script src="js/shop/wow.min.js"></script>
        <script src="js/shop/jquery.scrollUp.min.js"></script>
        <script src="js/shop/imagesloaded.pkgd.min.js"></script>
        <script src="js/shop/jquery.nice-select.min.js"></script>
        <script src="js/shop/jquery.magnific-popup.min.js"></script>
        <script src="js/shop/jquery.countdown.min.js"></script>
        <script src="js/shop/jquery-ui-slider-range.js"></script>
        <script src="js/shop/jquery.elevateZoom-3.0.8.min.js"></script>
        <script src="js/shop/meanmenu.min.js"></script>
        <script src="js/shop/Elemental.js"></script>
        <script src="js/shop/plugins.js"></script>
        <script src="js/shop/main.js"></script>
        <script src="js/shop/custom.js"></script>

    @show
