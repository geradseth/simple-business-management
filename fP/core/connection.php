<?php
##.....--File To make Connection to our Servers(Host and Database).

/**
 * 
 */
class Connection
{
 public static function make($config){
	/*Try block to catch The Exception if 
	There could be Any problems to 
	connect to our Servers

	*/
	try{
		return new PDO("mysql:host=".$config['host'].
			";dbname=".$config['dname'].
			";charset=".$config['chars'],
			$config['uname'],
			$config['passwd'],
			$config['option']
		);
	}
	catch(PDOException $e){
		$e->getMessage();
		
	}
  }
}