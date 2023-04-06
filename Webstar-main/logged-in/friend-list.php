

<?php
session_start();
require('../main-login/module.php');
require('../main-login/module-design.php');

design_link();



//add_friend($from=1,$to=2,$db);
if(isset($_SESSION['u_id']))
{
$query= $db->query("select user_first,user_last,user_id from users where user_id!=".$_SESSION['u_id']." order by user_id desc");
while ($r=$query->fetch_object())
{
$r->user_first=ucfirst($r->user_first);
$r->user_last=ucfirst($r->user_last);
echo($r->user_first.' '.$r->user_last.' ');
echo(friend_status($_SESSION['u_id'],$r->user_id,$db));
switch(friend_status($_SESSION['u_id'],$r->user_id,$db))
{
case 0:
$button='<input id="operation" type="hidden" value="add"><input id="addfriend" type="button" onclick="update()" value="Add to circle">';
break;
case 1:
$button='<font color="red">Request sent</font>';
break;
case 2:
$button='<input id="operation" type="hidden" value="remove"><input id="addfriend" type="button" onclick="update()" value="Remove">';
break;
case 3:
$button='<input id="operation" type="hidden" value="accept"><input id="addfriend" type="button" onclick="update()" value="Accept">';
break;	
}
echo('<div class="well well-lg">
<font>'.$r->user_first.' '.$r->user_last.'</font>
<form id="'.$r->user_id.'">
<input id="from" type="hidden" value="'.$_SESSION['u_id'].'">
<input id="info" type="hidden" value="'.$r->user_id.'">
<input id="to" type="hidden" value="'.$r->user_id.'">
'.$button.'
</form>
</div>');
	


}

}
else{
print("\nlogged-in");


}



?>



<script name="text/javascript">

function update(){
var to = $("#to").val();
var from = $("#from").val();
var form= $("#info").val();	
var ops= $("#operation").val();
// Returns successful data submission message when the entered information is stored in database.
var dataString = 'from='+ from + '&to='+ to+'&ops='+ ops;
if(to==''|| from =='')
{
alert("Please Fill All Fields");
}
else
{
// AJAX Code To Submit Form.
$.ajax({
type: "POST",
url: "add-friend1.php",
data: dataString,
cache: false,
success: function(result){
	

$('#'+form).replaceWith("<font>Request Sent</font>");


alert(result);
}
}
);
}
return false;
}




</script>
<br>



