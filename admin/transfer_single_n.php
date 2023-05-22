<!--Server side code to handle  Patient Registration-->
<?php
	session_start();
	include('../assets/inc/config.php');
		if(isset($_POST['room_switch']))
		{
            $n_room_no=$_POST['n_room_no'];
            $nurse_id = $_GET['nurse_id'];
			$query="UPDATE nurse SET n_room_no=? WHERE nurse_id = ?";
			$stmt = $mysqli->prepare($query);
			$rc=$stmt->bind_param('ss', $n_room_no, $nurse_id);
			$stmt->execute();
		
			if($stmt)
			{
				$success = "room changes";
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
                            <div class="col-1"></div>
                            <div class="col-11">
                                <div class="card">
                                    <div class="card-body">
                                        
                                        <form method="post" enctype="multipart/form-data">
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputEmail4" class="col-form-label"> Name</label>
                                                    <input type="text" required="required" readonly value="<?php echo $row->nurse_name;?>" name="doc_fname" class="form-control" id="inputEmail4" >
                                                </div>
                                                
                                            
                                            <div class="form-group col-md-6">
                                                <label for="inputAddress" class="col-form-label"> Number</label>
                                                <input required="required" type="email" readonly value="<?php echo $row->nurse_number;?>" class="form-control" name="nurse_email" id="inputAddress">
                                            </div>
                            </div>
                            <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="inputAddress" class="col-form-label">Email</label>
                                                <input required="required" type="email" readonly value="<?php echo $row->nurse_email;?>" class="form-control" name="nurse_email" id="inputAddress">
                                            </div>

                                            

                                            <div class="form-group col-md-6">
                                                <label for="inputAddress" class="col-form-label">current room</label>
                                                <input required="required" type="email" readonly value="<?php echo $row->n_room_no;?>" class="form-control" name="nurse_email" id="inputAddress">
                                            </div>
                            </div>
                            <div class="form-row">
                                            <div class="form-group col-md-6">
                                                    <label for="inputState" class="col-form-label">Transfer to</label>
                                                    <input required="required" type="number"  value=" " class="form-control" name="n_room_no" id="inputAddress">
                                            
                                            </div>  
                            </div>                                       

                                            <button type="submit" name="room_switch" class="ladda-button btn btn-success" data-style="expand-right">Transfer </button>

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