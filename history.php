<!DOCTYPE html>
<html>
<head>
	<title>profile</title>
	<link rel="stylesheet" type="text/css" href="style2.css">
	<style >
	.wrapper
	{
		width:400px;
		margin: 10% 30%;
		background-color:white;
		margin-left:25%;
		height:100px;
		text-align:center;
	}
	</style>
</head>
<body>

<nav>
<label class="logo" >Donor page</label>

<ul>
<li><a href="#">History</a></li>
<li><a href='donorprofile.php'>Profile</a></li>
<?php  //if (isset($_SESSION['username'])) : ?>
<li><a href="index.php?logout='1'">Logout</a></li>

<?php// endif ?>
</ul>
</nav>
<?php
  

  $db = mysqli_connect('localhost', 'root', '', 'helpinghand');

  include "donorserver.php";
  $q=mysqli_query($db,"SElECT * FROM donation where username1='$_SESSION[username1]';");


  //$row=mysqli_fetch_assoc($q);
?>

<div class="wrapper">

<table width='800' height='150' border='5' align='center'>


<thead>
<tr>
<th>Date and Time</th>
<th>Donation Type</th>
<th>Description</th>
<th>Quantity</th>
<th>Email</th>
<th>Phonenumber</th>
</tr>
</thead>
<tbody>
<?php 
if(mysqli_num_rows($q)>0)
{
	while($row=mysqli_fetch_assoc($q))
	{
        
		?>
		<tr>
		<td><?php echo $row['date'];?></td>
		<td><?php echo $row['donate'];?> </td>
		<td><?php echo $row['description'];?> </td>
		<td><?php echo $row['quantity'];?> </td>
		<td><?php echo $row['email'];?> </td>
		<td><?php echo $row['phonenumber'];?> </td>
	
		
		</tr>
		<?php
	}
}
/*else{
	echo "no record found";

}*/
?>
</tbody>
</table>
</div>
</body>
</html>




