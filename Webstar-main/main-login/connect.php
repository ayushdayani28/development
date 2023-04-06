<?php
$db=new mysqli("localhost","id3920210_webstartk","webstar4516devs","id3920210_webstar");
mysqli_query($db,"SET time_zone = '+5:30'");
function connect($i)
{
switch($i)
{
 case 1:
     $veri='snaprapml@gmail.com';
     return($veri);
     case 2:
         $veri='snaprap4516devs32';
return($veri);


    case 3:
         $veri='smtp.gmail.com';
return($veri);
         
}
    
    
}