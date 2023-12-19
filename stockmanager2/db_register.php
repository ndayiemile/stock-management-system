<?php
session_start();
$db=mysqli_connect('localhost','root','','stock_db');
if(mysqli_connect_error()){
    echo "there was an error on connecting to the db try again later";
}
$table=$_SESSION['account'];
if(isset($_POST['save'])){  
$num_pro=$_POST['num_pro'];
for($y=1;$y<=$num_pro;$y++){
    $pro_name=$_POST["pro_name$y"];
    $quantity=$_POST["quantity$y"];
    $limit=$_POST["limit$y"];
    $query_in="INSERT INTO $table (pro_name,quantity,limits) VALUES ('$pro_name','$quantity','$limit')";
    mysqli_query($db,$query_in);
}
//saving the number of items
$update="SELECT number_items FROM $table WHERE id=1 LIMIT 1 ";
$update_in=mysqli_query($db,$update);
$value=mysqli_fetch_assoc($update_in);
$new_value=$value['number_items']+$num_pro;
$new_number="UPDATE $table SET number_items=$new_value WHERE id=1 LIMIT 1";
mysqli_query($db,$new_number);
header("location:home.php");
}

//updating the data base
if(isset($_POST['update'])){
    $name=$_POST['product_name'];
$update="SELECT quantity FROM $table WHERE pro_name='$name' LIMIT 1 ";
$update_in=mysqli_query($db,$update);
$value=mysqli_fetch_assoc($update_in);
$new_value=$value['quantity']+$_POST['bought_qnt'];
$new_quantity="UPDATE $table SET quantity=$new_value WHERE pro_name='$name'";
mysqli_query($db,$new_quantity);
header("location:primary.php");
}
?>