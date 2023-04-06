<?php
session_start();
include('main-login/module.php');
include('main-login/module-design.php');
if(login_check())
{
	
if(isset($_POST['msg_content'])&&isset($_POST['msg_id']))
{
    if($_POST['msg_content']==' ')
    {
    
    }
	else
	{chat_sender($_SESSION['snap_id'],$_POST['msg_content'],encrypt($_POST['msg_id'],'d'),$db);}
chat_msg($_SESSION['snap_id'],encrypt($_POST['msg_id'],'d'),$db);
	
	exit();
}
	
	
if(isset($_POST['msg_id']))
{
	chat_msg($_SESSION['snap_id'],encrypt($_POST['msg_id'],'d'),$db);
	exit();
}	
	
if(isset($_POST['status']))
{
	chat_msg($_SESSION['snap_id'],encrypt($_POST['msg_id'],'d'),$db);
	
	exit();
}	
	
	
	
if(isset($_POST['online_status_update']))	
{
live_status_update($db);	
exit();
}	

if(isset($_POST['online_friend_list']))	
{
live_status_show($_SESSION['u_id'],$db);	
exit();
}

	
	
if(isset($_GET['live']))	
{
	design_link();
design_style();
design_title('Online');
$link='main-login/search_ajax.php';
design_header_logged_in($default,dp_load($_SESSION['u_dp']),$link,$db);
echo('<head><script src="main-login/chat_ajax.js"></script></head><ul class="nav nav-tabs">
  <li><a href="login?nav=chat&chat_area=list">Recent chat</a></li>
 <li class="active"><a href=""><font color="red">Online friends</font></a></li>
  </ul>
<br><div id="online_status">');
live_status_show($_SESSION['u_id'],$db);	
echo('</div></br>');

exit();
}
	
	
}
else
{
header('location: login.php');	
}

?>
