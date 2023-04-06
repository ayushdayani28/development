<?php

session_start();
require('main-login/module.php');
require('main-login/module-design.php');
if(login_check())
{
if(isset($_POST['ano_id'])&&isset($_POST['ano_content'])&&isset($_POST['ano_send'])&&isset($_POST['id']))
{
$_POST['ano_id']=mysqli_real_escape_string($db,$_POST['ano_id']);	
$_POST['ano_id']=encrypt($_POST['ano_id'],'d');
if(is_present($_POST['ano_id'],'users','webstar_id',$db)&&is_present($_POST['id'],'users','user_id',$db))
{
$_POST['ano_content']=htmlentities(mysqli_real_escape_string($db,$_POST['ano_content']));
$ano_id=substr(md5(time().md5($_SESSION['snap_id'])),0,8);
$result=mysqli_query($db,"insert into ano_message (ano_id,sender,content,reciever) values('".$ano_id."','".$_SESSION['snap_id']."','".$_POST['ano_content']."','".$_POST['ano_id']."')");
$_SESSION['ano_status']="Your message is submitted!!";
notificaton_sender($_SESSION['u_id'],'someone sent you anonymous message',$_POST['id'],'post',$ano_id,$db);
header("location: login?nav=profile&view=".$_POST['id']);
}	
else
{
echo('In valid entry developer is reported');
}
}	
else{
design_link();
design_style();
design_header_logged_in($default,dp_load($_SESSION['u_dp']),'',$db);
design_title('Anonymous');
if(isset($_GET['link']))
{
switch($_GET['link'])
{
case 'sent':
echo('<div class="header"><font color="green" size="3"><a href="anonymous_message?link"> Go back</a></font><font color="red" size="3"><br>Message sent by you</br></font></div>');
$result=mysqli_query($db,"select content,date from ano_message where sender='".$_SESSION['snap_id']."'");

while($info=$result->fetch_object())
{
echo('<div class="well"><font color="red">You sent-></font>"'.$info->content.'" on '.$info->date.'</div>');	
}
exit();
case 'taken':
echo('<div class="header"><font color="green" size="3"><a href="anonymous_message?link"> Go back</a></font><font color="red" size="3"><br>Recieved anonymous message</br></font></div>');
$result=mysqli_query($db,"select content,date from ano_message where reciever='".$_SESSION['snap_id']."'");
$i=0;
while($info=$result->fetch_object())
{
echo('<div class="well"><font color="red">Some sent you-></font>"'.$info->content.'" on '.$info->date.'</div>');	
$i=1;
}
if($i==0)
{
echo('Empty');	
}
exit();
default:
echo('<div class="well"><script type="text/javascript" language="javascript">
      var aax_size="728x90";
      var aax_pubname = "devesh3701-21";
      var aax_src="302";
    </script>
    <script type="text/javascript" language="javascript" src="https://c.amazon-adsystem.com/aax2/assoc.js"></script></div>');
echo('<div class="well"><a href="anonymous_message?link=sent"><font color="red">Sent message</font></a></div>');
echo('<div class="well"><a href="anonymous_message?link=taken"><font color="red">Recieved anonymous message</font></a></div>');
echo('<div class="well"><script type="text/javascript" language="javascript">
      var aax_size="728x90";
      var aax_pubname = "devesh3701-21";
      var aax_src="302";
    </script>
    <script type="text/javascript" language="javascript" src="https://c.amazon-adsystem.com/aax2/assoc.js"></script></div>');
exit();
}	
	
}
else
{
redirect('anonymous_message?link','1');
}
}
}
else
{
	
header("location: login");	
}
?>