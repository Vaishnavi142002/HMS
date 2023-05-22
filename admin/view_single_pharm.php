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
                $phar_bcode=$_GET['phar_bcode'];
                $ret="SELECT  * FROM pharma WHERE phar_bcode = ?";
                $stmt= $mysqli->prepare($ret) ;
                $stmt->bind_param('i',$phar_bcode);
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
                                                <li class="breadcrumb-item"><a href="javascript: void(0);">Pharmaceuticals</a></li>
                                            </ol>
                                        </div>
                                        <h4 class="page-title"><b><?php echo $row->phar_bcode;?></b></h4>
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
                                            <div class="col-xl-6">
                                            <div class="card card-block pl-xl-3 mt-3 mt-xl-0">
                                                    <div class="row" style="margin:30px 0px; 0px;30px;">
                                                        <div class="col-xl-5"><img src="assets/images/pharm.jpg" style="width:100%" alt=""></div>
                                                            <div class="col-xl-7">
                                                        
                                                                <h4 class="mb-3"><strong><u>Name</u> :</strong> <b id="b1"><?php echo $row->phar_name;?></b></h4>
                                                                                                                
                                                                <h4 class="mb-3"><strong><u> Vendor</u> :</strong><b id="b1"><?php echo $row->phar_vendor;?></b></h5>
                                                            
                                                                <h4 class="mb-3"><strong><u>Quantity</u> :</strong><b id="b1"> <?php echo $row->phar_qty;?></b></h5>
                                                                
                                                                <h4 class="mb-3"><strong><u>Details</u></strong></h4>
                                                            
                                                                <p class="text-muted mb-4" style="text-align:justify; ">
                                                                    <?php echo $row->phar_desc;?>
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