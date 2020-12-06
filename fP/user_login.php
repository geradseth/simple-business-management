<?php 
$er = require_once('core/bootstrap.php');

if(isset($_POST['data'])){
	$data = json_decode($_POST['data'], true);
	$un = $data[0];
	$pwd = md5($data[1]);

	$er->set_un_pwd($un, $pwd);//setter
	$user_exist = $er->check_user();
	$result['valid'] = false;

    //Checking if User Logged in And Allow him to Proceed


	if($user_exist > 0){
		// Wolaaah we the user exsisting
		$result['valid'] = true;
		if($user_exist['type_id'] == 1){
			//1 means normal emp or user
			$_SESSION['user_logged_in'] = $user_exist['empID'];
			$result['url'] = 'index.php';
		}else{
			//2 means system admin at company
			$_SESSION['admin_logged_in'] = $user_exist['empID'];
			$result['url'] = 'aindex.php';
		}
	}
	else{
		// The message To show if THe user Name Or Password is Wrong
		$result['msg'] = "Invalid username or password";
	}
	echo json_encode($result);

}
