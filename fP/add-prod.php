<?php
$bt = require_once'core/bootstrap.php';

$cat_id = $_POST['cat'];
$prod_amount = $_POST['qty'];
$desc = $_POST['ImpSel'];
$price = $_POST['ms'];
$emp=$bt->check_sessionl();

#..Check Product in Store
$pis = $bt->selectData("SELECT qts FROM categories WHERE catID = ?",[$cat_id]);

// query
$sql = "INSERT INTO products (cat_id,emplo_id,actionID,business_date,product_amount,amount_money) VALUES (?,?,?,NOW(),?,?)";

  ##...Check to deduct or add product to the store
if ($desc == 1) {

    $q = $bt->insertObject($sql,[$cat_id, $emp, $desc, $prod_amount, $price]);

	$query = "UPDATE categories SET qts = qts + ? WHERE catID = ?;";
	$bt->updateObject($query, [$prod_amount, $cat_id]);
	header("location: index.php");

}elseif($desc == 2 || $desc == 3) {

	if($pis['qts']>=$prod_amount){
    echo "reached";
	$bt->insertObject($sql,[$cat_id, $emp, $desc, $prod_amount, $price]);
	$query = "UPDATE categories SET qts = qts - ? WHERE catID = ?;";
	$bt->updateObject($query, [$prod_amount, $cat_id]);
	header("location: index.php");
}
	else{
		echo "<script type = \"text/javascript\"> 
		alert(\"There is No enough Product in store\")
		window.location = \"index.php\"
		</script>";
	}
}


?>