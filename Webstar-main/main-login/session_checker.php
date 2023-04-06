<?php

$current_date=date_create(date("Y-m-d"));
$logged_date=$_SESSION['Logged-date'];
$diff=date_diff($current_date,$logged_date);
$chk=$diff->format("%a");
if($chk>=2)
{
session_unset();
session_destroy();
 header("location: http://www.snaprap.ml/main/login-system/login.php?error=5");
exit();
}
?>