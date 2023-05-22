<?php
    session_start();
    include('../assets/inc/config.php');
    if(isset($_POST['patient_login']))
    {
        $patient_number = $_POST['patient_number'];
        $patient_pwd = sha1(md5($_POST['patient_pwd']));
        $stmt=$mysqli->prepare("SELECT patient_number, patient_pwd, patient_id FROM user WHERE  patient_number=? AND patient_pwd=? ");//sql to log in user
        $stmt->bind_param('ss', $patient_number, $patient_pwd);
        $stmt->execute();
        $stmt -> bind_result($patient_number, $patient_pwd ,$patient_id);
        $rs=$stmt->fetch();
        $_SESSION['patient_id'] = $patient_id;
        $_SESSION['patient_number'] = $patient_number;
        if($rs)
            {
                header("location:patient_dashboard.php");
            }
        else
            {
                $err = "Check Your Credentials";
            }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8" />
        <title>Medihealth</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="" name="description" />
        <meta content="" name="MartDevelopers" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <link rel="shortcut icon" href="assets/images/favicon.ico">
        <link href="../assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/css/app.min.css" rel="stylesheet" type="text/css" />
        <script src="../assets/js/swal.js"></script>
        <?php if(isset($success)) {?>
            <script>
                setTimeout(function () 
                { 
                    swal("Success","<?php echo $success;?>","success");
                },
                    100);
            </script>
        <?php } ?>
        <?php if(isset($err)) {?>
            <script>
                setTimeout(function () 
                { 
                    swal("Failed","<?php echo $err;?>","error");
                },
                    100);
            </script>
        <?php } ?>
    </head>
    <body class="authentication-bg authentication-bg-pattern">
        <div class="account-pages mt-5 mb-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card bg-pattern">
                            <div class="card-body p-4">
                                
                                <form method='post' >
                                    <div class="form-group mb-3">
                                        <label for="emailaddress">Patient Number</label>
                                        <input class="form-control" name="patient_number" type="text" id="emailaddress" required="" placeholder="Nmber">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="password">Password</label>
                                        <input class="form-control" name="patient_pwd" type="password" required="" id="password" placeholder="Password">
                                    </div>
                                    <div class="form-group mb-0 text-center">
                                        <button class="btn btn-success btn-block" name="patient_login" type="submit"> Log In </button>
                                    </div>
                                    <div class="new-account">Don't have an account yet?
								<a href="patient_register.php">
									Create an account
								</a>
                                <div class="row mt-3">
                           
                        </div>
							</div>
                            <div class="row mt-3">
                            <div class="col-12 text-center">
                               <!-- <p> <a href="his_doc_reset_pwd.php" class="text-Black-50 ml-1">Forgot your password?</a></p>-->
                               <p class="text-black-50" style="text-align:center;"><a href="index.php" class="text-black ml-1"><b>Log In</b></a> OR <a href="../index.php" class="text-black ml-1"><b>HomePage</b></a></p>
                            </div> 
                        </div></form>
                        

                            </div>
                        </div>
                       
                    </div> 
                </div>
            </div>
        </div>
        <script src="../assets/js/vendor.min.js"></script>
        <script src="../assets/js/app.min.js"></script>
    </body>
</html>