<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
    </style>
        <link href="https://cdn.jsdelivr.net/npm/remixicon@3.2.0/fonts/remixicon.css" rel="stylesheet">
      <script src="https://kit.fontawesome.com/515e3f1675.js" crossorigin="anonymous"></script>
      <link rel="icon" type="image/x-icon" href="images/bnhs1-removebg-preview.png">
    <title>Boljoon National High School</title>
    
    <link rel="stylesheet" href="css/student_landing.css">

    
</head>
<body>

    @include('student_header')
        <section id="studentLanding">
                <div id="showcase">
                @auth
                <h1>Hi there, <span> {{auth('student')->user()->f_name}} {{auth('student')->user()->l_name}}</span></h1>
                @endauth
                <h2>Welcome Back!</h2>
                <p> Keep updated with your progress.
                </p>
                </div>
        </section>
   
    
    @include('footer1')


    <script src="js/main.js"></script>

    
</body>
</html>