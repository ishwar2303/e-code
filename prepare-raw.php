<?php 

    if(isset($_POST['user_code'])){
        $userCode = $_POST['user_code'];
        $raw_file = fopen('raw.txt', "w");
        fwrite($raw_file, $userCode);
        fclose($raw_file);
    }
?>