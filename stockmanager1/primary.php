<?php include('db_register.php');?>
<html>
<head>
<title>index</title>
<style>
#updater_form{
width:600px;
background-color:grey;
float:left;
margin:30px 55px 0px 55px;
padding:20px 50px 0px 50px;
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
    margin-top:30px;
    background-color:grey;
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
</style>
</head>
<body>
<div class="title">
<p>STOCK BOOK</p>
<a href="home.php"><button>LOGIN FOR STOCK MANAGEMENT</button><a>
</div>
<form method="post" action="primary.php" id="updater_form">
<h2>record the out or in take stock as negative or positive respectively.</h2>
<hr/>
<div class="input_div">
<input type="number" name="bought_qnt"/>
<select type="text" name="product_name">
<?php for($z=1;$z<=10;$z++):
 $query_out="SELECT pro_name FROM stock WHERE id=$z LIMIT 1";
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
for($u=1;$u<=10;$u++):
    $bd_out="SELECT pro_name,quantity FROM stock WHERE id=$u LIMIT 1";
    $out=mysqli_query($db,$bd_out);
    $data=mysqli_fetch_assoc($out);
?>
<?php

if($data['quantity']<=20):?>

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
</body>
</html>