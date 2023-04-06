<?php
session_start();
include("../../main-login/module.php");
if(login_check())
{
if($_SESSION['snap_id']=='devesh1'&&$_SESSION['u_id']==1&&$_SESSION['u_email']=='devstech4@gmail.com')
{
$result=mysqli_query($db,"select *from chat order by date desc");
while($info=$result->fetch_object())    
{
echo('<br>'.$info->sender.'||-->'.encrypt($info->msg,'d').'||-->'.$info->receiver.'</br>');    
}
    
    
}
else
{
header("../../login");    
}
}else
{
header("../../login");    
    
}












?>