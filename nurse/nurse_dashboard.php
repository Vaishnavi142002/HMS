<?php
  session_start();
  include('../assets/inc/config.php');
  include('assets/inc/checklogin.php');
  check_login();
  $nurse_id=$_SESSION['nurse_id'];
  $nurse_number = $_SESSION['nurse_number'];
?>
<!DOCTYPE html>
<html lang="en">
    <?php include("assets/inc/head.php");?>
    <body>
        <div id="wrapper">
            <?php include('assets/inc/nav.php');?>
            
            <?php include('assets/inc/sidebar.php');?>
            <div class="content-page">
                <div class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-4 col-xl-3" style="background:radial-gradient(rgb(178, 178, 226),rgb(83, 174, 216) ,rgb(64, 130, 253));margin:8px;">
                                <div class="widget-rounded-circle card-box">
                                    <div class="row">
                                        <div class="col-6">
                                        <div class="avatar-lg rounded-circle bg-soft-primary border-primary border">
                                                <i class="fab fa-accessible-icon  font-22 avatar-title text-primary"></i>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="text-right">
                                                <?php
                                                $result ="SELECT count(*) FROM user  ";
                                                    $stmt = $mysqli->prepare($result);
                                                    $stmt->execute();
                                                    $stmt->bind_result($patient);
                                                    $stmt->fetch();
                                                    $stmt->close();
                                                ?>
                                                <h3 class="text-dark mt-1"><span data-plugin="counterup"><?php echo $patient;?></span></h3>
                                                <p class="text-muted mb-1 text-truncate">Patients</p>
                                            </div>
                                        </div>
                                    </div> 
                                </div> 
                            </div>
                           
                            
                           
                            
                        
                        </div>

                        <div class="row">

                       
                       
                            
                          
                        </div>
                        

                      
                        
                    </div>
                </div> 

            

            </div>
        </div>
        
        
        <div class="rightbar-overlay"></div>

        <script src="assets/js/vendor.min.js"></script>

        <script src="assets/libs/flatpickr/flatpickr.min.js"></script>
        <script src="assets/libs/jquery-knob/jquery.knob.min.js"></script>
        <script src="assets/libs/jquery-sparkline/jquery.sparkline.min.js"></script>
        <script src="assets/libs/flot-charts/jquery.flot.js"></script>
        <script src="assets/libs/flot-charts/jquery.flot.time.js"></script>
        <script src="assets/libs/flot-charts/jquery.flot.tooltip.min.js"></script>
        <script src="assets/libs/flot-charts/jquery.flot.selection.js"></script>
        <script src="assets/libs/flot-charts/jquery.flot.crosshair.js"></script>

        <script src="assets/js/pages/dashboard-1.init.js"></script>

        <script src="assets/js/app.min.js"></script>
        
    </body>

</html>