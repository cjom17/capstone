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
    .no-more-updates-message {
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
            <button id="prev-btn" class="pre-next-button" style="padding: 10px 30px; margin-left: 30px; border-radius: 3px; background-color: #052A56; color: #ffffff;" >Previous</button>
            <button id="next-btn" class="pre-next-button" style="padding: 10px 45px; margin-right: 30px; border-radius: 3px; background-color: #052A56; color: #ffffff;">Next</button>
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
        <button id="update-prev-btn" class="pre-next-button" style="padding: 10px 30px; margin-left: 30px; border-radius: 3px; background-color: #052A56; color: #ffffff;">Previous</button>
        <button id="update-next-btn" class="pre-next-button" style="padding: 10px 45px; margin-right: 30px; border-radius: 3px; background-color: #052A56; color: #ffffff;">Next</button>
        </div>
</section>

    

    
    

    @include('footer')

    <script src="js/main.js"></script>
    <script>
 document.addEventListener('DOMContentLoaded', function () {
    var events = @json($events);
    var currentIndex = 0;
    var eventsPerPage = 3;

    function displayEvents() {
        var eventContainer = document.querySelector('.event-card-container');
        eventContainer.innerHTML = '';

        var endIndex = Math.min(currentIndex + eventsPerPage, events.length);
        for (var i = currentIndex; i < endIndex; i++) {
            var event = events[i];
            var card = createEventCard(event);
            eventContainer.appendChild(card);
        }

        if (currentIndex >= events.length) {
            var noMoreEventsMessage = document.createElement('p');
            noMoreEventsMessage.textContent = 'No more events';
            noMoreEventsMessage.classList.add('no-more-events-message');
            eventContainer.appendChild(noMoreEventsMessage);
        }
    }

    function createEventCard(event) {
        var card = document.createElement('div');
        card.classList.add('event-card');

        // Construct the correct image path using the public directory
        var imagePath = event.event_image ? '{{ asset("images") }}/' + event.event_image : '{{ asset("images/default.jpg") }}';

        card.innerHTML = `
            <div class="image-container">
                <img src="${imagePath}" alt="${event.event_title}">
            </div>
            <div class="event-content">
                <h3 class="event-title">${event.event_title}</h3>
                <p class="event-date">Date: ${new Date(event.event_date).toLocaleDateString('en-US', { month: 'long', day: 'numeric', year: 'numeric' })}</p>
                <p class="event-description">${event.event_desc}</p>
                <button class="read-more-button">Read More</button>
            </div>
        `;
        return card;
    }

    displayEvents();

    document.getElementById('next-btn').addEventListener('click', function () {
        currentIndex = Math.min(currentIndex + eventsPerPage, events.length);
        displayEvents();
    });

    document.getElementById('prev-btn').addEventListener('click', function () {
        currentIndex = Math.max(currentIndex - eventsPerPage, 0);
        displayEvents();
    });
});

</script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
    var updates = @json($updates);
    var currentIndexUpdates = 0;
    var updatesPerPage = 3;

    function displayUpdates() {
        var updateContainer = document.querySelector('.update-card-container');
        updateContainer.innerHTML = '';

        var endIndex = Math.min(currentIndexUpdates + updatesPerPage, updates.length);
        for (var i = currentIndexUpdates; i < endIndex; i++) {
            var update = updates[i];
            var card = createUpdateCard(update);
            updateContainer.appendChild(card);
        }

        if (currentIndexUpdates >= updates.length) {
            var noMoreUpdatesMessage = document.createElement('p');
            noMoreUpdatesMessage.textContent = 'No more updates';
            noMoreUpdatesMessage.classList.add('no-more-updates-message');
            updateContainer.appendChild(noMoreUpdatesMessage);
        }
    }

    function createUpdateCard(update) {
        var card = document.createElement('div');
        card.classList.add('update-card');

        // Construct the correct image path using the public directory
        var imagePath = update.update_image ? '{{ asset("images") }}/' + update.update_image : '{{ asset("images/default.jpg") }}';

        card.innerHTML = `
            <div class="image-container">
                <img src="${imagePath}" alt="${update.update_title}">
            </div>
            <div class="update-content">
                <h3 class="event-title">${update.update_title}</h3>
                <p class="event-date">Date: ${new Date(update.update_date).toLocaleDateString('en-US', { month: 'long', day: 'numeric', year: 'numeric' })}</p>
                <p class="event-description">${update.update_desc}</p>
                <button class="read-more-button">Read More</button>
            </div>
        `;
        return card;
    }

    displayUpdates();

    document.getElementById('update-next-btn').addEventListener('click', function () {
        currentIndexUpdates = Math.min(currentIndexUpdates + updatesPerPage, updates.length);
        displayUpdates();
    });

    document.getElementById('update-prev-btn').addEventListener('click', function () {
        currentIndexUpdates = Math.max(currentIndexUpdates - updatesPerPage, 0);
        displayUpdates();
    });
});

</script>


    <script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    
</body>
</html>