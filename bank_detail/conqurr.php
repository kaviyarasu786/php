<?php

$username="root";
$password="";
$hostname="localhost";
$database="bank";

$con_query=new mysqli($hostname,$username,$password,$database);
if(!$con_query)
{
    die("database not connected");
}
 
  echo "database connected";
?>