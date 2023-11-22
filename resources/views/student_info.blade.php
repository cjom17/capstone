<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
    </style>
        <link href="https://cdn.jsdelivr.net/npm/remixicon@3.2.0/fonts/remixicon.css" rel="stylesheet">
      <script src="https://kit.fontawesome.com/515e3f1675.js" crossorigin="anonymous"></script>
      <link rel="icon" type="image/x-icon" href="images/bnhs1-removebg-preview.png">
    <title>Boljoon National High School</title>
    
    <link rel="stylesheet" href="css/student_info.css">

    
</head>
<body>

    @include('student_header')
      
    <section id="forInfo">
        
        <div class="my-info-image">
        
            @if(auth('student')->user()->profile_picture)
					<img src="{{ asset('/' . auth('student')->user()->profile_picture) }}"  alt="Profile Image" style="width: 180px; ">
				@else
					{{-- Default image if the user doesn't have a profile picture --}}
				    <img src="{{ asset('images/admin.png') }}" alt="Default Image" style="width: 180px; border: 3px solid;">
				@endif
        </div>
        <h3 class="prof">Profile Picture :</h3>
        
        <div class="my-info-container">
            <h1>Personal Information</h1> <br>
            <p>LRN : <span> {{auth('student')->user()->student_lrn}}</span></p>
            <p>First name: <span>{{auth('student')->user()->f_name}} </span></p>
            <p>Last name: <span> {{auth('student')->user()->l_name}}</span></p>
            <p>Middle name: <span> {{auth('student')->user()->m_name}}</span></p>
            <p>Extension name: 
                <span> @if(auth('student')->user()->x_name)
                    {{ auth('student')->user()->x_name }}
                @else
                    NA
                @endif
                </span></p>
            <p>Grade Level : <span>{{auth('student')->user()->year_lvl}}</span></p>
            <p>Section : <span> {{auth('student')->user()->section_name}}</span></p>
            <p>Birth Date : <span> {{auth('student')->user()->date_of_birth}}</span></p>
            <p>Age : <span> {{auth('student')->user()->age}}</span></p>      
            <p>Civil Status : <span> {{auth('student')->user()->gender}}</span></p>
            <p>Nationality : <span> {{auth('student')->user()->nationality}}</span></p>
            <p>Religion : <span> {{auth('student')->user()->religion}}</span></p>
            <p>Address : <span> {{auth('student')->user()->address}}</span></p>
            <p>Phone Number : <span> {{auth('student')->user()->phone_number}}</span></p>
            <p>Mother's name : <span> {{auth('student')->user()->mother_name}}</span></p>
            <p>Father's name : <span> {{auth('student')->user()->father_name}}</span></p>
            <p>Email Address : <span> {{auth('student')->user()->email}}</span></p>

        </div>
    </section>
    <section id="forFooter">
		<div class="footer-container">
			<img src="./images/bnhs1-removebg-preview.png" alt="">
			<h1>Boljoon National High School <span>2016 - 2023</span>. All rights reserved.</h1>
		</div>

	</section>
 


    <script src="js/main.js"></script>

    
</body>
</html>