<?php
/**
 * Here is every Excution of 
 Query any other staff 
 to our mysql Server should Run Here.
 */
class QryExcution
{
	
	#...the connection variable
	protected $pdocon;
	protected $Trans;
	private $username;
	private $password;

	public function __construct($pdocon)
	{
		$this->pdocon = $pdocon;


		if(session_status() == PHP_SESSION_NONE)
		{
			session_start();//start session if session not start
		}
		$this->isConn = TRUE;
	}


		public function check_sessionl(){
		if (isset($_SESSION['user_logged_in'])) {
			return $_SESSION['user_logged_in'];
		}elseif (isset($_SESSION['admin_logged_in'])) {
			return $_SESSION['admin_logged_in'];
		}
		else echo "<script type=\"text/javascrip\">alert(\"you Are Not Authorised To update The field\"); window:Location=\"../index.php\"</script>";
	}


	public function selectAll($sql, $ops=[]){
		$stm = $this->pdocon->prepare($sql);
		$stm->execute($ops);
		return $stm->fetchAll();
	}


	public function selectData($sql, $ops = []){
     
     try{
		$stm = $this->pdocon->prepare($sql);
		$stm->execute($ops);
		$result = $stm->fetch();
		return $result;
	   }
	   catch(PDOExption $e){
	   	$e->getMessage();
	   }
	}


	public function insertObject($sql, $ops=[]){

    try{
		$stm = $this->pdocon->prepare($sql);
		$stm->execute($ops);
		return true;
	  }
	  catch(PDOExption $e){
	  	$e->getMessage();
	  }

	}


	public function updateObject($sql, $ops = []){

		return $this->insertObject($sql, $ops);
	}

	public function deleteObject($sql, $ops = []){

		return $this->insertObject($sql, $ops);
	}

	public function lastObj(){
		return $this->pdocon->lastInsertId();
	}
     
     #this going to excute the query in transction form
     public function dbTransactionInsert($sql, $ops = [], $sql2, $ops1 = []){

     	$this->Trans->beginTransaction();
     	$stm = $this->pdocon->prepare($sql);
     	$stm->execute($ops);

     	$stm = $this->pdocon->prepare($sql2);
     	$stm->execute($ops1);
     	return $this->Trans->comitTrans();
     }





	public function beginTrans(){
		return $this->pdocon->beginTransaction();

	}

	public function comitTrans(){
		return $this->pdocon->commit();
	}


	public function getEmpId(){
		if (session_status()==PHP_SESSION_NONE) {
			session_start();
			//return $_SESSION['logged_in'];
			return 1;
		}
	}


		public function b_report($choice,$sd,$td)
	{
		$sql = "";
		if($choice == 'all'){
			$sql = "SELECT *
					FROM products p 
					INNER JOIN categories c 
					ON p.cat_id = c.catID
					INNER JOIN action_on_product a
					ON p.actionID = a.action_id
					INNER JOIN employee e
					ON p.emplo_id = e.empID
                    AND p.business_date BETWEEN ? AND ?
					";
			return $this->selectAll($sql,[$sd,$td]);
		}else if($choice == 'sold'){
			$sql = "SELECT *
					FROM products p 
					INNER JOIN categories c 
					ON p.cat_id = c.catID
					INNER JOIN action_on_product a
					ON p.actionID = a.action_id
					INNER JOIN employee e
					ON p.emplo_id = e.empID
					WHERE p.actionID = ?
                    AND p.business_date BETWEEN ? AND ?";
			return $this->selectAll($sql, [2,$sd,$td]);
		}else if($choice == 'purch'){
			$sql = "SELECT *
					FROM products p
					INNER JOIN categories c
					ON p.cat_id = c.catID
					INNER JOIN action_on_product a
					ON p.actionID = a.action_id
					INNER JOIN employee e
					ON p.emplo_id = e.empID
					WHERE p.actionID  = ?
					AND p.business_date BETWEEN ? AND ?
					";
			return $this->selectAll($sql, [1,$sd,$td]);
		}elseif($choice=='deb'){
			//condemed
			$sql = "SELECT *
					FROM products p 
					INNER JOIN categories c 
					ON p.cat_id = c.catID
					INNER JOIN action_on_product a
					ON p.actionID = a.action_id
					INNER JOIN employee e
					ON p.emplo_id = e.empID
					WHERE p.actionID  = ?
					AND p.business_date BETWEEN ? AND ?
					ORDER BY p.business_date DESC";
			return $this->selectAll($sql, [3,$sd,$td]);
		}
	}//end item_report



	public function set_un_pwd($username, $password)
	{
		$this->username = $username;
		$this->password = $password;
	}	

	//This function check if there is any User in db

	public function check_numberOfUsers(){
		$sql = "SELECT COUNT(userID) FROM tbl_user";
		$result = $this->selectData($sql);
		return $result;
	}
	
	public function check_user()
	{
		
		$at_school = 1;//1 if he or she is still working at this School
		$sql = "SELECT *
				FROM employee e
				INNER JOIN emp_type t
				ON t.type_id = e.type_id
				WHERE emp_lname = ?
				AND emp_pass = ?
				AND e.working_status = ?
		";
		$result = $this->selectData($sql, [$this->username, $this->password, $at_school]);
		return $result;

	}


	public function get_user_id()
	{
		$type = 1;//User Type At this school
		$at_deped = 1;//1 if he or she is still working at school
		$sql = "SELECT empID
				employee e
				INNER JOIN emp_type t
				ON t.type_id = e.type_id
				WHERE e.emp_lname = ?
				AND e.emp_pass =?
				AND e.working_status = ?
		";
		$result = $this->selectData($sql, [$this->username, $this->password, $at_deped]);
		return $result;
	}

	public function user_session()
	{
		if(!isset($_SESSION['user_logged_in'])){
			header('location: login.php');
		}
	}


	public function user_logout()
	{
		unset($_SESSION['user_logged_in']);
		header('location: login.php');
	}

	public function student_session()
	{
		if(!isset($_SESSION['student_logged_in'])){
			header('location: login.php');
			$this->Disconnect();
		}
	}

	public function student_logout()
	{
		unset($_SESSION['student_logged_in']);
		header('location: login.php');
	}	


	public function admin_session()
	{
		if(!isset($_SESSION['admin_logged_in'])){
			header('location: login.php');
			$this->Disconnect();
		}
	}

	public function admin_logout()
	{
		unset($_SESSION['admin_logged_in']);
		header('location: login.php');
	}


	public function admin_data()
	{
		/*get admin user and password through session id*/
		$at_school = 1;//1 means work at School other wise not an employee of the school
		$id = $_SESSION['admin_logged_in'];//Admin Session created during login
		$sql = "SELECT *
				FROM employee 
				WHERE empID = ?
				AND emp_at_school = ?
		";
		return $this->selectData($sql, [$id, $at_school]);

	}

	public function Disconnect(){
		$this->pdocon = NULL;//close connection in PDO
		$this->isConn = FALSE;
	}


		public function bsummary($choice,$sd,$td)
	{
		$sql = "";
		if($choice == 'all'){
			$sql = "SELECT 
					(SELECT SUM(amount_money) FROM products p WHERE actionID = 1 AND p.business_date BETWEEN ? AND ?) as TP,  
				    (SELECT SUM(amount_money) FROM products p WHERE actionID = 2 AND p.business_date BETWEEN ? AND ?) as TS,
					(SELECT SUM(cost) FROM expenses e WHERE e.exp_date BETWEEN ? AND ?) as TE,
					(SELECT SUM(amount_money) FROM products p WHERE actionID = 3 AND p.business_date BETWEEN ? AND ?) as TD
                    
					";
			return $this->selectAll($sql,[$sd,$td, $sd,$td, $sd,$td, $sd,$td]);
		}
	}//end item_report


}
