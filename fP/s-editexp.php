<?php
// configuration
$boot = require_once'core/bootstrap.php'; 

// new data
$sd = $_POST['sd'];
$ds = $_POST['ds'];
$sa = $_POST['sa'];
$id = $_POST['eid'];
// query
$sql = "UPDATE expenses
        SET exp_date=?, cost=?, expense_desc=?
		WHERE id=?";
$q = $boot->updateObject($sql,[$ds,$sa,$sd,$id]);
header("location: expenses.php");

?>