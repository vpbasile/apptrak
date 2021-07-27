<?php
include_once "site-header.php";
require_once "lib-sql.php";
require_once "lib-structure.php";

$sql_query = "SELECT * FROM `company` ORDER BY `company`.`class` DESC, `company`.`state` DESC";

$query_result = loadSQLinfo("company",$sql_connection,$sql_query);

if($query_result===null){ 
    h2("Nope","alert");
    die();
}

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