<?php
  session_start();
  include('../assets/inc/config.php');
  include('assets/inc/checklogin.php');
  check_login();
  $aid=$_SESSION['ad_id'];
?>
<!DOCTYPE html>
<html lang="en">
    <style>
        #b1{
            color:#56125f;
        }
        </style>
<?php include ('assets/inc/head.php');?>

    <body>

        <!-- Begin page -->
        <div id="wrapper">

          
            <!-- ========== Left Sidebar Start ========== -->
            <?php include("assets/inc/nav.php");?>
                <?php include("assets/inc/sidebar.php");?>
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->
            <?php
                $v_number=$_GET['v_number'];
                $ret="SELECT  * FROM vendor WHERE v_number = ?";
                $stmt= $mysqli->prepare($ret) ;
                $stmt->bind_param('i',$v_number);
                $stmt->execute() ;//ok
                $res=$stmt->get_result();
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
                                                <li class="breadcrumb-item"><a href="dashboard.php">Vendors</a></li>
                                            </ol>
                                        </div>
                                        <h4 class="page-title"><b>Number: </b><b id="b1"><?php echo $row->v_number;?></b></h4>
                                    </div>
                                </div>
                            </div>     
                            <!-- end page title --> 

                            <div class="row">
                                <div class="col-12">
                                    <div class="card-box">
                                        <div class="row">
                                        <div class="col-xl-2"></div>
                                         
                                            <div class="col-xl-10">
                                                <div class="card card-block pl-xl-3 mt-3 mt-xl-0">
                                                    <div class="row" style="margin:30px 0px; 0px;30px;">
                                                        <div class="col-xl-4"><img src="assets/images/pharm.jpg" style="width:100%" alt=""></div>
                                                            <div class="col-xl-8">
                                                        
                                                                <h4 class="mb-3"> <strong>Name :</strong> <b id="b1"><?php echo $row->v_name;?></b></h4>
                                                                                                                
                                                                <h4 class="mb-3"><strong> Email :</strong><b id="b1"><?php echo $row->v_email;?></b></h5>
                                                            
                                                                <h4 class="mb-3"><strong>Address :</strong><b id="b1"> <?php echo $row->v_adr;?></b></h5>
                                                                
                                                                <h4 class="mb-3"><strong>Contacts :</strong> <b id="b1"><?php echo $row->v_phone;?></b></h5>
                                                                
                                                                <h4 class="mb-3"><strong>Details</strong></h4>
                                                            
                                                                <p id="b1" style="text-align:justify; ">
                                                                    <?php echo $row->v_desc;?>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> <!-- end col -->
                                        </div>
                                        <!-- end row -->

                                        
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
        <script src="assets/js/vendor.min.js"></script>

        <script src="assets/js/app.min.js"></script>
        
    </body>

</html>