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
               <a href="/" class="nav__logo">
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
                  <li><a href="/" class="nav__link">HOME</a></li>

                  <!--=============== DROPDOWN 1 ===============-->
                  <li class="dropdown__item">
                     <div class="nav__link" >
                       <a href="/about">ABOUT BHHS </a><i class="ri-arrow-down-s-line dropdown__arrow"></i>
                     </div>

                     <ul class="dropdown__menu">
                        <li>
                           <a href="/about#MVHeader" class="dropdown__link">
                           <i class="ri-focus-2-fill"></i></i> VISION AND MISSION
                           </a>                          
                        </li>

                        <li>
                           <a href="#" class="dropdown__link">
                           <i class="ri-organization-chart"></i></i> ORGANIZATIONAL STRUCTURE
                           </a>
                        </li>

                        <li>
                           <a href="/about#StudentHeader" class="dropdown__link">
                           <i class="ri-graduation-cap-fill"></i></i> STUDENT LIFE
                           </a>
                        </li>

                      
                     </ul>
                  </li>

                  <li class="dropdown__item">
                     <div class="nav__link" >
                        <a href="/admission">ADMISSION </a><i class="ri-arrow-down-s-line dropdown__arrow"></i>
                     </div>

                     <ul class="dropdown__menu">
                        <li>
                           <a href="/admission#forForms" class="dropdown__link">
                           <i class="ri-file-download-fill"></i>DOWNLOADABLE FORMS
                           </a>                          
                        </li>

                        <li>
                           <a href="/admission#requirements " class="dropdown__link">
                              <i class="ri-arrow-up-down-line"></i> ENROLL NOW
                           </a>
                        </li>

                      
                     </ul>
                  </li>
                  

                  <!--=============== DROPDOWN 2 ===============-->
                  <li class="dropdown__item">
                     <div class="nav__link" >
                        <a href="/events_updates">EVENTS AND UPDATES </a><i class="ri-arrow-down-s-line dropdown__arrow" ></i>
                     </div>

                     <ul class="dropdown__menu">
                        <li>
                           <a href="/events_updates#EventsHeader" class="dropdown__link">
                           <i class="ri-calendar-event-line"></i> EVENTS
                           </a>                          
                        </li>

                        <li>
                           <a href="/events_updates#UpdatesHeader" class="dropdown__link">
                           <i class="ri-article-fill"></i> UPDATES
                           </a>
                        </li>

                     </ul>
                  </li>

                  <li><a href="/contact" class="nav__link">CONTACT US</a></li>

                  <li><a href="/donate" class="nav__link">GIVE TO BNHS</a></li>

                  <li class="dropdown__item">
                     <div class="nav__link" style="font-size: 13px; font-weight: 400;">
                        <a href="">MORE </a>  <i class="ri-arrow-down-s-line dropdown__arrow"></i>
                     </div>

                     <ul class="dropdown__menu">
                        <li>
                           <a href="/adminLogin" class="dropdown__link">
                           <i class="ri-admin-fill"></i> ADMIN
                           </a>                          
                        </li>

                        <li>
                           <a href="teacherLogin" class="dropdown__link">
                           <i class="ri-user-2-fill"></i> TEACHER
                           </a>
                        </li>

                        <li>
                           <a href="/student_login" class="dropdown__link">
                           <i class="ri-user-3-fill"></i> STUDENT
                           </a>
                        </li>

                        <li>
                           <a href="/parentLogin" class="dropdown__link">
                           <i class="ri-user-heart-line"></i> PARENT
                           </a>
                        </li>

                     </ul>
                  </li>

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