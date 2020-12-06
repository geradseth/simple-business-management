<?php
	$bt=require'core/bootstrap.php';
	$id=$_GET['id'];
	$result=$bt->selectAll("SELECT * FROM categories WHERE catID=?",[$id]);
		foreach($result as $row){
	?>
<form action="saveecat.php" method="post">
	<input type="hidden" name="catid" value="<?=$row['catID'];?>">
Category Name<br>
<input type="text" name="catname" value="<?=$row['cat_desc'];?>" />
<br>
Product in Store<br>
<input type="number" name="catqt" value="<?=$row['qts'];?>"/>
<br>
<input type="submit" value="Save">
</form>
<?php } ?>