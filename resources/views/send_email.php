<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Set recipient email address
    $to = 'nztechnophile.1@gmail.com';

    // Set email subject
    $subject = 'Contact Form Submission';

    // Construct email message
    $emailMessage = "Name: $name\n";
    $emailMessage .= "Email: $email\n";
    $emailMessage .= "Message:\n$message";

    // Set additional headers
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";

    // Send the email
    $success = mail($to, $subject, $emailMessage, $headers);

    // Send a response back to the client
    if ($success) {
        echo 'Email sent successfully.';
    } else {
        echo 'Error sending email.';
    }
} else {
    // If not a POST request, redirect to the contact page or show an error
    echo 'Invalid request.';
}
?>
