<?php
error_reporting(E_ERROR);
$username="root";
$password="";
$hostname="localhost";
$database="online";

$conq=new mysqli($hostname,$username,$password,$database);
if(!$conq)
{
    die("database is not connected");
}

    //echo"database is connected";


    function insertq($connet,$sql)
    {
        if(mysqli_query($connet,$sql))
        {
            return"inserted_data";
        }
        else
        {
            return"not_inserted ";
        }
    }
?>