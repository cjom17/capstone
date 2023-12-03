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
          // Use JavaScript to show an alert, clear the form, and optionally reload the page
          echo '<script>';
          echo 'alert("Email sent successfully.");';
        //   echo 'document.getElementById("name").value = "";';
          // Uncomment the next line if you want to reload the page after sending the email
          echo 'window.location.reload();';
          echo '</script>';
    } else {
        echo 'Error sending email.';
    }
} else {
    // If not a POST request, redirect to the contact page or show an error
    echo 'Invalid request.';
}
?>
