<?php 
  include 'model/connect.php'; 
  date_default_timezone_get();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Portfolio Details - Agit & Co</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Personal
  * Updated: Mar 10 2023 with Bootstrap v5.2.3
  * Template URL: https://Sirius.com/personal-free-resume-bootstrap-template/
  * Author: Sirius.com
  * License: https://Sirius.com/license/
  ======================================================== -->
</head>

<body>

  <main id="main">

    <!-- ======= Portfolio Details ======= -->
    <div id="portfolio-details" class="portfolio-details">
      <div class="container">
      <?php 
      $id_project= $_GET['id_project'];
      $query = mysqli_query($connect, "SELECT * FROM projects WHERE id_project='".$_GET['id_project']."'");
      while($data=mysqli_fetch_array($query)){
                          $id_project =$data[0];
                          $nama       =$data[1];
                          $datetime   = date('Y-m-d H:i:s', $data[2]);
                          $idyoutube      =$data[3];
                          $kategori     =$data[4];
                          $img_files  =$data[5]; 
                          // $array_imgs = explode(",", $img_files);
                          // $i =0;
                          // foreach($array_imgs as $img ){
                          // $i++;
                          ?>
        <div class="row">

          <!-- <div class="col-lg-8">
            

            <div class="portfolio-details-slider swiper">
              <div class="swiper-wrapper align-items-center">

                <div class="swiper-slide">
                  <img src="assets/img/portfolio/portfolio-details-1.jpg" alt="">
                </div>

                <div class="swiper-slide">
                  <img src="assets/img/portfolio/portfolio-details-2.jpg" alt="">
                </div>

                <div class="swiper-slide">
                  <img src="assets/img/portfolio/portfolio-details-3.jpg" alt="">
                </div>

              </div>
              <div class="swiper-pagination"></div>
            </div>

          </div> -->
          <div class="col-lg">
            <h2 class="portfolio-title" style="text-transform: capitalize;"><?php echo $kategori?> of : <?php echo $nama?></h2>
            
          </div>

          <!-- <div class="col-lg-4 portfolio-info">
            <h3>Project information</h3>
            <ul>
              <li><strong>Category</strong>: Web design</li>
              <li><strong>Client</strong>: ASU Company</li>
              <li><strong>Project date</strong>: 01 March, 2020</li>
              <li><strong>Project URL</strong>: <a href="#">www.example.com</a></li>
            </ul>

            <p>
              Autem ipsum nam porro corporis rerum. Quis eos dolorem eos itaque inventore commodi labore quia quia. Exercitationem repudiandae officiis neque suscipit non officia eaque itaque enim. Voluptatem officia accusantium nesciunt est omnis tempora consectetur dignissimos. Sequi nulla at esse enim cum deserunt eius.
            </p>
          </div>

        </div> -->

      </div>
      <div class="container">
        <div class="row">
              
              
          <div class="col-lg-8">
            <!-- <h2 class="portfolio-title">This is an example of portfolio detail</h2> -->
  
            <div class="portfolio-details-slider swiper w-100 h-100">
              <div class="swiper-wrapper align-items-center" width='1000px' height='600px'>
                
                
                  <iframe width='100%' height='100%' class="yutub" src="<?php echo "https://www.youtube.com/embed/".$idyoutube; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                
  
                <?php  ?>
                <!-- <div class="swiper-slide">
                  <img src="assets/img/portfolio/wedding2.jpg" alt="">
                </div>
  
                <div class="swiper-slide">
                  <img src="assets/img/portfolio/wedding3.jpg" alt="">
                </div> -->
  
              </div>
              <div class="swiper-pagination"></div>
            </div>
  
          </div>
          <div class="col-lg-4 portfolio-info">
            <h3>Project information</h3>
            <ul>
              <li><strong>Category</strong>: <?=  $kategori?></li>
              <li><strong>Client</strong>: <?= $nama?></li>
              <li><strong>Project date</strong>: <?= $datetime?></li>
              <li><strong>Project URL</strong>: <a href="#">www.example.com</a></li>
            </ul>
  
            <p>
              Autem ipsum nam porro corporis rerum. Quis eos dolorem eos itaque inventore commodi labore quia quia. Exercitationem repudiandae officiis neque suscipit non officia eaque itaque enim. Voluptatem officia accusantium nesciunt est omnis tempora consectetur dignissimos. Sequi nulla at esse enim cum deserunt eius.
            </p>
          </div>
  
        </div>
      </div>
      <div class="container">
        <div class="d-flex justify-content-center align-items-center">
          <div class="mx-auto my-auto" >
          <?php        
          $array_imgs = explode(",", $img_files);
                  $i =0;
                  foreach($array_imgs as $img ){
                  $i++;
                  ?>
            <img class='mb-3'width="100%" src="<?php echo "assets/img/portofolio/".$id_project."/".$img; ?>" alt="">
            <?php } ?>
            <!-- <img src="assets/img/portfolio/wedding5.jpg" alt="" style="width:80%%;">
            <img src="assets/img/portfolio/wedding6.jpg" alt="" style="width:80%%;"> -->
          </div>
        </div>
      </div>
      <?php  }?>
    </div>
    </div><!-- End Portfolio Details -->

  </main><!-- End #main -->

  <div class="credits">
    <!-- All the links in the footer should remain intact. -->
    <!-- You can delete the links only if you purchased the pro version. -->
    <!-- Licensing information: https://Sirius.com/license/ -->
    <!-- Purchase the pro version with working PHP/AJAX contact form: https://Sirius.com/personal-free-resume-bootstrap-template/ -->
    Designed by <a href="https://instagram.com/">Sirius Creative</a>
  </div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>