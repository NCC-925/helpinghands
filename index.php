

<?php 

session_start(); 


if (!isset($_SESSION['username'])) {
	$_SESSION['msg'] = "You must log in first";
	header('location: login.php');
}
if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['username']);
	header("location: help.php");
}

?>
<!DOCTYPE html>
<html>
<head>
  <title>Home</title>
  <link rel="stylesheet" type="text/css" href="style2.css">
  <style>
  
  .wrapper
	{
		width:400px;
		margin: 0 auto;
		background-color:white;
	}
	.a{
		text-align:center;
	}

	.b{
	margin:0;
	color:black;
	font-size:40px;
	position:absolute;
	top:35%;
	left:50%;
	margin-right:-50%;
	transform:translate(-50%,-50%)}

	.center {
margin:0;
	color:white;
	font-size:60px;
	position:absolute;
	top:70%;
	left:50%;
	margin-right:-50%;
	transform:translate(-50%,-50%)
}

  
	

  </style>
</head>
<body>

<nav>
<label class="logo" >Volunteer page</label>

<ul>
<li><a href="volunteerhistory.php">History</a></li>
<li><a href='profile.php'>Profile</a></li>
<?php  if (isset($_SESSION['username'])) : ?>
<li><a href="index.php?logout='1'">Logout</a></li>

<?php endif ?>

</ul>
</nav>

<?php  if (isset($_SESSION['username'])) : ?>
	  <p style="text-align:center;font-size:50px"><strong><?php echo $_SESSION['username']; ?></strong>!!You are logged in as Volunteer.</p>
	  <?php endif ?>
	  
<!--<form action="new.php" method="post">-->
<?php
include "homeserver.php";
$volunteerusername=$_SESSION['username'];

//$_SESSION['description'] = $description;
?>
<?php
  

  $q=mysqli_query($db,"SELECT * FROM donation where status='0' ");
  //$row=mysqli_fetch_assoc($q);
?>


<?php
while($row=mysqli_fetch_assoc($q))
{
  ?>
 <form action="new.php" method="post">
 <?php echo "<input type=hidden name=id value='".$row['id']."'>";?>

<?php echo "<input type=hidden name=status value='".$row['status']."'>";?>
<!--<h4>Donate:<?php //echo $row['donate']?></h4>
<h4>Description:<?php //echo $row['description']?></h4>
<h4>Quantity:<?php// echo $row['quantity']?></h4>
<h4>Email:<?php //echo $row['email']?></h4>
<h4>Phonenumber:<?php //echo $row['phonenumber']?></h4>-->
<br><br>
<div class="wrapper">
<?php
echo "<b>";
echo"<table width='400' height='150' border='5' align='center'>";

  echo "<tr>";
  

	echo "<td><b> Donate:</b></td>";
	echo "<td>";
		echo $row['donate'];
	echo "</td>";

	echo "</tr>";

	echo "<tr>";

	echo "<td><b> Description:</b></td>";

	echo "<td>";
	echo $row['description'];
	echo "</td>";

	echo "</tr>";

	echo "<tr>";

	echo "<td><b> Quantity:</b></td>";

	echo "<td>";
	echo $row['quantity'];
	echo "</td>";

	echo "</tr>";

	echo "<td><b> Email:</b></td>";

	echo "<td>";
	echo $row['email'];
	echo "</td>";

  echo "<tr>";

	echo "<td><b> Phonenumber:</b></td>";

	echo "<td>";
	echo $row['phonenumber'];
	echo "</td>";

	echo "</table>";
  echo "</b";
  ?>
  </table>
  
</div>


<?php 
//$status=0;
//$_SESSION['status']=$status;

//echo $status;
?>
</br>
<h3 class="a">do you want to avail this
  <!--<input type="hidden" value=<?php //echo $row['id'];?> name="id">-->
	<button type="submit" class="btn" name="Avail">Avail</button>
   </h3>
</br>
</form>	

<?php
}
?>
<?php
$t=mysqli_query($db,"SELECT count(status) as total,(select count(*) from donation where status='1') as ones from donation");

$row1=mysqli_fetch_assoc($t);
$num1= $row1['total'];
$num2=$row1['ones'];
if($num1==$num2)
{
	?>
  <h1 class="b"><?php echo " Oops!!! no more donations available";?></h1>
  <img src="IMG-20201210-WA0015.jpg" alt="Girl in a jacket" width="400" height="275" class="center">

  <?php
}
?>

