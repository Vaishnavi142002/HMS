
<?php
	session_start();
	include('../assets/inc/config.php');
		if(isset($_POST['add_pharmaceutical_category']))
		{
			$pharm_cat_name = $_POST['pharm_cat_name'];
			$pharm_cat_vendor = $_POST['pharm_cat_vendor'];
			$pharm_cat_desc=$_POST['pharm_cat_desc'];
			$query="INSERT INTO pharma_c (pharm_cat_name, pharm_cat_vendor, pharm_cat_desc) VALUES (?,?,?)";
			$stmt = $mysqli->prepare($query);
			$rc=$stmt->bind_param('sss', $pharm_cat_name, $pharm_cat_vendor, $pharm_cat_desc);
			$stmt->execute();
			if($stmt)
			{
				$success = "Pharmaceutical Category Added";
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
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Pharmaceuticals</a></li>
                                            <li class="breadcrumb-item active">Add  </li>
                                        </ol>
                                    </div>
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
                                                    <label for="inputEmail4" class="col-form-label"> Category </label>
                                                    <input type="text" required="required" name="pharm_cat_name" class="form-control" id="inputEmail4" >
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label for="inputState" class="col-form-label"> Vendor</label>
                                                    <select id="inputState" required="required" name="pharm_cat_vendor" class="form-control">
                                                    <?php
                                                    
                                                        $ret="SELECT * FROM  vendor ORDER BY RAND() "; 
                                                        $stmt= $mysqli->prepare($ret) ;
                                                        $stmt->execute() ;
                                                        $res=$stmt->get_result();
                                                        $cnt=1;
                                                        while($row=$res->fetch_object())
                                                        {
                                                    ?>
                                                        <option><?php echo $row->v_name;?></option>

                                                    <?php }?>   
                                                    </select>
                                                </div>

                                            </div>

                                            <div class="form-group">
                                                <label for="inputAddress" class="col-form-label">  Description</label>
                                                <textarea required="required" type="text" class="form-control" name="pharm_cat_desc" id="editor"></textarea>
                                            </div>

                                           <button type="submit" name="add_pharmaceutical_category" class="ladda-button btn btn-success" data-style="expand-right">Add Category</button>

                                        </form>
                                     
                                    </div> 
                                </div> 
                            </div> 
                        </div>
            </div>
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