<?php
session_start();
$hostname = "localhost";
$dbname = "aviduhan";
$username = "aviduhan";
$password = "Avi";

$connection = mysqli_connect($hostname, $username, $password, $dbname);

  $uname = $_POST['uname'];
  $pass = $_POST['pass'];

  $query1 = "SELECT ID FROM phone_login WHERE username = '".$uname."' AND password = '".$pass."'";
  $result1 = mysqli_query($connection, $query1);
  $row = mysqli_fetch_array($result1);
  if (!($row[0] === NULL)){
    $newPage = 'clockIn.html';
    header('Location: '.$newPage);
  }
  else{
    echo "<h1>Account not found.</h1>";
    echo "<a href = 'login.html'>Back to login</a>";
    echo "<a href = 'createAccount.html'>Create an Account</a>";
  }

?>
