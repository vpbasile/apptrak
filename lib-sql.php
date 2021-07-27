<?php

require_once "toaster.php";

// <> Load a SQl table named $sql_table_name
// $sql_connection is defined in lib-sql.php
function loadSQLinfo($sql_table_name,$sql_connection,$sql_query) {
    $sql_table_temp = mysqli_query($sql_connection,$sql_query);
    if($sql_table_temp===false){ die("SQL query failed: $sql_query"); }   
    $$sql_table_name = array(); // This is where we'll save everything
    // Load the application SQL table into $sql_table
    while ($row = mysqli_fetch_array($sql_table_temp, MYSQLI_ASSOC)) {
        //For each row
        $uid = $row[$sql_table_name.'_uid'];
        foreach ($row as $key => $val){ $$sql_table_name[$uid][$key] = $val; }
    }
    return $$sql_table_name;
}

function saveSQLinfo($sql_connection,$sql_query){return mysqli_query($sql_connection,$sql_query);}

?>