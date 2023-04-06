<?php
session_start();
include('../main-login/module-design.php');
include('../main-login/module.php');

if(!isset($_SESSION['u_id']))
{
	header("location: login");
	exit();
}
$sql="SELECT t.post_id as post_id,t.date,u.user_id,t.content as content,u.user_first as first,t.attach as attach,u.user_last as last,u.dp from (select user_id,user_first,user_last,dp from users) as u INNER JOIN (select post_id,id,content,date,attach from timeline where id=".$_SESSION['u_id']." OR id in (select receiver from friend_list where sender=".$_SESSION['u_id']." AND status=2 ) OR id in (select sender from friend_list where receiver=".$_SESSION['u_id']." AND status=2)) as t on u.user_id=t.id ORDER BY t.date DESC";
$result=mysqli_query($db,$sql);

if($result==FALSE)	
{

exit();	
}

while($r=$result->fetch_object())
{$r->dp=dp_load($r->dp);
$st=(
status_like($r->post_id,$_SESSION['u_id'],$db));

design_timeline_model($r->post_id,$r->user_id,$r->first,$r->last,$r->dp,$st,count_like($r->post_id,$db),comment_count($r->post_id,$db),$r->content,$r->attach,$r->date);
	
	
}

?>
