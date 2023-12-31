<?php

$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Get POST data
    $name = isset($_POST['name']) ? strip_tags(trim($_POST['name'])) : '';
    $email = isset($_POST['email']) ? trim($_POST['email']) : '';
    $message = isset($_POST['message']) ? strip_tags(trim($_POST['message'])) : '';

  // Validate form fields
  if (empty($name)) {
      $errors[] = 'Name is empty';
  }
  if (empty($message)) {
      $errors[] = 'Message is empty';
  }
  if (empty($email)) {
      $errors[] = 'Email is empty';
  } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Email is invalid';
  }

  // If no errors, send email
  if (empty($errors)) {
        // Recipient email address (replace with your own)
        $recipient = "kadtires@gmail.com";
    
        // Additional headers
        $headers = "From: $name <$email>";

        // Set the email subject
        $subject = "Nouveau message depuis votre site web";
    
        // Send email
        if (mail($recipient , $subject, $message, $headers)) {
            echo "Merci pour votre message. Nous vous répondrons bientôt!";
          } else {
                  echo "Erreur lors de l'envoi du message. Veuillez réessayer plus tard.";
              }
  } else {  // Display errors
            echo "The form contains the following errors:<br>";
            foreach ($errors as $error) {
                                        echo "- $error<br>";
                }
         }
} else {  // Not a POST request, display a 403 forbidden error
          header("HTTP/1.1 403 Forbidden");
          echo "You are not allowed to access this page.";
    }

?> 
