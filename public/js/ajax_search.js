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