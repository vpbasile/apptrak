<?php
    include "site-header.php";
    foreach($_GET as $key=>$value){
        echo '<p>'.$key."=".$value.'</p>';
    }
    // CHeck the scope here
    openDescriptionList();
    foreach($_SERVER as $key => $val){
        term($key,"gold-back");
        definition($val,"gold-back");
    }
    closeDescriptionList();





    echo file_get_contents( 'img/drawing.svg');    
?>