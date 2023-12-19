<?php
session_start();
$db=mysqli_connect('localhost','root','','stock_db');
if(mysqli_connect_error()){
    echo "there was an error on connecting to the db try again later";
}
if(isset($_POST['stock_updates'])){
$book=$_SESSION['account'];
$item=$_SESSION['number'];

    for($x=1;$x<=$item;$x++){
        $pro_name=$_POST["pro_name$x"];
        $quantity=$_POST["quantity$x"];
        $limit=$_POST["limit$x"];
    $items="UPDATE $book SET pro_name='$pro_name',quantity=$quantity,limits=$limit  WHERE id=$x LIMIT 1";
    $items_update=mysqli_query($db,$items);
    }
}
?>