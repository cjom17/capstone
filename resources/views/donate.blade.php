<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.2.0/fonts/remixicon.css" rel="stylesheet">

    <link rel="stylesheet" href="css/donate.css">
    <link rel="icon" type="image/x-icon" href="images/bnhs1-removebg-preview.png">

    <title>Give to BNHS | Boljoon National High School</title>
</head>
<style>

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
  position: relative;
  background-color: #fefefe;
  margin: auto;
  padding: 0;
  border: 1px solid #888;
  width: 40%;
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
  -webkit-animation-name: animatetop;
  -webkit-animation-duration: 0.4s;
  animation-name: animatetop;
  animation-duration: 0.4s
}

/* Add Animation */
@-webkit-keyframes animatetop {
  from {top:-300px; opacity:0} 
  to {top:0; opacity:1}
}

@keyframes animatetop {
  from {top:-300px; opacity:0}
  to {top:0; opacity:1}
}

/* The Close Button */
.close {
  color: white;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}

.modal-header {
  padding: 2px 16px;
  background-color: #052A56;
  color: white;
}

.modal-body {
    padding: 50px 16px;
    display: flex;
    justify-content: center;
}

.modal-footer {
  padding: 2px 16px;
  background-color: #5cb85c;
  color: white;
}
</style>
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
                <button class="donate-button" id="myBtn">Donate Now</button>
            </div>
            <div class="donate-right-side"></div>
        </div>
    </section>




<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header">
      <span class="close">&times;</span>
      <h2 style="text-align:center; font-size: 1.2rem; font-weight: 500;">Help support BNHS school by scanning the QR code below. Your contribution goes a long way in providing quality education.</h2>
    </div>
    <div class="modal-body">
        <img src="/images/qr.png" alt="">
      
    </div>

  </div>

</div>

    @include('footer')


    <script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>
</body>
</html>