<?php
session_start();
require ('../main-login/activity.php');

if(isset($_SESSION['u_id']))
{
$id=$_SESSION['u_id'];
include("connect.php");



if(isset($_POST['submit']))
{
$password=mysqli_real_escape_string($db,$_POST['pass']);
$old_pwd=mysqli_real_escape_string($db,$_POST['old_pass']);

$old_pass="select user_pwd from users where user_id='{$id}'";
$result=mysqli_query($db,$old_pass);
$row=mysqli_fetch_assoc($result);
$pwdchk=password_verify($old_pwd,$row['user_pwd']);
if(!$pwdchk==true){ 
$_SESSION['setting']='Wrong old password';
    header('location: ../login?nav=setting');  
exit();
}

    


if(empty($password))
{
header('location: ../login?nav=setting');
$_SESSION['setting']='Invalid password entry';
}
else{
if(strlen($password)>=8)
{
    $hashedpwd=password_hash($password,PASSWORD_DEFAULT);

$i=mysqli_query($db,"update users set user_pwd='$hashedpwd' where user_id='$id'");
if($i){
$act='updated-password';
activity($id,$act,$db);
header('location: ../login?nav=setting');
$_SESSION['setting']='updated-password Successfully';
exit();
}
else{
  header('location: ../login?nav=setting');
$_SESSION['setting']='Unknown Error in update';  
exit();
    
}
}
else{
header('location: ../login?nav=setting');
$_SESSION['setting']='Enter password more than 8 character';
exit();
}
}
}
}
else
{
header('location: ../login');
exit();
}

?>