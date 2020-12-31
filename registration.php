<?php include('server.php') ?>
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


    
        <form class="box" method="post" action="registration.php">
          <?php include('errors.php'); ?>
          
          <h3 style="font-size:30px">Volunteer Registration</h3>
		  <div class="textbox">
		  <i class="fas fa-user"></i>
           <input type="text" name="name" placeholder="Name" value="<?php echo $name; ?>">
          </div>
		   <div class="textbox">
    		<i class="fas fa-user-circle"></i>
          <input type="text" name="username" placeholder="Username" value="<?php echo $username; ?>">
		  </div>

			<div class="textbox">
			<i class="fas fa-envelope"></i>
		  <input type="email" name="email" placeholder="Email" value="<?php echo $email; ?>">
		  </div>
        
		  <div class="textbox">
    		<i class="fas fa-lock"></i>
          <input type="password" placeholder="Password" name="password_1">
		  </div>
          
		  <div class="textbox">
    		<i class="fas fa-lock"></i>
          <input type="password" placeholder="Confirm Password" name="password_2">
          </div>
		  <div class="textbox">
		  <i class="fas fa-phone"></i>
          <input type="text" name="phonenumber" placeholder="Phone number" value="<?php echo $phonenumber; ?>">
			</div>
			<div class="textbox">
			<i class="fas fa-map-marker"></i>
          <input type="text" name="location" placeholder="Location" value="<?php echo $location; ?>">
          </div>
       <!--   <label>Gender</label><br>
          <input  type="radio" name="gender"  value="Male">Male<br>
          <input type="radio" name="gender" value="Female">Female<br>
        </div>-->
        <label>Gender</label>
        <label class="radio-button">
  <input type="radio" name="gender" value="Male">
  <span class="label-visible">
    <span class="fake-radiobutton"></span>
    Male
  </span>
</label>
<label class="radio-button">
  <input type="radio" name="gender" value="Female">
  <span class="label-visible">
    <span class="fake-radiobutton"></span>
    Female
  </span>
</label><br><br>

          <label>Work </label>
          <select id="styledSelect" class="blueText" name="work">
          <option id="styledSelect" class="blueText" value="">--Select--</option>
          <option id="styledSelect" class="blueText" value="social">Social</option>
          <option id="styledSelect" class="blueText" value="orphanage">orphanage</option>
          <option id="styledSelect" class="blueText" value="Organaization">Organization</option>
          <option id="styledSelect" class="blueText" value="self">Self</option>
          </select><br><br>
          

        <!--  <input type="submit" class="btn" placeholder="Register" value="Register" name="reg_user"></button>-->
          <button type="submit" class="btn" name="reg_user">Register</button>
        <p>
       <!-- Already a member? <a href="login.php">Sign in</a>-->
        </p>

        </form>
     
</body>
</html>
<?php include('footer.php') ?>