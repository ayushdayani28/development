<?php
session_start();
require('../main-login/module.php');
if(isset($_SESSION['u_id'])&&(isset($_FILES['file'])))
{
$query= $db->query("select dp from users where user_id=".$_SESSION['u_id'].";");
$r=$query->fetch_object();
$dp=$r->dp;
if($dp!=NULL)///deleting image
{
$delete=getcwd().'/dp/'.$dp;
unlink($delete);
}
$act='Change-avatar';
if ($_FILES["file"]["error"] > 0) 
{
            $error = $_FILES["file"]["error"];
			exit();
		
}
else
if(($_FILES["file"]["type"] == "image/gif") ||($_FILES["file"]["type"] == "image/jpeg") ||($_FILES["file"]["type"] == "image/png") ||($_FILES["file"]["type"] == "image/pjpeg")||($_FILES["file"]["type"] == "image/jpg")) 
 {
				
if(strpos($_FILES["file"]["type"],".php")||strpos($_FILES["file"]["type"],".js")||strpos($_FILES["file"]["type"],".script")||strpos($_FILES["file"]["type"],".exe"))
			{
				header('location: ../login?nav=setting');
			}
			$fname=substr(md5(time()),0,4).substr(md5($_SESSION['snap_id']),0,3);
			$url=getcwd().'/dp/'.$fname.'.png';
			$query= $db->query("update users  set dp='".$fname.".png' where user_id=".$_SESSION['u_id'].";");
			$q=30;
			activity($_SESSION['u_id'],$act,$db);
		if($_FILES["file"]["size"]<100000)
		{
			$q=80;
		}
		
		if($_FILES["file"]["size"]>1000000)
		{
			$q=20;
		}
		
		
            $filename=compress_image($_FILES["file"]["tmp_name"], $url,$q);
			$_SESSION['u_dp']=$fname.'.png';
			header('location: ../login?nav=setting');
			exit();
}
else
{
 header('location: ../login?nav=setting');	
	exit();
}
}
?>