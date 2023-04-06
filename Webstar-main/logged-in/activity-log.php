<?php
ob_start();
session_start();
include("connect.php");
if(isset($_SESSION['u_id']))
{
$uid=$_SESSION['u_id'];
$dp=$_SESSION['u_dp'];
if($dp)
{
$pp='"dp/'.$dp.'"';
}
else{
$pp='"http://s3.amazonaws.com/37assets/svn/765-default-avatar.png"';
}
?>
<meta charset="utf-8">
<link rel='icon' type="image/jpg" href="../main-login/ico.jpg"/ > </link>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<div class="containe">
  <div style="margin-top:0%;background:#5cb85c;">
<style>
.center {
background-color: ;  
    text-align: center;
    border: 0px solid green;
       width:60%;
height:10%;
margin: auto;
padding:0px;
left:-10%;
 margin-top:2%;
border-radius: 25px;   
    
     
}
.title{
border-radius: 25px;        
background-color: #f44336;

}

</style>
<?php

echo('
<div class="container">
<div class="row">
<div class="col-sm-4" style="background-color:;">
<font size="5" class="font" color="white"><b> &nbsp; &nbsp; &nbsp;Snaprap</b></font></div>
<div class="col-sm-4" style="background-color:;">
</div>
<div class="col-sm-4" style="background-color:;">
<span style="float:right;">
<img src='.$pp.' class="img-circle" alt="Cinque Terre" width="40" height="40">
<form action="../main-login/logout.php" method="POST">
<button type="submit" name="submit"><font size="1">logout</font></button>
</form>
</span>

</img></div>
 </div>
</div>
</div>
');
$q="select *from activity_log where id='{$uid}' ORDER by act_no DESC";
$q1=mysqli_query($db,$q);
echo('<div class="list-group">
  <a href="#" class="list-group-item active">Activity-Log</a>');
while($r=$q1->fetch_object())
{
$act=$r->activity;
$time=$r->time;
$date=$r->date;
$ip=$r->ip; 
$act='you '.$act.' on '.$time.' '.$date.' from ipaddress '.$ip;
echo('<a href="#" class="list-group-item"><font color="red">'.$act.'</font><a>');
}
echo('</div>');
}
else{
header('../login.php');
}
?>