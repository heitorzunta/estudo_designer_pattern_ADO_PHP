<?php
/**
 * Função __autoload()
 * carrrega uma classe quanto elaé necessária, ou seja, quando ela é instancia pela
 * primeira vez
 */


 function __autoload($classe){
    if (file_exists("app.ado/{$classe}.class.php")){
        include "app.ado/{classe}.class.php";
    }
 }
?>