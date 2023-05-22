<?php
	session_start();
	include('../assets/inc/config.php');
		if(isset($_POST['discharge_patient']))
		{
            $patient_id=$_GET['patient_id'];
            $patient_number=$_GET['patient_number'];
            $patient_discharge=$_POST['patient_discharge'];
			$query="UPDATE  user  SET patient_discharge=?  WHERE patient_id = ?";
			$stmt = $mysqli->prepare($query);
			$rc=$stmt->bind_param('si', $patient_discharge,$patient_id);
			$stmt->execute();
			if($stmt)
			{
				$success = "Discharged";
			}
			else {
				$err = "Please Try Again Or Try Later";
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
                        <?php
                            $patient_id=$_GET['patient_id'];
                            $ret="SELECT * FROM user WHERE patient_id=?";
                            $stmt= $mysqli->prepare($ret) ;
                            $stmt->bind_param('i',$patient_id);
                            $stmt->execute() ;
                            $res=$stmt->get_result();
                            while($row=$res->fetch_object())
                            {
                        ?>
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <form method="post">
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputEmail4" class="col-form-label">Name</label>
                                                    <input type="text" required="required" value="<?php echo $row->patient_name;?>" name="patient_name" class="form-control" id="inputEmail4" placeholder="Name">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputEmail4" class="col-form-label">Room</label>
                                                    <input type="text" required="required" value="<?php echo $row->patient_room_no;?>" name="patient_room_no" class="form-control" id="inputEmail4" placeholder="Room">
                                                </div>
                                            </div>

                                            <div class="form-row">
                                            <div class="form-group col-md-6">
                                                    <label for="inputCity" class="col-form-label">Number</label>
                                                    <input required="required" type="text" value="<?php echo $row->patient_number;?>" name="patient_number" class="form-control">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputPassword4" class="col-form-label">Age</label>
                                                    <input required="required" type="number" value="<?php echo $row->patient_age;?>" name="patient_age" class="form-control"  id="inputPassword4" placeholder="Patient`s Age">
                                                </div>
                                            </div>

                                            <div class="form-row">

                                            <div class="form-group col-md-6">
                                                    <label for="inputEmail4" class="col-form-label">Room</label>
                                                    <input type="text" required="required" value="<?php echo $row->patient_room_no;?>" name="patient_room_no" class="form-control" id="inputEmail4" placeholder="Room">
                                                </div>
                                               

                                                <div class="form-group col-md-6">
                                                    <label for="inputCity" class="col-form-label">Ailment</label>
                                                    <input required="required" type="text" value="<?php echo $row->patient_ailment;?>" name="patient_ailment" class="form-control" id="inputCity">
                                                </div>

                                                <div class="form-group col-md-6" style="display:none">
                                                    <label for="inputCity" class="col-form-label">Discharge</label>
                                                    <input required="required" type="text" name="patient_discharge" value="Discharged" class="form-control" id="inputCity">
                                                </div>

                                                
                                                <div class="form-group col-md-6" style="display:none">
                                                    <label for="inputState" class="col-form-label"></label>
                                                    <select id="inputState" required="required" name="patient_type" class="form-control">
                                                        <option>Choose</option>
                                                        <option>InPatient</option>
                                                        <option>OutPatient</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <button type="submit" name="discharge_patient" class="ladda-button btn btn-success" data-style="expand-right">Discharge</button>
                                        </form>
                                    </div> 
                                </div> 
                            </div>
                        </div>
                        <?php  }?>
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