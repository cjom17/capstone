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
            <div class="right-button"><a href="/events_updates#EventsHeader">View all events</a></div>
        </div>

      </section>

<section id="EventsCard">
    <div class="event-card-container">
        @forelse($latestEvents as $event)
            <div class="event-card">
                <div class="image-container">
                    @if($event->event_image)
                        <img src="{{ asset('images/' . $event->event_image) }}" alt="Event Image">
                    @else
                        <img src="{{ asset('images/admin.png') }}" alt="Default Event Image">
                    @endif
                </div>
                <div class="event-content">
                    <h3 class="event-title">{{ $event->event_title }}</h3>
                    <p class="event-date">When: {{ \Carbon\Carbon::parse($event->event_date)->format('F j, Y') }}</p>
                    <p class="event-date">Where: {{ $event->event_place }}</p>

                    <p class="event-description">{{ $event->event_desc }}</p>
                    <button class="read-more-button">Read More</button>
                </div>
            </div>
        @empty
            <div class="empty-message">
                <p>No events available at the moment.</p>
            </div>
        @endforelse
    </div>
</section>


      <section id="UpdatesHeader">
         <div class="update-header">
            <div class="left-text">Latest Updates</div>
            <div class="right-button"><a href="/events_updates#UpdatesHeader">View all updates</a></div>
        </div>

      </section>

      <section id="UpdatesCard">
         <div class="update-card-container">
            @forelse($latestUpdates as $update)
         


            <div class="update-card">
               <div class="image-container">
                  @if($update->update_image)
                        <img src="{{ asset('images/' . $update->update_image) }}" alt="Event Image">
                    @else
                        <!-- Display a default image when there is no event image -->
                        <img src="{{ asset('images/admin.png') }}" alt="Default Event Image">
                    @endif
               </div>
               <div class="update-content">
               <h3 class="update-title">{{ $update->update_title }}</h3>
                   <p class="update-date">When: {{ \Carbon\Carbon::parse($update->update_date)->format('F j, Y') }}</p>
                   <p class="update-date">Where: {{ $update->update_place }}</p>                  

                   <p class="update-description">{{ $update->update_desc }}</p>                  
                   <button class="read-more-button">Read More</button>
               </div>
           </div>

           @empty
            <!-- Display a default message when there are no events -->
            <div class="empty-message">
                <p>No updates available at the moment.</p>
            </div>

           @endforelse     
           </div>

      </section>


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