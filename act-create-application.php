<?php

include "site-header.php";
var_export($_GET);
$company_uid = $_GET['company_uid'];
$sql_query = "INSERT INTO `application` (`company`) VALUES ('$company_uid'); ";
$sql_result = saveSQLinfo($sql_connection,$sql_query);
if(!$sql_result) { die("SQL query failed: $sql_query"); }

$sql_query = "SELECT * FROM `application` as a LEFT JOIN `company` as c ON a.`company` = c.`company_uid` WHERE `company`=$company_uid ORDER BY `priority` DESC";
p($sql_query);
$application_data = mysqli_query($sql_connection,$sql_query);
if($application_data===false){die("SQL Query failed");}
foreach($application_data as $application){
    $infoString = "Created application ".$application['application_uid']." for ".$application['company'].".";
    p($infoString);
    $position_edit_url = "view-1-application.php?application_uid=";
    $position_edit_url .= $application['application_uid'];
    echo hyperlink("Edit",$position_edit_url);
}



?>