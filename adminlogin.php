
<?php include('adminserver.php') ?>
<?php
if(isset($_SESSION['username3'])){
    header("location: adminindex.php");
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="loginstyle_3.css">
    <style>
      .wrapper p{
  top: 72%;
  left: 46%;
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
<form method="post" action="adminlogin.php">


  	<?php include('errordonor.php'); ?>
  	<div class="login-box">
  <h1>Login</h1>
  <div class="textbox">
    <i class="fas fa-user"></i>
    <input type="text"  placeholder="Username"  name="username3">
  </div>

  <div class="textbox">
    <i class="fas fa-lock"></i>
    <input type="password" placeholder="Password" name="password">
  </div>

  <button type="submit" class="btn" name="login_user">Login</button>

</div>
</form>


</body>
</html>

