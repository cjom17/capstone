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

    @include('parent_header')
      
    <section id="forInfo">
        
        <div class="my-info-image">
        
            @if(auth('parent')->user()->profile_picture)
					<img src="{{ asset('/' . auth('parent')->user()->profile_picture) }}"  alt="Profile Image" style="width: 180px; ">
				@else
					{{-- Default image if the user doesn't have a profile picture --}}
				    <img src="{{ asset('images/admin.png') }}" alt="Default Image" style="width: 180px; border: 3px solid;">
				@endif
        </div>
        <h3 class="prof">Profile Picture :</h3>
        
        <div class="my-info-container">
            <h1>Personal Information</h1> <br>
            <p>LRN : <span> {{auth('parent')->user()->student_lrn}}</span></p>
            <p>First name: <span>{{auth('parent')->user()->f_name}} </span></p>
            <p>Last name: <span> {{auth('parent')->user()->l_name}}</span></p>
            <p>Middle name: <span>  @if(auth('parent')->user()->m_name)
                    {{ auth('parent')->user()->x_name }}
                @else
                    NA
                @endif</span></p>
            <p>Extension name: 
                <span> @if(auth('parent')->user()->x_name)
                    {{ auth('parent')->user()->x_name }}
                @else
                    NA
                @endif
                </span></p>
            <p>Age : <span> {{auth('parent')->user()->age}}</span></p>      
            <p>Civil Status : <span> {{auth('parent')->user()->gender}}</span></p>
            <p>Nationality : <span> {{auth('parent')->user()->nationality}}</span></p>
            <p>Religion : <span> {{auth('parent')->user()->religion}}</span></p>
            <p>Address : <span> {{auth('parent')->user()->address}}</span></p>
            <p>Phone Number : <span> {{auth('parent')->user()->phone_number}}</span></p>
            <p>Username : <span> {{auth('parent')->user()->username}}</span></p>

            <p>Email Address : <span> {{auth('parent')->user()->email}}</span></p>

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