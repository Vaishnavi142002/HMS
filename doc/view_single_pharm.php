<?php
  session_start();
  include('../assets/inc/config.php');
  include('assets/inc/checklogin.php');
  check_login();
  $doc_id = $_SESSION['doc_id'];
?>
<!DOCTYPE html>
<html lang="en">
<?php include ('assets/inc/head.php');?>
    <body>
        <div id="wrapper">
            <?php include('assets/inc/nav.php');?>
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
                                                <li class="breadcrumb-item"><a href="javascript: void(0);">Pharmaceuticals </a></li>
                                            </ol>
                                        </div>
                                        <h4 class="page-title"><b><?php echo $row->phar_bcode;?> - <?php echo $row->phar_name;?></b></h4>
                                    </div>
                                </div>
                            </div>     
                            <div class="row">
                                <div class="col-12">
                                    <div class="card-box">
                                        <div class="row">
                                            <div class="col-xl-5">

                                                <div class="tab-content pt-0">

                                                    <div class="tab-pane active show" id="product-1-item">
                                                        <img src="assets/images/pharm.webp" alt="" class="img-fluid mx-auto d-block rounded">
                                                    </div>
                                                </div>
                                            </div> 
                                            <div class="col-xl-7">
                                                <div class="pl-xl-3 mt-3 mt-xl-0">
                                                    <h2 class="mb-3"> Name : <?php echo $row->phar_name;?></h2>
                                                    <hr>
                                                    <h4 class="text-danger"> Quantity : <?php echo $row->phar_qty;?> Cartons</h4>
                                                    <hr>
                                                    <h4 class="text-danger"> Vendor : <?php echo $row->phar_vendor;?></h4>
                                                    <hr>
                                                    <h4 class="text-danger"> Description</h4>
                                                    <p class="text-muted mb-4">
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
            <?php }?>
        </div>
        <div class="rightbar-overlay"></div>
        <script src="assets/js/vendor.min.js"></script>
        <script src="assets/js/app.min.js"></script>
    </body>

</html>