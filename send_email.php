<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get and sanitize form data
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $contact = htmlspecialchars(trim($_POST['contact']));
    $feedback = htmlspecialchars(trim($_POST['feedback']));

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format.";
        exit;
    }

    // Email settings
    $to = "sauravgaur01344@gmail.com"; // Replace with your email address
    $subject = "New Feedback from Website";
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

    // Email body
    $message = "
    <html>
    <head>
        <title>New Feedback</title>
    </head>
    <body>
        <h2>Feedback Submission</h2>
        <p><strong>Name:</strong> $name</p>
        <p><strong>Email:</strong> $email</p>
        <p><strong>Contact Number:</strong> $contact</p>
        <p><strong>Feedback:</strong></p>
        <p>$feedback</p>
    </body>
    </html>
    ";

    // Send email and log errors
    if (mail($to, $subject, $message, $headers)) {
        echo "Feedback submitted successfully!";
    } else {
        // Log error to a file
        error_log("Email sending failed for: $email", 3, "/var/log/php_mail_errors.log");
        echo "There was an error submitting your feedback. Please try again.";
    }
} else {
    echo "Invalid request.";
}
?>
