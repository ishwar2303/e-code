<?php 
    
    $request_time = time();
    $error = "<br/><span style='color:red;'>Error</span><br/>";
    $success = "<br/><span style='color:#8ae234;'>Program Finished</span><br/>";
    $error_status = '';

    if(isset($_POST['userCode']) && isset($_POST['langName']) && isset($_POST['runtimeData'])){
        $userCode = $_POST['userCode'];
        $langName = $_POST['langName'];
        $runTimeInput = trim($_POST['runtimeData']);
        $input_file = fopen('runtime-input.txt', "w");
        fwrite($input_file, $runTimeInput);
        
        
        if($langName == 3){ // C++ code execution
            $output_file = fopen('programs/cpp/cpp-code.cpp', "w");
            fwrite($output_file, $userCode);
            $raw_file = fopen('raw.txt', "w");
            fwrite($raw_file, $userCode);
            exec('cd compiler');
            exec('cd cpp');
            exec('g++ programs/cpp/cpp-code.cpp 2>&1', $output, $return);
            if(!$return){
                
                if($runTimeInput != '')
                    $command = 'a.exe < runtime-input.txt';
                else $command = 'a.exe < runtime-input-file-upload.txt';
                $output = shell_exec($command);
                echo $output;
                // foreach($output as $value){
                //     echo $value;
                //     echo "<br/>";
                // }
                echo $success;
            }
            else{
                echo $error;
                foreach($output as $value){
                    echo $value;
                    echo "<br/>";
                }
            }
        }
        $error_status = $return;
    }
    $response_time = time();
    echo "<br/><span class='prime-aqua'>Execution Time : ".$response_time - $request_time." seconds</span>"; 

?>
<div id="returned-output">
</div>
<script>
        runBtn = document.getElementById('run-btn')
        runBtn.innerHTML = 'Run'
        runBtn.className = 'bg-success-pm mr-5'
        runBtn.disabled = false
        stopBtn = document.getElementById('stop-btn')
        stopBtn.className = 'bg-disabled mr-5'
        stopBtn.disabled = true
        
        $('html,body').animate({
            scrollTop: $(".output").offset().top -100},
            'fast');
          
</script>
