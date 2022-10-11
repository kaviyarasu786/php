<?php

$username="root";
$password="";
$hostname="localhost";
$database="hospital";

$confile=new mysqli($hostname,$username,$password,$database);
if(!$confile)
{
    die("database not connected");
}

  echo"database is connected";

?>