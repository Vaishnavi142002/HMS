<?php
	session_start();
	include('../assets/inc/config.php');
		if(isset($_POST['add_nurse']))
		{
			$patient_name=$_POST['patient_name'];
			$patient_number=$_POST['patient_number'];
            $patient_room_no=$_POST['patient_room_no'];
            $patient_pwd=sha1(md5($_POST['patient_pwd']));
            $patient_email= $_POST['patient_email'];
            $patient_type=$_POST['patient_type'];
            $patient_add=$_POST['patient_add'];
            $patient_age=$_POST['patient_age'];
            $patient_ailment=$_POST['patient_ailment'];
           
			$query="insert into user (patient_name,patient_email,patient_pwd,patient_number,patient_room_no,patient_type,patient_add,patient_age,patient_ailment) values(?,?,?,?,?,?,?,?,?)";
			$stmt = $mysqli->prepare($query);
			$rc=$stmt->bind_param('sssssssss',$patient_name,$patient_email,$patient_pwd,$patient_number,$patient_room_no,$patient_type,$patient_add,$patient_age,$patient_ailment);
			$stmt->execute();
			if($stmt)
			{
				$success = " $patient_number user Details Added";
			}
			else {
				$err = "Please Try Again Or Try Later";
			}			
		}
?>
<!DOCTYPE html>
<html lang="en">
    <?php include('assets/inc/head.php');?>
    <body class= "authentication-bg authentication-bg-pattern">
        <div id="wrapper">
            <div class="content-page ">
                <div class="content">
                    <div class="container"> 
                        <div class="row">
                            <div class="col-md-8 col-lg-8">
                                <div class="card">
                                    <div class="card-body">
                                        <form method="post" action="">
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="text" class="col-form-label"> Name</label>
                                                    <input type="text" required="required" name="patient_name" class="form-control" id="input" placeholder="Name">
                                                </div>
                                                <div class="form-group col-md-6">
                                                <label for="text" class="col-form-label">Room No</label>
                                                <input required="required" type="text" class="form-control" name="patient_room_no" id="input" placeholder="Room">
                                            </div>
                                                
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="email" class="col-form-label">Email</label>
                                                    <input required="required" type="text" name="patient_email" class="form-control"  id="inputEmail4" placeholder="Email">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputPassword4" class="col-form-label">password</label>
                                                    <input required="required" type="text" name="patient_pwd" class="form-control"  id="inputPassword4" placeholder="PAssword">
                                                </div>
                                            </div>
                                            <div class="form-row">
                                            <div class="form-group col-md-6">
                                                    <label for="inputState" class="col-form-label">Patient's Type</label>
                                                    <select id="inputState" required="required" name="patient_type" class="form-control">
                                                        <option>Choose</option>
                                                        <option>InPatient</option>
                                                        <option>OutPatient</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputPassword4" class="col-form-label">Address</label>
                                                    <input required="required" type="text" name="patient_add" class="form-control"  id="inputAddress" placeholder="Age">
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="email" class="col-form-label">Age</label>
                                                    <input required="required" type="text" name="patient_age" class="form-control"  id="inputAge" placeholder="Age">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputPassword4" class="col-form-label">Illness</label>
                                                    <input required="required" type="text" name="patient_ailment" class="form-control"  id="inputAddress" placeholder="Illness">
                                                </div>
                                            </div>
                                            <div class="form-row">
                                            <div class="form-group col-md-2" style="display:none">
                                                    <?php 
                                                        $length = 5;    
                                                        $patient_number =  substr(str_shuffle('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'),1,$length);
                                                    ?>
                                                    <label for="inputZip" class="col-form-label">Nurse Number</label>
                                                    <input type="text" name="patient_number" value="<?php echo $patient_number;?>" class="form-control" id="inputZip">
                                                </div>
                                            </div>

                                           <center> <button type="submit" name="add_nurse" class="ladda-button btn btn-primary" data-style="expand-right">Register</button><br>
                                           <p class="text-Black-50"><br> <a href="index.php" class="text-Black ml-1"><b>Log In</b></a> OR <a href="../index.html" class="text-black ml-1"><b>Home</b></a></p></center>
                        
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
        <script src="../assets/js/vendor.min.js"></script>
        <script src="../assets/js/app.min.js"></script>
        <script src="../assets/libs/ladda/spin.js"></script>
        <script src="../assets/libs/ladda/ladda.js"></script>
        <script src="../assets/js/pages/loading-btn.init.js"></script> 
    </body>
</html>