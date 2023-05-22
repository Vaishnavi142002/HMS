<?php
	session_start();
	include('../assets/inc/config.php');
		if(isset($_POST['add_patient_vitals']))
		{
            $patient_id = $_GET['patient_id'];
			$temp_number = $_POST['temp_number'];
			$temp_pat_number = $_POST['temp_pat_number'];
            $bodytemp  = $_POST['bodytemp'];
            $humidity = $_POST['humidity'];    
			$query="INSERT INTO  temp_r  (temp_number, patient_id,temp_pat_number, bodytemp, humidity) VALUES(?,?,?,?,?)";
			$stmt = $mysqli->prepare($query);
			$rc=$stmt->bind_param('sisss', $temp_number,$patient_id, $temp_pat_number, $bodytemp, $humidity);
			$stmt->execute();
			if($stmt)
			{
				$success = "Data Addded";
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
            <?php
                $patient_number = $_GET['patient_number'];
                $ret="SELECT  * FROM user WHERE patient_number=?";
                $stmt= $mysqli->prepare($ret) ;
                $stmt->bind_param('s',$patient_number);
                $stmt->execute() ;
                $res=$stmt->get_result();
                while($row=$res->fetch_object())
                {
            ?>
                <div class="content-page">
                    <div class="content">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-12">
                                    <div class="page-title-box">
                                        <div class="page-title-right">
                                            <ol class="breadcrumb m-0">
                                                <li class="breadcrumb-item"><a href="dashboard.php">Lab Test</a></li>
                                                
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
                                                        <input type="text" required="required" readonly name="" value="<?php echo $row->patient_name;?>" class="form-control" id="inputEmail4" placeholder=" Name">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="inputEmail4" class="col-form-label"> Number</label>
                                                        <input type="text" required="required" readonly name="temp_pat_number" value="<?php echo $row->patient_number;?>" class="form-control" id="inputEmail4" placeholder="Number">
                                                    </div>
                                                    

                                                </div>

                                                <div class="form-row">
                                                <div class="form-group col-md-8">
                                                        <label for="inputPassword4" class="col-form-label"> Illness</label>
                                                        <input required="required" type="text" readonly name="" value="<?php echo $row->patient_ailment;?>" class="form-control"  id="inputAddress4" placeholder="Illness">
                                                    </div>
                                                </div>

                                                
                                                <hr>
                                                <div class="form-row">
                                                    
                                            
                                                    <div class="form-group col-md-2" style="display:none">
                                                        <?php 
                                                            $length = 5;    
                                                            $vit_no =  substr(str_shuffle('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'),1,$length);
                                                        ?>
                                                        <label for="inputZip" class="col-form-label">Record Number</label>
                                                        <input type="text" name="temp_number" value="<?php echo $vit_no;?>" class="form-control" id="inputZip">
                                                    </div>
                                                </div>

                                                <div class="form-row">

                                                    <div class="form-group col-md-5">
                                                        <label for="inputEmail4" class="col-form-label"> Body Temperature °C</label>
                                                        <input type="text" required="required"  name="bodytemp"class="form-control" id="inputEmail4" placeholder="°C">
                                                    </div>

                                                    <div class="form-group col-md-5">
                                                        <label for="inputPassword4" class="col-form-label"> Humidity</label>
                                                        <input required="required" type="text"  name="humidity"  class="form-control"  id="inputPassword4" placeholder=" ">
                                                    </div>
                `                                  </div>
                <div class="form-row">

                                                    

                                                </div>

                                                <button type="submit" name="add_patient_vitals" class="ladda-button btn btn-success" data-style="expand-right">Add </button>

                                            </form>
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
        <script src="//cdn.ckeditor.com/4.6.2/basic/ckeditor.js"></script>
        <script type="text/javascript">
        CKEDITOR.replace('editor')
        </script>
        <script src="assets/js/vendor.min.js"></script>
        <script src="assets/js/app.min.js"></script>
        <script src="assets/libs/ladda/spin.js"></script>
        <script src="assets/libs/ladda/ladda.js"></script>
        <script src="assets/js/pages/loading-btn.init.js"></script>        
    </body>
</html>