<?php
 include('../main-login/module.php');
session_start();
 if(isset($_SESSION['u_id']))
 {

if($_SESSION['u_dp']==$_SESSION['default_dp'])
{
$dp=$_SESSION['u_dp'];
}
else
{
$dp='logged-in/dp/'.$_SESSION['u_dp'];
}	
	
if(isset($_POST['content'])&&isset($_FILES['attach']))	
{
$ops=1;	
}elseif(isset($_POST['content']))
{
$ops=2;	
}elseif(isset($_FILES['attach']))
{
$ops=3;	
$_POST['content']='';
}else{
	
	header('location: ../login?nav=home');
	exit();
}
$post_id=substr(md5(time()),0,7).$_SESSION['snap_id'];	

$attach='';	

function img_chk ()
{
	if(($_FILES["attach"]["type"] == "image/gif") ||($_FILES["attach"]["type"] == "image/jpeg") ||($_FILES["attach"]["type"] == "image/png") ||($_FILES["attach"]["type"] == "image/pjpeg")||($_FILES["attach"]["type"] == "image/jpg")) 
 {
				
if(strpos($_FILES["attach"]["type"],".php")||strpos($_FILES["attach"]["type"],".js")||strpos($_FILES["attach"]["type"],".script")||strpos($_FILES["attach"]["type"],".exe"))
{	
return(FALSE);	
}
else
{
return(TRUE);		
}
}else
{
return(FALSE);	
}
}

switch($ops)	
{
case 1:	
$_POST['content']=mysqli_real_escape_string($db,$_POST['content']);
$_POST['content']=htmlspecialchars($_POST['content']);
$attach=substr(md5($post_id),0,7);
if(img_chk())
{
if($_FILES["attach"]["type"] == "image/gif")	
{$ext='.gif';}
else{$ext='.png';}
$attach=$attach.$ext;	
$url=getcwd().'/post_img/'.$attach;	
$q=30;
if($_FILES["attach"]["size"]<100000)
		{
			$q=80;
		}
		
		if($_FILES["attach"]["size"]>1000000)
		{
			$q=20;
		}	
	
compress_image($_FILES["attach"]["tmp_name"], $url,$q);	
}	
else
{
header('location: ../login?nav=home');	
exit();
}
break;
case 2:
$_POST['content']=mysqli_real_escape_string($db,$_POST['content']);
$_POST['content']=htmlspecialchars($_POST['content']);
if(!empty($_POST['content']))
{
break;	
}else
{
header('location: ../login?nav=home');	
exit();	
}	
case 3:	
$attach=substr(md5($post_id),0,7);
if(img_chk())
{
if($_FILES["attach"]["type"] == "image/gif")	
{$ext='.gif';}
else{$ext='.png';}
$attach=$attach.$ext;	
$url=getcwd().'/post_img/'.$attach;	
$q=30;
if($_FILES["attach"]["size"]<100000)
		{
			$q=80;
		}
		if($_FILES["attach"]["size"]>1000000)
		{
			$q=20;
		}	
	if($_FILES["attach"]["size"]>(3*1000000))
	{
	header('location: ../login?nav=home');
	}
compress_image($_FILES["attach"]["tmp_name"], $url,$q);	
}	
else
{
header('location: ../login?nav=home');	
exit();		
}
default:
header('location: ../login?nav=home');
exit();
}	
$result=mysqli_query($db,"insert into timeline (post_id,id,content,attach) values('".$post_id."',".$_SESSION['u_id'].",'".$_POST['content']."','".$attach."')");
$result=mysqli_query($db,"DELETE FROM `timeline` WHERE content='' and attach=''");
header('location: ../login?nav=home');		
}
else
{
header('location: ../login?nav=home');	
}
 ?>