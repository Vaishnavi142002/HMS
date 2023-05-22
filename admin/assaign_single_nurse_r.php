<!--Server side code to handle  Patient Registration-->
<?php
	session_start();
	include('../assets/inc/config.php');
		if(isset($_POST['ass_room']))
		{
            $n_room_no=$_POST['n_room_no'];
            $nurse_id = $_GET['nurse_id'];
        
			$query="UPDATE nurse SET n_room_no=? WHERE nurse_id = ?";
			$stmt = $mysqli->prepare($query);
			$rc=$stmt->bind_param('ss', $n_room_no, $nurse_id);
			$stmt->execute();
			
			if($stmt)
			{
				$success = "Assigned room";
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

            <div class="content-page">
                <div class="content">
                    <div class="container-fluid">
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
                        <?php
                            $nurse_id=$_GET['nurse_id'];
                            $ret="SELECT  * FROM nurse WHERE nurse_id=?";
                            $stmt= $mysqli->prepare($ret) ;
                            $stmt->bind_param('i',$nurse_id);
                            $stmt->execute() ;
                            $res=$stmt->get_result();
                            while($row=$res->fetch_object())
                            {
                        ?>
                        <div class="row">
                            <div class="col-2"> </div>
                            <div class="col-8">
                                <div class="card">
                                    <div class="card-body">
                                        <form method="post" enctype="multipart/form-data">
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputEmail4" class="col-form-label"> Name</label>
                                                    <input type="text" required="required" readonly value="<?php echo $row->nurse_name;?>" name="nurse_name" class="form-control" id="inputEmail4" >
                                                </div>
                                                
                                           

                                            <div class="form-group col-md-6" >
                                                <label for="inputAddress" class="col-form-label">Email</label>
                                                <input required="required" type="email" readonly value="<?php echo $row->nurse_email;?>" class="form-control" name="nurse_email" id="inputAddress">
                                            </div>
                                            </div>
                                            
                                            <div class="form-group col-md-6">
                                                    <label for="inputState" class="col-form-label">Room</label>
                                                    <input required="required" type="number"  value=" " class="form-control" name="n_room_no" id="inputAddress">
                                            
                                            </div>                                         

                                            <button type="submit" name="ass_room" class="ladda-button btn btn-success" data-style="expand-right">Assign</button>
                                            
                                        </form>
                                    </div> 
                                </div> 
                            </div> 
                        </div>
                        <?php }?>

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