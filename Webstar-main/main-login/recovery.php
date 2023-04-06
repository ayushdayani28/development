<?php
$i=0;
session_start();
require('module.php');
require('module-design.php');
//checking logged-in
if(login_check())
{
    header('location: ../login.php');
    exit();
}

if(isset($_POST['pass'])&&isset($_POST['code'])&&isset($_SESSION['tmp_email']))
{
echo('<title>Account Recovery</title>');
include('head.php');
design_link();
if(strlen($_POST['pass'])<8)
{
echo('<font color="RED"><br>You entered password is less than 8</br></font>');    
exit();    
}
if($_SESSION['code']==$_POST['code'])
{
$sql="Update users set user_pwd='".password_hash($_POST['pass'],PASSWORD_DEFAULT)."' where user_email='".$_SESSION['tmp_email']."'";    
$result=mysqli_query($db,$sql);
email_sender(connect(3),connect(1),connect(2),$_SESSION['tmp_email'],'Webstar','Webstar Acount recovery','You Successfully recovered your Account.');
echo('<font color="red">You Successfully recovered your Account Now goto login page <a href="../login"><u>home</u></a></font>');
session_unset();
session_destroy();
}
else
{
echo('<font color="RED"><br>You entered wrong verification code</br></font>');    
email_sender(connect(3),connect(1),connect(2),$_SESSION['tmp_email'],'Webstar','Webstar Acount recovery','UnSuccessfull Acount recovery because of worng verification code.');
session_unset();
session_destroy();
}
exit();    
}









if(isset($_POST['email']))
{
echo('<title>Account Recovery</title>');
include('head.php');
design_link();
$_POST['email']=strtolower($_POST['email']);
$_POST['email']=mysqli_real_escape_string($db,$_POST['email']);   
$sql="select count(user_id) as counts from users where user_email='".$_POST['email']."'";    
$result=mysqli_query($db,$sql);
$info=$result->fetch_object();
if($info->counts!=1)
{
echo('<br><font color="red" size="3">Email Doesnot exists.</font></br>');    
exit();    
}
echo('<br>A verification code is sent on our email'.$_POST['email'].'</br><form action="recovery.php" method="post"><br><font color="red" size="3">Password should be of 8 character</font></br><br><input type="text" name="code" placeholder="Enter confirmation code"></br>');
echo('<br><input type="password" name="pass" placeholder="Enter password"></br><br><button class="btn btn-danger">Submit</button></br><br></br></form>');  
$_SESSION['tmp_email']=$_POST['email'];
if(!isset($_SESSION['code']))
{$_SESSION['code']=substr(md5(rand(0,99999)).md5(time()).md5($_POST['email']),0,5);}

//email_sender(connect(3),connect(1),connect(2),$_POST['email'],'Webstar','Webstar Acount recovery','Your verification code to reset password is '.$_SESSION['code']);

mail($_POST['email'],'Webstar Acount recovery','Your verification code to reset password is '.$_SESSION['code']);
exit();
}
else
{
header('location: ../login');
exit();    
}





?>