<?php


$host="localhost";
$user="root";
$password="";
$db="acanto"; 

/*
$host="62.149.150.226";
$user="Sql807699";
$password="hxsae8fkmi";
$db="Sql807699_1";


$host="62.149.150.227";
$user="Sql808064";
$password="83ee6f4zav";
$db="Sql808064_1";

*/


mysql_connect($host, $user, $password) or die("Connessione host non riuscita!!!!");

// mi connetto al database

mysql_select_db($db) or die("Connessione DB non riuscita!!!!");



$mysqli = new mysqli($host, $user, $password, $db);

/*
 * This is the "official" OO way to do it,
 * BUT $connect_error was broken until PHP 5.2.9 and 5.3.0.
 */
if ($mysqli->connect_error) {
    die('Connect Error (' . $mysqli->connect_errno . ') '
            . $mysqli->connect_error);
}

/*
 * Use this instead of $connect_error if you need to ensure
 * compatibility with PHP versions prior to 5.2.9 and 5.3.0.
 */



?>