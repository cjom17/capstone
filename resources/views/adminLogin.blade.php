<!doctype html>
<html lang="en">
  <head>
  	<title>Admin Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
	<link rel="icon" type="image/x-icon" href="images/bnhs1-removebg-preview.png">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	

	<style>
		@import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
	  </style>
	
	<link rel="stylesheet" href="css/admin_login.css">

	</head>
	<body>
	<section class="ftco-section">
		<div class="container" >
			<div class="overlay"></div>
			<div class="row justify-content-center">
				<div class="col-md-9 text-center mb-5">
					<img src="./images/bnhs1-removebg-preview.png" alt="">
					<h2 class="heading-section">BOLJOON NATIONAL HIGH SCHOOL</h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-12 col-lg-10">
					<div class="wrap d-md-flex">
						<div class="img" style="background-image: url(images/admin.png);">
			      </div>
						<div class="login-wrap p-4 p-md-5">
			      	<div class="d-flex">
			      		<div class="w-100">
			      			<h3 class="mb-4" style="font-size: 1.3rem; font-weight: 600;">LOGIN TO YOUR ACCOUNT</h3>
			      		</div>
								<!-- <div class="w-100">
									<p class="social-media d-flex justify-content-end">
										<a href="#" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-facebook"></span></a>
										<a href="#" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-twitter"></span></a>
									</p>
								</div> -->
			      	</div>

					  <div class="mt-5">
						@if($errors->any())
							<div class="col-12">
								@foreach($errors->all() as $error)
									<div class="alert alert-danger">{{$error}}</div>

								@endforeach
							</div>
						@endif

						@if(session()->has('error'))
						<div class="alert alert-danger">{{session('error')}}</div>

						@endif

						@if(session()->has('success'))
						<div class="alert alert-success">{{session('success')}}</div>

						@endif
					</div>


				<form action="{{ secure_url('login.post') }}"  method="POST" class="signin-form" autocomplete="on">
					@csrf
			      		<div class="form-group mb-3">
			      			<label class="label" for="name">Email</label>
			      			<input type="text" name="email" id="email" class="form-control" placeholder="Username" required>
			      		</div>
		            <div class="form-group mb-3">
		            	<label class="label" for="password">Password</label>
		              <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
		            </div>
		            <div class="form-group">
		            	<button type="submit" class="form-control btn btn-primary rounded submit px-3">Sign In</button>
		            </div>
		            <!-- <div class="form-group d-md-flex">
		            	<div class="w-50 text-left">
			            	<label class="checkbox-wrap checkbox-primary mb-0">Remember Me
									  <input type="checkbox" checked>
									  <span class="checkmark"></span>
										</label>
									</div>
									<div class="w-50 text-md-right">
										<a href="#">Forgot Password</a>
									</div>
		            </div> -->
		        </form>
		          <!-- <p class="text-center">Don't have an account yet? <a data-toggle="tab" href="#signup" style="color: #11CC72;">Sign Up</a></p> -->
		        </div>
		      </div>
				</div>
			</div>
		
		</div>
	</section>
	<section id="forFooter">
		<div class="footer-container">
			<img src="./images/bnhs1-removebg-preview.png" alt="">
			<h1>Boljoon National High School <span>2016 - 2023</span>. All rights reserved.</h1>
		</div>

	</section>

	<script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>

	</body>
</html>

