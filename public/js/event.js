
    // Function to toggle the expanded state and update the UI
    function toggleExpandedState(button, description) {
        let isExpanded = false;

        button.addEventListener('click', () => {
            if (!isExpanded) {
                description.style.maxHeight = 'none'; // Show full text
                button.textContent = 'Read Less';
            } else {
                description.style.maxHeight = '90px'; // Hide excess text
                button.textContent = 'Read More';
            }

            isExpanded = !isExpanded; // Toggle the expanded state
        });
    }

    // Get all the "Read More" buttons and descriptions for events
    const readMoreButtonsEvent = document.querySelectorAll('.event-card .read-more-button');
    const eventDescriptions = document.querySelectorAll('.event-card .event-description');

    // Apply the toggle functionality for events
    readMoreButtonsEvent.forEach((button, index) => {
        toggleExpandedState(button, eventDescriptions[index]);
    });

    // Get all the "Read More" buttons and descriptions for updates
    const readMoreButtonsUpdate = document.querySelectorAll('.update-card .read-more-button');
    const updateDescriptions = document.querySelectorAll('.update-card .update-description');

    // Apply the toggle functionality for updates
    readMoreButtonsUpdate.forEach((button, index) => {
        toggleExpandedState(button, updateDescriptions[index]);
    });

