<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
    </style>
    <link rel="stylesheet" href="css/about.css">
    <title>About BNHS</title>

</head>

<body>
    @include('header')
    <section id="forLanding">
		<div id="landing-container">
         <div class="overlay" ></div>
         <div class="about-landing-text"><a href="#aboutSection">ABOUT US</a></div>
       </div>
	</section>

   
    <section id="aboutSection">
        <div class="about-container">
            <h1 class="about-title">Boljoon National High School</h1>
            <p class="about-description">
                Boljoon National High School, established in 1969, is a public institution dedicated to offering quality education to young children. The school places great emphasis on core values such as excellence, competence, and commitment. By nurturing social sensitivity and fostering a sense of responsibility, Boljoon National High School aims to prepare its students to become responsible citizens who are aware of the world around them. Through its commitment to providing a high standard of education and promoting positive values, the school equips students with the necessary skills and knowledge to succeed in their future endeavors and make meaningful contributions to society.
            </p>
        </div>
        <div class="about-image"></div>
    </section>

    <section id="MVHeader">
        <div class="MV-header">
           <div class="MV-left-text">Vision and Mission</div>
       </div>
       
   </section>

    <section id="forMV">
        <div class="mv-container">
            <div class="mv-card">
                <h2>Vision</h2>
                <p>The Boljoon National High School envisions to harness the best of the Filipino youth through quality education imbued with desirable values to produce responsible and globally competitive learners motivated by the love of God in the service of humanity and country.</p>
            </div>
            <div class="mv-card">
                <h2>Mission</h2>
                <p>The Boljoon National High School endeavors to cater to the needs of the student for basic quality education in preparing them for academic excellence and global competitiveness through value-laden learning experiences, competent teachers, dedicated stakeholders, visionary administrators, complete school facilities, thus making students men of character and productive citizens in the community.</p>
            </div>
        </div>
    </section>

    <section id="StudentHeader">
        <div class="student-header">
           <div class="student-left-text">Student Life</div>
       </div>
       
   </section>

    <section id="studentSection">
        <div class="student-container">
            <p class="student-description">
                The students are not only enhanced academically, but they are also exposed to different extracurricular activities, students clubs and organizations, workshops, conferences and immersion programs with various schools around Cebu province and Region 7.
            <br>

            It is the aim of the school not only to improve the mental capacity of each student but also to enhance other facets of his or her multiple intelligence's.            
            </p>
        </div>
        <div class="student-image"></div>
    </section>
    @include('footer')
</body>
</html>
