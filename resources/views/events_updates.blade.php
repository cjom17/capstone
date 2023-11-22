<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="images/bnhs1-removebg-preview.png">
    <title>Events and Updates | Boljoon National High School</title>
    <link rel="stylesheet" href="css/eventsUpdates.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <style>
    .no-more-events-message {
        text-align: center;
        font-size: 24px;
        height: 20vh;
        
        width: 100%;
        color: #052A56; /* Adjust the color as needed */
        margin-top: 10vh; /* Adjust the margin as needed */
    }
</style>

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
            @foreach($events as $event)
                <div class="event-card">
                    <div class="image-container">
                    <img src="{{ asset('images/' . $event->event_image) }}" alt="">

                    </div>
                    <div class="event-content">
                        <h3 class="event-title">{{ $event->event_title }}</h3>
                        <p class="event-date">Date: {{ \Carbon\Carbon::parse($event->event_date)->format('F j, Y') }}</p>
                        <p class="event-description">{{ $event->event_desc }}</p>
                        <button class="read-more-button">Read More</button>
                    </div>
                </div>
            @endforeach
        </div>
    
        <div class="for-button-container" style="display: flex; width: 100%; justify-content: space-between;">
            <button id="prev-btn" class="read-more-button" style="padding: 10px 30px; margin-left: 30px;">Previous</button>
            <button id="next-btn" class="read-more-button" style="padding: 10px 45px; margin-right: 30px">Next</button>
        </div>
    </section>

    <section id="UpdatesHeader">
         <div class="update-header">
            <div class="left-text">Updates</div>
        </div>
        
    </section>

<section id="UpdatesCard">
         <div class="update-card-container">
         @foreach($updates as $update)

            <div class="update-card">
                <div class="image-container">
                <img src="{{ asset('images/' . $update->update_image) }}" alt="">
                </div>
                <div class="update-content">
                <h3 class="event-title">{{ $update->update_title }}</h3>
                        <p class="event-date">Date: {{ \Carbon\Carbon::parse($update->update_date)->format('F j, Y') }}</p>
                        <p class="event-description">{{ $update->update_desc }}</p>
                    <button class="read-more-button">Read More</button>
                </div>
            </div>
            @endforeach

        </div>
        <div class="for-button-container" style="display:flex; width:100%; justify-content:space-between;">
        <button id="prev-btn" class="read-more-button" style="padding: 10px 30px; margin-left:30px;">Previous</button>
        <button id="next-btn" class="read-more-button" style="padding: 10px 45px; margin-right:30px">Next</button>
        </div>
</section>

    

    
    

    @include('footer')

    <script src="js/main.js"></script>
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        var events = @json($events);
        var currentIndex = 0;

        function displayEvents() {
            var eventContainer = document.querySelector('.event-card-container');
            eventContainer.innerHTML = '';

            for (var i = currentIndex; i < currentIndex + 3 && i < events.length; i++) {
                var event = events[i];
                var card = document.createElement('div');
                card.classList.add('event-card');
                card.innerHTML = `
                    <div class="image-container">
                        <img src="${event.event_image ?? './images/default.jpg'}" alt="${event.event_title}">
                    </div>
                    <div class="event-content">
                        <h3 class="event-title">${event.event_title}</h3>
                        <p class="event-date">Date: ${new Date(event.event_date).toLocaleDateString('en-US', { month: 'long', day: 'numeric', year: 'numeric' })}</p>
                        <p class="event-description">${event.event_desc}</p>
                        <button class="read-more-button">Read More</button>
                    </div>
                `;
                eventContainer.appendChild(card);
            }

            if (currentIndex >= events.length) {
                var noMoreEventsMessage = document.createElement('p');
                noMoreEventsMessage.textContent = 'No more events';
                noMoreEventsMessage.classList.add('no-more-events-message');
                eventContainer.appendChild(noMoreEventsMessage);
            }
        }

        displayEvents();

        document.getElementById('next-btn').addEventListener('click', function () {
            currentIndex = Math.min(currentIndex + 3, events.length);
            displayEvents();
        });

        document.getElementById('prev-btn').addEventListener('click', function () {
            currentIndex = Math.max(currentIndex - 3, 0);
            displayEvents();
        });
    });
</script>


    <script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    
</body>
</html>