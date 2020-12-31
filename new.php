<?php 

session_start(); 

?>

<html>
<head>
<style>

.a{
	margin:0;
	color:black;
	font-size:60px;
	position:absolute;
	top:20%;
	left:50%;
	margin-right:-50%;
	transform:translate(-50%,-50%)
  }
  


.center {
margin:0;
	color:white;
	font-size:60px;
	position:absolute;
	top:60%;
	left:50%;
	margin-right:-50%;
	transform:translate(-50%,-50%)
}

body{
background-color:pink;
}
</style>
</head>
<body>
<?php
$db = mysqli_connect('localhost', 'root', '', 'helpinghand');
mysqli_select_db($db,'donation');

$status=$_POST['status'];

$volunteerusername=$_SESSION['username'];

//include "homeserver.php";
//$res=$_POST['id'];
//echo $res;
//if (isset($_POST['Avail'])){
  if($status=="0"){
  $u= "UPDATE  donation set status=1 where id='$_POST[id]'";
  $t="UPDATE donation set volunteerusername='$volunteerusername' where id='$_POST[id]'";
  $v=mysqli_query($db,$t);

//echo $u;
 // mysqli_query($db,$u);
  //$status=$status+1;
   if( mysqli_query($db,$u)){
      ?>
      <h1 class="a">You can Avail this!!!!</h1>
<img src="Donations20Evenry20little20bit20helps.jpg" alt="Girl in a jacket" width="400" height="300" class="center">

      <?php
   }
   else{
       echo "error";
   }
  }
   else{
          echo "already taken";
   }

?>
</body>
</html>
