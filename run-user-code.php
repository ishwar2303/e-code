<?php 
    $request_time = time();
    $error = "<span style='color:red;'>Error</span><br/>";
    $success = "<span style='color:#8ae234;'>Program Finished</span><br/>";
    if(isset($_POST['userCode']) && isset($_POST['langName'])){
        $userCode = $_POST['userCode'];
        $langName = $_POST['langName'];
        if($langName == 1){ // php code execution
            if($userCode != ''){
                $userCode = $userCode."\n";
                $output_file = fopen('programs/php/php-code.php', "w");
                fwrite($output_file, '');
                fwrite($output_file, $userCode);
                $raw_file = fopen('raw.txt', "w");
                fwrite($raw_file, $userCode);
                exec('cd compiler');
                exec('cd php');
                exec('C:/xampp/php/php.exe programs/php/php-code.php', $output, $return);
                if(!$return){
                    foreach($output as $value){
                        echo $value;
                        echo "<br/>";
                    }
                    echo $success;
                }
                else{
                    echo $error;
                    foreach($output as $value){
                        echo $value;
                        echo "<br/>";
                    }
                }
                ?>
                <!-- <script>
                    url_file = 'php-code.php'
                        $.ajax({
                            url : url_file,
                            type : 'POST',
                            dataType : 'html',
                            success : (msg) => {
                            },
                            complete : (res) => {
                                output = res.responseText
                                let el = document.getElementById('returned-output')
                                console.log(output)
                                if(output != '')
                                    output = output.trim()
                                    el.innerHTML = output.replace(/(?:\r\n|\r|\n)/g, '<br/>')
                            }
                        })
                </script> -->
                <?php
            }
            else{
                ?>
                <div id="returned-output">
                    No Output
                </div>
                <?php
            }
        }
        else if($langName == 2){ // C code execution
            $output_file = fopen('programs/c/c-code.c', "w");
            fwrite($output_file, $userCode);
            $raw_file = fopen('raw.txt', "w");
            fwrite($raw_file, $userCode);
            exec('cd compiler');
            exec('cd c');
            exec('gcc programs/c/c-code.c  2>&1', $output, $return);
            if(!$return){
                exec('a.exe', $output, $return);
                foreach($output as $value){
                    echo $value;
                    echo "<br/>";
                }
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
        else if($langName == 3){ // C++ code execution
            $output_file = fopen('programs/cpp/cpp-code.cpp', "w");
            fwrite($output_file, $userCode);
            $raw_file = fopen('raw.txt', "w");
            fwrite($raw_file, $userCode);
            exec('cd compiler');
            exec('cd cpp');
            exec('g++ programs/cpp/cpp-code.cpp  2>&1', $output, $return);
            if(!$return){
                exec('a.exe', $output, $return);
                foreach($output as $value){
                    echo $value;
                    echo "<br/>";
                }
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
        else if($langName == 4){ // Python code execution
            $output_file = fopen('programs/python/python-code.py', "w");
            fwrite($output_file, $userCode);
            $raw_file = fopen('raw.txt', "w");
            fwrite($raw_file, $userCode);
            exec('cd compiler');
            exec('cd python');
            exec('python.exe');
            $pgm_output = exec('python programs/python/python-code.py 2>&1', $output, $return);
            
            if(!$return)
                echo $success;
            else echo $error;

            foreach($output as $value){
                echo $value;
                echo "<br/>";
            }
        }
    }
    $response_time = time();
    echo "<br/><span class='prime-aqua'>Execution Time : ".$response_time - $request_time." seconds</span>"; 

?>
<div id="returned-output">
    
</div>
<script>
        //$('.overlay').toggle()
        runBtn = document.getElementById('run-btn')
        runBtn.innerHTML = 'Run'
        runBtn.className = 'bg-success-pm mr-5'
        runBtn.disabled = false
        //document.getElementById('raw-code-link').style.display = 'block'
        stopBtn = document.getElementById('stop-btn')
        stopBtn.className = 'bg-disabled mr-5'
        stopBtn.disabled = true
        
              $('html,body').animate({
                  scrollTop: $(".output").offset().top -100},
                  'fast');
          
</script>
