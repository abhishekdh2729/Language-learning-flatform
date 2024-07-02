<?php

$hostName="localhost";
$dbUser="root";
$dbPassword= "";
$dbHost= "learning";

$conn=mysqli_connect("$hostName","$dbUser","$dbPassword","$dbHost");
if(!$conn){
    die("something went wrong!");
}
?>