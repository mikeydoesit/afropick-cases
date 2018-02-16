<?php
  if(filter_has_var(INPUT_POST, 'submit')) {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    if(!empty($email) && !empty($name) && !empty($message)) {
        if(filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
          $msg = 'Please use a valid email';
          $msgClass = 'alert-danger';
        } else {
          $toEmail = 'michaelldninc@gmail.com';
          $subject = 'Contact Request From'.$name;
          $body = '<h2>Contact Request</h2>
              <h4>Name</h4><p>'.$name.'</p>
              <h4>Email</h4><p>'.$email.'</p>
              <h4>Message</h4><p>'.$message.'</p>
              ';

              $headers = "MIME-Version: 1.0" ."\r\n";
              $headers .="Content-Type:text/html;charset=UTF-8" . "
                  \r\n";

              $headers .= "From: " .$name. "<".$email.">". "\r\n";

              if (mail($toEmail, $subject, $body, $headers)) {
                $msg = 'Your message has been sent';
                $msgClass = 'alert-success';
              } else {
                $msg = 'Message was not sent';
                $msgClass = 'alert-danger';
              }
        }
    } else {
      $msg = 'Please fill in all fields';
      $msgClass = 'alert-danger';
    }
  }
?>
