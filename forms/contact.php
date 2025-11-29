<?php

// Email address to receive messages
$to = "ashrafnk1@gmail.com";

// Get form values safely
$name    = htmlspecialchars($_POST['name'] ?? '');
$email   = htmlspecialchars($_POST['email'] ?? '');
$phone   = htmlspecialchars($_POST['phone'] ?? '');
$subject = htmlspecialchars($_POST['subject'] ?? 'New Contact Message');
$message = htmlspecialchars($_POST['message'] ?? '');

// Basic validation
if (empty($name) || empty($email) || empty($message)) {
    echo "Please fill all required fields.";
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Invalid email address.";
    exit;
}

// Prepare email body
$body  = "You have a new message from your website contact form.\n\n";
$body .= "Name: $name\n";
$body .= "Email: $email\n";
$body .= "Phone: $phone\n";
$body .= "Subject: $subject\n\n";
$body .= "Message:\n$message\n";

// Email headers
$headers  = "From: $name <$email>\r\n";
$headers .= "Reply-To: $email\r\n";

// Send email
if (mail($to, $subject, $body, $headers)) {
    echo "OK";  // BootstrapMade AJAX expects "OK"
} else {
    echo "Error sending email.";
}
?>
