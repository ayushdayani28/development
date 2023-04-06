<?php
$default='null';

function design_link()
{
	
echo('<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Lobster" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3mobile.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
  ');
	
}
	


function design_icon($link){

echo('<link rel="icon" type="image/png" href="'.$link.'"/ > </	 >');
}
function design_title($title)
{
if($title=='null')
{
$title='being social';
$title='<title>'.$title.'</title>';
echo($title);	
}
else
{
$title='<title>'.$title.'</title>';
echo($title);	
}
}

function design_style()
{
echo('

 <style>
  .modal-header, h4, .close {
      background-color: #5cb85c;
      color:white !important;
      text-align: center;
      font-size: 30px;
  }
  .modal-footer {
      background-color: #f9f9f9;
  }
  
    .affix {
      top: 0;
      width: 100%;
      z-index: 9999 !important;
  }

  .affix + .container-fluid {
      padding-top: 70px;
  }
  
  
  
  
  
  
  </style>





<style>








/* Shared */
.loginBtn {
  box-sizing: border-box;
  position: relative;
  /* width: 13em;  - apply for fixed size */
  margin: 0.2em;
  padding: 0 15px 0 46px;
  border: none;
  text-align: left;
  line-height: 34px;
  white-space: nowrap;
  border-radius: 0.2em;
  font-size: 11px;
  color: #FFF;
}
.loginBtn:before {
  content: "";
  box-sizing: border-box;
  position: absolute;
  top: 0;
  left: 0;
  width: 34px;
  height: 100%;
}
.loginBtn:focus {
  outline: none;
}
.loginBtn:active {
  box-shadow: inset 0 0 0 32px rgba(0,0,0,0.1);
}


/* Facebook */
.loginBtn--facebook {
  background-color: #4C69BA;
  background-image: linear-gradient(#4C69BA, #3B55A0);
  /*font-family: "Helvetica neue", Helvetica Neue, Helvetica, Arial, sans-serif;*/
  text-shadow: 0 -1px 0 #354C8C;
}
.loginBtn--facebook:before {
  border-right: #364e92 1px solid;
  background: url("https://s3-us-west-2.amazonaws.com/s.cdpn.io/14082/icon_facebook.png") 6px 6px no-repeat;
}
.loginBtn--facebook:hover,
.loginBtn--facebook:focus {
  background-color: #5B7BD5;
  background-image: linear-gradient(#5B7BD5, #4864B1);
}


/* Google */
.loginBtn--google {
  /*font-family: "Roboto", Roboto, arial, sans-serif;*/
  background: #DD4B39;
}
.loginBtn--google:before {
  border-right: #BB3F30 1px solid;
  background: url("https://s3-us-west-2.amazonaws.com/s.cdpn.io/14082/icon_google.png") 6px 6px no-repeat;
}
.loginBtn--google:hover,
.loginBtn--google:focus {
  background: #E74B37;
}



.center {
background-color: ;  
    text-align: center;
    border: 0px solid green;
       width:100%;
height:100%;
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

</style>
<style>
body {margin:0;}
	


.footer {
    position: absolute;
    left: 0;
    bottom: 100%;
    width: 100%;
    background-color: ;
    color: white;
    text-align: center;
}
</style>



<style>
body, html {
    height: 100%;
    margin: 0;

}

.bg {
    

background-image: url("https://webstar.tk/main-login/bg.png");

    height: 100%; 
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
      background-opacity:10%;
}
.font {
font-family: cursive;
font-face:Lobster;
	font-size: 50px;
	font-style: italic;
	font-variant: normal;
	font-weight: 400;
	line-height: 38px;
        font-color:#5cb85c;
}





.round {
    border: 2px ;
    padding: 10px 40px; 
    background: #4CAF50;
    width: 300px;
    border-radius: 15px 45px;
}
</style>
<style>
*{
  box-sizing: border-box;
}

#searchinput {
  background-image: url("");
  background-position: 375px 12px;
  background-repeat: no-repeat;
  width: 75%;
  font-size: 16px;
  padding: 12px 20px 12px 40px;
  border: 1px solid #ddd;
  margin-bottom: 12px;
  border-radius:25px;
}




.click-circle {
  width: 40px;
  height: 40px;
  text-align: center;
  padding: 6px 0;
  font-size: 12px;
  line-height: 1.428571429;
  border-radius: 20px;
  background-color: #d2322d;
}

</style>
');	
}

function design_header($name)
{
	
	if($name=='null')
	{
	$name='Webstar';
	echo('<div class="container-fluid" style="background-color:#5cb85c;">
  <font face="lobster" size="6  " color="white">'.$name.'</font></div>' );
	}
	else{
		echo('<ul>
  <li><font face="lobster" size="7" color="white">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$name.'</font></li> </ul>');
		
	}

	}

//body_function class can be change from sytle func
function design_body_open($class)
{
	echo('<body class="'.$class.'" bgcolor="#e6ecf0">');

}

function design_body_close()
{
	echo('</body>');

}
function design_div_grid_4($color)
{
	
echo('
<div class="col-sm-4" style="background-color:'.$color.';">');

}


function design_div_center()
{
	echo('<div class="center">	');
	
}


function design_div_close()
{
	echo('</div>');
	
}







function design_header_logged_in($name,$img,$link,$db)
{

	function encrypt_list( $string, $action) {
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
function msg_count($db)
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
		
	
	if($_SESSION['u_dp']!=$_SESSION['default_dp'])
	{
		$dp='logged-in/dp/'.$_SESSION['u_dp'];
	}
	else{
		
		$dp=$_SESSION['default_dp'];
	}
	
	if($name=='null')
	{
	$name='Webstar';
	
	
	$request_count=notificaton_count($_SESSION['u_id'],'request',$db);
	$like_count=notificaton_count($_SESSION['u_id'],'post',$db);
	if($request_count==0)
	{
	$badge_request='';	
	
	}else
	{
		$badge_request=$request_count;
		
	}
	
	if($like_count==0)
	{
	$badge_like='';	
	
	}else
	{
		$badge_like=$like_count;
		
	}
	
	echo('
<div class="container-fluid" style="background-color:#101010;">
  <font face="lobster" size="5" color="white">'.$name.'&nbsp;&nbsp;&nbsp;</font><font size="4" color="white">
 <a href="login?nav=home"><span class="glyphicon glyphicon-home"></span></a>&nbsp;
  <a href="login?nav=search"><span class="glyphicon glyphicon-search"></span></a>&nbsp;
  <a href="login?nav=request"><span class="glyphicon glyphicon-user"><span class="badge" id="request">'.$badge_request.'</span> </span></a>
  &nbsp;<a href="login?nav=chat&chat_area=list"><span class="glyphicon glyphicon-comment"><span class="badge" id="msg">'.msg_count($db).'</span></span>
  &nbsp;<a href="login?nav=notificaton"><span class="glyphicon glyphicon-bell"><span class="badge" id="bell">'.$badge_like.'</span></span>&nbsp;
    <a data-toggle="modal" data-target="#setting"><span class="glyphicon glyphicon-cog"></span></a></font></div>

  <hr>
<div class="modal fade" id="setting" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Options</h4>
        </div>
        <div class="modal-body">
      
		  <h6 align="center">
		  <img src="'.$dp.'" class="img-circle" alt="'.$_SESSION['u_first'].'" width="100" height="100" align="center">
		 </h6>
		  <br><h6 align="center"><font color="red"> 
		  <div class="text-center"><a href="login?nav=profile&view=self"><u>'.$_SESSION['u_first'].' '.$_SESSION['u_last'].'</font></u>	</a></br></h6>
		  <hr>
	<h6 align="center">
		  <form action="login?nav=setting" method="POST">
		
<button type="submit" name="submit" class="btn btn-primary"><font size="3">setting</font></button>
</form>        
		<form action="main-login/logout.php" method="POST">
		
<button type="submit" name="submit" class="btn btn-danger"><font size="3">logout</font></button>
</form>
<a href="anonymous_message?link"><font color="red">Anonymous control panel</a>
		</div>
        <div class="modal-footer">
      <h6 align="left"><a href="report">Report or feedback</a></h6><button type="button" class="btn btn-default" data-dismiss="modal">Close</button></font>
        </div>
      </div>
    </div>
  </div>
</h6>







');
		}
	else{
		echo('<ul>
  <li><font face="lobster" size="7" color="white">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$name.'</font></li> </ul>');
		
	}

	}

	
function design_date($initial,$final)	
{
	echo('<select name="day" class="form-control"><option value="0">Day</option>');	
	for($i=0;$i<32;$i++){
		echo('<option value="'.$i.'">'.$i.'</option>');
	}
	echo('<select  name="month" class="form-control"><option value="0">Month</option>
			<option value="1">Jan</option><option value="2">Feb</option><option value="3">Mar</option><option value="4">Apr</option>
			<option value="5">May</option><option value="6">Jun</option><option value="7">Jul</option><option value="8">Aug</option>
			<option value="9">Sept</option><option value="10">Oct</option><option value="11" selected="1">Nov</option>
			<option value="12">Dec</option></select>');
	
	
	
}


	
function design_timeline_model($post_id,$u_id,$fname,$lname,$dp,$like_status,$likes,$comment,$content,$attach,$date)
{	
	$p_id=$post_id;
	$post_id="'".$post_id."'";
	if($attach==NULL)
	{
		$attach='';
	}
	else
	{
	$attach='<h2><img src="logged-in/post_img/'.$attach.'" class="img-thumbnail" /><div class="caption"></h2>';	
	if($content!=NULL)
	$content='<hr>'.$content;

	}
	
	if($like_status==1)
	{
		$button='<button id='.$post_id.' class="btn btn-info" onclick="unlike('.$post_id.');"><font color="red"><span class="glyphicon glyphicon-heart"></span></font></button>';
	}else{
		
		$button='<button id='.$post_id.' class="btn btn-info" onclick="like('.$post_id.');" value="appreciate"><font color="white"><span class="glyphicon glyphicon-heart"></span></font></button>';		
	}
	if($likes==0)
	{
		$count='';
		}else{
		
		$count='<a data-toggle="modal" onclick="load_liker('.$post_id.');" data-target="#'.$p_id.'-like-model">Appreciated('.$likes.')</a>';
	}
	
	 
	if($comment==0)
	{
		$comment_href='<a data-toggle="modal" onclick="comment_load('.$post_id.');"  data-target="#'.$p_id.'-comment-model"> Comment</a>';
		}
		else
		{
		$comment_href='<a data-toggle="modal" onclick="comment_load('.$post_id.');"  data-target="#'.$p_id.'-comment-model">Comment('.$comment.')</a>';
	}
	 
	 
	 
	 
	echo('
	<hr>
	<div class="row">
	<!--model like-->
	<div class="container">

  <!-- Trigger the modal with a button -->

  <!-- Modal  -->
  <div class="modal fade" id="'.$p_id.'-like-model" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content like-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Appreciated by</h4>
        </div>
        <div class="modal-body" id="'.$p_id.'-modal-body">
        </div>
		
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>
	<!--model like last-->
	
	
	<div class="row">
	<!--model comment-->
	<div class="container">

  <!-- Trigger the modal with a button -->
  <!-- Modal  comment-->
  <div class="modal fade" id="'.$p_id.'-comment-model" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content like-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Comments</h4>
        </div>
        <div class="modal-body" id="'.$p_id.'-comment-modal-body">
		
		
		  <div class="alert alert-info">
		<input type="text" id="'.$p_id.'comment_content" class="form-control">
	
	<br><input type="button"  class="btn btn-warning" onclick="comment_insert('.$post_id.');" id="'.$p_id.'comment" value="comment"></br>
			<hr>	</div>
        </div>
		<hr>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div></div>
      </div>
    </div>
  </div>
</div>
	<!--model comment last-->
     <div class="col-sm-12">
		  <div class="alert alert-danger fade in fluid">
		  <div align="left"><h6><img src="'.$dp.'" class="img-rounded" height="30" width="30"><a href="login?nav=profile&view='.$u_id.'"> '.$fname.' '.$lname.'</a>
<div class="text-align:center"><br><font color="#777" size="1">Posted on '.$date.'</font></br></div></h6>
	
		  <br><div  style="word-break:break-all;">'.$attach.$content.'</div></br></div>
		<hr>
			<div class="alert-info">'.$button.' <span id="'.$p_id.'count">'.$count.'</span> '.$comment_href.'</div>
			
          </div>
        </div>	
      </div>
	
	');
}











	

?>