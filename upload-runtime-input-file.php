<?php 

    class response{
        public $success;
        public $error;
    }
    $res = new response();
    $res->success = true;
    $res->error = false;
    if(isset($_FILES['file']['name'])){

        /* Getting file name */
        $filename = 'runtime-input-file-upload.txt';

        /* Location */
        $location = "./".$filename;
        $imageFileType = pathinfo($location,PATHINFO_EXTENSION);
        $imageFileType = strtolower($imageFileType);

        /* Valid extensions */
        $valid_extensions = array("txt");

        $response = 0;
        /* Check file extension */
        if(in_array(strtolower($imageFileType), $valid_extensions)) {
            /* Upload file */
            if(move_uploaded_file($_FILES['file']['tmp_name'],$location)){
                $response = $location;
                $res->success = 'File uploaded successfully';
            }
        }
        else{
            $res->success = false;
            $res->error = 'Invalid file | Upload a Text file';
        }

        if($_FILES['file']['size'] > 2000000){
            $res->success = false;
            $res->error = 'Size Limit : 2MB';
        }
    }

    print_r(json_encode($res));
?>