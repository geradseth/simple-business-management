<?php
// configuration
$boot = require_once'core/bootstrap.php'; 

// new data
$date = $_POST['bsdate'];
$prod = $_POST['pa'];
$cat = $_POST['catid'];
$am = $_POST['am'];
$act = $_POST['ad'];
$id = $_POST['memids'];
// query
$sql = "UPDATE products
        SET business_date=?, product_amount=?, cat_id=?, amount_money=?, actionID=?
		WHERE prod_id=?";
$q = $boot->insertObject($sql,[$date,$prod,$cat,$am,$act,$id]);
header("location: index.php");

?>