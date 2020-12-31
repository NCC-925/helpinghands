
  
<!DOCTYPE html>
<html>
<head>
	<title>profile</title>
	<link rel="stylesheet" type="text/css" href="style2.css">
	<style type="text/css">
	.wrapper
	{
		width:400px;
		margin: 10% auto;
		background-color:pink;
		height:165px;
	}
	</style>
</head>
<body>

<nav>
<label class="logo" >Volunteer page</label>

<ul>
<li><a href="volunteerhistory.php">History</a></li>
<li><a href='#'>Profile</a></li>
<?php  //if (isset($_SESSION['username'])) : ?>
<li><a href="index.php?logout='1'">Logout</a></li>

<?php //endif ?>

</ul>
</nav>
<form action="" method="post">
<?php
	include "server.php";
	$q=mysqli_query($db,"SElECT * FROM register where username='$_SESSION[username]';");
	$row=mysqli_fetch_assoc($q);
?>
<div class="wrapper">
<div style="text-align:center;"><h3><b>Welcome,<?php echo $row['username'];?></h3></b>

</div>


<?php
	echo "<b>";
	echo"<table width='400' height='150' border='5' align='center'>";

	echo "<tr>";

	echo "<td><b> Name:</b></td>";
	echo "<td>";
		echo $row['name'];
	echo "</td>";

	echo "</tr>";

	echo "<tr>";

	echo "<td><b> UserId:</b></td>";

	echo "<td>";
	echo $row['phonenumber'];
	echo "</td>";

	echo "</tr>";

	echo "<tr>";

	echo "<td><b> Email:</b></td>";

	echo "<td>";
	echo $row['email'];
	echo "</td>";

	echo "</tr>";

	echo "<td><b> Work:</b></td>";

	echo "<td>";
	echo $row['work'];
	echo "</td>";

	echo "</table>";
	echo "</b";
	?>
</form>
</body></html>