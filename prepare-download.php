<?php 

    if(isset($_POST['user_code']) && isset($_POST['file_name'])){
        $user_code = $_POST['user_code'];
        $file_name = $_POST['file_name'];
        $raw_file = fopen($file_name.'.txt', "w");
        fwrite($raw_file, $user_code);
        fclose($raw_file);
    }
?>