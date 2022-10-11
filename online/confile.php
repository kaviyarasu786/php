<?php

$username="kaviphpc_kaviweb";
$password="Welcome@123";
$hostname="localhost";
$database="kaviphpc_kaviweb";


$conq=new mysqli($hostname,$username,$password,$database);
if(!$conq)
{
    die("database not connected");
}
 else
 {
    echo "database connected";
 }

$insertq="insert into student(name,email,phone,address)values('raja','raja11@gmail.com',8789788987,'salem')";
$mysql=mysqli_query($conq,$insertq);
if($mysql)
{
    echo"Record inserted sucessfully";
}
else
{
    echo"Record  inserted failed";
}

?>