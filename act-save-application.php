<?php

include_once 'site-header.php';
include_once 'lib-sql.php'; 

// displayDescriptionList($_POST);

$application_uid = quoted($_POST['application_uid']);
$company_uid = quoted($_POST['company_uid']);
$position_title = quoted($_POST['position_title']);
$position_url = quoted($_POST['position_url']);
$whats_next = quoted($_POST['quest_text']);
$applied_date = quoted($_POST['applied_date']);
$cover_letter_url = quoted($_POST['cover_letter_url']);
$followup_date = quoted($_POST['followup_date']);
$where_found = quoted($_POST['where_found']);
$priority = quoted($_POST['priority']);
$pros = quoted($_POST['pros_text']);
$cons = quoted($_POST['cons_text']);
$tech = quoted($_POST['tech_text']);
$whats_next = quoted($_POST['quest_text']);
$mention = quoted($_POST['mention_text']);
$people = quoted($_POST['people_text']);

$sql_query = "UPDATE `application` SET `company` = $company_uid, `position_title` = $position_title, `position_url` = $position_url, `whats_next` = $whats_next, `applied_date` = $applied_date, `cover_letter_url` = $cover_letter_url, `followup_date` = $followup_date, `position_found` = $where_found, `priority` = $priority, `pros` = $pros, `cons` = $cons, `tech` = $tech, `research_needed` = $whats_next, `mention` = $mention, `people` = $people WHERE `application`.`application_uid` = $application_uid;";

echo p($sql_query,"","");
$success = mysqli_query($sql_connection,$sql_query);

echo $success;

?>