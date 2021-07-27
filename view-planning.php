<?php
require_once "site-header.php";

// <>Main fuction - Do the things !!

//  <> Weekly Routine
include "routine.html";


echo h2("Applications that need action","apps","gold-back rounded");
// <> Query: Applications that need action
$sql_query = "SELECT * FROM `application` AS a LEFT JOIN `company` AS c ON a.`company` = c.`company_uid` WHERE DATE(`followup_date`) >= CURDATE() OR `applied_date`='0000-00-00' ORDER BY `a`.`applied_date` ASC, `priority` DESC;";
$query_result = loadSQLinfo("application",$sql_connection,$sql_query);


// <> Display all applications in a table
echo openTableHeader($sql_query);
tableCell("App ID","uid");
tableCell("Position","position_title");
tableCell("Company","company_name");
tableCell("Location","");
tableCell("Next Steps","");
tableCell("Applied Date","");
tableCell("Cover Letter","");
tableCell("Phone","");
tableCell("Position Found","");
// tableCell(,""); 
closeTableHeader();

// Get the next line
foreach($query_result as $row) {
    // arrayInfo($application_data);
    $class_string = "";
    $priority = $row['priority'];
    if($priority>0) $class_string="back-gold";
    if($priority==0) $class_string="back-blue";
    if($priority==-1) $class_string="back-gray";
    if($priority<-1) $class_string="back-purple";
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
    tableCell($row['position_found'],"");
    closeRow();
}
closeTable();

// <> 

echo h2("Companies that I have not applied to","companies","gold-back rounded");
// <> Query: Companies that have no application
$sql_query = "SELECT * FROM `company` AS c LEFT JOIN `application` AS a ON a.`company` = c.`company_uid` WHERE `application_uid` IS NULL ORDER BY c.`class` DESC, c.`state` DESC;";

$query_result = loadSQLinfo("company",$sql_connection,$sql_query);

echo openTableHeader($sql_query);
tableCell("Company Name");
tableCell("City");
tableCell("State");
tableCell("Position");
// tableCell("Priority");
closeTableHeader();
openForm("POST","act-create-company.php");
openRow("");
tableCell(textFieldHiddenLabel("Company name","","Enter Company Name","company_name","round-left"),"");
tableCell(textFieldHiddenLabel("City","","Enter City","city","squared"),"");
tableCell(textFieldHiddenLabel("State","","Enter State","state","squared"),"");
tableCell(button("round-right"));
// tableCell(textFieldHiddenLabel("Priority","","Priority","priority","round-right"),"");
closeRow();
closeForm();

foreach($query_result as $row){ 
    switch($row['class']) {
        case 1: $class_string = "back-gold"; break;
        case -1: $class_string = "back-gray"; break;
        default: $class_string = "back-blue"; break;
    }
    openRow($class_string);
    $company_uid = $row['company_uid'];
    $url = $row['company_url'];
    if($url!==""){ tableCell(hyperlink($row['company_name'],$url)); 
    } else tableCell($row['company_name']);
    tableCell($row['city']);
    tableCell($row['state']);
    $sql_query = "SELECT `position_title`,`application_uid` FROM `application` WHERE `company`=$company_uid;";
    $position = mysqli_query($sql_connection,$sql_query);
    // There must be a better way to do this
    // tableCell(var_dump($position));
    if (mysqli_num_rows($position)>0) {
        foreach($position as $val){
            $position_title = $val['position_title'];
            $position_edit_url = "view-1-application.php?application_uid=";
            $position_edit_url .= $val['application_uid'];
            tableCell(hyperlink($position_title,$position_edit_url));        
        }
    } else { tableCell(hyperlink("[Create application]","act-create-application.php?company_uid=$company_uid")); }
    // tableCell($row['class']);
    closeRow();
}

closeTable();


?>