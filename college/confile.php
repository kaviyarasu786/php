<?php

$username="root";
$password="";
$hostname="localhost";
$database="college";

$conqurr=new mysqli($hostname,$username,$password,$database);
if(!$conqurr)
{
    die("database not connected");
}
 
//echo "database is connected";
?>