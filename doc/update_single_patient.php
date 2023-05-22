<!--Server side code to handle  Patient Registration-->
<?php
	session_start();
	include('../assets/inc/config.php');
		if(isset($_POST['update_patient']))
		{
			$patient_name=$_POST['patient_name'];
			$patient_number=$_GET['patient_number'];
            $patient_id=$_GET['patient_id'];
            $patient_type=$_POST['patient_type'];
            $patient_add=$_POST['patient_add'];
            $patient_age = $_POST['patient_age'];
            $patient_email=$_POST['patient_email'];
            $patient_room_no = $_POST['patient_room_no'];
           
            $patient_ailment = $_POST['patient_ailment'];
			$query="UPDATE  user  SET patient_name=?,patient_age=?,patient_type=?, patient_add=?, patient_ailment=?,patient_room_no=?,patient_email=? WHERE patient_id=?";
			$stmt = $mysqli->prepare($query);
			$rc=$stmt->bind_param('sssssssssis', $patient_name,$patient_age,$patient_type, $patient_add, $patient_ailment,$patient_room_no,$patient_email,$patient_id);
			$stmt->execute();
			if($stmt)
			{
				$success = "Updated";
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
                            $ret="SELECT  * FROM user WHERE patient_id=?";
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
                                                    <input type="text" required="required" value="<?php echo $row->patient_name;?>" name="patient_name" class="form-control" id="inputAddress" placeholder="Name">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputPassword4" class="col-form-label">Email</label>
                                                    <input required="required" type="text" value="<?php echo $row->patient_email;?>" name="patient_email" class="form-control"  id="inputEmail4" placeholder="Email">
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputEmail4" class="col-form-label">Room</label>
                                                    <input type="text" required="required" value="<?php echo $row->patient_room_no;?>" name="patient_room_no" class="form-control" id="input" placeholder="Room">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputPassword4" class="col-form-label">Age</label>
                                                    <input required="required" type="text" value="<?php echo $row->patient_age;?>" name="patient_age" class="form-control"  id="inputPassword4" placeholder=" Age">
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                
                                                <div class="form-group col-md-6">
                                                    <label for="inputCity" class="col-form-label">Diease</label>
                                                    <input required="required" type="text" value="<?php echo $row->patient_ailment;?>" name="patient_ailment" class="form-control" id="inputCity">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputState" class="col-form-label">Type</label>
                                                    <select id="inputState" required="required" name="patient_type" class="form-control">
                                                        <option>Choose</option>
                                                        <option>InPatient</option>
                                                        <option>OutPatient</option>
                                                    </select>
                                                </div>

                                            <div class="form-group">
                                                <label for="inputAddress" class="col-form-label">Address</label>
                                                <input required="required" type="text" value="<?php echo $row->patient_add;?>" class="form-control" name="patient_add" id="inputAddress" placeholder="Patient's Addresss">
                                            </div></div>
                                            <button type="submit" name="update_patient" class="ladda-button btn btn-success" data-style="expand-right">Update</button>
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