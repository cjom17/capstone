<!DOCTYPE html>
<html>
<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>Boljoon National High School</title>
	<link rel="icon" type="image/x-icon" href="images/bnhs1-removebg-preview.png">

	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="vendors/styles/core.css">
	<link rel="stylesheet" type="text/css" href="vendors/styles/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="src/plugins/jquery-steps/jquery.steps.css">
	<link rel="stylesheet" type="text/css" href="vendors/styles/style.css">


	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'UA-119386393-1');
	</script>
</head>
<body>
    @include('sidebar')

	<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<div class="title">
								<h4>Form Wizards</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.html">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Form Wizards</li>
								</ol>
							</nav>
						</div>
						<!-- <div class="col-md-6 col-sm-12 text-right">
							<div class="dropdown">
								<a class="btn btn-primary dropdown-toggle" href="#" role="button" data-toggle="dropdown">
									January 2018
								</a>
								<div class="dropdown-menu dropdown-menu-right">
									<a class="dropdown-item" href="#">Export List</a>
									<a class="dropdown-item" href="#">Policies</a>
									<a class="dropdown-item" href="#">View Assets</a>
								</div>
							</div>
						</div> -->
					</div>
				</div>

				<div class="pd-20 card-box mb-30">
					<div class="clearfix">
						<h4 class="text-blue h4">Step wizard</h4>
						<p class="mb-30">jQuery Step wizard</p>
					</div>
					<div class="wizard-content">
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
		
						<form action="{{route('add.admin')}}" method="POST" class="tab-wizard wizard-circle wizard" enctype="multipart/form-data">
						@csrf
							<h5>Personal Info</h5>
							<section>
							<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Profile Picture:</label>
											<label for="image">Choose an image:</label>
											<input type="file" name="profile_picture" id="profile_picture" accept="image/*">
											<!-- <input type="submit" value="Upload Image"> -->
										</div>
									</div>
									
							</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label >Full Name :</label>
											<input type="text" name="name" id="name" class="form-control">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label >Position :</label>
											<input type="text" name="position" id="position" class="form-control">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Gender :</label>
											<select class="custom-select form-control" name="gender" id="gender">
												<option value="" selected disabled>Select Gender</option>
												<option value="male">Male</option>
												<option value="female">Female</option>
												<option value="others">Others</option>
											</select>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label >Date of Birth :</label>
											<input type="date" class="form-control date-picker" placeholder="Select Date" name="date_of_birth" id="date_of_birth">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Address :</label>
											<input type="text" class="form-control" name="address" id="address">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Phone Number :</label>
											<input type="text" class="form-control" name="phone_number" id="phone_number">
										</div>
									</div>
								</div>
								
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Civil Status :</label>
											<select class="custom-select form-control" name="civil_status" id="civil_status">
											<option value="" selected disabled>Select Civil Status</option>
											<option value="single">Single</option>
											<option value="married">Married</option>
											<option value="divorced">Divorced</option>
											<option value="widowed">Widowed</option>
											</select>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label >Role:</label>
											<input type="text" class="form-control" placeholder="Admin" disabled name="role" id="role">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label >Username :</label>
											<input type="text" class="form-control" name="username" id="username">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label >Email Adress :</label>
											<input type="email" class="form-control" name="email" id="email">
										</div>
									</div>
							</div>

							<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label >Password :</label>
											<input type="password" class="form-control" name="password" id="password">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label >Confirm Password :</label>
											<input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
										</div>
									</div>
							</div>
							</section>
							<button type="submit" class="btn btn-primary">Submit</button>
						
						</form>
					</div>
				</div>

				

				<!-- success Popup html Start -->
				<div class="modal fade" id="success-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
					<div class="modal-dialog modal-dialog-centered" role="document">
						<div class="modal-content">
							<div class="modal-body text-center font-18">
								<h3 class="mb-20">Form Submitted!</h3>
								<div class="mb-30 text-center"><img src="vendors/images/success.png"></div>
								Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
							</div>
							<div class="modal-footer justify-content-center">
								<button type="button" class="btn btn-primary" data-dismiss="modal">Done</button>
							</div>
						</div>
					</div>
				</div>
				<!-- success Popup html End -->
			</div>
			<div class="footer-wrap pd-20 mb-20 card-box">
				DeskApp - Bootstrap 4 Admin Template By <a href="https://github.com/dropways" target="_blank">Ankit Hingarajiya</a>
			</div>
		</div>
	</div>
	<!-- js -->
	<script src="vendors/scripts/core.js"></script>
	<script src="vendors/scripts/script.min.js"></script>
	<script src="vendors/scripts/process.js"></script>
	<script src="vendors/scripts/layout-settings.js"></script>
	<script src="src/plugins/jquery-steps/jquery.steps.js"></script>
	<script src="vendors/scripts/steps-setting.js"></script>
</body>
</html>