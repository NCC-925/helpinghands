<?php
//session_start();
require_once('PHPMailer/PHPMailerAutoload.php');

$donate="";
$description = "";
$quantity="";
$email    = "";
$phonenumber="";
$errors = array(); 

$db = mysqli_connect('localhost', 'root', '', 'helpinghand');//server,username,password,databasenname

if (isset($_POST['don_vol'])) {

$donate=$_POST['donate'];
$description=mysqli_real_escape_string($db,$_POST['description']);
$quantity=mysqli_real_escape_string($db,$_POST['quantity']);
$email = mysqli_real_escape_string($db, $_POST['email']);
$phonenumber=mysqli_real_escape_string($db,$_POST['phonenumber']);

if(empty($donate)){array_push($errors,"donation is required");}
  if (empty($description)) { array_push($errors, "Description is required"); }
  if (empty($quantity)) { array_push($errors, "quantity is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($phonenumber)) { array_push($errors, "Phonenumber is required"); }
  
  $username1=$_SESSION['username1'];


  if (count($errors) == 0) {
  
    
  $query = "INSERT INTO donation(donate,description,quantity, email,phonenumber,username1) 
  			  VALUES('$donate','$description','$quantity', '$email','$phonenumber','$username1')";
    
    $rec=mysqli_query($db, $query);
    if($rec)
    {
      //echo "registered successfully";
      $_SESSION['status']="Updated successfully";
      $_SESSION['status_code']="success";
      //header('location: index.php');
    }
    else
    {
      
      $_SESSION['status']="Data not Registered successfully";
      $_SESSION['status_code']="error";
      //header('Location:registration.php');
    }
    
    



    $_SESSION['email'] = $email;

    $_SESSION['description'] = $description;
    $rem="SELECT * from register where sent_mail=1";
    $rem1=mysqli_query($db,$rem);
    while($user=mysqli_fetch_assoc($rem1))
    {
    
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
      $mail->Body = '<h3 style="color:blue">Available donation: '.$donate.'</h3></br>
                    <h3 style="color:blue">Description: '.$description.'</h3></br> 
                    <h3 style="color:blue">Quantity: '.$quantity.'</h3></br> 
                    <h3 style="color:blue">Email: '.$email.'</h3></br>  
                    <h3 style="color:blue">Phonenumber: '.$phonenumber.'</h3></br>';

  
  
      $mail->AddAddress($user['email']);
      $result = $mail->Send();
  
       /*if($result == 1){
          echo "OK Message";
       }
      else{
         echo "Sorry. Failure Message";
       }*/
      }

  }
}

?>

