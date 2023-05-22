<!--Server side code to handle  Patient Discharge-->
<?php
	session_start();
	include('../assets/inc/config.php');
		if(isset($_POST['discharge_patient']))
		{
            $patient_id = $_GET['patient_id'];
            $patient_discharge = $_POST['patient_discharge'];
            $patient_type = $_POST['patient_type'];
            //sql to insert captured values
			$query="UPDATE  user  SET patient_discharge=? , patient_type=? WHERE patient_id = ?";
			$stmt = $mysqli->prepare($query);
			$rc=$stmt->bind_param('ssi', $patient_discharge,$patient_type,$patient_id);
			$stmt->execute();
			
			if($stmt)
			{
				$success = "Patient Discharged";
			}
			else {
				$err = "Please Try Again Or Try Later";
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

            <!-- ========== Left Sidebar Start ========== -->
            <?php include("assets/inc/nav.php");?>
            <?php include("assets/inc/sidebar.php");?>
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

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
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Discharge Patients</a></li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 
                        <!-- Form row -->
                        <!--LETS GET DETAILS OF SINGLE PATIENT GIVEN THEIR ID-->
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
                                                <div class="form-group col-md-6">
                                                    <label for="inputEmail4" class="col-form-label">Name</label>
                                                    <input type="text" required="required" value="<?php echo $row->patient_name;?>" name="patient_name" class="form-control" id="inputEmail4" placeholder="">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputPassword4" class="col-form-label">Number</label>
                                                    <input required="required" type="text" value="<?php echo $row->patient_number;?>" name="patient_number" class="form-control"  id="inputAddress" placeholder="">
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputEmail4" class="col-form-label">Email</label>
                                                    <input type="email" required="required" value="<?php echo $row->patient_email;?>" name="patient_email" class="form-control" id="inputEmail4" placeholder="Email">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputPassword4" class="col-form-label">Age</label>
                                                    <input required="required" type="number" value="<?php echo $row->patient_age;?>" name="patient_age" class="form-control"  id="input" placeholder="Age">
                                                </div>
                                            </div>

                                            <div class="form-row">

                                                <div class="form-group col-md-6">
                                                    <label for="inputCity" class="col-form-label">Room</label>
                                                    <input required="required" type="text" value="<?php echo $row->patient_room_no;?>" name="patient_room_no" class="form-control" id="inputCity">
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label for="inputCity" class="col-form-label">Address</label>
                                                    <input required="required" type="text" value="<?php echo $row->patient_add;?>" name="patient_add" class="form-control" id="inputAddress">
                                                </div>

                                                <div class="form-group col-md-6" style="display:none">
                                                    <label for="inputCity" class="col-form-label">Discharge</label>
                                                    <input required="required" type="text" name="patient_discharge" value="Discharged" class="form-control" id="inputCity">
                                                </div>

                                                
                                                <div class="form-group col-md-6" style="display:none">
                                                    <label for="inputState" class="col-form-label"></label>
                                                    <input required="required" type="text" name="patient_type" value="OutPatients" class="form-control" id="inputCity">
                                                </div>
                                            </div>

                                            <button type="submit" name="discharge_patient" class="ladda-button btn btn-success" data-style="expand-right">Discharge</button>

                                        </form>
                                        <!--End Patient Form-->
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