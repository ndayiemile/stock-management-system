<?php
session_start();
$errors=array();
$email="";
$password="";
$admin_username="";
$db=mysqli_connect('localhost','root','','stock_db');
if(mysqli_connect_error()){
    echo "there was an error on connecting to the database";
    echo "please try ahain later";
}

//register the admin

if(isset($_POST['sinup_admin'])){  
    $username=$_POST['user_name'];
    $email=$_POST['email'];
    $password_1=$_POST['password_1'];
    $password_2=$_POST['password_2'];
    //form validation for errors
    if($password_1!=$password_2){array_push($errors,"*the passwords are not matching.");}
    if(empty($password_1)){array_push($errors,"*the password is missing");}
    if(empty($username)){array_push($errors,"*ADMINISTRATOR name is missing.");}
    if(empty($email)){array_push($errors,"*email is missing.");}
    //check in the database
    $user_check_query = "SELECT * FROM admins WHERE username='$username' OR email='$email' LIMIT 1";
    $result = mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_assoc($result);
    
    if ($user) { // if user exists
      if ($user['username'] === $username) {
        array_push($errors, "Username already exists");
      }
  
      if ($user['email'] === $email) {
        array_push($errors, "email already exists");
      }
    }
    //register the user if no error found
    if(count($errors)==0){ 
    $admin_password_1=md5($password_1);//password encryption
    $admin_password=md5($admin_password_1);
    $query="INSERT INTO admins(username,email,password_admin) VALUES ('$username','$email','$admin_password')";
    mysqli_query($db,$query);
    header("location:primary.php");
    }
    }
//.....................................................
//login the admin
if(isset($_POST['login'])){  
$username=$_POST['username'];
$email=$_POST['email'];
$password=$_POST['password'];
//form validation for errors
if(empty($username)){array_push($errors,"*ADMINISTRATOR name is missing.");}
if(empty($email)){array_push($errors,"*email is missing.");}
if(empty($password)){array_push($errors,"*password is missing.");}
//login the user if no error found
if (count($errors) == 0) {
    $password_a =md5($password);
    $password=md5($password_a);
    $query = "SELECT * FROM admins WHERE email='$email' AND password_admin='$password'";
    $results = mysqli_query($db, $query);
    if (mysqli_num_rows($results) == 1) {
      header('location: primary.php');
    }else {
      array_push($errors, "Wrong email/password combination");
    }
  }
}
?>