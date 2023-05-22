<?php
    $doc_id = $_SESSION['doc_id'];
    $doc_number = $_SESSION['doc_number'];
    $ret="SELECT * FROM  doc WHERE doc_id = ? AND doc_number = ?";
    $stmt= $mysqli->prepare($ret) ;
    $stmt->bind_param('is',$doc_id, $doc_number);
    $stmt->execute() ;//ok
    $res=$stmt->get_result();
    //$cnt=1;
    while($row=$res->fetch_object())
    {
?>
    <div class="navbar-custom">
        <ul class="list-unstyled topnav-menu float-right mb-0">
           
            <li class="dropdown notification-list">
                <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                    <!--<img src="assets/images/users/<?php echo $row->doc_dpic;?>" alt="dpic" class="rounded-circle">-->
                    <span class="pro-user-name ml-1">
                        <?php echo $row->doc_fname;?> <?php echo $row->doc_lname;?> <i class="mdi mdi-chevron-down"></i> 
                    </span>
                </a>
                <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                    
                  
                    <div class="dropdown-divider"></div>
                    <a href="logout_partial.php" class="dropdown-item notify-item">
                        <i class="fe-log-out"></i>
                        <span>Logout</span>
                    </a>

                </div>
            </li>
        </ul>
        <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
            <li>
                <button class="button-menu-mobile waves-effect waves-light">
                    <i class="fe-menu"></i>
                </button>
            </li>

            <li class="dropdown d-none d-lg-block">
                <a class="nav-link dropdown-toggle waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                    ADD
                    <i class="mdi mdi-chevron-down"></i> 
                </a>
                <div class="dropdown-menu">
                    <a href="register_patient.php" class="dropdown-item">
                        <i class="fe-activity mr-1"></i>
                        <span>Patient</span>
                    </a>
                   
                    
                    <div class="dropdown-divider"></div>
    </div>
            </li>
            <li class="dropdown d-none d-lg-block">
                <a class="nav-link dropdown-toggle waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                    Language
                    <i class="mdi mdi-chevron-down"></i> 
                </a>
                <div class="dropdown-menu">
                    <a href="his_doc_register_patient.php" class="dropdown-item">
                        <i class="fe-activity mr-1"></i>
                        <div id="google_translate_element"></div>

<script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en',defaultLanguage: 'en',
                        includedLanguages:'en,hi,mr', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
}
</script>

<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>


                    
                    </a>
                   

                    
                    <div class="dropdown-divider"></div>
                    
                </div>
            </li>

        </ul>
    </div>
<?php }?>