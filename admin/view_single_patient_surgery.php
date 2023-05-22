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
        #b1
        {
            color:#000;
        }
        #b2{
            color:#942b4f;
        }
        </style>
    
<?php include ('assets/inc/head.php');?>

    <body>

        
        <div id="wrapper">

          
        <?php include("assets/inc/nav.php");?>
          
                <?php include("assets/inc/sidebar.php");?>
         
            <?php
                $s_number=$_GET['s_number'];
                $ret="SELECT  * FROM surgery WHERE s_number = ?";
                $stmt= $mysqli->prepare($ret) ;
                $stmt->bind_param('i',$s_number);
                $stmt->execute() ;//ok
                $res=$stmt->get_result();
                //$cnt=1;
                while($row=$res->fetch_object())
                {
                    $mysqlDateTime = $row->s_pat_date; 
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
                                             
                                                <li class="breadcrumb-item"><a href="javascript: void(0);">Surgery</a></li>
                                          
                                            </ol>
                                        </div>
                                        <h4 class="page-title">Surgery Number: <b><?php echo $row->s_number;?></b></h4>
                                    </div>
                                </div>
                            </div>     
                            <!-- end page title --> 

                            <div class="row">
                                <div class="col-12">
                                    <div class="card-box">
                                        <div class="row">
                                            <div class="col-xl-4">

                                                <div class="tab-content pt-0">

                                                   
                            
                                                </div>
                                            </div> <!-- end col -->
                                            <div class="col-xl-4">
                                            
                                            <div class="card card-block pl-xl-3 mt-3 mt-xl-0">

                                                    <h3 class="mb-3"><b id="b1">Name : </b><b id="b2"><?php echo $row->s_pat_name;?></b></h3>
                                                    
                                                    <h3 class="align-centre "> <b id="b1">Disease : </b><b id="b2"><?php echo $row->s_pat_ailment;?></b></h3>
                                                    <hr>
                                                    <h3 class="align-centre "><b id="b1">Date   : </b><b id="b2"><?php echo date("d/m/Y", strtotime($mysqlDateTime));?></b></h3>
                                                    <hr>
                                                    <h3 class="align-centre "><b id="b1">Patient Number : </b><b id="b2"><?php echo $row->s_pat_number;?></b></h4>
                                                    <hr>
                                                    <h3 class="align-centre"><b id="b1">Surgeon :  </b><b id="b2"><?php echo $row->s_doc;?></b> </h3>
                                                    <hr>
                                                    <h3 class="align-centre"> <b id="b1">Status : </b><b id="b2"><span class ="btn btn-success"> <?php echo $row->s_pat_status;?></span> </b></h3>
                                                    <hr>
                                                    
                                                    
                                                   
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