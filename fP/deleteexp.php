<?php
	$boot=require_once'core/bootstrap.php';
	$id=$_GET['id'];
	$result['done'] = $boot->deleteObject("DELETE FROM expenses WHERE id= ?",[$id]);
	if ($result['done']) {
		$result['done']="Data Deleted Succesifully";
	}
	echo json_encode($result);
?>