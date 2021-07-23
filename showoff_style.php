<!DOCTYPE html>
<html lang="en-us">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<title>Stylesheet Showoff</title>
<meta name="description" content="">
<meta name="author" content="">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="lcars.css">
<style>
    body {color:var(--light-gray);}
    h2 {font-family: 'tng';}
</style>
</head>
<body>
<?php 

require_once "lib-structure.php";



echo "<hr>";

// <> 1 Font Definitions 

echo h2("<>1 Font Definitions");
defineFont("okuda","Okuda-A5PL.ttf");
defineFont("tng","ufonts.com_star-trek-tng-title.ttf");

function defineFont($font_name,$url){
    // Warning: this isn't working when there are quotes
    $string = "  @font-face { font-family: '$font_name'; src: url('$url'); }";
    echo p($string,"ID","CLASS","font-family:$font_name");
}

// <> 2 Color Definitions
echo h2("<>2 Color Definitions");
openTableHeader();
closeTableHeader();
defineColor("--old-background-color","rgb(28,0,13)");
defineColor("--background-color","hsl(36.5, 100%, 5.5%)");
defineColor("--light","white");
defineColor("--light-blue","rgb(155, 162, 255)");
defineColor("--light-gray","hsl(236, 10%, 80%)");
defineColor("--other","hsl(236, 15%, 50%)");
defineColor("--gold","rgb(255,155,0)");
defineColor("--dark-purple","rgb(120,60,120)");
defineColor("--dark-purple-trans","rgba(120,60,120,0.5)");
defineColor("--dark-red","rgb(204,96,96)");
defineColor("--pink","rgb(255,182,251)");
defineColor("--beige","hsl(60, 9%, 68%)");
defineColor("--green","rgb(125,220,152)");
defineColor("--brightred","rgb(213,1,0)");
closeTable();

function defineColor($var_name,$color_value){
    openRow("","");
    tableCell($var_name,"","color:var($var_name);");
    tableCell("$var_name:$color_value;","","background-color:white; color:var($var_name);");
    tableCell("$var_name:$color_value;","","background-color:gray; color:var($var_name);");
    tableCell("$var_name:$color_value;","","background-color:black; color:var($var_name);");
    tableCell("$var_name:$color_value;","","background-color:var($var_name); color:white;");
    tableCell("$var_name:$color_value;","","background-color:var($var_name); color:gray;");
    tableCell("$var_name:$color_value;","","background-color:var($var_name); color:black;");
}

// <>3 <> Color diads
echo h2("<>3 Color diads");
defineColorDiad("gold-back","var(--gold)","var(--background-color)");
defineColorDiad("back-gold","var(--background-color)","var(--gold)");
defineColorDiad("blue-back","var(--light-blue","var(--background-color");
defineColorDiad("back-blue","var(--background-color)","var(--light-blue)");
defineColorDiad("purple-back","var(--dark-purple)","var(--background-color)");
defineColorDiad("back-purple","var(--background-color)","var(--dark-purple)");
defineColorDiad("gray-back","var(--light-gray)","var(--background-color)");
defineColorDiad("back-gray","var(--background-color)","var(--light-gray)");
defineColorDiad("highlight","var(--pink)","var(--background-color)");
defineColorDiad("red-back","","var(--background-color)");
defineColorDiad("red-alert","","var(--background-color)");
defineColorDiad("green-back","var(--green)","var(--background-color)");
defineColorDiad("back-green","var(--background-color)","var(--green)");

function defineColorDiad($class_name,$background,$color){
    $css = "$class_name, $class_name a, tr.$class_name td { background-color:$background; color:$color; } ";
    echo p($css,"",$class_name);
}

// <> 4 Body rule
echo h2("<>4 Body Style Rule");
echo "body { 
    padding: 30px 3%;
    color: var(--gold);
    background-color: var(--background-color);
    margin: auto;  
    font-family: 'okuda','courier new';
    font-size: x-large;
  }";

?>