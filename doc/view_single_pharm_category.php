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
                $pharm_cat_id=$_GET['pharm_cat_id'];
                $ret="SELECT  * FROM pharma_c WHERE pharm_cat_id = ?";
                $stmt= $mysqli->prepare($ret) ;
                $stmt->bind_param('i',$pharm_cat_id);
                $stmt->execute() ;
                $res=$stmt->get_result();
                while($row=$res->fetch_object())
                {
            ?><div class="content-page">
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
                                            </div> <!-- end col -->
                                            <div class="col-xl-7">
                                                <div class="pl-xl-3 mt-3 mt-xl-0">
                                                    <h2 class="mb-3"> Name: <?php echo $row->pharm_cat_name;?></h2>
                                                    <hr>
                                                    <h6 class="text-danger"> Vendor<?php echo $row->pharm_cat_vendor;?></h6>
                                                    <hr>
                                                    <p class="text-muted mb-4">
                                                        <?php echo $row->pharm_cat_desc;?>
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