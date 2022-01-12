<?php

require_once "lib-sql.php";

$application_uid = $_GET['app_uid'];

$sql_query = "DELETE FROM `application` WHERE `application`.`application_uid` = $application_uid";
$query_result = saveSQLinfo($sql_connection,$sql_query);
if(!$query_result){ die("SQL Query failed"); }
else { echo "Deleted application $application_uid."; }
?>