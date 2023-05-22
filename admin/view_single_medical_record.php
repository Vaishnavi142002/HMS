<?php
  session_start();
  include('../assets/inc/config.php');
  include('assets/inc/checklogin.php');
  check_login();
  $aid=$_SESSION['ad_id'];
?>
<!DOCTYPE html>
<html lang="en">
    
<?php include ('assets/inc/head.php');?>
</head>
        <style>

</style>
    <body>

        <!-- Begin page -->
        <div id="wrapper">


            <!-- ========== Left Sidebar Start ========== -->
            <?php include("assets/inc/nav.php");?>
                <?php include("assets/inc/sidebar.php");?>
            <?php
                $mdr_number=$_GET['mdr_number'];
                $mdr_id=$_GET['mdr_id'];
                $ret="SELECT  * FROM medi_re WHERE mdr_id = ?";
                $stmt= $mysqli->prepare($ret) ;
                $stmt->bind_param('i',$mdr_id);
                $stmt->execute() ;//ok
                $res=$stmt->get_result();
                //$cnt=1;
                while($row=$res->fetch_object())
                {
                    $mysqlDateTime = $row->mdr_date_rec;
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
                                                <li class="breadcrumb-item"><a href="javascript: void(0);">Medical Records</a></li>
                                            </ol>
                                        </div>
                                        <h4 class="page-title">Record No:<b><?php echo $row->mdr_number;?></b></h4>
                                    </div>
                                </div>
                            </div>     
                            <!-- end page title --> 

                            <div class="row">
                                <div class="col-12">
                                    <div class="card-box">
                                        <div class="row">
                                            <div class="col-xl-3">

                                                
                                            </div> <!-- end col -->
                                            <div class="col-xl-5">
                                                <div class=" card card-block pl-xl-3 mt-3 mt-xl-0">
                                                <center><img src="assets/images/medical_record.png" ></center>
                                                <h5 class="card-title mt-3 mb-3" >Name : <?php echo $row->mdr_pat_name;?></h5>
                                                    
                                                    Age : <?php echo $row->mdr_pat_age;?> Years<br><br>
                                                    Patient Number : <?php echo $row->mdr_pat_number;?>
                                                    <br><br>
                                                    Patient Ailment : <?php echo $row->mdr_pat_ailment;?>
                                                    <br><br>
                                                    Date Recorded : <?php echo date("d/m/Y - h:m:s", strtotime($mysqlDateTime));?></p>
                                                    <br><br>
                                                    <h2><b>Prescription</b></h2>
                                                    <br><br>
                                                        <?php echo $row->mdr_pat_prescr;?>
                                                    </p>
                                                    <hr>
                                                  

                                    </div> <!-- end card-->
                                </div> <!-- end col-->
                            </div>
                            <!-- end row-->
                            
                        </div> <!-- container -->

                    </div> <!-- content -->

         
                </div>
            <?php }?>

            

        </div>
       
        <div class="rightbar-overlay"></div>

        <!-- Vendor js -->
        <script src="assets/js/vendor.min.js"></script>

        <!-- App js -->
        <script src="assets/js/app.min.js"></script>
        
    </body>

</html>