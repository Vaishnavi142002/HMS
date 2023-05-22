<?php
	session_start();
	include('../assets/inc/config.php');
		if(isset($_POST['add_patient_lab_result']))
		{
			$lab_pat_name = $_POST['lab_pat_name'];
			$lab_pat_ailment = $_POST['lab_pat_ailment'];
            $lab_pat_number  = $_POST['lab_pat_number'];
            $lab_pat_tests = $_POST['lab_pat_tests'];
            $lab_number  = $_GET['lab_number'];
            $lab_pat_results = $_POST['lab_pat_results'];
			$query="UPDATE   lab  SET lab_pat_name=?, lab_pat_ailment=?, lab_pat_number=?, lab_pat_tests=?, lab_pat_results=? WHERE  lab_number = ? ";
			$stmt = $mysqli->prepare($query);
			$rc=$stmt->bind_param('ssssss', $lab_pat_name, $lab_pat_ailment, $lab_pat_number, $lab_pat_tests, $lab_pat_results, $lab_number);
			$stmt->execute();
			if($stmt)
			{
				$success = "Tesult Addded";
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
            <?php
                $lab_number = $_GET['lab_number'];
                $ret="SELECT  * FROM lab WHERE lab_number=?";
                $stmt= $mysqli->prepare($ret) ;
                $stmt->bind_param('s',$lab_number);
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
                                                <li class="breadcrumb-item"><a href="javascript: void(0);">Lab </a></li>
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
                                                        <input type="text" required="required" readonly name="lab_pat_name" value="<?php echo $row->lab_pat_name;?>" class="form-control" id="inputEmail4" placeholder=" First Name">
                                                    </div>

                                                    <div class="form-group col-md-6">
                                                        <label for="inputPassword4" class="col-form-label"> Ailment</label>
                                                        <input required="required" type="text" readonly name="lab_pat_ailment" value="<?php echo $row->lab_pat_ailment;?>" class="form-control"  id="inputPassword4" placeholder="Last Name">
                                                    </div>

                                                </div>

                                                <div class="form-row">

                                                    <div class="form-group col-md-12">
                                                        <label for="inputEmail4" class="col-form-label"> Number</label>
                                                        <input type="text" required="required" readonly name="lab_pat_number" value="<?php echo $row->lab_pat_number;?>" class="form-control" id="inputEmail4" placeholder="DD/MM/YYYY">
                                                    </div>


                                                </div>

                                                
                                                <hr>
                                                

                                                <div class="form-group">
                                                        <label for="inputAddress" class="col-form-label">Lab Tests</label>
                                                        <textarea required="required"  type="text" class="form-control" name="lab_pat_tests" id="editor"><?php echo $row->lab_pat_tests;?></textarea>
                                                </div>
                                                <div class="form-group">
                                                        <label for="inputAddress" class="col-form-label">Lab Result</label>
                                                        <textarea required="required"   type="text" class="form-control" name="lab_pat_results" id="editor1"></textarea>
                                                </div>
                                                <button type="submit" name="add_patient_lab_result" class="ladda-button btn btn-success" data-style="expand-right">Add</button>
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
        <script type="text/javascript">
         CKEDITOR.replace('editor1')
        </script>
        <script src="assets/js/vendor.min.js"></script>
        <script src="assets/js/app.min.js"></script>
        <script src="assets/libs/ladda/spin.js"></script>
        <script src="assets/libs/ladda/ladda.js"></script>
        <script src="assets/js/pages/loading-btn.init.js"></script>
    </body>
</html>