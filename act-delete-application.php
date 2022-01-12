<?php

require_once "lib-sql.php";

$application_uid = $_GET['app_uid'];
echo hyperlink("Confirm deleting application $application_uid.","act-delete-application-really.php?app_uid=$application_uid");
?>