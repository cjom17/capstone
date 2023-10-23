<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="images/bnhs1-removebg-preview.png">
    <title>Events and Updates</title>
    <link rel="stylesheet" href="css/eventsUpdates.css">

    
</head>
<body>
    @include('header')

    <section id="forLanding">
		<div id="landing-container">
         <div class="overlay" ></div>
         <div class="eventsUpdates-landing-text"><a href="#EventsHeader">EVENTS AND UPDATES</a></div>
       </div>
	</section>

    <section id="EventsHeader">
         <div class="event-header">
            <div class="left-text">Events</div>
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
            <div class="left-text">Updates</div>
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

    

    
    

    @include('footer')

    <script src="js/main.js"></script>
    <script>
    
</body>
</html>