<?php 
    require_once('includes/connection.php');
    $sql = "SELECT * FROM code";
    $result = $conn->query($sql);
    if(isset($_GET['deleteCode'])){
        $id = $_GET['deleteCode'];
        $sql = "DELETE FROM code WHERE code_id = '$id'";
        $conn->query($sql);
        header('Location: view-saved-code.php');
        exit;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E code | Saved Codes</title>
</head>
<body>
    
    <?php 
        while($row = $result->fetch_assoc()){
            ?>
            <div class="code-wrapper mb-10">
                <h3 class="code-title bg-primary"><?php echo $row['title']; ?> <a href="view-saved-code.php?deleteCode=<?php echo $row['code_id']; ?>">Delete</a> </h3>
                <pre><?php echo $row['code']; ?></pre>

            </div>
            <?php
        }
    ?>
</body>
</html>