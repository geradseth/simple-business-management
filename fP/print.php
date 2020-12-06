<!DOCTYPE html>
<html lang="en">
<?php 
$bt = require_once('core/bootstrap.php');
if(isset($_GET['choice'])){
    $choice = $_GET['choice'];
    $sd = $_GET['sdate'];
    $td = $_GET['tdate'];

    $reports = $bt->b_report($choice,$sd,$td);
    // echo '<pre>';
    //  print_r($reports);
    // echo '</pre>';

?>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>My Report Printing</title>

    <!-- Bootstrap Core CSS -->
<style type="text/css">
table { border-collapse: separate; background-color: #FFFFFF; border-spacing: 0; width: 80%; color: #666666; text-shadow: 0 1px 0 #FFFFFF; border: 1px solid #CCCCCC; box-shadow: 0; margin: 0 auto;font-family: arial; }
table thead tr th { background: none repeat scroll 0 0 #EEEEEE; color: #222222; padding: 10px 14px; text-align: left; border-top: 0 none; font-size: 12px; }
table tbody tr td{
    background-color: #FFFFFF;
    font-size: 12px;
    text-align: left;
    padding: 10px 14px;
    border-top: 1px solid #DDDDDD;
}

</style>


</head>
<body>


<center>
    <h2>My Business Inventory as Of</h2>
    <h3><?= date('m-d-Y'); ?></h3>
</center>

<br />
<div class="table-responsive">
       <table id="myTable-report" class="table table-bordered table-hover" cellspacing="0" width="100%">
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
            $fN = $r['emp_fname'];
            $mN = $r['emp_mname'];
            $lN = $r['emp_lname'];
            $fullName = ucwords($fN.' '.$mN.' '.$lN);
        ?>
            <tr>
                <td><?= $r['cat_desc']; ?></td>
                <td><?= $r['business_date']; ?></td>
                <td><?= $r['action_desc']; ?></td>
                <td><?= $r['amount_money']; ?></td>
                <td><?= $fullName; ?></td>
                <td><?= $r['product_amount']; ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
</div>


    <script type="text/javascript">
        print();
    </script>
</body>
</html>

<?php

    // echo $choice;
}//end isset


