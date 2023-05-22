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
            
            <?php
                $pharm_cat_id=$_GET['pharm_cat_id'];
                $ret="SELECT  * FROM pharma_c WHERE pharm_cat_id = ?";
                $stmt= $mysqli->prepare($ret) ;
                $stmt->bind_param('i',$pharm_cat_id);
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
                                                <li class="breadcrumb-item"><a href="javascript: void(0);">Pharmaceuticals</a></li>
                                            </ol>
                                        </div>
                                        <h4 class="page-title"></h4>
                                    </div>
                                </div>
                            </div>     
                            <!-- end page title --> 

                            <div class="row">
                                <div class="col-12">
                                    <div class="card-box">
                                        <div class="row">
                                        <div class="col-xl-2"></div>
                                         
                                         <div class="col-xl-8">

                                         <div class="card card-block pl-xl-3 mt-3 mt-xl-0">
                                                    <div class="row" style="margin:30px 0px; 0px;30px;">
                                                        <div class="col-xl-5"><img src="assets/images/pharm.jpg" style="width:100%" alt=""></div>
                                                            <div class="col-xl-7">
                                                        
                                                                <h4 class="mb-3"><strong><u>Name</u> :</strong> <b id="b1"><?php echo $row->pharm_cat_name;?></b></h4>
                                                                                                                
                                                                <h4 class="mb-3"><strong><u> Vendor</u> :</strong><b id="b1"><?php echo $row->pharm_cat_vendor;?></b></h5>
                                                            
                                                                
                                                                <h4 class="mb-3"><strong><u>Details</u></strong></h4>
                                                            
                                                                <p id="b1" style="text-align:justify; ">
                                                                    <?php echo $row->pharm_cat_desc;?>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                             
                                              
                                                
                                             </div>
                                         </div> <!-- end col -->
                                     </div>
                                             <!-- end col -->
                                            <div class="col-xl-6">
                                                <div class="pl-xl-3 mt-3 mt-xl-0">
                                                   
                                                  
                                                   
                                                   
                                                </div>
                                            </div> <!-- end col -->
                                        </div>
                                       

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