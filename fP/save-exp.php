<?php
//Iclude The Bootstrap for the mysql servers
$boot = require_once'core/bootstrap.php';


$spent= $_POST['sa'];
$desc = $_POST['sd'];
// query
$sql = "INSERT INTO expenses (expense_desc, cost, exp_date) VALUES (?,?,NOW())";
$q = $boot->insertObject($sql,[$desc, $spent]);
header("location: expenses.php");
?>