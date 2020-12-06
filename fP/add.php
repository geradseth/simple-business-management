<?php
$boot = require_once'core/bootstrap.php'; 
?>
<form action="add-prod.php" method="POST">
Product Category<br>
<select name="cat" class="ed" required="required">
	<option selected disabled value="">...Select Category...</option>
	<?php	
		$result = $boot->selectAll("SELECT * FROM categories ORDER BY catID ASC");

		foreach($result as $row){
		echo '<option value="'.$row['catID'].'">'.$row['cat_desc'].'</option>';
		}
	?>
</select><br /><br>
Quantity of Product<br>
<input type="number" name="qty" required><br><br>
Importing/Selling<br>
<select name="ImpSel" class="ed" required>
	<option selected="" disabled="" value="">...Select Option...</option>
	<?php	
		$result = $boot->selectAll("SELECT * FROM action_on_product ORDER BY action_id DESC");
		foreach($result as $row){
		echo '<option value="'.$row['action_id'].'">'.$row['action_desc'].'</option>';
		}
	?>
</select><br /><br>
Money Spent<br>
<input type="number" name="ms" required /><br><br>
<input type="submit" value="Save" />
</form>