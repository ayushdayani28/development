<?php
session_start();
require('../main-login/module.php');

if(isset($_SESSION['u_id'])&&isset($_POST['to'])&&isset($_POST['ops']))
{

add_friend($_SESSION['u_id'],$_POST['to'],$_POST['ops'],$db);
}else
exit();	
?>