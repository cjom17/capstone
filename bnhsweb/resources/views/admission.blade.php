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
    <title>Admission</title>
    
    <link rel="stylesheet" href="css/admission.css">

    
</head>
<body>

    @include('header')
    <section id="forLanding">
		<div id="landing-container">
         <div class="overlay" ></div>
         <div class="forms-landing-text"><a href="#forForms">Downloadable Forms</a></div>
       </div>
	</section>

    <section id="forForms">
        <div class="for-form-container">
            <div class="form-card form-left-card">
                <h2>Enrollment Forms</h2>
                <div class="form-section">
                    <p>Junior High School</p>
                    <button class="download-button">Download Now</button>
                </div>
                <div class="form-section">
                    <p>Senior High School</p>
                    <button class="download-button">Download Now</button>
                </div>
            </div>
            <div class="form-card form-right-card">
                <h2>Enrollment Forms</h2>
                <div class="form-section">
                    <p>New Student</p>
                    <button class="download-button">Download Now</button>
                </div>
                <div class="form-section">
                    <p>Transferee</p>
                    <button class="download-button">Download Now</button>
                </div>
            </div>
        </div>
    </section>
    <section id="requirements">
        <div class="requirements-container">
            <div class="requirements-title">
                <h1>Be a student of BNHS</h1>
                <button class="requirement-btn"><a href="https://docs.google.com/forms/d/e/1FAIpQLSemSVgan7KW2-tPbbSZu9pl0GCtKGlGM8bTkLDyVXqRkHr1MQ/viewform?fbclid=IwAR2DNnTB63ihe0vdtpsRgP0uDueElnXiDdes2YtO6li4elfwZ607_kKKb8c" target="blank">Enroll Now</a></button>
            </div>

            <div class="requirements-content">
                <div class="requirements-content-title-box">
                    <h1>Requirements</h1>
                </div>
                <div class="requirements-content-box">
                    <h1>New Student</h1>
                    <h2>Senior High School</h2>
                    <ul>
                        <li>Form 138 (Report Card)</li>
                        <li>Birth Certificate</li>
                        <li>Certificate of Good Moral</li>
                        <li>2 x 2 Colored photos with white background</li>
                    </ul>
                </div>

                <div class="requirements-content-box">
                    <h2>Junior High School</h2>
                    <ul>
                        <li>Elementary School Report Card (Form 138)</li>
                        <li>Certificate of Good Moral Character</li>
                        <li>Photocopy of Birth Certificate</li>
                        <li>2 copies of 2by2 colored pictures</li>
                    </ul>
                </div>

                <div class="requirements-content-box">
                    <h2>Transferee</h2>
                    <ul>
                        <li>Original Report Card from previous school</li>
                        <li>Certificate of Good Moral Conduct</li>
                        <li>Photocopy of Birth Certificate</li>
                        <li>2 copies of 2by2 colored pictures</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    
    @include('footer')


    <script src="js/main.js"></script>

    
</body>
</html>