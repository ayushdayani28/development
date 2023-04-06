<?php
session_start();
require('../main-login/activity.php');
if(isset($_SESSION['u_id']))
{
$id=$_SESSION['u_id'];
if(isset($_POST['submit']))
{
include_once('connect.php');
$last=mysqli_real_escape_string($db,$_POST['last']);
if(empty($last))
{
	$_SESSION['setting']='Invalid entry';
header('location: ../login.php?nav=setting');
}
else{
if(preg_match("/^[a-zA-Z]*$/",$last))
{
$i=mysqli_query($db,"update users set user_last=lower('$last') where user_id='$id'");
if($i){
$_SESSION["u_last"] = $_POST["last"];
$act='updated last name to '.$last.'';
activity($id,$act,$db);
$_SESSION['setting']='Name changed Successfully!';
header('location: ../login.php?nav=setting');
}


}
else{
	$_SESSION['setting']='Invalid entry';
header('location: ../login.php?nav=setting');
}

}
}
}
else
{
header('location: setting.php?error=1');
}



?>