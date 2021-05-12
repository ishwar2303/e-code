

<?php 
    
    //error_reporting(0);
    $request_time = time();
    $error_status = '';
    $output = '';
    $return = 0;
    $dir_path = str_replace("\\", "/",__DIR__);
    if(isset($_POST['userCode']) && isset($_POST['langName']) && isset($_POST['runtimeData'])){
        $userCode = $_POST['userCode'];
        $langName = $_POST['langName'];
        $runTimeInput = trim($_POST['runtimeData']);
        $input_file = fopen('runtime-input.txt', "w");
        fwrite($input_file, $runTimeInput);
        
        $raw_file = fopen('raw.txt', "w");
        fwrite($raw_file, $userCode);
        fclose($raw_file);

        if($langName == 1){ // PHP code execution
            $output_file = fopen('programs/php/php-code.php', "w");
            fwrite($output_file, $userCode);
            exec('cd compiler');
            exec('cd php');
            if($runTimeInput != '')
                $command = 'C:/xampp/php/php.exe programs/php/php-code.php < runtime-input.txt 2>&1';
            else $command = 'C:/xampp/php/php.exe programs/php/php-code.php < runtime-input-file-upload.txt 2>&1';
            $output = shell_exec($command);
            $response_time = time();
        }
        else if($langName == 2){ // C code execution
            $output_file = fopen('programs/c/c-code.c', "w");
            fwrite($output_file, $userCode);
            //echo $dir_path;
            exec($dir_path.'/compiler/c-and-cpp/bin');
            exec('gcc programs/c/c-code.c 2>&1', $output, $return);
            if(!$return){
                $request_time = time();
                if($runTimeInput != '')
                    $command = 'a.exe < runtime-input.txt';
                else $command = 'a.exe < runtime-input-file-upload.txt';
                $output = shell_exec($command);
            }
            else{
                $output_error = '';
                foreach($output as $value){
                    $output_error .= $value."\n";
                }
                $output = $output_error;
            }
            $response_time = time();
        }
        else if($langName == 3){ // C++ code execution
            $output_file = fopen('programs/cpp/cpp-code.cpp', "w");
            fwrite($output_file, $userCode);
            //echo $dir_path;
            exec($dir_path.'/compiler/c-and-cpp/bin');
            exec('g++ programs/cpp/cpp-code.cpp 2>&1', $output, $return);
            if(!$return){
                $request_time = time();
                if($runTimeInput != '')
                    $command = 'a.exe < runtime-input.txt';
                else $command = 'a.exe < runtime-input-file-upload.txt';
                $output = shell_exec($command);
            }
            else{
                $output_error = '';
                foreach($output as $value){
                    $output_error .= $value."\n";
                }
                $output = $output_error;
            }
            $response_time = time();
        }
        else if($langName == 4){ // Python code execution
            $output_file = fopen('programs/python/python-code.py', "w");
            fwrite($output_file, $userCode);
            exec('cd compiler');
            exec('cd python');
            // exec('python.exe');
            if($runTimeInput != '')
                $command = 'python programs/python/python-code.py < runtime-input.txt 2>&1';
            else $command = 'python programs/python/python-code.py < runtime-input-file-upload.txt 2>&1';
            $output = shell_exec($command);
            $response_time = time();
            
        }
        $error_status = $return;
    }

?>
<pre id="returned-output"><?php echo htmlentities($output); ?></pre>
<pre id="execution-time"><?php echo "<br/><span class='prime-aqua'>Execution Time : ".$response_time - $request_time." seconds</span>"; ?></pre>
<script>
        runBtn = document.getElementById('run-btn')
        runBtn.innerHTML = 'Run'
        runBtn.className = 'bg-success-pm mr-5'
        runBtn.disabled = false
        stopBtn = document.getElementById('stop-btn')
        stopBtn.className = 'bg-disabled mr-5'
        stopBtn.disabled = true
        document.getElementById('copy-output').style.display = 'inline'
        $('html,body').animate({
            scrollTop: $(".output").offset().top -110},
            'fast');
        <?php 
            if(!$return){
                ?>
                document.getElementById('pgm-success').style.display = 'inline'
                document.getElementById('pgm-error').style.display = 'none'
                <?php
            }
            else{
                ?>
                document.getElementById('pgm-success').style.display = 'none'
                document.getElementById('pgm-error').style.display = 'inline'
                <?php
            }
        ?>
</script>
