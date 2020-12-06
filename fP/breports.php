<?php
//Iclude The Bootstrap for the mysql servers

$boot = require_once'core/bootstrap.php';
$boot->admin_session();
?>
<style>
body {
	background: #0ca3d2;
}
table { border-collapse: separate; background-color: #FFFFFF; border-spacing: 0; width: 80%; color: #666666; text-shadow: 0 1px 0 #FFFFFF; border: 1px solid #CCCCCC; box-shadow: 0; margin: 0 auto;font-family: arial; }
table thead tr th { background: none repeat scroll 0 0 #EEEEEE; color: #222222; padding: 10px 14px; text-align: left; border-top: 0 none; font-size: 12px; }
table tbody tr td{
    background-color: #FFFFFF;
	font-size: 12px;
    text-align: left;
	padding: 10px 14px;
	border-top: 1px solid #DDDDDD;
}
.btn-success{
	background: url("img/prt.png");
	border: 1px solid #3ec;
	color: blue;
}
#log {
	width: 80%;
	text-align: right;
	margin: 20px auto;
	
	font-family: arial;
}
#log a {
	color: #FFFFFF;
	text-decoration: none;
	font-family: arial;
}
#formdesign1 {
	background: linear-gradient(to bottom, #3fd 0%, #ee3 100%) repeat scroll 0 0 rgba(0, 0, 0, 0);
    border: 1px solid #D5D5D5;
    padding: 12px;
    position: relative;
	margin: 20px auto;
	width: 78%;
	clear: both;
	height: 110px;
}
#filter {
	-moz-box-sizing: border-box;
    background: url("img/big_search.png") no-repeat scroll 10px 10px #FFFFFF;
    box-shadow: none;
    display: block;
    font-size: 12px;
    height: 34px;
    padding: 9px 140px 9px 28px;display: block;
    font-size: 12px;
    height: 34px;
    padding: 9px 140px 9px 28px;
    width: 85%;
	border: 1px solid #DADADA;
    transition: border 0.2s linear 0s, box-shadow 0.2s linear 0s;
	padding-top: 6px;
	float: left;
}
#add {
	float: right;
	width: 8.5%;
	display: block;
    font-size: 12px;
    height: 14px;
    padding: 9px 28px 9px 28px;
	border: 1px solid #DADADA;
}
a#add {
	text-decoration: none;
	color: #666666;
	font-family: arial;
	font-size: 12px;
}

</style>
<!--sa poip up-->
<link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
	<script src="argiepolicarpio.js" type="text/javascript" charset="utf-8"></script>

    <script src="lib/jquery.js" type="text/javascript"></script>
  <script src="src/facebox.js" type="text/javascript"></script>
  <script src="js/application.js" type="text/javascript" charset="utf-8"></script>
  <script type="text/javascript">
    jQuery(document).ready(function($) {
      $('a[rel*=facebox]').facebox({
        loadingImage : 'src/loading.gif',
        closeImage   : 'src/closelabel.png'
      })
    })
  </script>
<div id="log">
<a href="aindex.php">Home</a> |<a href="Employee.php">  Employee </a> | <a href="aprod-categories.php">Product Categories </a> |<a href="aexpenses.php">Expense</a>| Reports | <a href="admin_logout.php">Logout</a>
</div>
<div id="formdesign1">


 	<div class="panel-heading">
        <span class="glyphicon glyphicon-list" aria-hidden="true"></span>
        All Item Status Report Please select Report type
            <p><b>Report: </b><select class="btn btn-default" id="report-cat" disabled>
                  <option value="i">products</option>
                  <option value="ind">branch</option>
                  <option value="ord">Orders</option>
                  <option value="s">Sales</option>
                </select></p>
              </div>
  	  			<div class="panel-body">
              <!-- main content -->
              <b>Filter:</b>
                <select class="btn btn-default" id="report-choice">
                  <option selected="true" value="all">All</option>
                  <option value="sold">Sold</option>
                  <option value="purch">Purchased</option>
                  <option value="deb">Debted</option>
                </select><b>Since:</b>
                <input type="date" id="sinced" value="<?php echo  date('2020-07-01');?>"><b>To:</b>
                <input type="date" id="tod" value="<?php echo date('Y-m-d');?>">            
                <button id="print-btn" type="button" class="btn btn-success">
                <b>PRINT</b>
                <span class="glyphicon glyphicon-print" aria-hidden="true"></span>
                </button>

           </div>
       </div><br>

                <div id="show-report"></div>

                
                <div id="show-summary"></div>


<footer>



<script type="text/javascript">
	
/*
*Reports generated here
*/
$("#report-choice").change( function(event) {
	event.preventDefault();
	/* Act on the event */
	var choice = $('#report-choice').val();
	var sincedate = $('#sinced').val();
	var todate = $('#tod').val();
	$.ajax({
			url: 'show_report.php',
			type: 'post',
			data: {
				choice: choice,
				sdate : sincedate,
				tdate : todate
			},
			success: function (data) {
				$('#show-report').html(data);
			},
			error: function(){
				alert('Error: There Was an Error Fetching Report Check the input data , Check your choice');
			}
		});
});



function show_report(){
	$.ajax({
			url: 'show_report.php',
			type: 'post',
			data: {
				choice: 'all',
				sdate: document.getElementById('sinced').value,
				tdate: document.getElementById('tod').value
			},
			success: function (data) {
				$('#show-report').html(data);
			},
			error: function(){
				alert('Server Error: Something Went Wrong');
			}
		});
}//end function show_report
show_report();

$('#print-btn').click(function(event) {
	/* Act on the event */
	var choice = $('#report-choice').val();
	var sdate = $('#sinced').val();
	var tdate = $('#tod').val();
	window.open('print.php?choice='+choice+'&sdate='+sdate+'&tdate='+tdate,'name','width=600,height=400');
});


/*
*business summary javascript
*/
$("#report-choice").change( function(event) {
	event.preventDefault();
	/* Act on the event */
	var choice = $('#report-choice').val();
	var sincedate = $('#sinced').val();
	var todate = $('#tod').val();
	$.ajax({
			url: 'show-summary.php',
			type: 'post',
			data: {
				choice: choice,
				sdate : sincedate,
				tdate : todate
			},
			success: function (data) {
				$('#show-summary').html(data);
			},
			error: function(){
				alert('Error: There Was an Error Fetching Report summary Check the input data');
			}
		});
});




function bsummary(){
	$.ajax({
        url: "show-summary.php",
        type: "post",
        data: {
				choice: 'all',
				sdate: document.getElementById('sinced').value,
				tdate: document.getElementById('tod').value
			},
			success: function(data){
				$("#show-summary").html(data);
			},
			error: function(){
				alert("There was a problem on reporting summary");
			}
	});
}
bsummary();


</script>
</footer>