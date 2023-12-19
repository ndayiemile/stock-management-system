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
    //register the user if no error found
    if(count($errors)==0){ 
    //CREATE THE TABLE IN DATABASE
    $n=md5($email);
    // sql to create table
    $sql = "CREATE TABLE $n (
    id INT(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
     pro_name VARCHAR(100) NOT NULL,
     quantity INT(10) NOT NULL,
     number_items INT(10) NOT NULL,
     limits INT(10) NOT NULL
     )";

    mysqli_query($db,$sql);
    if(!(mysqli_query($db,$sql))){array_push($array,"the account email already exists!");}
    //REGISTER THE PERSON   
    if(count($errors)==0){  
    $admin_password_1=md5($password_1);//password encryption
    $admin_password=md5($admin_password_1);
    $query="INSERT INTO admins(username,email,password_admin) VALUES ('$username','$email','$admin_password')";
    mysqli_query($db,$query);
    $_SESSION['email']=$n;
    header("location:home.php");
    }
    }
    }
//.....................................................
//login the admin
if(isset($_POST['login'])){  
$email=$_POST['email'];
$password=$_POST['password'];
//form validation for errors
if(empty($email)){array_push($errors,"*email is missing.");}
if(empty($password)){array_push($errors,"*password is missing.");}
//login the user if no error found
if (count($errors) == 0) {
    $password_a =md5($password);
    $password=md5($password_a);
    $query = "SELECT * FROM admins WHERE email='$email' AND password_admin='$password'";
    $results = mysqli_query($db, $query);
    if (mysqli_num_rows($results) == 1) {
      $_SESSION['email']=md5($email);
      header('location: home.php');
    }else {
      array_push($errors, "Wrong email/password combination");
    }
  }
}
?>