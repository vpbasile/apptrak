<?php

// <> Display the company table
function displayAllcompanies($company_table) {
    h2("company","company");
    openTableHeader();
    tableCell('UID','company_uid');
    tableCell("Name",'company_name');
    tableCell("URL",'company_url');
    tableCell("City",'city');
    tableCell("State",'state');
    closeTableHeader();

    foreach ($company_table as $row){
        openRow("");
        tableCell($row['company_uid'],'company_uid');
        tableCell($row['company_name'],'name');
        tableCell($row['company_url'],'url');
        tableCell($row['city'],'city');
        tableCell($row['state'],'state');
        closeRow();
    }
    closeTable();

}

function displayAllPeople($person_table){
    h2("People","people");
    openTableHeader();
    tableCell('UID','person_uid');
    tableCell("Name",'person_name');
    tableCell("Email",'email');
    tableCell("Phone",'phone');
    closeTableHeader();

    foreach ($person_table as $row){
        openRow("");
        tableCell($row['person_uid'],'person_uid');
        tableCell($row['person_name'],'name');
        tableCell($row['email'],'email');
        tableCell($row['phone'],'phone');
        closeRow();
    }
    closeTable();
}

?>