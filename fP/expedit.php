<?php
	$bt=require'core/bootstrap.php';
	$id=$_GET['id'];
	$result=$bt->selectAll("SELECT * FROM expenses WHERE id=?",[$id]);
		foreach($result as $row){
	?>
<form action="s-editexp.php" method="post">
<input type="hidden" name="eid"  value="<?=$row['id'];?>"/>
<br>
Spent Description<br>
<input type="text" name="sd" value="<?=$row['expense_desc'];?>" />
<br>
Spent Amount<br>
<input type="text" name="sa"  value="<?=$row['cost'];?>"/>
<br>
Date Spent<br>
<input type="text" name="ds"  value="<?=$row['exp_date'];?>"/>
<br>
<input type="submit" value="Save">
</form>
<?php }  ?>