
<?php 

session_start(); 

if (!isset($_SESSION['username3'])) {
	$_SESSION['msg'] = "You must log in first";
	header('location: login.php');
}
if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['username3']);
	header("location: help.php");
}
?>

<html>
<head>
<!-- <link rel="stylesheet" type="text/css" href="style2.css"> -->

<style>
body{
	margin :0;
	padding:0;
	background-image: url('img1.jpg');
	background-repeat: no-repeat;
    background-attachment: fixed;
    background-size:100%;
}
nav{
	width:100%;
	height:10%;
	top:0;
	background:linear-gradient(to top, #33ccff 0%, #cc99ff 100%);
	overflow:hidden;
	position:fixed;
}
ul{
	padding:0;
	margin:0 0 0 150px;
	list-style:none;
}
li{
	float:right;

}
.logo img{
	position:absolute;
	margin-top:0%;
	margin-left:10px;
}
nav a{
	width:100px;
	
	display:block;
	padding:14px 15px;
	text-decoration:none;
	font-family:Arial;
	font-size: 17px;
	color:#f2f2f2;
	text-align:center;
}
nav a:hover{
	background: blue;
	transition:0.5s;
	text-transform:uppercase;
}
.wrapper
	{
		width:1000px;
		margin: 10% auto;
		background-color: #33ccff;
		text-align:center;
		
	}
</style>
</head>
<body>


<nav>
<div class="logo"><img src="alogo1.jpg" width ="65px" align="left"><br>



<ul>

<?php  if (isset($_SESSION['username3'])) : ?>
<li><a href="index.php?logout='1'">Logout</a></li>

<?php endif ?>

</ul>
</nav> 
<h1>Admin page</h1>

<?php
  

  $db = mysqli_connect('localhost', 'root', '', 'helpinghand');

  $q=mysqli_query($db,"SELECT * FROM donation ");
  

  //$row=mysqli_fetch_assoc($q);
?>

<div class="wrapper">
<table width='1000' height='150' border='5' align='center'>


<thead>
<tr>
<th>Date and Time</th>
<th>Donate</th>
<th>Description</th>
<th>Quantity</th>
<th>Email</th>
<th>Phonenumber</th>
<th>Donorusername</th>
<th>Volunteerusername</th>
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
		<td><?php echo $row['username1'];?></td>
		<td><?php echo $row['volunteerusername'];?></td>
		</tr>
		<?php
	}
}
else{
	echo "no record found";

}
?>
</tbody>
</table>
</div>
</body>
</html>





