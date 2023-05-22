<?php
	session_start();
	include('../assets/inc/config.php');
		if(isset($_POST['add_doc']))
		{
			$doc_fname=$_POST['doc_fname'];
			$doc_lname=$_POST['doc_lname'];
            $doc_edu=$_POST['doc_edu'];
			$doc_number=$_POST['doc_number'];
            $doc_cont=$_POST['doc_cont'];
            $doc_city=$_POST['doc_city'];
            $doc_email=$_POST['doc_email'];
            $Consulting_fees=$_POST['Consulting_fees'];
            $doc_dept=$_POST['doc_dept'];
            
            $doc_pwd=sha1(md5($_POST['doc_pwd']));
			$query="INSERT INTO doc (doc_fname, doc_lname, doc_edu, doc_number, doc_cont, doc_city, doc_email, doc_pwd,Consulting_fees,doc_dept )values(?,?,?,?,?,?,?,?,?,?)";
			$stmt = $mysqli->prepare($query);
			$rc=$stmt->bind_param('ssssisssss', $doc_fname, $doc_lname, $doc_edu, $doc_number, $doc_cont, $doc_city, $doc_email, $doc_pwd,$Consulting_fees,$doc_dept);
			$stmt->execute();

			if($stmt)
			{
				$success = " Added";
			}
			else {
				$err = "Please Try Again Or Try Later";
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
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

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
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Employee</a></li>
                                        </ol>
                                    </div>
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
                                                    <label for="text" class="col-form-label">First Name</label>
                                                    <input type="text" required="required" name="doc_fname" class="form-control" id="inputEmail4" >
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="text" class="col-form-label">Last Name</label>
                                                    <input required="required" type="text" name="doc_lname" class="form-control"  id="inputPassword4">
                                                </div>
                                            </div>
                                            <div class="form-row">

                                                <div class="form-group col-md-6">
                                                    <label for="number" class="col-form-label">Consulting Fees</label>
                                                    <input required="required" type="number" class="form-control" name="Consulting_fees" id="inputAddress">
                                                </div>
                                                <div class="form-group col-md-6">
                                                <label for="text" class="col-form-label">Department</label>
                                                <input required="required" type="text" class="form-control" name="doc_dept" id="inputAddress">
    </div>
                                            </div>
                                            <div class="form-row">

                                                <div class="form-group col-md-6">
                                                    <label for="number" class="col-form-label">Contact NUmber</label>
                                                    <input required="required" type="number" class="form-control" name="doc_cont" id="inputAddress">
                                                </div>
                                                <div class="form-group col-md-6">
                                                <label for="text" class="col-form-label">City</label>
                                                <input required="required" type="text" class="form-control" name="doc_city" id="inputAddress">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-2" style="display:none">
                                                    <?php 
                                                        $length = 5;    
                                                        $doc_number =  substr(str_shuffle('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'),1,$length);
                                                    ?>
                                                    <label for="inputZip" class="col-form-label">Doctor Number</label>
                                                    <input type="text" name="doc_number" value="<?php echo $doc_number;?>" class="form-control" id="inputZip">
                                                </div>
                                                
                                                <div class="row">
                                                <div class="form-group col-md-4">
                                                    <label for="number" class="col-form-label">Doc Edu</label>
                                                    <input required="required" type="text" class="form-control" name="doc_edu" id="inputAddress">
                                                </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="inputAddress" class="col-form-label">Email</label>
                                                    <input required="required" type="email" class="form-control" name="doc_email" id="inputAddress">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                    <label for="inputCity" class="col-form-label">Password</label>
                                                    <input required="required" type="password" name="doc_pwd" class="form-control" id="inputCity">
                                                    </div>
                                           
                                            <button type="submit" name="add_doc" class="ladda-button btn btn-success" data-style="expand-right">Add Employee</button>

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

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->

       
        <!-- Right bar overlay-->
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