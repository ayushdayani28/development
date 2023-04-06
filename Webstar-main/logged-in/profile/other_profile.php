<script name="text/javascript">
function update(){
var to = <?php echo($_GET['view']);?>;
var from =<?php echo($_SESSION['u_id']);?>;
var form= "replace";	
var ops= $("#ops").val();
// Returns successful data submission message when the entered information is stored in database.
var dataString = 'from='+from+'&to='+to+'&ops='+ops;
if(to==""|| from =="")
{
alert("Please Fill All Fields");
}
else
{
// AJAX Code To Submit Form.
$.ajax({
type: "POST",
url: "logged-in/add-friend1.php",
data: dataString,
cache: false,
success: function(result){
if	(ops=='request')
{$('#'+form).replaceWith("<font color='red'>Request Sent</font>");}
if(ops=='cancel')
{$('#'+form).replaceWith("<font color='red'>Request canceled</font>");}
if(ops=='accept')
{$('#'+form).replaceWith("<font color='red'>Added in our circle</font>");}
if(ops=='remove')
{$('#'+form).replaceWith("<font color='red'>Removed from circle</font>");}
//alert(result);
}
}
);
}
return false;
}
</script>


<?php



$_GET['view']=mysqli_real_escape_string($db,$_GET['view']);
$_GET['view']=mysqli_real_escape_string($db,$_GET['view']);


if(is_present($_GET['view'],'users','user_id',$db)==1&&($_SESSION['u_id']!=$_GET['view']))
{
$query= $db->query("SELECT  user_first,user_last,dp,webstar_id FROM `users` WHERE user_id=".$_GET['view']."");	
$info=$query->fetch_object();
$fname=$info->user_first;
$lname=$info->user_last;
$id=$info->webstar_id;	
//checking friend present or not
design_title($fname);
switch(friend_status($_SESSION['u_id'],$_GET['view'],$db))
{
case 0://add
	$dp='http://s3.amazonaws.com/37assets/svn/765-default-avatar.png';
$ops='<div id="replace"><input type="hidden" id="ops" value="request"><button type="button" onclick="update()"class="btn btn-danger">Add to circle</button></div>';
break;
	case 1://request sent
$dp='http://s3.amazonaws.com/37assets/svn/765-default-avatar.png';
$ops='<div id="replace"><input type="hidden" id="ops" value="cancel"><button type="button" onclick="update()" class="btn btn-warning">Cancel request</button></div>';
break;
case 2://friend
if($info->dp!=NULL)
{$dp='logged-in/dp/'.$info->dp;}	
	else{$dp='http://s3.amazonaws.com/37assets/svn/765-default-avatar.png';}
$ops='<div id="replace"><input type="hidden" id="ops"  value="remove" ><button type="button" onclick="update()" class="btn btn-danger">Remove from circle</button></div>';
break;
	case 3://Accept
$dp='http://s3.amazonaws.com/37assets/svn/765-default-avatar.png';
$ops='<div id="replace"><input type="hidden" id="ops" value="accept"><button type="button" onclick="update()" class="btn btn-success">Accept request</button></div>';
break;
}
echo('
<style>    
    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }
  </style>
</head>
<body>

<div class="container text-center">    
  <div class="row">
    <div class="col-sm-3 well">
      <div class="well">

        <img src="'.$dp.'" class="img-circle" height="70" width="70" alt="'.$fname.'">
      </div>
	          <p><a href="#">'.$fname.' '.$lname.'</a></p>
      <div class="alert alert-success fade in">
        
        <p>'.$ops.'</p>
        
		</div>
   
    </div>');
 ?>
 
 
 
 <?php

if($_SESSION['u_dp']==$_SESSION['default_dp'])
{
$dp=$_SESSION['u_dp'];
}
else
{
$dp='logged-in/dp/'.$_SESSION['u_dp'];
}	


echo('
 <style>    
    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }
  </style>
</head>
<body>');
?>

<?php

if(isset($_SESSION['ano_status']))
{
	$ano_status=$_SESSION['ano_status'];
	$_SESSION['ano_status']='';
}
else
{
$ano_status='';	
}
echo('
<div class="container text-center">    
  <div class="row">
    <div class="col-sm-7">
    
      <div class="row">
        <div class="col-sm-12">
          <div class="panel panel-default text-left">
            <div class="panel-body">
			  <form action="anonymous_message" method="post">
<b><font color="green">'.$ano_status.'</font><font color="red"><br>Leave a message anonymously</font></br></b>
              <p contenteditable="true">
			  <textarea type="text" name="ano_content" class="form-control" name="ano_content" rows="4" placeholder="Leave a message anonymously"></textarea></p>
              <input name="ano_id" type="hidden" value='.encrypt($id,'e').'></input>
			  <input name="id" type="hidden" value='.$_GET['view'].'></input>
			  <button class="btn btn-danger btn-lg" id="post" name="ano_send"><span class="glyphicon glyphicon-send"></span></button>			  
         	</div>
          </div>
        </div>
      </div>
	     </form>		
	  
	 <script src="main-login/ajax.js"></script>
	  
	  ');
        ?>
		
	<?php
	if(friend_status($_SESSION['u_id'],$_GET['view'],$db)==2)
	{
		$result=mysqli_query($db,"select *from timeline where id=".$_GET['view']." ORDER BY `post_id` DESC"); 
		 while($r=$result->fetch_object())
		 {
			 $st=(status_like($r->post_id,$_GET['view'],$db));		 
			 design_timeline_model($r->post_id,$r->id,$info->user_first,$info->user_last,dp_load($info->dp),$st,count_like($r->post_id,$db),comment_count($r->post_id,$db),$r->content,$r->attach,$r->date);
		 }
    }
	else
	{
	echo('<br>Add to circle see timeline!!</br>');	
	}
	?>
		
	 
 
 
 <?php 
      echo('<div class="well">
       
      </div>
    </div>
  </div>
</div>

<footer class="container-fluid text-center">
  <p><a href="Terms.php">Terms and condition</a></p>
</footer>

'
);
exit();
}
else{
	
redirect('login?nav=profile&view=self','0');	
exit();	
}
exit();
?>


