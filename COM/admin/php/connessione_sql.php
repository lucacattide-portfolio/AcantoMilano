<?php

if( $_SERVER['SERVER_NAME'] == "localhost" ){	
	$host="localhost";
    $user="root";
    $password="";
    $db="acantoit";
	
}else{
    $host="62.149.150.227";
    $user="Sql808064";
    $password="83ee6f4zav";
    $db="Sql808064_2";
}

// mi connetto al database
$con = mysqli_connect($host,$user,$password,$db);

// Check connection
if (mysqli_connect_errno()){
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$mysqli = new mysqli($host, $user, $password, $db);

if ($mysqli->connect_error) {
    die('Connect Error (' . $mysqli->connect_errno . ') '. $mysqli->connect_error);
}

?>