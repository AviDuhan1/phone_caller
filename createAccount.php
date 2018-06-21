<?php

session_start();
$hostname = "localhost";
$dbname = "aviduhan";
$username = "aviduhan";
$password = "Avi";

$connection = mysqli_connect($hostname, $username, $password, $dbname);

 /* if(!$connection){
      die("Connection Failed: ".mysqli_connect_error());
  }
  echo 'Connected succesfully!'."</br>";*/

  $uname = $_POST['uname'];

  $query1 = "SELECT * FROM phone_login WHERE username = '".$uname."'";

  $result1 = mysqli_query($connection, $query1);
  $row = mysqli_fetch_array($result1);
  
  if ($row[0] === NULL){

    $pass = $_POST['pass'];
    $pass2 = $_POST['pass2'];

    if(strcmp($pass, $pass2) == 0){
      $fname = $_POST['fname'];
      $lname = $_POST['lname'];
      $email = $_POST['email'];

      $query2 = "INSERT INTO phone_login (firstName, lastName, email, username, password) VALUES ('".$fname."', '".$lname."', '".$email."', '".$uname."', '".$pass."')";
      echo $query2;
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
    echo "<h1 style='text-align: center'>Username already exists.</h1>";
    echo "<a href = 'createAccount.html' style='text-align: center'>Back</a>";
  }

?>
