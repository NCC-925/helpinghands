<?php
session_start();

$username3="";
$password="";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'helpinghand');




if (isset($_POST['login_user'])) {
    $username3 = mysqli_real_escape_string($db, $_POST['username3']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
  
    if (empty($username3)) {
        array_push($errors, "Username is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }
  
    if (count($errors) == 0) {
        $password = ($password);
        $query = "SELECT * FROM admin WHERE username3='$username3' AND password='$password'";
        echo $query;
        $results = mysqli_query($db, $query);
        if (mysqli_num_rows($results) == 1) {
        
          $_SESSION['username3'] = $username3;
          $_SESSION['success'] = "You are now logged in";
          header('location: adminindex.php');
        }else {
            array_push($errors, "Wrong username/password combination");
        }
    }
  }

  ?>