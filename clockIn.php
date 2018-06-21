<?php
session_start();

  require __DIR__ . '/twilio-php-master/Twilio/autoload.php';

  use Twilio\Rest\Client;

  $sid = 'ACe34beb51eef1eb9de352c851d34ac1e4';
  $token = 'fce99ce6783fb01610302a6048aa3828';
  $client = new Client($sid, $token);

  echo $sid;

  //$client->messages->create('+15103815026', array('from' => '+14154132463', 'body' => "This is a test message!"));

//PLACEHOLDER UNTIL I CAN HOST MY OWN XML CODE
 try{
    $call = $client->calls->create("+15103815026", "+14154132463", array("url"=>"https://handler.twilio.com/twiml/EHcfe0dd139f259483c0ae80ad70ba2506"));
    echo "started call: ".$call->sid;
  } catch (Exception $e){
    echo "Error: ".$e->getMessage();
  }

?>
