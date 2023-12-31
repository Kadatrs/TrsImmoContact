<?php

$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Get POST data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
  
  // Validate form fields
  if (empty($name)) {
      $errors[] = 'Name is empty';
  }
  if (empty($message)) {
      $errors[] = 'Message is empty';
  }
  if (empty($email)) {
      $errors[] = 'Email is empty';
  } 

  // If no errors, send email
  if (empty($errors)) {
        // Recipient email address (replace with your own)
        $recipient = "kadtires@gmail.com";

        // Set the email subject
        $subject = "Nouveau message depuis votre site web";
    
        // Send email
        if (mail($recipient ,$subject, $message)) {
            echo "Merci pour votre message. Nous vous répondrons bientôt!";
          } else {
                  echo "Erreur lors de l'envoi du message. Veuillez réessayer plus tard.";
              }
  } else {  // Display errors
            echo "The form contains errors, Try Again !";
         }
} else {  // Not a POST request, display a 403 forbidden error
          // header("HTTP/1.1 403 Forbidden");
          echo "You are not allowed to access this page.";
    }

?> 
