<?php 
  session_start();
  include("connection.php");
  include("login.php");
  $query = "SELECT * FROM users WHERE id='".$_SESSION['id']."' LIMIT 1";
  $result = mysqli_query($link,$query);
  $row = mysqli_fetch_array($result);
  $diary = $row['diary'];
  $name = $row['name'];
?>
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
  #logout:hover{
    font-size: 20px;
    background-color: rgba(255,211,165,0.2);
    font-weight: bold;
  }
  #logout{
    font-weight: bold;
  }
  #hello{
    padding-top: 15px;
    font-weight: bold;
  }
  </style>
</head>
<body>
<div class="navbar navbar-default navbar-fixed">
  <div class="container">
    <div class="navbar-header pull-left">
      <a class="navbar-brand">Secret Diary</a>
    </div>
    <div class="pull-right">
      <ul class="navbar-nav nav pull-right">
        <li id="hello">Hello, <?php echo $name; ?></li>
        <li><a href="index.php?logout=1" id="logout">Log Out</a></li>
      </ul>
    </div>
  </div>
</div>
<div class="container contentContainer" id="topContainer">
  <div class="row">
    <div class="col-md-6 col-md-offset-3" id="topRow">
      <textarea class="form-control"><?php echo $diary ?></textarea>
    </div>
  </div>
</div>
<script type="text/javascript">
  $(".contentContainer").css("min-height",$(window).height());
  $("textarea").css("height",$(window).height()-120);
  $("textarea").keyup(function(){
    $.post("updatediary.php",{diary:$("textarea").val()});
  });
</script>
</body>
</html>