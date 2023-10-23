<!DOCTYPE html>
   <html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="css/style.css">
      <link href="https://cdn.jsdelivr.net/npm/remixicon@3.2.0/fonts/remixicon.css" rel="stylesheet">
      <script src="https://kit.fontawesome.com/515e3f1675.js" crossorigin="anonymous"></script>
      <style>
         @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
       </style>
           <link rel="icon" type="image/x-icon" href="images/bnhs1-removebg-preview.png">
      <title>Boljoon National High School</title>
   </head>
   <body>
      <!--=============== HEADER ===============-->
     @include('header')
      <section id="forLandingPage">
         <div class="landing-page">
            <div class="overlay"></div>
            <div class="content">
                <div class="card">
                    <div class="card-content">
                        <h2>Competence</h2>
                        <h2>Commitment</h2>
                        <h2>Excellence</h2>
                    </div>
                    <a href="#" class="landing-read-more-button">Read More</a>
                </div>
            </div>
        </div>
      </section>

      <section id="EventsHeader">
         <div class="event-header">
            <div class="left-text">Latest Events</div>
            <div class="right-button"><a href="#">View all events</a></div>
        </div>
        
      </section>

      <section id="EventsCard">
         <div class="event-card-container">
            <div class="event-card">
                <div class="image-container">
                    <img src="./images/5.jpg" alt="Event 1">
                </div>
                <div class="event-content">
                    <h3 class="event-title">Event Title 1</h3>
                    <p class="event-date">Date: January 1, 2023</p>
                    <p class="event-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis auctor est non justo auctor, at eleifend libero rhoncus.
                      
                    </p>
                    <button class="read-more-button">Read More</button>
                </div>
            </div>
    
            <div class="event-card">
                <div class="image-container">
                    <img src="./images/5.jpg" alt="Event 1">
                </div>
                <div class="event-content">
                    <h3 class="event-title">Event Title 1</h3>
                    <p class="event-date">Date: January 1, 2023</p>
                    <p class="event-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis auctor est non justo auctor, at eleifend libero rhoncus.
                    </p>
                    <button class="read-more-button">Read More</button>
                </div>
            </div>

            <div class="event-card">
               <div class="image-container">
                   <img src="./images/5.jpg" alt="Event 1">
               </div>
               <div class="event-content">
                   <h3 class="event-title">Event Title 1</h3>
                   <p class="event-date">Date: January 1, 2023</p>
                   <p class="event-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis auctor est non justo auctor, at eleifend libero rhoncus.
                   </p>
                   <button class="read-more-button">Read More</button>
               </div>
           </div>
    
    
    
            <!-- Add similar card structures for other events -->
        </div>
    
      </section>

      <section id="UpdatesHeader">
         <div class="update-header">
            <div class="left-text">Latest Updates</div>
            <div class="right-button"><a href="#">View all updates</a></div>
        </div>
        
      </section>

      <section id="UpdatesCard">
         <div class="update-card-container">
            <div class="update-card">
                <div class="image-container">
                    <img src="./images/bg-1.jpg" alt="Event 1">
                </div>
                <div class="update-content">
                    <h3 class="update-title">Event Title 1</h3>
                    <p class="update-date">Date: January 1, 2023</p>
                    <p class="update-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis auctor est non justo auctor, at eleifend libero rhoncus.
                      
                    </p>
                    <button class="read-more-button">Read More</button>
                </div>
            </div>
    
            <div class="update-card">
                <div class="image-container">
                    <img src="./images/bnhs1-removebg-preview.png" alt="Event 1">
                </div>
                <div class="update-content">
                    <h3 class="update-title">Event Title 1</h3>
                    <p class="update-date">Date: January 1, 2023</p>
                    <p class="update-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis auctor est non justo auctor, at eleifend libero rhoncus.
                    </p>
                    <button class="read-more-button">Read More</button>
                </div>
            </div>

            <div class="update-card">
               <div class="image-container">
                   <img src="./images/bg-1.jpg" alt="Event 1">
               </div>
               <div class="update-content">
                   <h3 class="update-title">Event Title 1</h3>
                   <p class="update-date">Date: January 1, 2023</p>
                   <p class="update-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis auctor est non justo auctor, at eleifend libero rhoncus.
                   </p>
                   <button class="read-more-button">Read More</button>
               </div>
           </div>
    
    
    
            <!-- Add similar card structures for other events -->
        </div>
    
      </section>


      <!-- <section id="forFooter">
         <footer class="footer-distributed">

            <div class="footer-left">
               <div class="footer-image"><img src="./images/bnhs1-removebg-preview.png" alt=""> </div>
                <h3>  Boljoon National High School</h3>
    
                <p class="footer-links">
                    <a href="#">About BNHS</a>
                    |
                    <a href="#">Admission</a>
                    |
                    <a href="#">Events and Updates</a>
                    |
                    <a href="#">Contact Us</a>
                    |
                    <a href="#">Give to BNHS</a>
                </p>
    
                <p class="footer-company-name">Copyright © 2021 <strong>SagarDeveloper</strong> All rights reserved</p>
            </div>
    
            <div class="footer-center">
                <div>
                    <i class="fa fa-map-marker"></i>
                    <p><span>Ghaziabad</span>
                        Delhi</p>
                </div>
    
                <div>
                    <i class="fa fa-phone"></i>
                    <p>+91 74**9**258</p>
                </div>
                <div>
                    <i class="fa fa-envelope"></i>
                    <p><a href="mailto:sagar00001.co@gmail.com">xyz@gmail.com</a></p>
                </div>
            </div>
            <div class="footer-right">
                <p class="footer-company-about">
                    <span>About the company</span>
                    <strong>Sagar Developer</strong> is a Youtube channel where you can find more creative CSS Animations
                    and
                    Effects along with
                    HTML, JavaScript and Projects using C/C++.
                </p>
                <div class="footer-icons">
                    <a href="#"><i class="fa fa-facebook"></i></a>
                    <a href="#"><i class="fa fa-instagram"></i></a>
                    <a href="#"><i class="fa fa-linkedin"></i></a>
                    <a href="#"><i class="fa fa-twitter"></i></a>
                    <a href="#"><i class="fa fa-youtube"></i></a>
                </div>
            </div>
        </footer>
      </section> -->
      @include('footer')




      <!--=============== MAIN JS ===============-->
      <script src="js/main.js"></script>
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
   </body>
</html>