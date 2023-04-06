<?php 
session_start();
require('activity.php');
?>
<?php
if(isset($_SESSION['u_email']))
{
if(isset($_POST['submit'])){
include('connect.php');

$email=$_SESSION['u_email'];
$sql="update users set status='offline' where user_email='{$email}' ";
$id=$_SESSION['u_id'];
$act='logged-out';
activity($id,$act,$db);
mysqli_query($db,$sql);
session_unset();
session_destroy();
header("location: ../login");
exit();
}
else{
header("location: ../login");
exit();
}
}
else
{
header("location: ../login");

}

?>