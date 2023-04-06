<?php
require('main-login/module-design.php');
$id=$_SESSION['u_id'];
$name=$_SESSION['u_first'];
$dp=$_SESSION['u_dp'];
$email=$_SESSION['u_email'];
design_link();
design_style();
design_icon('main-login/ico.png');
live_status_update($db);
echo('<noscript><meta http-equiv="refresh" content="5000;url=error.html"></noscript>');
if($dp)
{
$dp='"logged-in/dp/'.$dp.'"';
}
else
{
$dp='"https://content.invisioncic.com/Mevernote/set_resources_3/84c1e40ea0e759e3f1505eb1788ddf3c_default_photo.png"';
}
live_status_update($db);
$link='main-login/search_ajax.php';
design_header_logged_in($default,$dp,$link,$db);
if(!isset($_GET['nav']))
{
redirect('login.php?nav=home','0');
exit();	
}

echo('<body  bgcolor="#e6ecf0">');



switch($_GET['nav'])
{
case 'home': /////////////////////////////////////////home1
design_title('home');
$dp=dp_load($_SESSION['u_dp']);
echo('<head><script src="main-login/ajax.js"></script></head><div class="col-sm-7">
    
      <div class="row">
        <div class="col-sm-12">
          <div class="panel panel-default text-left">
            <div class="panel-body">
              <p contenteditable="true"><textarea type="text" class="form-control" id="content" rows="4" placeholder="Update Timeline"></textarea></p>
              <button  class="btn btn-danger btn-lg" id="post"><span class="glyphicon glyphicon-send"></span></button>
<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#Post"><span class="glyphicon glyphicon-picture"></span> </button>			  
            </div>
          </div>
        </div>
      </div>');


echo('<div id="Post" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Update Timeline</h4>
      </div>
      <div class="modal-body">
         <form action="logged-in/timeline_ajax.php" method="post" enctype="multipart/form-data">
		 <div class="text-center"><font color="red">Captions</font></div>
		     <p contenteditable="true"><textarea type="text" class="form-control" id="content" name="content" rows="4"></textarea></p>
<br><input type="file" name="attach" class="btn btn-primary"></br>
<br><input type="submit" class="btn btn-danger" ></br>
</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


');	  
 
echo('<div id="timeline">');
echo('</div>');

break;
//settings 2
case 'setting':
design_title('Settings');
$uid=$_SESSION['u_id'];
$snapid=$_SESSION['snap_id'];
$fname=$_SESSION['u_first'];
$last=$_SESSION['u_last'];
$email=$_SESSION['u_email'];
$g=$_SESSION['g'];
if($_SESSION['u_dp']==$_SESSION['default_dp'])
$dp=$_SESSION['u_dp'];
else
$dp='logged-in/dp/'.$_SESSION['u_dp'];
	
$pwd_last=mysqli_query($db,"SELECT max(date) as date FROM `activity_log` WHERE act_no=".$uid." and activity='updated-password'");
$r=$pwd_last->fetch_object();
if($r->date==NULL)
{
$r->date='Not updated yet';
}



echo('<style>
.center {
background-color: ;  
    text-align: center;
    border: 0px solid green;
       width:75%;
height:10%;
margin: auto;
padding:0px;
left:-10%;
 margin-top:2%;
border-radius: 25px;   
    
     
}
.title{
border-radius: 25px;        
background-color: #f44336;

}

</style>');

if(isset($_SESSION['setting']))
{
	echo('<font color=red>'.$_SESSION['setting'].'</font>');
$_SESSION['setting']='';
}


echo(' 
  <h6 align="center"><br><img src="'.	$dp.'" class="img-circle" alt="'.$_SESSION['u_first'].'" width="150" height="150" align="center"> 
<!--avater model-->
  <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
  
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
	<button type="button" class="close" data-dismiss="modal">&times;</button>
	<h4 class="modal-title">Change Avatar</h4>
<br><div style="background-color:;align:center;" class="rounded" ><b><font color="white">Change Avatar</font></b></div>

<form action="logged-in/dpupload.php" method="post" enctype="multipart/form-data">
<br><input type="file" name="file" class="btn btn-primary"  ></br>
<br><input type="submit"class="btn btn-danger" ></br>
</form>    </div>
  </div>
  </br>
</div>
<!--avater model-->

<!--name model-->
  <div class="modal fade bs-example-modal-sm-name" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
  
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
	<button type="button" class="close" data-dismiss="modal">&times;</button>
	<h4 class="modal-title">Change Avatar</h4>
<br><div style="background-color:;align:center;" class="rounded" ><b><font color="white">Change name</font></b></div>
<div style="background-color:red;align:center;" class="rounded" ><b><font color="white">Change First name</font></b></div>

<form action="logged-in/changefname.php" method="post">
<br><input type="Input" name="first" ></br>
<br><input type="submit" class="btn btn-danger" name="submit" ></br>
</form>   

<br><div style="background-color:red;align:center;" class="rounded" ><b><font color="white">Change Last name</font></b></div>

<form action="logged-in/changelname.php" method="post">
<br><input type="Input" name="last"></br>
<br><input type="submit" class="btn btn-danger" name="submit"></br>
</form>   
</div> </div>
  </div>
  </br>
</div>
<!--name model-->  
  <!--pass-->
 <div class="modal fade bs-example-modal-sm-pass" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
  
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
	<button type="button" class="close" data-dismiss="modal">&times;</button>
	<h4 class="modal-title">Change Password</h4>
<br><div style="background-color:;align:center;" class="rounded" ><b><font color="white">Change password</font></b></div>

<form action="logged-in/change-password.php" method="post">
    <br><font color="green"><b>Old password:</font></b></br>
<br><input type="password" name="old_pass" ></br>
<br><font color="green"><b>New password:</font></b></br>
<br><input type="password" name="pass" ></br>
<br><input type="submit" class="btn btn-danger" name="submit" ></br>
</form>   
  
 </div>
  </div>
  </br>
</div>



<br><h6 align="center"><button type="button" class="btn btn-danger" data-toggle="modal" data-target=".bs-example-modal-sm">Change Avatar </button></h6></div></br>
  </h6>
<div class="center" style="">
  <br><div class="list-group">
  
    <a href="#" class="list-group-item active">Update your profile</a>
    <a href="#" class="list-group-item">Name: <font color="red">'.$_SESSION['u_first'].' '.$_SESSION['u_last'].'</font>
	<button type="button" class="btn btn-danger" data-toggle="modal" data-target=".bs-example-modal-sm-name">Update name </button>
	</a>
	  <a href="#" class="list-group-item">Webstar id:&nbsp&nbsp&nbsp&nbsp&nbsp<font color="red">'.$_SESSION['snap_id'].'</font>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
	  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
	  </a>
    <a href="#" class="list-group-item">Password:<font color="red">'.$r->date.'</font> <button type="button" class="btn btn-danger" data-toggle="modal" data-target=".bs-example-modal-sm-pass">Change Password</button></a>
 
    <a href="#" class="list-group-item">DOB:<font color="red">'.$_SESSION['dob'].'</font></a>
	<a href="#" class="list-group-item">Email:<font color="red">'.$_SESSION['u_email'].'</font></a>
	<a href="#" class="list-group-item">Gender:<font color="red">'.$_SESSION['g'].'</font></a>
 </div>
 </br>
  </div>


  
  ');
break;
///search 3
case 'search';
design_title('Search');
echo('<style>
.center {
background-color: ;  
    text-align: center;
    border: 0px solid green;
       width:75%;
height:10%;
margin: auto;
padding:0px;
left:-10%;
 margin-top:2%;
border-radius: 25px;   
    
     
}
.title{
border-radius: 25px;        
background-color: #f44336;

}

</style>');
echo('
<script src="main-login/ajax.js">

</script>

<script>
function getStates(value)
{
	$.post("main-login/search_ajax.php",{partialState:value},function(data){
		$("#results").html(data);
	});
if(value==""){
 $("#friendlist").show();
}
else{
	$("#friendlist").hide();
	
}
}
</script>

<br><input type="text" id="searchinput" onkeyup="getStates(this.value);" placeholder="Search for names.." title="Type in a name"></br>
<div id="results" style=""></div>
</div>
<div id="friendlist">

');


friend_list($_SESSION['u_id'],$db);

echo'</div>';

exit();

case 'profile':
//if(!isset($_GET['view'])) 4


switch($_GET['view'])
{
case 'self':
design_title($_SESSION['u_first']);
require('logged-in/profile/own_profile.php');
break;
default:
require('logged-in/profile/other_profile.php');
break;
}

exit();
/////////////////////////////////////////////////////requests
case 'request':
design_title('Requests');
echo'<script src="main-login/ajax.js"></script>';
$result=notificaton_load($_SESSION['u_id'],'request',$db);

if(mysqli_num_rows($result)==0)
{
		echo('<div class="text-center"><b><font color="red">No Requests</b></font></div>');
		
	exit();
}
	
	while($info=$result->fetch_object())
	{
		
if($info->content=='Accepted your request')		
{

	echo('<div class="well"><img src="'.dp_load($info->dp).'" class="img-rounded" width="40" height="40"><a href="login?nav=profile&view='.$info->id.'"> '.$info->name.'</a><b><hr><font color="Green"><br>'.$info->content.' on ('.$info->date.')</br></font></b><hr></div>');
}
		
		
if(friend_status($_SESSION['u_id'],$info->id,$db)==3)		
{$i=1;
	$div_id=friendship_id($_SESSION['u_id'],$info->id,$db);
	$d_id="'".$div_id."'";
$ops='<div id="'.$div_id.'-div_id"><input type="hidden" id="'.$div_id.'-ops" value="accept">
<input type="hidden" id="'.$div_id.'-to" value="'.$info->id.'">
<button type="button" onclick="circle('.$d_id.')" class="btn btn-success">Accept request</button></div>';
	
echo('<div class="well"><img src="'.dp_load($info->dp).'" class="img-rounded" width="40" height="40"><a href="login?nav=profile&view='.$info->id.'"> '.$info->name.'</a><b><font color="red">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$info->content.' on ('.$info->date.')</font></b><hr>'.$ops.'</div>');
	}
	}
	
	
notificaton_disable($_SESSION['u_id'],'request',$db);

exit();

case 'notificaton':///////////////////////////////////////notificaton
design_title('Notification');
echo'<script src="main-login/ajax.js"></script>';

$result=notificaton_load($_SESSION['u_id'],'post',$db);
if(mysqli_num_rows($result)==0)
{
		echo('<div class="text-center"><b><font color="red">No Notifications</b></font></div>');
		
	exit();
}
while($info=$result->fetch_object())
	{   
		if($info->id==$_SESSION['u_id'])
		{
			$info->name='<b>You</b>';
		}
		if($info->content=='someone sent you anonymous message')
		{
		echo('<div class="well"><a href="anonymous_message?link=taken"><img src="'.dp_load('').'" class="img-rounded" width="40" height="40"> Anonymous<b><font color="red"><hr><br>'.$info->content.' on ('.$info->date.')</br></font></b></a></div>');
		continue;
		}
echo('<div class="well"><img src="'.dp_load($info->dp).'" class="img-rounded" width="40" height="40"><a href="login?nav=profile&view='.$info->id.'"> '.$info->name.'</a><b><font color="red"><hr><br>'.$info->content.' on ('.$info->date.')</br></font></b></div>');		
	
	}
	
notificaton_disable($_SESSION['u_id'],'post',$db);
exit();
case 'chat'://////////////////chat
design_title('chat');
if(!isset($_GET['chat_area']))
{
	redirect('login?nav=chat&chat_area=list',1);
}
	
switch($_GET['chat_area'])
{
case 'list':
echo('<ul class="nav nav-tabs">
  <li class="active"><a href=""><font color="red">Recent chat</a></font></li>
 <li ><a href="chat_session.php?live">Online friends</a></li></ul>');
chat_list($_SESSION['snap_id'],$db);
break;
default:
$result=mysqli_query($db,"SELECT concat(user_first,' ',user_last) as name,dp from users where webstar_id='".$id=encrypt($_GET['chat_area'],'d')."'");
$info=$result->fetch_object();
if($info->name!=NULL)	
{
echo'<a href="login?nav=chat&&chat=list"><font color="red"><b>< Go back</b></font></a><div class="text-center"><img src="'.dp_load($info->dp).'" class="img-circle" height="40" width="40">'.ucwords($info->name).'</div><hr>

<div id="msgarea" style="height:275px;width:100%;border:solid 2px white;overflow:scroll;overflow-x:hidden;overflow-y:scroll;">

</div>
<br><input id="refer" type="hidden" value="'.$_GET['chat_area'].'"><form action="javascript:msg_send();"><input type="text"  id="chat_content" row="4" class="form-control"></textarea><hr><div align="center"><input class="btn btn-danger" type="submit" value="Send" ></form></div></br>
<script src="main-login/chat_ajax.js"></script>
';	




}
else
{
redirect('login?nav=chat&chat_area=list',1);
exit();	
}
break;
}
break;
default:
redirect('login?nav=home',1);
}
exit();









?>
