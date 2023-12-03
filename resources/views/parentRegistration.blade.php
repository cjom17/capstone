<!doctype html>
<html lang="en">
  <head>
  	<title>Parent Registration | Boljoon National High School</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
	<link rel="icon" type="image/x-icon" href="images/bnhs1-removebg-preview.png">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

	<style>
		@import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
	  </style>
	
	<link rel="stylesheet" href="css/parent_registration.css">

	</head>
	<body>
	<section class="h-100 ">
	<div class="container py-5 h-100">
		<div class="row d-flex justify-content-center align-items-center h-100">
		<div class="col">
			<div class="card card-registration my-4">
			<div class="row g-0">
				<div class="col-xl-6 d-none d-xl-block" style="background-image: url('./images/parent.png'); background-size:cover; background-repeat: no-repeat; background-position: center;">
				<!-- <img src="./images/parent.png"
					alt="Sample photo" class="img-fluid"
					style="border-top-left-radius: .25rem; border-bottom-left-radius: .25rem;" /> -->
				</div>
				<div class="col-xl-6">
			
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
		<form action="{{route('parent.register')}}" method="POST" enctype="multipart/form-data">
		@csrf				
					<div class="card-body p-md-5 text-black">
					<h3 class="mb-5 text-uppercase">Parent registration form</h3>
					<div class="form-outline mb-4">
					<input type="file" name="profile_picture" id="profile_picture" accept="image/*"><br>
					<label class="form-label" for="form3Example97">Profile Picture : </label> 
				</div>
				<div class="row">
					<div class="col-md-6 mb-4">
						<div class="form-outline">
						<input type="text"  class="form-control form-control-lg" name="f_name" id="f_name" />
						<label class="form-label" for="">First name</label>
						</div>
					</div>
					<div class="col-md-6 mb-4">
						<div class="form-outline">
						<input type="text" class="form-control form-control-lg" name="l_name" id="l_name" />
						<label class="form-label" for="">Last name</label>
						</div>
					</div>
					</div>

					<div class="row">
						<div class="col-md-6 mb-4">
							<div class="form-outline">
							<input type="text"  class="form-control form-control-lg" name="m_name" id="x_name" />
							<label class="form-label" for="">Middle name</label>
							</div>
						</div>
						<div class="col-md-6 mb-4">
							<div class="form-outline">
							<input type="text"  class="form-control form-control-lg" name="x_name" id="x_name" />
							<label class="form-label" for="">Extension name</label>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6 mb-4">
							<div class="form-outline">
							<select class="custom-select form-control" name="gender" id="gender">
							<option value="" selected disabled>Select Gender</option>
							<option value="male">Male</option>
							<option value="female">Female</option>
							<option value="others">Others</option>
							</select>
							<label class="form-label" for="">Gender</label>
							</div>
						</div>
						<div class="col-md-6 mb-4">
							<div class="form-outline">
							<select class="custom-select form-control" name="civil_status" id="civil_status">
							<option value="" selected disabled>Select Civil Status</option>
							<option value="single">Single</option>
							<option value="married">Married</option>
							<option value="divorced">Divorced</option>
							<option value="widowed">Widowed</option>
							</select>
							<label class="form-label" for="">Civil Status</label>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6 mb-4">
							<div class="form-outline">
							<input type="text" class="form-control form-control-lg" name="nationality" id="nationality"/>
							<label class="form-label" for="">Nationality</label>
							</div>
						</div>
						<div class="col-md-6 mb-4">
							<div class="form-outline">
							<input type="text" id="religion" name="religion" class="form-control form-control-lg" />
							<label class="form-label" for="">Religion</label>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6 mb-4">
							<div class="form-outline">
							<input type="text" id="address" name="address" class="form-control form-control-lg" />
							<label class="form-label" for="">Adresss</label>
							</div>
						</div>
						<div class="col-md-6 mb-4">
							<div class="form-outline">
							<input type="text" id="phone_number" name="phone_number" class="form-control form-control-lg" />
							<label class="form-label" for="phone_number">Phone number</label>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6 mb-4">
							<div class="form-outline">
							<input type="text" id="age" name="age" class="form-control form-control-lg" />
							<label class="form-label" for="">Age</label>
							</div>
						</div>
						<div class="col-md-6 mb-4">
							<div class="form-outline">
							<input type="text" id="student_lrn" name="student_lrn" class="form-control form-control-lg" />
							<label class="form-label" for="">Student LRN</label>
							</div>
						</div>
					</div>

				
					
					<div class="row">
						<div class="col-md-6 mb-4">
							<div class="form-outline">
							<input type="text" id="username" name="username" class="form-control form-control-lg" />
							<label class="form-label" for="">Username</label>
							</div>
						</div>
						<div class="col-md-6 mb-4">
							<div class="form-outline">
							<input type="email" id="email" name="email" class="form-control form-control-lg" />
							<label class="form-label" for="email">Email</label>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-6 mb-4">
							<div class="form-outline">
							<input type="password" id="password" name="password" class="form-control form-control-lg" />
							<label class="form-label" for="">Password</label>
							</div>
						</div>
						<div class="col-md-6 mb-4">
							<div class="form-outline">
							<input type="password" id="password_confirmation" name="password_confirmation" class="form-control form-control-lg" />
							<label class="form-label" for="password_confirmation">Confirm Password</label>
							</div>
						</div>
					</div>

					<div class="d-flex justify-content-end pt-3" >
						<button type="button" id="resetButton" class="btn btn-secondary " >Reset all</button>
						<button type="submit" class="btn btn-success" style="margin-left: 10px">Submit form</button>
					</div>
		</form>

				</div>
				</div>
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
	<!-- Add this script at the end of your HTML file -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Find the reset button by its ID
        var resetButton = document.getElementById("resetButton");

        // Attach a click event listener to the reset button
        resetButton.addEventListener("click", function () {
            // Get all form elements and reset their values
            var formElements = document.querySelectorAll("form input, form select, form textarea");
            formElements.forEach(function (element) {
                // Check if the element is a file input
                if (element.type === "file") {
                    // Clear the file input by resetting its value
                    element.value = "";
                } else {
                    // Clear other input types
                    element.value = "";
                }
            });
        });
    });
</script>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

	<script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>

	</body>
</html>

