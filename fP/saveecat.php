<?php
$bt=require'core/bootstrap.php';

$cat = $_POST['catname'];
$cis = $_POST['catqt'];
$cid = $_POST['catid'];

$result = $bt->updateObject("UPDATE categories
               SET cat_desc=?, qts=? WHERE catID = ?",[$cat, $cis, $cid]);
if ($result) {
	header("location: prod-categories.php");
}else echo "There was an Error";
 ?>