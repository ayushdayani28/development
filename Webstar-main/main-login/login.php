<?php 
session_start();
require('module.php');

if(isset($_POST['login']))
{
    
    if(isset($_POST['uid']) AND isset($_POST['pwd'])AND isset($_POST['login']))
   header(log_in($_POST['uid'],$_POST['pwd'],$db)); 
    else
    header('location: ../login');
    exit();
}
else
{
   header( "Location: ../login.php");
    exit();
}

?>