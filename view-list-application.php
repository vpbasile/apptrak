
<?php
require_once "site-header.php";

// <>Main fuction - Do the things !!
$sql_query = "SELECT * FROM `application` as a LEFT JOIN `company` as c ON a.`company` = c.`company_uid` LEFT JOIN `person` as p ON a.`followup_person` = p.`person_uid` ORDER BY `priority` DESC";
$query_result = loadSQLinfo("application",$sql_connection,$sql_query);
// echo "<p>";
// var_dump($query_result);
// echo "</p>";

    // <> Display all applications in a table

openTableHeader();
tableCell("App ID","uid");
tableCell("Position","position_title");
tableCell("Company","company_name");
tableCell("Location","");
tableCell("Next Steps","");
tableCell("Applied Date","");
tableCell("Cover Letter","");
tableCell("Follow-up Date","");
tableCell("Follow-up Person","");
tableCell("Phone","");
tableCell("Position Found","");
// tableCell(,""); 
closeTableHeader();


// Get the next line
foreach($query_result as $row) {

    // arrayInfo($application_data);
    switch($row['priority']) {
        case 1: $class_string = "back-gold"; break;
        case -1: $class_string = "back-gray"; break;
        default: $class_string = "back-blue"; break;
    }
    openRow($class_string);
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
    tableCell($row['person_name'],"");
    tableCell($row['phone'],"");
    tableCell($row['position_found'],"");
    closeRow();

}

closeTable();



function arrayInfo($arr){
    echo p("Type: ".gettype($arr),"","view-log");
    echo p("Count: ".count($arr),"","view-log");
    var_dump($arr);
}


?>