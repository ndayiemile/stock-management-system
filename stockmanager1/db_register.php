<?php
$db=mysqli_connect('localhost','root','','stock_db');
if(mysqli_connect_error()){
    echo "there was an error on connecting to the db try again later";
}
if(isset($_POST['save'])){  
$num_pro=$_POST['num_pro'];
for($y=1;$y<=$num_pro;$y++){
    $pro_name=$_POST["pro_name$y"];
    $quantity=$_POST["quantity$y"];
    $query_in="INSERT INTO stock(pro_name,quantity) VALUES ('$pro_name','$quantity')";
    mysqli_query($db,$query_in);
}
header("location:primary.php");
}

//updating the data base
if(isset($_POST['update'])){
    $name=$_POST['product_name'];
$update="SELECT quantity FROM stock WHERE pro_name='$name' LIMIT 1 ";
$update_in=mysqli_query($db,$update);
$value=mysqli_fetch_assoc($update_in);
$new_value=$value['quantity']+$_POST['bought_qnt'];
$new_quantity="UPDATE stock SET quantity=$new_value WHERE pro_name='$name'";
mysqli_query($db,$new_quantity);
header("location:primary.php");
}
?>