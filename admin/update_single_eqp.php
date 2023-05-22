
<?php
	session_start();
	include('../assets/inc/config.php');
        if(isset($_POST['update_equipments']))
        
        {
        
		    $eqp_code = $_GET['eqp_code'];
			$eqp_name = $_POST['eqp_name'];
            $eqp_vendor = $_POST['eqp_vendor'];
            $eqp_desc = $_POST['eqp_desc'];
            $eqp_dept = $_POST['eqp_dept'];
            $eqp_status = $_POST['eqp_status'];
            $eqp_qty = $_POST['eqp_qty'];
			$query="UPDATE  equipment SET  eqp_name = ?, eqp_vendor = ?, eqp_desc = ?, eqp_dept = ?, eqp_status = ?, eqp_qty = ? WHERE eqp_code = ?";
			$stmt = $mysqli->prepare($query);
			$rc=$stmt->bind_param('sssssss',  $eqp_name, $eqp_vendor, $eqp_desc, $eqp_dept, $eqp_status, $eqp_qty, $eqp_code);
			$stmt->execute();
			if($stmt)
			{
				$success = " Updated";
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
            <?php
                $eqp_code=$_GET['eqp_code'];
                $ret="SELECT  * FROM equipment WHERE eqp_code=?";
                $stmt= $mysqli->prepare($ret) ;
                $stmt->bind_param('i',$eqp_code);
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
                                                <li class="breadcrumb-item"><a href="dashboard.php"> Equipment</a></li>
                                           
                                            </ol>
                                        </div>
                                      
                                    </div>
                                </div>
                            </div>   
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <!--Add Patient Form-->
                                            <form method="post">
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label for="inputEmail4" class="col-form-label"> Name</label>
                                                        <input type="text" required="required" value="<?php echo $row->eqp_name;?>" name="eqp_name" class="form-control" id="inputEmail4" >
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="inputPassword4" class="col-form-label"> Vendor</label>
                                                        <input required="required" type="text" value="<?php echo $row->eqp_vendor;?>" name="eqp_vendor" class="form-control"  id="inputPassword4">
                                                    </div>
                                                    </div>
                                                    <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label for="inputPassword4" class="col-form-label"> Quantity </label>
                                                        <input required="required" type="text" value = "<?php echo $row->eqp_qty;?>" name="eqp_qty" class="form-control"  id="inputPassword4">
                                                    </div>
                                                    <div class="form-group col-md-6" style="display:none">
                                                        <label for="inputPassword4" class="col-form-label"> Department</label>
                                                        <input required="required" type="text" value="Laboratory" name="eqp_dept" class="form-control"  id="inputPassword4">
                                                    </div>
                                                    <div class="form-group col-md-6" >
                                                        <label for="inputPassword4" class="col-form-label"> Status</label>
                                                        <input required="required" type="text" value="<?php echo $row->eqp_status;?>" name="eqp_status" class="form-control"  id="inputPassword4">
                                                </div>                                                    
                                                </div>
                                                <div class="form-group col-md-6" style="display:none">
                                                        <label for="inputPassword4" class="col-form-label"> Status</label>
                                                        <input required="required" type="text" value="Functioning" name="eqp_status" class="form-control"  id="inputPassword4">
                                                    </div>

                                                <div class="form-group col-md-12" style="style:display-none">
                                                    <label for="inputAddress" class="col-form-label">  Description</label>
                                                    <textarea required="required" type="text" class="form-control" name="eqp_desc" id="editor"><?php echo $row->eqp_desc;?></textarea>
                                                </div>

                                            <button type="submit" name="update_equipments" class="ladda-button btn btn-success" data-style="expand-right">Update </button>

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
        <script src="//cdn.ckeditor.com/4.6.2/basic/ckeditor.js"></script>
        <script type="text/javascript">
        CKEDITOR.replace('editor')
        </script>
        <div class="rightbar-overlay"></div>
        <script src="assets/js/vendor.min.js"></script>
        <script src="assets/js/app.min.js"></script>
        <script src="assets/libs/ladda/spin.js"></script>
        <script src="assets/libs/ladda/ladda.js"></script>
        <script src="assets/js/pages/loading-btn.init.js"></script>
        
    </body>

</html>