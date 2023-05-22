<?php
include('inc/config.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>HMS</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <link href="assets_index/img/favicon.png" rel="icon">
  <link href="assets_index/img/apple-touch-icon.png" rel="apple-touch-icon">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <link href="assets_index/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="assets_index/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets_index/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets_index/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets_index/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets_index/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets_index/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets_index/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="assets_index/css/style.css" rel="stylesheet">

</head>

<body>
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="index.html">HMS</a></h1>

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto " href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#services">Services</a></li>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>
      <a href="#logins" class="appointment-btn scrollto"><span class="d-none d-md-inline">Login</span> </a>
      
    </div>
  </header>
  <section id="hero">
    <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

      <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

      <div class="carousel-inner" role="listbox">
        <div class="carousel-item " style="background-image: url(assets_index/img/slide/1.jpg)">
          <div class="container">
            <p>Be healthy, stay active and live well</p>
          </div>
        </div>
        <div class="carousel-item active" style="background-image: url(assets_index/img/slide/2.jpg)">
          <div class="container">
            <p>“Prevention is better than cure</p>
          </div>
        </div>
        <div class="carousel-item" style="background-image: url(assets_index/img/slide/3.jpg)">
          <div class="container">
            <p>Happiness is the highest form of health</p>
          </div>
        </div>

      </div>

      <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
      </a>

      <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
      </a>

    </div>
  </section>

  <main id="main">

   
 <!-- ======= Counts Section ======= -->
 <section id="counts" class="counts">
  <div class="container">

    <div class="row">

      <div class="col-lg-4 col-md-6">
        <div class="count-box">
          <i class="fas fa-user-md"></i>
          <!--<span data-purecounter-start="0" data-purecounter-end="85" data-purecounter-duration="1" class="purecounter"></span>-->
          <?php
                                                    $result ="SELECT count(*) FROM doc ";
                                                    $stmt = $mysqli->prepare($result);
                                                    $stmt->execute();
                                                    $stmt->bind_result($doc);
                                                    $stmt->fetch();
                                                    $stmt->close();
                                                ?>
                                                <h3 class="text-dark mt-1"><span data-plugin="counterup"><?php echo $doc;?></span></h3>
          <p>Doctors</p>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 mt-5 mt-md-0">
        <div class="count-box">
          <i class="far fa-hospital"></i>
          <?php
                                                    $result ="SELECT count(*) FROM user WHERE patient_type = 'InPatient' ";
                                                    $stmt = $mysqli->prepare($result);
                                                    $stmt->execute();
                                                    $stmt->bind_result($inpatient);
                                                    $stmt->fetch();
                                                    $stmt->close();
                                                ?>
                                                <h3 class="text-dark mt-1"><span data-plugin="counterup"><?php echo $inpatient;?></span></h3>
                                               
          <p>Patients</p>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 mt-5 mt-lg-0">
        <div class="count-box">
          <i class="fas fa-flask"></i> <?php
                                                    $result ="SELECT count(*) FROM nurse ";
                                                    $stmt = $mysqli->prepare($result);
                                                    $stmt->execute();
                                                    $stmt->bind_result($nurse);
                                                    $stmt->fetch();
                                                    $stmt->close();
                                                ?>
                                                <h3 class="text-dark mt-1"><span data-plugin="counterup"><?php echo $nurse;?></span></h3>
          <p>Nurse</p>
        </div>
      </div>
    </div>

  </div>
</section><!-- End Counts Section -->
    <!--Login start-->
    <section id="logins" class="our-blog ">
      <div class="container">
  
          <div class="col-sm-12 blog-cont">
              <div class="row no-margin">
                  <div class="col-sm-3 blog-smk">
                    <div class="blog-single">
                              <img class="blog-single-img" src="assets/images/patient.jpg" alt="">

                          <div class="blog-single-det">
                              <h6>Patient </h6>
                              <a href="user/index.php" target="_blank">
                                  <button class="btn btn-success btn-sm">Login</button>
                              </a>
                          </div>
                      </div>
                  </div>
                  <div class="col-sm-3 blog-smk">
                      <div class="blog-single">

                              <img class="blog-single-img" src="assets/images/doctor.jpg" alt="">

                          <div class="blog-single-det">
                              <h6>Doctors </h6>
                              <a href="doc/index.php" target="_blank">
                                  <button class="btn btn-success btn-sm">Login</button>
                              </a>
                          </div>
                      </div>
                  </div>
                  <div class="col-sm-3 blog-smk">
                    <div class="blog-single">

                            <img src="assets/images/nurse.jpeg" class="blog-single-img" alt="" style="height:100%">

                        <div class="blog-single-det">
                            <h6>Nurse </h6>
                
                            <a href="nurse/index.php" target="_blank">
                                <button class="btn btn-success btn-sm">Login</button>
                            </a>
                        </div>
                    </div>
                </div>
                  
                  <div class="col-sm-3 blog-smk">
                      <div class="blog-single">

                              <img src="assets/images/admin.jpg"  class="blog-single-img"alt="">

                          <div class="blog-single-det">
                              <h6>Admin </h6>
                  
                              <a href="admin/index.php" target="_blank">
                                  <button class="btn btn-success btn-sm">Login</button>
                              </a>
                          </div>
                      </div>
                  </div>
                  
                  
                  
                  

                  
                  
              </div>
          </div>
          
      </div>
  </section>  
<!--Login End-->
     
    <!-- ======= Services Section ======= -->
    <section id="services" class="services services">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Services</h2>
          <p></p></div>

        <div class="row">
          <div class="col-lg-4 col-md-6 icon-box" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon"><i class="fas fa-heartbeat"></i></div>
            <h4 class="title"><a href="">Mask Detection</a></h4>
            <p class="description" style="text-align:justify">We enable us quickly monitor those who are not wearing m face mask because it is difficult or nearly impossible to monitor every individual.Using Camera will collect photos and utilised to indentify face mask.</p>
        </p>
          </div>
          <div class="col-lg-4 col-md-6 icon-box" data-aos="zoom-in" data-aos-delay="200">
            <div class="icon"><i class="fas fa-pills"></i></div>
            <h4 class="title"><a href="">Temparature Detection</a></h4>
            <p class="description" style="text-align:justify">Doctors must keep track of each patient's body temperature in order to monitor their helathDoing manually take time and require doctors.To avoid this we are provding Assistent who keep track of patient data.</p>
          </div>
          <div class="col-lg-4 col-md-6 icon-box" data-aos="zoom-in" data-aos-delay="300">
            <div class="icon"><i class="fas fa-hospital-user"></i></div>
            <h4 class="title"><a href="">IV Bag </a></h4>
            <p class="description" style="text-align:justify">Nurse and doctor's continously need to keep track of IV Bag weight to overcome this we providing smart IV Bag Buzzer system.When weight of IV Bag goes down the buzzer will sound.</p>
          </div>
        
 
    

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6">
            <div class="footer-info">
              <h3>Meihealth</h3>
              <p>
               <br><br>
                <strong>Phone:</strong>+91 7796750441<br>
                <strong>Email:</strong> admin@gmail.com<br>
              </p>
          
            </div>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#services">Services</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#services">Mask Detection</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#services">Diease Predictiont</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#services">IV bag </a></li>
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>Our Newsletter</h4>
            <p></p>
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>

          </div>

        </div>
      </div>
    </div>

   
  </footer>

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <script src="assets_index/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets_index/vendor/aos/aos.js"></script>
  <script src="assets_index/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets_index/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets_index/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets_index/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets_index/js/main.js"></script>

</body>

</html>