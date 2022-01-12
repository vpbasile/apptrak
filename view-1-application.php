<?php

include_once "site-header.php";
require_once "lib-sql.php";

openForm("POST","act-save-application.php");
if(isset($_GET['application_uid'])){ $application_uid = $_GET['application_uid']; 
} else{ 
    echo "<h2>No id selected.</h2>";
}

    $sql_query = "SELECT * FROM `application` as a LEFT JOIN `company` as c ON a.`company` = c.`company_uid` WHERE `application_uid`=$application_uid;";
    $query_result = loadSQLinfo("application",$sql_connection,$sql_query);
    foreach($query_result as $row){
        echo textFieldInvisible('application_uid',$row['application_uid']);
        echo textFieldInvisible('company_uid',$row['company_uid']);
        echo h2($row['company_name'],"","rounded gold-back");
        echo p($row['city'].", ".$row['state'],"location","rounded back-gold");
        openDiv("","","pane float-left");
            openDiv("","button_div","");
            echo button("submit","Save changes","rounded");
            closeDiv();
            openDiv("","position_title","hoirzontalField");
                echo textField("Position Title",$row['position_title'],"Position Title",'position_title',"rounded bordered grayed");
            closeDiv();
            openDiv("","","hoirzontalField");
                echo textField("Position URL",$row['position_url'],"Position URL",'position_url',"rounded bordered grayed");
            closeDiv();
            openDiv("","","hoirzontalField");
                echo dateField("Applied Date",$row['applied_date'],"Applied Date",'applied_date',"rounded bordered grayed");
            closeDiv();
            openDiv("","","hoirzontalField");
                echo textField("Cover Letter URL",$row['cover_letter_url'],"Cover letter URL",'cover_letter_url',"rounded bordered grayed");
            closeDiv();
            openDiv("","","hoirzontalField");
                echo dateField("Followup Date",$row['followup_date'],"Followup Date",'followup_date',"rounded bordered grayed");
            closeDiv();
            openDiv("","","hoirzontalField");
                echo textField("Where found",$row['position_found'],"Where found",'where_found',"rounded bordered grayed");
            closeDiv();
            openDiv("","","hoirzontalField");
                echo textField("Priority",$row['priority'],"Priority",'priority',"rounded bordered grayed");
            closeDiv();
        closeDiv();
    echo "<div id='right-side'>";
        makePanel("Pros",$row['pros'],"pros","float-left");
        makePanel("Research Needed",$row['whats_next'],"quest","float-right");
        makePanel("Technology",$row['tech'],"tech","float-left");
        makePanel("Be sure to mention",$row['mention'],"mention","float-left");
        makePanel("People",$row['people'],"people","float-right");
        makePanel("Cons",$row['cons'],"cons","float-right");
        
    closeDiv();
    }

closeForm();
?>

