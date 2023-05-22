<!--Server side code to handle  Patient Registration-->
<?php
	session_start();
	include('../assets/inc/config.php');
		if(isset($_POST['add_patient_presc']))
		{
			$pres_pat_name = $_POST['pres_pat_name'];
			$pres_pat_number = $_POST['pres_pat_number'];
            $pres_pat_type = $_POST['pres_pat_type'];
            $pres_pat_addr = $_POST['pres_pat_addr'];
            $pres_pat_age = $_POST['pres_pat_age'];
            $pres_number = $_POST['pres_number'];
            $pres_ins = $_POST['pres_ins'];
            $pres_pat_ailment = $_POST['pres_pat_ailment'];
			$query="INSERT INTO  prescription  (pres_pat_name, pres_pat_number, pres_pat_type, pres_pat_addr, pres_pat_age, pres_number, pres_pat_ailment, pres_ins) VALUES(?,?,?,?,?,?,?,?)";
			$stmt = $mysqli->prepare($query);
			$rc=$stmt->bind_param('ssssssss', $pres_pat_name, $pres_pat_number, $pres_pat_type, $pres_pat_addr, $pres_pat_age, $pres_number, $pres_pat_ailment, $pres_ins);
			$stmt->execute();
			if($stmt)
			{
				$success = "Addded";
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
                $patient_number = $_GET['patient_number'];
                $ret="SELECT  * FROM user WHERE patient_number=?";
                $stmt= $mysqli->prepare($ret) ;
                $stmt->bind_param('s',$patient_number);
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
                                                <li class="breadcrumb-item"><a href="javascript: void(0);">Prescription</a></li>
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
                                                        <label for="inputEmail4" class="col-form-label"> Name</label>
                                                        <input type="text" required="required" readonly name="pres_pat_name" value="<?php echo $row->patient_name;?>" class="form-control" id="inputText4" placeholder="Name">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="inputEmail4" class="col-form-label"> Number</label>
                                                        <input type="text" required="required" readonly name="pres_pat_number" value="<?php echo $row->patient_number;?>" class="form-control" id="inputEmail4" placeholder="Number">
                                                    </div>


                                                </div>

                                                <div class="form-row">

                                                   
                                                    
                                                    <div class="form-group col-md-6">
                                                        <label for="inputPassword4" class="col-form-label"> Address</label>
                                                        <input required="required" type="text" readonly name="pres_pat_addr" value="<?php echo $row->patient_add;?>" class="form-control"  id="inputAddres4" placeholder="Address">
                                                    </div>
                                                    
                                                    <div class="form-group col-md-6">
                                                        <label for="inputPassword4" class="col-form-label">Age</label>
                                                        <input required="required" type="text" readonly name="pres_pat_age" value="<?php echo $row->patient_age;?>" class="form-control"  id="inputPassword4" placeholder="Age">
                                                    </div>

                                                    <div class="form-group col-md-6">
                                                        <label for="inputPassword4" class="col-form-label"> Type</label>
                                                        <input required="required" readonly type="text" name="pres_pat_type" value="<?php echo $row->patient_type;?>" class="form-control"  id="inputPassword4" placeholder="TYpe">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="inputCity" class="col-form-label"> Illness</label>
                                                        <input required="required" type="text" value="<?php echo $row->patient_ailment;?>" name="pres_pat_ailment" class="form-control" id="inputCity">
                                                </div>
                                                   

                                                </div>

                                               
                                                <hr>
                                                <div class="form-row">
                                                    
                                            
                                                    <div class="form-group col-md-2" style="display:none">
                                                        <?php 
                                                            $length = 5;    
                                                            $pres_no =  substr(str_shuffle('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'),1,$length);
                                                        ?>
                                                        <label for="inputZip" class="col-form-label">Prescription No:</label>
                                                        <input type="text" name="pres_number" value="<?php echo $pres_no;?>" class="form-control" id="inputZip">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                        <label for="inputAddress" class="col-form-label">Prescription</label>
                                                        <textarea required="required"  type="text" class="form-control" name="pres_ins" id="editor"></textarea>
                                                </div>

                                                <button type="submit" name="add_patient_presc" class="ladda-button btn btn-primary" data-style="expand-right">Add</button>
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