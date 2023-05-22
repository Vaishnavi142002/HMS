
<?php
	session_start();
	include('../assets/inc/config.php');
		if(isset($_POST['update_pharmaceutical']))
		{
			$phar_name = $_POST['phar_name'];
			$phar_desc = $_POST['phar_desc'];
            $phar_qty = $_POST['phar_qty'];
            $phar_cat = $_POST['phar_cat'];
            $phar_bcode = $_GET['phar_bcode'];
            $phar_vendor = $_POST['phar_vendor'];
			$query="UPDATE  pharma SET phar_name = ?, phar_desc = ?, phar_qty = ?, phar_cat = ?, phar_vendor = ? WHERE phar_bcode = ?";
			$stmt = $mysqli->prepare($query);
			$rc=$stmt->bind_param('ssssss', $phar_name, $phar_desc, $phar_qty, $phar_cat, $phar_vendor, $phar_bcode);
			$stmt->execute();
			if($stmt)
			{
				$success = "Updated";
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
            <?php
                $phar_bcode = $_GET['phar_bcode'];
                $ret="SELECT  * FROM pharma WHERE phar_bcode=?";
                $stmt= $mysqli->prepare($ret) ;
                $stmt->bind_param('s',$phar_bcode);
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
                                                <li class="breadcrumb-item"><a href="javascript: void(0);">Pharmaceuticals</a></li>
                                            </ol>
                                        </div>
                                        <h4 class="page-title"><b><?php echo $row->phar_bcode;?> - <?php echo $row->phar_name;?><b></h4>
                                    </div>
                                </div>
                            </div>  
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <form method="post">
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label for="inputEmail4" class="col-form-label"> Name</label>
                                                        <input type="text" required="required" value="<?php echo $row->phar_name;?>" name="phar_name" class="form-control" id="inputEmail4" >
                                                    </div>
                                                    
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputAddress" class="col-form-label"> Description</label>
                                                    <textarea required="required"  type="text" class="form-control" name="phar_desc" id="editor"><?php echo $row->phar_desc;?></textarea>
                                                </div>
                                                <div class="form-group col-md-6">
                                                        <label for="inputPassword4" class="col-form-label"> Vendor</label>
                                                        <input required="required" type="text" value="<?php echo $row->phar_vendor;?>" name="phar_vendor" class="form-control"  id="inputPassword4">
                                                </div>
                                                <div class="form-row">
                                                <div class="form-group col-md-6">
                                                        <label for="inputPassword4" class="col-form-label"> Quantity</label>
                                                        <input required="required" type="text" value="<?php echo $row->phar_qty;?>" name="phar_qty" class="form-control"  id="inputPassword4">
                                                    </div>
                                                
                                                

                                                <div class="form-group col-md-6">
                                                        <label for="inputState" class="col-form-label"> Category</label>
                                                        <select id="inputState" required="required" name="phar_cat" class="form-control">
                                                        <?php
                                                    
                                                            $ret="SELECT * FROM pharma_c ORDER BY RAND() "; 
                                                            $stmt= $mysqli->prepare($ret) ;
                                                            $stmt->execute() ;//ok
                                                            $res=$stmt->get_result();
                                                            $cnt=1;
                                                            while($row=$res->fetch_object())
                                                            {
                                                        ?>
                                                            <option><?php echo $row->pharm_cat_name;?></option>
                                                        <?php }?>    
                                                        </select>
                                                    </div>
                                                    
                                                </div>
                                            <button type="submit" name="update_pharmaceutical" class="ladda-button btn btn-warning" data-style="expand-right">Update Pharmaceutical</button>
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