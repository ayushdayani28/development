<?php 

class math{


function check_exp($func){
$a=array('x','/','+','-','*','^','s','i','n','(',')','c','o','s','t','a','n','s','e','c','l','o','g','h','0.3');
//$a='x/+-*^sin,()costanseclog';
$not_allowed=array('../','..','define','exit()','start','session','exit','unlink','fopen','readfile',';',"'",'"','end');
$func_count=strlen($func);
//check invalid
for($j=0;$not_allowed[$j]!='end';$j++)
{
 if(strstr($func,$not_allowed[$j])!=FALSE)
{
return(FALSE);
}
}
//check invalid
for($j=0;$j<$func_count;$j++)
{

if(preg_match('/\d/',$func[$j]))
{
continue;
}   
elseif(!in_array($func[$j],$a))
{
 return(FALSE);   
 
}


}

return TRUE;
}


function make_func_file($func)
{

    $func=str_replace('^','**',$func);
        $func=str_replace('x','$x',$func);
        $func=str_replace('e','2.718',$func);
        //$func=str_replace('coshx','((2.718^x+2.718^(-x))/2)',$func);
         //$func=str_replace('sinhx','((2.718^x-2.718^(-x))/2)',$func);
    $func='
    function f($x)
    {
    $x='.$func.';
    return($x);
    
    }
    ';

    return $func;
}



function bisection($a,$function,$approx)
{
echo('<div class="alert alert-danger"><b>Bisection method:</br>Given f(x)='.$function.' and LB='.$a.' <br>f(LB)='.f($a).'</br></b></div>
');    
    $lb=$a;
if(f($lb)>0)
{
  for($i=0;$i<200;$i++)
  {
      if(f($lb)<0)
      {
         $b=$lb;
         break;
      }
      $lb=$lb+0.3;
  }

}  
   else
   {
   for($i=0;$i<200;$i++)
  {
      if(f($lb)>0)
      {
         $b=$lb;
         break;
      }
  
      $lb=$lb+0.3;
  }    
   } 
    
if($i>=98)
{echo('<br>Cannot find initial Upperbound sign of f(x) doesnot change even after 200 point</br>');
    exit();
}
 
echo('<div class="alert alert-info">Finding Root between a='.$a.' b='.$b.' mid=(a+b)/2</div>'); 
 echo(' <div class=""><table class="table table-striped">
    <thead>
      <tr>
        <th>Approx</th>
        <th>a</th>
        <th>b</th>
           <th>mid</th>
           <th>f(mid)</th>
      </tr>
    </thead><tbody>');
$approx=200;
for($i=1;$i<=$approx;$i++) 
 {
     
$min=($a+$b)/2;
$y=f($min);
if($y>0)
{
    $b=$min;
}     
else
{
$a=$min;    
} 

$decimal_point=4;
$ap=number_format((float)$a,$decimal_point, '.', '');
$bp=number_format((float)$b,$decimal_point, '.', '');
$minp=number_format((float)$min,$decimal_point, '.', '');
$yp=number_format((float)$y,$decimal_point, '.', '');
echo('<tr>
        <td>'.$i.'</td>
        <td>'.$ap.'</td>
        <td>'.$bp.'</td>
        <td>'.$minp.'</td>
        <td>'.$yp.'</td>
      </tr>');
     
}
 
echo('    </tbody>
  </table>
</div><div class="alert alert-success">Root lies between '.$a.' and '.$b.' <font color="red">solve another problem <b><a href="bisection">< go back</a></font></b></div></br>'); 
 
 
 
 
}




////regula-falsi
function regula_falsi($a,$function,$approx)
{

 echo('<div class="alert alert-danger"><b>Regula-falsi method:</br>Given f(x)='.$function.' and LB='.$a.' <br>f(LB)='.f($a).'</br></b></div>');

 
 $lb=$a;
if(f($lb)>0)
{
  for($i=0;$i<200;$i++)
  {
      if(f($lb)<0)
      {
         $b=$lb;
         break;
      }
      $lb=$lb+0.3;
  }

}  
   else
   {
   for($i=0;$i<200;$i++)
  {
      if(f($lb)>0)
      {
         $b=$lb;
         break;
      }
  
      $lb=$lb+0.3;
  }    
   } 
    
if($i>=98)
{echo('<br>Cannot find initial Upperbound sign of f(x) doesnot change even after 200 point</br>');
    exit();
}
 
echo('<div class="alert alert-info">Finding Root between a='.$a.' b='.$b.' <img src="regula-falsi.png"></div>'); 
 echo(' <div class=""><table class="table table-striped">
    <thead>
      <tr>
        <th>Approx</th>
        <th>a</th>
        <th>b</th>
           <th>mid</th>
           <th>f(mid)</th>
      </tr>
    </thead><tbody>');
    $ap='';
    $bp='1';
for($i=1;$i<=$approx&&$ap!=$bp;$i++) 
 {
     
$min=((f($b)*$a)-(f($a)*$b))/(f($b)-f($a));
$y=f($min);
if($y<0)
{
    $a=$min;
}     
else
{
$b=$min;    
} 
$decimal_point=4;
$ap=number_format((float)$a,$decimal_point, '.', '');
$bp=number_format((float)$b,$decimal_point, '.', '');
$minp=number_format((float)$min,$decimal_point, '.', '');
$yp=number_format((float)$y,$decimal_point, '.', '');
echo('<tr>
        <td>'.$i.'</td>
        <td>'.$ap.'</td>
        <td>'.$bp.'</td>
        <td>'.$minp.'</td>
        <td>'.$yp.'</td>
      </tr>');
     
}
 
echo('    </tbody>
  </table>
</div><div class="alert alert-success">Approx. value of root is x=<b>'.$min.'</b> <font color="red">solve another problem <b><a href="regula-falsi">< go back</a></font></b></div></br>'); 
}




    
}

