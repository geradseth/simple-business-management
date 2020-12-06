<?php
//Iclude The Bootstrap for the mysql servers

$boot = require_once'core/bootstrap.php';


$catname = $_POST['catname'];

// query
$sql = "INSERT INTO categories (cat_desc) VALUES (?)";
$q = $boot->insertObject($sql,[$catname]);
header("location: aprod-categories.php");


?>