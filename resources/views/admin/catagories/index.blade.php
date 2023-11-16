@extends('layouts.admin.master')
@extends('layouts.admin.sidebar')
{{-- @extends('layouts.admin.maincontent') --}}
@extends('layouts.admin.footer')
@section('title', 'SayatCart | Categories')

@section('content')
    <x-admin.dashboard.nav />
    <!-- Main Content -->
    <div id="content">
        <!-- Begin Page Content -->
        <div class="container-fluid">
            <x-admin.dashboard.flash />
            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Add Categories</h1>
                {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> --}}
            </div>

            <a href="{{ route('admin.catagories.create') }}" class="btn btn-success float-right font-weght bold">
                <i class="fa fa-solid fa-plus p-2"></i>Add</a>

            <div class="col-12 col-sm-8 col-lg-8">
                <h6 class="text-muted">All categories</h6>
                <ul class="list-group">
                    @unless (count($catagories) == 0)
                        @foreach ($catagories as $catagory)
                            <li
                                class="list-group-item shadow-lg p-3 mb-2 rounded d-flex justify-content-between align-items-center">
                                {{ $catagory->catagory_name }}
                                <div class="rounded mx-auto d-block">
                                    <img src="{{ $catagory->catagory_image ? asset('storage/' . $catagory->catagory_image) : asset('img/error/no-image.jpg') }}"
                                        width="150" height="150" alt="No image">
                                </div>
                                <div class="image-parent overlay">
                                    {{-- <x-admin.catagories.editdelete /> --}}
                                    <div class="card-img-overlay">
                                        <div class="btn-icon-split float-left m-1">
                                            @php
                                                $catagory_products = \App\Models\Shop\Product::where('product_catagories', '=', $catagory->catagory_name)->get();
                                                $list_products = count($catagory_products);
                                                // echo $list_products;
                                            @endphp
                                            @if ($list_products < 4)
                                                <a href="#"
                                                    onclick="return confirm('Add more than 5 listed products under {{ $catagory->catagory_name }}')"
                                                    class="btn btn-warning m-1">Active</a>
                                            @elseif($catagory->ad_banner == null)
                                                <a href="#" onclick="return confirm('Upload Ad_banner before activate')"
                                                    class="btn btn-warning m-1">Active</a>
                                            @elseif($catagory->is_featured == 1)
                                                <a href="{{ route('admin.changeStatus') }}?dis={{ $catagory->id }}"
                                                    onclick="return confirm('Are you sure?')"
                                                    class="btn btn-danger m-1">Disable</a>
                                            @else
                                                <a href="{{ route('admin.changeStatus') }}?act={{ $catagory->id }}"
                                                    onclick="return confirm('Are you sure?')"
                                                    class="btn btn-primary m-1">Active</i></a>
                                            @endif
                                            {{-- <input data-id="{{$catagory->id}}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="InActive" {{ $catagory->is_featured ? 'checked' : '' }}> --}}
                                        </div>
                                        <form method="POST" action="{{ route('admin.catagories.destroy', $catagory->id) }}"
                                            onsubmit="return confirm('Are you sure?')" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger float-right m-1"
                                                style="background-color: unset; border: unset; color: red;">
                                                <span class="icon text-white-30">
                                                    <i class="fas fa-trash"></i>
                                                </span>
                                            </button>
                                            @if ($catagory->is_menu > 0)
                                                <span class="badge badge-dark mt-2 float-left">Menu</span>
                                            @endif
                                        </form>
                                        <a href="{{ route('admin.catagories.edit', $catagory->id) }}"
                                            class="btn btn-success float-right m-1"
                                            style="background-color: unset; border: unset;">
                                            <span class="icon text-white-50">
                                                <i class="fa fa-pen" style="color: green;"></i>
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    @else
                        <h3 class="catagory_text"> No Categories Found!</h3>
                    @endunless
                </ul>
            </div>
        </div>
    </div>
    <script>
        $(function() {

            $('.toggle-class').change(function() {

                var is_featured = $(this).prop('checked') == true ? 1 : 0;

                var catagory_id = $(this).data('id');



                $.ajax({

                    type: "GET",

                    dataType: "json",

                    url: '/changeStatus',

                    data: {
                        'is_featured': is_featured,
                        'id': catagory_id
                    },

                    success: function(data) {

                        console.log(data.success)

                    }

                });

            })

        })
    </script>
@endsection
