<?php
  session_start();
  include('../assets/inc/config.php');
  include('assets/inc/checklogin.php');
  check_login();
  $nurse_id = $_SESSION['nurse_id'];
?>
<!DOCTYPE html>
<html lang="en">  
    <style>
        td{
            color: Black;
            font-family: initial;
            font-size: large;
            padding-left: 20px;
        }
        #b1
        {
            color:#313d9c;
        }
        #b2{
            color:#942b4f;
        }
      
        </style>
<?php include ('assets/inc/head.php');?>
    <body>
        <div id="wrapper">
            <?php include('assets/inc/nav.php');?>
                <?php include("assets/inc/sidebar.php");?>
            <?php
                $lab_id=$_GET['lab_id'];
                $patient_id=$_GET['patient_id'];
                $ret="SELECT  * FROM lab WHERE lab_id = ? AND patient_id = ?";
                $stmt= $mysqli->prepare($ret) ;
                $stmt->bind_param('ii',$lab_id,$patient_id);
                $stmt->execute() ;
                $res=$stmt->get_result();
                while($row=$res->fetch_object())
                {
                    $mysqlDateTime = $row->lab_date_rec;
            ?>
                <div class="content-page">
                    <div class="content">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-12">
                                    <div class="page-title-box">
                                        <div class="page-title-right">
                                            <ol class="breadcrumb m-0">
                                                <li class="breadcrumb-item"><a href="javascript: void(0);">Labs</a></li>
                                            </ol>
                                        </div>
                                        <h4 class="page-title"><b>Test no: <?php echo $row->lab_number;?></b></h4>
                                    </div>
                                </div>
                            </div>    
                            <div class="row">
                                <div class="col-12">
                                    <div class="card-box">
                                        <div class="row">
                                            <div class="col-xl-1">
                                               
                                            </div> 
                                            <div class="card bg-pattern col-xl-10">
                                                <div class="card-body pl-xl-3 mt-3 mt-xl-0">
                                                <table  border="1" style="width:100%;height: 300px; ">
                                            
                                                      
                                                        <tr>
                                                            <td>Name : <b id="b1"><?php echo $row->lab_pat_name;?></b></td>
                                                            <td>Number : <b id="b1"><?php echo $row->lab_pat_number;?></b></td>
                                                            
                                                        </tr>
                                                        <tr>
                                                            <td>Diease :<b id="b1"> <?php echo $row->lab_pat_ailment;?></b></td>
                                                            <td>Date  : <b id="b1"><?php echo date("d/m/Y - h:m:s", strtotime($mysqlDateTime));?></b></td>
            
                                                        </tr>
                                                        <tr>
                                                            <td><b>Test </b>
                                                                <p>
                                                                    <?php echo $row->lab_pat_tests;?>
                                                                </p>
                                                            
                                                        </td>
                                                        <td><b>Result </b ><p>
                                                            <?php echo $row->lab_pat_results;?>
                                                                </p>
                                                            
                                                        </td>
                                                        </tr>
                                                       
                                                    
                                                </table>
                                                   
                                                 
                                                </div>
                                                <div class="mt-4 mb-1">
                                            <div class="text-right d-print-none">
                                                <a href="javascript:window.print()" class="btn btn-primary waves-effect waves-light"><i class="mdi mdi-printer mr-1"></i> Print</a>
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