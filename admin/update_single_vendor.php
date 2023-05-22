<?php
	session_start();
	include('../assets/inc/config.php');
		if(isset($_POST['update_vendor']))
		{
			$v_name=$_POST['v_name'];
			$v_adr=$_POST['v_adr'];
			$v_number=$_GET['v_number'];
            $v_email=$_POST['v_email'];
            $v_phone = $_POST['v_phone'];
            $v_desc = $_POST['v_desc'];
			$query="UPDATE  vendor SET v_name=?, v_adr=?,  v_email = ?, v_phone=?, v_desc=? WHERE v_number=?";
			$stmt = $mysqli->prepare($query);
			$rc=$stmt->bind_param('ssssss', $v_name, $v_adr,  $v_email, $v_phone, $v_desc, $v_number);
			$stmt->execute();
			if($stmt)
			{
				$success = " Updated";
			}
			else {
				$err = "Try Later";
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
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Vendor</a></li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>     
                        <?php
                            $v_number=$_GET['v_number'];
                            $ret="SELECT  * FROM vendor WHERE v_number = ?";
                            $stmt= $mysqli->prepare($ret) ;
                            $stmt->bind_param('i',$v_number);
                            $stmt->execute() ;
                            $res=$stmt->get_result();
                            while($row=$res->fetch_object())
                            {
                        ?>
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <form method="post">
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputEmail4" class="col-form-label"> Name</label>
                                                    <input type="text" required="required" value="<?php echo $row->v_name;?>" name="v_name" class="form-control" id="inputEmail4" >
                                                </div>
                                                <div class="form-group col-md-6">
                                                <label for="inputAddress" class="col-form-label"> Email</label>
                                                <input required="required" value="<?php echo $row->v_email;?>" type="email" class="form-control" name="v_email" id="inputAddress">
                                            </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputPassword4" class="col-form-label"> Phone Number</label>
                                                    <input required="required" type="text" value="<?php echo $row->v_phone;?>" name="v_phone" class="form-control"  id="inputPassword4">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputPassword4" class="col-form-label"> Address</label>
                                                    <input required="required" value="<?php echo $row->v_adr;?>" type="text" name="v_adr" class="form-control"  id="inputPassword4">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputAddress" class="col-form-label"> Details</label>
                                                <textarea  type="text" class="form-control" name="v_desc" id="editor"><?php echo $row->v_desc;?></textarea>
                                            </div>
                                            <button type="submit" name="update_vendor" class="ladda-button btn btn-success" data-style="expand-right">Update</button>
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
        <script src="//cdn.ckeditor.com/4.6.2/basic/ckeditor.js"></script>
        <script type="text/javascript">
        CKEDITOR.replace('editor')
        </script>
        <script src="assets/js/vendor.min.js"></script>
        <script src="assets/js/app.min.js"></script>
        <script src="assets/libs/ladda/spin.js"></script>
        <script src="assets/libs/ladda/ladda.js"></script>
        <script src="assets/js/pages/loading-btn.init.js"></script>
    </body>
</html>