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
        #table_id1{
               
                margin: 0px 10px 10px 10px;;
                width:400px; 
            }
            td{
                
            }
            #b1{
               
                text-align:left;
                border-top: hidden;
                border-left:1px solid black;
                
            }
            #b2{
                color:#105883;
            }
            th{
                text-align: center;
                border:hidden;
                border-bottom:1px solid black!important;
            }
            #b3{
                text-align:left;
                border-bottom:hidden;
                margin-left:30px;
            }
            h4,p{
                margin-left:20px !important;
            }
        </style>
<?php include ('assets/inc/head.php');?>

    <body>

        <!-- Begin page -->
        <div id="wrapper">

        <?php include("assets/inc/nav.php");?>
                <?php include("assets/inc/sidebar.php");?>
          
            <?php
                $pres_number=$_GET['pres_number'];
                $pres_id=$_GET['pres_id'];
                $doc_id=$_GET['doc_id'];
               
                $ret="SELECT  * FROM prescription JOIN doc ON prescription.doc_id = doc.doc_id WHERE pres_number = ? AND pres_id = ?" ;
                $stmt= $mysqli->prepare($ret) ;
                $stmt->bind_param('ii',$pres_number,$pres_id);
                //$stmt->bind_param('i',$pres_id);
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
                                                <li class="breadcrumb-item"><a href="dashboard.php">Prescriptions</a></li>
                                            </ol>
                                        </div>
                                        <h4 class="page-title">Presecription No: <b><?php echo $row->pres_number;?></b></h4>
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
                                                <div class="pl-xl-3 mt-3 mt-xl-0">
                                                <center><b><h3>Prescription</h3></b></center>
                                                    <table id="table_id1" border="1" style="width:100%;height: 400px; ">
                                                    
                                                    <th colspan="6"></th>
                                                    <th></th>
                                                        <tr > 
                                                            <td  rowspan="6"style="border-right:hidden;"><img src="../doc/assets/images/logo-sm.png" style="height:80px;width:80px;margin-top:-180px;margin-left:20px !important;"id="img1" ></td>
                                                            <td  colspan="3" rowspan="6" style="width:300px;border-right:hidden">
                                                              
                                                            </td>
                                                            <td id="b1" style="border-top:1px solid black!important;"colspan="4"><h4>Doctor Name:<b id="b2">&nbsp&nbsp<?php echo $row->doc_fname;?>&nbsp&nbsp<?php echo $row->doc_lname;?></b></h4></td>
                                                        </tr>
                                                            <tr>
                                                                <td id="b1" colspan="4"><h4>Edu: <b id="b2">&nbsp&nbsp<?php echo $row->doc_edu;?></b></h4></td>
                                                            </tr>
                                                            <tr>
                                                                <td id="b1" colspan="4"><h4>Department: <b id="b2">&nbsp&nbsp<?php echo $row->doc_dept;?></b></h4></td>
                                                            </tr>
                                                            <tr>
                                                                <td id="b1" colspan="4"><h4>Email: <b id="b2">&nbsp&nbsp<?php echo $row->doc_email;?></b></h4></td>
                                                            </tr>
                                                            <tr>
                                                                <td id="b1" colspan="4"><h4>Contact No:<b id="b2">&nbsp&nbsp<?php echo $row->doc_cont;?></b></h4></td>
                                                            </tr>
                                                            <tr>
                                                                <td id="b1" colspan="4"><h4>City: <b id="b2">&nbsp&nbsp<?php echo $row->doc_city;?></b></h4></td>
                                                            </tr>
                                                                
                                                                                                          
                                                            
                                                            <tr>
                                                        
                                                        <td colspan="8" id="b3"style="border-top:1px solid black;"> <h4 style="padding-right:50px;">Patient Name:<b id="b2">&nbsp&nbsp<?php echo $row->pres_pat_name;?></b></h4></td>
                                                        
                                                    </tr>
                                                    <tr>
                                                        
                                                                <td colspan="8" id="b3"> <h4 style="padding-right:60px;"> Patient No:<b id="b2">&nbsp&nbsp<?php echo $row->pres_pat_number;?></b></h4></td>
                                                                
                                                            </tr>
                                                    <tr>
                                                                <td colspan="8"> <h4>Ailment:&nbsp&nbsp<b id="b2"><?php echo $row->pres_pat_ailment;?></b></h4></td>
                                                               
                                                            </tr>
                                                            <br>

                                                            <tr>
                                                                <td colspan="8" style="text-align:left"><br>
                                                                <p  style="text-align:left;font-size: x-large;color: #b71a1a;font-family: initial;">Prescription
                                                        <?php echo $row->pres_ins;?><br><br><br><br><br><br<br><br><br>
                                                    </p>
                                                                </td>
                                                            
                </tr>
                                                            <tr>     
                                                                
                                                   
                                               
                                                    
                                                    <hr>
                </table>
                
                
                                                </div>
                                            </div> <!-- end col -->
                                        </div>
                                        <div class="mt-4 mb-1">
                                            <div class="text-right d-print-none">
                                                <a href="javascript:window.print()" class="btn btn-primary waves-effect waves-light"><i class="mdi mdi-printer mr-1"></i> Print</a>
                                            </div>
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
        <!-- END wrapper -->

        

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- Vendor js -->
        <script src="assets/js/vendor.min.js"></script>

        <!-- App js -->
        <script src="assets/js/app.min.js"></script>
        
    </body>

</html>