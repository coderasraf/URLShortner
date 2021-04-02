<?php

    $conn = mysqli_connect("localhost", "root", "", "url");
    if(!$conn){
        echo 'Database connection error';
    }

?>