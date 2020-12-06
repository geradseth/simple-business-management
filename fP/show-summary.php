<?php 
$bt = require_once('core/bootstrap.php');
if(isset($_POST['choice'])){
	$choice = $_POST['choice'];
	$sd = $_POST['sdate'];
	$td = $_POST['tdate'];


    $summary = $bt->bsummary($choice,$sd,$td);

?>

<br />
<br />
<table cellspacing="0" cellpadding="2" id="resultTable">
	<thead>
        <tr>
            <th colspan="3"><h1><b>Business Summary Since <?= $sd; ?> To <?= $td; ?> </b></h1></th>
        </tr>
	    <tr>
	        <th>Total Purchases</th>
	        <th>Total Expenses</th>
	        <th>Total Sales</th>
            <th>Total DEBTS</th>
	    </tr>
	</thead>
    <tbody>
    	<?php foreach($summary as $r): 
    		$tp = $r['TP'];
    		$te = $r['TE'];
            $ts = $r['TS'];
            $td = $r['TD'];
    	?>
    		<tr>
    			<td><?= $tp; ?></td>
    			<td><?= $te; ?></td>
    			<td><?= $ts; ?></td>
                <td><?= $td; ?></td>
    	<?php endforeach; ?>
    </tbody>
</table>

<?php
	// echo $choice;
}//end isset