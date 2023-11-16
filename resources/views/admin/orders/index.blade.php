@extends('layouts.admin.master')
@extends('layouts.admin.sidebar')
{{-- @extends('layouts.admin.maincontent') --}}
{{-- @extends('layouts.user.service') --}}
@extends('layouts.admin.footer')
@section('title', 'SayatCart | Order')

@section('content')

    <x-admin.dashboard.nav />
    <!-- Main Content -->
    <div id="content">
        <!-- Begin Page Content -->
        <div class="container-fluid">
            <x-admin.dashboard.flash />
            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Orders</h1>
                {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> --}}
            </div>

            <div id="content">
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    {{-- <form
                                class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                                <div class="input-group">
                                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                        aria-label="Search" aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="button">
                                            <i class="fas fa-search fa-sm"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                            <br><br> --}}
                    @unless (count($orders) == 0)
                        <table class="shadow-lg p-4 bg-white rounded">
                            <thead>
                                <tr>
                                    <th scope="col">View</th>
                                    {{-- <th scope="col">Items</th> --}}
                                    {{-- <th scope="col">Quantity</th> --}}
                                    <th scope="col">Name</th>
                                    <th scope="col">Total Price</th>
                                    <th scope="col">Email</th>
                                    {{-- <th scope="col">Status</th> --}}
                                    <th scope="col">Address to</th>
                                    {{-- <th scope="col">Created_At</th> --}}
                                    <th scope="col">Delivery</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders_unique as $order)
                                    @php
                                        $i = 1;
                                        $id = $i++;
                                    @endphp
                                    <tr data-id="{{ $id }}" data-toggle="collapse"
                                        data-target="#{{ print $order['session_id'] }}" class="accordion-toggle">
                                        <td><button class="btn btn-default btn-xs"><span><i class="fa fa-arrow-down"
                                                        style="color: blue"></i></span></button></td>
                                        {{-- <td>{{ $order['product_name' ] }}</td> --}}
                                        {{-- <td>x{{ $order['order_quantity' ] }}</td> --}}
                                        <td data-label="name">{{ $order['firstname'] }}&nbsp; {{ $order['lastname'] }}</td>
                                        <td data-label="total_price">{{ number_format($order['total_price'] / 100, 2) }}</td>
                                        <td data-label="email">{{ $order['email'] }}</td>
                                        {{-- <td>
                                            @php
                                            if($order->status == 'unpaid'):
                                            echo '<span style="color:red">Unpaid</span>';
                                            else:
                                            echo '<span style="color:green">Paid</span>';
                                            endif;
                                            @endphp
                                        </td> --}}
                                        <td data-label="address">
                                            @if ($order->address != null)
                                                {{ $order['address'] }}
                                            @else
                                                Not Listed
                                            @endif
                                        </td>
                                        {{-- <td>{{ $order['created_at' ] }}</td> --}}
                                        <td data-label="delivery">
                                            @if ($order['delivery'] == 1)
                                                <button type="submit" value="1" class="btn btn"><i
                                                        class="fa fa-truck fa-lg" style="color: #0f8500;"></i></button>
                                            @else
                                                <button type="submit" value="0" class="btn btn"><i
                                                        class="fa fa-bell fa-lg" style="color: #3f51b5;"></i></button>
                                            @endif
                                        </td>
                                        <td data-label="action">
                                            {{-- <a href="{{route('admin.orders.edit', $order->id)}}" class="btn btn-success m-1">
                                                <span class="icon text-white-50">
                                                    <i class="fa fa-pen" style="color: #ffffff;"></i>
                                                </span>
                                            </a> --}}
                                            <form method="POST" action="{{ route('admin.orders.destroy', $order->id) }}"
                                                onsubmit="return confirm('Are you sure?')" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger m-1"
                                                    style="background-color: black; border: unset;">
                                                    <span class="icon text-white-20">
                                                        <i class="fas fa-trash"></i>
                                                    </span>
                                                </button>
                                            </form>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="12" class="hiddenRow">
                                            <div class="accordian-body collapse" id="{{ print $order['session_id'] }}">
                                                <table class="table table-striped shadow-sm p-3 mb-5 bg-white rounded">
                                                    <thead>
                                                        <tr class="info">
                                                            <th>Items</th>
                                                            <th>Quantity</th>
                                                            {{-- <th>Name</th>		 --}}
                                                            {{-- <th>Total Price</th>	 --}}
                                                            {{-- <th>Email</th>	 --}}
                                                            <th>Created_at</th>
                                                            <th>Status</th>
                                                        </tr>
                                                    </thead>

                                                    <tbody>

                                                        @php
                                                            $check = \App\Models\Shop\OrderProduct::where('email', '=', $order->email)->get();
                                                        @endphp
                                                        @foreach ($check as $order_select)
                                                            <tr data-toggle="collapse" class="accordion-toggle"
                                                                data-target="#demo10">
                                                                <td>{{ $order_select['product_name'] }}</td>
                                                                <td>x{{ $order_select['order_quantity'] }}</td>
                                                                {{-- <td>{{$order_select['firstname' ] ."". $order_select['lastname' ] }}</td> --}}
                                                                {{-- <td>{{$order_select['total_price' ] / 100}}.00</td> --}}
                                                                {{-- <td>{{$order_select['email' ] }}</td> --}}
                                                                {{-- <td><a href="#" class="btn btn-default btn-sm"><i class="fa fa-wrench"></i></a></td> --}}
                                                                <td>{{ $order_select['created_at'] }}</td>
                                                                <td>
                                                                    @php
                                                                        if ($order->status == 'unpaid'):
                                                                            echo '<span style="color:red">Unpaid</span>';
                                                                        else:
                                                                            echo '<span style="color:green">Paid</span>';
                                                                        endif;
                                                                    @endphp
                                                                </td>
                                                            </tr>
                                                        @endforeach

                                                        {{-- <tr>
                                                            <td colspan="12" class="hiddenRow">
                                                                <div class="accordian-body collapse" id="demo10">
                                                                    <table class="table table-striped">
                                                                        <thead>
                                                                            <tr>
                                                                                <td><a href="#"> XPTO 1</a></td>
                                                                                <td>XPTO 2</td>
                                                                                <td>Obs</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th>item 1</th>
                                                                                <th>item 2</th>
                                                                                <th>item 3 </th>
                                                                                <th>item 4</th>
                                                                                <th>item 5</th>
                                                                                <th>Actions</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>
                                                                                <td>item 1</td>
                                                                                <td>item 2</td>
                                                                                <td>item 3</td>
                                                                                <td>item 4</td>
                                                                                <td>item 5</td>
                                                                                <td><a href="#"
                                                                                        class="btn btn-default btn-sm"><i
                                                                                            class="glyphicon glyphicon-cog"></i></a>
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>

                                                                </div>
                                                            </td>
                                                        </tr> --}}

                                                    </tbody>
                                                </table>

                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="mt-6 p-4">
                            {{ $orders->links() }}
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
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
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

@endsection
