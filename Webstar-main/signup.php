<?php
session_start();
require('main-login/module.php');
require('main-login/module-design.php');
require('api/config.php');
$loginurl=$gClient->createAuthUrl();
if(isset($_SESSION['u_id']))
{
header("location: ../login.php");
exit(0);
}
design_title('Sign up');
design_link();
design_style();design_style();
design_icon('main-login/ico.png');
design_header($default);
?>









</head>
<body class="bg">


<div class="col-sm-3" style="">
</div> 
<div class="col-sm-6" style="">

<div class="center" style="">

      <div class="modal-content" >
        <div class="modal-header" style="padding:20px 10px;">
          
          <h4><span class="glyphicon glyphicon-lock"></span> Being Social</h4>
        </div>
        
        <div class="modal-body" style="padding:-10px 10px;"> <br>
        <button type="submit" name="login" onclick="window.location='<?php echo $loginurl; ?>'"class="loginBtn loginBtn--google">Create account with Google+</button>
                 <a href="login.php"><button class="btn btn-danger">For Login click here</button></a></br>
          <form role="form" action="main-login/signup.php" method="post">

            <div class="form-group">

<font color="red">
<?php
error_disp('signup');
if(isset($_SESSION['email']))
{

session_unset();
session_destroy();
}
?>

</font>

</div>

            <div class="form-group">

              <input type="text" class="form-control"  placeholder="Enter First" name="first" required="">
            </div>
            <div class="form-group">
              <input type="text" class="form-control"  placeholder="Enter Last Name" name="last" required="">
            </div>

<div class="form-group">
              <input type="text" class="form-control"  placeholder="Enter Email_id" name="email" required="">
            </div>

<div class="form-group">
              <input  class="form-control" id="password" placeholder="Enter Password" name="pwd" type="password" required="">
            </div><div class="form-group">
    	
		<br>	

	<font><b>DOB(dd/mm/yyyy):</b></font></bR>
		<select name="day" width="0" >
<?php
for($i=1;$i<32;$i++)
echo('<option value="'.$i.'">'.$i.'</option>');
?>

</select>	
<select name="month" width="0">
<?php
for($i=12;$i>0;$i--)
echo('<option value="'.$i.'">'.$i.'</option>');
?>

</select>
		<select name="year" width="0">
<?php
for($i=date("Y");$i>=1905;$i--)
echo('<option value="'.$i.'">'.$i.'</option>');
?>

<?php 
echo'</select>
</br>
		
		</div>

      <legend><font size="2">Choose your gender:</font></legend>
        <label for="male">Male</label>
        <input type="radio" name="gender" id="male" value="male" checked>
        <label for="female">Female</label>
        <input type="radio" name="gender" id="female" value="female">
     
  <br> <a href="Terms.php"><font color="#777" size="1">by clicking Sign up you agree to the terms and conditions</font></a></br>
  
 <br><button type="submit"  class="btn btn-success btn-block" name="submit">Sign up</button></br>
          </form>
          
          
          
          
        </div>
        <div class="modal-footer">
 <h1 align="center">    <a href="Terms.php"><font color="#777" size="1"> terms and conditions</font></a></h1>

          <div>
      </div>
  </div> 
  </div> 
  </div> 
  </div> 
</div>      
</div>
</div>';
 exit(); 
 ?>