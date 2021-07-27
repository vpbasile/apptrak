<?php

$lorem = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.";

// <> Individual structure items
function hyperlink($text,$url,$class_string="",$style_string=""){ return "<a class='$class_string' style='$style_string' href='$url'>$text.</a>"; }
function h2($string,$id="",$class_string="",$style_string=""){ return "<h2 id='$id' class='$class_string' style='$style_string'>$string</h2>"; }
function h3($string,$class_string="",$style_string=""){ return "<h3 class='$class_string' style='$style_string'>$string</h3>"; }


function p($string,$id="",$class_string="",$style_string="") { return "<p id='$id' class='$class_string' style='$style_string'>$string</p>"; }    

function quoted($string) {return "'".$string."'";}

function openDiv($header="",$id="",$class_string="",$style_string=""){ 
    echo "<div id='".$id."' class='".$class_string."' style='$style_string'>";
    if ($header!==""){ echo h2($header,"");}
    }
function closeDiv() {echo "</div>";}

// <> HTML Tables
function openTableHeader($caption_string){ 
    if($caption_string!==""){ $caption_string = "<caption>$caption_string</caption>";}
    return "<table>$caption_string<thead><tr>"; 
}
function closeTableHeader(){ echo "</tr></thead><tbody>"; }
function closeTable() { echo "</tbody></table>"; }
function openRow($class_string="",$style_string=""){ echo "<tr class='$class_string' style='$style_string'>"; }
function tableCell($contents,$class_string="",$style_string=""){ echo "<td class='$class_string' style='$style_string'>$contents</td>"; }
function closeRow(){ echo "</tr>"; }

// <> HTML Description List
function openDescriptionList() {echo "<dl>";}
function term($string,$class_string="",$style_string=""){echo "<dt class='.$class_string.' style='$style_string'>".$string."</dt>";}
function definition($string,$class_string="",$style_string=""){echo "<dd class='.$class_string.' style='$style_string'>".$string."</dd>";}
function closeDescriptionList(){ echo "</dl>";}
function displayDescriptionList($array){
    openDescriptionList();
    foreach($array as $key => $val){
        term($key,"");
        definition($val,"");
    } 
    closeDescriptionList();
}

// <> HTML Form
function openForm($method,$action,){echo "<form method='".$method."' action='".$action."'>";}
function openSelect($fieldName, $labelText, $classString){ echo "<label for='".$fieldName."'>".$labelText."</label><select name='".$fieldName."' id='".$fieldName."' class='".$classString."'>";}
function selectOption($display,$value){ echo "<option value='".$value."'>".$display."</option>"; }
function closeSelect(){ echo "</select>"; }

function textField($labelText,$value,$placeholder,$fieldName,$class){
    // $field_name = $table_name."_".$column_name;
    return "<label for='".$fieldName."'>".$labelText."</label><input type='text' name='".$fieldName."' value='".$value."' class='".$class."' placeholder='.$placeholder.'>";}
function textFieldInvisible($fieldName,$valueToPass){
    return "<input type='text' name='".$fieldName."' value='".$valueToPass."' style='display: none;'>";
}
function textFieldHiddenLabel($labelText,$value,$placeholder,$fieldName,$class){
    return "<label style='display: none;' for='".$fieldName."'>".$labelText."</label><input type='text' name='".$fieldName."' value='".$value."' class='$class' placeholder='$placeholder'>";
}
function textArea($labelText,$contents,$placeholder,$fieldName,$class) { 
    echo "<label for='".$fieldName."'>".$labelText."</label><br>";
    echo "<textarea class='".$class."' name='".$fieldName."' id='".$fieldName."' placeholder='".$placeholder."'>".$contents."</textarea>"; 
}
function dateField($labelText,$value,$placeholder,$fieldName,$class){
    return "<label for='".$fieldName."'>".$labelText."</label><input type='date' name='".$fieldName."' value='".$value."' class='".$class."' placeholder='.$placeholder.'>";
}
function button($class=""){
        return "<input type='submit' class='$class'>";
        // return "<input type='button' value='Reset' class='rounded blue-back'>";
}
function closeForm(){echo "</form>";}
// function wholeForm($table_name){
// }


// <> Stuff specific to this site
function makePanel($label,$contents,$id){
    echo openDiv("",$id."_div","pane float-left");
    echo textArea($label,$contents,$label,$id."_text","panel rounded bordered");
    echo "</div>";
}

function buttonString() { return "<input type='button' value='edit'>"; }

function coverLetterLink($url){
    if ($url!=""){
        return hyperlink("Cover letter",$url,"cover-letter");
    } else return "n/a";
}

function writePersonRow($array){
    $uid = $array['uid'];
    openRow($array['priority']);
    tableCell(hyperlink($uid,"view-app.php?uid=".$uid,"view-app"),"UID");
    tableCell($array['company'],"company");
    tableCell($array['location'],"location");
    tableCell(hyperlink($array['position'],$array['position_url'],"position"),"position");
    tableCell($array['whats_next'],"next");
    tableCell($array['applied_date'],"applied");
    tableCell(coverLetterLink($array['cover_letter_url']),"cover-letter");
    tableCell($array['followup_date'],"followup");
    tableCell($array['followup_person'],"person");
    tableCell($array['position_found'],"found");
    tableCell(buttonString(),"edit");
    closeRow();
}

?>