<?php include('server.php') ?>
<?php
if(isset($_SESSION['username'])){
    header("location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="loginstyle.css">
    <style>
      .wrapper p{
  top: 65%;
  left: 36%;
  position:absolute;
  transform: translate(-30%,-30%);
  font-size:22px;
  color:black;
}
input::placeholder{
  color: black;
  font-size:22px;
  font-family:sans-serif;
  

}
a:link, a:visited {
  background-color: black;
  color: pink;
  padding: 3px 5px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size:20px;
}

a:hover, a:active {
  background-color: brown;
}
</style>
  </head>
  <body>
<form method="post" action="login.php">


  	<?php include('errors.php'); ?>
  	<div class="login-box">
  <h1>Login</h1>
  <div class="textbox">
    <i class="fas fa-user"></i>
    <input type="text"  placeholder="username"  name="username">
  </div>

  <div class="textbox">
    <i class="fas fa-lock"></i>
    <input type="password" placeholder="password" name="password">
  </div>

  <button type="submit" class="btn" name="login_user">Login</button>

</div>
</form>
<div class="wrapper">
   <p>
  		Not yet a member? <a href="registration.php">Sign up</a>
      </p>
  	</div>
  

</body>
</html>
