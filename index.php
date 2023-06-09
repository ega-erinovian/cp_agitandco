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
    <section class="home-section">
        <header class="home">
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
                        <a class="nav-link me-4 active" href="index.php" id="navLink">Home</a>
                        <a class="nav-link me-4" href="journal.php?page-nr=1" id="navLink">Journal</a>
                        <a class="nav-link me-4" href="portfolio.php" id="navLink">Portofolio</a>
                        <a class="nav-link me-4" href="about.php" id="navLink">About Us</a>
                        <a class="nav-link me-4" href="contact.php" id="navLink">Contact</a>
                      </div>
                    </div>
                </div>
            </nav>
            <div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-bs-ride="true">
                <div class="carousel-indicators">
                    <?php
                        include 'model/connect.php'; 
                        $query = mysqli_query($connect, "SELECT * FROM background WHERE tempatgambar='home'");
                        while($data=mysqli_fetch_array($query)){
                            $id_gambar    =$data[0];
                            $tempatGambar =$data[1];
                            $img          =$data[2];
                        }

                        $array_imgs = explode(",", $img);
                        $i=0;
                        foreach($array_imgs as $img ){
                    ?>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to=<?= $i ?> class="<?php if(array_search($img, $array_imgs) == 0) echo 'active' ?>" aria-current="true" aria-label="Slide 1"></button>
                    <?php $i++; } ?>
                </div>
                <div class="carousel-inner">
                    <?php
                        foreach($array_imgs as $img ){
                    ?>
                    <div class="carousel-item <?php if(array_search($img, $array_imgs) == 0) echo 'active' ?> " style="background-image: linear-gradient(#00000065, #00000000), url(<?='assets/img/page/home/'.$img?>);">
                    </div>
                    <?php } ?>
                </div>
            </div>
        </header>
        <p class="miring work-medium visible-md visible-lg">Agit & Co</p>
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