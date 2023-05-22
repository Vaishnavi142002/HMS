
<?php
	session_start();
	include('../assets/inc/config.php');
		if(isset($_POST['update_pharmaceutical_category']))
		{
			$pharm_cat_name = $_GET['pharm_cat_name'];
			$pharm_cat_vendor = $_POST['pharm_cat_vendor'];
			$pharm_cat_desc=$_POST['pharm_cat_desc'];
			$query="UPDATE pharma_c SET  pharm_cat_vendor=?, pharm_cat_desc=? WHERE pharm_cat_name = ?";
			$stmt = $mysqli->prepare($query);
			$rc=$stmt->bind_param('sss',   $pharm_cat_vendor, $pharm_cat_desc, $pharm_cat_name);
			$stmt->execute();
			if($stmt)
			{
				$success = "Upadated ";
			}
			else {
				$err = "Try Later";
			}}
?>
<!DOCTYPE html>
<html lang="en">
    <?php include('assets/inc/head.php');?>
    <body>
        <div id="wrapper">
            <?php include("assets/inc/nav.php");?>
            <?php include("assets/inc/sidebar.php");?>
            <?php
                $pharm_cat_name=$_GET['pharm_cat_name'];
                $ret="SELECT  * FROM pharma_c WHERE pharm_cat_name=?";
                $stmt= $mysqli->prepare($ret) ;
                $stmt->bind_param('s',$pharm_cat_name);
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
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Category</a></li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title"><b><?php echo $row->pharm_cat_name;?></b></h4>
                                </div>
                            </div>
                        </div> 
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <form method="post">
                                            <div class="form-row" >
                                                <div class="form-group col-md-6" style="display:none">
                                                    <label for="inputEmail4" class="col-form-label"> Category </label>
                                                    <input  type="text" value="<?php echo $row->pharm_cat_name;?>" required="required" name="pharm_cat_name" class="form-control" id="inputEmail4" >
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label for="inputPassword4" class="col-form-label">  Vendor</label>
                                                    <input required="required" value="<?php echo $row->pharm_cat_vendor;?>" type="text" name="pharm_cat_vendor" class="form-control"  id="inputPassword4">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="inputAddress" class="col-form-label">  Description</label>
                                                <textarea required="required" type="text" class="form-control" name="pharm_cat_desc" id="editor"><?php echo $row->pharm_cat_desc;?></textarea>
                                            </div>
                                           <button type="submit" name="update_pharmaceutical_category" class="ladda-button btn btn-danger" data-style="expand-right">Update Category</button>
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