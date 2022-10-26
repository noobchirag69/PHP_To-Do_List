<?php 
    $conn = mysqli_connect('localhost', 'root', '', 'todo_list');
    if(!$conn) {
        echo 'Connection Error: '. mysqli_connect_error();
    }
?>