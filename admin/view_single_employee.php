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
                color:#891434;
            }
        </style>
    <?php include('assets/inc/head.php');?>
    <body>
        <div id="wrapper">
        <?php include("assets/inc/nav.php");?>
                <?php include("assets/inc/sidebar.php");?>
            <?php
                $doc_id=$_GET['doc_id'];
                $ret="SELECT  * FROM doc WHERE doc_id=?";
                $stmt= $mysqli->prepare($ret) ;
                $stmt->bind_param('i',$doc_id);
                $stmt->execute() ;//ok
                $res=$stmt->get_result();
                $doc_number=$_GET['doc_number'];
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
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Doctor</a></li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title"><?php echo $row->doc_fname;?> <?php echo $row->doc_lname;?></h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->
                     
                        <div class="row">
                        <div class="col-xl-3">
                                                <div class="tab-content pt-0">

                                                   
                                                </div>
                                            </div>
                        <div class="col-lg-7 col-xl-7">
                                
                                <div class="card card-block pl-xl-3 mt-3 mt-xl-0">
                                        <center>  <img src="../doc/assets/images/users/<?php echo $row->doc_dpic;?>" class="rounded-circle img-thumbnail"
                                        alt="profile-image" style="height:300px;width:300px"></center>
                                        <div class="tab-pane show " id="timeline">
                                            <div class="table-responsive">
                                                <table class="table table-borderless mb-0">
                                        <tbody>
                                                            <tr>
                                                                <td><h4>Name: <b id="b1"><?php echo $row->doc_fname;?> <?php echo $row->doc_lname;?></b></h4></td>
                                                                <td><h4> Reg. N0: <b id="b1"><?php echo $row->doc_number;?></b></h4></td> 
                                                            </tr>
                                                            <tr>
                                                                <td><h4>Edu: <b id="b1"><?php echo $row->doc_edu;?></b></h4></td>
                                                                <td><h4>Consulting Fees :<b id="b1"><?php echo $row->Consulting_fees;?></b></h4></td> 
                                                            </tr>
                                                            <tr>
                                                                <td><h4>Department: <b id="b1"><?php echo $row->doc_dept;?></b></h4></td>
                                                                <td><h4>Contact N0 :<b id="b1"><?php echo $row->doc_cont;?></b></h4></td> 
                                                            </tr>
                                                            <tr>
                                                                <td><h4>Email: <b id="b1"><?php echo $row->doc_email;?></b></h4></td>
                                                                <td><h4>City:<b id="b1"><?php echo $row->doc_city;?></b></h4></td> 
                                                            </tr>
                                                        </tbody>
            </table>
            </div>
            </div>
                                            <br><br>
                                        <hr>
                                    </div>
                            
                        </div> 
                          
                            <!--Vitals-->
                            
                        </div>
                        <!-- end row-->

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