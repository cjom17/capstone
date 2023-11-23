<!DOCTYPE html>
   <html lang="en">
   <head>
      <meta charset="UTF-8">
	  <meta name="csrf-token" content="{{ csrf_token() }}">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
	  <script src="https://kit.fontawesome.com/515e3f1675.js" crossorigin="anonymous"></script>
	  <link rel="icon" type="image/x-icon" href="images/bnhs1-removebg-preview.png">

      <!--=============== REMIXICONS ===============-->
      <link href="https://cdn.jsdelivr.net/npm/remixicon@3.2.0/fonts/remixicon.css" rel="stylesheet">
      <style>
         @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
       </style>

      <!--=============== CSS ===============-->
      <link rel="stylesheet" href="css/contact.css">

      <title>Contact Us | Boljoon National High School</title>
   </head>
   <body>
      <!--=============== HEADER ===============-->
      @include('header')

	<section id="forLanding">
		<div id="landing-container">
         <div class="overlay" ></div>
         <div class="contact-text"><a href="#forContact">Contact Us</a></div>
       </div>
	</section>
	

	<section id="forContact">
		<div class="contact-container">
			<div class="content">
			  <div class="left-side">
				<div class="address details">
				  <i class="fas fa-map-marker-alt"></i>
				  <div class="topic">Address</div>
				  <div class="text-one">N. Bacalso Highway, Lower Becerril,
               Booljoon Cebu</div>
				  <!-- <div class="text-two">Birendranagar 06</div> -->
				</div>
				<div class="phone details">
				  <i class="fas fa-phone-alt"></i>
				  <div class="topic">Phone</div>
				  <div class="text-one">099191764281</div>
				  <!-- <div class="text-two">+0096 3434 5678</div> -->
				</div>
				<div class="email details">
				  <i class="fas fa-envelope"></i>
				  <div class="topic">Email</div>
				  <div class="text-one">bnhs.official@gmail.com</div>
				  <!-- <div class="text-two">info.codinglab@gmail.com</div> -->
				</div>
			  </div>
			  <div class="right-side">
				<div class="topic-text">Get connected with BNHS</div>
				<p>Get in touch with us with any question or queries.  We would be happy to answer your questions.</p>
			  <form action="#">
				<div class="input-box">
				  <input type="text" placeholder="Enter your name" id="name" name="name" required >
				</div>
				<div class="input-box">
				  <input type="email" placeholder="Enter your email" id="email" name="email" required>
				</div>
				<div class="input-box message-box">
				  <textarea placeholder="Enter your message" name="message" id="message" required></textarea>
				</div>
				<div class="button">
				  <input type="button" value="Send Now"  onclick="sendEmail()">
				</div>
			  </form>
			</div>
			</div>
		  </div>

	</section>

   @include('footer')
   <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>


      <!--=============== MAIN JS ===============-->
      <!-- <script src="js/main.js"></script> -->
      <script>
        /*=============== SHOW MENU ===============*/
			const showMenu = (toggleId, navId) =>{
			const toggle = document.getElementById(toggleId),
					nav = document.getElementById(navId)

			toggle.addEventListener('click', () =>{
				// Add show-menu class to nav menu
				nav.classList.toggle('show-menu')

				// Add show-icon to show and hide the menu icon
				toggle.classList.toggle('show-icon')
			})
			}

			showMenu('nav-toggle','nav-menu')

	</script>
	<script>
			function sendEmail() {
				console.log('Form Data Before Serialization:', {
        name: $('#name').val(),
        email: $('#email').val(),
        message: $('#message').val(),
    });

	var formData = new FormData();
    formData.append('name', $('#name').val());
    formData.append('email', $('#email').val());
    formData.append('message', $('#message').val());

	console.log('FormData Object Before Sending:', formData);


				var csrfToken = $('meta[name="csrf-token"]').attr('content');

				$.ajax({
					type: 'POST',
					url: '{{ route("send-email") }}',
					data: formData,
					contentType: false,
    processData: false, 
					headers: {
						'X-CSRF-TOKEN': csrfToken
					},
					success: function (response) {
						console.log('Success:', response);
					},
					error: function (xhr, status, error) {
			console.error('XHR:', xhr);
			console.error('Status:', status);
			console.error('Error:', error);

			// Check if the response contains a 'responseJSON' property
			if (xhr.responseJSON) {
				console.error('Server Error:', xhr.responseJSON);
				alert('Server Error: ' + xhr.responseJSON.message); // Display the error message
				}
			}

       	 });
    	}
	</script>

		

   </body>
</html>