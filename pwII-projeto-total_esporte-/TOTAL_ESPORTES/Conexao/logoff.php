<?php
    session_start();

    if(isset($_SESSION['email'])){
        //existe sessão
        if(isset($_GET['logout'])){
            session_unset();

            session_destroy();
        }
    }
    header("location: ../index.php");
?>