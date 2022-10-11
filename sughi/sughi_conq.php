<?php

$username="root";
$password="";
$hostname="localhost";
$database="sughi";


$conq=new mysqli($hostname,$username,$password,$database);
if(!$conq)
{
   die("database not connected");
}
   // echo "database connected";



   function insertq($conncet,$sql)
   {
     if(mysqli_query($conncet,$sql))
     {
        return"inserted data";
     }
     else
     {
        return "not inserted data";
     }
   }

?>