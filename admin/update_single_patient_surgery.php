<!--Server side code to handle  Patient Registration-->
<?php
	session_start();
	include('../assets/inc/config.php');
		if(isset($_POST['update_patient']))
		{
            $s_pat_number = $_POST['s_pat_number'];
			$s_number=$_GET['s_number'];
			$s_pat_name=$_POST['s_pat_name'];
			$s_pat_status=$_POST['s_pat_status'];
            $s_pat_ailment = $_POST['s_pat_ailment'];
            $s_doc = $_POST['s_doc'];
            //sql to insert captured values
			$query="UPDATE  surgery SET  s_pat_number=?,  s_pat_name=?, s_pat_status=?, s_pat_ailment=?, s_doc=?   WHERE  s_number=?";
			$stmt = $mysqli->prepare($query);
			$rc=$stmt->bind_param('ssssss', $s_pat_number, $s_pat_name, $s_pat_status, $s_pat_ailment, $s_doc, $s_number);
			$stmt->execute();
		
			if($stmt)
			{
				$success = "  Details Updated ";
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
                                           
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">OT </a></li>
                                   
                                        </ol>
                                    </div>
                               
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 
                        <!-- Form row -->
                        <!--LETS GET DETAILS OF SINGLE PATIENT GIVEN THEIR ID-->
                        <?php
                            $s_number=$_GET['s_number'];
                            $ret="SELECT  * FROM surgery WHERE s_number=?";
                            $stmt= $mysqli->prepare($ret) ;
                            $stmt->bind_param('i',$s_number);
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
                                                    <input type="text" readonly required="required" value="<?php echo $row->s_pat_name;?>" name="s_pat_name" class="form-control" id="inputEmail4" placeholder="Patient's First Name">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputPassword4" class="col-form-label"> disease</label>
                                                    <input readonly required="required" type="text" value="<?php echo $row->s_pat_ailment;?>" name="s_pat_ailment" class="form-control"  id="inputPassword4" placeholder="Patient`s Last Name">
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputEmail4" class="col-form-label"> Number</label>
                                                    <input readonly type="text" required="required" value="<?php echo $row->s_pat_number;?>" name="s_pat_number" class="form-control" id="inputEmail4" placeholder="DD/MM/YYYY">
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
                                                <div class="form-group col-md-6">
                                                    <label for="inputState" class="col-form-label"> Status</label>
                                                    <select id="inputState" required="required" name="s_pat_status" class="form-control">
                                                    
                                                        <option>Ongoing</option>
                                                        <option>Successful</option>

                                                   
                                                    </select>
                                                </div>
                                                

                                            </div>
                                            <button type="submit" name="update_patient" class="ladda-button btn btn-primary" data-style="expand-right">Update </button>
                                    
                                            

                                           
                                        </form>
                                        <!--End Patient Form-->
                                    </div> <!-- end card-body -->
                                </div> <!-- end card-->
                            </div> <!-- end col -->
                        </div>
                        <?php }?>
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