<?php
session_start();
require('../main-login/module.php');

if(login_check())
{
$id=$_SESSION['u_id'];

if(isset($_POST['submit']))
{
$first=strtolower(mysqli_real_escape_string($db,$_POST['first']));
if(empty($first))
{
$_SESSION['setting']='Invalid name';
header('location: ../login.php?nav=setting');
}
else{
if(preg_match("/^[a-zA-Z]*$/",$first))
{
	
$i=mysqli_query($db,"update users set user_first='".$first."' where user_id=".$id."");
if($i){
$_SESSION["u_first"] = $first;
$act='updated-first name to '.$first;
activity($id,$act,$db);
$_SESSION['setting']='Name changed Successfully!';
header('location: ../login.php?nav=setting');

exit();
}


}
else{
$_SESSION['setting']='Invalid Entry';
header('location: ../login.php?nav=setting');
exit();
}
}
}
}
else
{
header('location: ../login.php');
exit();
}



?>