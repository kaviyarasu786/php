<?php
//error_reporting(E_ERROR);
$username="root";
$password="";
$hostname="local host";
$database="itcompany";

$conq=new mysqli($hostname,$username,$password,$database);
if(!$conq)
{
    die("db not connected");
}

  // echo "db connected";




//   function insertquerry($con,$sql)
//   {
//    if(mysqli_query($con,$sql))
//    {
//     return "inserted data";
//    }
//    else
//    {
//     return "not inserted data";
//    }
//   }
?>



