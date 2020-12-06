<?php
/**
*---This Is Index of our Project 6371km
**/
$dbr = require'core/bootstrap.php';


$srt = $dbr->selectAll('select * from categories');

echo "<pre>";
print_r($srt);
echo "</pre>";
?>
<button onclick="prm()">click me</button>
<script type="text/javascript"></script>
