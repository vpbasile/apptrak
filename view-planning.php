<?php
require_once "site-header.php";

// <>Main fuction - Do the things !!

//  <> Weekly Routine
openDiv("","routine","clearfix");
include "routine.html";
makePanel("Notes","Placeholder","");
closeDiv();

openDiv("","action");
echo h2("Applications that need action","apps","gold-back rounded");
// <> Query: Applications that need action
$sql_query = "SELECT * FROM `application` AS a LEFT JOIN `company` AS c ON a.`company` = c.`company_uid` WHERE DATE(`followup_date`) >= CURDATE() OR `applied_date`='0000-00-00' ORDER BY `priority` DESC, `a`.`applied_date` ASC;";
$query_result = loadSQLinfo("application",$sql_connection,$sql_query);
applicationTable($sql_query,$query_result);
closeDiv();

echo h2("Companies that I have not applied to","companies","gold-back rounded");
// <> Query: Companies that have no application
$sql_query = "SELECT * FROM `company` AS c LEFT JOIN `application` AS a ON a.`company` = c.`company_uid` WHERE `application_uid` IS NULL ORDER BY c.`class` DESC, c.`state` DESC;";

$query_result = loadSQLinfo("company",$sql_connection,$sql_query);

// <> Company table
companyTable($sql_query,$query_result,$sql_connection);


?>