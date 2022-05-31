<?php

use App\Models\Product;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Auth; ?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
	<meta name="author" content="AdminKit">
	<meta name="keywords" content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

    <!--csrf token for add to cart-->
    <meta name="csrf-token" content="{{csrf_token() }}">
    <!--csrf token for add to cart-->

	<link rel="shortcut icon" href="{{asset('dashboardb5/img/icons/icon-48x48.png')}}" />
    <!--Bootstrap 5-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <title>@yield('title')</title>
	<link href="{{asset('dashboardb5/css/app.css')}}" rel="stylesheet">

		<!--Bootstrap CDN-->
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/css/bootstrap.min.css">
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/js/bootstrap.min.js">
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/js/bootstrap.esm.min.js">
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/js/bootstrap.bundle.min.js">

    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <!--Alertify CSS-->
    <link rel="stylesheet" href="{{asset('assets/css/alertify.min.css')}}"/>
    <!--Alertify CSS-->

    @yield('datatablestyle')
@yield('seemorepagestyles')


	<style>
/*-------------------------------*/
table #online-p {
  border-collapse: collapse;
}

table tr {
  border-bottom: 1px solid black;
}

table tr:last-child {
  border: 0;
}
/*-------------------------------*/

/*Deliver order table style*/
.deliver_table{
    border-collapse: separate;
    border-spacing:0 10px;
}
/*Deliver order table style*/

    /*double underlines*/
    div.ordertotal {
        text-decoration-line: underline;
        text-decoration-style: double
        }
    /*double underlines*/

/*checkout card style */
.card_checkout-card{
    background-color:white;
    width:65rem;

}
.top-lable{
    background-color:lightgrey;

}
.home_del_form{
    width:480px;

}
.your-cart-checkout{
    width:400px;

}
/*checkout card style */

/*removing underline in hyperlinks when click on images*/
#clickonimage{
    text-decoration: none;
}

/*image gallary styles*/
.card-2 {
  background: #fff;
  border-radius: 2px;
  display: inline-block;
  height: 500px;
  max-width:400px;
  width: 400px;


}

.card-2{
	resize:disabled;
}

.card-2 {
  box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
  transition: all 0.3s cubic-bezier(.25,.8,.25,1);
}

.card-2:hover {
  box-shadow: 0 14px 28px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22);
}

.card-2 {
  box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23);
}

/*img gallary card controllers */
.card-img-top{
	width:200px;
	height:auto;
    margin-left:1px;
    margin-right: 1px;
    margin-top:5px;
	padding:3px;
	border-radius:8px;
	max-width:200px;
    display: block;
    border: 1px solid #ddd;
}

/*buynow-plant-gallary */
.button2 {
    background-color:green ;
    color:rgb(255, 255, 255);
    }
    .button2:hover {
 color: white;
 background-color:#ec4300;
}

    /*add to cart-plant-gallary */
.button3 {
    background-color: #188f00 ;
    color:white;
    }
.button3:hover {
 color: white;
 background-color:rgb(15, 4, 4);
}




.user-plant-gallary-name{
    font-size:15px;
}


/*single product page styles*/


.breadcrumb-item+.breadcrumb-item::before {
    content: ">"
}

.breadcrumb {
    display: -ms-flexbox;
    display: flex;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    padding: .1rem 0rem !important;
    margin-bottom: 0rem;
    list-style: none;
    background-color: #ffffff;
    border-radius: .25rem
}

.single_product {
    padding-top: 40px;
    padding-bottom: 140px;
    background-color: #e5e5e5;
    margin-top: 0px;
    padding: 10px
}

.product_name {
    font-size: 20px;
    font-weight: 400;
    margin-top: 0px
}

.badge {
    display: inline-block;
    padding: 0.50em .2em;
    font-size: 75%;
    font-weight: 700;
    line-height: 1;
    text-align: center;
    white-space: nowrap;
    vertical-align: baseline;
    border-radius: .18rem
}

.product-rating {
    margin-top: 5px
}

.rating-review {
    color: #5b5b5b
}

.product_price {
    display: inline-block;
    font-size: 30px;
    font-weight: 500;
    margin-top: 9px;
    clear: left
}

.product_discount {
    display: inline-block;
    font-size: 17px;
    font-weight: 300;
    margin-top: 9px;
    clear: left;
    margin-left: 10px;
    color: red
}

.product_saved {
    display: inline-block;
    font-size: 15px;
    font-weight: 200;
    color: #999999;
    clear: left
}

.singleline {
    margin-top: 1rem;
    margin-bottom: .40rem;
    border: 0;
    border-top: 1px solid rgba(0, 0, 0, .1)
}

.product_info {
    color: #4d4d4d;
    display: inline-block
}

.product_options {
    margin-bottom: 10px
}

.product_description {
    padding-left: 0px
}

.product_quantity {
    width: 104px;
    height: 47px;
    border: solid 1px #e5e5e5;
    border-radius: 3px;
    overflow: hidden;
    padding-left: 8px;
    padding-top: -4px;
    padding-bottom: 44px;
    float: left;
    margin-right: 22px;
    margin-bottom: 11px
}

.order_info {
    margin-top: 18px
}

.shop-button {
    height: 47px
}

.product_fav i {
    line-height: 44px;
    color: #cccccc
}

.product_fav {
    display: inline-block;
    width: 52px;
    height: 46px;
    background: #FFFFFF;
    box-shadow: 0px 1px 5px rgba(0, 0, 0, 0.1);
    border-radius: 11%;
    text-align: center;
    cursor: pointer;
    margin-left: 3px;
    -webkit-transition: all 200ms ease;
    -moz-transition: all 200ms ease;
    -ms-transition: all 200ms ease;
    -o-transition: all 200ms ease;
    transition: all 200ms ease
}

.br-dashed {
    border-radius: 5px;
    border: 1px dashed #dddddd;
    margin-top: 6px
}

.pr-info {
    margin-top: 2px;
    padding-left: 2px;
    margin-left: -14px;
    padding-left: 0px
}

.break-all {
    color: #5e5e5e
}

.image_selected {
    display: -webkit-box;
    display: -moz-box;
    display: -ms-flexbox;
    display: -webkit-flex;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    width: calc(100% + 15px);
    height: 525px;
    -webkit-transform: translateX(-15px);
    -moz-transform: translateX(-15px);
    -ms-transform: translateX(-15px);
    -o-transform: translateX(-15px);
    transform: translateX(-15px);
    border: solid 1px #e8e8e8;
    box-shadow: 0px 0px 0px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    padding: 15px
}

.image_list li {
    display: -webkit-box;
    display: -moz-box;
    display: -ms-flexbox;
    display: -webkit-flex;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    height: 150px;
    border: solid 1px #e8e8e8;
    box-shadow: 0px 0px 0px rgba(0, 0, 0, 0.1) !important;
    margin-bottom: 15px;
    cursor: pointer;
    padding: 15px;
    -webkit-transition: all 200ms ease;
    -moz-transition: all 200ms ease;
    -ms-transition: all 200ms ease;
    -o-transition: all 200ms ease;
    transition: all 200ms ease;
    overflow: hidden
}

@media (max-width: 390px) {
    .product_fav {
        display: none
    }
}

.bbb_combo {
    width: 150%;
    margin-right: 7%;
    padding-top: 21px;
    padding-left: 20px;
    padding-right: 20px;
    padding-bottom: 24px;
    border-radius: 5px;
    margin-top: 0px;
    text-align: -webkit-center
}

.bbb_combo_image {
    width: 170px;
    height: 170px;
    margin-bottom: 15px
}

.fs-10 {
    font-size: 10px
}

.step {
    background: #167af6;
    border-radius: 0.8em;
    -moz-border-radius: 0.8em;
    -webkit-border-radius: 6.8em;
    color: #ffffff;
    display: inline-block;
    font-weight: bold;
    line-height: 3.6em;
    margin-right: 5px;
    text-align: center;
    width: 3.6em;
    margin-top: 116px
}

.row-underline {
    content: "";
    display: block;
    border-bottom: 2px solid #3798db;
    margin: 0px 0px;
    margin-bottom: 20px;
    margin-top: 15px
}

.deal-text {
    margin-left: -10px;
    font-size: 25px;
    margin-bottom: 10px;
    color: #000;
    font-weight: 700
}

.padding-0 {
    padding-left: 0;
    padding-right: 0
}

.padding-2 {
    margin-right: 2px;
    margin-left: 2px
}

.vertical-line {
    display: inline-block;
    border-left: 3px solid #167af6;
    margin: 0 10px;
    height: 364px;
    margin-top: 4px
}

.p-rating {
    color: green
}

.combo-pricing-item {
    display: flex;
    flex-direction: column
}

.boxo-pricing-items {
    display: inline-flex
}

.combo-plus {
    margin-left: 10px;
    margin-right: 18px;
    margin-top: 10px
}



.items_text {
    color: #b0b0b0
}

.combo_item_price {
    font-size: 18px
}

.p_specification {
    font-weight: 500;
    margin-left: 22px
}

.mt-10 {
    margin-top: 10px
}

@charset "utf-8";
@import url('https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700,800,900|Rubik:300,400,500,700,900');

* {
    margin: 0;
    padding: 0;
    -webkit-font-smoothing: antialiased;
    -webkit-text-shadow: rgba(0, 0, 0, .01) 0 0 1px;
    text-shadow: rgba(0, 0, 0, .01) 0 0 1px
}

body {
    font-family: 'Rubik', sans-serif;
    font-size: 14px;
    font-weight: 400;
    background: #FFFFFF;
    color: #000000
}

div {
    display: block;
    position: relative;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box
}

ul {
    list-style: none;
    margin-bottom: 0px
}

.single_product {
    padding-top: 16px;
    padding-bottom: 140px
}

.image_list li {
    display: -webkit-box;
    display: -moz-box;
    display: -ms-flexbox;
    display: -webkit-flex;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    height: 150px;
    border: solid 1px #e8e8e8;
    box-shadow: 0px 1px 5px rgba(0, 0, 0, 0.1);
    margin-bottom: 15px;
    cursor: pointer;
    padding: 10px;
    -webkit-transition: all 200ms ease;
    -moz-transition: all 200ms ease;
    -ms-transition: all 200ms ease;
    -o-transition: all 200ms ease;
    transition: all 200ms ease;
    overflow: hidden
}

.image_list li:last-child {
    margin-bottom: 0
}

.image_list li:hover {
    box-shadow: 0px 1px 5px rgba(243, 239, 239, 0.952)
}

.image_list li img {
    max-width: 150%
}

.image_selected {
    display: -webkit-box;
    display: -moz-box;
    display: -ms-flexbox;
    display: -webkit-flex;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    width:auto;
    height: 360px;
    -webkit-transform: translateX(-15px);
    -moz-transform: translateX(-15px);
    -ms-transform: translateX(-15px);
    -o-transform: translateX(-15px);
    transform: translateX(-15px);
    border: solid 1px #e8e8e8;
    box-shadow: 0px 1px 5px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    padding: 5px
}

.image_selected img {
    max-width: 145%
}

.product_category {
    font-size: 12px;
    color: rgba(0, 0, 0, 0.5)
}

.product_rating {
    margin-top: 2px
}

.product_rating i {
    margin-right: 4px
}

.product_rating i::before {
    font-size: 13px
}

.product_text {
    margin-top: 5px
}

.product_text p:last-child {
    margin-bottom: 0px
}

.order_info {
    margin-top: 16px
}

.product_quantity {
    width: 182px;
    height: 50px;
    border: solid 1px #e5e5e5;
    border-radius: 5px;
    overflow: hidden;
    padding-left: 15px;
    float: left;
    margin-right: 30px
}

.product_quantity span {
    display: block;
    height: 50px;
    font-size: 10px;
    font-weight: 200;
    color: rgba(0, 0, 0, 0.5);
    line-height: 50px;
    float: left
}

.product_quantity input {
    display: block;
    width: 30px;
    height: 50px;
    border: none;
    outline: none;
    font-size: 16px;
    font-weight: 300;
    color: rgba(0, 0, 0, 0.5);
    text-align: left;
    padding-left: 2px;
    line-height: 50px;
    float: left
}

.quantity_buttons {
    position: absolute;
    top: 0;
    right: 0;
    height: 100%;
    width: 29px;
    border-left: solid 1px #e5e5e5
}

.quantity_inc,
.quantity_dec {
    display: -webkit-box;
    display: -moz-box;
    display: -ms-flexbox;
    display: -webkit-flex;
    display: flex;
    flex-direction: column;
    align-items: center;
    width: 100%;
    height: 50%;
    cursor: pointer
}

.quantity_control i {
    font-size: 11px;
    color: rgb(250, 250, 250);
    pointer-events: none
}

.quantity_control:active {
    border: solid 1px rgba(14, 140, 228, 0.2)
}

.quantity_inc {
    padding-bottom: 2px;
    justify-content: flex-end;
    border-top-right-radius: 5px
}

.quantity_dec {
    padding-top: 2px;
    justify-content: flex-start;
    border-bottom-right-radius: 5px
}
.order-1{
	width:520px ;
	height: auto;
}

.order-5{
	width:350px ;
	height: auto;
}

/*single product page styles*/

.plus-btn{
	width:50px;
	height:40px;
	text-align: center;
}

.minus-btn{
	width:50px;
	height:40px;
}
.btn-qty{
	width:80px;
	height:40px;
	border:1px solid blue;
}

/*single product page styles*/

/*image gallary card effects*/
.card-img-gallary:hover{
    box-shadow: 4px 4px 4px 4px lightslategrey;    
    transform: scale(1.0);

}

.card-img-gallary{
    box-shadow: 2px 2px 2px 2px lightslategrey;
}
/*image gallary card effects*/


/*quick status table*/
.quickstatus{
	border:2px solid blue;
}
#quickstatustr{
	border:2px solid blue;
}
#quickstatustd{
	border:2px solid blue;
}


ul {
    list-style-type: square;
}


/*quick status table*/

/*single product page button styles*/
.add-to-mycart{
	font-size: 17px;
	background-color:rgb(13, 167, 51);

	transition-duration: 0.4s;
	color:white;
/*single product see more page, button size change*/
    padding: 10px 20px;
    font-size: 24px;
    border-radius: 10px;
}
.adding-disabled-btn{
    padding: 10px 20px;
    font-size: 24px;
    border-radius: 10px;

}

.add-to-mycart:hover{
	background-color:blue ;
	box-shadow: 0 12px 16px 0 rgb(255, 255, 255), 0 17px 50px 0 rgba(0,0,0,0.19);
	color:white;
}

.buy-it-nw-btn{
	font-size: 17px;
	background-color:rgb(228, 148, 0);

	transition-duration: 0.4s;
	color:white;
}
.buy-it-nw-btn:hover{
	background-color:rgb(1, 5, 1) ;
	box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
	color:rgb(252, 250, 250);
}

/*single product page button styles*/

/*img gallary add to cart btn*/
.add-to-cart-btn-in-cards{
	font-size: 15px;
	background-color: white;

	transition-duration: 0.4s;
	color:white;
}
.add-to-cart-btn-in-cards:hover{
	background-color:orange ;
	box-shadow: 0 12px 16px 0 rgb(255, 255, 255), 0 17px 50px 0 rgba(0,0,0,0.19);
	color:rgb(255, 255, 255);
}

/*img gallary add to cart btn*/
.indicator{
	width: 12px;
  padding: 2px;
  border: 1px solid gray;
  margin: 0;
  background-color:greenyellow;
  border-radius: 8px;
}

/*shopping cart style*/
body {
  background: #eecda3;
  background: -webkit-linear-gradient(to right, #eecda3, #ef629f);
  background: linear-gradient(to right, #eecda3, #ef629f);
  min-height: 100vh;
}
/*shopping cart style*/




	</style>
@yield('seemorepagestyles')


</head>

<body>
	<div class="wrapper">
		<nav id="sidebar" class="sidebar">
			@yield('navbar')
		</nav> 

		<div class="main">

        <nav class="navbar navbar-expand navbar-light navbar-bg">
				<a class="sidebar-toggle d-flex">
          <i class="hamburger align-self-center"></i>
        </a>

      
     
  <!----------display some buttons according to user type---------->                     
     
						<li class="nav-item dropdown">
						<a class="nav-icon" href="{{url('/cart')}}" >
								<div class="position-relative">
                                    
                                 <!--NavbarShopping Cart-->
                              
                                <!--NavbarShopping Cart-->

								</div>
						</a>

						<li class="nav-item dropdown">
							<a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-toggle="dropdown">
                <i class="align-middle" data-feather="settings"></i>
              </a>

							<a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-toggle="dropdown">
                <img src="{{url('Landingpage/images/5.jpg')}}" class="avatar img-fluid rounded mr-1" alt="fish name" />  <span class="text-dark"> supplier</span>
              </a>



							<div class="dropdown-menu dropdown-menu-right">
								<a class="dropdown-item" href="pages-profile.html"><i class="align-middle mr-1" data-feather="user"></i> Profile</a>
								<a class="dropdown-item" href="#"><i class="align-middle mr-1" data-feather="pie-chart"></i> Analytics</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="pages-settings.html"><i class="align-middle mr-1" data-feather="settings"></i> Settings & Privacy</a>
								<a class="dropdown-item" href="#"><i class="align-middle mr-1" data-feather="help-circle"></i> Help Center</a>
								<div class="dropdown-divider"></div>
                                <!-- <a class="dropdown-item" href="#">Log out</a> -->
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" >
            <i class="fa fa-sign-out" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;Logout</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
            
            </form> 
							</div>
						</li>
					</ul>
				</div>
                
			</nav>
<!----------------------------main content------------------>
			<main class="content">
				<div class="container-fluid p-0">
                @yield('content')
				</div>
			</main> 

<!----------------------------main content------------------>

			<footer class="footer">
				<!-- <div class="container-fluid">
					<div class="row text-muted">
						<div class="col-6 text-left">
							<p class="mb-0">
								<a href="index.html" class="text-muted"><strong>Bright Aqua</strong></a> &copy;
							</p>
						</div>
						<div class="col-6 text-right">
							<ul class="list-inline">
								<li class="list-inline-item">
									<a class="text-muted" href="#">Support</a>
								</li>
								<li class="list-inline-item">
									<a class="text-muted" href="#">Help Center</a>
								</li>
								<li class="list-inline-item">
									<a class="text-muted" href="#">Privacy</a>
								</li>
								<li class="list-inline-item">
									<a class="text-muted" href="#">Terms</a>
								</li>
							</ul>
						</div>
					</div>
				</div> -->
			</footer>
		</div>
	</div>

    @yield('seemorescripts')


	<script src="{{asset('dashboardb5/js/app.js')}}"></script>



	<script>
		document.addEventListener("DOMContentLoaded", function() {
			var ctx = document.getElementById("chartjs-dashboard-line").getContext("2d");
			var gradient = ctx.createLinearGradient(0, 0, 0, 225);
			gradient.addColorStop(0, "rgba(215, 227, 244, 1)");
			gradient.addColorStop(1, "rgba(215, 227, 244, 0)");
			// Line chart
			new Chart(document.getElementById("chartjs-dashboard-line"), {
				type: "line",
				data: {
					labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
					datasets: [{
						label: "Sales ($)",
						fill: true,
						backgroundColor: gradient,
						borderColor: window.theme.primary,
						data: [
							2115,
							1562,
							1584,
							1892,
							1587,
							1923,
							2566,
							2448,
							2805,
							3438,
							2917,
							3327
						]
					}]
				},
				options: {
					maintainAspectRatio: false,
					legend: {
						display: false
					},
					tooltips: {
						intersect: false
					},
					hover: {
						intersect: true
					},
					plugins: {
						filler: {
							propagate: false
						}
					},
					scales: {
						xAxes: [{
							reverse: true,
							gridLines: {
								color: "rgba(0,0,0,0.0)"
							}
						}],
						yAxes: [{
							ticks: {
								stepSize: 1000
							},
							display: true,
							borderDash: [3, 3],
							gridLines: {
								color: "rgba(0,0,0,0.0)"
							}
						}]
					}
				}
			});
		});
	</script>
	<script>
		document.addEventListener("DOMContentLoaded", function() {
			// Pie chart
			new Chart(document.getElementById("chartjs-dashboard-pie"), {
				type: "pie",
				data: {
					labels: ["Chrome", "Firefox", "IE"],
					datasets: [{
						data: [4306, 3801, 1689],
						backgroundColor: [
							window.theme.primary,
							window.theme.warning,
							window.theme.danger
						],
						borderWidth: 5
					}]
				},
				options: {
					responsive: !window.MSInputMethodContext,
					maintainAspectRatio: false,
					legend: {
						display: false
					},
					cutoutPercentage: 75
				}
			});
		});
	</script>
	<script>
		document.addEventListener("DOMContentLoaded", function() {
			// Bar chart
			new Chart(document.getElementById("chartjs-dashboard-bar"), {
				type: "bar",
				data: {
					labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
					datasets: [{
						label: "This year",
						backgroundColor: window.theme.primary,
						borderColor: window.theme.primary,
						hoverBackgroundColor: window.theme.primary,
						hoverBorderColor: window.theme.primary,
						data: [54, 67, 41, 55, 62, 45, 55, 73, 60, 76, 48, 79],
						barPercentage: .75,
						categoryPercentage: .5
					}]
				},
				options: {
					maintainAspectRatio: false,
					legend: {
						display: false
					},
					scales: {
						yAxes: [{
							gridLines: {
								display: false
							},
							stacked: false,
							ticks: {
								stepSize: 20
							}
						}],
						xAxes: [{
							stacked: false,
							gridLines: {
								color: "transparent"
							}
						}]
					}
				}
			});
		});
	</script>
	<script>
		document.addEventListener("DOMContentLoaded", function() {
			var markers = [{
					coords: [31.230391, 121.473701],
					name: "Shanghai"
				},
				{
					coords: [28.704060, 77.102493],
					name: "Delhi"
				},
				{
					coords: [6.524379, 3.379206],
					name: "Lagos"
				},
				{
					coords: [35.689487, 139.691711],
					name: "Tokyo"
				},
				{
					coords: [23.129110, 113.264381],
					name: "Guangzhou"
				},
				{
					coords: [40.7127837, -74.0059413],
					name: "New York"
				},
				{
					coords: [34.052235, -118.243683],
					name: "Los Angeles"
				},
				{
					coords: [41.878113, -87.629799],
					name: "Chicago"
				},
				{
					coords: [51.507351, -0.127758],
					name: "London"
				},
				{
					coords: [40.416775, -3.703790],
					name: "Madrid "
				}
			];
			var map = new JsVectorMap({
				map: "world",
				selector: "#world_map",
				zoomButtons: true,
				markers: markers,
				markerStyle: {
					initial: {
						r: 9,
						strokeWidth: 7,
						stokeOpacity: .4,
						fill: window.theme.primary
					},
					hover: {
						fill: window.theme.primary,
						stroke: window.theme.primary
					}
				}
			});
			window.addEventListener("resize", () => {
				map.updateSize();
			});
		});
	</script>
	{{-- <script>
		document.addEventListener("DOMContentLoaded", function() {
			document.getElementById("datetimepicker-dashboard").flatpickr({
				inline: true,
				prevArrow: "<span class=\"fas fa-chevron-left\" title=\"Previous month\"></span>",
				nextArrow: "<span class=\"fas fa-chevron-right\" title=\"Next month\"></span>",
			});
		});
	</script> --}}

<!--Bootstrap 5 links-->
<!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script> -->

<!--JQuery CDN-->
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<!--JQuery CDN-->

@yield('seemorescripts')
@yield('datatablescripts')
@yield('moushoveralert')

<!--AlertifyJS CDN-->
<script src="{{asset('assets/alertify.min.js')}}"></script>
<!-- <script>
@error('email')
      $('#loginModal').modal('show');
@enderror

@if(session('status'))
    alertify.set('notifier','position','top-right');
    alertify.success("{{ session('status') }}");
@endif
</script> -->
<!--AlertifyJS CDN-->



<!-- loginModal -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
            <div class="text-center">
          <span style="font-size:22px"><b>Login</b></span>
        </div>
        </div>
        <div class="modal-body">

            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="mb-3 col-md-12">
                    <label class="form-label" for="inputPassword4" style="font-size:16px">Email</label>
                        <input id="email" type="email" class="form-control my-colorpicker1 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="E-mail Address" required autocomplete="email">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-3 col-md-12">
                    <label class="form-label" for="inputEmail4" style="font-size:16px">Password</label>
                    <input id="password" type="password" class="form-control my-colorpicker1 @error('password') is-invalid @enderror" name="password" placeholder="Password" required autocomplete="new-password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                </div>

                <div class="row">
                    <div class="mb-3 col-md-6">
                    <form-group>
                        <button type="button" class="btn btn-secondary btn-block btn-lg" data-bs-dismiss="modal">Close</button>
                    </div>
                    <div class="mb-3 col-md-6">
                    <a href="" class="btn btn-success btn-block btn-lg">{{ __('Login') }}</a>
                </div>
                </div>

            </form>
        </div>

      </div>
    </div>
  </div>
<!-- loginModal -->



<!--custom.js process-->
<script type="text/javascript" src="{{ asset('assets/custom.js') }}"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<!--Custom.js process-->

<!--SWEET ALERT LINKS-->
<script src="js/sweetalert.min.js"></script>
<script>
    @if (session('status'))
swal({
  title: '{{session('status')}}',
  icon: '{{session('statuscode')}}',
  button: "OK",
});
@endif
</script>
<!--SWEET ALERT LINKS-->

</body>

</html>
