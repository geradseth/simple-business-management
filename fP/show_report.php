<?php 
$bt = require_once('core/bootstrap.php');
if(isset($_POST['choice'])){
	$choice = $_POST['choice'];
	$sd = $_POST['sdate'];
	$td = $_POST['tdate'];



	$reports = $bt->b_report($choice,$sd,$td);
	// echo '<pre>';
	// 	print_r($reports);
	// echo '</pre>';
    $summary = $bt->bsummary($choice,$sd,$td);

?>

<br />
<br />
<table cellspacing="0" cellpadding="2" id="resultTable">
	<thead>
	    <tr>
	        <th>Product Category</th>
	        <th>Date</th>
	        <th>Status</th>
	        <th>Amount</th>
	        <th>Processed By</th>
	        <th>Product Processed</th>
	    </tr>
	</thead>
    <tbody>
    	<?php foreach($reports as $r): 
    		$ct = $r['cat_desc'];
    		$q = $r['qts'];
            $bd = $r['business_date'];
    		$ad = $r['action_desc'];
    		$am= $r['amount_money'];
    		$pa= $r['product_amount'];
    		$pb = $r['emp_fname']." ".$r['emp_lname'];

    		$fullName = ucwords($pb);
    	?>
    		<tr>
    			<td><?= $ct; ?></td>
    			<td><?= $bd; ?></td>
    			<td><?= $ad; ?></td>
    			<td><?= $am; ?></td>
    			<td><?= $pb; ?></td>
    			<td><?= $pa; ?></td>
    		</tr>
    	<?php endforeach; ?>
    </tbody>
</table>

<?php
	// echo $choice;
}//end isset