<?php
error_reporting(E_ERROR);
$username="root";
$password="";
$hostname="localhost";
$database="employee";

$connect=new mysqli($hostname,$username,$password,$database);
if(!$connect)
{
    die ("connection faild");

}

   echo "connection sucessfully created";





// function mysql_update_query($sql)
// {
//     $con=mysql_connection_php();
//     $quer_return=mysqli_query($con,$sql);
//     if($quer_return)
//     {
//         return "updated record sucessfully";
//     }
//     else
//     {
//         return "record not update";
//     }
// }

?>