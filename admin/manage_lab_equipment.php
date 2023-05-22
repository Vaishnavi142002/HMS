<?php
  session_start();
  include('../assets/inc/config.php');
  include('assets/inc/checklogin.php');
  check_login();
  $aid=$_SESSION['ad_id'];
  if(isset($_GET['delete_eqp']))
  {
        $id=intval($_GET['delete_eqp']);
        $adn="delete from equipment where eqp_code=?";
        $stmt= $mysqli->prepare($adn);
        $stmt->bind_param('i',$id);
        $stmt->execute();
        $stmt->close();	 
          if($stmt)
          {
            $success = "Deleted";
          }
            else
            {
                $err = "Try Again Later";
            }
    }
?>
<!DOCTYPE html>
<html lang="en">
<?php include('assets/inc/head.php');?>

    <body>
<div id="wrapper">

                <?php include('assets/inc/nav.php');?>
                <?php include("assets/inc/sidebar.php");?>
           

            <div class="content-page">
                <div class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Equipment</a></li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>   

                        <div class="row">
                            <div class="col-12">
                                <div class="card-box">
                                    <h4 class="header-title"></h4>
                                    <div class="mb-2">
                                        <div class="row">
                                            <div class="col-12 text-sm-center form-inline" >
                                                <div class="form-group mr-2" style="display:none">
                                                    <select id="demo-foo-filter-status" class="custom-select custom-select-sm">
                                                        <option value="">Show all</option>
                                                        <option value="Discharged">Discharged</option>
                                                        <option value="OutPatients">OutPatients</option>
                                                        <option value="InPatients">InPatients</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <input id="demo-foo-search" type="text" placeholder="Search" class="form-control form-control-sm" autocomplete="on">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="table-responsive">
                                        <table id="demo-foo-filtering" class="table table-bordered toggle-circle mb-0" data-page-size="7">
                                            <thead>
                                            <tr>
                                                <th></th>
                                                <th data-toggle="true">Name</th>
                                                <th data-hide="phone">Vendor</th>
                                                <th data-hide="phone">Barcode</th>
                                                <th data-hide="phone">Status</th>
                                                <th data-hide="phone">Quantity</th>
                                                <th data-hide="phone">Action</th>
                                            </tr>
                                            </thead>
                                            <?php
                                           
                                                $ret="SELECT * FROM  equipment WHERE eqp_dept = 'Laboratory' ORDER BY RAND() "; 
                                                $stmt= $mysqli->prepare($ret) ;
                                                $stmt->execute() ;//ok
                                                $res=$stmt->get_result();
                                                $cnt=1;
                                                while($row=$res->fetch_object())
                                                {
                                            ?>

                                                <tbody>
                                                <tr>
                                                    <td><?php echo $cnt;?></td>
                                                    <td><?php echo $row->eqp_name;?></td>
                                                    <td><?php echo $row->eqp_vendor;?></td>
                                                    <td><?php echo $row->eqp_code;?></td>
                                                    <td><?php echo $row->eqp_status;?></td>
                                                    <td><?php echo $row->eqp_qty;?></td>
                                                    <td>
                                                        <a href="view_single_eqp.php?eqp_code=<?php echo $row->eqp_code;?>" class="badge badge-success"><i class="far fa-eye "></i> View</a>
                                                        <a href="update_single_eqp.php?eqp_code=<?php echo $row->eqp_code;?>" class="badge badge-primary"><i class="fas fa-clipboard-check "></i> Update</a>
                                                        <a href="manage_lab_equipment.php?delete_eqp=<?php echo $row->eqp_code;?>" class="badge badge-danger"><i class="fas fa-trash-alt "></i> Delete</a>


                                                    </td>
                                                </tr>
                                                </tbody>
                                            <?php  $cnt = $cnt +1 ; }?>
                                            <tfoot>
                                            <tr class="active">
                                                <td colspan="8">
                                                    <div class="text-right">
                                                        <ul class="pagination pagination-rounded justify-content-end footable-pagination m-t-10 mb-0"></ul>
                                                    </div>
                                                </td>
                                            </tr>
                                            </tfoot>
                                        </table>
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
        <script src="assets/libs/footable/footable.all.min.js"></script>
        <script src="assets/js/pages/foo-tables.init.js"></script>        
        <script src="assets/js/app.min.js"></script>
        
    </body>

</html>