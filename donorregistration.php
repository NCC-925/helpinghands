<?php include('donorserver.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Registration system PHP and MySQL</title>
  <link rel="stylesheet" type="text/css" href="volunteerstyle.css">
  <style>
select {
  position: relative;
}

/* Style by class. Effects the text of the contained options. */
.blueText {
  color: #0000FF;
}

/* Style by id. Effects position of the select drop down. */
#styledSelect {
  center: 100px;
}
.h3{
  text-align:center;
  color:green;
}
    </style>
</head>
<body>

  <form class="box" method="post" action="donorregistration.php">
      <?php include('errordonor.php'); ?>
      <h3 style="font-size:30px">Donor Registration</h3>

      <div class="textbox">
		  <i class="fas fa-user"></i>
      <input type="text" name="name1" placeholder="Name" value="<?php echo $name1; ?>">
      </div>
    
      <div class="textbox">
    		<i class="fas fa-user-circle"></i>
      <input type="text" name="username1" placeholder="Username" value="<?php echo $username1; ?>">
      </div>
    
      <div class="textbox">
			<i class="fas fa-envelope"></i>
      <input type="email" name="email1" placeholder="Email" value="<?php echo $email1; ?>">
      </div>
    
      <div class="textbox">
    		<i class="fas fa-lock"></i>
      <input type="password" placeholder="Password" name="password_1">
      </div>
    
      <div class="textbox">
    		<i class="fas fa-lock"></i>
      <input type="password" placeholder="confirm Password" name="password_2">
      </div>
      
      <div class="textbox">
		  <i class="fas fa-phone"></i>
      <input type="text" name="phonenumber1" placeholder="phone number" value="<?php echo $phonenumber1; ?>">
      </div>
     
      <div class="textbox">
			<i class="fas fa-map-marker"></i>
      <input type="text" name="location1" placeholder="Location" value="<?php echo $location1; ?>">
      </div>

      
      <label>Gender</label>
      <input type="radio" name="gender1"  value="Male">Male
      <input type="radio" name="gender1" value="Female">Female
      <br><br>

      
      <button type="submit" class="btn" name="reg_user">Register</button>

    <p>
       <!-- Already a member? <a href="login.php">Sign in</a>-->
    </p>
  </form>
  
</body>
</html>
<?php include('footer.php') ?>