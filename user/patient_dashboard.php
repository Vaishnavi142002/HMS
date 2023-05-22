<?php
  session_start();
  include('../assets/inc/config.php');
  include('assets/inc/checklogin.php');
  check_login();
  $patient_id=$_SESSION['patient_id'];
  $patient_number = $_SESSION['patient_number'];
?>
<!DOCTYPE html>
<html lang="en">
    <?php include("assets/inc/head.php");?>
    <body>
        <div id="wrapper">
            
            <?php include('assets/inc/nav.php');?>
            
            <?php include('assets/inc/sidebar.php');?>

       
        <div class="rightbar-overlay"></div>

        <script src="../assets/js/vendor.min.js"></script>

        <script src="../assets/libs/flatpickr/flatpickr.min.js"></script>
        <script src="../assets/libs/jquery-knob/jquery.knob.min.js"></script>
        <script src="../assets/libs/jquery-sparkline/jquery.sparkline.min.js"></script>
        <script src="../assets/libs/flot-charts/jquery.flot.js"></script>
        <script src="../assets/libs/flot-charts/jquery.flot.time.js"></script>
        <script src="../assets/libs/flot-charts/jquery.flot.tooltip.min.js"></script>
        <script src="../assets/libs/flot-charts/jquery.flot.selection.js"></script>
        <script src="../assets/libs/flot-charts/jquery.flot.crosshair.js"></script>

        <script src="../assets/js/pages/dashboard-1.init.js"></script>

        <script src="../assets/js/app.min.js"></script>
        
    </body>

</html>