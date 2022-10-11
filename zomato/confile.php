<?php
error_reporting(E_ERROR);
$username="root";
$password="";
$hostname="localhost";
$database="zomato";

$connectq=new mysqli($hostname,$username,$password,$database);
if(!$connectq)
{
    die("database is not connected");
}

// echo"database is connected";

function insertfile($connection,$sql)
{
    if(mysqli_query($connection,$sql))
    {
        return "sucess";
    }

    else
    {
        return "failed";
    }
}

?>
