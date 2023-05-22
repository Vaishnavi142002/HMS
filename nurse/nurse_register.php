<?php
	session_start();
	include('../assets/inc/config.php');
		if(isset($_POST['add_nurse']))
		{
			$nurse_name=$_POST['nurse_name'];
			$nurse_number=$_POST['nurse_number'];
            $n_room_no=$_POST['n_room_no'];
            $nurse_pwd = sha1(md5($_POST['nurse_pwd']));
            $nurse_email = $_POST['nurse_email'];
           
			$query="insert into nurse (nurse_name, nurse_email, nurse_pwd, nurse_number, n_room_no) values(?,?,?,?,?)";
			$stmt = $mysqli->prepare($query);
			$rc=$stmt->bind_param('sssss', $nurse_name, $nurse_email, $nurse_pwd, $nurse_number,$n_room_no);
			$stmt->execute();
			if($stmt)
			{
				$success = "$nurse_number Details Added";
			}
			else {
				$err = "Please Try Again Or Try Later";
			}			
		}
?>
<!DOCTYPE html>
<html lang="en">
    <?php include('assets/inc/head.php');?>
    <body  class="authentication-bg authentication-bg-pattern">
        <div id="wrapper">
            <div class="content-page">
                <div class="content">
                    <div class="container"> 
                        <div class="row">
                            <div class="col-md-8 col-lg-8" style="margin-top:50px; padding-left:70px;">
                                <div class="card">
                                    <div class="card-body">
                                        <form method="post" action="">
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="text" class="col-form-label"> Name</label>
                                                    <input type="text" required="required" name="nurse_name" class="form-control" id="inputEmail4" placeholder="Name">
                                                </div>
                                                <div class="form-group col-md-6">
                                                <label for="text" class="col-form-label">Room No</label>
                                                <input required="required" type="text" class="form-control" name="n_room_no" id="inputAddress" placeholder="Room">
                                            </div>
                                                
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="email" class="col-form-label">Email</label>
                                                    <input required="required" type="text" name="nurse_email" class="form-control"  id="inputPassword4" placeholder="Email">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputPassword4" class="col-form-label">password</label>
                                                    <input required="required" type="text" name="nurse_pwd" class="form-control"  id="inputPassword4" placeholder="Password">
                                                </div>
                                            </div>
                                            <div class="form-row">
                                            <div class="form-group col-md-2" style="display:none">
                                                    <?php 
                                                        $length = 5;    
                                                        $nurse_number =  substr(str_shuffle('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'),1,$length);
                                                    ?>
                                                    <label for="inputZip" class="col-form-label">Nurse Number</label>
                                                    <input type="text" name="nurse_number" value="<?php echo $nurse_number;?>" class="form-control" id="inputZip">
                                                </div>
                                            </div>
                                            <center> <button type="submit" name="add_nurse" class="ladda-button btn btn-primary" data-style="expand-right">Register</button><br>
                                           <p class="text-Black-50"><br> <a href="index.php" class="text-Black ml-1"><b>Log In</b></a> OR <a href="../index.html" class="text-black ml-1"><b>Home</b></a></p></center>
                        
                                        </form>
                                    </div> 
                                </div>
                            </div> 
                        </div>
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