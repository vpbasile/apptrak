<?php

function applicationTable($sql_query,$query_result){
    // <> Display all applications in a table
    // <> Header
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
    closeTableHeader();

    // Get the next line
    foreach($query_result as $row) {    // Translate the priority into a class string
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
        // tableCell(hyperlink("Delete","act-delete-application.php?app_uid=$application_uid"),"alert");
        tableCell(deleteButton("application","round-right"));
        closeRow();
    }
    closeTable();
}

// <> Translate `application`.`priority` into a class $class_string
function applicationPriorityClass($priority){
    // if($priority>0) $class_string="back-gold";
    // if($priority==0) $class_string="back-blue";
    // if($priority==-1) $class_string="back-gray";
    // if($priority<-1) $class_string="back-purple";
    if($priority==3) $class_string="back-gold";
    if($priority==2) $class_string="back-blue";
    if($priority==1) $class_string="back-gray";
    if($priority==0) $class_string="back-purple";
    return $class_string;
}

function companyTable($sql_query,$query_result,$sql_connection){
    echo openTableHeader($sql_query);
    // <> Header row
    tableCell("Company Name");
    tableCell("City");
    tableCell("State");
    tableCell("Position");
    // tableCell("Priority");
    closeTableHeader();

    // <> First row - create company
    openForm("POST","act-create-company.php");
    openRow("");
    tableCell(textFieldHiddenLabel("Company name","","Enter Company Name","company_name","round-left"),"");
    tableCell(textFieldHiddenLabel("City","","Enter City","city","squared"),"");
    tableCell(textFieldHiddenLabel("State","","Enter State","state","squared"),"");
    tableCell("[]");
    tableCell(button("submit","Create company","shiny round-right"));
    // tableCell("Delete","alert");
    closeRow();
    closeForm();

    // <> Remaining rows

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
        // Do a join and if application uid is null then $position_title = "[Create application]"
        if (mysqli_num_rows($position)>0) {
            $positions_string = "";
            foreach($position as $val){
                $position_title = $val['position_title'];
                $position_edit_url = "view-1-application.php?application_uid=";
                $position_edit_url .= $val['application_uid'];
                if($positions_string!==""){$positions_string.=", ";}
                $positions_string .= hyperlink($position_title,$position_edit_url);        
            }
            tableCell($positions_string);
        } else { tableCell(hyperlink("[Create application]","act-create-application.php?company_uid=$company_uid")); }
        // tableCell($row['class']);
        // tableCell(button("button","Delete company","shiny round-right"));
        tableCell(deleteButton("company","round-right"));
        // <input value="Delete company" class="alert round-right shiny" type="button">
        // tableCell("Delete","alert");
        closeRow();
    }

closeTable();
}

// <> The stuff below here might be defunct

// <> Display the company table
// function displayAllcompanies($company_table) {
//     h2("company","company");
//     openTableHeader();
//     tableCell('UID','company_uid');
//     tableCell("Name",'company_name');
//     tableCell("URL",'company_url');
//     tableCell("City",'city');
//     tableCell("State",'state');
//     closeTableHeader();

//     foreach ($company_table as $row){
//         openRow("");
//         tableCell($row['company_uid'],'company_uid');
//         tableCell($row['company_name'],'name');
//         tableCell($row['company_url'],'url');
//         tableCell($row['city'],'city');
//         tableCell($row['state'],'state');
//         closeRow();
//     }
//     closeTable();

// }

// function displayAllPeople($person_table){
//     h2("People","people");
//     openTableHeader();
//     tableCell('UID','person_uid');
//     tableCell("Name",'person_name');
//     tableCell("Email",'email');
//     tableCell("Phone",'phone');
//     closeTableHeader();

//     foreach ($person_table as $row){
//         openRow("");
//         tableCell($row['person_uid'],'person_uid');
//         tableCell($row['person_name'],'name');
//         tableCell($row['email'],'email');
//         tableCell($row['phone'],'phone');
//         closeRow();
//     }
//     closeTable();
// }

?>