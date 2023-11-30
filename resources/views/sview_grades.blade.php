<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
    </style>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link href="https://cdn.jsdelivr.net/npm/remixicon@3.2.0/fonts/remixicon.css" rel="stylesheet">
      <script src="https://kit.fontawesome.com/515e3f1675.js" crossorigin="anonymous"></script>
        <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

      <link rel="icon" type="image/x-icon" href="images/bnhs1-removebg-preview.png">
    <title>Boljoon National High School</title>
    
    <link rel="stylesheet" href="css/sview_grades.css">

    
</head>
<body>

    @include('student_header')
      
    <section id="forCard">
        <div class="report-card-container">
        <h4>Report Card of Student</h4>
        <p>LRN: <span>{{auth('student')->user()->student_lrn}}</span></p>
        <P>Name: <span>{{auth('student')->user()->f_name}} {{auth('student')->user()->l_name}}</span></P>
        <!-- <p>SY: <span>2021 - 2022</span></p> -->
        <table class="table table-striped">
            <thead>
                <tr>
                <th scope="col">Subject Id</th>
                <th scope="col">Subject Name</th>
                <th scope="col">1st</th>
                <th scope="col">2nd</th>
                <th scope="col">3rd</th>
                <th scope="col">4th</th>
                <th scope="col">Final</th>
                <th scope="col">Remarks</th>
                </tr>
            </thead>
            <tbody>
            @foreach($enrolledSubjects as $subject)
                    <tr>
                        <td>{{ $subject->subject_id }}</td>
                        <td>{{ $subject->subject_name }}</td>
                        <td>{{ $subject->first_qtr }}</td>
                        <td>{{ $subject->second_qtr }}</td>
                        <td>{{ $subject->third_qtr }}</td>
                        <td>{{ $subject->fourth_qtr }}</td>
                        <td>{{ $subject->final }}</td>
                        <td>{{ $subject->remarks }}</td>
                    </tr>
            @endforeach
               

            </tbody>
        </table>
        </div>
        
    </section>

    <section id="forFooter">
		<div class="footer-container">
			<img src="./images/bnhs1-removebg-preview.png" alt="">
			<h1>Boljoon National High School <span>2016 - 2023</span>. All rights reserved.</h1>
		</div>

	</section>


</script>

    <script src="js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    
</body>
</html>