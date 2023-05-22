<?php
  session_start();
  include('../assets/inc/config.php');
  include('assets/inc/checklogin.php');
  check_login();
  $doc_id=$_SESSION['doc_id'];
?>
<!DOCTYPE html>
    <html lang="en">
    <?php include('assets/inc/head.php');?>
    <style>
        h4{
            padding-left:30px;
        }
        </style>

    <body>
        <div id="wrapper">
             <?php include("assets/inc/nav.php");?>
                <?php include("assets/inc/sidebar.php");?>
            <?php
                $patient_number=$_GET['patient_number'];
                $patient_id=$_GET['patient_id'];
                $ret="SELECT  * FROM user WHERE patient_id=?";
                $stmt= $mysqli->prepare($ret) ;
                $stmt->bind_param('i',$patient_id);
                $stmt->execute() ;
                $res=$stmt->get_result();
                while($row=$res->fetch_object())
            {
                $mysqlDateTime = $row->patient_doj;
            ?>
            <div class="content-page">
                <div class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Patients</a></li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title"><b><?php echo $row->patient_name;?></b></h4>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 ">
                                <div class="card-box text-left">
                             
                                    <table id="table_id1" border="1" style="width:100%;height: 60%; ">
                                                        <tr>
                                                        <tr > <td colspan="2"><h4><strong> Name :</strong><?php echo $row->patient_name;?></b></h4></td>
                                                                <td colspan="2"><h4><strong>Age :</strong> <span class="ml-2"><?php echo $row->patient_age;?> Years</h4></td>
                                                            </tr>
                                                            <tr>
                                                            <td colspan="2"><h4><strong>Address :</strong> <span class="ml-2"><?php echo $row->patient_add;?></h4></td>
                                                                <td colspan="2"><h4> <strong>Patient No: :</strong> <span class="ml-2"><?php echo $row->patient_number;?></h4></td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="2"><h4><strong>Room :</strong><span class="ml-2"><?php echo $row->patient_room_no;?></h4></td>
                                                                <td colspan="2"><h4><strong>Symtoms :</strong> <span class="ml-2"><?php echo $row->patient_ailment;?></h4></td>
                                                            </tr>
                                                            <tr>     
                                                            <td colspan="4"> <h4><strong>Date:</strong> <span class="ml-2"><?php echo date("d/m/Y - h:m", strtotime($mysqlDateTime));?></h4></td>
                                                               
                                                                </td>
                                                            
                                                            </tr>
                                                    </tr> <hr></table>
                                        
                                 
                                </div>
                            </div> </div>
                            <?php }?>
                            <div class="row">
                           
                            <div class="col-lg-12 col-xl-12">
                                <div class="card-box">
                                    <ul class="nav nav-pills navtab-bg nav-justified">
                                        
                                        <li class="nav-item col-md-6">
                                            <a href="#timeline" data-toggle="tab" aria-expanded="true" class="nav-link ">
                                                 Vitals
                                            </a>
                                        </li>
                                        
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane show " id="timeline">
                                            <div class="table-responsive">
                                                <table class="table table-borderless mb-0">
                                                    <thead class="thead-light">
                                                        <tr>
                                                            <th>Body Temperature</th>
                                                            <th>Humidity</th>
                                                            
                                                        </tr>
                                                    </thead>
                                                    <?php
                                                        $temp_pat_number =$_GET['patient_number'];
                                                        $ret="SELECT  * FROM temp_r WHERE temp_pat_number = '$temp_pat_number'";
                                                        $stmt= $mysqli->prepare($ret) ;
                                                        $stmt->execute() ;
                                                        $res=$stmt->get_result();
                                                        while($row=$res->fetch_object())
                                                            {
                                                        $mysqlDateTime = $row->vit_daterec; 
                                                    ?>
                                                        <tbody>
                                                            <tr>
                                                                <td><?php echo $row->bodytemp;?>°C</td>
                                                                <td><?php echo $row->humidity;?>BPM</td>
                                                                <td><?php echo date("Y-m-d", strtotime($mysqlDateTime));?></td>
                                                            </tr>
                                                        </tbody>
                                                    <?php }?>
                                                </table>
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
        <div class="rightbar-overlay"></div>
        <script src="assets/js/vendor.min.js"></script>
        <script src="assets/js/app.min.js"></script>
    </body>
</html>