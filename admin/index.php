<?php
    session_start();
    include('../assets/inc/config.php');
    if(isset($_POST['admin_login']))
    {
        $ad_email=$_POST['ad_email'];
        $ad_pwd=sha1(md5($_POST['ad_pwd']));
        $stmt=$mysqli->prepare("SELECT ad_email ,ad_pwd , ad_id FROM admin WHERE ad_email=? AND ad_pwd=? ");
        $stmt->bind_param('ss',$ad_email,$ad_pwd);
        $stmt->execute();
        $stmt -> bind_result($ad_email,$ad_pwd,$ad_id);
        $rs=$stmt->fetch();
        $_SESSION['ad_id']=$ad_id;
        if($rs)
            {
                header("location:dashboard.php");
            }

        else
            {
            
                $err = " Check Your Credentials";
            }
    }
?>
<!--End Login-->
<!DOCTYPE html>
<html lang="en">
<?php include('assets/inc/head.php');?>

    <body class="authentication-bg authentication-bg-pattern">

        <div class="account-pages mt-5 mb-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card bg-pattern">

                            <div class="card-body p-4">
                                <form method='post' >

                                    <div class="form-group mb-3">
                                        <label for="emailaddress">Email address</label>
                                        <input class="form-control" name="ad_email" type="email" id="emailaddress" required="" placeholder="email">
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="password">Password</label>
                                        <input class="form-control" name="ad_pwd" type="password" required="" id="password" placeholder="password">
                                    </div>

                                    <div class="form-group mb-0 text-center">
                                        <button class="btn btn-primary btn-block" name="admin_login" type="submit"> Log In </button>
                                    </div>
                                    <div class="row mt-3">
                            <div class="col-12 text-center">
                              <!--  <p> <a href="pwd_reset.php" class="text-black-50 ml-1">Forgot your password?</a></p>-->
                              </div> 
                        </div>
                        <p class="text-black-50" style="text-align:center;"><a href="index.php" class="text-black ml-1"><b>Log In</b></a> OR <a href="../index.php" class="text-black ml-1"><b>HomePage</b></a></p>
                        

                                </form>

                               

                            </div> 
                        </div>

                       <!-- end row -->

                    </div> <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end page -->


       

        <!-- Vendor js -->
        <script src="assets/js/vendor.min.js"></script>

        <!-- App js -->
        <script src="assets/js/app.min.js"></script>
        
    </body>

</html>