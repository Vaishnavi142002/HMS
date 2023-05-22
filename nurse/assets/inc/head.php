<head>
        <meta charset="utf-8" />
        <title>Medihealth</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="MartDevelopers" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <link rel="shortcut icon" href="../assets/images/favicon.ico">
        <link href="../assets/libs/flatpickr/flatpickr.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/css/app.min.css" rel="stylesheet" type="text/css" />
         <link href="../assets/libs/ladda/ladda-themeless.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/libs/footable/footable.core.min.css" rel="stylesheet" type="text/css" />
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
                                swal("Failed","<?php echo $err;?>","Failed");
                            },
                                100);
                </script>

        <?php } ?>

</head>