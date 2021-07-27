<?php
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Cache-Control: no-store, no-cache, must-revalidate');
header('Cache-Control: post-check=0, pre-check=0', FALSE);
header('Pragma: no-cache');
?>

<!DOCTYPE html>
<html lang="en-us">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<title>Application Tracker</title>
<meta name="description" content="">
<meta name="author" content="">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="lcars.css">
<style>
</style>
</head>
<body>
<img src="img/apptrak.png" style="width: 33%;float: right;">
<?php 

require_once "lib-sql.php";
require_once "lib-structure.php";
require_once "lib-app.php";
include_once 'site-nav.php';

// echo "<hr>";

?>