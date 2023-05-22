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
        <div id="wrapper">
        <?php include("assets/inc/nav.php");?>
                <?php include("assets/inc/sidebar.php");?>
            <?php
                $eqp_code=$_GET['eqp_code'];
                $ret="SELECT  * FROM equipment WHERE eqp_code = ?";
                $stmt= $mysqli->prepare($ret) ;
                $stmt->bind_param('i',$eqp_code);
                $stmt->execute() ;
                $res=$stmt->get_result();
                while($row=$res->fetch_object())
                {
            ?>
                <div class="content-page">
                    <div class="content">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-12">
                                    <div class="page-title-box">
                                        <div class="page-title-right">
                                            <ol class="breadcrumb m-0">
                                                <li class="breadcrumb-item"><a href="javascript: void(0);">Equipments</a></li>
                                            </ol>
                                        </div>
                                        <h4 class="page-title"> Code:<b><?php echo $row->eqp_code;?></b> </h4>
                                    </div>
                                </div>
                            </div>     
                            <div class="row">
                                <div class="col-12">
                                    <div class="card-box">
                                        <div class="row">
                                        <div class="col-xl-2">
                                                <div class="tab-content pt-0">

                                                   
                                                </div>
                                            </div>  

                                            <div class="col-xl-7">
                                                <div class="card card-block pl-xl-3 mt-3 mt-xl-0">
                                                    <div class="row" style="margin:30px 0px; 0px;30px;">
                                                        <div class="col-xl-4"><img src="assets/images/hosp_asset.jpg" style="width:100%" alt=""></div>
                                                            <div class="col-xl-8">
                                                        
                                                                <h4 class="mb-3"> <strong><u>Name</u> :</strong> <b id="b1"><?php echo $row->eqp_name;?></b></h4>
                                                                                                                
                                                                <h4 class="mb-3"><strong><u>Available</u> :</strong><b id="b1"><?php echo $row->eqp_qty;?></b></h5>
                                                            
                                                                <h4 class="mb-3"><strong><u>Barcode</u> :</strong><b id="b1"> <?php echo $row->eqp_code;?></b></h5>
                                                                
                                                                <h4 class="mb-3"><strong><u>Status</u> :</strong> <b id="b1"><?php echo $row->eqp_status;?></b></h5>
                                                                
                                                                <h4 class="mb-3"><strong><u>Details</u> :</strong></h4>
                                                            
                                                                <p  style="text-align:justify; ">
                                                                    <?php echo $row->eqp_desc;?>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                           
                </div>
                </div>
                                                    
                                                 

                                    </div>
                                </div>
                            </div>
                        </div> 
                    </div> 
                  
                </div>
            <?php }?>

        </div>
        <div class="rightbar-overlay"></div>
        <script src="assets/js/vendor.min.js"></script>
        <script src="assets/js/app.min.js"></script>
        
    </body>

</html>