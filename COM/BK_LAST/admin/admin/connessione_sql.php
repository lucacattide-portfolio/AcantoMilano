<?php


$host="localhost";//62.149.150.188
$user="root";//Sql613076
$password="";//357bf276
$db="junction";//Sql613076_1


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