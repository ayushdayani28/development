<?php
session_start();
include '../main-login/module.php';
 if(!isset($_SESSION['u_id']))
 { exit();}

if(isset($_POST['not_request']))
{
echo notificaton_count($_SESSION['u_id'],'request',$db);
exit();
}
if(isset($_POST['not_not']))
{
echo (notificaton_count($_SESSION['u_id'],'post',$db));
exit();
}
if(isset($_POST['not_msg']))
{
echo msg_count1($db);
exit();
}


if(isset($_POST['add_post_id']))
{
put_like($_POST['add_post_id'],$_SESSION['u_id'],$db);
exit();
}
 elseif(isset($_POST['get_post_id'])){
	
	echo(count_like($_POST['get_post_id'],$db));
	
}
elseif(isset($_POST['remove_post_id']))
{
remove_like($_POST['remove_post_id'],$_SESSION['u_id'],$db);
echo($_POST['remove_post_id']);
exit();
}elseif(isset($_POST['comment_post_id'])&&isset($_POST['comment']))
{
	echo comment_insert($_SESSION['u_id'],$_POST['comment'],$_POST['comment_post_id'],$db);

	exit();
}else if(isset($_POST['load_liker']))
{
	$name=like_list($_POST['load_liker'],$db);
	 while($info=$name->fetch_object())
		  {
			  if($info->dp==NULL)
			  {
				$info->dp =$_SESSION['default_dp'];
			  }
			  else{
				$info->dp='logged-in/dp/'.$info->dp; 
				  
			  }
			 echo('<div class="well"><img src="'.$info->dp.'" class="img-rounded" height="30" width="30"> '.$info->name.'</div>');
			 }
}elseif(isset($_POST['load_comment']))
{
	
$result=comment_load($_POST['load_comment'],$db);

echo '<div id="comment-append-'.$_POST['load_comment'].'">';
while($info=$result->fetch_object())
{
	
	
	
	 if($info->dp==NULL)
			  {
				$info->dp =$_SESSION['default_dp'];
			  }
			  else{
				$info->dp='logged-in/dp/'.$info->dp; 
				  }	

	if($info->u_id==$_SESSION['u_id'])
	{
	$info->c_id="'".$info->c_id."'";
	$close='<a href="#" class="close" onclick="delete_comment('.$info->c_id.');" data-dismiss="alert" aria-label="close">×</a>';
	}
else
{
	$close='';
}
	echo('<div class="alert alert-success fade in">'.$close.'
        <img src="'.$info->dp.'" class="img-rounded" height="30" width="30">'.$info->first.' '.$info->last.'<div class="alert alert-danger" style="word-break:break-all;">'.$info->comment.'</div></div>');	
}
echo('</div>');	
exit();
}
elseif(isset($_POST['comment_id']))
{
	comment_delete($_POST['comment_id'],$db);
	
}



?>