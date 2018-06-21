<?php

$hostname = "localhost";
$dbname = "aviduhan";
$username = "aviduhan";
$password = "Avi";

$connection = mysqli_connect($hostname, $username, $password, $dbname);

 /* if(!$connection){
      die("Connection Failed: ".mysqli_connect_error());
  }
  echo 'Connected succesfully!'."</br>";*/

//GET THE INPUTTED USERNAME AND GWID
  $uname = $_POST['uname'];
  $gwid = $_POST['gwid'];

//SEE IF THE USERNAME EXISTS IN THE LOGIN TABLE
  $query1 = "SELECT ID FROM phone_login WHERE username = '".$uname."' OR gwid=".$gwid;
  $result1 = mysqli_query($connection, $query1);
  $row = mysqli_fetch_array($result1);

//IF THE USERNAME EXISTS TELL THE USER AND RETURN THEM TO THE CREATEACCOUNT PAGE  
  if ($row[0] === NULL){

//GET THE PASSWORD AND CONFIRM PASSWORD
    $pass = $_POST['pass'];
    $pass2 = $_POST['pass2'];

//IF THE PASSWORDS DON"T MATCH TELL THE USER AND RETURN THEM TO THE CREATEACCOUNT PAGE
    if(strcmp($pass, $pass2) == 0){
      $fname = $_POST['fname'];
      $lname = $_POST['lname'];
      $email = $_POST['email'];

//INSERT THE NEW ACCOUNT INFORMATION INTO THE LOGIN DATABASE. THEN SEND THEM BACK TO HOME
      $query2 = "INSERT INTO phone_login (firstName, lastName, email, gwid, username, password) VALUES ('".$fname."', '".$lname."', '".$email."', '".$gwid."', '".$uname."', '".$pass."')";
      $result2 = mysqli_query($connection, $query2);
      echo "<h1 style='text-align: center'>Account created successfully</h1>";
      echo "<a href = 'home.html' style='text-align: center'>Back to home</a>";


    }
    else{
      echo "<h1 style='text-align: center'>Passwords do not match.</h1>";
      echo "<a href = 'createAccount.html' style='text-align: center'>Back</a>";
    }

  }
  else{
    echo "<h1 style='text-align: center'>Username or GWID already exists.</h1>";
    echo "<a href = 'createAccount.html' style='text-align: center'>Back</a>";
  }

?>
