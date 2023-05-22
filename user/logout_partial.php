<?php
    session_start();
    unset($_SESSION['patient_id']);
    unset($_SESSION['patient_number']);
    session_destroy();
    header("Location: logout.php");
    exit;
?>