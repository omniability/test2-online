<?php
// 1. Define your receiving email address
$receiving_email_address = 'info@omniability.com.au';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // 2. Sanitize and capture inputs safely
    $name    = filter_var(trim($_POST['name'] ?? ''), FILTER_SANITIZE_STRING);
    $email   = filter_var(trim($_POST['email'] ?? ''), FILTER_SANITIZE_EMAIL);
    $phone   = filter_var(trim($_POST['phone'] ?? ''), FILTER_SANITIZE_STRING);
    $subject = filter_var(trim($_POST['subject'] ?? ''), FILTER_SANITIZE_STRING);
    $message = filter_var(trim($_POST['message'] ?? ''), FILTER_SANITIZE_STRING);

    // 3. Fallback for subject if empty
    if (empty($subject)) {
        $subject = "New Contact Form Submission";
    }

        // 4. Construct clean email headers
        $headers = "From: " . $name . " <" . $email . ">\r\n";
        $headers .= "Reply-To: " . $email . "\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    // 5. Format the layout of the message body
    $email_content = "You have received a new message from your website contact form.\n\n";
    $email_content .= "From: $name\n";
    $email_content .= "Email: $email\n";
    $email_content .= "Phone: $phone\n\n";
    $email_content .= "Message:\n$message\n";

    // 6. Send email and output the exact response the Bootstrap JavaScript expects
    if (mail($receiving_email_address, $subject, $email_content)) {
        echo "OK"; 
    } else {
        echo "Error: Server failed to send email. Please check your hosting mail settings.";
    }
} else {
    echo "Error: Invalid request method.";
}
?>