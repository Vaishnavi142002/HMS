<?php
	session_start();
	include('../assets/inc/config.php');
		if(isset($_POST['update_doc']))
		{
			$doc_fname=$_POST['doc_fname'];
			$doc_lname=$_POST['doc_lname'];
            $doc_edu=$_POST['doc_edu'];
			$doc_number=$_GET['doc_number'];
            $doc_email=$_POST['doc_email'];
            $doc_cont=$_POST['doc_cont'];
            $doc_city=$_POST['doc_city'];
            $doc_pwd=sha1(md5($_POST['doc_pwd']));
            $doc_dpic=$_FILES["doc_dpic"]["name"];
		    move_uploaded_file($_FILES["doc_dpic"]["tmp_name"],"../doc/assets/images/users/".$_FILES["doc_dpic"]["name"]);
			$query="UPDATE doc SET doc_fname=?, doc_lname=?, doc_cont=?, doc_city=?, doc_edu=?, doc_email=?, doc_pwd=?, doc_dpic=? WHERE doc_number = ?";
			$stmt = $mysqli->prepare($query);
			$rc=$stmt->bind_param('ssissssss', $doc_fname, $doc_lname, $doc_cont, $doc_city, $doc_edu, $doc_email, $doc_pwd, $doc_dpic, $doc_number);
			$stmt->execute();
			if($stmt)
			{
				$success = "Details Updated";
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
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Doctors</a></li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>  
                        <?php
                            $doc_id=$_GET['doc_id'];
                            $ret="SELECT  * FROM doc WHERE doc_id=?";
                            $stmt= $mysqli->prepare($ret) ;
                            $stmt->bind_param('i',$doc_id);
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
                                        <form method="post" enctype="multipart/form-data">
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputEmail4" class="col-form-label">First Name</label>
                                                    <input type="text" required="required" value="<?php echo $row->doc_fname;?>" name="doc_fname" class="form-control" id="inputEmail4" >
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputPassword4" class="col-form-label">Last Name</label>
                                                    <input required="required" type="text" value="<?php echo $row->doc_lname;?>" name="doc_lname" class="form-control"  id="inputPassword4">
                                                </div>
                                            </div>
                                            <div class="form-row">

                                                <div class="form-group col-md-6">
                                                    <label for="number" class="col-form-label">Contact NUmber</label>
                                                    <input required="required" type="number" value="<?php echo $row->doc_cont;?>"class="form-control" name="doc_cont" id="">
                                                </div>
                                                <div class="form-group col-md-6">
                                                <label for="text" class="col-form-label">City</label>
                                                <input required="required" type="text" value="<?php echo $row->doc_city;?>"class="form-control" name="doc_city" id="inputAddress">
                                                </div>
                                            </div>
                                            <div class="form-row">
                                           
                                            <div class="form-group col-md-6 display:none">
                                                    <label for="inputCity" class="col-form-label">Password</label>
                                                    <input type="text" name="doc_pwd" class="form-control"  id="inputCity">
                                                </div>
                                            <div class="form-group col-md-6">
                                                <label for="inputAddress" class="col-form-label">Email</label>
                                                <input required="required" type="email" value="<?php echo $row->doc_email;?>" class="form-control" name="doc_email" id="inputAddress">
                                            </div></div>
                                            
                                            <div class="form-row">
                                               
                                                <div class="form-group col-md-6">
                                                    <label for="inputCity" class="col-form-label">Edu</label>
                                                    <input required="required"  type="text" value="<?php echo $row->doc_edu;?>" name="doc_edu" class="form-control"  id="inputCity">
                                                </div>
                                                
                                                <div class="form-group col-md-6">
                                                    <label for="inputCity" class="col-form-label">Profile Picture</label>
                                                    <input required="required"  type="file" name="doc_dpic" class="btn btn-success form-control"  id="inputCity">
                                                </div>
                                            </div>                                            

                                            <button type="submit" name="update_doc" class="ladda-button btn btn-success" data-style="expand-right">Update</button>

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