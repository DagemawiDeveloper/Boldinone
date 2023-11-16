@extends('layouts.admin.master')
@extends('layouts.admin.sidebar')
{{-- @extends('layouts.admin.maincontent') --}}
@extends('layouts.admin.footer')
@section('title', 'Kaffe Mini | Admin')
@section('content')
    <x-admin.dashboard.nav />
    @php $now = date('Y-m-d'); @endphp
    <!-- Main Content -->
    <div id="content">
        <!-- Begin Page Content -->
        <div class="container-fluid">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button"
                        role="tab" aria-controls="home" aria-selected="true">Deals</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button"
                        role="tab" aria-controls="profile" aria-selected="false">Plan</button>
                </li>
                {{-- <li class="nav-item" role="presentation">
            <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Contact</button>
          </li> --}}
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <br>
                    <x-admin.dashboard.flash />
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        {{-- <h1 class="h3 mb-0 text-gray-800">Deals</h1> --}}
                        {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                        class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> --}}
                    </div>


                    <div class="col-12 col-sm-8 col-lg-8">
                        <h6 class="text-muted">All Deals</h6>
                        <ul class="list-group">
                            @unless (count($product) == 0)
                                @foreach ($product as $pro)
                                    <li
                                        class="list-group-item d-flex justify-content-between align-items-center shadow-sm p-3 mb-5 bg-white rounded">
                                        {{ $pro->product_name }}
                                        <div class="image-parent m-2">
                                            {{-- <img src="{{ $pro->main_image ? asset('storage/' . $pro->main_image) : asset('img/error/no-image.jpg') }}" width="150" height="150"  alt="No image"> --}}
                                            <a href="{{ asset('storage/' . $pro->main_image) }}"
                                                data-lightbox="{{ $pro->id }}"><i class="fa fa-eye"></i></a>
                                        </div>
                                        <div class="image-parent overlay">
                                            {{-- <x-admin.catagories.editdelete /> --}}

                                            @if ($now > $pro->deal_target)
                                                <div class="m-1">
                                                    <p class="text">
                                                        <b style="color: red">Expired</b>
                                                    </p>
                                                </div>
                                            @else
                                                <div class="m-1">
                                                    <p class="text" style="color: green">
                                                        Expire on: {{ $pro->deal_target }}
                                                        <b class="m-1">{{ date('H:i:s') }}
                                                        </b>
                                                    </p>
                                                </div>
                                            @endif
                                        </div>
                                    </li>
                                @endforeach
                                <div class="mt-6 p-4">
                                    {{ $products->links() }}
                                </div>
                            @else
                                <h3 class="catagory_text"> No Deals Found!</h3>
                            @endunless
                        </ul>
                    </div>
                </div>

                {{-- Plan tab start here --}}
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <br>
                    <x-admin.dashboard.flash />
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Plan</h1>
                        {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                        class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> --}}
                    </div>

                    <a href="{{ route('admin.plans.create') }}" class="btn btn-info float-right font-weght bold">
                        <i class="fa fa-solid fa-plus p-2"></i>Add</a>

                    <div class="col-12 col-sm-8 col-lg-8">
                        <h6 class="text-muted">All Plans</h6>
                        <ul class="list-group">
                            @unless (count($plan) == 0)
                                @foreach ($plan as $plans)
                                    <li
                                        class="list-group-item d-flex  align-items-center mb-4 shadow-sm p-3 mb-5 bg-white rounded">
                                        <b style="color: black">{{ $plans->plan_name }}</b>
                                        @if ($now > $plans->plan_target_date)
                                            <span class="m-4" style="color: red"><b class="m-2">Expired
                                                    on:</b><del>{{ $plans->plan_target_date }}</del></span>
                                        @else
                                            <span class="m-4" style="color: green"><b
                                                    class="m-2">Target:</b>{{ $plans->plan_target_date }}</span>
                                        @endif
                                        {{-- <x-admin.catagories.editdelete /> --}}
                                        <div class="card-img-overlay">
                                            <div class="">
                                                <form method="POST" action="{{ route('admin.plans.destroy', $plans->id) }}"
                                                    onsubmit="return confirm('Are you sure?')" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger float-right m-1"
                                                        style="background-color: unset; border: unset; color:red;">
                                                        <span class="icon text-white-30">
                                                            <i class="fas fa-trash"></i>
                                                        </span>
                                                    </button>
                                                </form>
                                                <a href="{{ route('admin.plans.edit', $plans->id) }}"
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
                                <div class="mt-6 p-4">
                                    {{ $plan->links() }}
                                </div>
                            @else
                                <h3 class="catagory_text"> No Plan Found!</h3>
                            @endunless
                        </ul>
                    </div>
                </div>
                {{-- <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">...</div> --}}
            </div>

        </div>
    </div>

@endsection
