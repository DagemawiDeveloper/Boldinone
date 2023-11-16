<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<style>

</style>
<!DOCTYPE html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
* {
  box-sizing: border-box;
}

.row::after {
  content: "";
  clear: both;
  display: table;
}

[class*="col-"] {
  float: left;
  padding: 15px;
}

html {
  font-family: "Lucida Sans", sans-serif;
}

.header {
  background-color: #9933cc;
  color: #ffffff;
  padding: 15px;
}

.menu ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
}

.menu li {
  padding: 8px;
  margin-bottom: 7px;
  background-color: #33b5e5;
  color: #ffffff;
  box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
}

.menu li:hover {
  background-color: #0099cc;
}

.aside {
  background-color: #33b5e5;
  padding: 15px;
  color: #ffffff;
  text-align: center;
  font-size: 14px;
  box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
}

.footer {
  background-color: #0099cc;
  color: #ffffff;
  text-align: center;
  font-size: 12px;
  padding: 15px;
}

/* For mobile phones: */
[class*="col-"] {
  width: 100%;
}

@media only screen and (min-width: 768px) {
  /* For desktop: */
  .col-1 {width: 8.33%;}
  .col-2 {width: 16.66%;}
  .col-3 {width: 25%;}
  .col-4 {width: 33.33%;}
  .col-5 {width: 41.66%;}
  .col-6 {width: 50%;}
  .col-7 {width: 58.33%;}
  .col-8 {width: 66.66%;}
  .col-9 {width: 75%;}
  .col-10 {width: 83.33%;}
  .col-11 {width: 91.66%;}
  .col-12 {width: 100%;}
}

    body {
        font-family: 'Varela Round', sans-serif;
    }

    .modal-confirm {
        color: #636363;
        width: 325px;
        font-size: 14px;
    }

    .modal-confirm .modal-content {
        padding: 20px;
        border-radius: 5px;
        border: none;
    }

    .modal-confirm .modal-header {
        border-bottom: none;
        position: relative;
    }

    .modal-confirm h4 {
        text-align: center;
        font-size: 26px;
        margin: 30px 0 -15px;
    }

    .modal-confirm .form-control,
    .modal-confirm .btn {
        min-height: 40px;
        border-radius: 3px;
    }

    .modal-confirm .close {
        position: absolute;
        top: -5px;
        right: -5px;
    }

    .modal-confirm .modal-footer {
        border: none;
        text-align: center;
        border-radius: 5px;
        font-size: 13px;
    }

    .modal-confirm .icon-box {
        color: #fff;
        position: absolute;
        margin: 0 auto;
        left: 0;
        right: 0;
        top: -70px;
        width: 95px;
        height: 95px;
        border-radius: 50%;
        z-index: 9;
        background: #82ce34;
        padding: 15px;
        text-align: center;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.1);
    }

    .modal-confirm .icon-box i {
        font-size: 58px;
        position: relative;
        top: 3px;
    }

    .modal-confirm.modal-dialog {
        margin-top: 80px;
    }

    .modal-confirm .btn {
        color: #fff;
        border-radius: 4px;
        background: #82ce34;
        text-decoration: none;
        transition: all 0.4s;
        line-height: normal;
        border: none;
    }

    .modal-confirm .btn:hover,
    .modal-confirm .btn:focus {
        background: #6fb32b;
        outline: none;
    }

    .trigger-btn {
        display: inline-block;
        margin: 100px auto;
    }
</style>
</head>
<body>
<!--  <div class="container mt-4">
    <h2>Thank you for Renting</h2>
    <hr>
    <p>Your transaction ID is</p>
    <p>Check your email for more info</p>
    <p><a href="index.php" class="btn btn-light mt-2">Go Back</a></p>
  </div>-->
  
  
  <!-- Modal popup-->
				<script>
						$ (window).ready (function () {
					setTimeout (function () {
						$ ('#myModal').modal ("show")
					}, 0)
				})
				</script>
				<div class="row">
					<div id="myModal" class="modal fade">
						<div class="modal-dialog modal-confirm">
							<div class="modal-content">
									<div class="modal-header">
									<div class="icon-box">
										<i class="material-icons">&#xE876;</i>
									</div>
									<h1 class="modal-title w-150">&nbsp;&nbsp;&nbsp;Thankyou</h1>
									</div>
									<div class="modal-body">
									<p class="text-center" center>Payment succeeded</p>
									<!-- <p class="text-center"><b>TXN ID:</b></p> --> 
									<p class="text-center"><b>Buyer Name:&nbsp;</b>@php echo $order->firstname . '&nbsp;' . $order->lastname; @endphp</p>
									<p class="text-center"><b>Buyer Email:&nbsp;</b> {{ $order->email }}</p>
									<p class="text-center"><b>Purchased items:&nbsp;</b><br>
                                    
                                    @foreach ($success as $orders):
                                        {{$orders['product_name']}} &nbsp; x{{$orders['order_quantity']}} &nbsp; <small>each</small>&nbsp;{{$orders['each_price']}} (<small>Nok</small> @php echo $orders['order_quantity'] * $orders['each_price'] @endphp ) <br>
                                    @endforeach
                                    
                                    </p>
									{{-- <p class="text-center"><b>Total Price:&nbsp;</b> Nok&nbsp; @php echo $order->total_price / 100; @endphp .00</p> --}}
									<p class="text-center">Check your email for detials.<br>
									  Redirecting to Home page after <span id="countdown">10</span> seconds
									</p>
									</div>
									<div class="modal-footer">
										<button class="btn btn-success btn-block" onclick="window.location.href='/';" data-dismiss="modal">Close</button>
										
									</div>
									<!-- JavaScript part -->
									<script type="text/javascript">
										
										// Total seconds to wait
										var seconds = 10;
										
										function countdown() {
											seconds = seconds - 1;
											if (seconds < 0) {
												// Chnage your redirection link here
												window.location = "/";
											} else {
												// Update remaining seconds
												document.getElementById("countdown").innerHTML = seconds;
												// Count down using javascript
												window.setTimeout("countdown()", 1000);
											}
										}
										
										// Run countdown function
										countdown();
										
									</script>
							</div>
						</div>
					</div>
			    </div>	

</body>
</html>