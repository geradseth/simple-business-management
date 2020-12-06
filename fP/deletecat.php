<?php
	$bt=require'core/bootstrap.php';
	$id=$_GET['id'];
	$result = $bt->deleteObject("DELETE FROM categories WHERE catID= ?",[$id]);
?>