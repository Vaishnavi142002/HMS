<?php
  session_start();
  include('../assets/inc/config.php');
  include('assets/inc/checklogin.php');
  check_login();
  $aid=$_SESSION['ad_id'];
?>

<!DOCTYPE html>
    <html lang="en">

    <?php include('assets/inc/head.php');?>

    <body>

        <!-- Begin page -->
        <div id="wrapper">

            
            <!-- end Topbar -->

            <!-- ========== Left Sidebar Start ========== -->
            <?php include("assets/inc/nav.php");?>
                <?php include("assets/inc/sidebar.php");?>
         
            <?php
                $nurse_id=$_GET['nurse_id'];
                $ret="SELECT  * FROM nurse WHERE nurse_id=?";
                $stmt= $mysqli->prepare($ret) ;
                $stmt->bind_param('i',$nurse_id);
                $stmt->execute() ;//ok
                $res=$stmt->get_result();
                $nurse_number=$_GET['nurse_number'];
                //$cnt=1;
                while($row=$res->fetch_object())
            {
            ?>
            <div class="content-page">
                <div class="content">

                    <!-- Start Content-->
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Nurse</a></li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title"><?php echo $row->nurse_name;?></h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-lg-5 col-xl-5">
                                
                                <div class="card card-block pl-xl-3 mt-3 mt-xl-0">
                                       
                                    
                                    <div class="text-centre mt-3">
                                        
                                        <p class="text-muted mb-2 font-13"><strong>Full Name :</strong> <span class="ml-2"><?php echo $row->nurse_name;?> </span></p>
                                       <p class="text-muted mb-2 font-13"><strong>number :</strong> <span class="ml-2"><?php echo $row->nurse_number;?></span></p>
                                        <p class="text-muted mb-2 font-13"><strong>Nurse Number :</strong> <span class="ml-2"><?php echo $row->n_room_no;?></span></p>
                                        <p class="text-muted mb-2 font-13"><strong>Email :</strong> <span class="ml-2"><?php echo $row->nurse_email;?></span></p>


                                    </div>

                                </div> <!-- end card-box -->

                            </div> <!-- end col-->
                            
                    </div> <!-- container -->

                </div> <!-- content -->

               
            </div>
            <?php }?>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- Vendor js -->
        <script src="assets/js/vendor.min.js"></script>

        <!-- App js -->
        <script src="assets/js/app.min.js"></script>

    </body>


</html>