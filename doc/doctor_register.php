<?php
	session_start();
	include('a../ssets/inc/config.php');
		if(isset($_POST['add_doc']))
		{
			$doc_fname=$_POST['doc_fname'];
			$doc_lname=$_POST['doc_lname'];
			$doc_number=$_POST['doc_number'];
            $doc_dept=$_POST['doc_dept'];
            $doc_pwd = sha1(md5($_POST['doc_pwd']));
            $doc_email = $_POST['doc_email'];
            $Consulting_fees = $_POST['Consulting_fees'];
			$query="insert into doc (doc_fname, doc_email, doc_lname, doc_pwd, doc_number, doc_dept,Consulting_fees) values(?,?,?,?,?,?,?)";
			$stmt = $mysqli->prepare($query);
			$rc=$stmt->bind_param('sssssss', $doc_fname, $doc_email, $doc_lname, $doc_pwd, $doc_number,$doc_dept,$Consulting_fees);
			$stmt->execute();
			if($stmt)
			{
				$success = "$doc_number Added";
               
			}
			else {
				$err = "Try Later";
			}			
		}
?>
<!DOCTYPE html>
<html lang="en">
    <?php include('assets/inc/head.php');?>
    <body class="authentication-bg authentication-bg-pattern">
        <div id="wrapper">
            <div class="content-page">
                <div class="content">
                    <div class="container"> 
                        <div class="row">
                            <div class="col-md-8 col-lg-8">
                                <div class="card">
                                    <div class="card-body">
                                        <form method="post" action="">
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputEmail4" class="col-form-label">First Name</label>
                                                    <input type="text" required="required" name="doc_fname" class="form-control" id="inputEmail4" placeholder="First Name">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputPassword4" class="col-form-label">Last Name</label>
                                                    <input required="required" type="text" name="doc_lname" class="form-control"  id="inputPassword4" placeholder="Last Name">
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="email" class="col-form-label">Email</label>
                                                    <input required="required" type="text" name="doc_email" class="form-control"  id="inputPassword4" placeholder="Email">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputPassword4" class="col-form-label">password</label>
                                                    <input required="required" type="text" name="doc_pwd" class="form-control"  id="inputPassword4" placeholder="Password">
                                                </div>
                                            </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                    <label for="text" class="col-form-label">Consulting_fees</label>
                                                    <input required="required" type="text" class="form-control" name="Consulting_fees" id="inputAddress" placeholder="Fees">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="text" class="col-form-label">Department</label>
                                                    <input required="required" type="text" class="form-control" name="doc_dept" id="inputAddress" placeholder="Department">
                                                </div>
                                            </div>
                                                                            
                                      

                                            
                                            <div class="form-group col-md-2" style="display:none">
                                                    <?php 
                                                        $length = 5;    
                                                        $doc_number =  substr(str_shuffle('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'),1,$length);
                                                    ?>
                                                    <label for="inputZip" class="col-form-label">Docter Number</label>
                                                    <input type="text" name="doc_number" value="<?php echo $doc_number;?>" class="form-control" id="inputZip">
                                                </div>
                                            </div>
                                            <center> <button type="submit" name="add_doc" class="ladda-button btn btn-primary" data-style="expand-right">Register</button><br>
                                           <p class="text-Black-50" style="text-align:center"><br> <a href="index.php" class="text-Black ml-1"><b>Log In</b></a> OR <a href="../index.php" class="text-black ml-1"><b>Home</b></a></p></center>
                        
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