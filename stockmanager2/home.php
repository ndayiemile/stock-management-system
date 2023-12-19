<?php include('stock_updater.php');
$table=$_SESSION['email'];
$number_items="SELECT number_items FROM $table WHERE id=1 LIMIT 1";
$number_items_out=mysqli_query($db,$number_items);
$number_itm=mysqli_fetch_assoc($number_items_out);
$n_item=$number_itm['number_items'];
$_SESSION['number']=$n_item;
?>
<html>
<head>
<title>ADMIN PAGE</title>
<style>

form{
    margin-top:56px;
    float:left;
    width:800px;
    border-radius:5px;
    background-color:rgb(50,50,50);
    color:orange;
    padding-top:10px;
    padding-bottom:10px;

}
form h3{
    text-align:center;
}
.head{
    text-align:center;
    color:grey;
    font-size:20px;
}
.input_group{
    background-color:white;
    margin:0px 30px 10px 30px;
    color:grey;
    padding-bottom:10px;
}
.pro_name{
    margin-right:50px;
}
.pro_name,.quantity,.limit{
    color:orangered;
  border: 0px;
  border-bottom:3px;
  width:30%;
  outline:none;
  font-size:15px;
}
.limit{
    width:50px;
}
.title{
    padding-top:15px;
    background-image:url('wallpaperflare.com_wallpaper (2).jpg');
    color:white;
    font-size:30px;
    height:150px;
    text-align:center;
}
.button{
border:0px;
background-color:olive;
padding:10px;
}
.button:hover{
    color:wheat;
    cursor:pointer;
}
.aside_div{
    width:fit-content;
    float:left;
    background-color:green;
    margin-left:20px;
    margin-top:56px;
    padding:10px;
}
.aside_div button{
    border:0px;
    background-color:olive;
    color:white;
    width:200px;
    height:50px;
}
.aside_div button:hover{
    color:wheat;
    background-color:rgb(50,50,50);
}

.parent_div{
    width:850px;
    float:left;
    
}
.top{
    text-align:center;
    color:white;
}
#viewin{
    width:430px;
    float:left;
    margin-top:20px;
    background-color:grey;
    padding:20px 10px 10px 10px;
}
#viewin h2{
    text-align:center;
    color:black;
}
#viewin table{
    background-color:white;
    border-collapse: collapse;
    width: 100%;

}
.column_id{
    text-align:center;
}
table, td{    
    border: 1px solid #ddd;
   
}
table td input{
    border:0px;
    text-align: left;
    outline:none;
}
th, td {
    padding: 10px;
}
#viewin .button{
    margin-top:10px;
    margin-left:36%;

}
html,body{
    margin:0px;
    padding:0px;
}
.title{
    padding-top:15px;
    background-image:url('wallpaperflare.com_wallpaper (2).jpg');
    color:white;
    font-size:30px;
    height:150px;
    text-align:center;
}
.title button{
border:0px;
background-color:olive;
padding:10px;
}
.title button:hover{
    color:wheat;
    cursor:pointer;
}
.closing_div{
    height:69px;
    background-color:rgb(139, 185, 79);
    float:left;
    margin-top:10px;
    width:100%;
}
.closing_div hr{
background-color:olive;
height:2px;
border-style:ridge;
}
.closing_div p{
    font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
    margin-top:20px;
    margin-left:30px;
    float:left;
}
.closing_div .lastp{
color:solid black;
float:right;
margin-right:50px;
}
.closing_div .lastp:hover{
color:wheat;
background-color:rgb(50,50,50);
}
</style>
</head>
<body>
<div class="title">
<p>STOCK BOOK</p>
<a href="primary.php"><button class="button">HOME</button><a>
</div>
<div class="parent_div">
<form action="home.php" method="post" style="text-align:center;padding-top:20px;">
<p class="top">NEW DATA ENTRY</p>
Enter the number of products in the stock:<br/><input type="number" name="products" style="text-align:center;margin-top:10px;height:50px;width:70px;"/>
<input type="submit" name="next"  style="text-align:center;margin-top:10px;height:50px;width:70px;color:orange;" value="next"/>
</form>
<form method="post" action="db_register.php">
<h3>Fill the form with the product name and quantity.</h3>
<?php
if(isset($_POST['next'])):
$products=$_POST['products'];
for($i=1;$i<=$products;$i++):
?>
<div class="input_group">
<p class="head">product <?php echo $i?></p>
Product:
<input type="text" name="pro_name<?php echo $i?>" class="pro_name"/>
Quantity:
<input type="number" name="quantity<?php echo $i?>" class="quantity"/>
Limit:
<input type="number" name="limit<?php echo $i?>" class="limit"/>
<hr style="background-color:grey;height:3px;">
</div>
<?php endfor?>
<div style="display:flex;align-items:center;justify-content:center;">
<input type="number" value="<?php echo $products?>" name="num_pro" style="display:none"/>
<?php $_SESSION['account']=$table?>
<input type="submit" name="save" value="SAVE" class="button"/>
</div>
<?php endif?>
</form>
</div>
<form action="home.php" method="post" class="aside_div">
<h3 class="top">OTHER TOOLS</h3>
<button id="delete_records" name="update_records">DELETE RECORDS</button>
<button id="update_records" name="update_records">UPDATE RECORDS</button>
</form>

<?php if(isset($_POST['update_records'])):?>

<form method="post" action="home.php" id="viewin">
<h2>My stock UPDATE</h2>
<table>
<tr>
<th class="column_id">PRODUCT</th>
<th class="column_id">QUANTITY</th>
<th class="column_id">LIMIT</th>
</tr>
<?php 
for($u=1;$u<=$n_item;$u++):
    $bd_out="SELECT pro_name,quantity,limits FROM $table WHERE id=$u LIMIT 1";
    $out=mysqli_query($db,$bd_out);
    $data=mysqli_fetch_assoc($out);
?>
<tr>
<td><input type="text" name="pro_name<?php echo $u ?>" value="<?php echo $data['pro_name']?>" /></td>
<td><input type="number" name="quantity<?php echo $u ?>" value="<?php echo $data['quantity']?>"/></td>
<td><input type="number" name="limit<?php echo $u ?>" value="<?php echo $data['limits']?>"/></td>
</tr>

<?php endfor ?>
</table>
<?php $_SESSION['account']=$table?>
<input type="submit" class="button" value="SAVE CHANGES" name="stock_updates"/>
</form>
<?php endif ?>
<div class="closing_div">
    <hr/>
    <p>All rights reserved by eng. N @ EMILE.</p>
    <a href="https://www.facebook.com"><p class="lastp">CONTACT ME<p></a>
</div>
</body>
</html>