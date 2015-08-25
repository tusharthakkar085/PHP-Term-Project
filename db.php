<?php

error_reporting(0);
ob_start();
session_start();

$host = "localhost";
$user = "root";
$pass = "";
$db = "blog";

$con = mysql_connect($host,$user,$pass) or die("Error in db connection..");

mysql_select_db($db,$con);
mysql_query("SET NAMES 'utf8'");

$counter_name = "counter.txt";
// Check if a text file exists. If not create one and initialize it to zero.
if (!file_exists($counter_name)) {
$f = fopen($counter_name, "w");
fwrite($f,"0");
fclose($f);
}
// Read the current value of our counter file
$f = fopen($counter_name,"r");
$counterVal = fread($f, filesize($counter_name));
fclose($f);
// Has visitor been counted in this session?
// If not, increase counter value by one
if(!isset($_SESSION['hasVisited'])){
$_SESSION['hasVisited']="yes";
$counterVal++;
$f = fopen($counter_name, "w");
fwrite($f, $counterVal);
fclose($f);
}
//echo "You are visitor number $counterVal to this site"; 



?>