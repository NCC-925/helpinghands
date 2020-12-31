
  
<!DOCTYPE html>
<html>
<head>
	<title>History</title>
	<link rel="stylesheet" type="text/css" href="style2.css">
	<style type="text/css">
	.wrapper
	{
		width:800px;
		margin: 10% 35%;
		background-color:pink;
		height:152px;
        margin-left:20%;
	}
    .head{
        text-align:center;
        margin:10% 25%;
    }
	</style>
</head>
<body>

<nav>
<label class="logo" >Volunteer page</label>

<ul>
<li><a href='#'>History</a></li>
<li><a href='profile.php'>Profile</a></li>
<?php  //if (isset($_SESSION['username'])) : ?>
<li><a href="index.php?logout='1'">Logout</a></li>

<?php //endif ?>

</ul>
</nav>
<form action="" method="post">
<?php
	include "donorserver.php";
	$q=mysqli_query($db,"SElECT * FROM donation where volunteerusername='$_SESSION[username]';");
	//$row=mysqli_fetch_assoc($q);
?>

<?php 
if(mysqli_num_rows($q)>0)
{
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
else{
    ?>

	<h2 class="head">You have not distributed any donations yet!!!</h2>
<?php
}
?>
</tbody>
</table>
</div>
</body>
</html>




