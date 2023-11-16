@extends('layouts.admin.master')
@extends('layouts.admin.sidebar')
{{-- @extends('layouts.admin.maincontent') --}}
{{-- @extends('layouts.user.service') --}}
@extends('layouts.admin.footer')
@section('title', 'SayatCart | Products')

@section('content')

    <x-admin.dashboard.nav />
    <!-- Main Content -->
    <div id="content">
        <!-- Begin Page Content -->
        <div class="container-fluid">
            @php $now = date('Y-m-d'); @endphp
            <x-admin.dashboard.flash />
            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Products</h1>
                {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> --}}
            </div>

            <a href="{{ route('admin.products.create') }}" class="btn btn-success float-right font-weght bold">
                <i class="fa fa-solid fa-plus p-2"></i>Add
            </a><br>

            <div id="content">
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <div class="col-auto">
                        <!-- Page Heading -->
                        <br>
                        <br>
                        @unless (count($list_products) == 0)
                            <table id="dataTable" class="table table-hover shadow-sm p-3 mb-5 bg-white rounded">
                                <thead>
                                    <tr>
                                        <th scope="col">Items</th>
                                        <th scope="col">Brand</th>
                                        <th scope="col">Trending</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Discount</th>
                                        <th scope="col">Available</th>
                                        <th scope="col">Preview</th>
                                        <th scope="col">Plan</th>
                                        <th scope="col">Deals</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($list_products as $product)
                                        <tr>
                                            <td>{{ $product['product_name'] }}</td>
                                            <td>{{ $product['product_brand'] }}</td>
                                            <td>
                                                @if ($product['product_trending'] == 0)
                                                    No
                                                @else
                                                    Yes
                                                @endif
                                            </td>
                                            <td>
                                                @php
                                                    if ($product['product_quantity'] < '10'):
                                                        echo '<span style="color: red">' . $product['product_quantity'] . '&nbsp;' . 'left' . '</span>';
                                                    else:
                                                        echo '<span style="color: black">' . $product['product_quantity'] . '</span>';
                                                    endif;
                                                @endphp
                                            </td>
                                            <td>{{ number_format($product['product_price'], 2) }}</td>
                                            <td>
                                                @php
                                                    if ($product['product_discount'] == null):
                                                        echo 'No';
                                                    endif;
                                                @endphp
                                                <del>{{ $product['product_discount'] }}%</del>
                                            </td>
                                            <td>
                                                @php
                                                    if ($product['product_available'] == 'instock'):
                                                        echo '<span style="color: rgb(0, 182, 39)">In Stock </span>';
                                                    else:
                                                        echo '<span style="color: red">Out Stock </span>';
                                                    endif;
                                                @endphp
                                            </td>
                                            <td>
                                                {{-- <a href="{{ asset('storage/' . $product->main_image) }}" data-lightbox="{{$product->product_name}}" data-title="{{ $product['product_name' ] }}"><i class="fa fa-eye"></i></a> --}}
                                                <a href="{{ asset('storage/' . $product->main_image) }}"
                                                    data-lightbox="{{ $product->product_name }}"><i class="fa fa-eye"></i></a>
                                                <a href="{{ asset('storage/' . $product->big_image) }}"
                                                    data-lightbox="{{ $product->product_name }}"></a>
                                                <a href="{{ asset('storage/' . $product->big_image1) }}"
                                                    data-lightbox="{{ $product->product_name }}"></a>
                                                <a href="{{ asset('storage/' . $product->big_image2) }}"
                                                    data-lightbox="{{ $product->product_name }}"></a>
                                            </td>
                                            <td>
                                                @php

                                                    $plan_deal = \App\Models\Shop\Plan::where('id', '=', $product->plan_id)->get();
                                                    // dd($plan_deal);
                                                @endphp
                                                @foreach ($plan_deal as $plan)
                                                    @if ($plan['plan_target_date'] == null)
                                                        <b style="color: gray">No Deal</b>
                                                    @elseif($now > $plan->plan_target_date)
                                                        <b style="color: red">Expired</b>
                                                    @else
                                                        <b style="color: green">{{ $plan->plan_target_date }}</b>
                                                    @endif
                                                @endforeach

                                            </td>
                                            {{-- <td>
                                    <a class="btn btn-primary btnQuickView" 
                                      data-product-name="{{ $product['product_name'] }}"
                                      data-product-price="{{ $product['product_price'] }}"
                                      data-product-img="{{ asset('storage/' . $product->main_image) }}"
                                      data-product-catagories="{{ $product['product_catagories' ] }}"
                                    >
                                    Quick View
                                    </a>
                                     <a class="btn btn-primary btnQuickView"><i class="fa fa-eye" style="color: #ffffff;"></i></a>
                                </td> --}}
                                            <td>
                                                @if ($product->is_deal == 1)
                                                    <a href="{{ route('admin.disable_deal') }}?dis={{ $product->id }}"
                                                        onclick="return confirm('Are you sure?')" class="btn btn-danger m-1"
                                                        style="background-color: unset; border: unset; color: red;"><i
                                                            class="fa fa-stop"></i></a>
                                                @else
                                                    <a href="{{ route('admin.update_deal') }}?upd={{ $product->id }}"
                                                        onclick="return confirm('Are you sure?')" class="btn btn-primary m-1"
                                                        style="background-color: unset; border: unset; color:dodgerblue;"><i
                                                            class="fa fa-play"></i></a>
                                                @endif
                                            </td>
                                            <td style="display:flex;">
                                                <a href="{{ route('admin.products.edit', $product->id) }}"
                                                    class="btn btn-success m-1" style="background-color: unset; border: unset;">
                                                    <span class="icon text-white-50">
                                                        <i class="fa fa-pen" style="color: green;"></i>
                                                    </span>
                                                </a>
                                                <form method="POST"
                                                    action="{{ route('admin.products.destroy', $product->id) }}"
                                                    onsubmit="return confirm('Are you sure?')" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger m-1"
                                                        style="background-color: unset; border: unset; color:red;">
                                                        <span class="icon text-white-20">
                                                            <i class="fas fa-trash"></i>
                                                        </span>
                                                    </button>
                                                </form>

                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="mt-6 p-4">
                                {{ $list_products->links() }}
                            </div>
                        @else
                            <h3 class="service_text">No data</h1>
                            @endunless

                            <!-- Quick View Modal -->
                            <div id="quickViewModal" class="modal fade" role="dialog">
                                <div class="modal-dialog">
                                    <!-- Modal content-->
                                    <div class="card">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <div class="card-img-overlay">
                                                    <button type="button" class="close"
                                                        data-dismiss="modal">&times;</button>
                                                </div>
                                                <h4 class="modal-title" id="modal-product-catagories"></h4>
                                            </div>
                                            <img id="modal-product-image">


                                            <div class="card-body">
                                                <img id="modal-product-img" src="">
                                                <p class="card-text"></p>
                                                <p id="modal-product-name"></p>
                                                <p id="modal-product-price"></p>
                                            </div>

                                        </div>
                                        {{-- <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        </div> --}}
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- table script start here --}}
    <!-- Bootstrap core JavaScript-->
    <script src="js/shop/vendor/jquery/jquery.min.js"></script>
    <script src="js/shop/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="js/shop/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/shop/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="js/shop/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="js/shop/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/shop/demo/datatables-demo.js"></script>
    {{-- table script end here --}}
@endsection
