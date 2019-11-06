<?php
    session_start();
    session_destroy();
    header("location:http://localhost/gitHub/libraryManagementSystem/libraryManagementSystem.php");
?>