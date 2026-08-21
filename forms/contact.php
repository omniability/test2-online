<?php
$to = "info@omniability.com.au";
$subject = "Simple Text Email";
$message = "Hello!\nThis is a clean, multi-line plain text email sent via PHP.";

// It is highly recommended to explicitly set the From header
$headers = "From: webmaster@yourdomain.com\r\n" .
           "Reply-To: support@yourdomain.com\r\n" .
           "X-Mailer: PHP/" . phpversion();

if (mail($to, $subject, $message, $headers)) {
    echo "Email successfully accepted by the server.";
} else {
    echo "Email delivery failed at server level.";
}
?>