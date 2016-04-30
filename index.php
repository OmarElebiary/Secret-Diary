<?php include("login.php"); ?>
<!DOCTYPE html>
<html>
<head>
  <title>Secret Diary</title>
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

  <!-- Optional theme -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
  <script type="text/javascript" src="http://code.jquery.com/jquery-1.12.1.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <style type="text/css">
  .navbar-brand{
    font-size: 1.8em;
  }
  #topContainer{
    background-image: url("dayDream.jpg");
    height: 400px;
    width: 100%;
    background-size: cover;
    margin-top: -19px;
  }
  #topRow{
    margin-top: 100px;
    text-align: center;
  }
  #topRow h1{
    font-size: 300%;
  }
  .bold{
    font-weight: bold;
  }
  .paddingTop{
    margin-top: 30px;
  }
  .center{
    text-align: center;
  }
  #footer{
    background-color:#B0D1FB;
    width: 100%;
  }
  .marginBottom{
    margin-bottom: 30px;
  }
  </style>
</head>
<body>
<div class="navbar navbar-default navbar-fixed">
  <div class="container">
    <div class="navbar-header">
      <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand">Secret Diary</a>
    </div>
    <div class="collapse navbar-collapse">
      <form class="navbar-form navbar-right" method="post">
        <div class="form-group">
          <input type="email" placeholder="Email" class="form-control" name="loginemail" id="loginemail" value="<?php echo addslashes($_POST['loginemail']); ?>"></input>
        </div>
        <div class="form-group">
          <input type="password" placeholder="Password" class="form-control" name="loginpassword" <?php echo addslashes($_POST['loginpassword']); ?>></input>
        </div>
        <input type="submit" name="submit" value="Login" class="btn btn-success" />
      </form>
    </div>
  </div>
</div>
<div class="container contentContainer" id="topContainer">
  <div class="row">
    <div class="col-md-6 col-md-offset-3" id="topRow">
      <h1 class="paddingTop">Secret Diary</h1>
      <p class="lead">Your own private diary with you wherever you go.</p>
      <?php
        if($error){
          echo '<div class="alert alert-danger">'.addslashes($error).'</div>';
        }
        if($message){
          echo '<div class="alert alert-success">'.addslashes($message).'</div>';
        }
      ?>
      <p class="bold paddingTop">Interested? Signup below!</p>
      <form class="paddingTop" method="post">
        <div class="form-group">
        <label for="email">Email Address</label>
          <input type="email" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo addslashes($_POST['email']); ?>" />
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" name="password" placeholder="Password" value="<?php echo addslashes($_POST['password']); ?>" />
          </div>
          <input type="submit" class="btn btn-success btn-lg paddingTop" name="submit" value="Sign Up" />
      </form>
    </div>
  </div>
</div>
<script type="text/javascript">
  $(".contentContainer").css("min-height",$(window).height());
</script>
</body>
</html>