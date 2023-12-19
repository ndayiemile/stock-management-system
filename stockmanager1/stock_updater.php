<?php
$db=mysqli_connect('localhost','root','','stock_db');
if(mysqli_connect_error()){
    echo "there was an error in connecting to the database please try again";
}
$number_items="SELECT number_items FROM stock WHERE id=1 LIMIT 1";
$number_items_out=mysqli_query($db,$number_items);
$number_itm=mysqli_fetch_assoc($number_items_out);
$n_item=$number_itm['number_items'];
if(isset($_POST['stock_updates'])){
    for($x=1;$x<=$n_item;$x++){
        $pro_name=$_POST["pro_name$x"];
        $quantity=$_POST["quantity$x"];
    $items="UPDATE stock SET pro_name='$pro_name',quantity=$quantity  WHERE id=$x LIMIT 1";
    $items_update=mysqli_query($db,$items);
    }
}
?>