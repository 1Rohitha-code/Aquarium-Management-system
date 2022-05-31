<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Bright Aqua') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!--Bootstrap new link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">    
    <style>
        .main-img {
    background: url('Landingpage/images/yy.jpg');
    background-position: left bottom;
    background-repeat: no-repeat;
    background-size: cover;
    height: 100vh;
    width: 100%;
    }



    body {
	color: rgb(48, 12, 248);
	background: #0a18d4;
	font-family: 'Roboto', sans-serif;
}
.form-control, .form-control:focus, .input-group-addon {
	border-color: #e1e1e1;
	border-radius: 0;
}
.signup-form {
	width: 550px;
	margin: 0 auto;
	padding: 30px 0;
}
.signup-form h2 {
	color: #051bdd;
	margin: 0 0 15px;
	text-align: center;
}
.signup-form .lead {
	font-size: 14px;
	margin-bottom: 30px;
	text-align: center;
}
.signup-form form {
	border-radius: 1px;
	margin-bottom: 15px;
	background: #fff;
	border: 1px solid #f3f3f3;
	box-shadow: 0px 2px 2px rgba(255, 254, 254, 0.925);
	padding: 30px;
}
.signup-form .form-group {
	margin-bottom: 20px;
}
.signup-form label {
	font-weight: normal;
	font-size: 13px;
}
.signup-form .form-control {
	min-height: 38px;
	box-shadow: none !important;
	border-width: 0 0 1px 0;
}
.signup-form .input-group-addon {
	max-width: 42px;
	text-align: center;
	background: none;
	border-bottom: 1px solid #e1e1e1;
	padding-left: 5px;
}
.signup-form .btn, .signup-form .btn:active {
	font-size: 20px;
	font-weight: bold;
	background: #051bdd !important;
	border-radius: 3px;
	border: none;
	min-width: 140px;
}
.signup-form .btn:hover, .signup-form .btn:focus {
	background: #4e04fce8 !important;
}
.signup-form a {
	color: black;
	text-decoration: none;
}
.signup-form a:hover {
	text-decoration: underline;
}
.signup-form .fa {
	font-size: 21px;
	position: relative;
	top: 8px;
}
.signup-form .fa-paper-plane {
	font-size: 17px;
}
.signup-form .fa-check {
	color: rgb(249, 252, 250);
	left: 9px;
	top: 18px;
	font-size: 7px;
	position: absolute;
}



    </style>

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

</head>
<body>

    <div id="app" class="main-img">

    

        <main class="py-0.3" style="height:25rem">
  <!-------------content----------------->
  
<div class="signup-form">
<form method="post" action="/register_supplier" enctype="multipart/form-data">

{{csrf_field()}}
	<div class="text-center">
	<h4><b>Supplier Registration</b></h4>
	</div>

	<div class="row">
       <div class="mb-3 col-md-6">
	   <div class="form-group">
	   <span style="font-weight: bolder;">Company Name :</span><input type="text" class="form-control @error('company_name') is-invalid @enderror" name="supplied_by"  placeholder="ABC Company"  autocomplete="supplied_by" autofocus>
				@error('supplied_by')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
		</div>
	   </div>
	   <div class="mb-3 col-md-6">
	   <div class="form-group">
		<span style="font-weight: bolder;"> Owner/Manager's Name :</span><input type="text" class="form-control @error('name') is-invalid @enderror" name="name"  placeholder="Enter the name"  autocomplete="name" autofocus>
				@error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
		</div>
	   </div>
	</div>

	<div class="row">
       <div class="mb-3 col-md-6">
	   <div class="form-group">
		<span style="font-weight: bolder;"> Email :</span><input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"  placeholder="example@gmail.com"  autocomplete="email">
		@error('email')
                    <span class="invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong>
                    </span>
                @enderror
		</div>
	   </div>

	   <div class="mb-3 col-md-6">
	   <div class="form-group">
		<span style="font-weight: bolder;">Contact No :</span><input type="text" class="form-control @error('contact_no') is-invalid @enderror" name="contact_no"  placeholder="Contact No." autocomplete="contact_no" autofocus>
		@error('contact_no')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror	
	</div>
	   </div>
	</div>

	<div class="row">
       <div class="mb-3 col-md-6">
	   <div class="form-group">
		<span style="font-weight: bolder;">Address Line1 :</span><input type="text" class="form-control @error('address_line1') is-invalid @enderror" name="address_line1"  placeholder="Address line 1" autocomplete="address_line1" autofocus>
		@error('address_line1')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror	
	</div>
	   </div>
	   <div class="mb-3 col-md-6">
	   <div class="form-group">
		<span style="font-weight: bolder;">Address Line2 :</span><input type="text" class="form-control @error('address_line2') is-invalid @enderror" name="address_line2"  placeholder="Address line 2" autocomplete="address_line2" autofocus>
		@error('address_line2')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror	
	</div>
		</div>
	</div>

	<div class="row">
       <div class="mb-3 col-md-6">
	   <div class="form-group">
		<span style="font-weight: bolder;">Password :</span><input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password"  autocomplete="new-password">
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
		</div> 
	   </div>
	   <div class="mb-3 col-md-6">
	   <div class="form-group">
		<span style="font-weight: bolder;">Confirm Password :</span>	<input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password"  autocomplete="new-password">
		</div>
		</div>
	</div>


	<button type="submit" class="btn btn-primary btn-block">Submit</button> 
	<div class="text-center">
         <a href="{{url('/')}}" class="link-primary"><strong>Back to Home Page</strong></a>
        </div>
  
 
  
</form>

</div>


<!-------------content----------------->
        </main>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
</body>
</html>
