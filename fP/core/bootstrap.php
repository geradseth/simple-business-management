<?php
/**
*This is For Innitialization of Connection The Database
**/

$db = require'dbconf.php';

require_once'core/connection.php';
require_once'core/qryexcution.php';

/**
*This return the Connection to our Database and 
*Innitializing The Query Excution Class
**/
return new QryExcution(Connection::make($db['database']));
?>
