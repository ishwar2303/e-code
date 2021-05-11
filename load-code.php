<?php 
    require_once('includes/connection.php');
    $error_icon = '<i class="fas fa-exclamation-circle"></i>';
    $error = '';
    if(!isset($_POST['load']))
        $error = $error_icon.' Invalid request';
    $sql = "SELECT * FROM code ORDER BY title";
    $result = $conn->query($sql);
    if(isset($_GET['deleteCode'])){
        $id = $_GET['deleteCode'];
        $sql = "DELETE FROM code WHERE code_id = '$id'";
        $conn->query($sql);
        header('Location: view-saved-code.php');
        exit;
    }
?>
    
<?php 
    $index = 0;
    while($row = $result->fetch_assoc()){
        ?>
        <div class="code-wrapper mb-10">
            <h4 class="code-title bg-success-tert br-t-3 white p-5-10 flex-row space-between">
                <div><?php echo $row['title']; ?></div>
                <div>
                    <button class="btn bg-dark load-code-to-editor white">Load</button>
                </div>
             
            </h4>
            <pre class="request-code-load p-10 white br-b-3" style="background:#393939;"><?php echo $row['code']; ?></pre>

        </div>
        <script>
            $('.load-code-to-editor').eq(<?php echo $index; ?>).click(() => {
                let reqCode = document.getElementsByClassName('request-code-load')[<?php echo $index; ?>].innerHTML
                reqCode = $('<textarea />').html(reqCode).text()
                editor.setValue(reqCode)
                $('.load-code-response').hide()
                $('.load-code-response-overlay').hide()
            })
        </script>
        <?php
        $index += 1;
    }
?>
