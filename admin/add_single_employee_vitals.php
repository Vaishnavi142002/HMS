<!--Server side code to handle  Patient Registration-->
<?php
	session_start();
	include('../assets/inc/config.php');
		if(isset($_POST['add_emp_vitals']))
		{
			$temp_number = $_POST['temp_number'];
			$temp_pat_number = $_POST['temp_pat_number'];
            $bodytemp  = $_POST['bodytemp'];
            $humidity = $_POST['humidity'];
          
			$query="INSERT INTO  temp_p  (temp_number, temp_pat_number, bodytemp, humidity) VALUES(?,?,?,?)";
			$stmt = $mysqli->prepare($query);
			$rc=$stmt->bind_param('ssss', $temp_number, $temp_pat_number, $bodytemp, $humidity);
			$stmt->execute();
			if($stmt)
			{
				$success = " Addded";
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
                $doc_number = $_GET['doc_number'];
                $ret = "SELECT  * FROM doc WHERE doc_number=?";
                $stmt= $mysqli->prepare($ret) ;
                $stmt->bind_param('s',$doc_number);
                $stmt->execute() ;//ok
                $res=$stmt->get_result();
                //$cnt=1;
                while($row=$res->fetch_object())
                {
            ?>
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
                                                <li class="breadcrumb-item"><a href="dashboard.php">Lat Test</a></li>
                                                
                                            </ol>
                                        </div>
                                        <h4 class="page-title"> <b><?php echo $row->doc_fname;?> <?php echo $row->doc_lname;?> <b></h4>
                                    </div>
                                </div>
                            </div>     
                            <!-- end page title --> 
                            <!-- Form row -->
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <!--Add Patient Form-->
                                            <form method="post">
                                                <div class="form-row">

                                                    <div class="form-group col-md-6">
                                                        <label for="inputEmail4" class="col-form-label"> Name</label>
                                                        <input type="text" required="required" readonly name="" value="<?php echo $row->doc_fname;?> <?php echo $row->doc_lname;?>" class="form-control" id="inputEmail4" placeholder="Patient's First Name">
                                                    </div>

                                                    <div class="form-group col-md-6">
                                                        <label for="inputEmail4" class="col-form-label"> Number</label>
                                                        <input type="text" required="required" readonly name="temp_pat_number" value="<?php echo $row->doc_number;?>" class="form-control" id="inputEmail4" placeholder="DD/MM/YYYY">
                                                    </div>

                                                </div>

                                                <div class="form-row">

                                                    
                                                    <div class="form-group col-md-6">
                                                        <label for="inputPassword4" class="col-form-label"> Department</label>
                                                        <input required="required" type="text" readonly name="" value="<?php echo $row->doc_dept;?>" class="form-control"  id="inputPassword4" placeholder="Patient`s Last Name">
                                                    </div>


                                                </div>

                                                
                                                <hr>
                                                <div class="form-row">
                                                    
                                            
                                                    <div class="form-group col-md-2" style="display:none">
                                                        <?php 
                                                            $length = 5;    
                                                            $vit_no =  substr(str_shuffle('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'),1,$length);
                                                        ?>
                                                        <label for="inputZip" class="col-form-label">Test Number</label>
                                                        <input type="text" name="temp_number" value="<?php echo $vit_no;?>" class="form-control" id="inputZip">
                                                    </div>
                                                </div>

                                                <div class="form-row">

                                                    <div class="form-group col-md-6">
                                                        <label for="inputEmail4" class="col-form-label">  Temperature</label>
                                                        <input type="text" required="required"  name="bodytemp"class="form-control" id="inputEmail4" placeholder="°C">
                                                    </div>

                                                    <div class="form-group col-md-6">
                                                        <label for="inputPassword4" class="col-form-label">  Beat BPM</label>
                                                        <input required="required" type="text"  name="humidity"  class="form-control"  id="inputPassword4" placeholder="HeartBeats Per Minute ">
                </div>

                                                </div>

                                                <button type="submit" name="add_emp_vitals" class="ladda-button btn btn-success" data-style="expand-right">Add</button>

                                            </form>
                                            <!--End Patient Form-->
                                        </div> <!-- end card-body -->
                                    </div> <!-- end card-->
                                </div> <!-- end col -->
                            </div>
                            <!-- end row -->

                        </div> <!-- container -->

                    </div> <!-- content -->


                </div>
            <?php }?>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->

       
        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>
        <script src="//cdn.ckeditor.com/4.6.2/basic/ckeditor.js"></script>
        <script type="text/javascript">
        CKEDITOR.replace('editor')
        </script>

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