<?php 
  include 'model/connect.php'; 
  date_default_timezone_get();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agit & Co</title>
    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">
</head>
<body>
    <section class="portfolio-details">
      <header class="portfolio">
        <nav class="navbar navbar-expand-lg">
          <div class="container">
            <a class="navbar-brand" href="#">
              <img src="assets/img/me.png" alt="logo" width="75" />
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
              <div class="navbar-nav">
                <a class="nav-link me-4" href="index.php" id="navLink">Home</a>
                <a class="nav-link me-4" href="./journal.php?page-nr=1" id="navLink">Journal</a>
                <a class="nav-link me-4 active" href="./portfolio.php" id="navLink">Portofolio</a>
                <a class="nav-link me-4" href="about.php" id="navLink">About Us</a>
                <a class="nav-link me-4" href="contact.php" id="navLink">Contact</a>
              </div>
            </div>
          </div>
        </nav>
        <?php 
          $query = mysqli_query($connect, "SELECT * FROM projects WHERE id_project='$_GET[id_project]'");
          while($data=mysqli_fetch_array($query)){
            $id_project = $data[0];
            $name       = $data[1];
            $lokasi     = $data[2];
            $kategori   = $data[4];
            $img        = $data[5];
        ?>
        <div class="portfolio-details-title text-center w-100 h-75 d-flex flex-column align-items-center justify-content-center">
          <p><?= $kategori ?></p>
          <h1><?= $name ?> | <?= $lokasi ?></h1>
        </div>
        <div class="scrolldown text-light text-center w-100">
          <i class="bi bi-arrow-down"></i>
        </div>
      </header>
      <div class="portfolio-details-content py-5">
        <div class="container w-100 d-flex flex-column align-items-center justify-content-center">
          <div class="portfolio-comp-logo w-100 d-flex align-items-center justify-content-center">
            <img src="assets/img/me.png" alt="logo" width="50" />
          </div>
          <div class="portfolio-details-gallery w-50 d-flex flex-wrap mt-5 g-4">
            <img class="landscape" src="https://iluminen.com/wp-content/uploads/2023/02/001-storyboard-3.jpg" alt="portfolio-1">
            <img class="w-50" src="https://images.pexels.com/photos/13293704/pexels-photo-13293704.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="portfolio-2">
            <img class="w-50" src="https://images.pexels.com/photos/15124705/pexels-photo-15124705/free-photo-of-newlyweds-walking-in-darkness.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1">
            <img src="https://iluminen.com/wp-content/uploads/2023/02/007-storyboard-3.jpg" alt="portfolio-4">
          </div>
        </div>
      </div>
      <?php } ?>
      <?php include("footer.html"); ?>
    </section>
    
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