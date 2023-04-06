<?php
session_start();
require('main-login/module.php');
require('api/config.php');
if(isset($_SESSION['tmp_email']))
{
session_unset();
session_destroy();
header('location: login');    
exit();    
}
if(login_check())
{

require('logged-in/home.php');
exit();
}



else
{
$loginurl="'".$gClient->createAuthUrl()."'";    
    
require('main-login/module-design.php');
design_link();
design_icon('main-login/ico.png');
design_title('Webstar');
design_style();
design_header($default);
design_body_open('bg');
design_div_grid_4($default);
design_div_close();
design_div_grid_4($default);
design_div_center();
echo('<div class="modal-content" >
        <div class="modal-header" style="padding:30px 10px;">
          
          <h4><span class="glyphicon glyphicon-lock"></span> Being Social</h4>
        </div>
        <div class="modal-body" style="padding:10px 25px;">
          <form role="form" action="main-login/login.php" method="POST">
            <div class="form-group">
 ');
echo('<font color="RED" face="Helvetica"><b>');
error_disp('login');

echo('</font></b>');

echo('   <BR> <label for="usrname"><span class="glyphicon glyphicon-user"></span> Username</label></BR>
             <input type="text" class="form-control" placeholder="Enter email" name="uid"  required="">
            </div>
            <div class="form-group">
              <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Password</label>
              <input type="password" class="form-control" name="pwd" placeholder="Enter password"  required="">
            </div>
              <button type="submit" name="login" class="btn btn-success btn-block">Login</button>
          </form>
   <br><button type="submit" name="login" onclick="window.location='.$loginurl.'"class="loginBtn loginBtn--google">Login with Google+</button>
<a href="signup"><button class="btn btn-danger">Create Account</button></a></br>
   <br> <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#pass-model">Forgot Password?</button></br>

 <h1 align="center"><a href="Terms"><font color="#777" size="1"> terms and conditions</font></a></h1>
   
<div class="modal fade" id="pass-model" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content pass-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Account recovery</h4>
        </div>
        <div class="modal-body">
          <p><br><div style="background-color:;align:center;" class="rounded" ><b><font color="Green">Enter Email</font></b></div>

<form action="main-login/recovery.php" method="post">
<br><input type="text" name="email" ></br>
<br><input type="submit" class="btn btn-danger" name="submit" ></br>
</form></p>
        </div>
        <div class="modal-footer">
		<div align="center"><button style="background-color:#555555; height:50px;width:200px ; border:none;align:left">
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
<font color="white" size="2"><b>Webstar (DeVs.co) &copy;'.date('Y').'
</b></font></button></div>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>







   



   </div>
   <br><button style="background-color:#555555; height:50px;width:200px ; border:none;align:left" align="left">
<font color="white" size="2"><b>Webstar	(DeVs.co) &copy;'.date('Y').'
</b></font></button>
</br>
      </div>
      </div> 
  </div> 
  

  </div> 

  </div> 

</div>

</div>


');


design_div_close();//div_center_close
design_div_close();//grid_close

design_div_grid_4($default);
//empty_gird	

design_div_close();



exit();

}
?>
