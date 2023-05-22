<?php
	session_start();
	include('../assets/inc/config.php');
		if(isset($_POST['add_patient']))
		{
			$patient_name=$_POST['patient_name'];
			$patient_room_no=$_POST['patient_room_no'];
			$patient_number=$_POST['patient_number'];
            $patient_type=$_POST['patient_type'];
            $patient_add=$_POST['patient_add'];
            $patient_age = $_POST['patient_age'];
            $patient_email = $_POST['patient_email'];
            $patient_ailment = $_POST['patient_ailment'];
            $patient_pwd=sha1(md5($_POST['patient_pwd']));
			$query="insert into user (patient_name, patient_ailment,patient_room_no,patient_age,patient_number,patient_type,patient_add,patient_pwd,patient_email ) values(?,?,?,?,?,?,?,?,?)";
			$stmt = $mysqli->prepare($query);
			$rc=$stmt->bind_param('ssiisssss', $patient_name, $patient_ailment,$patient_room_no,$patient_age,$patient_number,$patient_type,$patient_add,$patient_pwd,$patient_email );
			$stmt->execute();
			if($stmt)
			{
				$success = "Added";
			}
			else {
				$err = "Try Later";
			}			
		}
?>
<!DOCTYPE html>
<html lang="en">
    <?php include('assets/inc/head.php');?>
    <body>
        <div id="wrapper">
            <?php include("assets/inc/nav.php");?>
            <?php include("assets/inc/sidebar.php");?>
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
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                    <form method="post">
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputEmail4" class="col-form-label"> Name</label>
                                                    <input type="text" required="required" name="patient_name" class="form-control" id="inputAddress4" placeholder="Patient's First Name">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputPassword4" class="col-form-label">Age</label>
                                                    <input required="required" type="text" name="patient_age" class="form-control"  id="inputPassword4" placeholder="Patient`s Last Name">
                                                </div>
                                            </div>

                                            <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="inputAddress" class="col-form-label">Address</label>
                                                <input required="required" type="text" class="form-control" name="patient_add" id="inputAddress" placeholder="Patient's Addresss">
                                            </div>

                                               
                                                <div class="form-group col-md-6">
                                                    <label for="inputPassword4" class="col-form-label">Room </label>
                                                    <input required="required" type="text" name="patient_room_no" class="form-control"  id="inputPassword4" placeholder="Patient`s Age">
                                                </div>
                                            </div>
                                            
                                            <div class="form-row">
                                            <div class="form-group col-md-6">
                                                    <label for="inputCity" class="col-form-label">Patient Ailment</label>
                                                    <input required="required" type="text" name="patient_ailment" class="form-control" id="inputCity">
                                                </div>
                                               
                                                <div class="form-group col-md-6">
                                                    <label for="inputState" class="col-form-label">Patient's Type</label>
                                                    <select id="inputState" required="required" name="patient_type" class="form-control">
                                                        <option>Choose</option>
                                                        <option>InPatient</option>
                                                        <option>OutPatient</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="email" class="col-form-label">Email</label>
                                                    <input required="required" type="email" name="patient_email" class="form-control" id="inputCity">
                                                </div>
                                                <div class="form-group col-md-2" style="display:none">
                                                    <?php 
                                                        $length = 5;    
                                                        $patient_number =  substr(str_shuffle('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'),1,$length);
                                                    ?>
                                                    <label for="inputZip" class="col-form-label">Patient Number</label>
                                                    <input type="text" name="patient_number" value="<?php echo $patient_number;?>" class="form-control" id="inputZip">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputPassword4" class="col-form-label">password</label>
                                                    <input required="required" type="text" name="patient_pwd" class="form-control"  id="inputPassword4" placeholder="Patient`s Age">
                                                </div>
                                            </div>

                                            <button type="submit" name="add_patient" class="ladda-button btn btn-primary" data-style="expand-right">Add </button>
                                        </form>
                                        
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
        <script src="assets/libs/ladda/spin.js"></script>
        <script src="assets/libs/ladda/ladda.js"></script>
        <script src="assets/js/pages/loading-btn.init.js"></script> 
    </body>
</html>