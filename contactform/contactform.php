<?php
  require '../vendor/autoload.php'; 
  // $name='';
  // $email_add='';
  // $subject='';
  // $message='';
  $API_KEY="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";
  if($_SERVER["REQUEST_METHOD"] == "POST")
  {
    $name = $_POST['name'];
    $email_add = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
  
  $email = new \SendGrid\Mail\Mail(); 
  $email->setFrom($email_add, "MyWebsite");
  $email->setSubject($subject);
  $email->addTo("dylansalim3@gmail.com", $name);
  $email->addContent("text/plain", $message);
  // $email->addContent(
  //     "text/html", "<strong>and easy to do anywhere, even with PHP</strong>"
  // );
  $sendgrid = new \SendGrid($API_KEY);

//   if($sendgrid->send($email))
// {
//   echo "email sent successfully";
// }  

try {
      $response = $sendgrid->send($email);
      // print $response->statusCode() . "\n";
      // print_r($response->headers());
      // print $response->body() . "\n";
  } catch (Exception $e) {
      echo 'Caught exception: '. $e->getMessage() ."\n";
  }
}
  ?>