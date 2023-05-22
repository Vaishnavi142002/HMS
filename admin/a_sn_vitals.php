<<?php
	session_start();
	include('../assets/inc/config.php');
		if(isset($_POST['add_n_vitals']))
		{
			$medi_number  = $_POST['medi_number '];
			$medi_nurse_id = $_POST['medi_nurse_id'];
            $medi_temp  = $_POST['medi_temp'];
            $medi_heartp = $_POST['medi_heartp'];
            $medi_bloodp = $_POST['medi_bloodp'];
        
			$query="INSERT INTO  nurse_medi_re  (medi_number , medi_nurse_id, medi_temp, medi_heartp, medi_bloodp) VALUES(?,?,?,?,?)";
			$stmt = $mysqli->prepare($query);
			$rc=$stmt->bind_param('ssssss', $medi_number , $medi_nurse_id, $medi_temp, $medi_heartp, $medi_bloodp);
			$stmt->execute();
		
			if($stmt)
			{
				$success = "Addded";
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
                $nurse_number = $_GET['nurse_number'];
                $ret = "SELECT  * FROM nurse WHERE nurse_number=?";
                $stmt= $mysqli->prepare($ret) ;
                $stmt->bind_param('s',$nurse_number);
                $stmt->execute() ;//ok
                $res=$stmt->get_result();
                //$cnt=1;
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
                                                <li class="breadcrumb-item"><a href="javascript: void(0);">Lab</a></li>
                                            </ol>
                                        </div>
                                        <h4 class="page-title"> <?php echo $row->nurse_name;?>  Nurse </h4>
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
                                                        <label for="inputEmail4" class="col-form-label">Nurse  Name</label>
                                                        <input type="text" required="required" readonly name="" value="<?php echo $row->nurse_name;?>" class="form-control" id="inputEmail4" placeholder="Nurse First Name">
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-12">
                                                        <label for="inputEmail4" class="col-form-label">Nurse Number</label>
                                                        <input type="text" required="required" readonly name="medi_nurse_id" value="<?php echo $row->nurse_number;?>" class="form-control" id="inputEmail4" placeholder="">
                                                    </div>
                                                </div> 
                                                <hr>
                                                <div class="form-row">
                                                    <div class="form-group col-md-2" style="display:none">
                                                        <?php 
                                                            $length = 5;    
                                                            $vit_no =  substr(str_shuffle('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'),1,$length);
                                                        ?>
                                                        <label for="inputZip" class="col-form-label">Vital Number</label>
                                                        <input type="text" name="medi_number " value="<?php echo $medi_no;?>" class="form-control" id="inputZip">
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-3">
                                                        <label for="inputEmail4" class="col-form-label">Nurse Body Temperature °C</label>
                                                        <input type="text" required="required"  name="medi_temp"class="form-control" id="inputEmail4" placeholder="°C">
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label for="inputPassword4" class="col-form-label">Nurse Heart Pulse/Beat BPM</label>
                                                        <input required="required" type="text"  name="medi_heartp"  class="form-control"  id="inputPassword4" placeholder="HeartBeats Per Minute ">
                                                    </div>
                                                   
                                                </div>
                                                <button type="submit" name="add_n_vitals" class="ladda-button btn btn-success" data-style="expand-right">Add </button>
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