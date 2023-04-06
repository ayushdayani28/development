<?php

session_start();
require('main-login/module.php');
require('main-login/module-design.php');
if(login_check())
{
	if(isset($_POST['report_content']))
	{
		$_POST['report_content']=htmlentities(mysqli_real_escape_string($db,$_POST['report_content']));
		$result=mysqli_query($db,"insert into report (sender,content) values(".$_SESSION['u_id'].",'".$_POST['report_content']."')");
		$_SESSION['report_msg']="Feedback has been sent";
	header("location: report");
	}
else{	
design_link();
design_style();
design_header_logged_in($default,dp_load($_SESSION['u_dp']),'',$db);
design_title('Report any thing');
if(isset($_SESSION['report_msg']))
{
echo('<font color="green" size="5">'.$_SESSION['report_msg'].'</font>');
$_SESSION['report_msg']='';	
}
echo('<br><h6 align="center"><font color="red">Design Feedback Please give feedback about our newest designs or Report any about message or any post</font></h6></br>');
echo('<h6 align="center"><form action="report.php" method="post">
<br><textarea name="report_content" class="form-control" rows="4"></textarea><br>
<button class="btn btn-danger btn-lg" id="post" name="report">Feedback</button></br></form></h6></bR>');
	}
}
else
{
	
header("location: login");	
}
?>