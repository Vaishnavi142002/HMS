<!--Server side code to handle  Patient Transfer-->
<?php
	session_start();
	include('../assets/inc/config.php');
		if(isset($_POST['transfer_patient']))
		{
            $patient_number=$_GET['patient_number'];
            $t_patient_id=$_GET['patient_id'];
            $t_patient_type=$_POST['t_patient_type'];
            $t_patient_discharge=$_POST['t_patient_discharge'];
            $t_pat_number = $_POST['t_pat_number'];
			$t_pat_name=$_POST['t_pat_name'];
			$t_date=$_POST['t_date'];
			$t_hospital=$_POST['t_hospital'];
            $t_status=$_POST['t_status'];
            
            
            //sql to insert captured values
			$query="INSERT INTO transfers_p (t_patient_id,t_patient_discharge, t_pat_number, t_pat_name, t_date, t_hospital, t_status, t_patient_type) VALUES(?,?,?,?,?,?,?,?)";
			$stmt = $mysqli->prepare($query);
			$rc=$stmt->bind_param('isssssss', $t_patient_id,$t_patient_discharge, $t_pat_number, $t_pat_name, $t_date, $t_hospital, $t_status,$t_patient_type);
			$stmt->execute();
            

            if($stmt)
            {
                $q="UPDATE  user  SET patient_type='OutPatient',patient_discharge=? WHERE patient_id = ?";
			$stmt2 = $mysqli->prepare($q);
			$rc=$stmt2->bind_param('si',$patient_discharge,$patient_id);
			$stmt2->execute();
            
            
			if($stmt2)
			{
                $success = "Updates";
			}
			else {
				$err = "Try Later";
			}

                $success = "Transferred";
            }
            else {
                $err = "Try Later";
            }	
            		}
?>
<!DOCTYPE html>
<html lang="en">
    
    <!--Head-->
    <?php include('assets/inc/head.php');?>
    <body>

        <!-- Begin page -->
        <div id="wrapper">

        <?php include("assets/inc/nav.php");?>
            <?php include("assets/inc/sidebar.php");?>
           
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
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Patients</a></li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>     
                        <?php
                            $patient_id=$_GET['patient_id'];
                            $ret="SELECT  * FROM user WHERE patient_id=?";
                            $stmt= $mysqli->prepare($ret) ;
                            $stmt->bind_param('i',$patient_id);
                            $stmt->execute() ;//ok
                            $res=$stmt->get_result();
                            //$cnt=1;
                            while($row=$res->fetch_object())
                            {
                        ?>
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <!--Add Patient Form-->
                                        <form method="post">
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label for="inputEmail4" class="col-form-label">Name</label>
                                                    <input type="text" required="required" value="<?php echo $row->patient_name;?>" name="t_pat_name" class="form-control" id="inputEmail4" placeholder="Name">
                                                </div>
                                                
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputEmail4" class="col-form-label">Refferal Hospital</label>
                                                    <input type="text" required="required"  name="t_hospital" class="form-control" id="inputEmail4" placeholder="Refferal/Transfer Hospital">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputPassword4" class="col-form-label">Date</label>
                                                    <input required="required" type="date"  name="t_date" class="form-control"  id="inputPassword4" placeholder="DD/MM/YYYY">
                                                </div>
                                                <div class="form-group col-md-6" style="display:none">
                                                    <label for="inputPassword4" class="col-form-label">Patient Number </label>
                                                    <input required="required" type="text"  name="t_pat_number" value="<?php echo $row->patient_number;?>" class="form-control"  id="inputPassword4" placeholder="">
                                                </div>
                                            </div>

                                            <div class="form-group" style="display:none">
                                                <label for="inputAddress" class="col-form-label">Transfer Status</label>
                                                <input required="required" type="text" value="Success" class="form-control" name="t_status" id="inputAddress" placeholder="To">
                                            </div>
                                            <div class="form-group col-md-6">
                                                    <label for="inputState" class="col-form-label">Type</label>
                                                    <select id="inputState" required="required" name="t_patient_type" class="form-control">
                                                        <option>Choose</option>
                                                        <option>InPatient</option>
                                                        <option>OutPatient</option>
                                                    </select>
                                                </div>
                                                
                                                <div class="form-group col-md-6">
                                                    <label for="inputState" class="col-form-label"></label>
                                                    <input required="required" type="text" name="t_patient_discharge" value=" " class="form-control" id="inputCity">
                                               
                                                </div>
                                                <div class="form-group col-md-6" style="display:none">
                                                    <label for="inputCity" class="col-form-label">Discharge</label>
                                                    <input required="required" type="text" name="patient_discharge" value="Discharged" class="form-control" id="inputCity">
                                                </div>

                                            <button type="submit" name="transfer_patient" class="ladda-button btn btn-success" data-style="expand-right">Transfer</button>

                                        </form>
                                    </div> <!-- end card-body -->
                                </div> <!-- end card-->
                            </div> <!-- end col -->
                        </div>
                        <?php  }?>
                        <!-- end row -->

                    </div> <!-- container -->

                </div> <!-- content -->

              
            </div>

           

        </div>
        <!-- END wrapper -->

       
        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- Vendor js -->
        <script src="assets/js/vendor.min.js"></script>

        <!-- App js-->
        <script src="assets/js/app.min.js"></script>

        <!-- Loading buttons js -->
        <script src="assets/libs/ladda/spin.js"></script>
        <script src="assets/libs/ladda/ladda.js"></script>

        <!-- Buttons init js-->
        <script src="assets/js/pages/loading-btn.init.js"></script>
        
    </body>

</html>