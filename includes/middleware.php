<?php 
    function filterText($str){
        $str = trim($str);
        $str = htmlentities($str);
        $str = addslashes($str);
        return $str;
    }
?>