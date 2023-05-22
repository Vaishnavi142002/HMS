<!--Server side code to handle  Patient Transfer-->
<?php
	session_start();
	include('../assets/inc/config.php');
		if(isset($_POST['transfer_patient']))
		{
            $patient_number=$_GET['patient_number'];
            $patient_id=$_GET['patient_id'];
            $t_pat_number = $_POST['t_pat_number'];
			$t_pat_name=$_POST['t_pat_name'];
			$t_date=$_POST['t_date'];
			$t_hospital=$_POST['t_hospital'];
            $t_status=$_POST['t_status'];
			$query="INSERT INTO transfers_p (t_pat_number, t_pat_name, t_date, t_hospital, t_status) VALUES(?,?,?,?,?)";
			$stmt = $mysqli->prepare($query);
			$rc=$stmt->bind_param('sssss', $t_pat_number, $t_pat_name, $t_date, $t_hospital, $t_status);
			$stmt->execute();
			if($stmt)
			{
				$success = "Transferred";
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
                                                <div class="form-group col-md-12">
                                                    <label for="inputEmail4" class="col-form-label"> Name</label>
                                                    <input type="text" required="required" value="<?php echo $row->patient_name;?>" name="t_pat_name" class="form-control" id="inputEmail4" placeholder="Name">
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputEmail4" class="col-form-label">Refferal Hospital</label>
                                                    <input type="text" required="required"  name="t_hospital" class="form-control" id="inputEmail4" placeholder="Refferal Hospital">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputPassword4" class="col-form-label"> Date</label>
                                                    <input required="required" type="date"  name="t_date" class="form-control"  id="inputPassword4" placeholder="DD/MM/YYYY">
                                                </div>
                                                <div class="form-group col-md-6" style="display:none">
                                                    <label for="inputPassword4" class="col-form-label">Patient Number </label>
                                                    <input required="required" type="text"  name="t_pat_number" value="<?php echo $row->patient_number;?>" class="form-control"  id="inputPassword4" placeholder="">
                                                </div>
                                            </div>

                                            <div class="form-group" style="display:none">
                                                <label for="inputAddress" class="col-form-label"> Status</label>
                                                <input required="required" type="text" value="Success" class="form-control" name="t_status" id="inputAddress" placeholder="Patient's Addresss">
                                            </div>
                                            <button type="submit" name="transfer_patient" class="ladda-button btn btn-success" data-style="expand-right">Transfer Patient</button>
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