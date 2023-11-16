@props(['cart'])
@php
    $total = 0;
    $setting = \App\Models\Settings::all()->first();
    $count = count((array) session('cart'));
    foreach ((array) session('cart') as $id => $details) {
        $total += $details['quantity'] * $details['price'];
    }
    if (Auth::user()) {
        $user_id = Auth::user()->id;
        # code...
    } else {
        # code...
    }
@endphp
<style>
    input[type="number"] {
        width: 35px;
    }
</style>
<div class="cart--header__middle d-none d-md-block">
    @if (Auth::check())
        @if (Auth::user()->hasRole('customers'))
            <div class="cart--header__list">
                <ul class="list-inline">
                    <li>
                        <div class="dropdown">
                            <a class="fal dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false"><b> {{ Auth::user()->name }} </b> </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="{{ route('dashboard') }}">Dashboard</a>
                                <a class="dropdown-item" href="{{ route('profile.edit') }}">Profile</a>
                                {{--  --}}

                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button class="dropdown-item" type="submit">{{ __('Log Out') }}</button>

                                </form>

                            </div>
                        </div>
                    </li>
                    @if (Auth::check())
                        @php
                            $whishlist_products = \App\Models\Shop\Whishlist::where('user_id', '=', $user_id)->get();
                        @endphp
                        @if (count($whishlist_products) > 0)
                            <li><a href="FilterCatagories?all=whishlist"><i class="fa fa-heart"
                                        style="color: #cd3301;"></i></a></li>
                        @else
                            <li><a href="#"><i class="fal fa-heart"></i></a></li>
                        @endif
                    @endif
                    <li><a class="mini__cart--link" href="#"><i class="fal fa-bags-shopping"><span
                                    class="cart__count">{{ $count }}</span></i><span
                                class="cart__amount">{{ $setting->currency }} {{ $total }}</span></a></li>
                </ul>
            </div>
            <!-- Cart -->
        @endif
    @else
        <div class="cart--header__list">
            <ul class="list-inline">
                <li><a href="{{ route('register-client') }}"><i class="fal fa-user-plus"></i></a></li>
                {{-- <li><a href="#"><i class="fal fa-heart"></i></a></li> --}}
                <li><a class="mini__cart--link" href="#"><i class="fal fa-bags-shopping"><span
                                class="cart__count">
                                @if ($count == null)
                                    0
                                @else
                                    {{ $count }}
                                @endif
                            </span></i><span class="cart__amount">{{ $setting->currency }} &nbsp; @if ($total == 0)
                                @else{{ $total }}
                            @endif
                        </span></a></li>
            </ul>
        </div>
    @endif

    <div class="mini__cart--box">

        <ul>
            <form action="/customers/session" method="POST" class="needs-validation" novalidate>
                <table>
                    <thead>
                    </thead>
                    <tbody>
                        @if (session('cart'))
                            @foreach (session('cart') as $id => $details)
                                <tr data-id="{{ $id }}">
                                    <td data-th="Product">
                                        <li class="mb-20">
                                            <div class="cart-image">
                                                <a href="#"><img
                                                        src="{{ $details['image'] ? asset('storage/' . $details['image']) : asset('img/error/no-image.jpg') }}"
                                                        alt=""></a>
                                            </div>
                                            <div class="cart-text">
                                                <a href="#"
                                                    class="title f-400 cod__black-color">{{ $details['product_name'] }}</a>
                                                <span class="cart-price f-400 dusty__gray-color">
                                                    <input type="number" class="quantity cart_update" size="1"
                                                        name="quantity" id="quantity" min="1"
                                                        value="{{ $details['quantity'] }}" required />
                                                    <span class="price f-800 cod__black-color">
                                                        <small>each&nbsp;</small>
                                                        <small>{{ $setting->currency }}</small>
                                                        <small
                                                            style="color: black; font-weight: bolder;">{{ $details['price'] }}</small>
                                                    </span>
                                                </span>
                                            </div>
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="text" class="remove" id="remove"
                                                value="{{ $id }}" hidden>
                                            <div class="del-button"><i class="icofont-close-line"></i></div>
                                        </li>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
                <li>
                    <div class="total-text d-flex justify-content-between">
                        <span class="f-800 cod__black-color">Total Bag </span>
                        <span class="f-800 cod__black-color">{{ $setting->currency }} &nbsp;
                            {{ $total }}</span>
                    </div>
                </li>
                <li>
                    @if ($total == 0)
                        <p>Select products</p>
                    @else
                        <div class="d-flex justify-content-between">
                            <input type="submit" class="cart-button" value="Checkout"
                                style="color: rgb(251, 255, 0); font-weight: bolder; background-color: #cd3301; border: aliceblu;" />
                            {{-- <a href="#" class="viewcart">View Cart</a> --}}
                        </div>
                    @endif
                </li>
            </form>
        </ul>

    </div>
</div>
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"> </script> --}}

<script type="text/javascript">
    $(".cart_update").on('change', function(e) {

        e.preventDefault();
        var ele = $(this);
        // var id = ele.parents("tr").attr("data-id");
        // var quantity = ele.find(".quantity").val();
        // alert(quantity);

        $.ajax({
            url: '{{ route('update_cart') }}',
            method: "PATCH",
            data: {
                _token: '{{ csrf_token() }}',
                id: ele.parents("tr").attr("data-id"),
                quantity: ele.parents("tr").find(".quantity").val()
            },
            success: function(response) {
                window.location
                    .reload(); // reload page after removing item from the cart successfully
                $('.cart').click();
            }
        })

    });


    $(".del-button").click(function(e) {
        e.preventDefault();
        var ele = $(this);
        var remove = $('#remove').val();
        if (confirm("Are you sure")) {
            $.ajax({
                url: '{{ route('remove_from_cart') }}',
                method: "DELETE",
                data: {
                    _token: '{{ csrf_token() }}',
                    id: remove

                },
                success: function(response) {
                    location.reload(); // reload page after removing item from the cart successfully
                }
            })
        }
    });
</script>
