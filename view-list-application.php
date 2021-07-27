
<?php
require_once "site-header.php";

// <>Main fuction - Do the things !!
$sql_query = "SELECT * FROM `application` as a LEFT JOIN `company` as c ON a.`company` = c.`company_uid` ORDER BY `priority` DESC, `a`.`applied_date` ASC";
$query_result = loadSQLinfo("application",$sql_connection,$sql_query);
// echo "<p>";
// var_dump($query_result);
// echo "</p>";

    // <> Display all applications in a table

echo openTableHeader($sql_query);
tableCell("App ID","uid");
tableCell("Position","position_title");
tableCell("Company","company_name");
tableCell("Location","");
tableCell("Next Steps","");
tableCell("Applied Date","");
tableCell("Cover Letter","");
tableCell("Follow-up Date","");
tableCell("Position Found","");
// tableCell(,""); 
closeTableHeader();


// Get the next line
foreach($query_result as $row) {
    // Translate the priority into a class string
    openRow(applicationPriorityClass($row['priority']));
    $application_uid = $row['application_uid'];
    tableCell(hyperlink($application_uid,"view-1-application.php?application_uid=".$application_uid,"application-link"),"uid");
    tableCell(hyperlink($row['position_title'],$row['position_url'],"position-link"),"position");
    tableCell(hyperlink($row['company_name'],$row['company_url'],"company-link"),"company");
    $location = $row['city'].", ".$row['state'];
    tableCell($location,"");
    tableCell($row['whats_next'],"");
    tableCell($row['applied_date'],"");
    tableCell($row['cover_letter_url'],"");
    tableCell($row['followup_date'],"");
    tableCell($row['position_found'],"");
    closeRow();

}

closeTable();
echo p($sql_query,"","view-log");



function arrayInfo($arr){
    echo p("Type: ".gettype($arr),"","view-log");
    echo p("Count: ".count($arr),"","view-log");
    var_dump($arr);
}


?>