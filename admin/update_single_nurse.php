<?php
	session_start();
	include('../assets/inc/config.php');
		if(isset($_POST['update_nurse']))
		{
			$nurse_name=$_POST['nurse_name'];
            $nurse_id=$_GET['nurse_id'];
			$nurse_number=$_GET['nurse_number'];
            $nurse_email=$_POST['nurse_email'];
            $n_room_no=$_POST['n_room_no'];
            $nurse_pwd=sha1(md5($_POST['nurse_pwd']));
            $nurse_img=$_FILES["nurse_img"]["name"];
		    move_uploaded_file($_FILES["nurse_img"]["tmp_name"],"../nurse/assets/images/users/".$_FILES["nurse_img"]["name"]);

    
			$query="UPDATE nurse SET nurse_name=?, n_room_no=?,nurse_email=?, nurse_pwd=?, nurse_img=? WHERE nurse_id = ?";
			$stmt = $mysqli->prepare($query);
			$rc=$stmt->bind_param('sissss', $nurse_name, $n_room_no, $nurse_email, $nurse_pwd, $nurse_img, $nurse_id);
			$stmt->execute();
			
			if($stmt)
			{
				$success = "Nurse Details Updated";
			}
			else {
				$err = "Please Try Again Or Try Later";
			}
			
			
		}
?>
<!--End Server Side-->
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
                                            <li class="breadcrumb-item"><a href="dashboard.php">Nurse</a></li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 
                        <!-- Form row -->
                        <?php
                            $nurse_id=$_GET['nurse_id'];
                            $ret="SELECT  * FROM nurse WHERE nurse_id=?";
                            $stmt= $mysqli->prepare($ret) ;
                            $stmt->bind_param('i',$nurse_id);
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
                                        <form method="post" enctype="multipart/form-data">
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputEmail4" class="col-form-label">Name</label>
                                                    <input type="text" required="required" value="<?php echo $row->nurse_name;?>" name="nurse_name" class="form-control" id="inputEmail4" >
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputPassword4" class="col-form-label">Room no</label>
                                                    <input required="required" type="text" value="<?php echo $row->n_room_no;?>" name="n_room_no" class="form-control"  id="inputPassword4">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="inputAddress" class="col-form-label">Email</label>
                                                <input required="required" type="email" value="<?php echo $row->nurse_email;?>" class="form-control" name="nurse_email" id="inputAddress">
                                            </div>
                                            
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputCity" class="col-form-label">Password</label>
                                                    <input required="required"  type="password" name="nurse_pwd" class="form-control" id="inputCity">
                                                </div> 
                                                
                                                <div class="form-group col-md-6">
                                                    <label for="inputCity" class="col-form-label">Profile Picture</label>
                                                    <input required="required"  type="file" name="nurse_img" class="btn btn-success form-control"  id="inputCity">
                                                </div>
                                            </div>                                            

                                            <button type="submit" name="update_nurse" class="ladda-button btn btn-success" data-style="expand-right">Add </button>

                                        </form>
                                        <!--End Patient Form-->
                                    </div> <!-- end card-body -->
                                </div> <!-- end card-->
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->
                        <?php }?>

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