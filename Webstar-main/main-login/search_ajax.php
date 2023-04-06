<?php
require('module.php');

if(!login_check()==0){

    exit();}
if(!isset($_POST['partialState']))
{
   
    exit();
}

$value=strtolower($_POST['partialState']);

if(empty($value)){

	exit();}	
	else
$value=mysqli_real_escape_string($db,$value);
$sql="select user_id,(user_first),webstar_id,user_last,dp from users  where user_first like '%".$value."%' OR user_last like '%".$value."%' OR user_email='".$value."' OR webstar_id='".$value."'";

$query=$db->query($sql);
$i=1;
 echo('<div class="list-group-sm" >
  <a href="#" class="list-group-item active" >Search Result</a>');
while(($r=$query->fetch_object())&&($i<=4))
{
$fc=ucwords($r->user_first); 
$last=ucwords($r->user_last);
$web=$r->webstar_id;
$dp=$r->dp;
$admin='';
if($web=='devesh1')
{
    $admin='<font color="red" size="3"><b>Super User</b></font>';
}
if(empty($dp))
{
    $dp='"https://content.invisioncic.com/Mevernote/set_resources_3/84c1e40ea0e759e3f1505eb1788ddf3c_default_photo.png"';
}
else
{
    
    $dp='"logged-in/dp/'.$dp.'"';
}
 
echo('<a href="login?nav=profile&view='.$r->user_id.'" class="list-group-item"><img src='.$dp.'class="img-circle" height="35" width="35" alt="'.$fc.'">'.$fc.' '.$last.' '.$admin.'</a>');

$i=$i+1;
}



echo('</ULa>');

?>
