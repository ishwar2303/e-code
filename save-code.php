<?php 
    require_once('includes/connection.php');
    require_once('includes/middleware.php');
    class response{
        public $success;
        public $error;
    }
    $res = new response();
    $success = false;
    $error = false;

    if(isset($_POST['title']) && isset($_POST['code'])){
        $code  = filterText($_POST['code']);
        $title = filterText($_POST['title']);
        $err_icon = '<i class="fas fa-exclamation-circle"></i>';
        if($code == ''){
            $res->error = $err_icon.' Empty Code';
        }
        if($title == ''){
            $res->error = $err_icon.' Title required';
        }
        if($code && $title){
            $sql = "INSERT INTO `code` (`code_id`, `title`, `code`) VALUES (NULL, '$title', '$code')";
            if($conn->query($sql) === true){
                $res->success = true;
            }
            else{
                $res->error = $conn->error;
            }
        }
    }
    else{
        $res->error = "Invalid request";
    }

    print_r(json_encode($res));
?>