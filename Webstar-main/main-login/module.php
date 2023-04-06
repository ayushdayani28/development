<?php
//never leave behind 
require('connect.php');
//is_present() checks userid or any other attribute present or not and no. of row it is case sensitive
function is_present($value,$table_name,$attribute,$dba)
{
   $attribute=mysqli_real_escape_string($dba,$attribute); 
 $value=mysqli_real_escape_string($dba,$value); 
 
if(gettype($value)=='integer')
 $sql="select * from ".$table_name." where ".$attribute."=".$value."";
 else
 $sql="select *from {$table_name} where {$attribute}='{$value}'";
 
   $r=mysqli_query($dba,$sql);
   $chk=mysqli_num_rows($r);
  
   return($chk);
}

function getBrowser() 
{ 
    $u_agent = $_SERVER['HTTP_USER_AGENT']; 
    $bname = 'Unknown';
    $platform = 'Unknown';
    $version= "";

    //First get the platform?
    if (preg_match('/linux/i', $u_agent)) {
        $platform = 'linux';
    }
    elseif (preg_match('/macintosh|mac os x/i', $u_agent)) {
        $platform = 'mac';
    }
    elseif (preg_match('/windows|win32/i', $u_agent)) {
        $platform = 'windows';
    }

    // Next get the name of the useragent yes seperately and for good reason
    if(preg_match('/MSIE/i',$u_agent) && !preg_match('/Opera/i',$u_agent)) 
    { 
        $bname = 'Internet Explorer'; 
        $ub = "MSIE"; 
    } 
    elseif(preg_match('/Firefox/i',$u_agent)) 
    { 
        $bname = 'Mozilla Firefox'; 
        $ub = "Firefox"; 
    }
    elseif(preg_match('/OPR/i',$u_agent)) 
    { 
        $bname = 'Opera'; 
        $ub = "Opera"; 
    } 
    elseif(preg_match('/Chrome/i',$u_agent)) 
    { 
        $bname = 'Google Chrome'; 
        $ub = "Chrome"; 
    } 
    elseif(preg_match('/Safari/i',$u_agent)) 
    { 
        $bname = 'Apple Safari'; 
        $ub = "Safari"; 
    } 
    elseif(preg_match('/Netscape/i',$u_agent)) 
    { 
        $bname = 'Netscape'; 
        $ub = "Netscape"; 
    } 

    // finally get the correct version number
    $known = array('Version', $ub, 'other');
    $pattern = '#(?<browser>' . join('|', $known) .
    ')[/ ]+(?<version>[0-9.|a-zA-Z.]*)#';
    if (!preg_match_all($pattern, $u_agent, $matches)) {
        // we have no matching number just continue
    }

    // see how many we have
    $i = count($matches['browser']);
    if ($i != 1) {
        //we will have two since we are not using 'other' argument yet
        //see if version is before or after the name
        if (strripos($u_agent,"Version") < strripos($u_agent,$ub)){
            $version= $matches['version'][0];
        }
        else {
            $version= $matches['version'][1];
        }
    }
    else {
        $version= $matches['version'][0];
    }

    // check if we have a number
    if ($version==null || $version=="") {$version="?";}

    return array(
        'userAgent' => $u_agent,
        'name'      => $bname,
        'version'   => $version,
        'platform'  => $platform,
        'pattern'    => $pattern
    );
} 






function get_client_ip()
{
    $ipaddress='';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
       $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';


$ipaddress=substr($ipaddress, 0, strpos($ipaddress, ","));

    return $ipaddress;
}
// activity start
function activity($id,$act,$db)
{
date_default_timezone_set("Asia/Kolkata");
$ua=getBrowser();
$start  = strpos($ua['userAgent'], '(');
$end    = strpos($ua['userAgent'], ')', $start + 1);
$length = $end - $start;
$ua = substr($ua['userAgent'], $start + 1, $length - 1);
$ip=get_client_ip().$ua;
$d=date("Y-m-d");
$t=date("h:i:sa");
$q="INSERT INTO activity_log (id,activity,ip,time,date) VALUES ('{$id}','{$act}','".$ip."','{$t}','{$d}')";
mysqli_query($db,$q);
}
// activity end

// log_in start
function log_in($uid,$pwd,$db)
{
    
    
if(isset($_SESSION['u_id']))
{
    $error="Location: ../login";
	
return($error);
exit();
}	
$pwd=mysqli_real_escape_string($db,$pwd);
$uid=mysqli_real_escape_string($db,$uid);
$uid=strtolower($uid);
$logged_date=date_create(date("Y-m-d"));

if(empty($uid)||empty($pwd))
{
$error="Location: ../login";
return($error);
}
else
{
    
   
    
    
    
$sql="select *from users where user_email='".$uid."' OR webstar_id='".$uid."'";
$result=mysqli_query($db,$sql);
$chk= mysqli_num_rows($result);
if($chk!=1)
{
$error="Location: ../login";
error_gen("Specified user not was not found.",'login');
return($error);
}
else
{

if($row=mysqli_fetch_assoc($result))
{
login_retry_count($row['webstar_id'],$db);     
$pwdchk=password_verify($pwd,$row['user_pwd']);
if($pwdchk==false){
$error="Location: ../login";
login_retry_insert($row['webstar_id'],$db);
error_gen("Wrong password",'login');
return($error);

}
elseif($pwdchk==true){
    
$_SESSION['u_id']=$row['user_id'];
$_SESSION['snap_id']=$row['webstar_id'];
$_SESSION['u_first']=ucfirst($row['user_first']);
$_SESSION['u_last']=ucfirst($row['user_last']);
$_SESSION['u_email']=$row['user_email'];
$_SESSION['dob']=$row['dob'];
$_SESSION['default_dp']="logged-in/default.png";
$s=$row['user_email'];
login_retry_remove($row['webstar_id'],$db);

if($row['Gender']==0)
{
	$_SESSION['g']='male';
	
}
else{
	
	$_SESSION['g']='female';
}

$_SESSION['login_status']='true';
$id=$_SESSION['u_id'];
$act='logged-in';
activity($id,$act,$db);
$sql="update users set status='online' where user_email='{$s}'";
$result=mysqli_query($db,$sql);
$_SESSION['u_dp']=$row['dp'];
if($_SESSION['u_dp']==NULL)
{
	$_SESSION['u_dp']=$pp="logged-in/default.png";
}


$_SESSION['Logged-date']=$logged_date;
$error="Location: ../login?nav=home	";
return($error);
}	
}
}
}
}
//login end




//sign start
function sign_up($first,$last,$email,$pwd,$gender,$dd,$mm,$yy,$db)
{
//login id check
if(isset($_SESSION['u_id']))
{
$error="location: ../login";
return($error);
exit();
}

//if any empty
if(empty($first)||empty($last)||empty($email)||empty($pwd)||empty($dd)||empty($mm)||empty($yy))
{
$error="you left anything empty";
return($error);
exit();
}


$first=mysqli_real_escape_string($db,$first);
$last=mysqli_real_escape_string($db,$last);
$email=mysqli_real_escape_string($db,$email);
$pwd=mysqli_real_escape_string($db,$pwd);
$gender=mysqli_real_escape_string($db,$gender);
$dd=mysqli_real_escape_string($db,$dd);
$mm=mysqli_real_escape_string($db,$mm);
$yy=mysqli_real_escape_string($db,$yy);
$gender=strtolower($gender);
$first=strtolower($first);
$last=strtolower($last);
$email=strtolower($email);
$hashedpwd=password_hash($pwd,PASSWORD_DEFAULT);

$dob=date_covert($dd,$mm,$yy);
if (time() < strtotime('+13 years', strtotime($dob)))
{
return('You are under 13 years of age!');	
exit();
}


if($dob==false)
{
return('invalid date');	
exit();
}

if($gender=='male')
{
$g=0;
}else if($gender=='female')
{
$g=1;
}else{	
return('invalid gender');
exit();
    }

if($gender=='male')
{
$g=0;
}else if($gender=='female')
{
$g=1;
}else{	
return('invalid gender');
exit();
    }

//checking name
if(!(preg_match("/^[a-zA-Z]*$/",$first)||preg_match("/^[a-zA-Z]*$/",$last)))
{
$error="Enter Valid Name!!";
return($error);
exit();
}
//check email
if(!filter_var($email,FILTER_VALIDATE_EMAIL))
{
$error="Email is invalid";
return($error);
exit();
}

//pwd check
if(strlen($pwd)<8){
$error='Password should contain 8 Character';
return($error);
exit();
}
$sql="select *from users where user_email='$email'";
$result=mysqli_query($db,$sql);
$resultcheck=mysqli_num_rows($result);
//email check
if($resultcheck>0)
{
$error="Email already exist!!";
return($error);
exit();
}

else{
$_SESSION['first']=$first;
$_SESSION['last']=$last;
$_SESSION['email']=$email;
$_SESSION['pwd']=$hashedpwd;
$_SESSION['random']=rand(10000,99999);
$_SESSION['i']=0;
$_SESSION['g']=$g;
$_SESSION['dob']=$dob;

$error="true";
return($error);
exit();
}
}
//sign-in end


//email_sender start
function email_sender($host,$id,$pass,$mail_to,$mail_from,$subject,$mail_body)
{

 require ('email/PHPMailerAutoload.php');
 $mail=new PHPMailer();
 $mail->IsSmtp();
 $mail->SMTPDebug=0;
 $mail->SMTPAuth=true;
 $mail->Host=$host;
 $mail->port=587;
 $mail->SMTPSecure='tls';
 $mail->IsHTML(true);
 $mail->Username=$id;
 $mail->Password=$pass;
 $mail->SetFrom($mail_from);
 $mail->Subject=$subject;
 $mail->Body=$mail_body;
 $mail->AddAddress($mail_to);
 $mail->Debugoutput = 'html';
$j=$mail->Send();
return($j);
}
//checks session
function login_check()
{
if((isset($_SESSION['u_id']))&&(isset($_SESSION['snap_id'])))
{
return(1);
}
else{
    return(0);
}
    
}
//mail-sender end

//error-generator it works only when there is a session
function error_gen($i,$name)
{
    
if(!empty($i))
{
        $_SESSION['.$name.']=$i;
}

    
}




function error_disp($name)
{
    
if(isset($_SESSION['.$name.']))
{
    echo($_SESSION['.$name.']);
session_unset();
session_destroy();
}
    
}

function date_covert($dd,$mm,$yy)
{
if(checkdate($mm,$dd,$yy)==true)
{
	$temp_date=$mm.'-'.$dd.'-'.$yy;
	$ymd = DateTime::createFromFormat('m-d-Y',$temp_date)->format('Y-m-d');
$date=date('Y-m-d',strtotime($ymd));
return($date);
}
else{
	return(false);
}
}

function redirect($loc,$time)
{
echo('
	<script>
setTimeout(function() {
  window.location.href = "'.$loc.'";
}, "'.$time.'");
</script>
	');
exit();	
}


function friend_status($from,$to,$db)
{
	
$add=0;//Add to circle
$request=1;//Request sent
$accept=3;//Accept
$friend=2;//Already friends 

$count=-1;
$query= $db->query("SELECT  status FROM `friend_list` WHERE sender=".$from." and receiver=".$to."");
if($query==FALSE)	
{
exit();	
}
$r=$query->fetch_object();
 $count = $query->num_rows;
if($count==0)
{
$count=0;
}
else
{
$count=$r->status;
}
switch($count)
{
case 0:
$query1= $db->query("SELECT  status FROM `friend_list` WHERE sender=".$to." and receiver=".$from."");	
$r1=$query1->fetch_object();
$count = $query1->num_rows;
if($count==0)
{
$count=0;
}
else
{
$count=$r1->status;
}
switch($count)
{
case 0;	
return($add);
break;
case 1:
return($accept);
break;
case 2:	
return($friend); 	
break;
default:
exit();	
}


break;
case 1:
return($request);
break;
case 2:
return($friend); 
default:
exit();	
}


	
}



function add_friend($from,$to,$ops,$db)
{
		$from=mysqli_real_escape_string($db,$from);
	$to=mysqli_real_escape_string($db,$to);
	$ops=mysqli_real_escape_string($db,$ops);
	$id=substr(md5(time()),0,5).substr(md5($from),0,3);

if(empty($from)||empty($to)||$from==$to)
	{
print("<br>Invalid request</br>");
	}
	else
	{
		
	switch($ops)
	{	
	case 'request':	
	if((friend_status($from,$to,$db))==0)
	{$query1= $db->query("INSERT INTO `friend_list` (id,`sender`, `receiver`, `status`) VALUES ('".$id."','".$from."', '".$to."', '1')");	
	notificaton_sender($from,'Sent you request',$to,'request','',$db);}
exit();    
	 break;
	 case 'remove':
	if((friend_status($from,$to,$db))==2)
$query1= $db->query("DELETE FROM `friend_list` WHERE (sender='".$from."' and receiver='".$to."') OR (sender='".$to."'and receiver='".$from."')");	
exit();
break;	 
case 'accept':
if((friend_status($from,$to,$db))==3)
{$query1= $db->query("update `friend_list` set status=2 where (sender='".$to."' AND receiver='".$from."')");	
notificaton_sender($from,'Accepted your request',$to,'request','',$db);}
exit();
break;

case 'cancel':
if((friend_status($from,$to,$db))==1)
$query1= $db->query("delete from `friend_list` where (sender='".$from."' AND receiver='".$to."')");	
exit();
break;
 

 
	}	

	}
	
}






function put_like($post_id,$user_id,$db)
{
	$post_id=mysqli_real_escape_string($db,$post_id);
	$user_id=mysqli_real_escape_string($db,$user_id);
$sql="SELECT COUNT(post_id) as post_count,id from timeline where post_id='".$post_id."'";
$result=mysqli_query($db,$sql);
if($result==FALSE)	
{
exit();	
}
$count1=$result->fetch_object();
$receiver=$count1->id;
$sql="SELECT COUNT(post_id) as post_count from appreciate where  post_id='".$post_id."' and user_id=".$user_id."";
$result=mysqli_query($db,$sql);
if($result==FALSE)	
{
exit();	
}
$count2=$result->fetch_object();
if($count1->post_count==1&&$count2->post_count==0){
$sql="insert into appreciate (post_id,user_id) values('".$post_id."',".$user_id.")";
$result=mysqli_query($db,$sql);
if($result==FALSE)	
{
exit();	
}

notificaton_sender($_SESSION['u_id'],'Appreciated your post',$receiver,'post',$post_id,$db);
echo('insert');
}
}

function count_like($post_id,$db)
{
	$post_id=mysqli_real_escape_string($db,$post_id);
$sql="SELECT COUNT(post_id) as count_like FROM `appreciate` WHERE post_id='".$post_id."'";
$result=mysqli_query($db,$sql);
$count=$result->fetch_object();
return($count->count_like);
}




function remove_like($post_id,$user_id,$db)
{
	$post_id=mysqli_real_escape_string($db,$post_id);
	$user_id=mysqli_real_escape_string($db,$user_id);
$sql="SELECT COUNT(post_id) as post_count from timeline where post_id='".$post_id."'";
$result=mysqli_query($db,$sql);
$count1=$result->fetch_object();
$sql="SELECT COUNT(post_id) as post_count from appreciate where  post_id='".$post_id."' and user_id=".$user_id."";
$result=mysqli_query($db,$sql);
$count2=$result->fetch_object();

if($count1->post_count==1&&$count2->post_count==1){
$sql="DELETE FROM `appreciate` WHERE user_id=".$user_id." and post_id='".$post_id."';";
$result=mysqli_query($db,$sql);	
$sql="DELETE FROM `notification` WHERE sender=".$user_id." and post_id='".$post_id."'";
$result=mysqli_query($db,$sql);

}
}
function status_like($post_id,$user_id,$db)
{
	$post_id=mysqli_real_escape_string($db,$post_id);
$sql="SELECT COUNT(post_id) as post_count from appreciate where  post_id='".$post_id."' and user_id=".$user_id."";
$result=mysqli_query($db,$sql);
$count1=$result->fetch_object();	
return($count1->post_count);
}


function like_list($post_id,$db)
{
	$post_id=mysqli_real_escape_string($db,$post_id);
	$sql="SELECT concat(u.user_first,' ',u.user_last) as name,u.dp as dp FROM users u,appreciate a WHERE u.user_id=a.user_id and a.post_id='".$post_id."'";
$result=mysqli_query($db,$sql);
	
return($result);
	
}

function dp_load($dp)
{
	if($dp==NULL||$dp==$_SESSION['default_dp'])
	{
		return($_SESSION['default_dp']);
	}
	else
	{
		
		return('logged-in/dp/'.$dp);
	}
	
}


function comment_insert($user_id,$comment,$post_id,$db)
{
	$post_id=mysqli_real_escape_string($db,$post_id);
	$comment=mysqli_real_escape_string($db,$comment);
	$user_id=mysqli_real_escape_string($db,$user_id);
	$comment=htmlspecialchars($comment);
	$comment_id=substr(md5(time()),0,4).substr(md5($_SESSION['snap_id']),0,5);
	$del_id="'".$comment_id."'";
	$sql="SELECT COUNT(post_id) as post_count,id from timeline where  post_id='".$post_id."'";
$result=mysqli_query($db,$sql);
$count1=$result->fetch_object();
$receiver=$count1->id;
if($count1->post_count==1)
{	
$sql="insert into comment (comment_id,user_id,comment,post_id) values('".$comment_id."',".$user_id.",'".$comment."','".$post_id."')";
$result=mysqli_query($db,$sql);
notificaton_sender($_SESSION['u_id'],'Commented on your post',$receiver,'post',$post_id,$db);

return('<div class="alert alert-success fade in">
        <a href="#" onclick="delete_comment('.$del_id.');" class="close" data-dismiss="alert" aria-label="close">Ã</a><img src="'.dp_load($_SESSION['u_dp']).'" class="img-rounded" height="30" width="30">'.$_SESSION['u_first'].' '.$_SESSION['u_last'].'<div class="alert alert-danger" style="word-break:break-all;">'.$comment.'</div></div>');
}

}

function comment_load($post_id,$db)
{
	$post_id=mysqli_real_escape_string($db,$post_id);	
	$sql="SELECT  u.user_id as u_id,c.comment_id as c_id,u.dp as dp,c.comment as comment,u.user_first as first,u.user_last as last from comment c,users u  where  post_id='".$post_id."' and u.user_id=c.user_id and c.view_level=1 order by c.date desc";
$result=mysqli_query($db,$sql);
return($result);
}



function comment_delete($comment_id,$db)
{
	$commet_id=mysqli_real_escape_string($db,$comment_id);	
	$sql="update comment set view_level=0 where user_id=".$_SESSION['u_id']." and comment_id='".$comment_id."'";
$result=mysqli_query($db,$sql);

	$sql="Select post_id from comment where user_id=".$_SESSION['u_id']." and comment_id='".$comment_id."'";
$result=mysqli_query($db,$sql);
$info=$result->fetch_object();
$post_id=$info->post_id;
$sql="DELETE FROM `notification` WHERE sender=".$_SESSION['u_id']." and post_id='".$post_id."'";
$result=mysqli_query($db,$sql);

}








function comment_count($post_id,$db)
{
	$post_id=mysqli_real_escape_string($db,$post_id);	
	$sql="SELECT count(comment) as count_comment FROM `comment` WHERE post_id='".$post_id."' and view_level=1 ";
$result=mysqli_query($db,$sql);
$count=$result->fetch_object();
return($count->count_comment);
}



function notificaton_sender($sender,$content,$user_id,$type,$post_id,$db)
{
	$post_id=mysqli_real_escape_string($db,$post_id);	
	$user_id=mysqli_real_escape_string($db,$user_id);
	$type=mysqli_real_escape_string($db,$type);
$sender=mysqli_real_escape_string($db,$sender);	
$content=mysqli_real_escape_string($db,$content);	
	
	$sql="INSERT INTO `notification` (`sender`, `content`, `user_id`, `type`, `post_id`) VALUES (".$sender.",'".$content."',".$user_id.",'".$type."','".$post_id."');";	
$result=mysqli_query($db,$sql);	
}



function notificaton_load($user_id,$type,$db)
{
		
	$user_id=mysqli_real_escape_string($db,$user_id);
$sql="select concat(u.user_first,' ',u.user_last) as name,u.dp as dp,n.sender,n.content as content,u.user_id as id,n.date as date from users u,notification n where n.user_id=".$user_id." and n.sender=u.user_id and n.type='".$type."' and DATEDIFF(CURDATE(),date)<7 order by date desc";
$result=mysqli_query($db,$sql);	
return($result);
}


function notificaton_count($user_id,$type,$db)
{
		$type=mysqli_real_escape_string($db,$type);
	$user_id=mysqli_real_escape_string($db,$user_id);
$sql="select count(not_id) as counts from notification where user_id=".$user_id." and view_status=1 and type='".$type."'";
$result=mysqli_query($db,$sql);
$info=$result->fetch_object();	
return($info->counts);
}

function notificaton_disable($user_id,$type,$db)
{
			$type=mysqli_real_escape_string($db,$type);
	$user_id=mysqli_real_escape_string($db,$user_id);
$sql="update notification set view_status=0 where user_id=".$user_id." and type='".$type."';";
$result=mysqli_query($db,$sql);

}




function friendship_id($from,$to,$db)
{
if(empty($from)||empty($to))
{
	
	exit();
}	
$query1= $db->query("SELECT  id FROM `friend_list` WHERE sender=".$to." and receiver=".$from."");	
$info=$query1->fetch_object();

if(empty($info->id))
{
$query1= $db->query("SELECT  id FROM `friend_list` WHERE sender=".$from." and receiver=".$to."");	
$info=$query1->fetch_object();
	
if(empty($info->id))
{
	return(0);
}
else
{
	return($info->id);	
}

}
else{
	
return($info->id);	
	
}

}




function friend_list($user_id,$db)
{
$sql="select user_id,concat(user_first,' ',user_last) as name,webstar_id,user_last,dp from users where user_id!=".$user_id."";
$query=$db->query($sql);

while($info=$query->fetch_object()){
$div_id=substr(md5($info->webstar_id),0,7);
$d_id="'".$div_id."'";
switch(friend_status($user_id,$info->user_id,$db))
{case 0://add
	$dp='http://s3.amazonaws.com/37assets/svn/765-default-avatar.png';
$ops='<div id="'.$div_id.'-div_id"><input type="hidden" id="'.$div_id.'-ops" value="request"><input type="hidden" id="'.$div_id.'-to" value="'.$info->user_id.'"><button type="button" onclick="circle('.$d_id.')" class="btn btn-danger">Add to circle</button></div>';
break;
	case 1://request sent
if($info->dp!=NULL)
{$dp='logged-in/dp/'.$info->dp;}
$ops='<div id="'.$div_id.'-div_id"><input type="hidden" id="'.$div_id.'-ops" value="cancel"><input type="hidden" id="'.$div_id.'-to" value="'.$info->user_id.'"><button type="button" onclick="circle('.$d_id.')" class="btn btn-warning">Cancel request</button></div>';
break;
case 2://friend
if($info->dp!=NULL)
{$dp='logged-in/dp/'.$info->dp;}	
	else{$dp='http://s3.amazonaws.com/37assets/svn/765-default-avatar.png';}
$ops='<div id="'.$div_id.'-div_id"><input type="hidden" id="'.$div_id.'-ops" value="remove" ><input type="hidden" id="'.$div_id.'-to" value="'.$info->user_id.'"><button type="button" onclick="circle('.$d_id.')" class="btn btn-danger">Remove from circle</button></div>';
break;
	case 3://Accept
if($info->dp!=NULL)
{$dp='logged-in/dp/'.$info->dp;}	
	else{$dp='http://s3.amazonaws.com/37assets/svn/765-default-avatar.png';}
$ops='<div id="'.$div_id.'-div_id"><input type="hidden" id="'.$div_id.'-ops" value="accept"><input type="hidden" id="'.$div_id.'-to" value="'.$info->user_id.'"><button type="button" onclick="circle('.$d_id.')" class="btn btn-success">Accept request</button></div>';
break;

}
	
echo('<div class="well"><img src="'.$dp.'" class="img-rounded" width="40" height="40"><a href="login?nav=profile&view='.$info->user_id.'"> '.$info->name.'</a><b><font color="red"><hr><br>'.$ops.'</font></b><div class="text-right"><a href="login?nav=chat&chat_area='.encrypt($info->webstar_id,'e').'">Message</a></div></br></div>');
	
	
	}
}







function compress_image($source_url, $destination_url, $quality) 
{

      $info = getimagesize($source_url);

          if ($info['mime'] == 'image/jpeg')
          $image = imagecreatefromjpeg($source_url);

          elseif ($info['mime'] == 'image/gif')
          $image = imagecreatefromgif($source_url);

          elseif ($info['mime'] == 'image/png')
          $image = imagecreatefrompng($source_url);

          imagejpeg($image, $destination_url, $quality);
          return $destination_url;
        }





function encrypt( $string, $action) {
    // you may change these values to your own
    $secret_key = 'ganesh_ji';
    $secret_iv = 'bolo_har_har';
 
    $output = false;
    $encrypt_method = "AES-256-CBC";
    $key = hash( 'sha256', $secret_key );
    $iv = substr( hash( 'sha256', $secret_iv ), 0, 16 );
 
    if( $action == 'e' ) {
        $output = base64_encode( openssl_encrypt( $string, $encrypt_method, $key, 0, $iv ) );
    }
    else if( $action == 'd' ){
        $output = openssl_decrypt( base64_decode( $string ), $encrypt_method, $key, 0, $iv );
    }
 
    return $output;
}







function chat_sender($sender,$msg,$receiver,$db)
{
	if($sender==$receiver)
	{
		return(FALSE);
	}
	
	
			$sender=mysqli_real_escape_string($db,$sender);
	$msg=mysqli_real_escape_string($db,$msg);
	$receiver=mysqli_real_escape_string($db,$receiver);
	$msg=htmlspecialchars($msg);
$msg=encrypt($msg,'e');
	$sql="select count(webstar_id) as counts from users where webstar_id='".$receiver."'";
$result=mysqli_query($db,$sql);
$info=$result->fetch_object();

	if($info->counts==1)
	{
$sql="insert into chat (chat_id,sender,msg,receiver) values('".substr((md5(time()).md5(rand()).md5($receiver)),0,8)."','".$sender."','".$msg."','".$receiver."')";
$result=mysqli_query($db,$sql);
		
		return(TRUE);		
	}else
	{
		
	return(FALSE);	
	}	

}





function chat_display($sender,$receiver,$db)
{
			$sender=mysqli_real_escape_string($db,$sender);
	$msg=mysqli_real_escape_string($db,$receiver);
	$sql="select count(webstar_id) as counts from users where webstar_id='".$receiver."'";
$result=mysqli_query($db,$sql);
$info=$result->fetch_object();

	if($info->counts==1)
	{
	$sql="select msg from chat where  sender='".$sender."' and receiver='".$receiver."' OR sender='".$receiver."' and receiver='".$sender."'";
$result=mysqli_query($db,$sql);
		
		return($result);		
	}else
	{
		
	return(FALSE);	
	}	

}



function chat_list($user_id,$db)
{
$sql="select concat(u.user_first,' ',u.user_last) as name,u.dp as dp,u.webstar_id as id from users u,( (SELECT receiver as list,date FROM `chat` WHERE sender='".$user_id."') UNION (SELECT sender as list,date FROM `chat` WHERE receiver='".$user_id."' order by date desc)) t where t.list=u.webstar_id group by u.webstar_id order by t.date desc";
$result=mysqli_query($db,$sql);
while($info=$result->fetch_object())
{
	$info->dp=dp_load($info->dp);
	$sql="select count(chat_id) as counts from chat where sender='".$info->id."' and receiver='".$_SESSION['snap_id']."' and view_receiver=0";
$count1=mysqli_query($db,$sql)->fetch_object();	
echo('<div class="well"><img src="'.$info->dp.'" class="circle" height="50" width="50"><a href="login?nav=chat&chat_area='.encrypt($info->id,'e').'">'.$info->name.'</a><h3 align="right"><font color="red" size="3">Unread message('.$count1->counts.')</font></h3></div>');	
	
}
echo '<hr>';


	
}



function chat_msg($sender,$receiver,$db)
{
$sql="SELECT sender,receiver,msg,date from chat where sender='".$receiver."' and receiver='".$sender."' or sender='".$sender."' and receiver='".$receiver."' order by date";
$result=mysqli_query($db,$sql);	
while($info=$result->fetch_object())
{
	if($info->sender==$_SESSION['snap_id'])
	{
	$class="success";
$align="text-right";
	}
	else
	{
			$class="danger";
			$div_id="danger";
$align='text-left';	
}

echo('<div class="'.$align.'"><div class="alert alert-'.$class.' fade in fluid" style="word-break:break-all;display:inline-flex;">'.encrypt($info->msg,'d').'<font size="2"><br>('.$info->date.')</font></br></div></div>');	

}	

msg_count_disable($receiver,$db);
}


function live_status_update($db)
{
	
mysqli_query($db,"update users set status=sysdate() where user_id=".$_SESSION['u_id']."");	
	
}

function live_status_show($u_id,$db)
{
	
$sql ="select concat(user_first,' ',user_last) as name,webstar_id as id,dp,hour(timediff(sysdate(),status))as hh, minute(timediff(sysdate(),status)) as mm,second(timediff(sysdate(),status)) as ss from users u,( (SELECT sender as list FROM `friend_list` WHERE receiver=".$u_id." and status=2) UNION (SELECT receiver as list FROM `friend_list` WHERE sender=".$u_id." and status=2) ) t  where t.list=u.user_id order by u.status desc";
$result=mysqli_query($db,$sql);
while($info=$result->fetch_object())
{
if($info->hh==0)	
{
if($info->ss<=10&&$info->mm<1)
{
$status='<h5 align="right"><font color="green">online</font></h5>';	
}
else
{
$status='<h5 align="right"> <font color="red"><span class="glyphicon glyphicon-time"></span></font> last seen :'.$info->mm.'m '.$info->ss.'s ago</h5>';	
}
	
}else
{
	if($info->hh<=2)
$status='<h5 align="right"><font color="red"><span class="glyphicon glyphicon-time"></span></font>last seen :'.$info->hh.'h ago</h5>';
else
$status='';	
}
	
	
echo('<div class="well"><img src='.dp_load($info->dp).' class="img-circle" height="50" width="50"><a href="login?nav=chat&&chat_area='.encrypt($info->id,'e').'">&nbsp'.$info->name.''.$status.'</div>');	
	
}	

} 

function msg_count_disable($sender,$db)
{
	$sql="update chat set view_receiver=1 where view_receiver=0 and sender='".$sender."' and receiver='".$_SESSION['snap_id']."' ";	
$result=mysqli_query($db,$sql);	

	
	
}






function msg_count1($db)
{
$sql="SELECT count(chat_id) as counts FROM `chat` WHERE view_receiver=0 and `receiver`='".$_SESSION['snap_id']."'";	
$result=mysqli_query($db,$sql);	
$info=$result->fetch_object();
if($info->counts==0)
{
return('');	
}
else
return($info->counts);	
}

function login_api_google($email,$db)
{if(!isset($_SESSION['g_mail']))
{
session_unset();
session_destroy();
  header("location: ../login");
  exit();
}  
session_unset();
session_destroy();
session_start();
$sql="select *from users where user_email='".$email."';";
$result=mysqli_query($db,$sql);
$row=mysqli_fetch_assoc($result);
login_retry_remove($row['webstar_id'],$db);
$_SESSION['u_id']=$row['user_id'];
$_SESSION['snap_id']=$row['webstar_id'];
$_SESSION['u_first']=ucfirst($row['user_first']);
$_SESSION['u_last']=ucfirst($row['user_last']);
$_SESSION['u_email']=$row['user_email'];
$_SESSION['dob']=$row['dob'];
$_SESSION['default_dp']="logged-in/default.png";
$s=$row['user_email'];

if($row['Gender']==0)
{
	$_SESSION['g']='male';
	
}
else{
	
	$_SESSION['g']='female';
}

$_SESSION['login_status']='true';
$id=$_SESSION['u_id'];
$act='logged-in through google+';
activity($id,$act,$db);
$sql="update users set status='online' where user_email='{$email}'";
$result=mysqli_query($db,$sql);
$_SESSION['u_dp']=$row['dp'];
if($_SESSION['u_dp']==NULL)
{
	$_SESSION['u_dp']=$pp="logged-in/default.png";
}
$_SESSION['Logged-date']=date('d-m-y');
header("location: ../login?nav=setting");
exit();
}


function login_retry_insert($id,$db)
{
    $ip=get_client_ip();
$sql="insert into retry (id,ip) values('".$id."','".$ip."');";
mysqli_query($db,$sql);
}


function login_retry_count($id,$db)
{
$sql="SELECT count(r_no) as counts,ip,TIMESTAMPDIFF(minute,max(date),NOW()) as diff FROM `retry` WHERE id='".$id."'";
$result=mysqli_query($db,$sql);
$info=$result->fetch_object();

if($info->counts>4)
{
if($info->diff>30)
{
 login_retry_remove($id,$db);
}
else
{
if($info->ip==get_client_ip()){
$diff=30-$info->diff;  
$sql="SELECT user_email as email FROM `users` WHERE webstar_id='".$id."'";
$result=mysqli_query($db,$sql);
$info1=$result->fetch_object();
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$msg="Because of too many attempt of login your webstar id:'".$id."' is blocked for 30 min on ip address:".$info->ip." to report issue email: devesh.tripathi.37@gmail.com";
$body='
<html>
  <body>
  <div class="background-color:red;">
<font color="white">  '.$msg
  .'</font></div>
  </body>
  </html>
  ';
mail($info1->email,"Webstar-Security",$msg,$headers);
error_gen("'".$id."' is blocked for this IP address because of to many attempts.Try after ".$diff." min ",'login');
header('location: ../login');
exit();}
}
    
    
}



}

function login_retry_remove($id,$db)
{
      $sql="delete from retry where id='".$id."'";
$result=mysqli_query($db,$sql);
}
?>
