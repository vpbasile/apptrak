<?php

require_once "lib-structure.php";

// Set up the SQL connection
$dbServername="localhost";
$dbUsername="root";
$dbPassword="";
$dbName="app_trak";
$sql_connection=mysqli_connect($dbServername,$dbUsername,$dbPassword,$dbName);
// Check connection
if (!$sql_connection) {
    die("SQL connection failed: " . mysqli_connect_error());
} else {
    echo "<h1>* ".$dbName." CRUD DBMS</h1>";
} 

?>