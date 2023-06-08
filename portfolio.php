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
    <section class="portfolio-section">
        <header class="portfolio" style="background-image: url(https://iluminen.com/wp-content/uploads/2022/11/088-storyboard.jpg);">
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
            <div class="scrolldown text-light text-center w-100">
                <i class="bi bi-arrow-down"></i>
            </div>
        </header>
        <p class="miring work-medium visible-md visible-lg ">Portfolio</p>
        <div class="portfolio-container" id='portfolio'>
            <div class="container-fluid">
                <div class="row portfolios-wrapper">
                    <div class="portfolio-item col-12 text-light">
                        <div class="portfolio-content category">
                            <form action="./portfolios.php" method="get" enctype="multipart/form-data">
                                <input type="hidden" name="page-nr" value="1">
                                <input type="hidden" name="kategori" value="Pre-Wedding">
                                <button type="submit"><h2>Pre-Wedding</h2></button>
                            </form>
                        </div>
                    </div>
                    <div class="portfolio-item col-12 text-light" style="background-image:linear-gradient(#2b262384,#2b262384), url(https://iluminen.com/wp-content/uploads/2023/02/086-storyboard.jpg);">
                        <div class="portfolio-content category">
                            <form action="./portfolios.php" method="get" enctype="multipart/form-data">
                                <input type="hidden" name="page-nr" value="1">
                                <input type="hidden" name="kategori" value="Wedding">
                                <button type="submit"><h2>Wedding</h2></button>
                            </form>
                        </div>
                    </div>
                    <div class="portfolio-item col-12 text-light" style="background-image:linear-gradient(#2b262384,#2b262384), url(https://iluminen.com/wp-content/uploads/2022/09/060-storyboard-2-1.jpg);">
                        <div class="portfolio-content category">
                            <form action="./portfolios.php" method="get" enctype="multipart/form-data">
                                <input type="hidden" name="page-nr" value="1">
                                <input type="hidden" name="kategori" value="Engagement">
                                <button type="submit"><h2>Engagement</h2></button>
                            </form>
                        </div>
                    </div>
                    <div class="portfolio-item col-12 text-light" style="background-image:linear-gradient(#2b262384,#2b262384), url(https://images.pexels.com/photos/5638747/pexels-photo-5638747.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1);">
                        <div class="portfolio-content category">
                            <form action="./portfolios.php" method="get" enctype="multipart/form-data">
                                <input type="hidden" name="page-nr" value="1">
                                <input type="hidden" name="kategori" value="Family">
                                <button type="submit"><h2>Family</h2></button>
                            </form>
                        </div>
                    </div>
                    <div class="portfolio-item col-12 text-light" style="background-image:linear-gradient(#2b262384,#2b262384), url(https://images.pexels.com/photos/1870438/pexels-photo-1870438.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1);">
                        <div class="portfolio-content category">
                            <form action="./portfolios.php" method="get" enctype="multipart/form-data">
                                <input type="hidden" name="page-nr" value="1">
                                <input type="hidden" name="kategori" value="Film">
                                <button type="submit"><h2>Film</h2></button>
                            </form>
                        </div>
                    </div>
                    <div class="portfolio-item col-12 text-light" style="background-image:linear-gradient(#2b262384,#2b262384), url(https://images.pexels.com/photos/2962403/pexels-photo-2962403.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1);">
                        <div class="portfolio-content category">
                            <form action="./portfolios.php" method="get" enctype="multipart/form-data">
                                <input type="hidden" name="page-nr" value="1">
                                <input type="hidden" name="kategori" value="Etc">
                                <button type="submit"><h2>Etc</h2></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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