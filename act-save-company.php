<?php

include_once 'lib-sql.php'; 

$name = quoted($_POST['company_name']);
$url = quoted($_POST['url']);
$city = quoted($_POST['city']);
$state = quoted($_POST['state']);
    
$sql_query = "INSERT INTO `company` (`company_uid`,`name`, `url`,`city`,`state`) VALUES (NULL, $name, $url, $city, $state);";
echo p($sql_query,"","");
$success = mysqli_query($sql_connection,$sql_query);

include_once 'list.php';

?>