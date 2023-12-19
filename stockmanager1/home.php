<?php include('stock_updater.php');?>
<html>
<head>
<style>
form{
    margin-top:10px;
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
.pro_name,.quantity{
    color:orangered;
  border: 0px;
  border-bottom:3px;
  width:30%;
  outline:none;
  font-size:15px;
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
    margin-top:10px;
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
    margin-top:30px;
    background-color:grey;
    padding:20px 10px 10px 10px;
}
#viewin h2{
    text-align:center;
    color:black;
}
#viewin table{
    background-color:white;

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
table {
    border-collapse: collapse;
    width: 100%;
}

th, td {
    padding: 15px;
}
#viewin .button{
    margin-top:10px;
    margin-left:36%;

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
<hr style="background-color:grey;height:3px;">
</div>
<?php endfor?>
<div style="display:flex;align-items:center;justify-content:center;">
<input type="number" value="<?php echo $products?>" name="num_pro" style="display:none"/>
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
</tr>
<?php 
for($u=1;$u<=10;$u++):
    $bd_out="SELECT pro_name,quantity FROM stock WHERE id=$u LIMIT 1";
    $out=mysqli_query($db,$bd_out);
    $data=mysqli_fetch_assoc($out);
?>
<tr>
<td><input type="text" name="pro_name<?php echo $u ?>" value="<?php echo $data['pro_name']?>" /></td>
<td><input type="number" name="quantity<?php echo $u ?>" value="<?php echo $data['quantity']?>"/></td>
</tr>

<?php endfor ?>
</table>
<input type="submit" class="button" value="SAVE CHANGES" name="stock_updates"/>
</form>
<?php endif ?>
</body>
</html>