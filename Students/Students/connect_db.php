<?php
session_start();
$server = "localhost";
$user = "root";
$password = "";
$database = "students";

$con = new mysqli($server, $user, $password, $database);
?>