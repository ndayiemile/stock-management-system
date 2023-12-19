<?php include('db_register.php');
$table=$_SESSION['email'];
$n_item=$_SESSION['number'];
?>
<html>
<head>
<title>home page</title>
<style>
#updater_form{
width:600px;
background-color:rgb(50,50,50);
float:left;
margin:56px 55px 0px 55px;
padding:20px 50px 20px 50px;
}
.input_div{
align-items:center;
justify-content:center;
display:flex;
}
.input_div input{
width:60px;
height:60px;
text-align:center;
}
h2{
    text-align:center;
}
select{
    padding:10px;
    margin-left:30px;
    border-radius:5px;
}
option{
    font-size:20px;
    padding:10px;
    color:rgb(45,45,45);
}
.update{
    text-align:center;
    height:50px;
    width:100%;
    color:orange;
    margin-top:50px
}
#viewin{
    width:430px;
    float:left;
    margin-top:56px;
    background-color:rgb(50,50,50);
    padding:20px 10px 10px 10px;
}
#viewin h2{
    text-align:center;
}
#viewin table{
    background-color:white;

}
.column_id{
    text-align:center;
}
table, td{    
    border: 1px solid #ddd;
    text-align: left;
}

table {
    border-collapse: collapse;
    width: 100%;
}

th, td {
    padding: 15px;
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
    height:70px;
    background-color:rgb(139, 185, 79);
    width:100%;
    float:left;
    margin-top:30px;
}
.closing_div hr{
background-color:olive;
height:2px;
border-style:ridge;
}
.closing_div p{
    font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
    margin-top:13px;
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
<a href="index.php"><button class="button">LOGIN FOR STOCK MANAGEMENT</button><a>
</div>
<form method="post" action="primary.php" id="updater_form">
<h2>record the out/in take stock as negative or positive respectively.</h2>
<hr/>
<div class="input_div">
<input type="number" name="bought_qnt"/>
<select type="text" name="product_name">
<?php for($z=1;$z<=$n_item;$z++):
 $query_out="SELECT pro_name FROM $table WHERE id=$z LIMIT 1";
 $outcome=mysqli_query($db,$query_out);
 $name=mysqli_fetch_assoc($outcome);
?>
<option><?php echo $name['pro_name']?></option>
<?php endfor ?>
</select>
</div>
<input type="submit" name="update" value="UPDATE" class="update"/>
</form>
<div id="viewin">
<h2>My stock</h2>
<table>
<tr>
<th class="column_id">PRODUCT</th>
<th class="column_id">QUANTITY</th>
</tr>
<?php 
for($u=1;$u<=$n_item;$u++):
    $bd_out="SELECT pro_name,quantity,limits FROM $table WHERE id=$u LIMIT 1";
    $out=mysqli_query($db,$bd_out);
    $data=mysqli_fetch_assoc($out);
?>
<?php

if($data['quantity']<=$data['limits']):?>

<tr style="background-color:red">
<td><?php echo $data['pro_name']?></td>
<td><?php echo $data['quantity']?></td>
</tr>
<?php continue;endif?>
<tr>
<td><?php echo $data['pro_name']?></td>
<td><?php echo $data['quantity']?></td>
</tr>

<?php endfor ?>
</table>
</div>
<?php
$_SESSION['table']=$table;
?>
<div class="closing_div">
    <hr/>
    <p>All rights reserved by eng. N @ EMILE.</p>
    <a href="https://www.facebook.com"><p class="lastp">CONTACT ME<p></a>
</div>
</body>
</html>