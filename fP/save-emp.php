<?php
//Iclude The Bootstrap for the mysql servers
$boot = require_once'core/bootstrap.php';


$fn = $_POST['FN'];
$mn = $_POST['MN'];
$ln = $_POST['LN'];
$pass = md5($ln);

$ws = 1;
// query
$sql = "INSERT INTO employee (emp_fname, emp_mname, emp_lname, working_status, emp_pass) VALUES (?,?,?,?,?)";
$q = $boot->insertObject($sql,[$fn, $mn, $ln, $ws, $pass]);
header("location: Employee.php");


?>