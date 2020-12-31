<?php 
  session_start(); 

  if (!isset($_SESSION['username1'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: donorlogin.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username1']);
  	header("location: help.php");
  }

?>
<?php include('homeserver.php') ?>

<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
  <link rel="stylesheet" type="text/css" href="s6.css">
  <link rel="stylesheet" type="text/css" href="style2.css">
  <style>
select {
  position: relative;
}
.blueText {
  color: #0000FF;
}
#styledSelect {
  center: 100px;
}
    </style>


</head>
<body>

<nav>
<label class="logo" >Donor page</label>

<ul>
<li><a href="history.php">History</a></li>
<li><a href='donorprofile.php'>Profile</a></li>
<?php  if (isset($_SESSION['username1'])) : ?>
<li><a href="home.php?logout='1'">Logout</a></li>

<?php endif ?>

</ul>
</nav>

<?php  if (isset($_SESSION['username1'])) : ?>
    	<p style="text-align:center;font-size:50px">Welcome <strong><?php echo $_SESSION['username1']; ?></strong></p>
		<?php endif ?>
    <div class="container">
	<div class="row">
		<div class="col-md-6">
			<div class="card">

<form class="box" method="post" action="home.php" >

<?php include('errors.php'); ?>



<label>Donate </label>
      <select id="styledSelect" class="blueText" name="donate">
        <option id="styledSelect" class="blueText" value="">--Select--</option>
        <option id="styledSelect" class="blueText" value="books">Books</option>
        <option id="styledSelect" class="blueText" value="stationary">Stationary</option>
        <option id="styledSelect" class="blueText" value="clothes">Clothes</option>
        </select>
        <br>
	  
    <label>Description</label>
    <textarea rows = "5" cols = "50" placeholder=" Enter details here..." name = "description"  value="<?php echo $description;?>"></textarea><br>

     <!-- <input type="text" name="description" value="<?php //echo $description; ?>">-->
   
      <input type="text" name="quantity" placeholder="Quantity" value="<?php echo $quantity; ?>">
    
    
      <input type="email" name="email" placeholder="Email" value="<?php echo $email; ?>">
    
      <input type="text" name="phonenumber" placeholder="Phonenumber" value="<?php echo $phonenumber; ?>">
      
      <input type="submit"  placeholder="Submit" name="don_vol"></button>
</form>		
		</div>
    </div>
    </div>
    </div>
</body>
</html>
<?php include('footer.php') ?>