<?php
    $conn = new PDO('mysql:host=127.0.0.1;dbname=task_shop;charset=utf8', 'root', 'root');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
?>