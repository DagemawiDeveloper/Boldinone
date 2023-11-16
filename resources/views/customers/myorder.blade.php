<x-app-layout>
    {{-- ajax js --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"> </script>
        <!-- Alpinejs -->
    <script src="//unpkg.com/alpinejs" defer></script>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Order history') }}
        </h2>
    </x-slot>
<style>
.cross {
    padding: 10px;
    color: #d6312d;
    cursor: pointer;
    font-size: 23px;
 }

.cross i{
    
    margin-top: -5px;
    cursor: pointer;
}

.comment-box {
    padding: 5px
}

.comment-area textarea {
    resize: none;
    border: 1px solid #ff0000
}

.form-control:focus {
    color: #495057;
    background-color: #fff;
    border-color: #ffffff;
    outline: 0;
    box-shadow: 0 0 0 1px rgb(255, 0, 0) !important
}

.send {
    color: #fff;
    background-color: #ff0000;
    border-color: #ff0000
}

.send:hover {
    color: #fff;
    background-color: #f50202;
    border-color: #f50202
}

.rating {
   display: inline-flex;
    margin-top: -10px;
    flex-direction: row-reverse;
   
    
}

.rating>input {
    display: none
}

.rating>label {
    position: relative;
    width: 28px;
    font-size: 35px;
    color: #ff0000;
    cursor: pointer;
}

.rating>label::before {
    content: "\2605";
    position: absolute;
    opacity: 0
}

.rating>label:hover:before,
.rating>label:hover~label:before {
    opacity: 1 !important
}

.rating>input:checked~label:before {
    opacity: 1
}

.rating:hover>input:checked~label:before {
    opacity: 0.4
}




table {
  border: 1px solid #ccc;
  border-collapse: collapse;
  margin: 0;
  padding: 0;
  width: 100%;
  table-layout: fixed;
}

table caption {
  font-size: 1.5em;
  margin: .5em 0 .75em;
}

table tr {
  background-color: #f8f8f8;
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
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                {{-- <div class="max-w-xl"> --}}
                    {{-- @include('profile.partials.delete-user-form') --}}
                    <x-admin.dashboard.flash />
                <table>
                <caption>My Order</caption>
                <thead>
                    <tr>
                    <th scope="col">Product</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Order created</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order_select)
                      <tr>
                      <td data-label="Product_name">{{$order_select['product_name']}}</td>
                      <td data-label="Order_quantity">x{{$order_select['order_quantity']}}</td>
                      <td data-label="Created_at">{{$order_select['created_at' ] }}</td>
                      <td data-label="Paid">
                          @php
                            if($order_select->status == 'unpaid'):
                            echo '<span style="color:red">Unpaid</span>';
                            else:
                              echo '<span style="color:green">Paid</span>';
                            endif;
                          @endphp
                      </td>
                      <td data-label="Action">
                      <!-- Button trigger modal -->
                        {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                          Write Review
                        </button> --}}

                        
                          @php $get_reviews = \App\Models\Shop\Reviews::where('product_id',$order_select['product_id'])->where('user_id',Auth::id())->exists(); @endphp
                          {{-- @php dd($get_reviews); @endphp --}}
                          @if($get_reviews == false)
                            <button
                                x-data=""
                                x-on:click.prevent="$dispatch('open-modal', 'user-review')"
                                style="color:blue" class="rate_view" data-id="<? echo $order_select['product_id'] ?>" >{{ __('Write Review') }}
                            </button>
                          @else
                          <p style="color: green">Already wrote.</p>
                          @endif
                            
                      </td>
                      </tr>
                    @endforeach
                </tbody>
                </table>

                {{-- </div> --}}
            </div>
        </div>
    </div>


    <script>
      $(".rate_view").click(function (e) {
      e.preventDefault();
      var ele = $(this);
      var rate = $(this).attr("data-id");
      // var rate = $('#rate').val();
        // alert(rate);
        document.getElementById("rateview").value = rate;
      });

    </script>

    <!-- Modal -->
    <x-modal name="user-review" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('customers.review') }}" class="p-6">
            @csrf
            {{-- @method('delete') --}}
            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                {{ __('Say something') }}
            </h2>

            <div class="text-right cross"> <i class="fa fa-times mr-2"></i> </div>
            <div class="card-body text-center">

                <img src=" https://i.imgur.com/d2dKtI7.png"  height="100" width="100">

                <div class="comment-box text-center">
                    <div class="rating">
                        <input type="radio" name="rating" value="5" id="5"><label for="5">☆</label>
                        <input type="radio" name="rating" value="4" id="4" checked><label for="4">☆</label>
                        <input type="radio" name="rating" value="3" id="3"><label for="3">☆</label>
                        <input type="radio" name="rating" value="2" id="2"><label for="2">☆</label>
                        <input type="radio" name="rating" value="1" id="1"><label for="1">☆</label>
                    </div>
                    <input type="hidden" id="rateview" name="product_id" required>
                    <div class="comment-area">
                        <textarea class="form-control"  name="review" placeholder="what is your view?" rows="4" cols="70" required></textarea>
                    </div>
                    {{-- <div class="text-center mt-4"> <button class="btn btn-success send px-5">Send message <i class="fa fa-long-arrow-right ml-1"></i></button> --}}
                </div>
            </div>
            {{-- <textarea name="review" id="" cols="50" rows="10"></textarea> --}}

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-primary-button class="ml-3">
                    {{ __('Review') }}
                </x-primary-button>
            </div>
        </form>
    </x-modal>

</x-app-layout>
