<!DOCTYPE html>
   <html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">

      <!--=============== REMIXICONS ===============-->
      <link href="https://cdn.jsdelivr.net/npm/remixicon@3.2.0/fonts/remixicon.css" rel="stylesheet">
      <style>
         @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
       </style>

      <!--=============== CSS ===============-->
      <link rel="stylesheet" href="css/header.css">

      <title>Boljoon National High School</title>
   </head>
   <body>
      <!--=============== HEADER ===============-->
      <header class="header">
         <nav class="nav container">
            <div class="nav__data">
               <a href="/student_landing" class="nav__logo">
                  <img src="./images/bnhs1-removebg-preview.png" alt=""> BOLJOON NATIONAL <br>HIGH SCHOOL
               </a>
               
               <div class="nav__toggle" id="nav-toggle">
                  <i class="ri-menu-line nav__burger"></i>
                  <i class="ri-close-line nav__close"></i>
               </div>
            </div>

            <!--=============== NAV MENU ===============-->
            <div class="nav__menu" id="nav-menu" style="margin-right: -7%; " >
               <ul class="nav__list" >
                  <li><a href="/student_landing" class="nav__link">HOME</a></li>

                  <!--=============== DROPDOWN 1 ===============-->
                

                  

             

                  <li><a href="#" class="nav__link">VIEW GRADES</a></li>

                  <li><a href="#" class="nav__link">MY INFO</a></li>
                  <li><a href="#" class="nav__link">LOGOUT</a></li>


               </ul>
            </div>
         </nav>
      </header>

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
   </body>
</html>