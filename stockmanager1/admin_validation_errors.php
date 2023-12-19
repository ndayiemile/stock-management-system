
<?php if(count($errors)>0):?>
<div style="background-color: rgb(190, 64, 64);padding-bottom:10px";>
<h4 style="color:orange;text-align:center;">correct the following errors errors to login</h4>
<?php foreach($errors as $error):?>
<p  style="margin-left:50px;"><?php echo $error?></p>
<?php endforeach ?>
</div>
<?php endif ?>