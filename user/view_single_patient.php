<?php
  session_start();
  include('../assets/inc/config.php');
  include('assets/inc/checklogin.php');
  check_login();
  $patient_id=$_SESSION['patient_id'];
?>
<!DOCTYPE html>
    <html lang="en">
    <?php include('assets/inc/head.php');?>
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
                $stmt->execute() ;//ok
                $res=$stmt->get_result();
                //$cnt=1;
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
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            
                            <div class="col-lg-5 col-xl-5">
                                
                                        <div class="card card-block pl-xl-3 mt-3 mt-xl-0">
                                                <center><img src="assets/images/users/patient.png" alt="" style="height:40px;"></center>
                                                <h4 class="" >Name :<b><span class="ml-2"><?php echo $row->patient_name;?> </b>
                                                <h4 class="" >Patient Number : <b><span class="ml-2"><?php echo $row->patient_number;?> </b>
                                                <h4 class="" >Room :<b><span class="ml-2"><?php echo $row->patient_room_no;?></b>
                                                <h4 class="" >Address :<b> <span class="ml-2"><?php echo $row->patient_add;?></b>
                                                <h4 class="" >Age :<b> <span class="ml-2"><?php echo $row->patient_age;?> Years</b>
                                                <h4 class="" >Ailment :<b> <span class="ml-2"><?php echo $row->patient_ailment;?></b>
                                                <h4 class="" >Email :<b> <span class="ml-2"><?php echo $row->patient_email;?></h4></b>
                                                <h4 class="" >Date Recorded :<b> <span class="ml-2"><?php echo date("d/m/Y - h:m", strtotime($mysqlDateTime));?></b>
                                                    <br><br>
                                                <hr>
                                            </div>
                                    
                                </div> 
                         
                            
                            <?php }?>
                            <div class="col-lg-7 col-xl-7">
                                <div class=" card-block">
                                    <ul class="nav nav-pills navtab-bg nav-justified">
                                       
                                        <li class="nav-item">
                                            <a href="#timeline" data-toggle="tab" aria-expanded="true" class="nav-link ">
                                                 Lab Records
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
                                                        $ret="SELECT  * FROM temp_r WHERE temp_pat_number ='$temp_pat_number'";
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
        <div class="rightbar-overlay"></div>
        <script src="../assets/js/vendor.min.js"></script>
        <script src="../assets/js/app.min.js"></script>
    </body>
</html>