<?php

$dbhost = "localhost";
$dbuser = "itnovatorsweb";
$dbpass = "Joikrunch10_";
$dbname = "toothhubdb";

if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
{
	die("failed to connect!");
}
