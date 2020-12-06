<?php
// configuration
$boot = require_once'core/bootstrap.php'; 

// new data
$fn = $_POST['FN'];
$mn = $_POST['MN'];
$a = $_POST['atwk'];
$ln = $_POST['LN'];
$id = $_POST['eid'];
if ($a) {
	$at=1;
}else $at=0;
// query
$sql = "UPDATE employee
        SET emp_fname=?, emp_mname=?,working_status=?, emp_lname=?
		WHERE empID=?";
$q = $boot->insertObject($sql,[$fn,$mn,$at,$ln,$id]);
header("location: Employee.php");

?>