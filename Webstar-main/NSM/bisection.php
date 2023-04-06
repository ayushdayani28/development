<?php
include('module_math.php');
error_reporting(0);
include('../main-login/module-design.php');
include('../main-login/module.php');
mysqli_close($db);

$math=new math;
if(isset($_POST['function'])&&isset($_POST['lb'])&&isset($_POST['approx']))
{
    
    
$fp = fopen('func/func.html', 'a');//opens file in append mode  
fwrite($fp,'<br>'.$_POST['function'].'<br>'.get_client_ip());  
fclose($fp);      
    
if(!(is_numeric($_POST['lb'])&&is_numeric($_POST['approx'])&&$_POST['approx']<=40&&$_POST['lb']<10000))
{
    header('location: bisection.php?error=invalid');
    exit();
}
$func=$_POST['function'];    
    if($math->check_exp($func))
{
    
   design_link();
design_icon('../main-login/ico.png');
design_style();
design_title('Bisection');
design_header($default); 
    
    
$func=$math->make_func_file($func);
eval($func);
$math->bisection($_POST['lb'],$_POST['function'],$_POST['approx']);

}
else
{
header('location: bisection?error=invalid');    

    exit();
}
exit();    
    
    
}



design_link();
design_icon('../main-login/ico.png');
design_style();
design_title('Bisection');
design_header($default);

if(isset($_GET['error']))
{if($_GET['error']=='invalid')
    {
        echo('<font color="red" size="5"><b>Invalid entry</b></font>');
    }
}
echo('

<br><div class="alert alert-danger">
<strong><b>Bisection Method of finding roots:</b><br>Direction of use: use only x as variable in function | for power use "^"| for exponential function "e"| divide "/"|product "*"|sum "+"|substract "-"|sin "sin(x)"|cos "cos(x)"|tan "tan(x)" respective for others trigo-function</strong></br>

</div></br>

<h7 align="center"><div align="center"><img src="roots.gif" width="200" height="200" align="center"></div><br><form action="bisection" method="post">
<font color="red"><br><b>Enter function(example: (x^3)-(x)-4 or sin(x)+cos(x)+log(x)</b></br></font>
<br><input type="text" style="width:60%; margin: auto;" class="form-control" name="function" placeholder="Enter function"></br>
<font color="red"><br><b>Enter Lowerbound(example:1.7 where the function is negative or postive)</b></br></font>
<input type="text" name="lb" style="width:40%; margin: auto;" class="form-control" placeholder="Enter lowerbound">
<font color="red"><br><b>Enter Number of approximation(example:22 max=40)</b></br></font>
<input type="text" name="approx" style="width:40%; margin: auto;" class="form-control" placeholder="Enter approximation">
<br><input type="submit" value="submit"  class="btn btn-danger"></br>

</form></br></h4>
');



?>