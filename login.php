<?php
session_start();
if($_GET['logout'] ==1 AND $_SESSION['id']) {
  session_destroy();
  $message = "You have been logged out.";
}
include("connection.php");
  if ($_POST['submit']=="Sign Up") {
    if (!$_POST['email']) $error.="<br />Please enter your email";
     else if (!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)) $error.="Please enter a valid email address";
    if(!$_POST['password']) $error.="<br />Please Enter a password";
      else {
        if(strlen($_POST['password'])<8) $error.="<br />Please enter a password longer than 8 char";
        if(!preg_match('`[A-Z]`',$_POST['password'])) $error .= "<br />Please enter at least one char in password";
      }
      if($error) $error = "There were errors in your signup details ".$error;
      else {
        // Check connection
        if($link === false){
          die("ERROR: Could not connect. " . mysqli_connect_error());
        } else {
          $email = mysqli_real_escape_string($link, $_POST['email']);
          $password = $_POST['password'];
        $query = "SELECT * FROM users WHERE email='".$email."'";
        $result = mysqli_query($link,$query);
        $results = mysqli_num_rows($result);
        if($results) $error = "That email address is  already registered";
          else {
            $query = "INSERT INTO users (email,password) VALUES('$email','".md5($password)."')";
            if(mysqli_query($link,$query)){
            echo "You`ve been signed up!";
            $_SESSION['id'] = mysqli_insert_id($link);
            //Redirect to logged in page
            header("Location:mainpage.php");
          } else {
            echo "ERROR: Could not create user";
          }
          }
      }
    }
    }
    if ($_POST['submit']=="Login") {
      $loginEmail = mysqli_real_escape_string($link,$_POST['loginemail']);
      $loginPassword = $_POST['loginpassword'];
      $query = "SELECT * FROM users WHERE email ='".$loginEmail."' AND password='".md5($loginPassword)."' LIMIT 1";
      $result = mysqli_query($link,$query);
      $row = mysqli_fetch_array($result);
      if($row){
        $_SESSION['id'] = $row['id'];
        $name = $row[0];
        //Redirect to logged in page
        header("Location:mainpage.php");
      } else {
        $error = "Pleae enter a valid username";
      }
    }
?>