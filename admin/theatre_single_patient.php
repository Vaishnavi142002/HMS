<!--Server side code to handle  Patient Registration-->
<?php
	session_start();
	include('../assets/inc/config.php');
		if(isset($_POST['add_patient']))
		{
            $s_pat_number = $_POST['s_pat_number'];
			$s_number=$_POST['s_number'];
			$s_pat_name=$_POST['s_pat_name'];
			$s_pat_status=$_POST['s_pat_status'];
            $s_pat_ailment = $_POST['s_pat_ailment'];
            $s_doc = $_POST['s_doc'];
			$query="INSERT INTO  surgery (s_pat_number, s_number, s_pat_name, s_pat_status, s_pat_ailment, s_doc) VALUES(?,?,?,?,?,?)";
			$stmt = $mysqli->prepare($query);
			$rc=$stmt->bind_param('ssssss', $s_pat_number, $s_number, $s_pat_name, $s_pat_status, $s_pat_ailment, $s_doc);
			$stmt->execute();
			
			if($stmt)
			{
				$success = "Added ";
			}
			else {
				$err = "Try Later";
			}
			
			
		}
?>
<!--End Server Side-->
<!--End Patient Registration-->
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
                                            <li class="breadcrumb-item"><a href="dashboard.php">OT</a></li>
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
                                                    <label for="inputEmail4" class="col-form-label"> Name</label>
                                                    <input type="text" readonly required="required" value="<?php echo $row->patient_name;?>" name="s_pat_name" class="form-control" id="inputEmail4" placeholder="Name">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputPassword4" class="col-form-label">Number</label>
                                                    <input readonly required="required" type="text" value="<?php echo $row->patient_number;?>" name="s_pat_ailment" class="form-control"  id="inputPassword4" placeholder="Number">
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputEmail4" class="col-form-label"> Illness</label>
                                                    <input readonly type="text" required="required" value="<?php echo $row->patient_ailment;?>" name="s_pat_number" class="form-control" id="inputEmail4" placeholder="">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputState" class="col-form-label">Surgeon</label>
                                                    <select id="inputState" required="required" name="s_doc" class="form-control">
                                                    <?php
                                                    
                                                        $ret="SELECT * FROM  doc WHERE doc_dept = 'Surgery | Theatre' ORDER BY RAND() "; 
                                                        //sql code to get to ten docs  randomly
                                                        $stmt= $mysqli->prepare($ret) ;
                                                        $stmt->execute() ;//ok
                                                        $res=$stmt->get_result();
                                                        $cnt=1;
                                                        while($row=$res->fetch_object())
                                                        {
                                                    ?>
                                                        <option><?php echo $row->doc_fname;?> <?php echo $row->doc_lname;?></option>

                                                    <?php }?>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-6" style="display:none">
                                                    <label for="inputPassword4" class="col-form-label">Surgery Status</label>
                                                    <input required="required" type="text" value="Undergoing" name="s_pat_status" class="form-control"  id="inputPassword4" placeholder="Age">
                                                </div>
                                            </div>

                                    
                                            <div class="form-row">
                                               
                                                <div class="form-group col-md-2" style="display:none">
                                                    <?php 
                                                        $length = 5;    
                                                        $s_number =  substr(str_shuffle('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'),1,$length);
                                                    ?>
                                                    <label for="inputZip" class="col-form-label">Record No</label>
                                                    <input type="text" name="s_number" value="<?php echo $s_number;?>" class="form-control" id="inputZip">
                                                </div>
                                            </div>

                                            <button type="submit" name="add_patient" class="ladda-button btn btn-success" data-style="expand-right">Add</button>

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