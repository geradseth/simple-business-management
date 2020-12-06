<?php
	$bt=require'core/bootstrap.php';
	$id=$_GET['id'];
	$result = $bt->deleteObject("DELETE FROM employee WHERE empID= ?",[$id]);
?>