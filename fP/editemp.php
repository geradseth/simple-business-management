<?php
	$boot = require_once'core/bootstrap.php'; 
	$id=$_GET['id'];
	$result = $boot->selectAll("SELECT * FROM employee WHERE empID= ?",[$id]);
	foreach($result as $rows){
?>

<form action="editempp.php" method="post">
<input type="hidden" name="eid" value="<?=$rows['empID'];?>" />
<br>
First Name<br>
<input type="text" name="FN" value="<?=$rows['emp_fname'];?>"/>
<br>
Middle Name<br>
<input type="text" name="MN" value="<?=$rows['emp_mname'];?>"/>
<br>
Last Name<br>
<input type="text" name="LN" value="<?=$rows['emp_lname'];?>"/>
<br>
Working Here<br>
<input type="checkbox" name="atwk" checked/>
<br>
<input type="submit" value="Save">
</form>
<?php } ?>