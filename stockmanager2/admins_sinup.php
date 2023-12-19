<?php include('admin_engine.php')?>
<html>
<head>
<title>ADMIN LOGIN</title>
<style>
form{
    width:500px;
    border-width:2px;
    border-color:grey;
    margin:0 auto;
    border-style:ridge;
    border-radius:5px;

}
form h2{
    color:black;
    text-align:center;
}
.input_group{
    color:grey;
    background-color:white;
    text-align:center;
    margin:0px 50px 0px 50px;
}
.input_group input{
    outline:none;
    border:0px; 
    border-bottom:1px solid grey;
    width:100%;
    margin-top:10px;
    margin-bottom:5px;
    font-size:15px;
}
.input_group input[type=submit]{
    margin: 0 auto;
    background-color:olive;
    color:wheat;
    padding:10px;
    margin-top:20px;
    width:30%;
    margin-bottom:20px;
}
.input_group input[type=submit]:hover{
    background-color:rgb(61,61,61);
    color:wheat;
    cursor:pointer;
}
.head{
    background-color:olive;
    top:0px;
    padding:5px;
    margin-bottom:30px;
}
form .link{
    text-align:center;
    font-size:20px;
    font-family: monospace;
    color: rgb(255, 136, 0);;


}
form a{
    text-decoration:none;
}
form a .link:hover{
    color:orange;
}
.closing_div{
    height:69px;
    background-color:rgb(139, 185, 79);
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
<?php include('header.html');?>
<form method="post" action="admins_sinup.php">
<div class="head">
<h2>ADMIN SINUP</h2>
<?php include('admin_validation_errors.php');?>
</div>
<div class="input_group">
user name:
<input type="text" name="user_name"/>
</div>
<div class="input_group">
email:
<input type="email" name="email"/>
</div>
<div class="input_group">
password:
<input type="password" name="password_1"/>
</div>
<div class="input_group">
confirm a password:
<input type="password" name="password_2"/>
</div>
<div class="input_group">
<input type="submit" name="sinup_admin" value="SIN UP"/>
</div>
<a href="index.php"><p class="link">login in account</p></a>
</form>
<div class="closing_div">
    <hr/>
    <p>All rights reserved by eng. N @ EMILE.</p>
    <a href="https://www.facebook.com"><p class="lastp">CONTACT ME<p></a>
</div>
</body>
</html>