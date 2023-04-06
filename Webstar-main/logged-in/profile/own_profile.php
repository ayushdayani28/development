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
echo('
<div class="container text-center">    
  <div class="row">
    <div class="col-sm-3 well">
      <div class="well">

        <img src="'.$dp.'" class="img-circle" height="70" width="70" alt="'.$_SESSION['u_first'].'">
      </div>
	          <p><a href="#">'.$_SESSION['u_first'].' '.$_SESSION['u_last'].'</a></p>
      <div class="alert alert-success fade in">
	  <a href="anonymous_message?link"><font size="3">See Anonymous message</a>
         </div>
   
    </div>
    <div class="col-sm-7">
    
      <div class="row">
        <div class="col-sm-12">
          <div class="panel panel-default text-left">
            <div class="panel-body">

              <p contenteditable="true"><textarea type="text" name="content" class="form-control" id="content" rows="4" placeholder="Update Timeline"></textarea></p>
              <button class="btn btn-danger btn-lg" id="post"><span class="glyphicon glyphicon-send"></span></button>
<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#Post"><span class="glyphicon glyphicon-picture"></span> </button>			  
            </div>
          </div>
        </div>
      </div>
	  
	  
	  
	  
	  
	  <div id="Post" class="modal fade" role="dialog">
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
<br><input type="submit"class="btn btn-danger" ></br>
</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
					
	  
	 <script>
	 
	 
	 
	 </script>
	  
	  <div id="timeline">
	  ');
        ?>
		
	<?php
	
	$result=mysqli_query($db,"select *from timeline where id=".$_SESSION['u_id']." ORDER BY `post_id` DESC"); 
		 while($r=$result->fetch_object())
		 {
			 
			 $st=(status_like($r->post_id,$_SESSION['u_id'],$db));		 
			 design_timeline_model($r->post_id,$r->id,$_SESSION['u_first'],$_SESSION['u_last'],dp_load($_SESSION['u_dp']),$st,count_like($r->post_id,$db),comment_count($r->post_id,$db),$r->content,$r->attach,$r->date);
		 }
	?>
		
		
		
		
		
       <?php 
      echo('
	  
	  </div>
	  
	  
      
           
    </div>
	<div class="col-sm-2 well">
 
      <div class="well">
       <p><a href="https://www.000webhost.com/992231.html" target="_blank"><img src="https://www.000webhost.com/images/banners/336x280/1.jpg" alt="Web hosting" width="145" height="160" border="0" /></a></p>
      </div>
      <div class="well">
        <p><a href="https://www.000webhost.com/992231.html" target="_blank"><img src="https://www.000webhost.com/images/banners/336x280/1.jpg" alt="Web hosting" width="145" height="160" border="0" /></a></p>
      </div>
    </div>
  </div>
</div>

<footer class="container-fluid text-center">
  <p></p>
</footer>
');
echo('<script src="main-login/ajax.js"></script>');

?>



