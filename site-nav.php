<?php 

require_once "lib-structure.php";

echo '<nav><div>';
// echo hyperlink("PHP Scratchpad","zz-scratchpad.php?test=yes&other=no","nav-link rounded bordered grayed");
// echo hyperlink("HTML Scratchpad","1saveoff/scratchpad.html","nav-link rounded bordered grayed");
// echo hyperlink("Enter Person info","form-person.php","nav-link rounded bordered grayed");    
echo hyperlink("View: Planning","view-planning.php","nav-link rounded bordered");
echo hyperlink("View: List companies","view-list-company.php","nav-link rounded bordered");
echo hyperlink("View: List applications","view-list-application.php","nav-link rounded bordered");
echo hyperlink("LCARS Stylesheet","showoff_style.php","nav-link rounded bordered");
echo hyperlink("File: Notes","file:///C:/Users\Vincent\Dropbox\apptrak-notes.txt","nav-link rounded bordered");

echo '</div></nav>';
?>