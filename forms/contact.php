<?php
  // Replace with your receiving email address
  $receiving_email_address = 'mehra70068201@gmail.com';

  // Ensure that the form data is being posted and not directly accessed
  if($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Get form values safely
    $name = isset($_POST['name']) ? htmlspecialchars(trim($_POST['name'])) : '';
    $email = isset($_POST['email']) ? htmlspecialchars(trim($_POST['email'])) : '';
    $subject = isset($_POST['subject']) ? htmlspecialchars(trim($_POST['subject'])) : 'No subject';
    $message = isset($_POST['message']) ? htmlspecialchars(trim($_POST['message'])) : '';

    // Validate form fields
    if (!empty($name) && !empty($email) && !empty($message)) {
      
      // Set up the email headers
      $headers = "From: $name <$email>\r\n";
      $headers .= "Reply-To: $email\r\n";
      $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
      
      // Send the email
      $email_success = mail($receiving_email_address, $subject, $message, $headers);
      
      if ($email_success) {
        echo "Your message has been sent successfully!";
      } else {
        echo "Failed to send your message. Please try again later.";
      }
    } else {
      echo "Please fill in all the fields correctly.";
    }
  } else {
    echo "Invalid Request!";
  }
?>
