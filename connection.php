<?php
    $conn = new PDO('mysql:host=localhost;dbname=task_shop', 'root', '');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
?>