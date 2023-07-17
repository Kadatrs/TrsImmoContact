<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Retrieve form data
  $name = $_POST["name"];
  $email = $_POST["email"];
  $message = $_POST["message"];
  // Define recipient and sender details
  $recipient = "Kadtires@gmail.com";

  // Set the email subject
  $subject = "Nouveau message depuis votre site web";

  // Set the email headers
  $headers = "From: " . $name . " <" . $email . ">\r\n";
  $headers .= "Reply-To: " . $email . "\r\n";

  // Build the email content
  $emailContent = "Name: " . $name . "\n";
  $emailContent .= "Email: " . $email . "\n";
  $emailContent .= "Message: " . $message;

  // Send the email
  if (mail($recipient, $subject, $emailContent, $headers)) {
    echo "Merci pour votre message. Nous vous répondrons bientôt!";
  } else {
    echo "Erreur lors de l'envoi du message. Veuillez réessayer plus tard.";
  }
}
?>
