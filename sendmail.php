<?php
require 'vendor/autoload.php'; 
print(getenv('ENVIRONMENT'));
$API_KEY=getenv('SG_API_KEY');
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