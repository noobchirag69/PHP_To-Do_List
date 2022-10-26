<?php 
    // Connect to Database
    $conn = mysqli_connect('localhost', 'root', '', 'todo_list');
    // Check Connection
    if(!$conn) {
        echo 'Connection Error: '. mysqli_connect_error();
    }
?>