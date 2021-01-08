<?php
// Fetching Values from URL.
$name = $_POST['name1'];
$email = $_POST['email1'];
$message = $_POST['message1'];
$email = filter_var($email, FILTER_SANITIZE_EMAIL); // Sanitizing E-mail.
// After sanitization Validation is performed
if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
$subject = $name;
// To send HTML mail, the Content-type header must be set.
$headers = 'MIME-Version: 1.0' . "rn";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "rn";
$headers .= 'From:' . $email. "rn"; // Sender's Email
$headers .= 'Cc:' . $email. "rn"; // Carbon copy to Sender
$template = '<div style="padding:50px; color:white;">Hello ' . $name . ',<br/>'
. '<br/>Thank you for contacting me.<br/><br/>'
. 'Name:' . $name . '<br/>'
. 'Email:' . $email . '<br/>'
. 'Message:' . $message . '<br/><br/>'
. 'This is a Contact Confirmation mail.'
. '<br/>'
. 'I will get back to you as soon as possible.</div>';
$sendmessage = "<div>" . $template . "</div>";// Message lines should not exceed 70 characters (PHP rule), so wrap it.
$sendmessage = wordwrap($sendmessage, 70);
// Send mail by PHP Mail Function.
mail("jack.alt@protonmail.com", $subject, $sendmessage, $headers);
echo "Your message has been received, I will get back to you as soon as possible.";
} else {
echo "<span>* invalid email *</span>";
}
?>