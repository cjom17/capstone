<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/donate.css">

    <title>Give to BNHS</title>
</head>
<body>

<!-- >>>>>>>>>>>>>>>>>>>> Header <<<<<<<<<<<<<<<<<<<<< -->
    @include('header')

    <section id="forLanding">
		<div id="landing-container">
         <div class="overlay" ></div>
         <div class="donate-landing-text"><a href="#forDonation">Give to BNHS</a></div>
       </div>
	</section>
    <section id="forDonation">
        <div class="donate-card">
            <div class="donate-left-side">
                <div class="donate-text">
                    Empower minds, shape the future: Support BNHS's growth today! Your donation can make a lasting impact on education, providing students with the tools they need to succeed. Join us in unlocking a brighter future at BNHS.
                </div>
                <button class="donate-button">Donate Now</button>
            </div>
            <div class="donate-right-side"></div>
        </div>
    </section>

    @include('footer')


    
</body>
</html>