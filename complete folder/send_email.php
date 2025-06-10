<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name = htmlspecialchars(strip_tags(trim($_POST["user_name"])));
    $email = htmlspecialchars(strip_tags(trim($_POST["user_email"])));
    $message = htmlspecialchars(strip_tags(trim($_POST["user_message"])));

    // Set the recipient email address
    $to_email = "23cse62@quest.edu.pk"; // The CSE department's email

    // Set the email subject
    $subject = "New Contact Form Message from " . $name;

    // Compose the email message
    $email_body = "You have received a new message from your website contact form.\n\n";
    $email_body .= "Name: " . $name . "\n";
    $email_body .= "Email: " . $email . "\n\n";
    $email_body .= "Message:\n" . $message . "\n";

    // Set email headers
    $headers = "From: " . $email . "\r\n";
    $headers .= "Reply-To: " . $email . "\r\n";
    $headers .= "Content-type: text/plain; charset=UTF-8\r\n";

    // Send the email
    if (mail($to_email, $subject, $email_body, $headers)) {
        // Redirect to a success page or display a success message
        header("Location: thank_you.html?status=success");
        exit;
    } else {
        // Redirect to an error page or display an error message
        header("Location: error.html?status=error");
        exit;
    }
} else {
    // If someone tries to access send_email.php directly
    header("Location: index.html"); // Redirect to your main page
    exit;
}
?>