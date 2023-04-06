<?php
session_start();
require('module.php');
require('module-design.php');
if(login_check())
{
header("location: ../login");
exit();
}
if(!isset($_SESSION['random']))
{
redirect('../signup.php','0');
exit();
}
$first=$_SESSION['first'];
$last=$_SESSION['last'];
$mail_to=$_SESSION['email'];
$hashedpwd=$_SESSION['pwd'];
$random=$_SESSION['random'];
$i=$_SESSION['i'];
$g=$_SESSION['g'];
$dob=$_SESSION['dob'];
design_title('email-verification');
design_link();
design_style();
design_header($default);
design_body_open('bg');
if(isset($_POST['code'])&&isset($_POST['verify']))
{
	if($_POST['code']==$_SESSION['random'])
	{
	if((is_present($_SESSION['email'],'users','user_email',$db))>0)
{
   session_unset();
session_destroy();
    error_gen('Multiple account not allowed!!','signup');
redirect('../signup.php','0');
 exit();
}
$sql="INSERT INTO users (user_first,user_last,user_email,user_pwd,gender,dob) VALUES(
'{$first}','{$last}','{$mail_to}','{$hashedpwd}','{$g}','{$dob}')";
$result=mysqli_query($db,$sql);	
$sql="select user_id,user_first from users where user_email='".$mail_to."'";
$result=mysqli_query($db,$sql);
$row=mysqli_fetch_assoc($result);
$id=$row['user_id'];
$act='You created your account';
activity($id,$act,$db);
$web=(string)$id;
$web=$row['user_first'].$web;
$sql="update users set webstar_id='".$web."' where user_id=".$id."";
$result=mysqli_query($db,$sql);
if($result)
{$mail_from='Webstar email service';
$sub='verified sucessfully';
$mail_body='Thank you for being social!!';
email_sender(connect(3),connect(1),connect(2),$mail_to,$mail_from,$sub,$mail_body); 
}
error_gen('Now you are member!! go to login panel','signup');
redirect(' ../signup.php',1);
exit();
}
exit();	
}
if($_SESSION['i']==0)
{
$mail_from='Webstar email service';
$sub='Webstar email service';
$mail_body='Your verification code is '.$_SESSION['random'];
//$j=email_sender(connect(3),connect(1),connect(2),$mail_to,$mail_from,$sub,$mail_body); 
$j=mail($mail_to,'Webstar confirmation','Your verification code for signup  is '.$_SESSION['random']);
//$j=email_sender('devesh.tripathi.37@gmail.com','Webstar confirmation','Your verification code for signup  is '.$_SESSION['random']);
/*if(!$j) 
{
	redirect('../signup.php',1);
	error_gen('unable to send email','signup');
	exit();
}*/

$_SESSION['i']=1;
}
if($_SESSION['i']<=3)
{
	if($_SESSION['i']==1)
	{$status='Enter';}
else{$status='Wrong';}
	echo('
	<div class="col-sm-3" style=""></div> 
<div class="col-sm-6" style="">

	<div class="center" style="">
      <div class="modal-content" >
        <div class="modal-header" style="padding:30px 10px;">
            <h4><span class="glyphicon glyphicon-envelope"></span>&nbsp;Verify by code sent to your '.$_SESSION['email'].'</h4>
        </div>
        <div class="modal-body" style="padding:40px 50px;">
          <form role="form" action="email-verification" method="post">
            <div class="form-group">
<font color="red">'.$status.' verification code retry' .$_SESSION['i']. ' of 3</font>
</div>
            <div class="form-group">
              <input type="text" class="form-control"  placeholder="Verification code" name="code" required="">
            </div>
              <button type="submit" class="btn btn-success btn-block" name="verify">Verify</button> </form>
        </div>
        <div class="modal-footer">
          <div>
      </div>
       </div> 
  </div></div>');
  $_SESSION['i']=$_SESSION['i']+1;

	
}
else{
session_unset();
session_destroy();
header('location: ../signup.php');
exit();		
}
	

design_body_close();


?>