<?php
session_start();
require('module.php');

if(login_check())
{
header("location: ../login");
exit();
}


if(isset($_POST['submit'])&&isset($_POST['first'])&&isset($_POST['last'])&&isset($_POST['email'])&&isset($_POST['pwd'])&&isset($_POST['gender'])&&isset($_POST['day'])&&isset($_POST['month'])&&isset($_POST['year']))
{
    
$result=sign_up($_POST['first'],$_POST['last'],$_POST['email'],$_POST['pwd'],$_POST['gender'],$_POST['day'],$_POST['month'],$_POST['year'],$db);
if($result=='true')
{
  header("location: email-verification");
}
else{
     header("location: ../signup");
     error_gen($result,'signup');
     
     exit();
 }
}
else{
    
    header("location: ../signup"); 
exit();
}
exit();
?>