<?php

include_once "site-header.php";
$company_name = quoted($_POST['company_name']);
$city = quoted($_POST['city']);
$state = quoted($_POST['state']);
$priority = quoted($_POST['priority']);

$sql_query = "INSERT INTO `company` (`company_name`,`city`,`state`,`class`) 
VALUES ($company_name,$city,$state,$priority); ";
$query_result = saveSQLinfo($sql_connection,$sql_query);
if(!$query_result){ 
    h2("$sql_query failed","alert");
    die();
}

h2("$company_name created","alert");

include "view-list-company.php";
?>