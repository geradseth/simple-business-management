<?php
	$boot = require_once'core/bootstrap.php'; 
	$id=$_GET['id'];
	$result = $boot->selectAll("SELECT * FROM products p
	INNER JOIN action_on_product a 
	ON p.actionID=a.action_id 
	INNER JOIN categories c
	ON p.cat_id=c.catID WHERE prod_id= ?",[$id]);
	foreach($result as $rows){
?>
<form action="edit.php" method="POST">
<input type="hidden" name="memids" value="<?php echo $id; ?>" />
Date<br>
<input type="text" name="bsdate" value="<?php echo $rows['business_date']; ?>" /><br><br>
Received By<br>
<input type="text" name="pa" value="<?php echo $rows['product_amount']; ?>" /><br><br>
Document Type<br>
<select name="catid" class="ed">
	<?php
	echo '<option selected value="'.$rows['cat_id'].'">'.$rows['cat_desc'].'</option>';	
		$result = $boot->selectAll("SELECT * FROM categories WHERE 1");
		foreach($result as $row){
		echo '<option value="'.$row['catID'].'">'.$row['cat_desc'].'</option>';
		}
	?>
</select><br /><br>
Cost<br>
<input name="am" value ="<?php echo $rows['amount_money']; ?>"/><br><br>
Import/Sold<br>
<select name="ad" class="ed">
	<?php
	echo '<option selected value="'.$rows['actionID'].'">'.$rows['action_desc'].'</option>';	
		$result = $boot->selectAll("SELECT * FROM action_on_product");
		foreach($result as $row){
		echo '<option value="'.$row['action_id'].'">'.$row['action_desc'].'</option>';
		}
	?>
</select><br /><br>
<input type="submit" value="Save" />
</form>
<?php
	}
?>