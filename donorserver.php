<?php
session_start();
require_once('PHPMailer/PHPMailerAutoload.php');

// initializing variables
$name1="";
$username1 = "";
$email1    = "";
$phonenumber1="";
$location1="";
$gender1="";
//$work="";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'helpinghand');//server,username,password,databasenname

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $name1=mysqli_real_escape_string($db,$_POST['name1']);
  $username1 = mysqli_real_escape_string($db, $_POST['username1']);
  $email1 = mysqli_real_escape_string($db, $_POST['email1']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
  $phonenumber1=mysqli_real_escape_string($db,$_POST['phonenumber1']);
  $location1=mysqli_real_escape_string($db,$_POST['location1']);
  if (isset($_POST['gender1']))
  {
  $gender1=$_POST['gender1'];
  }
  //$work=$_POST['work'];

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if(empty($name1)){array_push($errors,"name is required");}
  if (empty($username1)) { array_push($errors, "Username is required"); }
  if (empty($email1)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
    array_push($errors, "The two passwords do not match");}
  if(empty($phonenumber1)){array_push($errors,"Phonenumber is required");}  
  if(empty($gender1)){array_push($errors,'gender is required');}
  //if(empty($work)){array_push($errors,'work is required');}

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM donor WHERE username1='$username1' OR email1='$email1'  LIMIT 1";
  $result = mysqli_query($db, $user_check_query);//mysqli_query('dbconnection','query')
  $user = mysqli_fetch_assoc($result);
  //array => {[0]=>value of id,[1]=>value of username,[2]=>value of email,[3]=>value of password}
  //associcate array {[id]=>value of id,[username]=>valueof username}

  if ($user) { // if user exists
    if ($user['username1'] === $username1) {
      array_push($errors, "Username already exists");
    }

    if ($user['email1'] === $email1) {
      array_push($errors, "email already exists");
      
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database
  	$query = "INSERT INTO donor(name1,username1, email1, password,phonenumber1,location1,gender1) 
  			  VALUES('$name1','$username1', '$email1', '$password','$phonenumber1','$location1','$gender1')";
    $rec=mysqli_query($db, $query);
    if($rec)
    {
      //echo "registered successfully";
      $_SESSION['status']="Registered successfully";
      $_SESSION['status_code']="success";
      //header('location: index.php');
    }
    else
    {
      
      $_SESSION['status']="Data not Registered successfully";
      $_SESSION['status_code']="error";
      //header('Location:registration.php');
    }
    
    
    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'ssl';
    $mail->Host = 'ssl://smtp.gmail.com';
    $mail->Port = '465';
    $mail->isHTML();
    $mail->Username = 'helpinghandsvu@gmail.com';
    $mail->Password = 'helpinghandsgang';
    $mail->SetFrom('helpinghandsvu@gmail.com','Helping Hands');
    $mail->Subject = "Your Registration Successful";
    $mail->Body = '<h3 style="color:blue">Hello '.$username1.'</h3></br>You have succesfully registered';


    $mail->AddAddress($email1);
    $result = $mail->Send();

    /* if($result == 1){
        echo "OK Message";
     }
    else{
       echo "Sorry. Failure Message";
     }*/
    
  	$_SESSION['username1'] = $username1;
    $_SESSION['success'] = "You are now logged in";
  //	header('location: home.php');
  }
}

if (isset($_POST['login_user'])) {
    $username1 = mysqli_real_escape_string($db, $_POST['username1']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
  
    if (empty($username1)) {
        array_push($errors, "Username is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }
  
    if (count($errors) == 0) {
        $password = md5($password);
        $query = "SELECT * FROM donor WHERE username1='$username1' AND password='$password'";
        $results = mysqli_query($db, $query);
        if (mysqli_num_rows($results) == 1) {
        
          $_SESSION['username1'] = $username1;
          $_SESSION['success'] = "You are now logged in";
          header('location: home.php');
        }else {
            array_push($errors, "Wrong username/password combination");
        }
    }
  }

  ?>