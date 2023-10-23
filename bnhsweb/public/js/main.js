    // Get all the "Read More" buttons and card descriptions
    const readMoreButtons = document.querySelectorAll('.read-more-button');
    const descriptions = document.querySelectorAll('.event-description');
    
    // Add click event listeners to each "Read More" button
    readMoreButtons.forEach((button, index) => {
        let isExpanded = false; // Track the expanded state
    
        button.addEventListener('click', () => {
            if (!isExpanded) {
                descriptions[index].style.maxHeight = 'none'; // Show full text
                button.textContent = 'Read Less';
            } else {
                descriptions[index].style.maxHeight = '90px'; // Hide excess text
                button.textContent = 'Read More';
            }
    
            isExpanded = !isExpanded; // Toggle the expanded state
        });
    });